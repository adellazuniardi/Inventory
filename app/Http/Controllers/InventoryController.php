<?php

namespace App\Http\Controllers;

// use App\Models\Units;
use App\Models\Gudang;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InventoryController extends Controller
{

    public function barangMasuk(Request $request)
    {
        $gud = Gudang::all();
        $query = Inventory::with('gudang')->latest();

        // Barang yang berstatus 'masuk'
        $query->where('status', 'masuk');

        if ($request->has('search')) {
            $query->where('namabarang', 'LIKE', "%" . $request->search . '%');
        }

        if ($request->has('gudang')) {
            $query->where('gudang_inv', $request->gudang);
        }

        $data = $query->paginate(5);

         return view('inventory', compact(['data', 'gud']));
    }

    public function invMasuk(Request $request)
    {
        $gud = Gudang::all();
        $query = Inventory::with('gudang')->latest();

        // Barang yang berstatus 'masuk'
        $query->where('status', 'masuk');

        if ($request->has('search')) {
            $query->where('namabarang', 'LIKE', "%" . $request->search . '%');
        }

        if ($request->has('gudang')) {
            $query->where('gudang_inv', $request->gudang);
        }

        $data = $query->paginate(5);

         return view('inv', compact(['data', 'gud']));
    }

    public function barangKeluar(Request $request)
    {
        $gud = Gudang::all();
        $query = Inventory::with('gudang')->latest();

         // Barang yang berstatus 'keluar'
         $query->where('status', 'keluar');

         if ($request->has('search')) {
             $query->where('namabarang', 'LIKE', "%" . $request->search . '%');
         }

         if ($request->has('gudang')) {
             $query->where('gudang_inv', $request->gudang);
         }

         $data = $query->paginate(5);

         return view('inventorykeluar', compact(['data', 'gud']));
    }

    public function invKeluar(Request $request)
    {
        $gud = Gudang::all();
        $query = Inventory::with('gudang')->latest();

         // Barang yang berstatus 'keluar'
         $query->where('status', 'keluar');

         if ($request->has('search')) {
             $query->where('namabarang', 'LIKE', "%" . $request->search . '%');
         }

         if ($request->has('gudang')) {
             $query->where('gudang_inv', $request->gudang);
         }

         $data = $query->paginate(5);

         return view('invkeluar', compact(['data', 'gud']));
    }

    public function keluarkanBarang($id)
    {
         $data = Inventory::find($id);

    if ($data && $data->status == 'masuk') {
        $data->status = 'keluar';
        $data->tanggal_keluar = now();
        $data->save();
            return redirect()->route('barangMasuk')->with('toast_success', 'Barang berhasil dikeluarkan!');
        }
        return redirect()->route('barangMasuk')->with('toast_error', 'Barang tidak ditemukan!');
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
        ], [
            // 'required' => 'Kolom :attribute wajib diisi.',
                'namabarang.required' => 'Nama Barang harus diisi!',
                'gudang_inv.required' => 'Gudang harus dipilih!',
                'gudang_inv.min' => 'Gudang harus dipilih!',
                'namapic.required' => 'Gudang harus diisi!',
                'kontakpic.required' => 'Kontak PIC harus diisi!',
                'tanggal_masuk.required' => 'Tanggal Masuk harus diisi!',
                'tanggal_masuk.date' => 'Tanggal Masuk harus berupa tanggal yang valid!',

                'max' => [
                    'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                ],
                'namapic.regex' => 'Nama PIC hanya boleh berisi huruf.', // Pesan kesalahan kustom
        ]);

         // Menambahkan data baru dengan status 'masuk'
        // Inventory::create([
        // 'namabarang' => $request->namabarang,
        // 'gudang_inv' => $request->gudang_inv,
        // 'namapic' => $request->namapic,
        // 'kontakpic' => $request->kontakpic,
        // 'tanggal_masuk' => $request->tanggal_masuk,
        // 'status' => 'masuk',
        // 'tanggal_keluar' => null,
        // ]);

        Inventory::create($request->all());
        return redirect()->route('invmasuk')->with('toast_success', 'Data Berhasil Di Tambahkan!');
    }

    public function editdata($id){
        $gud = Gudang::all();
        $data = Inventory::with('gudang')->find($id);
        // dd($data);
        return view('editdata',compact('data', 'gud'));
    }

    public function editdataKeluar($id){
        $gud = Gudang::all();
        $data = Inventory::with('gudang')->find($id);
        // dd($data);
        return view('editdatakeluar',compact('data', 'gud'));
    }

    public function updatedata(Request $request, $id){

        $this->validate($request, [
            'namabarang' => 'required',
            'namapic' => 'required|regex:/^[a-zA-Z\s]+$/',
            'kontakpic' => 'required',
            'tanggal_masuk' => 'required',
            // 'tanggal_keluar' => 'required|date',
        ],[
            // 'required' => 'Kolom :attribute wajib diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'namabarang.required' => 'Nama Barang harus diisi!',
            'namapic.required' => 'Nama Barang harus diisi!',
            'kontakpic.required' => 'Kontak PIC harus diisi!',
            'tanggal_masuk.required' => 'Tanggal Masuk harus diisi!',
            'namapic.regex' => 'Nama PIC hanya boleh berisi huruf dan spasi.',
        ]);
        $data = Inventory::find($id);

        if (!$data) {
            return redirect()->route('inventory')->with('toast_error', 'Data tidak ditemukan');
        }

        $data->update($request -> all());
        return redirect()->route('inventory')->with('toast_success', 'Data Berhasil Update');
    }

    public function updatedataKeluar(Request $request, $id)
    {
        $this->validate($request, [
            'namabarang' => 'required',
            'namapic' => 'required|regex:/^[a-zA-Z\s]+$/',
            'kontakpic' => 'required',
            'tanggal_keluar' => 'required|date|after_or_equal:tanggal_masuk',
        ], [
            'namabarang.required' => 'Nama Barang harus diisi!',
            'namapic.required' => 'Nama PIC harus diisi!',
            'kontakpic.required' => 'Kontak PIC harus diisi!',
            'tanggal_keluar.required' => 'Tanggal Keluar harus diisi!',
            'namapic.regex' => 'Nama PIC hanya boleh berisi huruf dan spasi.',
            'tanggal_keluar.after_or_equal' => 'Tanggal Keluar harus setelah atau sama dengan Tanggal Masuk.',
        ]);

        $data = Inventory::find($id);

        if (!$data) {
            return redirect()->route('inventorykeluar')->with('toast_error', 'Data tidak ditemukan');
        }

        $data->update($request->all());

        return redirect()->route('inventorykeluar')->with('toast_success', 'Data Berhasil Diupdate');
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




