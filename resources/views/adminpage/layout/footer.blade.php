@extends('adminpage.template.apps')

@section('title')
Layout - Footer
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Layout Footer</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Footer
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
               <section id="basic-tabs-components">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Form Footer</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{route('admin.layout.footer.update')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                    <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Alamat <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" value="{{$data->alamat}}" placeholder="Masukkan Video Url">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Privacy & Policy URL <span class="text-red">*</span></label>
                                                <input type="url" class="form-control" name="privacy_link" id="privacy_link" value="{{$data->privacy_link}}" placeholder="Masukkan Url Privacy & Plicy">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Instagram URL <span class="text-red">*</span></label>
                                                <input type="url" class="form-control" name="instagram_link" id="instagram_link" value="{{$data->instagram_link}}" placeholder="Masukkan Url Instagram">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Youtube URL <span class="text-red">*</span></label>
                                                <input type="url" class="form-control" name="youtube_link" id="youtube_link" value="{{$data->youtube_link}}" placeholder="Masukkan Url Youtube">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Twitter URL <span class="text-red">*</span></label>
                                                <input type="url" class="form-control" name="twitter_link" id="twitter_link" value="{{$data->twitter_link}}" placeholder="Masukkan Url Twitter">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Facebook URL <span class="text-red">*</span></label>
                                                <input type="url" class="form-control" name="facebook_link" id="facebook_link" value="{{$data->facebook_link}}" placeholder="Masukkan Url Facebook">
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Background Footer</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="img" id="inputGroupFile01" onchange="loadFile(event)" accept="image/*" />
                                                    <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                                                </div>
                                            </fieldset>
                                            <img id="imgContainer" style="width: 768px" src="{{asset('uploads/LayoutFooter/'.$data->background_image.'')}}">
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <button class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</button>
                                        </div>
                                    </div>
                                </form>
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
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('imgContainer');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    var loadFile2 = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('imgContainer2');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
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