<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gudang;

class GudangcategoryController extends Controller
{
    public function showGudang()
    {
        $gudd = Gudang::all();

        return view('categorygudang', compact( 'gudd'));
    }

    public function tambahcategory()
    {
        $gudd = Gudang::all();

        return view ('categorygudang', compact('gudd'));
    }

    public function insertcategory(Request $request)
    {
        $this->validate($request, [
            'gudang' => 'required|regex:/^[a-zA-Z\s]+$/'
        ], [
            'gudang.required' => 'Nama Gudang harus diisi!',
            'gudang.regex' => 'Nama Gudang hanya boleh menggunakan huruf.'
        ]);

        Gudang::create($request->all());
        return redirect()->route('categorygudang')->with('toast_success', 'Kategori Gudang berhasil ditambahkan');
    }

    public function editcategory($id)
    {
        $gudd = Gudang::find($id);

        // $dd = Gudang::all();
        return view('editcategory', compact('gudd'));
    }

    public function updatecategory(Request $request, $id){
        $this->validate($request, [
            'gudang' => 'required|regex:/^[a-zA-Z\s]+$/'
        ], [
            'gudang.required' => 'Nama Gudang harus diisi!',
            'gudang.regex' => 'Nama Gudang hanya boleh menggunakan huruf.'
        ]);

        $gudd = Gudang::find($id);
        $gudd->update($request->all());

        return redirect()->route('categorygudang')->with('toast_success', 'Kategori Gudang berhasil diubah');
    }

    public function deletecategory($id){
        $gudd = Gudang::find($id);
        $gudd->delete();

        return redirect()->route('categorygudang')->with('toast_success', 'Kategori Gudang berhasil dihapus');
    }
}
