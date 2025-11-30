<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\PermintaanDetail;
use App\Models\Obat;
use App\Models\Barang;
use App\Models\Alkes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    //

    public function index(){
        $permintaan = Permintaan::all();
        return view('permintaan.index', compact('permintaan'));
    }

    public function create()
    {

        return view('permintaan.create');
    }

    function  store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'no_surat' => 'required',
            'kategori' => 'required',

        ]);

        $tanggal = $request->tanggal;
        $tgl_surat = Carbon::parse($tanggal)->format('Y-m-d');

        $Permintaan = Permintaan::create([
            'tanggal'=> $tgl_surat,
            'no_surat' => $request->no_surat,
            'kategori_permintaan' => $request->kategori,
            'user_id' => auth()->user()->id,
            'status' => 'Draft'
        ]);

        $id = $Permintaan->id;
        return redirect()->route('permintaan.input_item', $id)->with('success', 'Permintaan berhasil ditambahkan');
    }

    function permintaanDetail($id){
        $permintaan = Permintaan::with('details.item')->findOrFail($id);

        return view('permintaan.detail', compact('permintaan'));
    }

    function inputItem($id)
    {
        $permintaan = Permintaan::with('details.item')->findOrFail($id);

        return view('permintaan.input_item', compact('permintaan'));

    }

    public function insertItem(Request $request)
    {


       $data = $request->validate([
            'permintaan_id' => 'required|integer',
            'item_id' => 'required|integer',
            'qty' => 'required|numeric',
            'keterangan' => 'nullable|string',
            'kategori' => 'required|string',
        ]);


        $mapType = [
            'obat' => \App\Models\Obat::class,
            'alkes' => \App\Models\Alkes::class,
        ];

        $kategori = strtolower($data['kategori']); // ← Normalize dulu
        $itemType = $mapType[$kategori] ?? \App\Models\Barang::class;

       PermintaanDetail::create([
            'permintaan_id' => $data['permintaan_id'],
            'item_id' => $data['item_id'],
            'barang_id' => $data['item_id'],
            'item_type' => $itemType, // ← ini penting
            'qty' => $data['qty'],
            'qty_dikirim' => 0,
            'qty_diterima' => 0,
            'note' => $data['keterangan'] ?? null
        ]);

        return response()->json(['success' => true]);
    }

    public function deleteItem($id)
    {
        PermintaanDetail::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }



}
