<?php

namespace App\Http\Controllers;

use App\Models\KondisiBarang;
use App\Models\MacamPerbaikan;
use App\Models\Organisasi;
use App\Models\Surat;
use App\Models\Ttd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade as PDF; //library pdf

use PDF; //library pdf

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function export(Request $request, $id)
    {
        $tabel = 'organisasi';
        $macam = MacamPerbaikan::all();
        $kondisi = KondisiBarang::all();
        $organisasi = Organisasi::select('id')->first();

        $ttda = User::join('surat', 'surat.ttd1', '=', 'users.id')->where('surat.id', $id)->get();
        $ttdb = User::join('surat', 'surat.ttd2', '=', 'users.id')->where('surat.id', $id)->get();
        $ttdc = User::join('surat', 'surat.ttd3', '=', 'users.id')->where('surat.id', $id)->get();
        $ttdd = User::join('surat', 'surat.ttd4', '=', 'users.id')->where('surat.id', $id)->get();
        $ttde = User::join('surat', 'surat.ttd5', '=', 'users.id')->where('surat.id', $id)->get();
        // $kosong = Surat::where('id', $request->id)->first();
        // dd($kosong);
        // dd($ttd);

            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    // ->join('ttd', 'surat.id', '=', 'ttd.id_surat')
                    ->select('surat.*', 'surat.id as id_surat', 'users.id', 'users.tanda_tangan', 'users.nama as nama_user', 'macam.nama as macam',
                            'macam.id as id_macam', 'kondisi_barang.id', 'kondisi_barang.nama as kondisi')
                    ->where('surat.id', $id)
                    // ->where('ttd.id_surat', $id)
                    ->get();
                    // dd($surat);
        // }
        $data = PDF::loadview('super/laporan_pdf', compact('surat', 'id', 'macam', 'kondisi', 'ttda', 'ttdb', 'ttdc', 'ttdd', 'ttde'));
        //mendownload laporan.pdf
    	// return $data->download('laporan_pdf.pdf');
    	return $data->stream();
    }
}
