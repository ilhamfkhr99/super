<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Level;
use App\Models\Organisasi;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bidang = Organisasi::orderBy('id', 'asc')->orderBy('id_parent', 'asc')->get();
        return view('super.master.bidang', compact('bidang'));
    }
    public function unit(Request $request, $id)
    {
        // $bidang = Bidang::where('id', $id)->first();
        $unit = Organisasi::where('id_parent', $id)->get();
        return view('super.master.unit', compact('unit', 'id'));
    }
    public function tambah_unit (Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => ['required'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/unit/'.$id);

        }else{
            if(Organisasi::where('nama', '=', $request->nama)->exists())
            {
                toast('Unit Sudah Ada!','error');
                return redirect('super/unit/'.$id);

            }else{

                $unit = new Organisasi();
                $unit->id_parent   = $id;
                $unit->nama        = $request->nama;
                $unit->save();

                toast('Data Berhasil ditambahkan!','success');
                return redirect('super/unit/'.$id);
            }
        }
    }
    public function edit_unit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => ['required'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/unit/'.$id);

        }else{
            if(Organisasi::where('nama', '=', $request->nama)->exists())
            {
                toast('Unit Sudah Ada!','error');
                return redirect('super/unit/'.$id);

            }else{
                Organisasi::where('id', $request->id)
                ->update([
                    'id_parent' => $id,
                    'nama'      => $request->nama,
                ]);

                toast('Data Berhasil diupdate!','success');
                return redirect('super/unit/'.$id);
            }
        }
    }

    public function hapus_unit(Request $request, $id, $id_unit)
    {
        $unit = Organisasi::find($id_unit);
        $unit->delete($id_unit);

        toast('Data Berhasil dihapus!','success');
        return redirect('super/unit/'.$id);
    }

    public function tambah_bidang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/bidang');
        }else{

            $bidang = new Organisasi();
            $bidang->id_parent = $request->id_parent;
            $bidang->nama = $request->nama;
            $bidang->save();

            toast('Data Berhasil ditambahkan!','success');
            return redirect('super/bidang');
        }
    }

    public function edit_bidang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['string'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/bidang');
        }else{

            Organisasi::where('id', $request->id)
            ->update([
                'nama' => $request->nama,
                'id_parent' => $request->id_parent
            ]);

            toast('Data Berhasil diubah!','success');
            return redirect('super/bidang');
        }
    }

    public function hapus_bidang($id)
    {
        $bidang = Organisasi::find($id);
        $bidang->delete();

        toast('Data Berhasil dihapus!','success');
        return redirect('super/bidang');

    }
}
