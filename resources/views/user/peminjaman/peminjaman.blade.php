@extends('layouts.master')

@section('content-user')
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css" />

    <div class="card">
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-header d-flex justify-content-between">
            <h3>Buku yang sedang dipinjam</h3>
            <a href="{{ route('user.form_peminjaman') }}" class="btn btn-icon btn-outline-primary block"><i
                    class="bi bi-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table align-middle" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Judul Buku</th>
                        <th class="text-center">Tanggal Peminjaman</th>
                        <th class="text-center">Tanggal Pengembalian</th>
                        <th class="text-center">Kondisi Buku Saat Dipinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjamans as $key => $peminjaman)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center">{{ $peminjaman->buku->judul }}</td>
                            <td class="text-center">{{ $peminjaman->tanggal_peminjaman }}</td>
                            <td class="text-center">
                                @if ($peminjaman->tanggal_pengembalian)
                                    {{ $peminjaman->tanggal_pengembalian }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center text-capitalize">
                                @if ($peminjaman->kondisi_buku_saat_dipinjam == 'buruk')
                                    rusak
                                @else
                                    {{ $peminjaman->kondisi_buku_saat_dipinjam }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
