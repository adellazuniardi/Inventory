<?php

namespace App\Http\Controllers;

use App\Models\Units;
use App\Models\Gudang;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request){

        $gud = Gudang::all();

        $query = Inventory::with('gudang')->latest();

        if ($request->has('search')) {
            $query->where('namabarang', 'LIKE', "%" .$request->search. '%');
        }

        if ($request->has('gudang')) {
            $query->where('unit', $request->gudang);
        }

        $data = $query->paginate(5);

        return view('inventory', compact(['data', 'gud']));
    }

    public function indexx(Request $request){

        $gud = Gudang::all();

        $query = Inventory::with('gudang')->latest();

        if ($request->has('search')) {
            $query->where('namabarang', 'LIKE', "%" .$request->search. '%');
        }

        if ($request->has('gudang')) {
            $query->where('unit', $request->gudang);
        }

        $data = $query->paginate(5);

        return view('inv', compact(['data', 'gud']));
    }
    public function tambahdata(){

        $gud = Gudang::all();
        return view('tambahdata',compact('gud'));
    }

    public function insertdata(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'namabarang' => 'required|max:255',
            'unit' => 'required',
            'namapic' => 'required',
            'kontakpic' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        Inventory::create($request->all());
        return redirect()->route('inv')->with('toast_success', 'Data Berhasil Di Tambahkan!');
    }

    public function editdata($id){
        $gud = Gudang::all();
        $data = Inventory::with('gudang')->find($id);
        // dd($data);
        return view('editdata',compact('data', 'gud'));
    }

    public function updatedata(Request $request, $id){
        $data = Inventory::find($id);
        $data->update($request -> all());

        // $gud = Gudang::find($request->unit);

        return redirect()->route('inventory')->with('toast_success', 'Data Berhasil Update');
    }

    public function deletedata($id){
        $data = Inventory::find($id);
        $data->delete();
        return redirect()->route('inventory')->with('toast_success', 'Data Berhasil Di Hapus');
    }


}
