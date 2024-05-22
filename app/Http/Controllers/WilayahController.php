<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class WilayahController extends Controller
{
    public function index() {
        $data = Wilayah::latest()->get();
        return Inertia::render('Admin/Wilayah/Home',[
            'data' => $data,
        ]);    
    }

    public function create() {
        return Inertia::render('Admin/Wilayah/Create');    
    }

    public function store(Request $request) {
        $data = $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
            'kelurahan' => 'required'
        ]);

        Wilayah::create($data);
        return Inertia::location(route('wilayah-index'));
    }

    public function edit($id) {
        $wilayah = Wilayah::findOrFail($id);
        return Inertia::render('Admin/Wilayah/Edit', ['wilayah'=> $wilayah]);
    }    

    public function update(Request $request, $id) {
        $wilayah = Wilayah::findOrFail($id);
        $data = $request->validate([
            'longitude' => 'required',
            'latitude' => 'required',
        ]);
    
        $wilayah->update($data);
        return Inertia::location(route('wilayah-index'));
    }

    public function destroy($id) {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();
        return redirect()->back();
    }
}
