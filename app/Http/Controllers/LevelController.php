<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Validator;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function level()
    {
        $level = Level::all();
        return view('super.master.level', compact('level'));
    }

    public function tambah_level(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level' => ['required', 'string'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/level');
        }else{

            $level = new level();
            $level->level = $request->level;
            $level->save();

            toast('Data Berhasil ditambahkan!','success');
            return redirect('super/level');
        }
    }

    public function edit_level(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level' => ['string'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/level');
        }else{

            Level::where('id', $request->id)
            ->update([
                'level' => $request->level
            ]);

            toast('Data Berhasil diubah!','info');
            return redirect('super/level');
        }
    }

    public function hapus_level($id)
    {
        $level = Level::find($id);
        $level->delete($id);

        toast('Data Berhasil dihapus!','success');
        return redirect('super/level');

    }
}
