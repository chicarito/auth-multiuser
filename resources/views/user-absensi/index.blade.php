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
                <form>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" id="checkInButton" class="btn btn-dark w-100 rounded-5">Absen
                                Masuk</button>
                        </div>
                        <div class="col-6">
                            <button type="button" id="checkOutButton" class="btn btn-dark w-100 rounded-5">Absen
                                Pulang</button>
                        </div>
                    </div>
                </form>

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
