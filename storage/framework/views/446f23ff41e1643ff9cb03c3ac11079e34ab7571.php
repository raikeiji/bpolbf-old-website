<?php $__env->startSection('title'); ?>
    CMS Tourism - Plan Your Trip
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Plan Your Trip</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.t.pyt')); ?>">Plan Your Trip</a>
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
                <section id="basic-tabs-components">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Form Plan Your Trip</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.t.pyt.update')); ?>"  method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
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
                                                        <label for="basicInput">Judul</label>
                                                        <input type="text" class="form-control" name="judul_id" required value="<?php echo e($data->judul_id); ?>" id="basicInput" placeholder="Masukkan Judul">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi</label>
                                                        <textarea lass="form-control" name="deskripsi_id" required id="editor1" rows="3"><?php echo e($data->deskripsi_id); ?></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul</label>
                                                        <input type="text" class="form-control" name="judul_en" required value="<?php echo e($data->judul_en); ?>" id="basicInput" placeholder="Masukkan Judul">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi</label>
                                                        <textarea lass="form-control" name="deskripsi_en" required id="editor2" rows="3"><?php echo e($data->deskripsi_en); ?></textarea>
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
                                                        <textarea lass="form-control" name="deskripsi_cn" id="editor3" rows="3"><?php echo e($data->deskripsi_cn); ?></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">File</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="img" id="inputGroupFile01">
                                                    <label class="custom-file-label"  for="inputGroupFile01">Pilih file</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-6 col-md-12">
                                            <fieldset class="form-group">
                                                <label class="basicInput" for="URL">URL Video</label>
                                                <input type="text" class="form-control" name="URL" required placeholder="Masukkan URL Video" value="<?php echo e($data->video_url); ?>" id="basicInput">
                                                <small>Masukan Embed URL.</br>Contoh : https://www.youtube.com/embed/72y6HUgRKzw</small>
                                            </fieldset>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                            <button type="submit" class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</button>
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
        tinymce.init({
            selector: '#editor2',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
            content_css: 'css/content.css'
        });
        tinymce.init({
            selector: '#editor1',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
            content_css: 'css/content.css'
        });
        tinymce.init({
            selector: '#editor3',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
            content_css: 'css/content.css'
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>