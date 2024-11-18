@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-10">
                <h3 class="text-white">{{ Auth::user()->name }}</h3>
                <span class="text-white">{{ Auth::user()->jabatan }}</span>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <div class="dropdown">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('bahan/user-avatar.png') }}" alt="" style="width: 64px; height: 64px;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card bg-light rounded-3 mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="fw-bold">Absensi App</h5>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end">
                            <span class="mt-1 text-muted"><?php echo date('j F Y'); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-bold text-center mt-1 mb-3">
                            <?php echo date('H:i'); ?>
                        </h1>
                    </div>
                </div>
                {{-- form absen masuk dan pulang --}}

                <div class="row">
                    <div class="col-6">
                        <button onclick="absen('check_in')" class="btn btn-dark w-100 rounded-5">Absen
                            Masuk</button>
                    </div>
                    <div class="col-6">
                        <button onclick="absen('check_out')" class="btn btn-dark w-100 rounded-5">Absen
                            Pulang</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="mt-3">
            <div class="row">
                <div class="col-6">
                    <p class="fw-bold text-white">Riwayat Absensi</p>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-end">
                        <a href="/riwayat-absen" class="fw-bold text-white text-decoration-none">Lihat semua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function absen(type) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "/absen",
                        true); // Pastikan metode POST digunakan 
                    xhr.setRequestHeader('Content-Type',
                        'application/json'
                    ); // Menyertakan token CSRF 
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    xhr.send(JSON.stringify({
                        latitude: latitude,
                        longitude: longitude,
                        type: type
                    }));
                }, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
@endsection
@section('content2')
    <div class="container mb-5">
        @foreach ($attendances as $item)
            <div class="card mt-3 bg-light rounded-3">
                <div class="card-body ">
                    <div class="row">
                        <div class="row">
                            <div class="col-12">
                                <h5>{{ $item->created_at->format('j F Y') }}</h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h6 class="text-muted"> Jam Masuk</h6>
                                        @if ($item->check_in_time)
                                            <p class="text-primary fw-bold">
                                                {{ \Carbon\Carbon::parse($item->check_in_time)->format('H:i') }}
                                            </p>
                                        @else
                                            <p class="text-primary fw-bold">Belum Absen Masuk</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h6 class="text-muted"> Jam Pulang</h6>
                                        @if ($item->check_out_time)
                                            <p class="text-primary fw-bold">
                                                {{ \Carbon\Carbon::parse($item->check_out_time)->format('H:i') }}
                                            </p>
                                        @else
                                            <p class="text-primary fw-bold">Belum Absen Pulang</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
