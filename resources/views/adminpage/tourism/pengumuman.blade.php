@extends('adminpage.template.apps')

@section('title')
CMS Tourism - Announcement
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Announcement</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Announcement
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
                                    <a href="{{route('admin.t.pengumuman.add')}}" class="btn btn-success round glow">
                                        <i class="bx bx-plus"></i>
                                        <span class="align-middle ml-25">Add Data</span>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul</th>
                                                        <th>Author</th>
                                                        <th>Tanggal</th>
                                                        <th>Active</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <p hidden>{{$i = 1}}</p>
                                                @foreach($data as $d)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$d->judul_id}}</td>
                                                        <td>{{$d->author}}</td>
                                                        <td>{{$d->tanggal}}</td>
                                                        <td>
                                                            @if ($d->isactive == 1)
                                                                <input id="check_{{$d->id}}" type="checkbox" class="" name="isActive" value="{{$d->isactive}}" checked onchange="submitActive('{{$d->id}}','{{$d->judul_id}}')">
                                                                <label for="isActive"> Active</label>
                                                            @else
                                                                <input id="check_{{$d->id}}" type="checkbox" class="" name="isActive" value="{{$d->isactive}}" onchange="submitActive('{{$d->id}}','{{$d->judul_id}}')">
                                                                <label for="isActive"> Active</label>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{route('admin.t.pengumuman.edit',$d->id)}}"><button type="button" class="btn btn-icon rounded-circle btn-primary glow mr-1 mb-1" title="Edit"><i class="bx bxs-edit-alt"></i></button></a>
                                                            <button type="button" class="btn btn-icon rounded-circle btn-danger glow mr-1 mb-1" title="Delete" onClick="popModalDelete('{{ $d->id}}','{{ $d->judul_id }}')"><i class="bx bxs-trash"></i></button>
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
    <div class="modal text-left" id="modal_delete"  role="dialog" aria-labelledby="myModalLabel120" aria-modal="true" style="padding-right: 16px;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">Delete Informasi Visa</h5>
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

        function popModalDelete(id,nama){
            idTarget = id;
            $("#del_nama").html(nama);
            $('#modal_delete').modal('show');
        }

        function submitDelete(){
            $(".cover-spin").fadeIn(500)
            del_nama = $("#del_nama").html()
            $.post( "{{route('admin.t.pengumuman.delete')}}", { "_token": "{{ csrf_token() }}", "id": idTarget })
                .done(function( res ) {
                    if (res==1){
                        $("#toast-success-content").html('Berhasil menghapus '+del_nama);
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href='/admin-page/tourism/announcement';
                        }, 1000);
                    } else {
                        $("#toast-error-content").html("Gagal menghapus "+del_nama);
                        $("#toast-error").toast('show');
                        $(".cover-spin").fadeOut(500)
                    }
                });
        }
        function submitActive(id, nama) {
            $(".cover-spin").fadeIn(500)
            up_nama = nama
            $.post( "{{route('admin.t.pengumuman.active')}}", { "_token": "{{ csrf_token() }}", "id": id })
                .done(function( res ) {
                    if (res==1){
                        $("#toast-success-content").html('Berhasil mengganti '+up_nama+' menjadi announcement homepage');
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href=window.location.href;
                        }, 1000);
                    }else if(res==2){
                        $("#toast-success-content").html('Berhasil mengganti '+up_nama+' bukan announcement homepage');
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href=window.location.href;
                        }, 1000);
                    }else if(res==0){
                        $("#toast-error-content").html("Gagal: Maksimal Announcement yang Active adalah 3");
                        $("#toast-error").toast('show');
                        $("#check_"+id).prop( "checked", false );
                        $(".cover-spin").fadeOut(500)
                    } else {
                        $("#toast-error-content").html("Gagal mengganti "+up_nama);
                        $("#toast-error").toast('show');
                        $(".cover-spin").fadeOut(500)
                    }
                });
        }
    </script>
@endsection