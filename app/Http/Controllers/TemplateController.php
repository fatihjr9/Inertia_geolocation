<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TemplateController extends Controller
{
    public function index() {
        $wilayah = Wilayah::all();
        $kriteria =  Kriteria::all();
        return Inertia::render('Template', ['wilayah'=>$wilayah, 'kriteria'=>$kriteria]);
    }
}
