@extends('layouts.admin')
@section('title_page')
    Riwayat Absensi
@endsection
@section('content')
    <div class="container">
        <table class="table table-bordered" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Nama Lokasi</th>
                    <th>Waktu Check-In</th>
                    <th>Waktu Check-Out</th>
                    <th>Jarak ke Kantor (km)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendances as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->location->name_location }}</td>
                        <td>{{ $item->check_in_time }}</td>
                        <td>{{ $item->check_out_time }}
                        </td>
                        <td>{{ $item->distance . ' km' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
