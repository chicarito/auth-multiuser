@extends('layouts.admin')
@section('title_page')
    Kelola Lokasi
@endsection
@section('content')
    <div class="mt-3">
        <a href="{{ route('manage-location.create') }}" class="btn btn-lg btn-outline-primary" title="Tambah Pengguna">
            <svg class="bi">
                <use xlink:href="#add" />
            </svg></a>
        <table id="table" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loc as $item)
                    <tr>
                        <td>
                            <h6>{{ $item->name_location }}</h6>
                        </td>
                        <td>
                            @if ($item->is_active)
                                <h6>Aktif</h6>
                            @else
                                <h6>Non-Aktif</h6>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('manage-location.edit', $item->id) }}" class="btn btn-outline-warning"
                                title="Edit Pengguna">
                                <svg class="bi">
                                    <use xlink:href="#edit" />
                                </svg>
                            </a>
                            <form action="{{ route('manage-location.destroy', $item->id) }}" method="post"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('konfirmasi hapus {{ $item->name_location }}?')"
                                    class="btn btn-outline-danger" title="Hapus Pengguna">
                                    <svg class="bi">
                                        <use xlink:href="#delete" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
