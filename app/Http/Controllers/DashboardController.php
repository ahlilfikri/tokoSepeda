<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
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

        return view('dashboard', compact('produks'));
    }
}
