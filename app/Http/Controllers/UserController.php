<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Level;
use App\Models\Organisasi;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        // $unit = Unit::all();
        $level = Level::all();
        $bidang = Organisasi::all();
        // $users = User::all();
        // $users = User::join('level', 'level.id', '=', 'users.id_level')
        //         ->join('unit', 'unit.id', '=', 'users.unit')
        //         ->join('bidang', 'bidang.id', '=', 'users.bidang')
        //         ->select('users.*', 'unit.nama as nama_unit', 'level.level', 'bidang.nama as nama_bidang')
        //         ->get();

        $users = User::join('level', 'level.id', '=', 'users.id_level')
                ->join('organisasi', 'organisasi.id', '=', 'users.id_organisasi')
                ->select('users.*', 'users.id as id_user','users.nama as nama_user', 'organisasi.*', 'organisasi.nama as nama_unit', 'level.level')
                ->get();

        // $users = User::join('level', 'level.id', '=', 'users.id_level')
        //         ->join('users_unit', 'users_unit.id_user', '=', 'users.id')
        //         ->join('unit', 'users_unit.id_unit', '=', 'unit.id')
        //         ->join('bidang', 'bidang.id', '=', 'users.id_bidang')
        //         ->select('users.*', 'unit.nama as nama_unit', 'level.level', 'bidang.nama as nama_bidang')
        //         ->get();
        return view('super.master.users', compact('users', 'level', 'bidang'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => ['required', 'max:100'],
            'email'    => ['required', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal ditambahkan!','error');
            return redirect('super/users');

        }else{
            $users                  = new user();
            $users->nama            = $request->nama;
            $users->email           = $request->email;
            $users->id_level        = $request->id_level;
            $users->id_organisasi   = $request->id_organisasi;
            $users->password        = bcrypt($request->password);
            $users->save();

        toast('Data Berhasil ditambahkan!','success');
        return redirect('super/users');
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => ['required' ,'max:100'],
            'email'    => ['required' ,'email', 'max:100'],
            // 'password' => ['confirmed', 'min:8'],
        ]);

        if($validator->fails())
        {
            toast('Data Gagal diupdate!','error');
            return redirect('super/users');

        }else{
            if ($request->has('password'))
            {
                User::where('id', $request->id)
                ->update([
                    'nama'          => $request->nama,
                    'email'         => $request->email,
                    'id_level'      => $request->id_level,
                    'id_organisasi' => $request->id_organisasi,
                    'password'      => bcrypt($request->password)
                ]);
                toast('Data Berhasil diupdate!','success');
                return redirect('super/users');
            }else{
                User::where('id', $request->id)
                ->update([
                    'nama'          => $request->nama,
                    'email'         => $request->email,
                    'id_level'      => $request->id_level,
                    'id_organisasi' => $request->id_organisasi,
                ]);

                toast('Data Berhasil diupdate!','success');
                return redirect('super/users');
            }

        }
    }
    public function hapus_user($id)
    {
        $users = User::find($id);
        $users->delete();

        toast('Data Berhasil dihapus!','success');
        return redirect('super/users');
    }
}
