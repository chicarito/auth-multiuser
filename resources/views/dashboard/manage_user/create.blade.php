@extends('layouts.admin')
@section('title_page')
    Tambah Pengguna
@endsection
@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('ManageUser.store') }}" method="POST">
                @csrf
                <div id="user-inputs">
                    <div class="user-input card mb-3">
                        <div class="card-header d-flex justify-content-between">
                            <h6>Pengguna 1</h6>
                            <button type="button" class="btn btn-outline-danger btn-sm remove-user">
                                <svg class="bi">
                                    <use xlink:href="#delete" />
                                </svg>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="name[]" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username[]" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password[]" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" name="role[]" required>
                                        <option value="user" selected>User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input list="jabatan" class="form-control" name="jabatan[]" required autocomplete="off">
                                    <datalist id="jabatan">
                                        <option value="Karyawan">
                                        <option value="Staff">
                                        <option value="HRD">
                                      
                                    </datalist>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <button type="button" id="add-user" class="btn btn-outline-secondary mb-3 d-block">Tambah Pengguna</button>
                <button type="submit" class="btn btn-primary">Simpan Semua Pengguna</button>

            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-user').addEventListener('click', function() {
            let userInputClone = document.querySelector('.user-input').cloneNode(true);
            let totalUsers = document.querySelectorAll('.user-input').length + 1;

            userInputClone.querySelector('.card-header h6').textContent = 'Pengguna ' + totalUsers;

            userInputClone.querySelector('.remove-user').addEventListener('click', function() {
                userInputClone.remove();
            });

            document.getElementById('user-inputs').appendChild(userInputClone);
        });

        document.querySelectorAll('.remove-user').forEach(function(btn) {
            btn.addEventListener('click', function() {
                let userInputCard = btn.closest('.user-input');
                userInputCard.remove();
            });
        });
    </script>
@endsection
