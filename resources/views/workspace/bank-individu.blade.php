@extends('layouts.workspace')
@section('title', 'Data Individu | E-NGOPAHCIBESUT WORKSPACE')
@section('content')
    <h3 class="panel-header">Data Bank</h3>
    <div class="row p-lg-3">
        <div class="col-5 col-lg-3 mb-3">
            <select class="form-select" name="" onchange="location = this.value">
                <option {{ Request::get('data') == NULL ? 'selected' : '' }} value="/workspace/data-bank">Data Individu</option>
                <option {{ Request::get('data') == 'rt' ? 'selected' : '' }} value="/workspace/data-bank?data=rt">Data per RT</option>
                <option {{ Request::get('data') == 'rw' ? 'selected' : '' }} value="/workspace/data-bank?data=rw">Data per RW</option>
            </select>
        </div>
        <table class="table table-striped">
            <thead class="table-success">
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Minyak Jelantah</th>
                <th scope="col">Botol Plastik</th>
                <th scope="col">Kardus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ngopah as $data)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->minyak_jelantah_liter}} Liter</td>
                    <td>{{$data->botol_plastik_kg}} Kg</td>
                    <td>{{$data->kardus_kg}} Kg</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $ngopah->links() }}
@endsection
