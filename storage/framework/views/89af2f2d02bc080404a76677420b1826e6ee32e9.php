<?php $__env->startSection('title'); ?>
Tourism - Rencankan Perjalananmu
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Deskripsi Plan Your Trip (Rencanakan Perjalananmu)</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Rencanakan Perjalananmu
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
               <section id="basic-tabs-components">
                    <form action="<?php echo e(route('post.admin.t.plan')); ?>" method="post" enctype="multipart/form-data" id="form">
                        <?php echo e(csrf_field()); ?>

                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <h4>Panduan Perjalanan</h4>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                            
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Indonesia <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="panduan_desc" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Indonesia" required><?php echo e(($data == null) ? "" : $data->panduan_desc); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Inggris <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="panduan_desc_en" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Inggris" required><?php echo e(($data == null) ? "" : $data->panduan_desc_en); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa China <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="panduan_desc_cn" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa China"><?php echo e(($data == null) ? "" : $data->panduan_desc_cn); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Link Url<span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="panduan_desc_link" placeholder="Masukkan Url" value="<?php echo e(($data == null) ? "" : $data->panduan_link); ?>" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <h4>Informasi Visa</h4>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                            
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Indonesia <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="visa_desc" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Indonesia" required><?php echo e(($data == null) ? "" : $data->visa_desc); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Inggris <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="visa_desc_en" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Inggris" required><?php echo e(($data == null) ? "" : $data->visa_desc_en); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa China <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="visa_desc_cn" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa China"><?php echo e(($data == null) ? "" : $data->visa_desc_cn); ?></textarea>
                                            </fieldset>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <h4>Rekomendasi</h4>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                            
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Indonesia <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="recomendation_desc" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Indonesia" required><?php echo e(($data == null) ? "" : $data->recomendation_desc); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Inggris <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="recomendation_desc_en" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Inggris" required><?php echo e(($data == null) ? "" : $data->recomendation_desc_en); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa China <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="recomendation_desc_cn" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa China"><?php echo e(($data == null) ? "" : $data->recomendation_desc_cn); ?></textarea>
                                            </fieldset>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <h4>Registrasi Online</h4>
                                    </div>
                                    <div class="row" style="margin-top: 25px;padding-left: 10px;">
                                            
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Indonesia <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="registration_desc" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Indonesia" required><?php echo e(($data == null) ? "" : $data->registration_desc); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa Inggris <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="registration_desc_en" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa Inggris" required><?php echo e(($data == null) ? "" : $data->registration_desc_en); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Deskripsi Dalam Bahasa China <span class="text-red">*</span></label>
                                                <textarea type="text" class="form-control" name="registration_desc_cn" placeholder="Masukkan Deskripsi Panduan Perjalanan Dalam Bahasa China"><?php echo e(($data == null) ? "" : $data->registration_desc_cn); ?></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInput">Link Url<span class="text-red">*</span></label>
                                                <input type="text" class="form-control" name="registration_desc_link" placeholder="Masukkan Url" value="<?php echo e(($data == null) ? "" : $data->registration_link); ?>" required>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row" style="text-align: center">
                                            
                                        <div class="col-md-12">
                                            <input id="submit-btn" class="btn btn-primary" value="Simpan Data" style="cursor: pointer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    <?php if($status ==  1): ?>         
        $("#toast-success-content").html('<?php echo e($status_message); ?>');
        $("#toast-success").toast('show');
        var url = window.location.href;
        url = url.replace('post','');
        location.replace(url);
    <?php elseif($status ==  -1): ?>  
        $("#toast-error-content").html('<?php echo e($status_message); ?>');
        $("#toast-error").toast('show');   
        var url = window.location.href;
        url = url.replace('post','');
        location.replace(url);
    <?php endif; ?>
    $('#submit-btn').on('click', function (event) {
        swal({
            title: 'Mengubah Data Rencakan Perjalananmu',
            text: 'Apakah Anda Yakin Untuk Mengubah Data Pada Halaman Rencakan Perjalananmu?',
            icon: 'warning',
            buttons: ["Tidak", "Ya!"],
        }).then(function(value) {
            if (value) {
                $('#form').submit();
            }
        });
    });
</script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>