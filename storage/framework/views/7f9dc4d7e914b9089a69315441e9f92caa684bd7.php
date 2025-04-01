<?php $__env->startSection('content'); ?>


    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/password/reset')); ?>">
        <?php echo csrf_field(); ?>


        <div class="container">
            <div class="row">



                <div class="col-md-6 col-md-offset-3">

                    <div class="box login-box" style="width: 100%">
                        <div class="box-header with-border">
                            <h2 class="box-title"> <?php echo e(trans('auth/general.reset_password')); ?></h2>
                        </div>


                        <div class="login-box-body">
                            <div class="row">

                                <!-- Notifications -->
                                <?php echo $__env->make('notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                                    <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                        <label class="col-md-4 control-label"><i class="fas fa-user" aria-hidden="true"></i> <?php echo e(trans('admin/users/table.username')); ?></label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="username" value="<?php echo e(old('username', $username)); ?>">
                                            <?php echo $errors->first('username', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>


                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label" for="password"><i class="fa fa-key" aria-hidden="true"></i> <?php echo e(trans('admin/users/table.password')); ?></label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" aria-label="password">
                                <?php echo $errors->first('password', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label" for="password_confirmation"><i class="fa fa-key" aria-hidden="true"></i> <?php echo e(trans('admin/users/table.password_confirm')); ?></label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" aria-label="password_confirmation">
                                <?php echo $errors->first('password_confirmation', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>


                            </div>
                        </div>


                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                <?php echo e(trans('auth/general.reset_password')); ?>

                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</form>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts/basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>