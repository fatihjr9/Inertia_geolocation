<?php

namespace App\Http\Controllers;

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
}