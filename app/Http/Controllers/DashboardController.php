<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() {
        $wilayah = Wilayah::count();
        $kriteria = Kriteria::all();
        // inisialisasi
        $totalC1 = 0;
        $totalC2 = 0;
        $totalC3 = 0;
        // 
        foreach ($kriteria as $item) {
            $maxCluster = max($item->c1, $item->c2, $item->c3);

            if ($item->c1 == $maxCluster) {
                $totalC1++;
            } elseif ($item->c2 == $maxCluster) {
                $totalC2++;
            } elseif ($item->c3 == $maxCluster) {
                $totalC3++;
            }
        }
        return Inertia::render('Dashboard',['wilayah' => $wilayah, 'c1'=> $totalC1, 'c2' => $totalC2, 'c3'=> $totalC3]);    
    }
}
