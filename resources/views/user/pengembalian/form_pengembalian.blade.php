@extends('layouts.master')

@section('content-user')
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css" />

    <?php
    $today = date('Y-m-d');
    ?>

    <div style="max-width: 40%">
        <div class="card">
            <div class="card-header">
                <h4>Form Pengembalian</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('user.submit_pengembalian') }}" class="form-group" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="">Tanggal Pengembalian</label>
                        <input type="date" readonly name="tanggal_pengembalian" value="<?php echo $today; ?>"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <select name="buku_id" required class="form-select choices">
                            <option hidden disabled selected>Judul Buku</option>
                            @foreach ($pengembalian->unique('buku_id') as $b)
                                <option value="{{ $b->buku->id }}"
                                    {{ isset($buku_id) ? ($buku_id == $b->buku->id ? 'selected' : '') : '' }}>
                                    {{ $b->buku->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <p class="text-start">Kondisi Buku</p>
                    <div class="d-flex mb-5 justify-content-start">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" value="baik" name="kondisi_buku_saat_dikembalikan"
                                id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-success" for="btnradio1">Baik</label>

                            <input type="radio" class="btn-check" value="buruk" name="kondisi_buku_saat_dikembalikan"
                                id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-warning" for="btnradio2">Rusak</label>

                            <input type="radio" class="btn-check" value="hilang" name="kondisi_buku_saat_dikembalikan"
                                id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-danger" for="btnradio3">Hilang</label>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button class="btn btn-primary">Kembalikan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endsection
