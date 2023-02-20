@extends('layouts.master')

@section('content-user')
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css" />

    <?php
    $today = date('Y-m-d');
    ?>

    <div style="max-width: 40%">
        <div class="card">
            <div class="card-header">
                <h4>Form Peminjaman</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('user.submit_peminjaman') }}" class="form-group" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="">Tanggal Peminjaman</label>
                        <input readonly type="date" name="tanggal_peminjaman" value="<?php echo $today; ?>"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <select name="buku_id" required class="form-select choices">
                            <option disabled hidden selected>Judul Buku</option>
                            @foreach ($bukus as $buku)
                                <option value="{{ $buku->id }}"
                                    {{ isset($buku_id) ? ($buku_id == $buku->id ? 'selected' : '') : '' }}>
                                    {{ $buku->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <p class="text-start">Kondisi Buku</p>
                    <div class="d-flex mb-5 justify-content-start">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" value="baik" name="kondisi_buku_saat_dipinjam"
                                id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-success" for="btnradio1">Baik</label>

                            <input type="radio" class="btn-check" value="buruk" name="kondisi_buku_saat_dipinjam"
                                id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-warning" for="btnradio2">Rusak</label>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button class="btn btn-primary">Pinjam</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endsection
