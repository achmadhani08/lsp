@extends('layouts.master')

@section('content-user')
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css" />

    <div class="card">
        <div class="card-header">
            <h3>Pemberitahuan</h3>
        </div>
        <div class="card-body">
            <table class="table align-middle" id="table1">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Isi Pemberitahuan</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemberitahuans as $key => $pemberitahuan)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td style="max-width: 38rem">{{ $pemberitahuan->isi }}</td>
                            <td class="text-center">
                                @if ($pemberitahuan->status == 'aktif')
                                    <span class="badge bg-primary">General</span>
                                @else
                                    <span class="badge bg-info">Only User</span>
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
