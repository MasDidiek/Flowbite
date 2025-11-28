<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    //

    public function index(){
        $permintaan = Permintaan::all();
        return view('permintaan.index', compact('permintaan'));
    }
}
