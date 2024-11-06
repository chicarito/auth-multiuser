@extends('layouts.admin')
@section('title_page')
    Dashboard    
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2 col-5">
            <div class="card">
                <div class="card-body">
                    <h6>jumlah pengguna</h6>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-5">
            <div class="card">
                <div class="card-body">
                    <h6>jumlah absen masuk hari ini</h6>
                </div>
            </div>  
        </div>
    </div>
@endsection