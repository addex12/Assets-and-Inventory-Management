<!-- <?php echo e($logoVariable); ?>logo image upload -->

<div class="form-group">
    <div class="col-md-3">
        <label <?php echo $errors->has($logoVariable) ? 'class="alert-msg"' : ''; ?> for="<?php echo e($logoVariable); ?>">
        <?php echo e(ucwords(str_replace('_', ' ', $logoVariable))); ?>

        </label>
    </div>
    <div class="col-md-9">
        <label class="btn btn-default<?php echo e((config('app.lock_passwords')) ? ' disabled' : ''); ?>">
            <?php echo e(trans('button.select_file')); ?>

            <input type="file" name="<?php echo e($logoVariable); ?>" class="js-uploadFile" id="<?php echo e($logoId); ?>" accept="<?php echo e((isset($allowedTypes) ? $allowedTypes : "image/gif,image/jpeg,image/webp,image/png,image/svg,image/svg+xml")); ?>" data-maxsize="<?php echo e($maxSize ?? Helper::file_upload_max_size()); ?>"
                   style="display:none; max-width: 90%"<?php echo e((config('app.lock_passwords')) ? ' disabled' : ''); ?>>
        </label>

        <span class='label label-default' id="<?php echo e($logoId); ?>-info"></span>

        <?php echo $errors->first($logoVariable, '<span class="alert-msg">:message</span>'); ?>



        <p class="help-block" style="!important" id="<?php echo e($logoId); ?>-status">
            <?php echo e($helpBlock); ?>

        </p>

        <?php if(config('app.lock_passwords')===true): ?>
            <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
        <?php endif; ?>
    </div>

    <div class="col-md-9 col-md-offset-3">

            <?php if(($setting->$logoVariable!='') && (Storage::disk('public')->exists(e($snipeSettings->$logoVariable)))): ?>
            <div class="pull-left" style="padding-right: 20px;">
                <a href="<?php echo e(Storage::disk('public')->url(e($snipeSettings->$logoVariable))); ?>"<?php echo ($logoVariable!='favicon') ? ' data-toggle="lightbox"' : ''; ?>>
                    <img id="<?php echo e($logoId); ?>-imagePreview" style="height: 80px; padding-bottom: 5px;" alt="" src="<?php echo e(Storage::disk('public')->url(e($snipeSettings->$logoVariable))); ?>">
                </a>
            </div>
            <?php endif; ?>

            <div id="<?php echo e($logoId); ?>-previewContainer" style="display: none;">
                <img id="<?php echo e($logoId); ?>-imagePreview" style="height: 80px;">
            </div>



    </div>
    <?php if(($setting->$logoVariable!='') && (Storage::disk('public')->exists(e($snipeSettings->$logoVariable)))): ?>

    <div class="col-md-9 col-md-offset-3">
        <label id="<?php echo e($logoId); ?>-deleteCheckbox" for="<?php echo e($logoClearVariable); ?>" style="font-weight: normal" class="form-control">
            <?php echo e(Form::checkbox($logoClearVariable, '1', Request::old($logoClearVariable))); ?>

            Remove current <?php echo e(ucwords(str_replace('_', ' ', $logoVariable))); ?> image
        </label>
    </div>
    <?php endif; ?>



</div>







<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/uploadLogo.blade.php ENDPATH**/ ?>