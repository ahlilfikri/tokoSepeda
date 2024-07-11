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

    <h2 class="mt-4">Laporan > Laporan Penjualan</h2>

    <form action="{{ route('penjualans.laporan') }}" method="GET" id="filterForm">
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="month">Month:</label>
                <select name="month" id="month" class="form-control mb-2">
                    <option value="">-- Select Month --</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-12 col-md-6">
                <label for="year">Year:</label>
                <select name="year" id="year" class="form-control mb-2">
                    <option value="">-- Select Year --</option>
                    @for ($i = date('Y'); $i >= 1900; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Make Data</button>
        <button type="button" id="resetFilter" style="display:none;" class="btn btn-primary">Reset</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('filterForm');
            var resetButton = document.getElementById('resetFilter');

            form.addEventListener('change', function() {
                resetButton.style.display = (this.month.value || this.year.value) ? 'inline-block' : 'none';
            });

            resetButton.addEventListener('click', function() {
                form.reset();
                this.style.display = 'none';
            });
        });
    </script>
    <div class="d-flex justify-content-between">
        <div class="d-flex px-3 pt-3">
            <h4 class="mr-2">Periode :</h4>
            <h4>
                @if (request('month') && request('year'))
                    {{ date('F Y', strtotime(request('year') . '-' . request('month') . '-01')) }}
                @else
                    Semua Bulan
                @endif
            </h4>
        </div>
        <div class="card pt-2 px-3">
            <div class="d-flex">
                <p>Jumlah penjualan :</p>
                <p class="ml-2">Rp.{{ number_format($totalPenjualan, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
    <table class="table table-bordered my-3 mt-5 text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Penjualan</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $oldPenjualan = -1;
                $rowspan = 0;
            @endphp
            @foreach ($laporans as $penjualan)
                @php
                    $newPenjualan = $penjualan->penjualan;
                    $isNewPenjualan = $oldPenjualan != $newPenjualan;
                    $oldPenjualan = $newPenjualan;

                    if ($isNewPenjualan) {
                        $rowspan = $penjualan->where('penjualan', $newPenjualan)->count();
                    }
                @endphp
                @if ($penjualan->Penjualans->status == 'disetujui')
                    <tr>

                        @if ($isNewPenjualan)
                            <td rowspan="{{ $rowspan }}">{{ $loop->iteration }}</td>
                            <td rowspan="{{ $rowspan }}">{{ $penjualan->penjualans->id }}</td>
                            <td rowspan="{{ $rowspan }}">{{ $penjualan->penjualans->tanggal }}</td>
                        @endif
                        <td>{{ $penjualan->produks->nama }}</td>
                        <td>{{ $penjualan->produks->jenis }}</td>
                        <td>Rp.{{ number_format( $penjualan->produks->harga , 0, ',', '.') }}</td>
                        <td>{{ $penjualan->jumlah }}</td>
                        <td>Rp.{{ number_format($penjualan->produks->harga * $penjualan->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
