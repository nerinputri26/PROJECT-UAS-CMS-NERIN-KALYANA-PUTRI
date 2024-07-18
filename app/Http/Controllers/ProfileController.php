<?php

namespace App\Http\Controllers;

use App\Models\MetaData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index() {
        return view('Admin.pages.profile.index', [
            'title' => 'Profile'
        ]);
    }


    public function update(Request $request) {
        $request->validate([
            '_foto' => 'mimes:jpeg,jpg,png,jfif',
        ], [
            '_foto.mimes' => 'Foto Yang Dimasukan Hanya Boleh Berekstensi JPEG, JPG, PNG, dan JFIF',
        ]);

        if ($request->has('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto/profile'), $foto_baru);

            $foto_lama = getMetaValue('_foto');
            File::delete(public_path('foto/profile') . "/" . $foto_lama);

            MetaData::updateOrCreate(['meta_key' => '_foto'] , ['meta_value' => $foto_baru]);
        }

        MetaData::updateOrCreate(['meta_key' => '_nama'] , ['meta_value' => $request->_nama]);
        MetaData::updateOrCreate(['meta_key' => '_aboutMe'] , ['meta_value' => $request->_aboutMe]);
        MetaData::updateOrCreate(['meta_key' => '_facebook'] , ['meta_value' => $request->_facebook]);
        MetaData::updateOrCreate(['meta_key' => '_instagram'] , ['meta_value' => $request->_instagram]);
        MetaData::updateOrCreate(['meta_key' => '_youtube'] , ['meta_value' => $request->_youtube]);
        MetaData::updateOrCreate(['meta_key' => '_github'] , ['meta_value' => $request->_github]);
        MetaData::updateOrCreate(['meta_key' => '_whatsapp'] , ['meta_value' => $request->_whatsapp]);
        MetaData::updateOrCreate(['meta_key' => '_email'] , ['meta_value' => $request->_email]);
        MetaData::updateOrCreate(['meta_key' => '_resume'] , ['meta_value' => $request->_resume]);

        return redirect(route('profile.index'))->with('Sukses', 'Data Berhasil Di Tambah/Update');
    }
}
