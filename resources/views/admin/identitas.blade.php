@extends('layouts.master')

@section('content-admin')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Identitas Aplikasi</h3>
            <button type="button" class="btn m-0 btn-icon btn-outline-primary block" data-bs-toggle="modal"
                data-bs-target="#updateModal">
                <i class="bi bi-pencil"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column justify-content-center align-items-center">
                @if ($identitas->photo)
                    <img src="{{ asset($identitas->photo) }}" alt="img" width="150px" height="150px">
                @endif
                <h3 class="mt-3">{{ $identitas->nama_app }}</h3>
                <i class="bi bi-geo-fill mb-1"></i>
                <span class="fs-5">{{ $identitas->alamat_app }}</span>
                <div class="">
                    Email: {{ $identitas->email_app }} | Nomor Telepon:
                    {{ $identitas->nomor_hp }}
                </div>
            </div>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.update_identitas', $identitas->id) }}" enctype="multipart/form-data"
                    method="post">
                    @method('put')
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalTitle">
                            Update Identitas Aplikasi
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="text" name="nama_app" placeholder="Nama Aplikasi"
                                    value="{{ $identitas->nama_app }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="email_app" placeholder="Email Aplikasi"
                                    value="{{ $identitas->email_app }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="nomor_hp" placeholder="Nomor Telepon"
                                    value="{{ $identitas->nomor_hp }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="alamat_app" rows="3" placeholder="Alamat" class="form-control" required>{{ $identitas->alamat_app }}</textarea>
                            </div>

                            <div class="d-flex gap-2 justify-content-between">
                                <div>
                                    <label for="photo">Ubah Foto</label>
                                    <input type="file" name="photo" value="" class="form-control mt-3">
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
