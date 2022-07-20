<?php $__env->startSection('title'); ?>
Industri & Investment - Kontak Request
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Industri & Investment Kontak Request</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Kontak Request
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
                                            <table id="table_req" class="table table-bordered table-hover zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Perihal</th>
                                                        <th>Pesan</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $resultQuery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($r->name); ?></td>
                                                        <td><?php echo e($r->email); ?></td>
                                                        <td><?php echo e($r->subject); ?></td>
                                                        <td><?php echo e($r->message); ?></td>
                                                        <td><?php echo e($r->created_at); ?></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-icon rounded-circle btn-danger glow mr-1 mb-1" title="Delete" onClick="popModalDelete('<?php echo e($r->id); ?>','<?php echo e($r->name); ?>')"><i class="bx bxs-trash"></i></button>
                                                        </td>
                                                    </tr>
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
<!-- Modal Delete -->
<div class="modal text-left" id="modal_delete"  role="dialog" aria-labelledby="myModalLabel120" aria-modal="true" style="padding-right: 16px;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger">
            <h5 class="modal-title white" id="myModalLabel120">Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="bx bx-x"></i>
            </button>
        </div>
        <div class="modal-body">
            <p>Apakah anda yakin menghapus <span id="del_nama"></span> ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
            </button>
            <button type="button" class="btn btn-danger ml-1" data-dismiss="modal"  onClick="submitDelete()">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Delete</span>
            </button>
        </div>
        </div>
    </div>
</div>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    <?php if($status ==  1): ?>         
        $("#toast-success-content").html('<?php echo e($status_message); ?>');
        $("#toast-success").toast('show');
    <?php elseif($status ==  -1): ?>  
        $("#toast-error-content").html('<?php echo e($status_message); ?>');
        $("#toast-error").toast('show');   
    <?php endif; ?>
</script>

<script>
$('#table_req').DataTable( {
    "order": [[ 4, "desc" ]]
} );


function popModalDelete(id,nama){
    idTarget = id;
    $("#del_nama").html(nama);
    $('#modal_delete').modal('show');
}

function submitDelete(){
    $(".cover-spin").fadeIn(500)
    del_nama = $("#del_nama").html()
    $.post( "<?php echo e(route('admin.inv.kontak_request.delete')); ?>", { "_token": "<?php echo e(csrf_token()); ?>", "id": idTarget })
    .done(function( res ) {
        if (res==1){
            $("#toast-success-content").html('Berhasil menghapus '+del_nama);
            $("#toast-success").toast('show');
            setTimeout(function(){ 
                $(".cover-spin").fadeOut(500)
                window.location.href="<?php echo e(route('admin.inv.kontak_request')); ?>";
            }, 1000);
        } else {
            Swal.fire(
                'Gagal menghapus data',
                '</br>',
                'error'
            )
            $(".cover-spin").fadeOut(500)
        }
    }).fail(function (jqXHR, textStatus) {
            $("#toast-error-content").html("Server Error");
            $("#toast-error").toast('show');
            $(".cover-spin").fadeOut(500)
        });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>