<?php $__env->startSection('title'); ?>
    CMS Tourism - Culinary
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_css'); ?>
    <style>
        .text-red {
            color: red !important;
        }
        .error{
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
                            <h3 class="pr-1 mb-20">CULINARY</h3>
                        </div>
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Culinary</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.t.culinary')); ?>">Culinary</a>
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
                                <h4>Form Culinary</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                            <form action="<?php echo e(route('admin.t.culinary.update')); ?>" id="form_input" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" value="<?php echo e($data->id); ?>" name="id" id="id">
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
                                                        <input type="text" class="form-control" name="judul_id" value="<?php echo e($data->judul_id); ?>" required id="basicInput" placeholder="Masukkan Judul">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi <span class="text-red">*</span></label>
                                                        <textarea class="form-control" name="deskripsi_id" id="editor1"  rows="3">&nbsp;<?php echo e($data->deskripsi_id); ?></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul <span class="text-red">*</span></label>
                                                        <input type="text" class="form-control" id="basicInput" name="judul_en" value="<?php echo e($data->judul_en); ?>" placeholder="Masukkan Judul">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi <span class="text-red">*</span></label>
                                                        <textarea class="form-control" name="deskripsi_en" id="editor2" rows="3">&nbsp; <?php echo e($data->deskripsi_en); ?></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cn" aria-labelledby="cn-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul</label>
                                                        <input type="text" class="form-control" name="judul_cn" id="basicInput" value="<?php echo e($data->judul_cn); ?>" placeholder="Masukkan Judul">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi</label>
                                                        <textarea class="form-control" id="editor3" name="deskripsi_cn" rows="3">&nbsp; <?php echo e($data->deskripsi_cn); ?></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Daftar Toko <span class="text-red">*</span></label>
                                                <select id="toko" name="toko[]" id="Select" multiple="multiple" class="select2 form-control" data-placeholder="Pilih Toko">
                                                    <?php $__currentLoopData = $toko; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($status = 0); ?>

                                                        <?php $__currentLoopData = $relasiToko; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($value->id == $v->id_resto): ?>
                                                                <?php echo e($status = 1); ?>

                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($status == 1): ?>
                                                            <option value="<?php echo e($value->id); ?>" selected><?php echo e($value->nama); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->nama); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Sub Kategori <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="sub-category" value="Things To Buy" readonly>

                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Tag <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="tag" value="Culinary" readonly>

                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">URL Video <span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="URL" id="url"  placeholder="Masukkan URL Video" value="<?php echo e($data->video_url); ?>">
                                                <small>Masukan Embed URL.</br>Contoh : https://www.youtube.com/embed/72y6HUgRKzw</small>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Gambar Utama <span class="text-red">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="main_image" name="img" accept="image/jpg, image/jpeg, image/png" id="inputGroupFile01">
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
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <label>Daftar Galery</label>
                                            <div id="remove_gallery_section" style="display:none">
                                            </div>
                                            <table class="table table-bordered text-center" id="data-image">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr id="gallery_<?php echo e($gallery->id); ?>">
                                                        <th><img src="<?php echo e(asset('uploads/TourismCulinary/'.$gallery->id_relasi.'/gallery/'.$gallery->file_img.'')); ?>" alt="" width="150px"></th>
                                                        <th>
                                                            <button class="btn btn-danger" data-repeater-create type="button" onclick="remove_gallery('<?php echo e($gallery->id); ?>')">
                                                                <i class="bx bx-x"></i>Delete
                                                            </button>
                                                        </th>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12 form-group file-repeater">
                                            <label>Gallery</label>
                                            <div data-repeater-list="repeater">
                                                <div data-repeater-item>
                                                    <div class="row mb-2">
                                                        <div class="col-10 col-lg-8 mb-1">
                                                            <div class="custom-file">
                                                                <input type="file" class="form-control-file" accept="image/gif, image/jpeg, image/png" name="gallery">
                                                            </div>
                                                        </div>
                                                        <div class="col-2 col-lg-4 text-lg-right">
                                                            <button class="btn btn-icon btn-danger" type="button" data-repeater-delete>
                                                                <i class="bx bx-x"></i>
                                                                <span class="d-lg-inline-block d-none">Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col form-group p-0">
                                                <button class="btn btn-primary" data-repeater-create type="button">
                                                    <i class="bx bx-plus"></i>Add
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-12">
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

function remove_gallery(id){
    $("#remove_gallery_section").append(`<input type="text" name="remove_gallery[]" value="`+id+`"/>`);
    $("#gallery_"+id).html("")
}

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 350,
        height: 350
    },
    boundary: {
        width: 400,
        height: 400
    }
});

$uploadCrop.croppie('bind', {
    url: "<?php echo e(asset('uploads/TourismCulinary'.$data->id.'/'.$data->thumbnail.'')); ?>",
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
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        $('#imagebase64').val(resp);
        $('#form_input').submit();
    });
});

$("#toko").val();

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
tinymce.init({                              
    selector: '#editor4',
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
    selector: '#editor5',
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
    selector: '#editor6',
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
</script>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>