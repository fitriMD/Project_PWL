<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Pesanan;
//use App\Http\Controllers\User;
//use App\Models\User;
use App\Models\AlatMusik;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Alert;
use PDF;
//use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$pesanan  = Pesanan::where('user_id', Auth::user()->id)->get();

    	return view('history.index', compact('pesanan'));
    }
    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::with('alatmusik')->where('pesanan_id', $pesanan->id)->get();

        return view('history.detail', compact('pesanan','pesanan_details'));

    }
    public function cetak_pdf($id){
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::with('alatmusik')->where('pesanan_id', $pesanan->id)->get();

        $pdf = PDF::loadview('history.history_pdf', ['pesanan'=>$pesanan,'pesanan_details'=>$pesanan_details]);
        return $pdf->stream();
    }

}
