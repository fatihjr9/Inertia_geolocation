<?php

namespace App\Http\Controllers;

use App\Models\Ternak;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
    public function destroy($id) {
        $wilayah = Ternak::findOrFail($id);
        $wilayah->delete();
        return redirect()->back();
    }
}
