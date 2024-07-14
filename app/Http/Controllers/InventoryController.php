<?php

namespace App\Http\Controllers;

// use App\Models\Units;
use App\Models\Gudang;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InventoryController extends Controller
{
    public function index(Request $request){

        $gud = Gudang::all();

        $query = Inventory::with('gudang')->latest();

        //search
        if ($request->has('search')) {
            $query->where('namabarang', 'LIKE', "%" .$request->search. '%');
        }

        // if ($request->has('tanggal_masuk')) {
        //     $query->whereDate('tanggal_masuk', $request->tanggal_masuk);
        // }

        //filter
        if ($request->has('gudang')) {
            $query->where('gudang_inv', $request->gudang);
        }

        //pagination
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
            $query->where('gudang_inv', $request->gudang);
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
            'gudang_inv' => 'required|min:1',
            'namapic' => 'required|regex:/^[a-zA-Z\s]+$/',
            'kontakpic' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ], [
            // 'required' => 'Kolom :attribute wajib diisi.',
                'namabarang.required' => 'Nama Barang harus diisi!',
                'gudang_inv.required' => 'Gudang harus dipilih!',
                'gudang_inv.min' => 'Gudang harus dipilih!',
                'namapic.required' => 'Gudang harus diisi!',
                'kontakpic.required' => 'Kontak PIC harus diisi!',
                'tanggal_masuk.required' => 'Tanggal Masuk harus diisi!',
                'tanggal_keluar.required' => 'Tanggal Keluar harus diisi!',

                'max' => [
                    'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                ],
                'namapic.regex' => 'Nama PIC hanya boleh berisi huruf.', // Pesan kesalahan kustom
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

        $this->validate($request, [
            'namabarang' => 'required',
            'namapic' => 'required|regex:/^[a-zA-Z\s]+$/',
            'kontakpic' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_keluar' => 'required',
        ],[
            // 'required' => 'Kolom :attribute wajib diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'namabarang.required' => 'Nama Barang harus diisi!',
            'namapic.required' => 'Nama Barang harus diisi!',
            'kontakpic.required' => 'Kontak PIC harus diisi!',
            'tanggal_masuk.required' => 'Tanggal Masuk harus diisi!',
            'tanggal_keluar.required' => 'Tanggal Keluar harus diisi!',
            'namapic.regex' => 'Nama PIC hanya boleh berisi huruf dan spasi.',
        ]);
        $data = Inventory::find($id);
        $data->update($request -> all());

        // $gud = Gudang::find($request->gudang_inv);

        return redirect()->route('inventory')->with('toast_success', 'Data Berhasil Update');
    }

    public function deletedata($id){
        $data = Inventory::find($id);
    if ($data) {
        $data->delete();
        return redirect()->route('inventory')->with('toast_success', 'Data Berhasil Di Hapus');
    }
    return redirect()->route('inventory')->with('toast_error', 'Data Tidak Ditemukan');
    }

    public function dashboard()
    {
        // Total Barang
        $totalBarang = Inventory::count();

        // Barang Akan Keluar dalam seminggu
        $barangAkanKeluar = Inventory::where('tanggal_keluar', '>=', Carbon::now())
                                     ->where('tanggal_keluar', '<=', Carbon::now()->addWeek())
                                     ->count();

        // Barang Baru Masuk dalam seminggu
        $barangBaruMasuk = Inventory::where('tanggal_masuk', '>=', Carbon::now()->subWeek())
                                    ->count();

        // Barang Per Gudang
        // $barangPerGudang = Gudang::withCount('inventories')->get();

        // Barang Masuk dalam sebulan
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $barangMasukSebulan = Inventory::whereBetween('tanggal_masuk', [$startOfMonth, $endOfMonth])->count();

        // Barang Keluar dalam sebuladeskn
        $barangKeluarSebulan = Inventory::whereBetween('tanggal_keluar', [$startOfMonth, $endOfMonth])->count();

        // Mengumpulkan data barang masuk dan keluar per gudang
        // $gudangs = Gudang::all();
        // $barangMasukGudang = [];
        // $barangKeluarGudang = [];
        // $gudangLabels = [];

        // foreach ($gudangs as $gudang) {
        //     $gudangLabels[] = $gudang->gudang;
        //     $barangMasukGudang[] = Inventory::where('gudang_inv', $gudang->id)
        //                                     ->whereMonth('tanggal_masuk', Carbon::now()->month)
        //                                     ->count();
        //     $barangKeluarGudang[] = Inventory::where('gudang_inv', $gudang->id)
        //                                      ->whereMonth('tanggal_keluar', Carbon::now()->month)
        //                                      ->count();
        // }
        // dd($gudangLabels, $barangMasukGudang, $barangKeluarGudang);

        return view('home', compact(
            'totalBarang',
            'barangAkanKeluar',
            'barangBaruMasuk',
            'barangMasukSebulan',
            'barangKeluarSebulan',
        ));
    }
}




