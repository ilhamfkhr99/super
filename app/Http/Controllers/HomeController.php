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
        // Super Admin
        if(Auth::user()->id_level == 8)
        {
            $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
            ->where('waktu', date('Y'))
            ->groupBy(DB::raw("bulan"))
            ->pluck('count', 'bulan');

            $labels = $c_surat->keys();
            $data = $c_surat->values();
            $bidang = Organisasi::whereIn('id', range(4,11))->get();

            return view('super.beranda', compact('bidang', 'labels', 'data', 'c_surat'));

        // Level Kepala Bagian
        }elseif(Auth::user()->id_level == 4)
        {
            $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
            ->where('waktu', date('Y'))
            ->groupBy(DB::raw("bulan"))
            ->pluck('count', 'bulan');

            $labels = $c_surat->keys();
            $data = $c_surat->values();

            $organisasi = Organisasi::where('id', Auth::user()->id_organisasi)->first();
            $bidang = Organisasi::where('id_parent', $organisasi->id)->get();

            return view('user.beranda', compact('bidang', 'labels', 'data', 'c_surat'));

        // Level Kepala Ruangan
        }elseif(Auth::user()->id_level == 7)
        {
            $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
            ->where('waktu', date('Y'))
            ->groupBy(DB::raw("bulan"))
            ->pluck('count', 'bulan');

            $labels = $c_surat->keys();
            $data = $c_surat->values();

            return view('user.beranda-2', compact('organisasi', 'labels', 'data', 'c_surat'));

        // Level Kepala Seksi
        }elseif(Auth::user()->id_level == 6)
        {
            $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
            ->where('waktu', date('Y'))
            ->groupBy(DB::raw("bulan"))
            ->pluck('count', 'bulan');

            $labels = $c_surat->keys();
            $data = $c_surat->values();

            return view('user.beranda-2', compact('organisasi', 'labels', 'data', 'c_surat'));

        // Level Kepala Unit
        }elseif(Auth::user()->id_level == 9)
        {
            $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
            ->where('waktu', date('Y'))
            ->groupBy(DB::raw("bulan"))
            ->pluck('count', 'bulan');

            $labels = $c_surat->keys();
            $data = $c_surat->values();
            return view('user.beranda-2', compact('organisasi', 'labels', 'data', 'c_surat'));
        }
        // Kepala Unit
        elseif(Auth::user()->id_level == 5)
        {
            if(Auth::user()->id_organisasi != 13)
            {
                $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
                    ->where('waktu', date('Y'))
                    ->groupBy(DB::raw("bulan"))
                    ->pluck('count', 'bulan');

                $labels = $c_surat->keys();
                $data = $c_surat->values();
                $organisasi = Organisasi::where('id', Auth::user()->id_organisasi)->first();
                $bidang = Organisasi::where('id_parent', $organisasi->id)->get();

                return view('user.beranda', compact('bidang', 'labels', 'data', 'c_surat'));
            }else{
                $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
                ->where('waktu', date('Y'))
                ->groupBy(DB::raw("bulan"))
                ->pluck('count', 'bulan');

                $labels = $c_surat->keys();
                $data = $c_surat->values();
                // $bidang = Organisasi::where('id', Auth::user()->id_organisasi)->get();
                return view('user.beranda-2', compact('labels', 'data', 'c_surat'));
            }

        // Level Karyawan
        }elseif(Auth::user()->id_level == 10) {
            $c_surat = Surat::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(waktu) as bulan"))
                    ->where('waktu', date('Y'))
                    ->groupBy(DB::raw("bulan"))
                    ->pluck('count', 'bulan');

            $labels = $c_surat->keys();
            $data = $c_surat->values();
            return view('user.beranda-2', compact('organisasi', 'c_surat', 'data', 'labels'));
        }
    }
    public function pilih_bidang(Request $request, $id, $nama){
        $request->session()->put('id', $id);
        $request->session()->put('nama', $nama);

        toast('Unit Berhasil dipilih!','success');
        return redirect('/beranda');
    }

    public function profil(Request $request)
    {
        // $profil = User::where('id', Auth::user()->id)->get();
        $profil = User::join('level', 'level.id', '=', 'users.id_level')
                ->join('organisasi', 'organisasi.id', '=', 'users.id_organisasi')
                ->select('users.*', 'users.id as id_user','users.nama as nama_user', 'organisasi.*', 'organisasi.nama as nama_unit', 'level.level')
                ->where('users.id', Auth::user()->id)
                ->get();

        $level = Level::all();
        $bidang = Organisasi::all();
        return view('profil', compact('profil', 'level', 'bidang'));
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
