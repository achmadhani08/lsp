@php
    $pesans = \App\Models\Pesan::where('status', 'terkirim')
        ->where('pengirim_id', '!=', Auth::user()->id)
        ->where('penerima_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
    
    if (count($pesans) < 1) {
        $class = null;
        $info_pesan = 'Tidak Ada Pesan';
    } elseif (count($pesans) > 3) {
        $class = 'notification-item';
        $info_pesan = 'Ada Banyak Pesan';
    } else {
        null;
    }
@endphp

@if (!isset($info_pesan))
    @foreach ($pesans as $p)
        <a href="{{ route('admin.pesan_masuk') }}">
            <button class="dropdown-item" type="button">
                <div class="row">
                    <div class="col-3">
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-lg">
                                @if ($p->pengirim->photo)
                                    <img src="{{ asset($p->pengirim->photo) }}">
                                @else
                                    <img src="{{ asset('img/avatar.png') }}" alt="avatar">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col ms-2">
                        <p class="mb-0 font-bold">
                            {{ $p->pengirim->username }}</p>
                        <p class="mt-0 mb-0 font-thin text-sm">
                            @if (strlen($p->judul) > 12)
                                {{ substr($p->judul, 0, 12) . '...' }}
                            @else
                                {{ $p->judul }}
                            @endif
                        </p>
                    </div>
                </div>
            </button></a>
    @endforeach
@else
    <a href="{{ route('admin.pesan_masuk') }}">
        <button class="dropdown-item {{ isset($class) ? $class : '' }}" type="button">
            {{ $info_pesan }}
        </button></a>
@endif
