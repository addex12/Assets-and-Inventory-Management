<div class="form-group <?php echo e($errors->has('fax') ? ' has-error' : ''); ?>">
    <label for="fax" class="col-md-3 control-label"><?php echo e(trans('admin/suppliers/table.fax')); ?></label>
    <div class="col-md-7">
        <input class="form-control" type="text" name="fax" aria-label="fax" id="fax" value="<?php echo e(old('fax', $item->fax)); ?>"  maxlength="34"  />
        <?php echo $errors->first('fax', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/fax.blade.php ENDPATH**/ ?>