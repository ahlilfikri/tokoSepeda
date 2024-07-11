<!-- resources/views/produks/index.blade.php -->

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

    <h2 class="mt-2">Master Data > Data Produk</h2>

    <div class="mb-3 mt-5">
        <form action="{{ route('produks.index') }}" method="GET" class="form-inline">
            <div class="form-group mr-sm-3 mb-2">
                <label for="search" class="sr-only">Search</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Search" value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn bg-custom-color text-light mb-2">Search</button>
            @if(request()->has('search'))
                <a href="{{ route('produks.index') }}" class="btn btn-secondary mb-2 ml-2">Reset</a>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->jenis }}</td>
                    <td>{{ $produk->harga }}</td>
                    <td>{{ $produk->stock }}</td>
                    <td><img src="{{ asset('storage/' . $produk->image) }}" width="100">
                    </td>
                    <td>
                        <button type="button" class="btn bg-custom-color text-light btn-sm" data-toggle="modal" data-target="#editModal{{ $produk->id }}">Edit</button>
                        
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $produk->id }}">Delete</button>
                    </td>
                </tr>
                @include('produks.edit', ['produk' => $produk])
                @include('produks.delete', ['produk' => $produk])
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn bg-custom-color text-light" data-toggle="modal" data-target="#createModal">Tambah Produk</button>
    @include('produks.create')
@endsection
