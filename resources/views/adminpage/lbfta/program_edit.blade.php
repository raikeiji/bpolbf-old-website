@extends('adminpage.template.apps')

@section('title')
LBFTA - Edit Program
@endsection

@section('custom_css')
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
<!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css"/>
@endsection

@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">LBFTA Edit Program</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.lbfta.program')}}">Edit Program</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Edit Data
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <form action="{{route('admin.lbfta.program.update')}}" id="form_input"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <section id="basic-tabs-components">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="card-title col-sm-6 col-lg-6 col-md-6">
                                        <h4>Form Edit Program</h4>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 col-md-6">
                                        <button type="button" class="btn btn-primary float-right upload-result">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <input type="text" name="id" readonly value="{{$data->id}}" style="display:none"/>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="id-tab" data-toggle="tab" href="#id" aria-controls="id" role="tab" aria-selected="true">
                                                <i class="flag-icon flag-icon-id"></i>
                                                <span class="align-middle">Indonesia</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="us-tab" data-toggle="tab" href="#us" aria-controls="us" role="tab" aria-selected="false">
                                                <i class="flag-icon flag-icon-us"></i>
                                                <span class="align-middle">English</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="cn-tab" data-toggle="tab" href="#cn" aria-controls="cn" role="tab" aria-selected="false">
                                                <i class="flag-icon flag-icon-cn"></i>
                                                <span class="align-middle">Mandarin</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="id" aria-labelledby="id-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul <span class="text-red"></span></label>
                                                        <input type="text" class="form-control" name="judul_id" required id="basicInput"  placeholder="Masukkan Judul" value="{{$data->judul_id}}">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi <span class="text-red"></span></label>
                                                        <textarea class="form-control"  id="editor1" name="deskripsi_id" required rows="3">{{$data->deskripsi_id}}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul <span class="text-red"></span></label>
                                                        <input type="text" class="form-control" name="judul_en" required id="basicInput" placeholder="Masukkan Judul" value="{{$data->judul_en}}">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi <span class="text-red"></span></label>
                                                        <textarea class="form-control" id="editor2" name="deskripsi_en" required rows="3">{{$data->deskripsi_en}}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cn" aria-labelledby="cn-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul</label>
                                                        <input type="text" class="form-control" name="judul_cn" id="basicInput" placeholder="Masukkan Judul" value="{{$data->judul_cn}}">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi</label>
                                                        <textarea class="form-control" id="editor3" name="deskripsi_cn" rows="3">{{$data->deskripsi_cn}}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <!-- Div tag -->
                                                <input id="icon_hide" name="icon" type="text" style="display:none" readonly>
                                                <div id='icon-picker' role="iconpicker" data-icon="{{$data->icon}}" data-iconset="glyphicon|ionicon|fontawesome4|fontawesome5|weathericon|mapicon|octicon|typicon|elusiveicon|flagicon"></div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12 form-group file-repeater">
                                            <h4>Edit Program</h4>
                                            <div id="remove_program_section" style="display:none">
                                            </div>
                                            <div data-repeater-list="repeater">
                                                @foreach($sub_program as $s => $value)
                                                    <div id="program_{{$value->id}}" class="row mb-2">
                                                        <div class="col-10 col-lg-8 mb-1" style="padding:0px">
                                                            <div class="col-md-12">
                                                                <fieldset class="form-group">
                                                                    <label for="basicInput">Judul Program<span class="text-red"></span></label>
                                                                    <input type="text" class="form-control" name="judul_program[]" required  placeholder="Masukkan Judul" value="{{$value->judul}}">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <fieldset class="form-group">
                                                                    <label for="basicInput">Deskripsi Program<span class="text-red"></span></label>
                                                                    <textarea class="form-control desc-tiny"  name="deskripsi_program[]" required rows="3">{{ $value->deskripsi }}</textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-lg-4 text-lg-right" style="margin-top:25px">
                                                            <button class="btn btn-icon btn-danger trigger_delete" type="button" data-repeater-delete onclick="remove_program('{{$value->id}}')">
                                                                <i class="bx bx-x"></i>
                                                                <span class="d-lg-inline-block d-none">Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div data-repeater-item>
                                                    <div class="row mb-2">
                                                        <div class="col-10 col-lg-8 mb-1" style="padding:0px">
                                                            <div class="col-md-12">
                                                                <fieldset class="form-group">
                                                                    <label for="basicInput">Judul Program<span class="text-red"></span></label>
                                                                    <input type="text" class="form-control" name="judul_program" required  placeholder="Masukkan Judul">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <fieldset class="form-group">
                                                                    <label for="basicInput">Deskripsi Program<span class="text-red"></span></label>
                                                                    <textarea class="form-control desc-tiny"  name="deskripsi_program" required rows="3"></textarea>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-lg-4 text-lg-right" style="margin-top:25px">
                                                            <button class="btn btn-icon btn-danger trigger_delete" type="button" data-repeater-delete>
                                                                <i class="bx bx-x"></i>
                                                                <span class="d-lg-inline-block d-none">Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col form-group p-0">
                                                <button class="btn btn-primary trigger_add" data-repeater-create type="button">
                                                    <i class="bx bx-plus"></i>Add
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12" style="display:none">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tanggal <span class="text-red"></span></label>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" class="form-control timeseconds" name="tanggal" placeholder="Select Date">
                                                    <div class="form-control-position">
                                                        <i class='bx bx-calendar-check'></i>
                                                    </div>
                                                </fieldset>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <button type="button" class="btn btn-primary float-right upload-result" style="margin-top: 25px;">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Bootstrap-Iconpicker Bundle -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>

    <script type="text/javascript">
        function remove_program(id){
            $("#remove_program_section").append(`<input type="text" name="remove_program[]" value="`+id+`"/>`);
            $("#program_"+id).html("")
        }

        function trigger_editor_program(){
            setTimeout(function(){ 
                tinymce.init({                              
                    selector: '.desc-tiny',
                    convert_urls: false,
                    statusbar: false, 
                    resize: true,
                    plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
                    toolbar: 'preview | numlist bullist outdent indent  | fontsizeselect | bold italic underline | forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify | undo redo |',
                    image_title: true,
                    automatic_uploads: true,
                    images_upload_url: '{{url("admin-page/tinyMCEUpload")}}',
                    file_picker_types: 'image',
                    file_picker_callback: function(cb, value, meta) {
                        console.log(meta)
                        var input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        input.onchange = function() {
                            var file = this.files[0];

                            var reader = new FileReader();
                            reader.readAsDataURL(file);
                            reader.onload = function () {
                                var id = 'blobid' + (new Date()).getTime();
                                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                                var base64 = reader.result.split(',')[1];
                                var blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);
                                cb(blobInfo.blobUri(), { title: file.name });
                            };
                        };
                        input.click();
                    }
                });

            }, 500);
        }

        $('.timeseconds').daterangepicker({
            singleDatePicker: true,
            startDate:new Date('{{$data->tanggal}}'),
            locale: {
                format: 'MM-DD-YYYY'
            }
        });

        $("#icon_hide").val("{{$data->icon}}");

        $('.upload-result').on('click', function (ev) {
            $('#form_input').submit();
        });

        $('#icon-picker').on('change', function(e) {
            $("#icon_hide").val(e.icon)
        });

        $(".trigger_add").on('click', function(e) {
            trigger_editor_program();
        });

        trigger_editor_program();

        tinymce.init({                              
            selector: '#editor2',
            convert_urls: false,
            statusbar: false, 
            resize: true,
            plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: 'preview | numlist bullist outdent indent  | fontsizeselect | bold italic underline | forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify | undo redo |',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{url("admin-page/tinyMCEUpload")}}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                console.log(meta)
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });

        tinymce.init({                              
            selector: '#editor1',
            convert_urls: false,
            statusbar: false, 
            resize: true,
            plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: 'preview | numlist bullist outdent indent  | fontsizeselect | bold italic underline | forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify  | undo redo |',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{url("admin-page/tinyMCEUpload")}}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                console.log(meta)
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
        tinymce.init({                              
            selector: '#editor3',
            convert_urls: false,
            statusbar: false, 
            resize: true,
            plugins: 'image code print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link    table charmap hr pagebreak nonbreaking  toc insertdatetime advlist lists textcolor wordcount   imagetools    contextmenu colorpicker textpattern media ',
            toolbar: 'preview | numlist bullist outdent indent  | fontsizeselect | bold italic underline | forecolor backcolor | link image media | alignleft aligncenter alignright alignjustify | undo redo |',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{url("admin-page/tinyMCEUpload")}}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                console.log(meta)
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection