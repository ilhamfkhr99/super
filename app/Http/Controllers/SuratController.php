<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\KondisiBarang;
use App\Models\Lampiran;
use App\Models\MacamPerbaikan;
use App\Models\Organisasi;
use App\Models\Progres;
use App\Models\Surat;
use App\Models\Ttd;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        $macam = MacamPerbaikan::all();
        $kondisi = KondisiBarang::all();

        $bidang = Organisasi::select('id', 'nama')->where('id', Auth::user()->id_organisasi)->first();
        $unit = Organisasi::select('id', 'nama', 'id_parent')->where('id_parent', Auth::user()->id_organisasi)->first();
        // Level Kabag
        if(Auth::user()->id_level == 4)
        {
            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                        ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                        ->join('users', 'users.id', '=', 'surat.id_user')
                        ->select('surat.*', 'surat.id as id_surat','users.*', 'macam.*', 'macam.nama as macam',
                                'kondisi_barang.*', 'kondisi_barang.nama as kondisi', 'organisasi.id_parent')
                        // ->Where('surat.id_user', Auth::user()->id)
                        ->Where('organisasi.id', $bidang->id)
                        ->orderBy('surat.waktu')
                        // ->get();
                        ->paginate(10);

            return view('user/surat/surat-perbaikan', compact('surat', 'macam', 'kondisi'));

            // Level Kasi
        }elseif(Auth::user()->id_level == 6){
            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
            ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
            ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
            ->join('users', 'users.id', '=', 'surat.id_user')
            ->select('surat.*', 'surat.id as id_surat','users.*', 'macam.*', 'macam.nama as macam',
                    'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
            // ->where('surat.id_user', Auth::user()->id)
            ->where('organisasi.id', Auth::user()->id_organisasi)
            ->orderBy('surat.waktu')
            // ->get();
            ->paginate(10);

            return view('user/surat/surat-perbaikan', compact('surat', 'macam', 'kondisi'));

            // Level Karu
        }elseif(Auth::user()->id_level == 7){
            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    // ->where('surat.id_user', Auth::user()->id)
                    ->where('organisasi.id', Auth::user()->id_organisasi)
                    ->orderBy('surat.waktu')
                    // ->get();
                    ->paginate(10);

                    return view('user/surat/surat-perbaikan', compact('surat', 'macam', 'kondisi'));
            // level Kanit
        }elseif(Auth::user()->id_level == 5){

            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    // ->where('surat.id_user', Auth::user()->id)
                    ->where('organisasi.id', Auth::user()->id_organisasi)
                    ->orderBy('surat.waktu')
                    // ->get();
                    ->paginate(10);

                    return view('user/surat/surat-perbaikan', compact('surat', 'macam', 'kondisi'));

                // Level Karyawan
            }elseif(Auth::user()->id_level == 10){
                $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    ->where('surat.id_user', Auth::user()->id)
                    ->orderBy('surat.waktu')
                    // ->get();
                    ->paginate(10);

                    return view('user/surat/surat-perbaikan', compact('surat', 'macam', 'kondisi'));
            }
    }

    public function surat_perbaikan(Request $request)
    {
        $macam = MacamPerbaikan::all();
        $kondisi = KondisiBarang::all();

        // $bidang = Organisasi::select('id', 'nama')->where('id', Auth::user()->id_organisasi)->orWhere('id_parent', Auth::user()->id_organisasi)->first();
        $bidang = Organisasi::select('id', 'nama')->where('id', Auth::user()->id_organisasi)->first();
        $unit = Organisasi::select('id', 'nama', 'id_parent')->where('id_parent', Auth::user()->id_organisasi)->first();

        $tabel = 'organisasi';
        //  Level Super Admin
        if(Auth::user()->id_level == 8)
        {
            if(session('id') <> "")
            {
                $id = $request->session()->get('id');
                $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    // ->join('ttd', 'surat.id', '=', 'ttd.id_surat')
                    ->select('surat.*', 'surat.id as id_surat', 'users.*', 'users.nama as nama_user','macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    ->where('organisasi.id', $id)
                    ->orwhere('organisasi.id_parent', $id)
                    ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                        $query->select('organisasi.id')
                            ->from($tabel)
                            ->where('organisasi.id_parent', $id);
                    })
                    ->orderBy('surat.waktu')
                    ->paginate(10);

                    return view('super/surat/surat-masuk', compact('surat', 'macam'));
            }else{
                toast('Unit Belum Dipilih','error','top-right');
                return redirect('/beranda');
            }

        // Level Kepala Bagian
        }elseif(Auth::user()->id_level == 4) {
            if(session('id') <> "" )
            {
                $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi', 'organisasi.id_parent')
                    // ->Where('surat.id_user', Auth::user()->id)
                    ->Where('organisasi.id', $request->session()->get('id'))
                    ->orWhere('organisasi.id_parent', $request->session()->get('id'))
                    ->orderBy('surat.waktu')
                    ->paginate(10);

                    return view('user/surat/surat-masuk', compact('surat', 'macam', 'kondisi'));
            }else{
                toast('Unit Belum Dipilih','error','top-right');
                return redirect('/beranda');
            }

        // Level Kepala Seksi
        }elseif(Auth::user()->id_level == 6){
            if(Auth::user()->id_organisasi == 12 or Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20)
            {
                if(session('id') <> "")
                {
                    $id = $request->session()->get('id');
                    $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                        ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                        ->join('users', 'users.id', '=', 'surat.id_user')
                        // ->join('ttd', 'ttd.id_surat', '=', 'surat.id')
                        ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                                'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                        ->where('organisasi.id', $request->session()->get('id'))
                        ->orwhere('organisasi.id_parent', $request->session()->get('id'))
                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                            $query->select('organisasi.id')
                                ->from($tabel)
                                ->where('organisasi.id_parent', $id);
                        })
                        ->orderBy('surat.waktu')
                        ->paginate(10);

                        return view('super/surat/surat-masuk', compact('surat', 'macam', 'kondisi', 'id'));

                 }else{
                    toast('Unit Belum Dipilih','error','top-right');
                    return redirect('/beranda');
                }
            }else{

                $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    ->where('organisasi.id', $bidang->id)
                    ->where('users.id_level', '!=', 5)
                    ->orderBy('surat.waktu')
                    ->paginate(10);

                    return view('user/surat/surat-masuk', compact('surat', 'macam', 'kondisi'));
            }

        // Level Kepala Unit
        }elseif(Auth::user()->id_level == 5){
            if(Auth::user()->id_organisasi == 13)
            {
                $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    ->where('organisasi.id', $bidang->id)
                    ->where('users.id_level', '!=', 5)
                    ->orderBy('surat.waktu')
                    ->paginate(10);

                    return view('user/surat/surat-masuk', compact('surat', 'macam', 'kondisi'));
            }else{

                if(session('id') <> "")
                {
                    $id = $request->session()->get('id');
                        $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                        ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                        ->join('users', 'users.id', '=', 'surat.id_user')
                        ->select('surat.*', 'surat.id as id_surat', 'users.*', 'users.nama as nama_user','macam.*', 'macam.nama as macam',
                                'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                        ->where('organisasi.id', $request->session()->get('id'))
                        ->orWhere('organisasi.id_parent', $request->session()->get('id'))
                        ->orderBy('surat.waktu')
                        ->paginate(10);

                            return view('user/surat/surat-masuk', compact('surat', 'macam', 'kondisi'));
                 }else{
                    toast('Unit Belum Dipilih','error','top-right');
                    return redirect('/beranda');
                }
            }

            // Level Karyawan
        }elseif(Auth::user()->id_level == 10 or Auth::user()->id_level == 9){
            if(Auth::user()->id_organisasi == 12 or Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20)
            {
                if(session('id') <> "")
                {
                    $id = $request->session()->get('id');
                    $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                        ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                        ->join('users', 'users.id', '=', 'surat.id_user')
                        ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                                'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                        ->where('organisasi.id', $request->session()->get('id'))
                        ->orwhere('organisasi.id_parent', $request->session()->get('id'))
                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                            $query->select('organisasi.id')
                                ->from($tabel)
                                ->where('organisasi.id_parent', $id);
                        })
                        ->orderBy('surat.waktu')
                        // ->get();
                        ->paginate(10);

                        return view('super/surat/surat-masuk', compact('surat', 'macam', 'kondisi'));

                 }else{
                    toast('Unit Belum Dipilih','error','top-right');
                    return redirect('/beranda');
                }
            }else{

                $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    ->where('organisasi.id', $bidang->id)
                    ->where('users.id_level', '!=', 5)
                    ->orderBy('surat.waktu')
                    ->paginate(10);
                    // ->get();

                    return view('user/surat/surat-masuk', compact('surat', 'macam', 'kondisi'));
            }
        }elseif(Auth::user()->id_level == 7){
            if(session('id') <> "")
            {
                $id = $request->session()->get('id');
                $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                    ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                    ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                    ->join('users', 'users.id', '=', 'surat.id_user')
                    ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                            'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                    ->where('organisasi.id', $request->session()->get('id'))
                    ->orwhere('organisasi.id_parent', $request->session()->get('id'))
                    ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                        $query->select('organisasi.id')
                            ->from($tabel)
                            ->where('organisasi.id_parent', $id);
                    })
                    ->orderBy('surat.waktu')
                    ->paginate(10);

                    return view('user/surat/surat-masuk', compact('surat', 'macam', 'kondisi'));

            }else{
                toast('Unit Belum Dipilih','error','top-right');
                return redirect('/beranda');
            }
        }

    }

    public function catatan_surat(Request $request, $id)
    {
        $catatan = Progres::where('id_surat', $id)->get();
        return view('user/surat/progres', compact('catatan', 'id'));
    }

    public function tambah_catatan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'catatan' => ['required'],
        ]);

        if($validator->fails())
        {
            toast('Catatan Gagal ditambahkan!','error');
            return redirect('user/catatan-surat/'.$id);

        }else{
            $catatan = new Progres();
            $catatan->id_surat = $id;
            $catatan->id_user = Auth::user()->id;
            $catatan->catatan = $request->catatan;
            $catatan->waktu = Carbon::now();
            $catatan->save();

            toast('Catatan berhasil ditambahkan!','success');
            return redirect('user/catatan-surat/'.$id);
        }
    }

    public function edit_catatan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'catatan' => ['required'],
        ]);

        if($validator->fails())
        {
            toast('Catatan Gagal ditambahkan!','error');
            return redirect('user/catatan-surat/'.$id);

        }else{
            Progres::where('id', $request->id)
            ->update([
                'id_surat'  => $id,
                'id_user'   => Auth::user()->id,
                'catatan'   => $request->catatan,
                'waktu'     => Carbon::now(),
            ]);

            toast('Catatan berhasil diupdate!','success');
            return redirect('user/catatan-surat/'.$id);
        }
    }

    public function ajukan_surat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_pemeliharaan' => ['required'],
            'kerusakan'          => ['required'],
            'waktu'              => ['required'],
            'file'               => ['image:jpeg,png,jpg'],
        ]);

        if($validator->fails())
        {
            toast('Surat Gagal ditambahkan!','error');
            return redirect('user/surat-perbaikan');

        }else{
            $surat                     = new Surat();
            $surat->id_organisasi      = $request->id_organisasi;
            $surat->id_macam           = $request->id_macam;
            $surat->id_kondisi         = $request->id_kondisi;
            $surat->id_user            = Auth::user()->id;
            $surat->jenis_pemeliharaan = $request->jenis_pemeliharaan;
            $surat->kerusakan          = $request->kerusakan;
            $surat->waktu              = date('Y-m-d H:i:s', strtotime($request->waktu));
            $surat->status             = 'Menunggu';
            $surat->lokasi             = $request->lokasi;
            $surat->save();

            if ($request->hasFile('file')) {

                    $fileimage = $request->file('file');
                    $ext = $fileimage->getClientOriginalExtension();
                    if($request->file('file')->isValid()){
                        $nama_file = date('YmdHis').".$ext";
                        $upload_path = 'bukti';
                        $request->file('file')->move($upload_path, $nama_file);
                    }

                    $lampiran             = new Lampiran();
                    $lampiran->id_surat   = $surat->id;
                    $lampiran->file       = $nama_file;
                    $lampiran->save();
            }

            toast('Surat Perbaikan Berhasil ditambahkan!','success');
            return redirect('user/surat-perbaikan');
        }
    }
    public function edit_surat(Request $request)
    {
        // dd($request->all());
        $surat = Surat::where('id', $request->id)->first();
        $validator = Validator::make($request->all(), [
            'jenis_pemeliharaan' => ['required'],
            'kerusakan'          => ['required'],
            'waktu'              => ['required'],
            'file'               => ['image:jpeg,png,jpg'],
        ]);

        if($validator->fails())
        {
            toast('Surat Gagal ditambahkan!','error');
            return redirect('user/surat-perbaikan');

        }else{
            Surat::where('id', $request->id)
            ->update([
                'id_organisasi'         => $request->id_organisasi,
                'id_macam'              => $request->id_macam,
                'id_kondisi'            => $request->id_kondisi,
                'id_user'               => Auth::user()->id,
                'jenis_pemeliharaan'    => $request->jenis_pemeliharaan,
                'kerusakan'             => $request->kerusakan,
                'waktu'                 => date('Y-m-d H:i:s', strtotime($request->waktu)),
                'status'                => 'Menunggu',
                'lokasi'                => $request->lokasi,
            ]);

            if ($request->hasFile('file')) {
                $fileimage = $request->file('file');
                $ext = $fileimage->getClientOriginalExtension();
                if($request->file('file')->isValid()){
                    $nama_file = date('YmdHis').".$ext";
                    $upload_path = 'bukti';
                    $request->file('file')->move($upload_path, $nama_file);
                }

                Lampiran::where('id', $request->id)
                ->update([
                    'id_surat' => $surat->id,
                    'file'     => $nama_file
                ]);

                toast('Surat Perbaikan Berhasil diubah!','success');
                return redirect('user/surat-perbaikan');

            }else{
                Surat::where('id', $request->id)
                ->update([
                    'id_organisasi'         => $request->id_organisasi,
                    'id_macam'              => $request->id_macam,
                    'id_kondisi'            => $request->id_kondisi,
                    'id_user'               => Auth::user()->id,
                    'jenis_pemeliharaan'    => $request->jenis_pemeliharaan,
                    'kerusakan'             => $request->kerusakan,
                    'waktu'                 => date('Y-m-d H:i:s', strtotime($request->waktu)),
                    'status'                => 'Belum dikonfirmasi',
                    'lokasi'                => $request->lokasi,
                ]);

                toast('Surat Perbaikan Berhasil diubah!','success');
                return redirect('user/surat-perbaikan');
            }
        }
    }
    public function hapus_surat($id)
    {
        $surat = Surat::find($id);
        $surat->delete();

        toast('Surat Perbaikan Berhasil dihapus!','success');
        return redirect('user/surat-perbaikan');
    }

    public function tindaklanjut_surat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomer'   => ['required'],
            'tindakan' => ['required'],
        ]);

        if($validator->fails())
        {
            toast('Surat Gagal ditambahkan!','error');
            return redirect('user/surat-perbaikan');

        }else{
            Surat::where('id', $request->id)
            ->update([
                'nomer'             => $request->nomer,
                'tindakan'          => $request->tindakan,
                'status'            => 'Proses',
            ]);

            toast('Surat Perbaikan Berhasil ditindaklanjut!','success');
            return redirect('user/surat-masuk');
        }
    }

    public function konfirmasi(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->tanda_tangan))
        {
            toast('Harap Isi Tanda Tangan', 'error');
            return redirect('profile');
        }else{
            Surat::where('id', $request->id_surat)
            ->update([
                'status' => 'Telah dikonfirmasi',
                'ttd1' => Auth::user()->id,
            ]);
            toast('Surat Berhasil dikonfirmasi', 'success');
            return redirect('super/surat-masuk');
        }
    }

    public function ttd_surat(Request $request)
    {
        $kosong = Surat::where('id', $request->id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        if(empty($user->tanda_tangan))
        {
            toast('Harap Isi Tanda Tangan', 'error');
            return redirect('profile');
        }else{
            if((Auth::user()->id_level == 6 && Auth::user()->id_organisasi == 18) or
                (Auth::user()->id_level == 6 && Auth::user()->id_organisasi == 19) or
                (Auth::user()->id_level == 6 && Auth::user()->id_organisasi == 20))
                {
                    Surat::where('id', $request->id_surat)
                    ->update([
                        'status' => 'Telah Diperbaiki',
                        'ttd3' => $user->id,
                    ]);
                    toast('Surat Berhasil ditandatangani', 'success');
                    return redirect()->back();

                }else{
                    Surat::where('id', $request->id_surat)
                    ->update([
                        'status' => 'Telah Diperbaiki',
                        'ttd2' => $user->id,
                    ]);
                    toast('Surat Berhasil ditindaklanjuti', 'success');
                    return redirect()->back();
                }
        }
    }
    public function terima_surat(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $kosong = Surat::where('id', $request->id_surat)->first();
        if(empty($user->tanda_tangan))
        {
            toast('Harap Isi Tanda Tangan', 'error');
            return redirect('profile');
        }else{
            if(Auth::user()->id_organisasi != 18 or Auth::user()->id_organisasi != 19 or Auth::user()->id_organisasi != 20)
            {
                if($kosong->ttd4 != NULL)
                {
                    Surat::where('id', $request->id_surat)
                    ->update([
                        'status' => 'Selesai',
                        'ttd5' => $user->id,
                    ]);

                    toast('Surat Berhasil ditandatangani', 'success');
                    return redirect()->back();
                }else{

                    Surat::where('id', $request->id_surat)
                    ->update([
                        'status' => 'Selesai',
                        'ttd4' => $user->id,
                    ]);

                    toast('Surat Berhasil ditandatangani', 'success');
                    return redirect()->back();
                }

            }elseif(Auth::user()->id_level == 4 or Auth::user()->id_level == 5 or Auth::user()->id_level == 7 or
                    (Auth::user()->id_level == 6 && (Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20) )
                    ){
                Surat::where('id', $request->id_surat)
                ->update([
                    'status' => 'Selesai',
                    'ttd5' => $user->id,
                ]);
                toast('Surat Berhasil ditandatangani', 'success');
                return redirect()->back();
            }
        }
    }
    public function history(Request $request)
    {
        $tabel = 'organisasi';
        $macam = MacamPerbaikan::all();
        $kondisi = KondisiBarang::all();
        if(Auth::user()->id_organisasi == 12 or Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20)
        {
            if(session('id') <> "")
                {
                    $id = $request->session()->get('id');
                    $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                        ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                        ->join('users', 'users.id', '=', 'surat.id_user')
                        ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                                'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                        ->where('organisasi.id', $request->session()->get('id'))
                        ->where('surat.status', 'Selesai')
                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                            $query->select('organisasi.id')
                                ->from($tabel)
                                ->where('organisasi.id', $id)
                                ->where('surat.status', 'Selesai');
                        })
                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                            $query->select('organisasi.id')
                                ->from($tabel)
                                ->where('surat.status', 'Selesai')
                                ->where('organisasi.id_parent', $id);
                        })
                        ->orderBy('surat.waktu')
                        ->get();

                        return view('super/surat/history', compact('surat', 'macam', 'kondisi'));

                 }else{
                    toast('Unit Belum Dipilih','error','top-right');
                    return redirect('/beranda');
                }
        }elseif(Auth::user()->id_level == 10){
            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                        ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                        ->join('users', 'users.id', '=', 'surat.id_user')
                        ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                                'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                        ->where('organisasi.id', Auth::user()->id_organisasi)
                        ->where('surat.status', 'Selesai')
                        ->orderBy('surat.waktu')
                        ->get();

                        return view('user/surat/history', compact('surat', 'macam', 'kondisi'));
        }else{
            if(session('id') <> "")
            {
                    $id = $request->session()->get('id');
                    $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                        ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
                        ->join('users', 'users.id', '=', 'surat.id_user')
                        ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                                'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
                        ->where('organisasi.id', $request->session()->get('id'))
                        ->where('surat.status', 'Selesai')
                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                            $query->select('organisasi.id')
                                ->from($tabel)
                                ->where('organisasi.id', $id)
                                ->where('surat.status', 'Selesai');
                        })
                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $id){
                            $query->select('organisasi.id')
                                ->from($tabel)
                                ->where('surat.status', 'Selesai')
                                ->where('organisasi.id_parent', $id);
                        })
                        ->orderBy('surat.waktu')
                        ->get();

                        return view('super/surat/history', compact('surat', 'macam', 'kondisi'));

            }else{
                toast('Unit Belum Dipilih','error','top-right');
                return redirect('/beranda');
            }
        }
    }
    public function history_perbaikan(Request $request)
    {
        $macam = MacamPerbaikan::all();
        $kondisi = KondisiBarang::all();
        if(Auth::user()->id_level == 4 or Auth::user()->id_level == 5 or Auth::user()->id_level == 6 or Auth::user()->id_level == 7)
        {
            $surat = Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
            ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
            ->join('kondisi_barang', 'kondisi_barang.id', '=', 'surat.id_kondisi')
            ->join('users', 'users.id', '=', 'surat.id_user')
            ->select('surat.*', 'surat.id as id_surat','users.*', 'users.nama as nama_user', 'macam.*', 'macam.nama as macam',
                    'kondisi_barang.*', 'kondisi_barang.nama as kondisi')
            ->where('organisasi.id', Auth::user()->id_organisasi)
            ->where('surat.status', 'Selesai')
            ->orderBy('surat.waktu')
            ->get();

            return view('user/surat/history', compact('surat', 'macam', 'kondisi'));
        }
    }
}
