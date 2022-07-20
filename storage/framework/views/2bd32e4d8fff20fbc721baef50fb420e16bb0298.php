<?php $__env->startSection('title'); ?>
Edit Profile - Admin
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
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active"> Edit Profile
                                </li>
                            </ol>
                        </div>
                        <div class="col-12">
                            <h5>Edit Profile</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
               <section id="basic-tabs-components">
                    <div class="card col-lg-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Edit Profile</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="id" aria-labelledby="id-tab" role="tabpanel">
                                        <form id="update_user" action="<?php echo e(route('admin.edit_profile.edit')); ?>" method="post">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="row">
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Nama</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Asosiasi" required value="<?php echo e($resultQuery->name); ?>">
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Email</label>
                                                        <span type="email" class="form-control" id="email" name="email"><?php echo e($resultQuery->email); ?></span>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                                                        <small style="dolor:red">*kosongan jika tidak mengubah password</small>
                                                    </fieldset>
                                                </div>
                                                <div class="col-12">
                                                    <fieldset class="form-group">
                                                        <label for="basicInput">Confirm Password</label>
                                                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Masukan Password">
                                                        <small style="dolor:red">*kosongan jika tidak mengubah password</small>
                                                    </fieldset>
                                                </div>
                                                <!-- Submit Button -->
                                                <div class="col-12">
                                                    <a href="javascript:void(0)" class="btn btn-success round glow" style="float:right" onclick="submit()">
                                                        <span class="align-middle ml-25">Submit</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
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
    <?php if($status ==  1): ?>         
        $("#toast-success-content").html('<?php echo e($status_message); ?>');
        $("#toast-success").toast('show');
    <?php elseif($status ==  -1): ?>  
        $("#toast-error-content").html('<?php echo e($status_message); ?>');
        $("#toast-error").toast('show');   
    <?php endif; ?>
</script>
<script>
    $("#update_user").validate({
        // Specify validation rules
        rules: {
            nama: "required",
            password: {
                minlength: 6
            },
            password_confirm : {
                minlength : 6,
                equalTo : "#password"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    //submit listener
    function submit(){
        if($("#update_user").valid()){
            $( "#update_user" ).submit();
        }
    };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminpage.template.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>