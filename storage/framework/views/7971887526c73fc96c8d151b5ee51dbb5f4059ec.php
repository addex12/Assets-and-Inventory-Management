<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.branding_title')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-primary"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <style>
        .checkbox label {
            padding-right: 40px;
        }
    </style>


    <?php echo e(Form::open(['method' => 'POST', 'files' => true, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'create-form' ])); ?>

    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">
                        <i class="fas fa-copyright"></i> <?php echo e(trans('admin/settings/general.brand')); ?>

                    </h2>
                </div>
                <div class="box-body">


                    <div class="col-md-12">

                        <!-- Site name -->
                        <div class="form-group <?php echo e($errors->has('site_name') ? 'error' : ''); ?>">

                            <div class="col-md-3">
                                <?php echo e(Form::label('site_name', trans('admin/settings/general.site_name'))); ?>

                            </div>
                            <div class="col-md-7 required">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::text('site_name', Request::old('site_name', $setting->site_name), array('class' => 'form-control', 'disabled'=>'disabled','placeholder' => 'Snipe-IT Asset Management'))); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php echo e(Form::text('site_name',
                                        Request::old('site_name', $setting->site_name), array('class' => 'form-control','placeholder' => 'Snipe-IT Asset Management', 'data-validation' => 'required'))); ?>

                                <?php endif; ?>
                                <?php echo $errors->first('site_name', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>



                        <!-- Branding -->
                        <div class="form-group <?php echo e($errors->has('brand') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                 <?php echo e(Form::label('brand', trans('admin/settings/general.web_brand'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php echo Form::select('brand', array('1'=>'Text','2'=>'Logo','3'=>'Logo + Text'), old('brand', $setting->brand), array('class' => 'form-control select2', 'style'=>'width: 150px ;')); ?>

                                <?php echo $errors->first('brand', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- Logo -->
                    <?php echo $__env->make('partials/forms/edit/uploadLogo', [
                        "logoVariable" => "logo",
                        "logoId" => "uploadLogo",
                        "logoLabel" => trans('admin/settings/general.logo'),
                        "logoClearVariable" => "clear_logo",
                        "helpBlock" => trans('general.logo_size') . trans('general.image_filetypes_help', ['size' => Helper::file_upload_max_size_readable()]),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Email Logo -->
                    <?php echo $__env->make('partials/forms/edit/uploadLogo', [
                        "logoVariable" => "email_logo",
                        "logoId" => "uploadEmailLogo",
                        "logoLabel" => trans('admin/settings/general.email_logo'),
                        "logoClearVariable" => "clear_email_logo",
                        "helpBlock" => trans('admin/settings/general.email_logo_size') . trans('general.image_filetypes_help', ['size' => Helper::file_upload_max_size_readable()]),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Label Logo -->
                    <?php echo $__env->make('partials/forms/edit/uploadLogo', [
                        "logoVariable" => "label_logo",
                        "logoId" => "uploadLabelLogo",
                        "logoLabel" => trans('admin/settings/general.label_logo'),
                        "logoClearVariable" => "clear_label_logo",
                        "helpBlock" => trans('admin/settings/general.label_logo_size') . trans('general.image_filetypes_help', ['size' => Helper::file_upload_max_size_readable()]),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Favicon -->
                    <?php echo $__env->make('partials/forms/edit/uploadLogo', [
                        "logoVariable" => "favicon",
                        "logoId" => "uploadFavicon",
                        "logoLabel" => trans('admin/settings/general.favicon'),
                        "logoClearVariable" => "clear_favicon",
                        "helpBlock" => trans('admin/settings/general.favicon_size') .' '. trans('admin/settings/general.favicon_format'),
                        "allowedTypes" => "image/x-icon,image/gif,image/jpeg,image/png,image/svg,image/svg+xml,image/vnd.microsoft.icon",
                        "maxSize" => 20000
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Include logo in print assets -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <strong><?php echo e(trans('admin/settings/general.logo_print_assets')); ?></strong>
                            </div>
                            <div class="col-md-9">
                                <label class="form-control">
                                <?php echo e(Form::checkbox('logo_print_assets', '1', old('logo_print_assets', $setting->logo_print_assets),array('aria-label'=>'logo_print_assets'))); ?>

                                <?php echo e(trans('admin/settings/general.logo_print_assets_help')); ?>

                                </label>

                            </div>
                        </div>


                        <!-- show urls in emails-->
                        <div class="form-group">
                            <div class="col-md-3">
                                <strong><?php echo e(trans('admin/settings/general.show_url_in_emails')); ?></strong>
                            </div>
                            <div class="col-md-9">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('show_url_in_emails', '1', old('show_url_in_emails', $setting->show_url_in_emails),array('aria-label'=>'show_url_in_emails'))); ?>

                                    <?php echo e(trans('general.yes')); ?>

                                </label>
                                <p class="help-block"><?php echo e(trans('admin/settings/general.show_url_in_emails_help_text')); ?></p>
                            </div>
                        </div>

                        <!-- Header color -->
                        <div class="form-group <?php echo e($errors->has('header_color') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('header_color', trans('admin/settings/general.header_color'))); ?>

                            </div>
                            <div class="col-md-2">
                                <div class="input-group header-color">
                                    <?php echo e(Form::text('header_color', old('header_color', $setting->header_color), array('class' => 'form-control', 'style' => 'width: 100px;','placeholder' => '#FF0000', 'aria-label'=>'header_color'))); ?>

                                    <div class="input-group-addon">
                                        <i></i>
                                    </div>
                                </div><!-- /.input group -->
                                <?php echo $errors->first('header_color', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- Skin -->
                        <div class="form-group <?php echo e($errors->has('skin') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('skin', trans('general.skin'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php echo Form::skin('skin', old('skin', $setting->skin), 'select2'); ?>

                                <?php echo $errors->first('skin', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- Allow User Skin -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <strong><?php echo e(trans('admin/settings/general.allow_user_skin')); ?></strong>
                            </div>
                            <div class="col-md-9">
                                <label class="form-control">
                                    <?php echo e(Form::checkbox('allow_user_skin', '1', old('allow_user_skin', $setting->allow_user_skin))); ?>

                                    <?php echo e(trans('general.yes')); ?>

                                </label>
                                <p class="help-block"><?php echo e(trans('admin/settings/general.allow_user_skin_help_text')); ?></p>
                            </div>
                        </div>

                        <!-- Custom css -->
                        <div class="form-group <?php echo e($errors->has('custom_css') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('custom_css', trans('admin/settings/general.custom_css'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::textarea('custom_css', old('custom_css', $setting->custom_css), array('class' => 'form-control','placeholder' => 'Add your custom CSS','disabled'=>'disabled', 'aria-label'=>'custom_css'))); ?>

                                    <?php echo $errors->first('custom_css', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php echo e(Form::textarea('custom_css', old('custom_css', $setting->custom_css), array('class' => 'form-control','placeholder' => 'Add your custom CSS', 'aria-label'=>'custom_css'))); ?>

                                    <?php echo $errors->first('custom_css', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                <?php endif; ?>
                                <p class="help-block"><?php echo trans('admin/settings/general.custom_css_help'); ?></p>
                            </div>
                        </div>


                        <!-- Support Footer -->
                        <div class="form-group <?php echo e($errors->has('support_footer') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('support_footer', trans('admin/settings/general.support_footer'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo Form::select('support_footer', array('on'=>'Enabled','off'=>'Disabled','admin'=>'Superadmin Only'), Request::old('support_footer', $setting->support_footer), ['class' => 'form-control select2 disabled', 'style'=>'width: 150px ;', 'disabled' => 'disabled']); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php echo Form::select('support_footer', array('on'=>'Enabled','off'=>'Disabled','admin'=>'Superadmin Only'), Request::old('support_footer', $setting->support_footer), array('class' => 'form-control select2', 'style'=>'width: 150px ;')); ?>

                                <?php endif; ?>


                                <?php echo $errors->first('support_footer', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>


                        <!-- Version Footer -->
                        <div class="form-group <?php echo e($errors->has('version_footer') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('version_footer', trans('admin/settings/general.version_footer'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo Form::select('version_footer', array('on'=>'Enabled','off'=>'Disabled','admin'=>'Superadmin Only'), Request::old('version_footer', $setting->version_footer), ['class' => 'form-control select2 disabled', 'style'=>'width: 150px ;', 'disabled' => 'disabled']); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php echo Form::select('version_footer', array('on'=>'Enabled','off'=>'Disabled','admin'=>'Superadmin Only'), Request::old('version_footer', $setting->version_footer), array('class' => 'form-control select2', 'style'=>'width: 150px ;')); ?>

                                <?php endif; ?>

                                <p class="help-block"><?php echo e(trans('admin/settings/general.version_footer_help')); ?></p>
                                <?php echo $errors->first('version_footer', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- Additional footer -->
                        <div class="form-group <?php echo e($errors->has('footer_text') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <?php echo e(Form::label('footer_text', trans('admin/settings/general.footer_text'))); ?>

                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo e(Form::textarea('footer_text', Request::old('footer_text', $setting->footer_text), array('class' => 'form-control', 'rows' => '4', 'placeholder' => 'Optional footer text','disabled'=>'disabled'))); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php echo e(Form::textarea('footer_text', Request::old('footer_text', $setting->footer_text), array('class' => 'form-control','rows' => '4','placeholder' => 'Optional footer text'))); ?>

                                <?php endif; ?>
                                <p class="help-block"><?php echo trans('admin/settings/general.footer_text_help'); ?></p>
                                <?php echo $errors->first('footer_text', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>


                            </div>
                        </div>




                    </div>

                </div> <!--/.box-body-->
                <div class="box-footer">
                    <div class="text-left col-md-6">
                        <a class="btn btn-link text-left" href="<?php echo e(route('settings.index')); ?>"><?php echo e(trans('button.cancel')); ?></a>
                    </div>
                    <div class="text-right col-md-6">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.save')); ?></button>
                    </div>

                </div>
            </div> <!-- /box -->
        </div> <!-- /.col-md-8-->
    </div> <!-- /.row-->

    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <!-- bootstrap color picker -->
    <script nonce="<?php echo e(csrf_token()); ?>">
        //color picker with addon
        $(".header-color").colorpicker();
        // toggle the disabled state of asset id prefix
        $('#auto_increment_assets').on('ifChecked', function(){
            $('#auto_increment_prefix').prop('disabled', false).focus();
        }).on('ifUnchecked', function(){
            $('#auto_increment_prefix').prop('disabled', true);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/settings/branding.blade.php ENDPATH**/ ?>