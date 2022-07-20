@extends('adminpage.template.apps')

@section('title')
    CMS Tourism - User Generate Content
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Beyond Labuan Bajo</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">User Generate Content
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
                                    <button onClick="popModalAdd()" class="btn btn-success round glow">
                                        <i class="bx bx-plus"></i>
                                        <span class="align-middle ml-25">Add Data</span>
                                    </button>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover zero-configuration">
                                                <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Region</th>
                                                    <th width="25%">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <p hidden>{{$i = 1}}</p>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$d->nama}}</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-icon rounded-circle btn-primary glow mr-1 mb-1" title="Edit" onClick="popModalEdit('{{ $d->id }}','{{ $d->nama }}','{{$d->lat}}','{{$d->long}}')"><i class="bx bxs-edit-alt"></i></button></button>
                                                        <button type="button" class="btn btn-icon rounded-circle btn-danger glow mr-1 mb-1" title="Delete" onClick="popModalDelete('{{ $d->id}}','{{ $d->nama }}')"><i class="bx bxs-trash"></i></button>
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
    <!-- Modal Add -->
    <div class="modal text-left" id="modal_add" role="dialog" aria-labelledby="myModalLabel140" aria-modal="true" style="padding-right: 16px;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel140">Add Region</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edt_form">
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label for="basicInput">Nama Region</label>
                                    <input type="text" class="form-control" id="add_nama" name="add_nama" placeholder="Masukan Nama Region" required>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Latitude</label>
                                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Masukan Latitude" required>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Longitude</label>
                                    <input type="text" class="form-control" id="long" name="long" placeholder="Masukan Longitude" required>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>

                    <button type="button" class="btn btn-success ml-1" data-dismiss="modal" onClick="submitAdd()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal text-left" id="modal_edit" role="dialog" aria-labelledby="myModalLabel140" aria-modal="true" style="padding-right: 16px;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel140">Edit Region</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edt_form">
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label for="basicInput">Nama Region</label>
                                    <input type="text" class="form-control" id="edt_nama" name="edt_nama" placeholder="Masukan Nama Region" required>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Latitude</label>
                                    <input type="text" class="form-control" id="edt_lat" name="edt_lat" placeholder="Masukan Latitude" required>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset class="form-group">
                                    <label for="basicInput">Longitude</label>
                                    <input type="text" class="form-control" id="edt_long" name="edt_long" placeholder="Masukan Longitude" required>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>

                    <button type="button" class="btn btn-warning ml-1" data-dismiss="modal" onClick="submitEdit()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Edit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Hapus -->
    <div class="modal text-left" id="modal_delete"  role="dialog" aria-labelledby="myModalLabel120" aria-modal="true" style="padding-right: 16px;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">Delete Region</h5>
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
        $("#edt_form").validate({
            // Specify validation rules
            rules: {
                nama: "required",
            },
            // Specify validation error message
            messages: {
                nama: "*Masukan Hashtag UGC",
            },
            submitHandler: function(form) {
            }
        });

        var idTarget="";

        function popModalEdit(id,nama,lat,long){
            idTarget = id
            $("#edt_nama").val(nama);
            $("#edt_lat").val(lat);
            $("#edt_long").val(long);
            $('#modal_edit').modal('show');
        }

        function submitEdit(){
            $(".cover-spin").fadeIn(500)
            edt_nama = $("#edt_nama").val();
            edt_lat = $("#edt_lat").val();
            edt_long = $("#edt_long").val();
            if ($("#edt_form").valid()){
                $.post( "{{route('admin.t.region.edit')}}", {
                    "_token": "{{ csrf_token() }}",
                    "id": idTarget,
                    "nama": edt_nama,
                    "lat" : edt_lat,
                    "long" : edt_long,
                }).done(function( res ) {
                    if (res==1){
                        $("#toast-success-content").html('Berhasil mengedit '+ edt_nama);
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href="{{route('admin.t.region')}}"
                        }, 1000);
                    } else {
                        $("#toast-error-content").html("Gagal mengedit "+edt_nama);
                        $("#toast-error").toast('show');
                        $(".cover-spin").fadeOut(500)
                    }
                });
            } else {
                $("#toast-error-content").html("Form tidak valid");
                $("#toast-error").toast('show');
                $(".cover-spin").fadeOut(500)
            }
        }

        function popModalDelete(id,nama){
            idTarget = id;
            $("#del_nama").html(nama);
            $('#modal_delete').modal('show');
        }

        function submitDelete(){
            $(".cover-spin").fadeIn(500)
            del_nama = $("#del_nama").html()
            $.post( "{{route('admin.t.region.delete')}}", { "_token": "{{ csrf_token() }}", "id": idTarget })
                .done(function( res ) {
                    if (res==1){
                        $("#toast-success-content").html('Berhasil menghapus '+del_nama);
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href="{{route('admin.t.region')}}";
                        }, 1000);
                    } else {
                        $("#toast-error-content").html("Gagal menghapus "+del_nama);
                        $("#toast-error").toast('show');
                        $(".cover-spin").fadeOut(500)
                    }
                });
        }

        function popModalAdd(){
            $('#modal_add').modal('show');
        }

        function submitAdd(){
            $(".cover-spin").fadeIn(500)
            add_nama = $("#add_nama").val()
            add_lat = $("#lat").val()
            add_long = $("#long").val()
            $.post( "{{route('admin.t.region.add')}}", { "_token": "{{ csrf_token() }}",
                "nama": add_nama,
                "lat" : add_lat,
                "long" : add_long
            })
                .done(function( res ) {
                    if (res==1){
                        $("#toast-success-content").html('Berhasil menambah '+add_nama);
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href="{{route('admin.t.region')}}"
                        }, 1000);
                    } else {
                        $("#toast-error-content").html("Gagal menambah "+add_nama);
                        $("#toast-error").toast('show');
                        $(".cover-spin").fadeOut(500)
                    }
                });
        }
    </script>
@endsection