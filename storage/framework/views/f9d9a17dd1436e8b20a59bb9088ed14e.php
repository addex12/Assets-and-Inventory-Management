<!-- Image stuff - kept in /resources/views/partials/forms/edit/image-upload.blade.php -->
<!-- Image Delete -->
<?php if(isset($item) && ($item->{($fieldname ?? 'image')})): ?>
    <div class="form-group<?php echo e($errors->has('image_delete') ? ' has-error' : ''); ?>">
        <div class="col-md-9 col-md-offset-3">
            <label class="form-control">
                <input type="checkbox" name="image_delete" value="1" <?php if(old('image_delete')): echo 'checked'; endif; ?> aria-label="image_delete">
                <?php echo e(trans('general.image_delete')); ?>

                <?php echo $errors->first('image_delete', '<span class="alert-msg">:message</span>'); ?>

            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <img src="<?php echo e(Storage::disk('public')->url($image_path.e($item->{($fieldname ?? 'image')}))); ?>" class="img-responsive">
            <?php echo $errors->first('image_delete', '<span class="alert-msg">:message</span>'); ?>

        </div>
    </div>
<?php endif; ?>

<!-- Image Upload and preview -->

<div class="form-group <?php echo e($errors->has((isset($fieldname) ? $fieldname : 'image')) ? 'has-error' : ''); ?>">
    <label class="col-md-3 control-label" for="<?php echo e((isset($fieldname) ? $fieldname : 'image')); ?>"><?php echo e(trans('general.image_upload')); ?></label>
    <div class="col-md-9">

        <input type="file" id="<?php echo e((isset($fieldname) ? $fieldname : 'image')); ?>" name="<?php echo e((isset($fieldname) ? $fieldname : 'image')); ?>" aria-label="<?php echo e((isset($fieldname) ? $fieldname : 'image')); ?>" class="sr-only">

        <label class="btn btn-default" aria-hidden="true">
            <?php echo e(trans('button.select_file')); ?>

            <input type="file" name="<?php echo e((isset($fieldname) ? $fieldname : 'image')); ?>" class="js-uploadFile" id="uploadFile" data-maxsize="<?php echo e(Helper::file_upload_max_size()); ?>" accept="image/gif,image/jpeg,image/webp,image/png,image/svg,image/svg+xml,image/avif" style="display:none; max-width: 90%" aria-label="<?php echo e((isset($fieldname) ? $fieldname : 'image')); ?>" aria-hidden="true">
        </label>
        <span class='label label-default' id="uploadFile-info"></span>

        <p class="help-block" id="uploadFile-status"><?php echo e(trans('general.image_filetypes_help', ['size' => Helper::file_upload_max_size_readable()])); ?> <?php echo e($help_text ?? ''); ?></p>



        <?php echo $errors->first('image', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

    </div>
    <div class="col-md-4 col-md-offset-3" aria-hidden="true">
        <img id="uploadFile-imagePreview" style="max-width: 300px; display: none;" alt="<?php echo e(trans('general.alt_uploaded_image_thumbnail')); ?>">
    </div>
</div>

<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/image-upload.blade.php ENDPATH**/ ?>