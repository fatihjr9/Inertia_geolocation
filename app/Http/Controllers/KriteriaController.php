<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KriteriaController extends Controller
{
    public function index() {
        $kriteria = Kriteria::latest()->get();
        return Inertia::render('Admin/Kriteria/Home',['data' => $kriteria]);    
    }
    public function destroy($id) {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();
        return redirect()->back();
    }
}
