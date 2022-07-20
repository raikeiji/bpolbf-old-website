@extends('adminpage.template.apps')

@section('title')
Tourism - Tambah Rekomendasi
@endsection

@section('custom_css')
@endsection

@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Tambah Rekomendasi</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Tambah Rekomendasi
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
               <section id="basic-tabs-components">
                    <form action="{{route('post.admin.t.recomendation')}}" method="post" enctype="multipart/form-data" id="form">
                        {{csrf_field()}}
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <h4>Tambah Rekomendasi</h4>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                            
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Judul Dalam Bahasa Indonesia <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="judul_id" placeholder="Judul Dalam Bahasa Indonesia" required></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Judul Dalam Bahasa Inggris <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="judul_en" placeholder="Judul Dalam Bahasa Inggris" required></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Judul Dalam Bahasa China <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="judul_cn" placeholder="Judul Dalam Bahasa China"></textarea>
                                            </fieldset>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <fieldset class="form-group"style="width: 100%!important">
                                                <label for="basicInput" style="width:100%">Link Url<span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="link_url" placeholder="Masukkan Url" value="" required  style="width: 100%!important">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Gambar <span class="text-red">*</span></label>
                                                <small> ( Max File 2 MB )</small>
                                                <div class="custom-file">
                                                    <input type="file" id="image" class="custom-file-input" name="image" required id="inputGroupFile01" accept="image/*">
                                                    <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row" style="text-align: center">
                                            
                                        <div class="col-md-12">
                                            <input id="submit-btn" class="btn btn-primary" value="Simpan Data" style="cursor: pointer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                
            </div>
        </div>
    </div>
@endsection

@section('script')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('#submit-btn').on('click', function (event) {
        swal({
            title: 'Menambah Rekomendasi',
            text: 'Apakah Anda Yakin Untuk Menambah Data Pada Halaman Rekomendasi?',
            icon: 'warning',
            buttons: ["Tidak", "Ya!"],
        }).then(function(value) {
            if (value) {
                $('#form').submit();
            }
        });
    });
    var uploadField = document.getElementById("image");

        uploadField.onchange = function() {
            if(this.files[0].size > 2000000){
            alert("Ukuran File Terlalu Besar, Pastikan File Anda Kurang Dari 2 MB");
            this.value = "";
            };
        };
</script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection