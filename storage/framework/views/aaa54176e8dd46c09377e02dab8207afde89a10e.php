<?php $__env->startSection('title'); ?>
    <?php if($item->id): ?>
        <?php echo e($updateText); ?>

    <?php else: ?>
        <?php echo e($createText); ?>

    <?php endif; ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
    <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('content'); ?>

<!-- row -->
<div class="row">
    <!-- col-md-8 -->
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0">

        <form id="create-form" class="form-horizontal" method="post" action="<?php echo e((isset($formAction)) ? $formAction : \Request::url()); ?>" autocomplete="off" role="form" enctype="multipart/form-data">

        <!-- box -->
        <div class="box box-default">
            <!-- box-header -->
            <div class="box-header with-border">

                <?php if((isset($topSubmit) && ($topSubmit=='true')) || (isset($item->id))): ?>

                <div class="col-md-12 box-title text-right" style="padding: 0px; margin: 0px;">
                        <div class="col-md-9 text-left">
                            <?php if($item->id): ?>
                                <h2 class="box-title" style="padding-top: 8px; padding-bottom: 7px;">
                                    <?php echo e($item->display_name); ?>

                                </h2>
                            <?php endif; ?>
                        </div>
                        <?php if(isset($topSubmit) && ($topSubmit=='true')): ?>
                        <div class="col-md-3 text-right" style="padding-right: 10px;">
                            <button type="submit" class="btn btn-primary pull-right">
                                <i class="fas fa-check icon-white" aria-hidden="true"></i>
                                <?php echo e(trans('general.save')); ?>

                            </button>
                        </div>
                        <?php endif; ?>
                </div>
            </div><!-- /.box-header -->
            <?php endif; ?>

            <!-- box-body -->
            <div class="box-body">

                <div style="padding-top: 30px;">
                    <?php if($item->id): ?>
                    <?php echo e(method_field('PUT')); ?>

                    <?php endif; ?>

                    <!-- CSRF Token -->
                    <?php echo e(csrf_field()); ?>

                    <?php echo $__env->yieldContent('inputFields'); ?>
                    <?php echo $__env->make('partials.forms.edit.submit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

            </div> <!-- ./box-body -->
        </div> <!-- box -->
        </form>
    </div> <!-- col-md-8 -->

</div><!-- ./row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/layouts/edit-form.blade.php ENDPATH**/ ?>