<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ObatImport;

class ObatController extends Controller
{
    //


    function index(){

        $obats = Obat::all();
        return view('obat.index', compact('obats'));
    }


    function create(){
        return view('obat.create');
    }

    function store(Request $request){
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'satuan' => 'required',
            'kategori' => 'required',
        ]);

        $validated['stock'] = 0;
        Obat::create($validated);

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil disimpan');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return response()->json($obat);
    }


    function update(Request $request, Obat $obat){
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'satuan' => 'required',
            'kategori' => 'required',
            'keterangan' => 'nullable',
        ]);

        $obat->update($validated);

        return redirect()->route('obat.index')
                        ->with('success', 'Data obat berhasil diperbarui');
    }
        
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ObatImport, $request->file('file'));

        return back()->with('success', 'Data obat berhasil diimport!');
    }

    public function search(Request $request)
    {
        $keyword = $request->q;

        $data = Obat::where('nama', 'like', "%$keyword%")->limit(10)->get();

        return response()->json($data);
    }


    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index')
                        ->with('success', 'Obat berhasil dihapus');
    }

}
