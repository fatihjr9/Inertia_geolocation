<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class KriteriaController extends Controller
{
    public function index() {
        return Inertia::render('Admin/Kriteria/Home');    
    }
}