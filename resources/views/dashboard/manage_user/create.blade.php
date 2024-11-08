@extends('layouts.admin')
@section('title_page')
    Tambah Pengguna
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('manage-user.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required
                            autocomplete="off">
                        @error('name')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required
                            autocomplete="off">
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        @error('password')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input list="jabatan" class="form-control" name="jabatan" value="{{ old('jabatan') }}"
                            autocomplete="off">
                        <datalist id="jabatan">
                            <option value="Karyawan">
                            <option value="Staff">
                        </datalist>
                        @error('jabatan')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan Pengguna</button>
            </form>

        </div>
    </div>
@endsection
