@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="/index">
                    <img src="{{ asset('bahan/back (2).png') }}" style="width: 50px">
                </a>
                <h4 class="text-light my-3">Absensi</h4>
            </div>
        </div>
    </div>
@endsection
@section('content2')
    <div class="container mt-3">
        <table class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Jarak Absen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at->format('j F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->check_in_time)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->check_out_time)->format('H:i') }}</td>
                        <td>{{ $item->distance }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
