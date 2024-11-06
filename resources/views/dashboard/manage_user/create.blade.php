@extends('layouts.admin')
@section('title_page')
    Tambah Pengguna
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tambah Pengguna</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('ManageUser.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="col-md-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="col-md-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan Pengguna</button>
            </form>
        </div>
    </div>
@endsection
