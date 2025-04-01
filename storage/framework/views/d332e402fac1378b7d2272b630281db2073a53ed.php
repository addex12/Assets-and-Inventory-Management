<!-- Model Number -->
<div class="form-group <?php echo e($errors->has('model_number') ? ' has-error' : ''); ?>">
    <label for="model_number" class="col-md-3 control-label"><?php echo e(trans('general.model_no')); ?></label>
    <div class="col-md-7">
    <input class="form-control" type="text" name="model_number" aria-label="model_number" id="model_number" value="<?php echo e(old('model_number', $item->model_number)); ?>" />
        <?php echo $errors->first('model_number', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/model_number.blade.php ENDPATH**/ ?>