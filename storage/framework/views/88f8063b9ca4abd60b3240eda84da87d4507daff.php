<!-- Depreciation -->
<div class="form-group <?php echo e($errors->has('depreciation_id') ? ' has-error' : ''); ?>">
    <label for="depreciation_id" class="col-md-3 control-label"><?php echo e(trans('general.depreciation')); ?></label>
    <div class="col-md-7">
        <?php echo e(Form::select('depreciation_id', $depreciation_list , old('depreciation_id', $item->depreciation_id), array('class'=>'select2', 'style'=>'width:350px', 'aria-label'=>'depreciation_id'))); ?>

        <?php echo $errors->first('depreciation_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/depreciation.blade.php ENDPATH**/ ?>