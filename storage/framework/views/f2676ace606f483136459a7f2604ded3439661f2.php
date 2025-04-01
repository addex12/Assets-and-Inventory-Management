<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.google_login')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-primary"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <?php echo e(Form::open(['method' => 'POST', 'files' => false, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ])); ?>

    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">
                        <i class="fa-brands fa-google"></i> <?php echo e(trans('admin/settings/general.google_login')); ?>

                    </h2>
                </div>
                <div class="box-body">


                    <div class="col-md-12">

                        <!-- Google Redirect URL -->
                        <div class="form-group">
                            <div class="col-md-3 text-right">
                                <strong>Redirect URL</strong>
                            </div>
                            <div class="col-md-8">
                                <p class="form-control-static" style="margin-top: -5px"><code><?php echo e(config('app.url')); ?>/google/callback</code></p>
                                <p class="help-block"><?php echo trans('admin/settings/general.google_callback_help'); ?></p>
                            </div>
                        </div>


                        <!-- Google login -->
                        <div class="form-group <?php echo e($errors->has('google') ? 'error' : ''); ?>">

                            <div class="col-md-8 col-md-offset-3">
                                <label class="form-control<?php echo e((config('app.lock_passwords')===true) ? ' form-control--disabled': ''); ?>">
                                    <span class="sr-only"><?php echo e(trans('admin/settings/general.pwd_secure_uncommon')); ?></span>
                                    <?php echo e(Form::checkbox('google_login', '1', old('google_login', $setting->google_login),array('aria-label'=>'google_login', (config('app.lock_passwords')===true) ? 'disabled': ''))); ?>

                                    <?php echo e(trans('admin/settings/general.enable_google_login')); ?>

                                </label>
                                <p class="help-block"><?php echo e(trans('admin/settings/general.enable_google_login_help')); ?></p>
                            </div>
                        </div>


                        <!-- Google Client ID -->
                        <div class="form-group <?php echo e($errors->has('google_client_id') ? 'error' : ''); ?>">
                            <div class="col-md-3 text-right">
                                <?php echo e(Form::label('google_client_id', 'Client ID')); ?>

                            </div>
                            <div class="col-md-8">
                                <?php echo e(Form::text('google_client_id', old('google_client_id', $setting->google_client_id), ['class' => 'form-control','placeholder' => trans('general.example') .'000000000000-XXXXXXXXXXX.apps.googleusercontent.com', (config('app.lock_passwords')===true) ? 'disabled': ''])); ?>

                                <?php echo $errors->first('google_client_id', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                <?php if(config('app.lock_passwords')===true): ?>
                                    <p class="text-warning"><i class="fas fa-lock" aria-hidden="true"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Google Client Secret -->
                        <div class="form-group <?php echo e($errors->has('google_client_secret') ? 'error' : ''); ?>">
                            <div class="col-md-3 text-right">
                                <?php echo e(Form::label('google_client_secret', 'Client Secret')); ?>

                            </div>
                            <div class="col-md-8">

                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::text('google_client_secret', 'XXXXXXXXXXXXXXXXXXXXXXX', ['class' => 'form-control', 'disabled'])); ?>

                                <?php else: ?>
                                    <?php echo e(Form::text('google_client_secret', old('google_client_secret', $setting->google_client_secret), ['class' => 'form-control','placeholder' => trans('general.example') .'XXXXXXXXXXXX'])); ?>

                                <?php endif; ?>

                                <?php echo $errors->first('google_client_secret', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                <?php if(config('app.lock_passwords')===true): ?>
                                    <p class="text-warning"><i class="fas fa-lock" aria-hidden="true"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>


                </div> <!--/.box-body-->
                <div class="box-footer">
                    <div class="text-left col-md-6">
                        <a class="btn btn-link text-left" href="<?php echo e(route('settings.index')); ?>"><?php echo e(trans('button.cancel')); ?></a>
                    </div>
                    <div class="text-right col-md-6">
                        <button type="submit" class="btn btn-success"<?php echo e((config('app.lock_passwords')===true) ? ' disabled': ''); ?>><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.save')); ?></button>
                    </div>

                </div>
            </div> <!-- /box -->
        </div> <!-- /.col-md-8-->
    </div> <!-- /.row-->

    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/settings/google.blade.php ENDPATH**/ ?>