@extends('adminpage.template.apps')

@section('title')
    Tourism - Rekomendasi
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Rekomendasi</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Rekomendasi
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
                                    <a href="{{route('admin.t.recomendation.add')}}" class="btn btn-success round glow">
                                        <i class="bx bx-plus"></i>
                                        <span class="align-middle ml-25">Add Data</span>
                                     </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <p hidden>{{$i = 1}}</p>
                                            <table class="table table-bordered table-hover zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Judul</th>
                                                    <th>Link</th>
                                                    <th width="25%">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if ($data != null)
                                                    @foreach($data as $d)
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$d->judul_id}}</td>
                                                            <td>{{$d->link_url}}</td>
                                                            <td class="text-center">
                                                                <a href="{{route('admin.t.detail.recomendation',$d->id)}}"><button type="button" class="btn btn-icon rounded-circle btn-primary glow mr-1 mb-1" title="Edit"><i class="bx bxs-edit-alt"></i></button></a>
                                                                <button type="button" class="btn btn-icon rounded-circle btn-danger glow mr-1 mb-1" title="Delete" onClick="popModalDelete('{{ $d->id}}','{{ $d->nama }}')"><i class="bx bxs-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                        <p hidden>{{$i++}}</p>
                                                    @endforeach
                                                @endif
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
                    <h5 class="modal-title white" id="myModalLabel120">Delete Rumah Produksi</h5>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if($status ==  1)         
        $("#toast-success-content").html('{{$status_message}}');
        $("#toast-success").toast('show');
        var url = window.location.href;
        url = url.replace('post','');
        location.replace(url);
    @elseif ($status ==  -1)  
        $("#toast-error-content").html('{{$status_message}}');
        $("#toast-error").toast('show');   
        var url = window.location.href;
        url = url.replace('post','');
        location.replace(url);
    @endif
    $('#submit-btn').on('click', function (event) {
        swal({
            title: 'Mengubah Data Rencakan Perjalananmu',
            text: 'Apakah Anda Yakin Untuk Mengubah Data Pada Halaman Rencakan Perjalananmu?',
            icon: 'warning',
            buttons: ["Tidak", "Ya!"],
        }).then(function(value) {
            if (value) {
                $('#form').submit();
            }
        });
    });
    function popModalDelete(id){
            var id_btn = id;
            Swal.fire({
                title: 'Hapus Rekomendasi?',
                text: "Data Tidak Dapat Dikembalikan",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#D3514D',
                cancelButtonColor: '#d12900',
                confirmButtonText: 'OK',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-outline-danger ml-1',
                buttonsStyling: false,
                }).then(function (result) {
                if (result.value) {
                    $(".cover-spin").fadeIn(250);
                    $.ajax({
                        type:"POST",
                        url : "{{route('delete.admin.t.recomendation')}}",
                        data: { 
                            "_token": "{{ csrf_token() }}",
                            "id": id,
                        },
                        success:function(id){
                            $(".cover-spin").fadeOut(250);
                            if (id==1){
                                Swal.fire(
                                    {
                                        type: "success",
                                        title: 'Deleted!',
                                        text: 'Data telah dibuang.',
                                        confirmButtonClass: 'btn btn-danger',
                                    }
                                )
                                setTimeout(function(){
                                    window.location = window.location.href.split("?")[0];
                                }, 1000);
                            } else {
                                Swal.fire(
                                    {
                                        type: "error",
                                        title: 'Error Delete!',
                                        text: 'Data gagal dibuang.',
                                        confirmButtonClass: 'btn btn-danger',
                                    }
                                )
                            }
                        },
                        error: function () {
                            Swal.fire(
                                {
                                    type: "error",
                                    title: 'Error Delete!',
                                    text: 'Data gagal dibuang.',
                                    confirmButtonClass: 'btn btn-danger',
                                }
                            )
                        }
                    });
                }
            });
        }
</script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection