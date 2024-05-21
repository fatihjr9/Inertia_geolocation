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
        return Inertia::render('Dashboard',['wilayah' => $wilayah]);    
    }
}
