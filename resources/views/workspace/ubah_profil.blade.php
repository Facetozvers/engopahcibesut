@extends('layouts.workspace')
@section('title', 'Ubah Profil | E-NGOPAHCIBESUT WORKSPACE')
@section('content')
    <h3 class="panel-header">Ubah Profil</h3>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="list-container p-3">
                <form style="form-control" action="" method="POST">
                    @csrf
                    @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$profil->name}}" placeholder="Masukkan Nama Lengkap" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="phone_number" class="form-label mt-3">Nomor Handphone</label>
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$profil->phone_number}}" placeholder="Masukkan Nomor Handphone" required>
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="current_password" class="form-label mt-3">Password</label>
                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" placeholder="Masukkan Password untuk melanjutkan" required>
                    @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button class="btn btn-success button-submit mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
