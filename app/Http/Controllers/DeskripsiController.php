<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DeskripsiController extends Controller
{
    public function index(Request $request){

        $gud = Gudang::all();

        $datas = Deskripsi::with('gudang')->latest()->paginate(5);
        // dd($data);
        return view('deskripsi', compact('datas', 'gud'));
    }

    public function indexxx(Request $request){

        $gud = Gudang::all();

        $datas = Deskripsi::latest()->paginate(5);
        // dd($data);
        return view('deskindex', compact('datas', 'gud'));
    }

    public function tambahdesk(){

        $gud = Gudang::all();
        return view('tambahdesk', compact('gud'));
    }

    public function insertdesk(Request $request){
        // dd($request->all());

        $this->validate($request,[
            'gudang_desk' => 'required',
            'kapasitas' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ],[
            'gudang_desk.required' => 'Gudang tidak boleh kosong!',
            'kapasitas.required' => 'Kapasitas Gudang tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi Gudang tidak boleh kosong!',
            'foto.required' => 'Foto Gudang tidak boleh kosong!',
        ]);

        $datas = Deskripsi::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto',)->getClientOriginalName());
            $datas->foto = $request->file('foto')->getClientOriginalName();
            $datas->save();
        }
        return redirect()->route('deskripsi')->with('toast_success', 'Data Berhasil Di Tambahkan!');
    }

    public function editdesk($id){
        // dd($data);
        $gud = Gudang::all();
        $dt = Deskripsi::find($id);

        return view('editdesk',compact('dt', 'gud'));
    }

    public function updatedesk(Request $request, $id){
        $dt = Deskripsi::find($id);
        $awal = $dt->foto;

        $request->validate([
            'gudang_desk' => 'required',
            'kapasitas' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'gudang_desk.required' => 'Gudang tidak boleh kosong!',
            'kapasitas.required' => 'Kapasitas Gudang tidak boleh kosong!',
            'deskripsi.required' => 'Deskripsi Gudang tidak boleh kosong!',
            'foto.required' => 'Foto Gudang tidak boleh kosong!',
        ]);
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('foto')) {
            $foto = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('fotopegawai'), $foto);
            if ($awal != NULL) {
                File::delete(public_path('fotopegawai/'.$awal));
            }
        } else {
            $foto = $awal;
        }

        $dt->update([
            'gudang_desk' => $request->gudang_desk,
            'kapasitas' => $request->kapasitas,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        // dd($dt);


        return redirect()->route('deskripsi')->with('toast_success', 'Data Berhasil Update');
    }

    public function deletedesk($id){
        $datas = Deskripsi::find($id);
        $datas->delete();
        return redirect()->route('deskripsi')->with('toast_success', 'Data Berhasil Di Hapus');
    }

}
