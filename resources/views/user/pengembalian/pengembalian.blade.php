@extends('layouts.master')

@section('content-user')
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css" />

    @php
        function rupiah($angka)
        {
            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
            return $hasil_rupiah;
        }
    @endphp

    <div class="card">
        @if (session('status_pengembalian'))
            <div class="alert alert-{{ session('status_pengembalian') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-header d-flex justify-content-between">
            <h3>Data Pengembalian</h3>
            <a href="{{ route('user.form_pengembalian') }}" class="btn btn-icon btn-outline-primary block"><i
                    class="bi bi-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table align-middle" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Judul Buku</th>
                        <th class="text-center">Tanggal Peminjaman</th>
                        <th class="text-center">Tanggal Pengembalian</th>
                        <th class="text-center">Kondisi Buku Saat Dipinjam</th>
                        <th class="text-center">Kondisi Buku Saat Dikembalikan</th>
                        <th class="text-center">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $key => $data)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td class="text-center" style="min-width: 150px">{{ $data->buku->judul }}</td>
                            <td class="text-center" style="min-width: 120px">{{ $data->tanggal_peminjaman }}</td>
                            <td class="text-center" style="min-width: 120px">{{ $data->tanggal_pengembalian }}</td>
                            <td class="text-capitalize text-center" style="min-width: 150px">
                                @if ($data->kondisi_buku_saat_dipinjam == 'buruk')
                                    rusak
                                @else
                                    {{ $data->kondisi_buku_saat_dipinjam }}
                                @endif
                            </td>
                            <td class="text-center text-capitalize" style="min-width: 180px">
                                @if ($data->kondisi_buku_saat_dikembalikan == 'buruk')
                                    rusak
                                @else
                                    {{ $data->kondisi_buku_saat_dikembalikan }}
                                @endif
                            </td>
                            <td class="text-center" style="min-width: 150px">
                                @if ($data->denda)
                                    {{ rupiah($data->denda) }}
                                @else
                                    -
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
