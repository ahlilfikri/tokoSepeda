@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success my-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger my-3">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="mt-2">Master Data > Data Penjualan</h2>

    <div class="mb-3 mt-5">
        <form action="{{ route('penjualans.index') }}" method="GET" class="form-inline">
            <div class="form-group mr-sm-3 mb-2">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Search"
                    value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn bg-custom-color text-light mb-2">Search</button>
            @if (request()->has('search'))
                <a href="{{ route('penjualans.index') }}" class="btn btn-secondary mb-2 ml-2">Reset</a>
            @endif
        </form>
    </div>

    <table class="table table-bordered my-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $oldPenjualan = -1;
                $rowspan = 0;
            @endphp
            @foreach ($penjualans as $penjualan)
                @php
                    $newPenjualan = $penjualan->penjualan;
                    $isNewPenjualan = $oldPenjualan != $newPenjualan;
                    $oldPenjualan = $newPenjualan;

                    if ($isNewPenjualan) {
                        $rowspan = $penjualans->where('penjualan', $newPenjualan)->count();
                    }
                @endphp
                <tr>
                    @if ($isNewPenjualan)
                        <td rowspan="{{ $rowspan }}">{{ $loop->iteration }}</td>
                    @endif
                    <td>{{ $penjualan->produks->nama }}</td>
                    <td>{{ $penjualan->produks->jenis }}</td>
                    <td>{{ $penjualan->produks->harga }}</td>
                    <td>{{ $penjualan->jumlah }}</td>
                    <td>{{ $penjualan->produks->harga * $penjualan->jumlah }}</td>
                    <td>{{ $penjualan->penjualans->status }}</td>
                    @if ($isNewPenjualan)
                        <td rowspan="{{ $rowspan }}">
                            <form action="{{ route('penjualans.approve', $penjualan) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Setujui</button>
                            </form>
                            <form action="{{ route('penjualans.reject', $penjualan) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
