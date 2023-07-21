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
        $user = User::where('id', Auth::user()->id)->first();

        $ttd = Ttd::select('id', 'id_surat')->where('id_surat', $id)->first();

        $tangan = Ttd::join('users', 'users.id', '=', 'ttd.id_user')
        ->select('ttd.*','users.*')
        ->where('ttd.id_surat', $id)
        ->get();
        // dd($tangan);
        $tanda = Ttd::join('users', 'users.id', 'ttd.id_user')
                    ->select('users.*', 'ttd.*')
                    ->where('ttd.id_surat', $id)
                    ->get();
                    // dd($tanda);

        if(empty($ttd->id_surat)){
            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
            ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
            ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
            ->join('users', 'users.id', '=', 'surat.id_user')
            ->select('surat.*', 'surat.id as id_surat', 'users.*', 'users.nama as nama_user','macam.*', 'macam.nama as macam',
                    'macam.id as id_macam', 'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
            ->where('surat.id', $id)
            ->get();


        }
        elseif(!empty($ttd->id_surat)){
            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    // ->join('ttd', 'surat.id', '=', 'ttd.id_surat')
                    ->select('surat.*', 'surat.id as id_surat', 'users.id', 'users.nama as nama_user', 'macam.nama as macam',
                            'macam.id as id_macam', 'kondisi_barang.id', 'kondisi_barang.nama as kondisi')
                    ->where('surat.id', $id)
                    // ->where('ttd.id_surat', $id)
                    ->get();

            // $tanda = Ttd::join('users', 'users.id', 'ttd.id_surat')
            //         ->select('users.*', 'ttd.*')
            //         ->where('ttd.id_surat', $id)
            //         ->get();
                    // dd($tanda);
        }
        $data = PDF::loadview('super/laporan_pdf', compact('surat', 'id', 'macam', 'kondisi', 'ttd', 'tanda', 'tangan'));
        //mendownload laporan.pdf
    	// return $data->download('laporan_pdf.pdf');
    	return $data->stream();
    }
}
