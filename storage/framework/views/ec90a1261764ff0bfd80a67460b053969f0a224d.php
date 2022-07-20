<?php $__env->startSection('title'); ?>
    CMS Tourism - Slider
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_css'); ?>
    <style>
        .text-red {
            color: red !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Informasi Visa</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.t.iv')); ?>">Announcement</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Add Data
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
                                <h4>Form Informasi Visa</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.t.iv.store')); ?>" id="form_input" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="id-tab" data-toggle="tab" href="#id" aria-controls="id" role="tab" aria-selected="true">
                                            <i class="flag-icon flag-icon-id"></i>
                                            <span class="align-middle">Indonesia <span class="text-red">*</span></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="us-tab" data-toggle="tab" href="#us" aria-controls="us" role="tab" aria-selected="false">
                                            <i class="flag-icon flag-icon-us"></i>
                                            <span class="align-middle">English <span class="text-red">*</span></span>
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
                                                    <label for="basicInput">Judul <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="judul_id" required id="basicInput" placeholder="Masukkan Judul">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Deskripsi <span class="text-red">*</span></label>
                                                    <textarea class="form-control" name="deskripsi_id" required id="editor1"  rows="3">&nbsp;</textarea>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Judul <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" id="basicInput" name="judul_en" required placeholder="Masukkan Judul">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Deskripsi <span class="text-red">*</span></label>
                                                    <textarea class="form-control" name="deskripsi_en" required id="editor2" rows="3">&nbsp;</textarea>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="cn" aria-labelledby="cn-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Judul <span class="text-red">*</span></label>
                                                    <input type="text" class="form-control" name="judul_cn" id="basicInput" placeholder="Masukkan Judul">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Deskripsi <span class="text-red">*</span></label>
                                                    <textarea class="form-control" id="editor3" name="deskripsi_cn" rows="3"></textarea>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                    <div class="col-sm-12 col-lg-12 col-md-12">
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
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Dokumen Pendukung (PDF)<span class="text-red"></span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="dokumen_pdf" id="dokumen_pdf" accept="application/pdf">
                                                <label class="custom-file-label" for="dokumen_pdf">Pilih File</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 col-lg-12 col-md-12">
                                        <button type="button" id="upload-result" class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</button>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 350,
                height: 250
            },
            boundary: {
                width: 400,
                height: 300
            }
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
            images_upload_url: '<?php echo e(url("admin-page/tinyMCEUpload")); ?>',
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
            images_upload_url: '<?php echo e(url("admin-page/tinyMCEUpload")); ?>',
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
            images_upload_url: '<?php echo e(url("admin-page/tinyMCEUpload")); ?>',
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
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>