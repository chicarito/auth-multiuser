@extends('layouts.admin')
@section('title_page')
    Kelola Pengguna
@endsection
@section('content')
    <div class="mt-3">
        <a href="" class="btn btn-success">tambah pengguna</a>
    <table id="table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Posisi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Alice</td>
                <td>Developer</td>
            </tr>
            <tr>
                <td>Bob</td>
                <td>Designer</td>
            </tr>
            <!-- Tambahkan data sesuai kebutuhan -->
        </tbody>
    </table>
    </div>
@endsection
