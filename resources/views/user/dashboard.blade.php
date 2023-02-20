@extends('layouts.master')

<?php
$today = date('Y-m-d');
?>

@section('content-user')
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css" />

    <div class="col-12">
        <div class="">
            @foreach ($pemberitahuans as $pemberitahuan)
                @if ($pemberitahuans->count() > 3)
                    {{ null }}
                @else
                    @if ($pemberitahuan->status == 'aktif')
                        <div class="alert alert-primary col-12 d-flex justify-content-between"
                            id="notif/{{ $pemberitahuan->id }}" role="alert">
                            {{ $pemberitahuan->isi }}
                            <button type="button" class="btn btn-secondary" onclick="hide({{ $pemberitahuan->id }});">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    @elseif ($pemberitahuan->status == 'user')
                        <div class="alert alert-info col-12 d-flex text-white justify-content-between"
                            id="notif/{{ $pemberitahuan->id }}" role="alert">
                            {{ $pemberitahuan->isi }}
                            <button type="button" class="btn btn-secondary" onclick="hide({{ $pemberitahuan->id }});">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    @endif
                @endif
            @endforeach
            @if ($pemberitahuans->count() > 3)
                <div class="alert alert-primary col-12 d-flex justify-content-between" id="notif/8" role="alert">
                    Silahkan cek pemberitahuan
                    <button type="button" class="btn btn-secondary" onclick="hide(8);">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
            @endif

            <div class="row">
                @foreach ($kategoris as $kategori)
                    @if ($kategori->bukus->count() < 1)
                        {{ null }}
                    @else
                        <div class="col-12 mt-5">
                            <h4>
                                <span class="badge bg-info text-black">{{ $kategori->nama }}</span>
                            </h4>
                            <div class="row d-flex flex-row flex-nowrap overflow-auto">
                                @foreach ($kategori->bukus as $buku)
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <img src="{{ asset($buku->photo) }}"
                                                    style="height: 150px;object-fit: cover;" class="card-img"
                                                    alt="{{ $buku->photo }}">
                                            </div>
                                            <div class="card-body">
                                                <h4 style="font-size: 24px; font-weight: bold">
                                                    {{ $buku->judul }}
                                                </h4>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="text-start">
                                                            {{ $buku->pengarang }}
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="text-end">{{ $buku->penerbit->nama }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-end">
                                                <button type="button" class="btn m-0 btn-icon btn-outline-primary block"
                                                    data-bs-toggle="modal" data-bs-target="#pinjamBuku{{ $buku->id }}">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal Pinjam --}}
                                    <div class="modal fade" id="pinjamBuku{{ $buku->id }}" tabindex="-1"
                                        aria-labelledby="pinjamBuku{{ $buku->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="pinjamBuku{{ $buku->id }}Label">Kirim
                                                        Pesan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('user.submit_peminjaman') }}"
                                                    class="form-group modal-body" method="POST">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="">Tanggal Peminjaman</label>
                                                        <input readonly type="date" name="tanggal_peminjaman"
                                                            value="<?php echo $today; ?>" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <select name="buku_id" required class="form-select choices">
                                                            <option value="{{ $buku->id }}" selected>
                                                                {{ $buku->judul }}
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <p class="text-start">Kondisi Buku</p>
                                                    <div class="d-flex mb-5 justify-content-start">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic radio toggle button group">
                                                            <input type="radio" class="btn-check" value="baik"
                                                                name="kondisi_buku_saat_dipinjam"
                                                                id="baik{{ $buku->id }}" autocomplete="off" checked>
                                                            <label class="btn btn-outline-success"
                                                                for="baik{{ $buku->id }}">Baik</label>

                                                            <input type="radio" class="btn-check" value="buruk"
                                                                name="kondisi_buku_saat_dipinjam"
                                                                id="buruk{{ $buku->id }}" autocomplete="off">
                                                            <label class="btn btn-outline-warning"
                                                                for="buruk{{ $buku->id }}">Rusak</label>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <button class="btn btn-primary">Pinjam</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function hide(id) {
            let notif = document.getElementById(`notif/${id}`).classList;
            console.log(notif);
            notif.add("d-none");
        }
    </script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endsection
