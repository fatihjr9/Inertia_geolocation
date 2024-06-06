<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index() {
        $data = Wilayah::all();
        return Inertia::render('Home',[
            'data' => $data,
            'canLogin' => Route::has('login'), // pastikan canLogin disediakan
        ]);    
    }
    
    public function setKriteria() {
        $wilayah = Wilayah::all();
        $kriteria = Kriteria::all();
        return response()->json([
            'wilayah' => $wilayah,
            'kriteria' => $kriteria
        ]);    
    }

    public function getKriteria($kelurahan) {
        $wilayah = Wilayah::where('kelurahan', $kelurahan)->first();
        $kriteria = Kriteria::where('kelurahan', $kelurahan)->get();
        return response()->json([
            'wilayah' => $wilayah,
            'kriteria' => $kriteria
        ]);    
    }
}