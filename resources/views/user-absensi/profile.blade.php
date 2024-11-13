@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="/index">
                    <img src="{{ asset('bahan/back (2).png') }}" style="width: 50px">
                </a>
                <h4 class="text-light my-3">Profile</h4>
            </div>
        </div>
    </div>
@endsection
@section('content2')
    <div class="container">
        <div class="container mt-3" style="margin-bottom: 90px">
            <div class="row mb-3">
                <div class="col-10">
                    <label for="" class="text-muted fw-bold text-sm">Nama</label>
                    <h5 class=" my-3">{{ Auth::user()->name }}</h5>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-10">
                    <label for="" class="text-muted fw-bold text-sm">Username</label>
                    <h5 class=" my-3">{{ Auth::user()->username }}</h5>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-10">
                    <label for="" class="text-muted fw-bold text-sm">Password</label>
                    <h5 class=" my-3">{{ Auth::user()->password_show }}</h5>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-10">
                    <label for="" class="text-muted fw-bold text-sm">Jabatan</label>
                    <h5 class=" my-3">{{ Auth::user()->jabatan }}</h5>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection
