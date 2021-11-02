@extends('layouts.sidebar')
@section('title', 'Data RT | E-NGOPAHCIBESUT')
@section('content')
    <h3 class="panel-header">Data Bank</h3>
    <div class="row p-lg-3">
        <div class="col-6 col-lg-3 mb-3">
            <select class="form-select" name="" onchange="location = this.value">
                <option {{ Request::get('data') == NULL ? 'selected' : '' }} value="/data-bank">Data Individu</option>
                <option {{ Request::get('data') == 'rt' ? 'selected' : '' }} value="/data-bank?data=rt">Data per RT</option>
                <option {{ Request::get('data') == 'rw' ? 'selected' : '' }} value="/data-bank?data=rw">Data per RW</option>
            </select>
        </div>
        <div class="col-6 col-lg-9">
            <div class="float-end">
                <select class="form-select float-end" name="" onchange="location = this.value">
                    <option {{ Request::get('rw') == 1 ? 'selected' : '' }} value="/data-bank?data=rt&rw=1">RW 1</option>
                    <option {{ Request::get('rw') == 2 ? 'selected' : '' }} value="/data-bank?data=rt&rw=2">RW 2</option>
                    <option {{ Request::get('rw') == 3 ? 'selected' : '' }} value="/data-bank?data=rt&rw=3">RW 3</option>
                    <option {{ Request::get('rw') == 4 ? 'selected' : '' }} value="/data-bank?data=rt&rw=4">RW 4</option>
                    <option {{ Request::get('rw') == 5 ? 'selected' : '' }} value="/data-bank?data=rt&rw=5">RW 5</option>
                    <option {{ Request::get('rw') == 6 ? 'selected' : '' }} value="/data-bank?data=rt&rw=6">RW 6</option>
                    <option {{ Request::get('rw') == 7 ? 'selected' : '' }} value="/data-bank?data=rt&rw=7">RW 7</option>
                    <option {{ Request::get('rw') == 8 ? 'selected' : '' }} value="/data-bank?data=rt&rw=8">RW 8</option>
                    <option {{ Request::get('rw') == 9 ? 'selected' : '' }} value="/data-bank?data=rt&rw=9">RW 9</option>
                    <option {{ Request::get('rw') == 10 ? 'selected' : '' }} value="/data-bank?data=rt&rw=10">RW 10</option>
                    <option {{ Request::get('rw') == 11 ? 'selected' : '' }} value="/data-bank?data=rt&rw=11">RW 11</option>
                    <option {{ Request::get('rw') == 12 ? 'selected' : '' }} value="/data-bank?data=rt&rw=12">RW 12</option>
                    <option {{ Request::get('rw') == 13 ? 'selected' : '' }} value="/data-bank?data=rt&rw=13">RW 13</option>
                    <option {{ Request::get('rw') == 14 ? 'selected' : '' }} value="/data-bank?data=rt&rw=14">RW 14</option>
                </select>
            </div>
        </div>
        <h5 class="panel-header">RW {{Request::get('rw')}}</h5>
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
