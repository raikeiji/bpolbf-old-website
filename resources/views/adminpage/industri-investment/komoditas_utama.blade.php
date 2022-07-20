@extends('adminpage.template.apps')

@section('title')
Industri & Investment - Komoditas Utama Factsheet and Data
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Komoditas Utama Factsheet and Data</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Komoditas Utama Factsheet and Data
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{route('admin.inv.komoditas_utama.add')}}" class="btn btn-success round glow">
                                        <i class="bx bx-plus"></i>
                                        <span class="align-middle ml-25">Add Data</span>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover zero-configuration">
                                            <p hidden>{{$i = 1}}</p>
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Keterangan</th>
                                                        <th>Gambar</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data as $k)
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$k->judul_id}}</td>
                                                            <td>{{$k->deskripsi_id}}</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-icon rounded-circle btn-success glow mr-1 mb-1"  title="View Image" onClick="showImg('{{$k->id}}', '{{$k->image}}')" ><i class="bx bx-camera"></i></button>
                                                            </td>
                                                           
                                                            <td class="text-center">
                                                                <a href="{{route('admin.inv.komoditas_utama.edit',$k->id)}}"><button type="button" class="btn btn-icon rounded-circle btn-primary glow mr-1 mb-1" title="Edit"><i class="bx bxs-edit-alt"></i></button></a>
                                                                <button type="button" class="btn btn-icon rounded-circle btn-danger glow mr-1 mb-1" title="Delete" onClick="popModalDelete('{{ $k->id}}','{{ $k->judul_id }}')"><i class="bx bxs-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                        <p hidden>{{$i++}}</p>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
    <!--Modal lg size -->
    <div class="mr-1 mb-1 d-inline-block">
        <!--large size Modal -->
        <div class="modal fade text-left" id="modal_imgShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Lihat Gambar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="imgContainer" style="width: 100%;" src>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal text-left" id="modal_delete"  role="dialog" aria-labelledby="myModalLabel120" aria-modal="true" style="padding-right: 16px;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">Delete Komoditas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus <span id="del_nama"></span> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="button" class="btn btn-danger ml-1" data-dismiss="modal"  onClick="submitDelete()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Delete</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
@if($status ==  1)
        $("#toast-success-content").html('{{$status_message}}');
        $("#toast-success").toast('show');
        @elseif ($status ==  -1)
        $("#toast-error-content").html('{{$status_message}}');
        $("#toast-error").toast('show');
        @endif

        function popModalDelete(id, nama){
            idTarget = id;
            $("#del_nama").html(nama);
            $('#modal_delete').modal('show');
        }

        function submitDelete(){
            $(".cover-spin").fadeIn(500)
            del_nama = $("#del_nama").html()
            $.post( "{{route('admin.inv.komoditas_utama.delete')}}", { "_token": "{{ csrf_token() }}", "id": idTarget })
                .done(function( res ) {
                    if (res==1){
                        $("#toast-success-content").html('Berhasil menghapus '+del_nama);
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href="{{route('admin.inv.komoditas_utama')}}";
                        }, 1000);
                    } else {
                        $("#toast-error-content").html("Gagal menghapus "+del_nama);
                        $("#toast-error").toast('show');
                        $(".cover-spin").fadeOut(500)
                    }
                });
        }

        function showImg(id, file){
            // $('#imgContainer').attr('src', "");
            $('#imgContainer').attr('src', "{{asset('uploads/InvestmentKomoditas')}}/"+file+"");
            $('#modal_imgShow').modal('show');
        }
</script>
@endsection