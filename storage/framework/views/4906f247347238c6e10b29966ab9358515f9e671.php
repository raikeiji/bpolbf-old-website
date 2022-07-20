<?php $__env->startSection('title'); ?>
LBFTA - Kontak Form
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Kontak Form</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Kontak Form
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
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Keterangan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <p hidden><?php echo e($i = 1); ?></p>
                                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($i); ?></td>
                                                            <td><?php echo $d->name; ?></td>
                                                            <td><?php echo $d->email; ?></td>
                                                            <td><?php echo $d->subject; ?></td>
                                                            <td><?php echo e($d->message); ?></td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-icon rounded-circle btn-danger glow" title="Delete" onClick="popModalDelete('<?php echo e($d->id); ?>')"><i class="bx bxs-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                        <p hidden><?php echo e($i++); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
        if(getUrlParameter("status")=="1"){
            $("#toast-success-content").html(getUrlParameter("status_message"));
            $("#toast-success").toast('show');
        } else if (getUrlParameter("status")=="-1"){
            $("#toast-error-content").html(getUrlParameter("status_message"));
            $("#toast-error").toast('show');
        }

        function popModalDelete(id){
            var id_btn = id;
            Swal.fire({
                title: 'Delete Kontak Form?',
                text: "Data Tidak Dapat Dikembalikan",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#D3514D',
                cancelButtonColor: '#d12900',
                confirmButtonText: 'OK',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-outline-danger ml-1',
                buttonsStyling: false,
                }).then(function (result) {
                if (result.value) {
                    $(".cover-spin").fadeIn(250);
                    $.ajax({
                        type:"POST",
                        url : "<?php echo e(route('admin.lbfta.kontak_form.delete')); ?>",
                        data: { 
                            "_token": "<?php echo e(csrf_token()); ?>",
                            "id": id,
                        },
                        success:function(id){
                            $(".cover-spin").fadeOut(250);
                            if (id==1){
                                Swal.fire(
                                    {
                                        type: "success",
                                        title: 'Deleted!',
                                        text: 'Data telah dibuang.',
                                        confirmButtonClass: 'btn btn-danger',
                                    }
                                )
                                setTimeout(function(){
                                    window.location = window.location.href.split("?")[0];
                                }, 1000);
                            } else {
                                Swal.fire(
                                    {
                                        type: "error",
                                        title: 'Error Delete!',
                                        text: 'Data gagal dibuang.',
                                        confirmButtonClass: 'btn btn-danger',
                                    }
                                )
                            }
                        },
                        error: function () {
                            Swal.fire(
                                {
                                    type: "error",
                                    title: 'Error Delete!',
                                    text: 'Data gagal dibuang.',
                                    confirmButtonClass: 'btn btn-danger',
                                }
                            )
                        }
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>