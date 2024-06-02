<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Inventory;
use PDF;

class LaporanController extends Controller
{
    public function showForm()
    {
        $gud = Gudang::all();
        return view('laporan', compact('gud'));
    }

    public function generate(Request $request)
    {
        $this->validate($request, [
            'gudang' => 'nullable|exists:gudangs,id',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date|after_or_equal:tanggal_masuk',
        ]);

        $query = Inventory::with('gudang')->latest();

        if ($request->gudang) {
            $query->where('gudang_inv', $request->gudang);
        }

        $query->whereBetween('tanggal_masuk', [$request->tanggal_masuk, $request->tanggal_keluar]);

        $data = $query->get();

        $data = $query->paginate(5);

        // Jika ingin mengembalikan data ke view sebelum mengunduh PDF
        return view('laporan_result', compact('data'));
    }

    public function downloadPdf(Request $request)
    {
        $query = Inventory::with('gudang');

        if ($request->gudang) {
            $query->where('gudang_inv', $request->gudang);
        }

        $query->whereBetween('tanggal_masuk', [$request->tanggal_masuk, $request->tanggal_keluar]);

        $data = $query->get();

        $pdf = PDF::loadView('laporan_pdf', compact('data'));

         // Generate a dynamic filename
        $filename = 'Laporan_Inventory_' . ($request->gudang ? 'Gudang_' . $request->gudang : 'Semua_Gudang') .
        '_Dari_' . $request->tanggal_masuk . '_Sampai_' . $request->tanggal_keluar . '.pdf';

        return $pdf->download('laporan.pdf');
    }
}
