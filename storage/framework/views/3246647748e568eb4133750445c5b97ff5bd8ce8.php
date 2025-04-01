<!-- Serial -->
<div class="form-group <?php echo e($errors->has('serial') ? ' has-error' : ''); ?>">
    <label for="<?php echo e($fieldname); ?>" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.serial')); ?> </label>
    <div class="col-md-7 col-sm-12<?php echo e((Helper::checkIfRequired($item, 'serial')) ? ' required' : ''); ?>">
        <input class="form-control" type="text" name="<?php echo e($fieldname); ?>" id="<?php echo e($fieldname); ?>" value="<?php echo e(old((isset($old_val_name) ? $old_val_name : $fieldname), $item->serial)); ?>" />
        <?php echo $errors->first('serial', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/serial.blade.php ENDPATH**/ ?>