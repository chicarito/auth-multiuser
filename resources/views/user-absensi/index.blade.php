<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absen App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Absensi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    @include('partials.icon')
    <div class="card rounded-bottom-5 rounded-top-0" style="background: #008080">
        <div class="card-body">
            <div class="container">
                <div class="row my-3">
                    <div class="col-10">
                        <h3 class="text-white">{{ Auth::user()->name }}</h3>
                        <span class="text-white">{{ Auth::user()->jabatan }}</span>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="btn btn-light" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg class="bi" style="width: 70px; height: 45px;">
                                    <use xlink:href="#list" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
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
                        <form action="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-dark w-100 rounded-5">Absen Masuk</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-dark w-100 rounded-5">Absen Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>




{{-- <div class="mb-3">
    <input type="text" class="form-control" id="employeeName" disabled value="{{ Auth::user()->name }}">
</div>
<div class="mb-3">
    <input type="text" class="form-control" id="attendanceDate" disabled value="<?php echo date('j F Y'); ?> <?php echo date('H:i'); ?>">
</div>
<form>
    <div class="row">
        <div class="col-md-6">
            <button type="button" class="btn btn-success w-100 my-2">Check-in</button>
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-danger w-100 my-2">Check-out</button>
        </div>
    </div>
</form> --}}
