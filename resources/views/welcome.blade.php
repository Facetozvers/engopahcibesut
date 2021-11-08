@extends('layouts.main')
@section('title', 'Bank Sampah Kelurahan Cipinang Besar Utara | E-NGOPAHCIBESUT')
@section('content')
<div data-bs-spy="scroll" data-bs-target="#mainNavbar" data-bs-offset="0">
    <div class="container-fluid" style="background:#13ae4b">
        <div class="row pt-xl-5 pt-2 justify-content-center">
            <div class="col-md-5 col-12">
                <h1 class="hero-header ps-2">MARI LESTARIKAN LINGKUNGAN CIPINANG BESAR UTARA BERSAMA E-NGOPAHCIBESUT</h1>
            </div>
            <div class="col-md-5 col-12 my-auto">
                <img src="/assets/img/13102.png" class="img-fluid hero-img " alt="">
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="section-header text-center" id="tentang_kami">Tentang E-NGOPAHCIBESUT</h2>
        <div style="max-width:700px; margin:auto">
            <p class="section-subtitle px-2" style="text-align:justify">E-NGOPAH CIBESUT merupakan website dari Bank Sampah kelurahan Cipinang Besar Utara, Kecamatan Jatinegara, Jakarta Timur yang bertujuan untuk memudahkan masyarakat dalam membuat permintaan menyetor ke bank sampah. Dengan E-NGOPAHCIBESUT, masyarakat Kelurahan Cipinang Besar Utara akan mendapatkan pelayanan yang cepat, mudah, dan sistematis juga dapat melihat data bank sampah yang telah disediakan secara transparan. Bank sampah kami dapat menampung :</p>
        </div>
        <div class="row mt-5 mb-4 px-3 justify-content-center">
            <div class="col-xl-3 col-12">
                <div class="card mb-3">
                    <img src="/assets/img/minyak_jelantah.png" style="max-width:200px" class="card-img-top img-fluid m-auto pt-3" alt="Minyak Jelantah">
                    <div class="card-body">
                        <p class="card-text mt-3 img-header text-center">Minyak Jelantah</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="card mb-3">
                    <img src="/assets/img/kardus.png" style="max-width:200px" class="card-img-top img-fluid m-auto pt-3" alt="Kardus">
                    <div class="card-body">
                        <p class="card-text mt-3 img-header text-center">Kardus</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12">
                <div class="card mb-3">
                    <img src="/assets/img/botol_plastik.png" style="max-width:200px" class="card-img-top img-fluid m-auto pt-3" alt="Botol Plastik">
                    <div class="card-body">
                        <p class="card-text mt-3 img-header text-center">Botol Plastik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 px-3">
        <h2 class="section-header text-center" id="tentang_kami">Perintis Website</h2>
        <div class="row mt-5">
            <div class="col-xl-3">
                <div class="row">
                    <img src="/assets/img/perintis.jpeg" class="card-img-top img-fluid m-auto pt-3 pb-2" alt="evi">
                    <p class="profil-text py-0 my-0">Evi Erawati</p>
                    <p class="profil-text py-0 my-0">Lurah Cipinang Besar Utara</p>
                </div>
            </div>
            <div class="col-xl-9 mt-2">
                <p style="text-align:justify">Assalamualaikum wr. Wb.<br>
                Salam Sejahtera bagi kita semua.<br><br> Puji dan syukur kita panjatkan kepada Allah SWT. Karena berkat rahmat dan karunia nya, website E-NGOPAHCIBESUT dapat terselesaikan. E-NGOPAHCIBESUT merupakan website pendataan bank sampah kelurahan cipinang besar utara yang diciptakan guna memajukan tingkat kebersihan lingkungan cipinang besar utara. Dengan adanya website ini, masyarakat dapat dengan mudah mengajukan permintaan penyetoran sampah secara online dari HP maupun website. Harapannya, website ini dapat mewujudkan lingkungan cipinang besar utara yang bebas dari sampah plastik dan bebas dari banjir.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 px-3 bg-light">
        <h2 class="page-header text-center pt-5" id="cara_kerja">Cara Kerja E-NGOPAHCIBESUT</h2>
        <div class="row mt-5 mb-4 pb-5 justify-content-center">
            <div class="col-xl-3 col-12 my-2">
                <div class="card h-100 mb-3" style="min-height:365px">
                    <img src="/assets/img/enter.png" style="max-width:200px" class="card-img-top img-fluid m-auto pt-3" alt="Minyak Jelantah">
                    <div class="card-body">
                        <h5 class="card-title text-center img-title">LANGKAH 1</h5>
                        <p class="card-text mt-3 img-header text-center">Login / Daftar Akun anda di E-NGOPAHCIBESUT</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12 my-2">
                <div class="card h-100 mb-3" style="min-height:365px">
                    <img src="/assets/img/web.png" style="max-width:200px" class="card-img-top img-fluid m-auto pt-3" alt="Kardus">
                    <div class="card-body">
                        <h5 class="card-title text-center img-title">LANGKAH 2</h5>
                        <p class="card-text mt-3 img-header text-center">Klik Tombol "MULAI MENABUNG" Pada bagian Menu dan Lengkapi Form Pemesanan</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12 my-2">
                <div class="card h-100 mb-3" style="min-height:365px">
                    <img src="/assets/img/timbang.png" style="max-width:200px" class="card-img-top img-fluid m-auto pt-3" alt="Botol Plastik">
                    <div class="card-body">
                        <h5 class="card-title text-center img-title">LANGKAH 3</h5>
                        <p class="card-text mt-3 img-header text-center">Petugas Akan Mendatangkan Rumah Anda Untuk Melakukan Penjemputan Serta Melakukan Penimbangan Barang</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-12 my-2">
                <div class="card h-100 mb-3" style="min-height:365px">
                    <img src="/assets/img/truck.png" style="max-width:200px" class="card-img-top img-fluid m-auto pt-3" alt="Botol Plastik">
                    <div class="card-body">
                        <h5 class="card-title text-center img-title">LANGKAH 4</h5>
                        <p class="card-text mt-3 img-header text-center">Petugas Akan Mengantarkan Barang Anda ke Bank Sampah Cipinang Besar Utara</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <h2 class="section-header text-center pt-5" id="kontak">Kontak</h2>
        <p class="text-center">Jika anda memiliki pertanyaan, silahkan hubungi :</p>
        <h3 class="text-center"><i class="fab fa-whatsapp"></i> +62 812-8848-7078</h3>
        <h3 class="text-center"><i class="fab fa-whatsapp"></i> +62 878-7872-3698</h3>
        <h3 class="text-center"><i class="fab fa-whatsapp"></i> +62 895-6021-37789</h3>

    </div>
</div>
@endsection