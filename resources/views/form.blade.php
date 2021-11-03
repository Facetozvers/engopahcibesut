@extends('layouts.main')
@section('title', 'Form Menabung | E-NGOPAHCIBESUT')

@section('content')
<div class="container px-3">
    <h1 class="page-header">Form Menabung Bank Sampah</h1>
    <p class="page-subtitle">Untuk mulai menabung, mohon untuk melengkapi form dibawah ini</p>

    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8 pt-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input name="name" id="name" class="form-control" type="text" value="{{Auth::user()->name}}" readonly required>
            </div>
            <div class="col-md-4 pt-3">
                <label for="phone_number" class="form-label">Nomor Handphone</label>
                <input name="phone_number" id="phone_number" class="form-control" type="number" value="{{Auth::user()->phone_number}}" readonly required>
            </div>
            <div class="col-md-8 pt-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input name="alamat" id="alamat" class="form-control" type="text" required>
            </div>
            <div class="col-md-2 pt-3">
                <label for="rt" class="form-label">RT</label>
                <input name="rt" id="rt" class="form-control" type="number" required>
            </div>
            <div class="col-md-2 pt-3">
                <label for="rw" class="form-label">RW</label>
                <input name="rw" id="rw" class="form-control" type="number" required>
            </div>
            <div class="col-md-12 pt-3">
                <label for="tanggal" class="form-label">Tanggal Pengambilan Barang</label>
                <input name="tanggal" id="tanggal" class="form-control" type="date" required>
            </div>
            
            <div class="col-md-12 pt-4">
                <h4 class="form-subtitle">Jenis Barang</h4>
                <p class="form-subtitle2">Centang jenis barang yang ingin anda tabung</p>
            </div>
            <div class="col-md-3">
                <label class="box">Kardus
                <input type="checkbox" name="kardus">
                <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-md-3">
                <label class="box">Minyak Jelantah
                <input type="checkbox" name="minyak_jelantah">
                <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-md-3">
                <label class="box">Botol Plastik
                <input type="checkbox" name="botol_plastik">
                <span class="checkmark"></span>
                </label>
            </div>
            
        </div>
        <div class="row justify-content-center pt-5 px-2 mb-3">
            <button class="btn btn-success button-submit">SUBMIT</button>
        </div>
        
            
        
    </form>
</div>

@endsection