<?php $__env->startSection('inputFields'); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/manufacturers/table.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- URL -->
    <div class="form-group <?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
        <label for="url" class="col-md-3 control-label"><?php echo e(trans('general.url')); ?>

        </label>
        <div class="col-md-6">
            <input class="form-control" type="text" name="url" id="url" value="<?php echo e(old('url', $item->url)); ?>" />
            <?php echo $errors->first('url', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>

    <!-- Support URL -->
    <div class="form-group <?php echo e($errors->has('support_url') ? ' has-error' : ''); ?>">
        <label for="support_url" class="col-md-3 control-label"><?php echo e(trans('admin/manufacturers/table.support_url')); ?>

        </label>
        <div class="col-md-6">
            <input class="form-control" type="text" name="support_url" id="support_url" value="<?php echo e(old('support_url', $item->support_url)); ?>" />
            <?php echo $errors->first('support_url', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>

    <!-- Warranty Lookup URL -->
    <div class="form-group <?php echo e($errors->has('warranty_lookup_url') ? ' has-error' : ''); ?>">
        <label for="support_url" class="col-md-3 control-label"><?php echo e(trans('admin/manufacturers/table.warranty_lookup_url')); ?>

        </label>
        <div class="col-md-6">
            <input class="form-control" type="text" name="warranty_lookup_url" id="warranty_lookup_url" value="<?php echo e(old('warranty_lookup_url', $item->warranty_lookup_url)); ?>" />
            <p class="help-block"><?php echo trans('admin/manufacturers/message.support_url_help'); ?></p>
            <?php echo $errors->first('warranty_lookup_url', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>

    <!-- Support Phone -->
    <div class="form-group <?php echo e($errors->has('support_phone') ? ' has-error' : ''); ?>">
        <label for="support_phone" class="col-md-3 control-label"><?php echo e(trans('admin/manufacturers/table.support_phone')); ?>

        </label>
        <div class="col-md-6">
            <input class="form-control" type="text" name="support_phone" id="support_phone" value="<?php echo e(old('support_phone', $item->support_phone)); ?>" />
            <?php echo $errors->first('support_phone', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>

    <!-- Support Email -->
    <div class="form-group <?php echo e($errors->has('support_email') ? ' has-error' : ''); ?>">
        <label for="support_email" class="col-md-3 control-label"><?php echo e(trans('admin/manufacturers/table.support_email')); ?>

        </label>
        <div class="col-md-6">
            <input class="form-control" type="email" name="support_email" id="support_email" value="<?php echo e(old('support_email', $item->support_email)); ?>" />
            <?php echo $errors->first('support_email', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>

<?php echo $__env->make('partials.forms.edit.image-upload', ['image_path' => app('manufacturers_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/manufacturers/table.create') ,
    'updateText' => trans('admin/manufacturers/table.update'),
    'helpTitle' => trans('admin/manufacturers/table.about_manufacturers_title'),
    'helpText' => trans('admin/manufacturers/table.about_manufacturers_text'),
    'formAction' => (isset($item->id)) ? route('manufacturers.update', ['manufacturer' => $item->id]) : route('manufacturers.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/manufacturers/edit.blade.php ENDPATH**/ ?>