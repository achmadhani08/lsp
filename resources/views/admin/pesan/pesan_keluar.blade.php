@extends('layouts.master')

@section('content-admin')
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css" />
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css" />

    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Pesan Terkirim</h3>
                <button type="button" class="btn m-0 btn-icon btn-outline-primary block" data-bs-toggle="modal"
                    data-bs-target="#sendMessage">
                    <i class="bi bi-send-fill"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table align-middle" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Penerima</th>
                            <th class="text-center">Judul Pesan</th>
                            <th class="text-center">Isi Pesan</th>
                            <th class="text-center">Status Pesan</th>
                            <th class="text-center">Tanggal Kirim</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesan as $key => $p)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $p->penerima->fullname }}</td>
                                <td>{{ $p->judul }}</td>
                                <td style="max-width: 30rem">{{ $p->isi }}</td>
                                <td class="text-center">{{ $p->status == 'terkirim' ? 'Terkirim' : 'Dibaca' }}</td>
                                <td class="text-center">{{ $p->tanggal_kirim }}</td>
                                <td class="text-center">
                                    <form method="post" action="{{ route('user.hapus_pesan', $p->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- Store Modal --}}
    <div class="modal fade" id="sendMessage" tabindex="-1" aria-labelledby="sendMessageLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMessageLabel">Kirim Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action={{ route('admin.kirim_pesan') }} enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="pengirim_id" value="{{ Auth::user()->id }}">
                        </div>

                        <div class="mb-3">
                            <label>Penerima</label>
                            <select class="form-select choices" name="penerima_id" required>
                                <option disabled hidden>Penerima</option>
                                @foreach ($penerimas as $b)
                                    <option value="{{ $b->id }}">
                                        {{ $b->fullname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Judul Pesan"
                                name="judul" required>
                        </div>

                        <div class="form-group mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi" placeholder="Isi Pesan"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Tanggal Kirim</label>
                            <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Nama Siswa"
                                name="tanggal_kirim" readonly value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <input type="hidden" name="status" value="terkirim">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/pages/simple-datatables.js') }}"></script>
@endsection
