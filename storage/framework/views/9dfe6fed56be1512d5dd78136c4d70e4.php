<div class="form-group <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
    <label for="phone" class="col-md-3 control-label"><?php echo e(trans('admin/suppliers/table.phone')); ?></label>
    <div class="col-md-7">
        <input class="form-control" aria-label="phone" maxlength="191" name="phone" type="text" id="phone" value="<?php echo e(old('phone', $item->phone)); ?>">
        <?php echo $errors->first('phone', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/phone.blade.php ENDPATH**/ ?>