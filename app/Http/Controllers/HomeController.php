<?php

namespace App\Http\Controllers;

// use App\Models\Classroom;

use App\Models\Direktur;
use App\Models\Disposisi;
use App\Models\Kabag;
use App\Models\Level;
use App\Models\Organisasi;
use App\Models\Pemohon;
use App\Models\Surat;
use App\Models\Tu;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function beranda(Request $request)
    {
        $organisasi = Organisasi::whereIn('id', range(4,11))->get();
        if(Auth::user()->id_level == 8)
        {
            // $bidang = Organisasi::all();
            // $organisasi = Organisasi::select('id', 'nama')->whereIn('id', range(4,11))->first();
            // $organisasi = Organisasi::whereIn('id', range(4,11))->where('id', Auth::user()->id_organisasi)->get();
            // $bidang = Organisasi::whereIn('id', range(4,11))->orWhere('id_parent', $organisasi->id)->get();
            $bidang = Organisasi::whereIn('id', range(4,11))->get();
            return view('super.beranda', compact('bidang'));

        // Level Kepala Bagian
        }elseif(Auth::user()->id_level == 4)
        {
            $organisasi = Organisasi::where('id', Auth::user()->id_organisasi)->first();
            $bidang = Organisasi::where('id_parent', $organisasi->id)->get();
            return view('user.beranda', compact('bidang'));

        // Level Kepala Seksi
        }elseif(Auth::user()->id_level == 6)
        {
            return view('user.beranda-2', compact('organisasi') );

        // Level Kepala Unit
        }elseif(Auth::user()->id_level == 5)
        {
            if(Auth::user()->id_organisasi != 13)
            {
                $organisasi = Organisasi::where('id', Auth::user()->id_organisasi)->first();
                $bidang = Organisasi::where('id_parent', $organisasi->id)->get();
                return view('user.beranda', compact('bidang'));
            }else{
                // $bidang = Organisasi::where('id', Auth::user()->id_organisasi)->get();
                return view('user.beranda-2' );
            }

        // Level Karyawan
        }elseif(Auth::user()->id_level == 10) {
            return view('user.beranda-2', compact('organisasi'));
        }
    }
    public function pilih_bidang(Request $request, $id, $nama){
        $request->session()->put('id', $id);
        $request->session()->put('nama', $nama);

        toast('Unit Berhasil dipilih!','success');
        return redirect('/beranda');
    }

    // public function pilih_unit(Request $request, $id, $nama)
    // {
    //     $bidang = Organisasi::where('id_parent', $id)->get();
    //     $bidang = Organisasi::where('nama', $nama)->get();

    //     foreach($bidang as $item)
    //     {
    //         $request->session()->put('id_parent', $item->id);
    //         $request->session()->put('nama', $item->nama);
    //     }
    // }
}
