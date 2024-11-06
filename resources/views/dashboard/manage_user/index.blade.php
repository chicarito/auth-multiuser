@extends('layouts.admin')
@section('title_page')
    Kelola Pengguna
@endsection
@section('content')
    <div class="mt-3">
        <a href="{{ route('ManageUser.create') }}" class="btn btn-lg btn-outline-success" title="Tambah Pengguna">
            <svg class="bi">
                <use xlink:href="#add" />
            </svg></a>
        <table id="table" class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>
                            <h6>{{ $item->name }}</h6>
                        </td>
                        <td>
                            <h6>{{ $item->jabatan }}</h6>
                        </td>
                        <td>
                            <a href="{{ route('ManageUser.edit', $item->id) }}" class="btn btn-outline-warning"
                                title="Edit Pengguna">
                                <svg class="bi">
                                    <use xlink:href="#edit" />
                                </svg>
                            </a>
                            <form action="{{ route('ManageUser.destroy', $item->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('konfirmasi hapus (nama pengguna)')"
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
