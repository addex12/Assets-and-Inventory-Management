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


    <form
        method="POST"
        action="<?php echo e(route('settings.branding.save')); ?>"
        accept-charset="UTF-8"
        autocomplete="off"
        class="form-horizontal"
        role="form"
        id="create-form"
        enctype="multipart/form-data"
        novalidate="novalidate"
    >
    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'branding']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'branding']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                         <?php echo e(trans('admin/settings/general.brand')); ?>

                    </h2>
                </div>
                <div class="box-body">


                    <div class="col-md-12">

                        <!-- Site name -->
                        <div class="form-group <?php echo e($errors->has('site_name') ? 'error' : ''); ?>">

                            <div class="col-md-3">
                                <label for="site_name"><?php echo e(trans('admin/settings/general.site_name')); ?></label>
                            </div>
                            <div class="col-md-7 required">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <input class="form-control" disabled="disabled" placeholder="Snipe-IT Asset Management" name="site_name" type="text" value="<?php echo e(old('site_name', $setting->site_name)); ?>" id="site_name">
                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <input class="form-control" placeholder="Snipe-IT Asset Management" required="required" name="site_name" type="text" value="<?php echo e(old('site_name', $setting->site_name)); ?>" id="site_name">
                                <?php endif; ?>
                                <?php echo $errors->first('site_name', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <?php
                            $optionTypes = trans('admin/settings/general.logo_option_types');
                        ?>

                        <!-- Branding -->
                        <div class="form-group <?php echo e($errors->has('brand') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <label for="brand"><?php echo e(trans('admin/settings/general.web_brand')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <?php echo Form::select('brand', [
                                                '1'=> trans('admin/settings/general.logo_option_types.text'),
                                                '2'=> trans('admin/settings/general.logo_option_types.logo'),
                                                '3'=> trans('admin/settings/general.logo_option_types.logo_and_text')], old('brand', $setting->brand), array('class' => 'form-control select2', 'style'=>'width: 150px ;')); ?>


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

                    <!-- Default Avatar -->
                    <?php echo $__env->make('partials/forms/edit/uploadLogo', [
                        "logoVariable" => "default_avatar",
                        "logoId" => "defaultAvatar",
                        "logoLabel" => trans('admin/settings/general.default_avatar'),
                        "logoClearVariable" => "clear_default_avatar",
                        "logoPath" => "avatars/",
                        "helpBlock" => trans('admin/settings/general.default_avatar_help').' '.trans('general.image_filetypes_help', ['size' => Helper::file_upload_max_size_readable()]),
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if(($setting->default_avatar == '') || (($setting->default_avatar == 'default.png') && (Storage::disk('public')->missing('default.png')))): ?>
                        <!-- Restore Default Avatar -->
                        <div class="form-group">

                            <div class="col-md-9 col-md-offset-3">
                                <label class="form-control">
                                    <input type="checkbox" name="restore_default_avatar" value="1" <?php if(old('restore_default_avatar', $setting->restore_default_avatar)): echo 'checked'; endif; ?> />
                                    <span><?php echo trans('admin/settings/general.restore_default_avatar', ['default_avatar'=> Storage::disk('public')->url('default.png')]); ?></span>
                                </label>
                                <p class="help-block">
                                    <?php echo e(trans('admin/settings/general.restore_default_avatar_help')); ?>

                                </p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Load gravatar -->
                        <div class="form-group <?php echo e($errors->has('load_remote') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <strong><?php echo e(trans('admin/settings/general.load_remote')); ?></strong>
                            </div>
                            <div class="col-md-9">
                                <label class="form-control">
                                    <input type="checkbox" name="load_remote" value="1" <?php if(old('load_remote', $setting->load_remote)): echo 'checked'; endif; ?> />
                                    <?php echo e(trans('general.yes')); ?>

                                    <?php echo $errors->first('load_remote', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                </label>

                                <p class="help-block">
                                    <?php echo e(trans('admin/settings/general.load_remote_help_text')); ?>

                                </p>

                            </div>
                        </div>


                        <!-- Include logo in print assets -->
                        <div class="form-group">
                            <div class="col-md-3">
                                <strong><?php echo e(trans('admin/settings/general.logo_print_assets')); ?></strong>
                            </div>
                            <div class="col-md-9">
                                <label class="form-control">
                                    <input type="checkbox" name="logo_print_assets" value="1" <?php if(old('logo_print_assets', $setting->logo_print_assets)): echo 'checked'; endif; ?> aria-label="logo_print_assets"/>
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
                                    <input type="checkbox" name="show_url_in_emails" value="1" <?php if(old('show_url_in_emails', $setting->show_url_in_emails)): echo 'checked'; endif; ?> aria-label="show_url_in_emails" />
                                    <?php echo e(trans('general.yes')); ?>

                                </label>
                                <p class="help-block"><?php echo e(trans('admin/settings/general.show_url_in_emails_help_text')); ?></p>
                            </div>
                        </div>

                        <!-- Header color -->
                        <div class="form-group <?php echo e($errors->has('header_color') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <label for="header_color"><?php echo e(trans('admin/settings/general.header_color')); ?></label>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group header-color">
                                    <input class="form-control" style="width: 100px;" placeholder="#FF0000" aria-label="header_color" name="header_color" type="text" id="header_color" value="<?php echo e(old('header_color', $setting->header_color)); ?>">
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
                                <label for="skin"><?php echo e(trans('general.skin')); ?></label>
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
                                    <input type="checkbox" name="allow_user_skin" value="1" <?php if(old('allow_user_skin', $setting->allow_user_skin)): echo 'checked'; endif; ?>/>
                                    <?php echo e(trans('general.yes')); ?>

                                </label>
                                <p class="help-block"><?php echo e(trans('admin/settings/general.allow_user_skin_help_text')); ?></p>
                            </div>
                        </div>

                        <!-- Custom css -->
                        <div class="form-group <?php echo e($errors->has('custom_css') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <label for="custom_css"><?php echo e(trans('admin/settings/general.custom_css')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php if (isset($component)) { $__componentOriginal9ff136736d107222a7c2416559088828 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ff136736d107222a7c2416559088828 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::input.textarea','data' => ['name' => 'custom_css','value' => old('custom_css', $setting->custom_css),'placeholder' => 'Add your custom CSS','ariaLabel' => 'custom_css','disabled' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'custom_css','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('custom_css', $setting->custom_css)),'placeholder' => 'Add your custom CSS','aria-label' => 'custom_css','disabled' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $attributes = $__attributesOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__attributesOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $component = $__componentOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__componentOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
                                    <?php echo $errors->first('custom_css', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginal9ff136736d107222a7c2416559088828 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ff136736d107222a7c2416559088828 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::input.textarea','data' => ['name' => 'custom_css','value' => old('custom_css', $setting->custom_css),'placeholder' => 'Add your custom CSS','ariaLabel' => 'custom_css']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'custom_css','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('custom_css', $setting->custom_css)),'placeholder' => 'Add your custom CSS','aria-label' => 'custom_css']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $attributes = $__attributesOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__attributesOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $component = $__componentOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__componentOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
                                    <?php echo $errors->first('custom_css', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                                <?php endif; ?>
                                <p class="help-block"><?php echo trans('admin/settings/general.custom_css_help'); ?></p>
                            </div>
                        </div>


                        <!-- Support Footer -->
                        <div class="form-group <?php echo e($errors->has('support_footer') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <label for="support_footer"><?php echo e(trans('admin/settings/general.support_footer')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo Form::select('support_footer', array('on'=>trans('admin/settings/general.enabled'),'off'=>trans('admin/settings/general.two_factor_disabled'),'admin'=>trans('admin/settings/general.super_admin_only')), old('support_footer', $setting->support_footer), ['class' => 'form-control select2 disabled', 'style'=>'width: 150px ;', 'disabled' => 'disabled']); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php echo Form::select('support_footer', array('on'=>trans('admin/settings/general.enabled'),'off'=>trans('admin/settings/general.two_factor_disabled'),'admin'=>trans('admin/settings/general.super_admin_only')), old('support_footer', $setting->support_footer), array('class' => 'form-control select2', 'style'=>'width: 150px ;')); ?>

                                <?php endif; ?>


                                <?php echo $errors->first('support_footer', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>


                        <!-- Version Footer -->
                        <div class="form-group <?php echo e($errors->has('version_footer') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <label for="version_footer"><?php echo e(trans('admin/settings/general.version_footer')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php echo Form::select('version_footer', array('on'=>trans('admin/settings/general.enabled'),'off'=>trans('admin/settings/general.two_factor_disabled'),'admin'=>trans('admin/settings/general.super_admin_only')), old('version_footer', $setting->version_footer), ['class' => 'form-control select2 disabled', 'style'=>'width: 150px ;', 'disabled' => 'disabled']); ?>

                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php echo Form::select('version_footer', array('on'=>trans('admin/settings/general.enabled'),'off'=>trans('admin/settings/general.two_factor_disabled'),'admin'=>trans('admin/settings/general.super_admin_only')), old('version_footer', $setting->version_footer), array('class' => 'form-control select2', 'style'=>'width: 150px ;')); ?>

                                <?php endif; ?>

                                <p class="help-block"><?php echo e(trans('admin/settings/general.version_footer_help')); ?></p>
                                <?php echo $errors->first('version_footer', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- Additional footer -->
                        <div class="form-group <?php echo e($errors->has('footer_text') ? 'error' : ''); ?>">
                            <div class="col-md-3">
                                <label for="footer_text"><?php echo e(trans('admin/settings/general.footer_text')); ?></label>
                            </div>
                            <div class="col-md-9">
                                <?php if(config('app.lock_passwords')===true): ?>
                                    <?php if (isset($component)) { $__componentOriginal9ff136736d107222a7c2416559088828 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ff136736d107222a7c2416559088828 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::input.textarea','data' => ['name' => 'footer_text','value' => old('footer_text', $setting->footer_text),'rows' => '4','placeholder' => 'Optional footer text','disabled' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'footer_text','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('footer_text', $setting->footer_text)),'rows' => '4','placeholder' => 'Optional footer text','disabled' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $attributes = $__attributesOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__attributesOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $component = $__componentOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__componentOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
                                    <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                                <?php else: ?>
                                    <?php if (isset($component)) { $__componentOriginal9ff136736d107222a7c2416559088828 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ff136736d107222a7c2416559088828 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::input.textarea','data' => ['name' => 'footer_text','value' => old('footer_text', $setting->footer_text),'rows' => '4','placeholder' => 'Optional footer text']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'footer_text','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('footer_text', $setting->footer_text)),'rows' => '4','placeholder' => 'Optional footer text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $attributes = $__attributesOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__attributesOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $component = $__componentOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__componentOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
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
                        <button type="submit" class="btn btn-primary"><?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'checkmark']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkmark']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?> <?php echo e(trans('general.save')); ?></button>
                    </div>

                </div>
            </div> <!-- /box -->
        </div> <!-- /.col-md-8-->
    </div> <!-- /.row-->

    </form>

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