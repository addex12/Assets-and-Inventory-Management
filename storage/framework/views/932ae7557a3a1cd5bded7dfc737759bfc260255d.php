<?php $__env->startSection('content'); ?>


    <?php if($snipeSettings->custom_forgot_pass_url): ?>
        <!--  The admin settings specify an LDAP password reset URL to let's send them there -->
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
            <div class="box box-header text-center">
                <h3 class="box-title">
                    <a href="<?php echo e($snipeSettings->custom_forgot_pass_url); ?>" rel="noopener">
                        <?php echo e(trans('auth/general.ldap_reset_password')); ?>

                    </a>
                </h3>
            </div>
        </div>

    <?php else: ?>


    <form class="form" role="form" method="POST" action="<?php echo e(url('/password/email')); ?>">
        <?php echo csrf_field(); ?>

    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-4">

                <div class="box login-box" style="width: 100%">
                        <div class="box-header with-border">
                            <h2 class="box-title"> <?php echo e(trans('auth/general.send_password_link')); ?></h2>
                        </div>


                        <div class="login-box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle" aria-hidden="true"></i>
                                        <?php echo trans('auth/general.username_help_top'); ?>

                                    </div>
                                </div>


                            </div>
                            <div class="row">


                                <!-- Notifications -->
                                <?php echo $__env->make('notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                                    <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">

                                        <div class="col-md-12">
                                            <label for="username"><i class="fas fa-user" aria-hidden="true"></i> <?php echo e(trans('admin/users/table.username')); ?> </label>
                                            <input type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(trans('admin/users/table.username')); ?>" aria-label="username">
                                            <?php echo $errors->first('username', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <!-- show help text toggle -->
                                    <a href="#" id="show">
                                        <i class="fa fa-caret-right"></i>
                                        <?php echo e(trans('general.show_help')); ?>

                                    </a>

                                    <!-- hide help text toggle -->
                                    <a href="#" id="hide" style="display:none">
                                        <i class="fa fa-caret-up"></i>
                                        <?php echo e(trans('general.hide_help')); ?>

                                    </a>

                                    <!-- help text  -->
                                    <p class="help-block" id="help-text" style="display:none">
                                        <?php echo trans('auth/general.username_help_bottom'); ?>

                                    </p>

                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">
                                <?php echo e(trans('auth/general.email_reset_password')); ?>

                            </button>
                        </div>

                    </div>
            </div>
        </div>
    </div>

    </form>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script nonce="<?php echo e(csrf_token()); ?>">
        $(document).ready(function () {
            $("#show").click(function(){
                $("#help-text").fadeIn(500);
                $("#show").hide();
                $("#hide").show();
            });

            $("#hide").click(function(){
                $("#help-text").fadeOut(300);
                $("#show").show();
                $("#hide").hide();
            });
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts/basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>