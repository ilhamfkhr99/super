<?php

namespace App\Http\Controllers;

use App\Models\KondisiBarang;
use App\Models\MacamPerbaikan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Ui\Presets\React;
use Symfony\Component\Console\Input\Input;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function macam_perbaikan()
    {
        $macam = MacamPerbaikan::all();

        return view('super/master/macam', compact('macam'));
    }

    public function tambah_macam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => ['required', 'max:100'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/macam');

        }else{
            $macam                  = new MacamPerbaikan();
            $macam->nama            = $request->nama;
            $macam->save();

            toast('Data Berhasil ditambahkan!','success');
            return redirect('super/macam');

        }
    }

    public function edit_macam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => ['required', 'max:100'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/macam');
        }else{

            MacamPerbaikan::where('id', $request->id)
            ->update([
                'nama' => $request->nama
            ]);

            toast('Data Berhasil ditambahkan!','success');
            return redirect('super/macam');
        }
    }

    public function hapus_macam($id)
    {
        $macam = MacamPerbaikan::find($id);
        $macam->delete();

        toast('Data Berhasil dihapus!','success');
        return redirect('super/macam');
    }

    public function kondisi_barang()
    {
        $kondisi = KondisiBarang::all();
        return view('super/master/kondisi', compact('kondisi'));
    }

    public function tambah_kondisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => ['required', 'max:100'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/macam');

        }else{
            $kondisi                  = new KondisiBarang();
            $kondisi->nama            = $request->nama;
            $kondisi->save();

            toast('Data Berhasil ditambahkan!','success');
            return redirect('super/kondisi');

        }
    }
    public function edit_kondisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => ['required', 'max:100'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/kondisi');
        }else{

            KondisiBarang::where('id', $request->id)
            ->update([
                'nama' => $request->nama
            ]);

            toast('Data Berhasil ditambahkan!','success');
            return redirect('super/kondisi');
        }
    }
    public function hapus_kondisi($id)
    {
        $kondisi = KondisiBarang::find($id);
        $kondisi->delete();

        toast('Data Berhasil dihapus!','success');
        return redirect('super/kondisi');
    }
}
