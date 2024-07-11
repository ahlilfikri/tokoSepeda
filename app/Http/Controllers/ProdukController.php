<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('nama', 'like', '%' . $searchTerm . '%')
                ->orWhere('jenis', 'like', '%' . $searchTerm . '%');
        }

        $produks = $query->get();

        return view('produks.index', compact('produks'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'jenis' => 'required|max:255',
                'harga' => 'required|numeric',
                'stock' => 'required|numeric',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]);
    
            $image = $request->file('image');
            $filename = date("Y-m-d ").$image->getClientOriginalName();
            $filePath = $image->storeAs('images', $filename, 'public');
    
            $data = [
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'image' => $filePath,
            ];
            Produk::create($data);
    
            return redirect()->route('produks.index')->with('success', 'Produk created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('produks.index')->with('error', $e->getMessage())->withInput();
        }
    }
    

    public function update(Request $request, Produk $produk)
    {
        try {
            $request->validate([
                'nama' => 'required|max:255',
                'jenis' => 'required|max:255',
                'harga' => 'required|numeric',
                'stock' => 'required|numeric',
                'image' => 'required|max:2048',
            ]);

            
            $data = [
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'stock' => $request->stock,
            ];
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = date("Y-m-d ").$image->getClientOriginalName();
                $filePath = $image->storeAs('images',$filename ,'public');
                $data = [
                    'nama' => $request->nama,
                    'jenis' => $request->jenis,
                    'harga' => $request->harga,
                    'stock' => $request->stock,
                    'image' => $filePath,
                ];
            }


            $produk->update($data);

            return redirect()->route('produks.index')->with('success', 'Produk updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->route('produks.index')->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();

            return redirect()->route('produks.index')->with('success', 'Produk deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('produks.index')->with('error', 'Failed to delete Produk.');
        }
    }
}
