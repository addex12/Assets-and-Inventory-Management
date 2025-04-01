<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.purge_deleted')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-solid box-danger">
                <div class="box-header with-border">
                    <h2 class="box-title"><i class="fas fa-exclamation-triangle"></i> <?php echo e(trans('admin/settings/general.purge')); ?></h2>
                </div>
            <?php echo e(Form::open(['method' => 'POST', 'files' => false, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ])); ?>

            <!-- CSRF Token -->
                <?php echo e(csrf_field()); ?>

                <div class="box-body">
                    <p><?php echo e(trans('admin/settings/general.confirm_purge_help')); ?></p>
                    <div class="col-md-3<?php echo e($errors->has('confirm_purge') ? 'error' : ''); ?>">
                        <?php echo e(Form::label('confirm_purge', trans('admin/settings/general.confirm_purge'))); ?>

                    </div>
                    <div class="col-md-9<?php echo e($errors->has('confirm_purge') ? 'error' : ''); ?>">
                        <?php if(config('app.lock_passwords')===true): ?>
                            <?php echo e(Form::text('confirm_purge', Request::old('confirm_purge'), array('class' => 'form-control', 'disabled'=>'true'))); ?>

                        <?php else: ?>
                            <?php echo e(Form::text('confirm_purge', Request::old('confirm_purge'), array('class' => 'form-control'))); ?>

                        <?php endif; ?>

                        <?php if(config('app.lock_passwords')===true): ?>
                            <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button type="submit" class="btn btn-danger" <?php echo e((config('app.lock_passwords')===true) ? ' disabled' : ''); ?>><?php echo e(trans('admin/settings/general.purge')); ?></button>
                </div> <!--/box-footer-->
                <?php echo e(Form::close()); ?>

            </div> <!--/.box-solid-->
        </div><!-- /.col-md-8-->
    </div><!--/.row-->

    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/settings/purge-form.blade.php ENDPATH**/ ?>