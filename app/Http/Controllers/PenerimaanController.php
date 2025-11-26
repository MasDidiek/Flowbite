<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Stock;
use App\Models\LogObat;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use App\Models\PenerimaanDetail;
use Illuminate\Support\Facades\DB;


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


    public function simpanPenerimaan(Request $request)
    {
        $items = $request->items;
        $id_penerimaan = $request->id_penerimaan;

        // =======================================
        // VALIDASI: minimal harus 1 item obat
        // =======================================
        if (!$items || !isset($items['id_obat']) || count($items['id_obat']) < 1) {
            return redirect()->back()->with('error', 'Minimal input 1 obat!');
        }

        DB::beginTransaction();

        try {

            foreach ($items['nama_obat'] as $i => $v) {

                // =======================================
                // KONVERSI TANGGAL EXPIRED (dd-mm-yyyy → Y-m-d)
                // =======================================
                $expInput = $items['exp'][$i];
                $expDate  = Carbon::createFromFormat('d-m-Y', $expInput)->format('Y-m-d');

                // =======================================
                // 1. INSERT DETAIL PENERIMAAN
                // =======================================
                PenerimaanDetail::create([
                    'penerimaan_id' => $id_penerimaan,
                    'obat_id'       => $items['id_obat'][$i],
                    'qty'           => $items['qty'][$i],
                    'harga'         => $items['harga'][$i],
                    'no_batch'      => $items['batch'][$i],
                    'exp_date'      => $expDate,
                    'merk' => $items['merk'][$i],
                    'penyedia'      => $items['penyedia'][$i],
                ]);

                // =======================================
                // 2. UPDATE / CREATE STOCK
                // =======================================
                $obat_id  = $items['id_obat'][$i];
                $qty      = $items['qty'][$i];
                $batch    = $items['batch'][$i];
                $harga    = $items['harga'][$i];
                 $merk    = $items['merk'][$i];
                $penyedia = $items['penyedia'][$i];

                // cari stock existing
                $stock = Stock::where('obat_id', $obat_id)
                            ->where('no_batch', $batch)
                            ->first();

                if ($stock) {

                    $stock_awal  = $stock->stock_akhir;
                    $stock_akhir = $stock_awal + $qty;

                    $stock->update([
                        'stock_awal'  => $stock_awal,
                        'stock_akhir' => $stock_akhir,
                        'harga'       => $harga,
                        'exp_date'    => $expDate,
                        'merk'       => $merk,
                        'penyedia'    => $penyedia,
                    ]);

                    $stock_id = $stock->id;

                } else {

                    $stock_awal  = 0;
                    $stock_akhir = $qty;

                    $newStock = Stock::create([
                        'obat_id'     => $obat_id,
                        'stock_awal'  => $stock_awal,
                        'stock_akhir' => $stock_akhir,
                        'harga'       => $harga,
                        'no_batch'    => $batch,
                        'exp_date'    => $expDate,
                        'merk'       => $merk,
                        'penyedia'    => $penyedia,
                    ]);

                    $stock_id = $newStock->id;
                }

                // =======================================
                // 3. INSERT LOG OBAT
                // =======================================
                LogObat::create([
                    'stock_id'      => $stock_id,
                    'jns_transaksi' => 'IN',
                    'qty'           => $qty,
                    'stock_awal'    => $stock_awal,
                    'stock_akhir'   => $stock_akhir,
                    'keterangan'    => 'Penerimaan Obat ID: ' . $id_penerimaan
                ]);
            }

            DB::commit();

            // REDIRECT SUCCESS
            return redirect()
                ->route('penerimaan.obat.detail_penerimaan', $id_penerimaan)
                ->with('success', 'Data obat berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function store(Request $request)
    {

        $items = $request->items;
        $id_penerimaan =  $request->id_penerimaan;



        foreach ($items['nama_obat'] as $i => $v){
            
           $expDate =  $items['exp'][$i];
           $expDate = Carbon::parse($expDate)->format('Y-m-d');

            PenerimaanDetail::create([
                'penerimaan_id'=> $id_penerimaan,
                'obat_id' => $items['id_obat'][$i],
                'qty' => $items['qty'][$i],
                'harga' => $items['harga'][$i],
                'no_batch' => $items['batch'][$i],
                'exp_date' => $expDate,
                'merk' => $items['merk'][$i],
                'penyedia' => $items['penyedia'][$i],
            ]);
        }



            //proses input data ke dalam table stock
         foreach ($items['nama_obat'] as $i => $v) {
            $obat_id   = $items['id_obat'][$i];
            $qty       = $items['qty'][$i];
            $batch     = $items['batch'][$i];
            $exp       = $items['exp'][$i];
            $harga     = $items['harga'][$i];
            $penyedia  = $items['penyedia'][$i];
            $merk      = $items['merk'][$i];

           
            $expDate = Carbon::parse($exp)->format('Y-m-d');
                // Cari stock existing berdasarkan obat + batch
                $stock = Stock::where('obat_id', $obat_id)
                            ->where('no_batch', $batch)
                            ->first();

                if ($stock) {
                    // Jika sudah ada stoknya → update
                    $stock_awal  = $stock->stock_akhir;
                    $stock_akhir = $stock_awal + $qty;

                    $stock->update([
                        'stock_awal'  => $stock_awal,
                        'stock_akhir' => $stock_akhir,
                        'harga'       => $harga,
                        'exp_date'    => $expDate,
                        'merk'    => $merk,
                        'penyedia'    => $penyedia,
                    ]);

                } else {
                    // Jika belum ada → create baru
                    $stock_awal  = 0;
                    $stock_akhir = $qty;

                    Stock::create([
                        'obat_id'     => $obat_id,
                        'stock_awal'  => $stock_awal,
                        'stock_akhir' => $stock_akhir,
                        'harga'       => $harga,
                        'no_batch'    => $batch,
                        'exp_date'    => $expDate ,
                         'merk'    => $merk,
                        'penyedia'    => $penyedia,
                    ]);
                }
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

    public function destroyItem(PenerimaanDetail $PenerimaanDetail)
    {

        // dd($penerimaanDetail);
        $id_penerimaan = $PenerimaanDetail->penerimaan_id;
        $no_batch      = $PenerimaanDetail->no_batch;
          // ambil id penerimaan
        $obat = Obat::find($PenerimaanDetail->obat_id);

           if ($obat) {
              // 2. Kurangi stok
                $obat->stock = $obat->stock - $PenerimaanDetail->qty;
                $obat->save();

            }


            
        // 3. Hapus data di tabel 'stock' berdasarkan no_batch
        $stock = Stock::where('no_batch', $PenerimaanDetail->no_batch)->first();

        if ($stock) {
            // Hapus log yang terkait stok tersebut
            LogObat::where('stock_id', $stock->id)->delete();

            // Hapus data stok
            $stock->delete();
        }

         $PenerimaanDetail->delete();


        
        return redirect()->route('penerimaan.obat.detail_penerimaan', $id_penerimaan)
                                ->with('success', 'Data obat berhasil dihapus');
    }


}
