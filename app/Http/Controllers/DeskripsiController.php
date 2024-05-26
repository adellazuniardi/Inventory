<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DeskripsiController extends Controller
{
    public function index(Request $request){
        $datas = Deskripsi::latest()->paginate(5);
        // dd($data);
        return view('deskripsi', compact('datas'));
    }

    public function indexxx(Request $request){
        $datas = Deskripsi::latest()->paginate(5);
        // dd($data);
        return view('deskindex', compact('datas'));
    }

    public function tambahdesk(){
        return view('tambahdesk');
    }

    public function insertdesk(Request $request){
        // dd($request->all());

        $this->validate($request,[
            'nama' => 'required|max:255',
            'kapasitas' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);

        $datas = Deskripsi::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto',)->getClientOriginalName());
            $datas->foto = $request->file('foto')->getClientOriginalName();
            $datas->save();
        }
        return redirect()->route('deskindex')->with('toast_success', 'Data Berhasil Di Tambahkan!');
    }

    public function editdesk($id){
        // dd($data);
        $dt = Deskripsi::find($id);

        return view('editdesk',compact('dt'));
    }

    public function updatedesk(Request $request, $id){
        $dt = Deskripsi::find($id);
        $awal = $dt->foto;

        $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'nama' => $request->nama,
            'kapasitas' => $request->kapasitas,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        return redirect()->route('deskripsi')->with('toast_success', 'Data Berhasil Update');
    }

    public function deletedesk($id){
        $datas = Deskripsi::find($id);
        $datas->delete();
        return redirect()->route('deskripsi')->with('toast_success', 'Data Berhasil Di Hapus');
    }

}
