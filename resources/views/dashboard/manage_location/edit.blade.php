@extends('layouts.admin')
@section('title_page')
    Tambah Lokasi
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{ route('manage-location.update', $loc->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" name="name_location" value="{{ $loc->name_location }}"
                            required autocomplete="off" placeholder="nama lokasi...">
                        @error('name_location')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="address" class="form-label">Alamat Lokasi</label>
                        <textarea name="address" id="address" cols="30" rows="0" class="form-control"
                            placeholder="alamat lokasi...">{{ $loc->address }}</textarea>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" class="form-control" step="any" name="latitude" required
                            placeholder="cth: -1.23456..." autocomplete="off" value="{{ $loc->latitude }}">
                        @error('latitude')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" class="form-control" step="any" name="longitude" required
                            placeholder="cth: 123.456..." autocomplete="off" value="{{ $loc->longitude }}">
                        @error('longitude')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="radius" class="form-label">radius(meter)</label>
                        <input type="number" name="radius" id="radius" class="form-control"
                            placeholder="jarak radius absen..." required value="{{ $loc->radius }}">
                        @error('radius')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="is_active" class="form-label">Aktifkan Lokasi</label>
                        <select class="form-select" name="is_active" required>
                            <option value="0" {{ $loc->is_active == 0 ? 'selected' : '' }}>Non Aktif</option>
                            <option value="1" {{ $loc->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                        </select>
                        @error('is_active')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan Pengguna</button>
            </form>

        </div>
    </div>
@endsection
