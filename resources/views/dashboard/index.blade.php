@extends('layouts.admin')
@section('title_page')
    Dashboard    
@endsection
@section('content')
<div class="row">
    <div class="col-md-3 col-6 mt-3">
        <div class="card">
            <div class="card-body bg-danger rounded-3">
                <h6 class="text-light">Jumlah Semua Pengguna</h6>
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <b>{{ $countUser }}</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-6 mt-3">
        <div class="card">
            <div class="card-body bg-success rounded-3">
                <h6 class="text-light">Absen Masuk Hari Ini</h6>
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <b>10</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="col-md-3 col-6 mt-3">
        <div class="card">
            <div class="card-body bg-primary rounded-3">
                <h6 class="text-light">Absen Pulang Hari Ini</h6>
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <b>10</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection