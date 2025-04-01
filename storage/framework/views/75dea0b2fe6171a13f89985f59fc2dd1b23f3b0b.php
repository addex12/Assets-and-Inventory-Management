<div class="form-group <?php echo e($errors->has('fax') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('fax', trans('admin/suppliers/table.fax'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::text('fax', old('fax', $item->fax), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('fax', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/fax.blade.php ENDPATH**/ ?>