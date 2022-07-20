@extends('adminpage.template.apps')

@section('title')
LBFTA - Edit News Release
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
                            <h5 class="content-header-title float-left pr-1 mb-0">LBFTA News Release</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{route('admin.lbfta.news_release')}}">News Edit Release</a>
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
                <form action="{{route('admin.lbfta.news_release.update')}}" id="form_input"  method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <section id="basic-tabs-components">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Form Edit News Release</h4>
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
                                                        <textarea class="form-control" id="editor3" name="deskripsi_cn" rows="3">{{$data->judul_cn}}</textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                        
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Sumber</label>
                                                <input type="text" class="form-control" id="basicInput" name="author" placeholder="Masukkan Sumber" value="{{$data->author}}">
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
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
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Dokumen Pendukung (PDF)<span class="text-red"></span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="dokumen_pdf" id="dokumen_pdf" accept="application/pdf">
                                                    <label class="custom-file-label" for="dokumen_pdf">Pilih File</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <div id="tag_section">
                                                
                                            </div>
                                            <fieldset class="form-group">
                                                <div id="tags">
                                                    @php
                                                        $i=0;
                                                    @endphp
                                                    @foreach($tags as $s => $value)
                                                    <input id="s_tag_{{$i}}" type="text" value="{{$value->tag}}" name="tag[]" placeholder="Tambahkan Tag" style="display:none"/>
                                                    <span id="tag_{{$i}}" class="tag">{{$value->tag}}</span>
                                                    @php
                                                        $i=$i+1;
                                                    @endphp
                                                    @endforeach
                                                    <input type="text" value="" placeholder="Tambahkan Tag" />
                                                </div>
                                            </fieldset>
                                            Tambahkan Tag dan tekan [,] atau [Tab] atau [Enter]
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

        //tags
        var i=parseInt('{{$i}}');
        $('#tags input').on('focusout', function() {
        var txt = this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g, ''); // allowed characters list
        if (txt) {
            $(this).before('<span id="tag_'+i+'" class="tag">' + txt.toLowerCase() + '</span>'); 
            $("#tag_section").append(`<input id="s_tag_`+i+`" type="text" value="`+txt.toLowerCase()+`" name="tag[]" placeholder="Tambahkan Tag" style="display:none"/>`);
            i=i+1;
        }
        this.value = "";
        
        }).on('keyup', function(e) {
        // comma|enter (add more keyCodes delimited with | pipe)
        if (/(188|13)/.test(e.which)) $(this).trigger('focusout');
        });

        $('#tags').on('click', '.tag', function() {
            if (confirm("Really delete this tag?")) {
                $(this).remove();
                $("#s_"+$(this).attr("id")).remove();    
            }
        });
        //end tags

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
                width: 350,
                height: 219
            },
            boundary: {
                width: 400,
                height: 300
            },
        });

        $uploadCrop.croppie('bind', {
            url: "{{asset('uploads/ProfileNews/'.$data->image.'')}}",
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
        var uploadField = document.getElementById("dokumen_pdf");

        uploadField.onchange = function() {
            if(this.files[0].size > 2000000){
            alert("Ukuran File Terlalu Besar, Pastikan File Anda Kurang Dari 2 MB");
            this.value = "";
            };
        };
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection