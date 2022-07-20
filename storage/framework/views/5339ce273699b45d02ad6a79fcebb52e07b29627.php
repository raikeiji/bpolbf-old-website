<?php $__env->startSection('title', 'BOPLBF - Report'); ?>

<?php $__env->startSection('csscustom'); ?>
    <style>
        .pagination li.active span {
			color: #fff;
        }
        .blog-md .dlab-post-info_container{
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: space-between;
            background: white;
            padding: 10px;
        }
        .blog-md .dlab-post-info{
            padding: 0;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
      <!-- Add your site or application content here -->
    <main id="bop">
        <section id="home-destination" class="home-extra article"></section>

        <section class="content" id="articles">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="mb-4">Reports</h2>
                </div>

                <section>
                    <ul class="list-unstyled news-list report list">
                        <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row news-item d-flex">
                                        <div class="col-12">
                                            <a href="<?php echo e(url('boplbf/report/'.$report->slug.'')); ?>">
                                                <h6 class="no-line mb-1"><?php echo e($report->judul); ?></h6>
                                                <div class="timestamp mb-0">
                                                    <svg class="bi" width="16" height="16" fill="currentColor">
                                                        <use xlink:href="<?php echo e(asset('assets/icons/bootstrap-icons.svg#calendar')); ?>"/>
                                                    </svg>
                                                    <small>
                                                        <?php echo e($report->date); ?>

                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </section>
            </div>
        </section>
        <div class="pagination-bx clearfix text-center col-md-12">
            <?php echo e($reports->links()); ?>

        </div>
        <?php echo $__env->make('profile.include.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscustom'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('profile.layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>