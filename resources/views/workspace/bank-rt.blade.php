@extends('layouts.workspace')
@section('title', 'Data RT | E-NGOPAHCIBESUT WORKSPACE')
@section('content')
    <h3 class="panel-header">Data Bank</h3>
    <div class="row p-lg-3">
        <div class="col-6 col-lg-3 mb-3">
            <select class="form-select" name="" onchange="location = this.value">
                <option {{ Request::get('data') == NULL ? 'selected' : '' }} value="/workspace/data-bank">Data Individu</option>
                <option {{ Request::get('data') == 'rt' ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=1">Data per RT</option>
                <option {{ Request::get('data') == 'rw' ? 'selected' : '' }} value="/workspace/data-bank?data=rw">Data per RW</option>
            </select>
        </div>
        <div class="col-6 col-lg-9">
            <div class="float-end">
                <select class="form-select float-end" name="" onchange="location = this.value">
                    <option {{ Request::get('rw') == 1 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=1">RW 1</option>
                    <option {{ Request::get('rw') == 2 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=2">RW 2</option>
                    <option {{ Request::get('rw') == 3 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=3">RW 3</option>
                    <option {{ Request::get('rw') == 4 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=4">RW 4</option>
                    <option {{ Request::get('rw') == 5 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=5">RW 5</option>
                    <option {{ Request::get('rw') == 6 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=6">RW 6</option>
                    <option {{ Request::get('rw') == 7 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=7">RW 7</option>
                    <option {{ Request::get('rw') == 8 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=8">RW 8</option>
                    <option {{ Request::get('rw') == 9 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=9">RW 9</option>
                    <option {{ Request::get('rw') == 10 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=10">RW 10</option>
                    <option {{ Request::get('rw') == 11 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=11">RW 11</option>
                    <option {{ Request::get('rw') == 12 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=12">RW 12</option>
                    <option {{ Request::get('rw') == 13 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=13">RW 13</option>
                    <option {{ Request::get('rw') == 14 ? 'selected' : '' }} value="/workspace/data-bank?data=rt&rw=14">RW 14</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-lg-3 mb-3">
            <form action="">
                <label for="periode">Periode :</label>
                <input type="hidden" value="{{Request::get('data')}}" name="data">
                <input type="hidden" value="{{Request::get('rw')}}" name="rw">
                <select class="form-select" onchange="this.form.submit()" name="periode" id="periode">
                    <option {{ Request::get('periode') == 'semua' ? 'selected' : '' }} value="semua">Sepanjang Waktu</option>
                    <option {{ Request::get('periode') == '30_hari' ? 'selected' : '' }} value="30_hari">30 Hari Terakhir</option>
                    <option {{ Request::get('periode') == '7_hari' ? 'selected' : '' }} value="7_hari">7 Hari Terakhir</option>
                </select>
            </form>
        </div>
        <h5 class="panel-header">RW {{Request::get('rw')}} {{ Request::get('rw') == NULL ? '1' : '' }}</h5>
        <table class="table table-striped">
            <thead class="table-success">
                <tr>
                <th scope="col">No.</th>
                <th scope="col">RT</th>
                <th scope="col">Minyak Jelantah</th>
                <th scope="col">Botol Plastik</th>
                <th scope="col">Kardus</th>
                </tr>
            </thead>
            <tbody>
                @if(count($ngopah) < 1)
                <tr>
                    <td colspan="5" class="text-center">Data Tidak Ditemukan!</td>
                </tr>
                @endif
                @foreach($ngopah as $data)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->rt}}</td>
                    <td>{{$data->minyak_jelantah_liter}} Liter</td>
                    <td>{{$data->botol_plastik_kg}} Kg</td>
                    <td>{{$data->kardus_kg}} Kg</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
