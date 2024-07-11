<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class PenjualanController extends Controller
{
    public function buyNow(Request $request)
    {
        $cartItems = $request->all();
        
        DB::beginTransaction();

        try {
            $penjualan = Penjualan::create([
                'tanggal' => now(),
                'status' => 'baru'
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
            }

            DB::commit();
            return redirect()->back()->with('success','Penjualan Created Successfully');
        }catch (ValidationException $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->route('produks.index')->with('error', $e->getMessage())->withInput();
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

}
