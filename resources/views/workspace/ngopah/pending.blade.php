@extends('layouts.workspace')
@section('title', 'Pending Request | E-NGOPAHCIBESUT WORKSPACE')
@section('content')
    <h3 class="panel-header">Pending Request</h3>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="list-container p-3">
                <div class="row">
                    <div class="col-12">
                        <h5 class="list-item pb-2">Urutkan :</h5>
                        <select class="form-select" onchange="location = this.value">
                            <option {{ Request::get('sort') == NULL ? 'selected' : '' }} value="/workspace/pending">Tanggal Pembuatan Request</option>
                            <option {{ Request::get('sort') == 'tanggal_pengambilan' ? 'selected' : '' }} value="/workspace/pending?sort=tanggal_pengambilan">Tanggal Pengambilan</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @if($pesanan->count() == 0)
        <div class="col-md-12 mb-3">
            <div class="list-container p-3">
                <h3 class="list-item text-center"><i class="fas fa-check-circle me-3" style="color:#4ac24a"></i>Semua Request Telah Terselesaikan!</h3>
            </div>
        </div>
        @endif
        @foreach($pesanan as $pesan)
        <div class="col-md-12 mb-3">
            <div class="list-container p-3">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <p class="list-head mb-0">Pesanan #{{$pesan->req_id}}</p>
                    </div>
                    <div class="col-md-4 col-12">
                        <p class="list-head mb-0 tanggal"><i class="fas fa-calendar-alt pe-2" style="color:#4ac24a"></i>{{date('d F Y', strtotime($pesan->created_at))}}</p>
                    </div>
                    <div class="col-md-5 col-12">
                        <p class="list-head mb-0 float-lg-end status {{strtolower($pesan->status)}}">{{$pesan->status}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="list-head pt-2 pb-0 mb-0">Nama</h5>
                        <h5 class="list-item">{{$pesan->name}}</h5>
                    </div>
                    <div class="col-md-8">
                        <h5 class="list-head pt-2 pb-0 mb-0">Alamat</h5>
                        <h5 class="list-item">{{$pesan->alamat}}</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="list-head pb-0 mb-0 pt-0">Tanggal Pengambilan</h5>
                        <h5 class="list-item ">{{date('d F Y', strtotime($pesan->tanggal_pengambilan))}}</h5>
                    </div>
                    <div class="col-md-8">
                        <button type="button" class="btn btn-success float-end mt-3 mt-lg-0" data-bs-toggle="modal" data-bs-target="#detailModal" 
                        data-bs-name="{{$pesan->name}}" data-bs-alamat="{{$pesan->alamat}}" data-bs-reqid="{{$pesan->req_id}}" data-bs-tanggal="{{date('d F Y', strtotime($pesan->created_at))}}" data-bs-pengambilan="{{date('d F Y', strtotime($pesan->tanggal_pengambilan))}}" data-bs-status="{{$pesan->status}}" 
                        data-bs-minyak-jelantah="{{$pesan->minyak_jelantah_liter}}" data-bs-botol-plastik="{{$pesan->botol_plastik_kg}}" data-bs-kardus="{{$pesan->kardus_kg}}" data-bs-mj="{{$pesan->minyak_jelantah}}" data-bs-bp="{{$pesan->botol_plastik}}" data-bs-kr="{{$pesan->kardus}}">
                        Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $pesanan->links() }}

    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title page-header pt-0" id="exampleModalLabel">Detail Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="form-label">Informasi Pesanan</p>
                <table>
                    <tr class="pb-2">
                        <td style="width:160px">No. Pesanan</td>
                        <td style="padding-right :10px">:</td>
                        <td id="reqidModal"></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td style="padding-right :10px">:</td>
                        <td id="namaModal"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td style="padding-right :10px">:</td>
                        <td id="alamatModal"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Request</td>
                        <td style="padding-right :10px">:</td>
                        <td id="reqModal"></td>
                    </tr>
                    <tr>
                        <td>Pengambilan</td>
                        <td style="padding-right :10px">:</td>
                        <td id="pengambilanModal"></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td style="padding-right :10px">:</td>
                        <td id="statusModal"></td>
                    </tr>
                </table>
                <hr>
                <p class="form-label">Jenis Barang</p>
                    <p class="list-head mb-1" id="mj"></p>
                    <p class="list-head mb-1" id="bp"></p>
                    <p class="list-head mb-1" id="kr"></p>
                <hr>
                <p class="form-label">Detail Barang</p>
                <form action="/proses_ngopah" method="POST" id="detailBarang">
                    @csrf
                    <table>
                        <tr>
                            <td style="width:190px; vertical-align:middle">Minyak Jelantah (Liter)</td>
                            <td style="padding-right :10px; vertical-align:middle">:</td>
                            <td id="minyak_jelantah"><input type="number" class="form-control" step=".01" name="minyak_jelantah_liter" placeholder="Jumlah Minyak (Liter)"></td>
                        </tr>
                        <tr class="pb-2">
                            <td style="width:170px; vertical-align:middle">Botol Plastik (Kg)</td>
                            <td style="padding-right :10px; vertical-align:middle">:</td>
                            <td id="botol_plastik"><input type="number" class="form-control" step=".01" name="botol_plastik_kg" placeholder="Jumlah Botol Plastik (Kg)"></td>
                        </tr>
                        <tr class="pb-2">
                            <td style="width:170px; vertical-align:middle">Kardus (Kg)</td>
                            <td style="padding-right :10px; vertical-align:middle">:</td>
                            <td id="kardus"><input type="number" class="form-control" step=".01" name="kardus_kg" placeholder="Jumlah Kardus (Kg)"></td>
                        </tr>
                        <input type="hidden" id="reqIdInput" name="req_id">
                    </table>
                </form>
                <hr>
                <p class="form-label">Zona Berbahaya</p>
                <p>Jika karena suatu alasan pesanan tidak dapat diselesaikan, klik tombol dibawah ini untuk membatalkan pesanan</p>
                <button form="batalkanPesanan" type="submit" class="btn btn-danger">Batalkan Pesanan</button>
                <form action="/batalkan_pesanan" method="POST" id="batalkanPesanan">
                @csrf
                    <input type="hidden" id="reqIdInputBatalkan" name="req_id">
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button form="detailBarang" type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        var detailModal = document.getElementById('detailModal')
        detailModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var name = button.getAttribute('data-bs-name')
        var req_id = button.getAttribute('data-bs-reqid')
        var alamat = button.getAttribute('data-bs-alamat')
        var status = button.getAttribute('data-bs-status')
        var pengambilan = button.getAttribute('data-bs-pengambilan')
        var tanggal = button.getAttribute('data-bs-tanggal')
        var minyak_jelantah = button.getAttribute('data-bs-minyak-jelantah')
        var kardus = button.getAttribute('data-bs-kardus')
        var botol_plastik = button.getAttribute('data-bs-botol-plastik')
        var mj = button.getAttribute('data-bs-mj')
        var bp = button.getAttribute('data-bs-bp')
        var kr = button.getAttribute('data-bs-kr')
        
        // Update the modal's content.
        var modalNama = document.getElementById('namaModal')
        var modalReqid = document.getElementById('reqidModal')
        var modalReq = document.getElementById('reqModal')
        var modalAlamat = document.getElementById('alamatModal')
        var modalStatus = document.getElementById('statusModal')
        var modalPengambilan = document.getElementById('pengambilanModal')
        var modalMinyakJelantah = document.getElementById('minyak_jelantah')
        var modalBotolPlastik = document.getElementById('botol_plastik')
        var modalKardus = document.getElementById('kardus')
        var modal_mj = document.getElementById('mj')
        var modal_bp = document.getElementById('bp')
        var modal_kr = document.getElementById('kr')

        modalNama.textContent = name
        modalReqid.textContent = req_id
        modalAlamat.textContent = alamat
        modalReq.textContent = tanggal
        modalStatus.textContent = status
        modalPengambilan.textContent = pengambilan
        if(mj == 1){
            modal_mj.textContent = 'Minyak Jelantah'
        }
        else{

            modal_mj.textContent = ''
        }
        if(bp == 1){
            modal_bp.textContent = 'Botol Plastik'
        }
        else{

            modal_bp.textContent = ''
        }
        if(kr == 1){
            modal_kr.textContent = 'Kardus'
        }
        else{
            modal_kr.textContent = ''

        }

        //hidden req id for form
        var reqIdForm = document.getElementById('reqIdInput')
        reqIdForm.value = req_id

        var reqIdFormBatalkan = document.getElementById('reqIdInputBatalkan')
        reqIdFormBatalkan.value = req_id


        })
    </script>
@endsection