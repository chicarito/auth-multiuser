@extends('layouts.admin')
@section('title_page')
    Riwayat Absensi
@endsection
@section('content')
    <div class="mt-3">

        <table id="table" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Nama Lokasi</th>
                    <th>Check-in Time</th>
                    <th>Check-out Time</th>
                    <th>Koordinat Check-in</th>
                    <th>Jarak Check-in (km)</th>
                    <th>Status Absen</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->user->name ?? 'Tidak diketahui' }}</td>
                        <td>{{ $attendance->location->name_location ?? 'Tidak diketahui' }}</td>
                        <td>{{ $attendance->check_in_time ? $attendance->check_in_time->format('Y-m-d H:i:s') : '-' }}</td>
                        <td>{{ $attendance->check_out_time ? $attendance->check_out_time->format('Y-m-d H:i:s') : '-' }}
                        </td>
                        <td>
                            {{ $attendance->check_in_lat ?? '-' }},
                            {{ $attendance->check_in_long ?? '-' }}
                        </td>
                        <td>{{ $attendance->check_in_distance ?? '-' }} km</td>
                        <td>
                            @if ($attendance->location && $attendance->check_in_distance <= $attendance->location->radius)
                                <span class="badge bg-success">Valid</span>
                            @else
                                <span class="badge bg-danger">Diluar Radius</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Data absensi belum tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
