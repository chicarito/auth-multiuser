@extends('layouts.admin')
@section('title_page')
    Kelola Pengguna
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="mt-3">
        <button type="button" class="btn btn-lg btn-outline-success" data-bs-toggle="modal" data-bs-target="#importModal"
            title="Import Excel">
            Import
            <svg class="bi">
                <use xlink:href="#excel" />
            </svg>
        </button>
        <a href="{{ route('manage-user.create') }}" class="btn btn-lg btn-outline-primary" title="Tambah Pengguna">
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
                            <a href="{{ route('manage-user.edit', $item->id) }}" class="btn btn-outline-warning"
                                title="Edit Pengguna">
                                <svg class="bi">
                                    <use xlink:href="#edit" />
                                </svg>
                            </a>
                            <form action="{{ route('manage-user.destroy', $item->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('konfirmasi hapus {{ $item->name }}?')"
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


    {{-- modal --}}
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Upload -->
                    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data" id="importForm">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose Excel File</label>
                            <input type="file" name="file" class="form-control" id="file" required
                                accept=".xlsx, .csv">
                        </div>
                    </form>
                    <p>
                        Aturan Import :
                    <ul>
                        <li>File : xlsx,xls,csv</li>
                        <li>Format pengisian :</li>
                    </ul>
                    <ol>
                        <li>baris 1: nama</li>
                        <li>baris 2: username(wajib berbeda)</li>
                        <li>baris 3: password</li>
                        <li>baris 4: role(user)</li>
                        <li>baris 5: jabatan(boleh diisi atau tidak)</li>
                    </ol>
                    <ul>
                        <li>Contoh :
                        <img src="{{ asset('bahan/Screenshot 2024-11-06 175030.jpg') }}" alt=""></li>
                    </ul>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="importForm" class="btn btn-primary">Import</button>
                </div>
            </div>
        </div>
    </div>
@endsection
