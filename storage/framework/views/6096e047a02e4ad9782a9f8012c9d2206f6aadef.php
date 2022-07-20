<?php $__env->startSection('title'); ?>
    CMS Tourism - User Generate Content
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Tourism Beyond Labuan Bajo</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">User Generate Content
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
                                                    <th width="5%">No</th>
                                                    <th>Hashtags</th>
                                                    <th width="15%">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?php echo e($data->hashtag); ?></td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-icon rounded-circle btn-primary glow mr-1 mb-1" title="Edit" onClick="popModalEdit('<?php echo e($data->id); ?>','<?php echo e($data->hashtag); ?>')"><i class="bx bxs-edit-alt"></i></button></button>
                                                    </td>
                                                </tr>

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
    <!-- Modal Edit -->
    <div class="modal text-left" id="modal_edit" role="dialog" aria-labelledby="myModalLabel140" aria-modal="true" style="padding-right: 16px;">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title white" id="myModalLabel140">Edit Hashtag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edt_form">
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <label for="basicInput">Hashtag <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" id="edt_nama" name="edt_nama" placeholder="Masukan Hashtag UGC" required>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>

                    <button type="button" class="btn btn-warning ml-1" data-dismiss="modal" onClick="submitEdit()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Edit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $("#edt_form").validate({
            // Specify validation rules
            rules: {
                nama: "required",
            },
            // Specify validation error message
            messages: {
                nama: "*Masukan Hashtag UGC",
            },
            submitHandler: function(form) {
            }
        });

        var idTarget="";

        function popModalEdit(id,nama){
            idTarget = id
            user_id =
                $("#edt_nama").val(nama);
            $('#modal_edit').modal('show');
        }

        function submitEdit(){
            $(".cover-spin").fadeIn(500)
            edt_nama = $("#edt_nama").val();
            if ($("#edt_form").valid()){
                $.post( "<?php echo e(route('admin.t.ugc.edit')); ?>", {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "id": idTarget,
                    "hashtag": edt_nama,
                }).done(function( res ) {
                    if (res==1){
                        $("#toast-success-content").html('Berhasil mengedit '+ edt_nama);
                        $("#toast-success").toast('show');
                        setTimeout(function(){
                            $(".cover-spin").fadeOut(500)
                            window.location.href=window.location.href;
                        }, 1000);
                    } else {
                        $("#toast-error-content").html("Gagal mengedit "+edt_nama);
                        $("#toast-error").toast('show');
                        $(".cover-spin").fadeOut(500)
                    }
                });
            } else {
                $("#toast-error-content").html("Form tidak valid");
                $("#toast-error").toast('show');
                $(".cover-spin").fadeOut(500)
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>