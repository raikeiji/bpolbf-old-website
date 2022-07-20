<?php $__env->startSection('title'); ?>
Industri & Investment - Komoditas Utama Factsheet and Data
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Komoditas Utama Factsheet and Data</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.inv.komoditas_utama')); ?>">Komoditas Utama Factsheet and Data</a>
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
                <form action="<?php echo e(route('admin.inv.komoditas_utama.store')); ?>" id="form_input"  method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                <section id="basic-tabs-components">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Form Komoditas Utama</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
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
                                                            <input type="text" class="form-control" id="basicInput" name="judul_id" placeholder="Masukkan Judul">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <fieldset class="form-group">
                                                            <label for="basicInput">Deskripsi</label>
                                                            <textarea data-length=200 class="form-control" maxlength="200" name="deskripsi_id" id="textarea-counter char-textarea" rows="3" placeholder="Deskripsi"></textarea>
                                                        </fieldset>
                                                        <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="tab-pane" id="us" aria-labelledby="en-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul</label>
                                                        <input type="text" class="form-control" id="basicInput" name="judul_en" placeholder="Masukkan Judul">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi</label>
                                                        <textarea data-length=200 class="form-control char-textarea" name="deskripsi_en" maxlength="200" id="textarea-counter" rows="3" placeholder="Deskripsi"></textarea>
                                                    </fieldset>
                                                    <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="cn" aria-labelledby="cn-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Judul</label>
                                                        <input type="text" class="form-control" id="basicInput" name="judul_cn" placeholder="Masukkan Judul">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Deskripsi</label>
                                                        <textarea data-length=200 class="form-control char-textarea" name="deskripsi_cn" maxlength="200" id="textarea-counter" rows="3" placeholder="Deskripsi"></textarea>
                                                    </fieldset>
                                                    <small class="counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                        <fieldset class="form-group">
                                                    <label for="basicInputFile">Image <span class="text-red">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="img" id="main_image" accept="image/jpg, image/jpeg, image/png" required id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                                    </div>
                                                </fieldset>
                                               
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-md-12">
                                                <button type="submit" id="upload-result" class="btn btn-primary float-right" style="margin-top: 25px;">Simpan</button>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>