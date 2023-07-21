<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Ttd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TtdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(Request $request, $id)
    {
        $surat = Surat::where('id', $id)->first();
        $folderPath = public_path('signatures/');

        $image_parts = explode(";base64,", $request->tanda_tangan);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $tanda_tangan = uniqid() . '.'.$image_type;

        $image_base64 = base64_decode($image_parts[1]);

        $file = $folderPath . $tanda_tangan;
        file_put_contents($file, $image_base64);

        $ttd = new Ttd();
        $ttd->id_user = Auth::user()->id;
        $ttd->id_surat = $surat->id;
        $ttd->tanda_tangan = $tanda_tangan;
        $ttd->save();

        // Super Admin
        if(Auth::user()->id_level == 8)
        {
            toast('Berkas berhasil ditanda tangan!','success');
            return redirect('super/surat-masuk');

        }elseif(Auth::user()->id_level == 4){
            toast('Berkas berhasil ditanda tangan!','success');
            return redirect('user/surat-perbaikan');
        }else {
            toast('Berkas berhasil ditanda tangan!','success');
            return redirect('user/surat-masuk');
        }

    }
}
