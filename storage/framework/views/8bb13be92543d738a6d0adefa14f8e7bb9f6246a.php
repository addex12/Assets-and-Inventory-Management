<div id="assigned_user" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-6">
        <select class="js-data-ajax" data-endpoint="departments" data-placeholder="<?php echo e(trans('general.select_department')); ?>" name="<?php echo e($fieldname); ?>" style="width: 100%" id="department_select" aria-label="<?php echo e($fieldname); ?>"<?php echo e((isset($multiple) && ($multiple=='true')) ? " multiple='multiple'" : ''); ?>>
            <?php if($department_id = old($fieldname, (isset($item)) ? $item->{$fieldname} : '')): ?>
                <option value="<?php echo e($department_id); ?>" selected="selected" role="option" aria-selected="true"  role="option">
                    <?php echo e((\App\Models\Department::find($department_id)) ? \App\Models\Department::find($department_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""  role="option"><?php echo e(trans('general.select_department')); ?></option>
            <?php endif; ?>
        </select>
    </div>


    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>


</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/department-select.blade.php ENDPATH**/ ?>