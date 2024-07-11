<!-- resources/views/penjualans/index.blade.php -->

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
                <th>Stock</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualans as $penjualan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penjualan->nama }}</td>
                    <td>{{ $penjualan->jenis }}</td>
                    <td>{{ $penjualan->harga }}</td>
                    <td>{{ $penjualan->stock }}</td>
                    <td><img src="{{ asset('storage/' . $penjualan->image) }}" width="100">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
