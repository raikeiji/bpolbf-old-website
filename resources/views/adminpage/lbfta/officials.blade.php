@extends('adminpage.template.apps')

@section('title')
LBFTA - Officials
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
                            <h5 class="content-header-title float-left pr-1 mb-0">LBFTA Officials</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Officials
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
                                    <a href="{{route('admin.lbfta.officials.add')}}" class="btn btn-success round glow">
                                        <i class="bx bx-plus"></i>
                                        <span class="align-middle ml-25">Add Data</span>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table id="table-officials" class="table table-bordered table-hover zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Jabatan</th>
                                                        <th>Urutan</th>
                                                        <th style="width: 15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <p hidden>{{$i = 1}}</p>
                                                    @foreach($data as $d)
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$d->nama}}</td>
                                                            <td>{{$d->jabatan}}</td>
                                                            <td>{{$d->order}}</td>
                                                            <td class="text-center">
                                                                <a href="{{route('admin.lbfta.officials.edit',$d->id)}}"><button type="button" class="btn btn-icon rounded-circle btn-primary glow" title="Edit"><i class="bx bxs-edit-alt"></i></button></a>
                                                                <button type="button" class="btn btn-icon rounded-circle btn-danger glow" title="Delete" onClick="popModalDelete('{{ $d->id}}')"><i class="bx bxs-trash"></i></button>
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
@endsection

@section('script')
<script>
        $('#table-officials').DataTable({ 
            "order": [[ 3, "asc" ]] 
        }); 
        
        if(getUrlParameter("status")=="1"){
            $("#toast-success-content").html(getUrlParameter("status_message"));
            $("#toast-success").toast('show');
        } else if (getUrlParameter("status")=="-1"){
            $("#toast-error-content").html(getUrlParameter("status_message"));
            $("#toast-error").toast('show');
        }

        function popModalDelete(id){
            var id_btn = id;
            Swal.fire({
                title: 'Delete Official?',
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
                        url : "{{route('admin.lbfta.officials.delete')}}",
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
@endsection