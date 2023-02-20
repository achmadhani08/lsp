@extends('layouts.master')

@section('content-user')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Profile</h4>
            <button type="button" class="btn m-0 btn-icon btn-outline-primary block" data-bs-toggle="modal"
                data-bs-target="#updateModal">
                <i class="bi bi-pencil"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column justify-content-center align-items-center">
                @if (Auth::user()->photo)
                    <img src="{{ asset(Auth::user()->photo) }}" alt="img" width="150px" height="150px">
                @endif
                <h3 class="mt-3">{{ Auth::user()->fullname }} / {{ Auth::user()->username }}</h3>
                <p class="fs-6">{{ Auth::user()->kelas }}</p>
                <p class="fs-6">
                    (NIS) {{ Auth::user()->nis }}</p>
                @if (Auth::user()->alamat)
                    <i class="bi bi-geo-fill mb-2"></i> {{ Auth::user()->alamat }}
                @endif
            </div>
        </div>
    </div>

    {{-- Update Modal --}}
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <form action="{{ route('user.update_profil') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalTitle">
                            Update Profile
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="text" name="fullname" placeholder="Nama Lengkap"
                                    value="{{ Auth::user()->fullname }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="username" placeholder="Username"
                                    value="{{ Auth::user()->username }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="nis" placeholder="NIS" value="{{ Auth::user()->nis }}"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <input type="text" name="kelas" placeholder="Kelas" value="{{ Auth::user()->kelas }}"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <textarea name="alamat" rows="3" placeholder="Alamat" class="form-control" required>{{ Auth::user()->alamat }}</textarea>
                            </div>

                            <div class="mb-3">
                                <input class="form-control" type="password" name="password"
                                    placeholder="Masukkan Sandi yang belum dirubah" required>
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
