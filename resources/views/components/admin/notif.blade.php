@php
    use App\Models\Pemberitahuan;
    $pemberitahuans = Pemberitahuan::where('status', 'aktif')
        ->orWhere('status', 'admin')
        ->get();
    
    if (!count($pemberitahuans) > 0) {
        $class = null;
        $info_notif = 'Tidak Ada Notifikasi';
    } elseif (count($pemberitahuans) > 3) {
        $class = 'notification-item';
        $info_notif = 'Ada Banyak Notifikasi';
    } else {
        null;
    }
    
@endphp

@if (!isset($info_notif))
    @foreach ($pemberitahuans as $pemberitahuan)
        <li class="dropdown-item notification-item">
            <a class="d-flex align-items-center" href="{{ route('admin.pemberitahuan_admin') }}">
                @if ($pemberitahuan->status === 'aktif')
                    <span class="btn icon btn-primary"><i class="bi bi-info-circle"></i></span>
                @else
                    <span class="btn icon btn-light"><i class="bi bi-info-circle"></i></span>
                @endif
                <div class="notification-text ms-4">
                    <p class="notification-subtitle font-thin text-sm">
                        @if (strlen($pemberitahuan->isi) > 20)
                            {{ substr($pemberitahuan->isi, 0, 20) . '...' }}
                        @else
                            {{ $pemberitahuan->isi }}
                        @endif
                    </p>
                </div>
            </a>
        </li>
    @endforeach
@else
    <li class="dropdown-item {{ isset($class) ? $class : null }}">
        <a class="d-flex align-items-center {{ isset($class) ? $class : 'text-gray-600' }}"
            href="{{ route('admin.pemberitahuan_admin') }}">
            {{ $info_notif }}
        </a>
    </li>
@endif
