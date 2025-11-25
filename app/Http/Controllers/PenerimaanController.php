<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use App\Models\PenerimaanDetail;

class PenerimaanController extends Controller
{
    //

    function index(){
        return view('penerimaan.obat');
    }

    function penerimaanObat(){

        $penerimaan_obat = Penerimaan::all();
      
        return view('penerimaan.obat_index', compact('penerimaan_obat'));
    }


    function storePenerimaanObat(Request $request){

      $validate = $request->validate([
         'no_pembelian' => 'required|string',
         'tgl_penerimaan' => 'required|string',
         'pengirim' => 'required|string',
          'penerima' => 'required|string',
      ]);

      // Ubah format tanggal
      $validate['tgl_penerimaan'] = Carbon::parse($request->tgl_penerimaan)->format('Y-m-d');
      $penerimaan =  Penerimaan::create($validate);
      $id = $penerimaan->id;

      return redirect()->route('penerimaan.obat.detail_penerimaan', $id)
                     ->with('success', 'Data obat berhasil disimpan');

    }

    function detailPenerimaanObat($id){
        $penerimaan_obat = Penerimaan::with('details.obat')->find($id);
    
       return view('penerimaan.obat_detail', compact('penerimaan_obat'));
    }

    public function store(Request $request)
    {

        $items = $request->items;
        $id_penerimaan =  $request->id_penerimaan;

        foreach ($items['nama_obat'] as $i => $v) {
            PenerimaanDetail::create([
                'penerimaan_id'=> $id_penerimaan,
                'obat_id' => $items['id_obat'][$i],
                'satuan' => $items['satuan'][$i],
                'qty' => $items['qty'][$i],
                'harga' => $items['harga'][$i],
                'no_batch' => $items['batch'][$i],
                'exp_date' => $items['exp'][$i],
                'penyedia' => $items['penyedia'][$i],
            ]);
        }


            return redirect()->route('penerimaan.obat.detail_penerimaan', $id_penerimaan)
                                ->with('success', 'Data obat berhasil disimpan');
    }


    public function edit($id)
    {
        $obat = Penerimaan::findOrFail($id);
        return response()->json($obat);
    }

    
    function update(Request $request, Penerimaan $penerimaan){
        $validated = $request->validate([
            'no_pembelian' => 'required|string',
            'tgl_penerimaan' => 'required|string',
            'pengirim' => 'required|string',
            'penerima' => 'required|string',
            'catatan' => 'nullable',
        ]);

        $penerimaan->update($validated);

        return redirect()->route('penerimaan.obat.index')
                        ->with('success', 'Data penerimaan obat berhasil diperbarui');
    }

    
    public function destroy(Penerimaan $penerimaan)
    {
        $penerimaan->delete();

        return redirect()->route('penerimaan.obat.index')
                        ->with('success', 'Data penerimaan obat berhasil dihapus');
    }


    public function editItem($id)
    {
         $item = PenerimaanDetail::with('obat')->findOrFail($id);


        return response()->json($item);
    }


}
