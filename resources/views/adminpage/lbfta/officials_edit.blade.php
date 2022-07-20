@extends('adminpage.template.apps')

@section('title')
LBFTA - Edit Officials
@endsection

@section('custom_css')
<style>
#tags {
  float: left;
  border: 1px solid #ccc;
  padding: 4px;
  font-family: Arial;
}

#tags span.tag {
  cursor: pointer;
  display: block;
  float: left;
  color: #555;
  background: #add;
  padding: 5px 10px;
  padding-right: 30px;
  margin: 4px;
}

#tags span.tag:hover {
  opacity: 0.7;
}

#tags span.tag:after {
  position: absolute;
  content: "×";
  border: 1px solid;
  border-radius: 10px;
  padding: 0 4px;
  margin: 3px 0 10px 7px;
  font-size: 10px;
}

#tags input {
  background: #eee;
  border: 0;
  margin: 4px;
  padding: 7px;
  width: auto;
}
</style>
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
                                    <li class="breadcrumb-item"><a href="{{route('admin.lbfta.officials')}}">News Officials</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Add Edit Data
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <form action="{{route('admin.lbfta.officials.update')}}" id="form_input"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <section id="basic-tabs-components">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Form Edit Officials</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                        <input type="text" name="id" readonly value="{{$data->id}}" style="display:none"/>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Nama</label>
                                                <input type="text" class="form-control" id="basicInput" name="nama" placeholder="Masukkan Nama" value="{{$data->nama}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Jabatan</label>
                                                <input type="text" class="form-control" id="basicInput" name="jabatan" placeholder="Masukkan Jabatan" value="{{$data->jabatan}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Urutan (Order)</label>
                                                <input type="number" class="form-control" id="basicInput" name="order" min="1" min="1000" placeholder="Masukkan Urutan" value="{{$data->order}}">
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Gambar Utama <span class="text-red">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="img" id="main_image" accept="image/jpg, image/jpeg, image/png" required id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <!-- <label for="basicInputFile">Gambar Utama 1:1 <span class="text-red">*</span></label> -->
                                                <div id="upload-demo"></div>
                                                <input type="hidden" id="imagebase64" name="imagebase64">
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <button type="button" id="upload-result" class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</button>
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
<script src="{{asset('admin_page/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
    <script src="{{asset('admin_pageapp-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('admin_pageapp-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('admin_pageapp-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{asset('admin_pageapp-assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
    <script src="{{asset('admin_pageapp-assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>

    <script type="text/javascript">

        $('.timeseconds').daterangepicker({
            singleDatePicker: true,
            startDate:new Date('{{$data->tanggal}}'),
            locale: {
                format: 'MM-DD-YYYY'
            }
        });

        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 300,
                height: 450
            },
            boundary: {
                width: 330,
                height: 480
            }
        });

        $uploadCrop.croppie('bind', {
            url: "{{asset('uploads/ProfileOfficials/'.$data->image.'')}}",
            zoom: 0
        }).then(function(){
            console.log('jQuery bind complete');
        });

        $('#main_image').on('change', function () { 
            var reader = new FileReader();
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        $('#upload-result').on('click', function (ev) {
            console.log("masuk");
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {
                $('#imagebase64').val(resp);
                $('#form_input').submit();
            });
        });

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