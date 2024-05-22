<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Ternak;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Phpml\Clustering\KMeans;

class TernakController extends Controller
{
    public function index() {
        $ternak = Ternak::latest()->get();
        return Inertia::render('Admin/Ternak/Home', ['data' => $ternak]);
    }
    public function create() {
        $wilayah = Wilayah::all();
        return Inertia::render('Admin/Ternak/Create', ['wilayahs' => $wilayah]);
    }
    public function store(Request $request) {
        $data = $request->validate([
            'kelurahan' => 'required',
            'prod_susu' => 'required',
            'prod_sapi' => 'required',
            'pemilik' => 'required',
            'lahan' => 'required',
        ]);

        Ternak::create($data);
        return Inertia::location(route('ternak-index'));
    }

    public function edit($id) {
        $ternak = Ternak::findOrFail($id);
        return Inertia::render('Admin/Ternak/Edit', ['ternak'=> $ternak]);
    }    

    public function update(Request $request, $id) {
        $ternak = Ternak::findOrFail($id);
        $data = $request->validate([
            'prod_susu' => 'required',
            'prod_sapi' => 'required',
            'pemilik' => 'required',
            'lahan' => 'required',
        ]);
    
        $ternak->update($data);
        return Inertia::location(route('ternak-index'));
    }

    public function clustering($id) {
        // Ambil data ternak berdasarkan ID yang diberikan
        $ternak = Ternak::findOrFail($id); // Data ternak spesifik berdasarkan ID
        $allTernak = Ternak::orderBy('id', 'asc')->get()->toArray(); // Semua data ternak untuk normalisasi dan klusterisasi
    
        $minMax = [
            'prod_susu' => ['min' => min(array_column($allTernak, 'prod_susu')), 'max' => max(array_column($allTernak, 'prod_susu'))],
            'prod_sapi' => ['min' => min(array_column($allTernak, 'prod_sapi')), 'max' => max(array_column($allTernak, 'prod_sapi'))],
            'pemilik' => ['min' => min(array_column($allTernak, 'pemilik')), 'max' => max(array_column($allTernak, 'pemilik'))],
            'lahan' => ['min' => min(array_column($allTernak, 'lahan')), 'max' => max(array_column($allTernak, 'lahan'))],
        ];
    
        function normalize($value, $min, $max) {
            if ($min == $max) {
                return 0; // or return a fixed value
            }
            return ($value - $min) / ($max - $min);
        }
    
        // Normalisasi data
        $samples = array_map(function ($item) use ($minMax) {
            return [
                normalize($item['prod_susu'], $minMax['prod_susu']['min'], $minMax['prod_susu']['max']),
                normalize($item['prod_sapi'], $minMax['prod_sapi']['min'], $minMax['prod_sapi']['max']),
                normalize($item['pemilik'], $minMax['pemilik']['min'], $minMax['pemilik']['max']),
                normalize($item['lahan'], $minMax['lahan']['min'], $minMax['lahan']['max']),
            ];
        }, $allTernak);
    
        // Lakukan klusterisasi
        $kmeans = new KMeans(3);
        $clusters = $kmeans->cluster($samples);
    
        // Hitung centroid secara manual
        function calculateCentroid($cluster) {
            $centroid = [];
            if (!empty($cluster) && isset($cluster[0])) {
                $centroid = array_fill(0, count($cluster[0]), 0);
                foreach ($cluster as $sample) {
                    foreach ($sample as $index => $value) {
                        $centroid[$index] += $value;
                    }
                }
                $n = count($cluster);
                foreach ($centroid as $index => $value) {
                    $centroid[$index] /= $n;
                }
            }
            return $centroid;
        }
    
        $centroids = [];
        foreach ($clusters as $cluster) {
            if (count($cluster) > 0) {
                $centroids[] = calculateCentroid($cluster);
            } else {
                $centroids[] = array_fill(0, count($samples[0]), 0);
            }
        }
    
        function calculateDistance($point1, $point2) {
            $distance = 0;
            if (isset($point1[0], $point1[1], $point2[0], $point2[1])) {
                $distance += pow($point1[0] - $point2[0], 2);
                $distance += pow($point1[1] - $point2[1], 2);
                $distance += pow($point1[2] - $point2[2], 2);
                $distance += pow($point1[3] - $point2[3], 2);
            }
            return sqrt($distance);
        }
    
        // Hitung jarak ke setiap centroid untuk ternak yang dipilih
        $sample = [
            normalize($ternak->prod_susu, $minMax['prod_susu']['min'], $minMax['prod_susu']['max']),
            normalize($ternak->prod_sapi, $minMax['prod_sapi']['min'], $minMax['prod_sapi']['max']),
            normalize($ternak->pemilik, $minMax['pemilik']['min'], $minMax['pemilik']['max']),
            normalize($ternak->lahan, $minMax['lahan']['min'], $minMax['lahan']['max']),
        ];
    
        $distances = [
            'C1' => calculateDistance($sample, $centroids[0]),
            'C2' => calculateDistance($sample, $centroids[1]),
            'C3' => calculateDistance($sample, $centroids[2]),
        ];
    
        // Simpan hasil jarak ke database
        $existData = Kriteria::where('kelurahan', $ternak->kelurahan)->first();
        if ($existData) {
            $existData->update([
                'c1' => $distances['C1'] ?? 0,
                'c2' => $distances['C2'] ?? 0,
                'c3' => $distances['C3'] ?? 0,
            ]);
        } else {
            Kriteria::create([
                'kelurahan' => $ternak->kelurahan,
                'c1' => $distances['C1'] ?? 0,
                'c2' => $distances['C2'] ?? 0,
                'c3' => $distances['C3'] ?? 0,
            ]);
        }
    
        return redirect()->back();
    }    
    
    public function destroy($id) {
        $wilayah = Ternak::findOrFail($id);
        $wilayah->delete();
        return redirect()->back();
    }
}