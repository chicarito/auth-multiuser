<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }


        @media (min-width: 767px) {
            .sidebar {
                height: 100vh;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('bootstrap/dashboard.css') }}" rel="stylesheet">
</head>

<body>
    @include('partials.icon')
    @include('partials.header')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3>@yield('title_page')</h3>
                </div>
                @yield('content')
            </main>
        </div>

    </div>

    {{-- jquery_datatable --}}
    <script src="{{ asset('datatable_jquery/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('datatable_jquery/datatables.min.css') }}">
    <script src="{{ asset('datatable_jquery/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script src="{{ asset('bootstrap/dashboard.js') }}"></script>
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
