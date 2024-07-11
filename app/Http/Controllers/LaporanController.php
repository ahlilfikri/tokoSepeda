<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $laporansQuery = DetailPenjualan::query()
            ->join('penjualans', 'detailpenjualans.penjualan', '=', 'penjualans.id')
            ->select('detailpenjualans.*', 'penjualans.status');

        if ($month && $year) {
            $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfDay();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $laporansQuery->whereBetween('detailpenjualans.tanggal', [$startOfMonth, $endOfMonth]);
        }

        $laporans = $laporansQuery->get();
        $totalPenjualan = 0;

        foreach ($laporans as $jual) {
            if ($jual->status == 'disetujui') {
                $totalPenjualan += $jual->jumlah * $jual->produks->harga;
            }
        }

        return view('laporan.index', compact('laporans', 'totalPenjualan'));
    }
}

