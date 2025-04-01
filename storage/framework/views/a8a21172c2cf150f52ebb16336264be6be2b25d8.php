<div class="form-group <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('phone', trans('admin/suppliers/table.phone'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('phone', old('phone', $item->phone), array('class' => 'form-control', 'aria-label'=>'phone'))); ?>

        <?php echo $errors->first('phone', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/phone.blade.php ENDPATH**/ ?>