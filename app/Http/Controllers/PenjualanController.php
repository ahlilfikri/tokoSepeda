<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    public function buyNow(Request $request)
    {
        $cartItems = json_decode($request->cart_data, true);

        DB::beginTransaction();

        try {
            $penjualan = Penjualan::create([
                'tanggal' => now()->format('Y-m-d'),
                'status' => 'belum disetujui'
            ]);

            foreach ($cartItems as $item) {
                $validator = Validator::make($item, [
                    'id' => 'required|exists:produks,id',
                    'quantity' => 'required|integer|min:1',
                    'price' => 'required|numeric',
                ]);

                if ($validator->fails()) {
                    throw new \Exception('Validation failed');
                }

                DetailPenjualan::create([
                    'produk' => $item['id'],
                    'jumlah' => $item['quantity'],
                    'penjualan' => $penjualan->id,
                ]);
                $selectedProduk = Produk::where('id', $item->id)->first();
                $dataUpdate = [];
                $dataUpdate['stock'] = $selectedProduk->stock - $item->quantity;
                $selectedProduk->update($dataUpdate);
            }

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Penjualan created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboard')->with('error', $e->getMessage())->withInput();
        }
    }

    public function index(Request $request)
    {
        $query = DetailPenjualan::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama', 'like', '%' . $searchTerm . '%')
                ->orWhere('jenis', 'like', '%' . $searchTerm . '%');
        }

        $penjualans = $query->get();

        return view('penjualan.index', compact('penjualans'));
    }

    public function approve(Penjualan $penjualan)
    {
        $penjualan->status = 'disetujui';
        $penjualan->save();

        return redirect()->route('penjualans.index')->with('success', 'Penjualan disetujui.');
    }

    public function reject(Penjualan $penjualan)
    {
        $penjualan->status = 'ditolak';
        $penjualan->save();

        $selectedDetail = DetailPenjualan::where('penjualan', $penjualan->id)->get();
        foreach ($selectedDetail as $detail) {
            $selectedProduk = Produk::where('id', $detail->produk)->first();
            $dataUpdate = [];
            $dataUpdate['stock'] = $selectedProduk->stock + $selectedProduk->jumlah;
            $selectedProduk->update($dataUpdate);
        }

        return redirect()->route('penjualans.index')->with('error', 'Penjualan ditolak.');
    }

}
