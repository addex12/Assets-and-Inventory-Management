<span>

    <div class="form-group<?php echo e($errors->has('custom_fieldset') ? ' has-error' : ''); ?>">
        <label for="custom_fieldset" class="col-md-3 control-label">
            <?php echo e(trans('admin/models/general.fieldset')); ?>

        </label>
        <div class="col-md-5">
            <?php echo e(Form::select('fieldset_id', Helper::customFieldsetList(), old('fieldset_id', $fieldset_id), array('class'=>'select2 js-fieldset-field livewire-select2', 'style'=>'width:100%; min-width:350px', 'aria-label'=>'custom_fieldset', 'data-livewire-component' => $_instance->id))); ?>

            <?php echo $errors->first('custom_fieldset', '<span class="alert-msg" aria-hidden="true"><br><i class="fas fa-times"></i> :message</span>'); ?>

        </div>
        <div class="col-md-3">
                <label class="form-control">
                <?php echo e(Form::checkbox('add_default_values', 1, old('add_default_values', $add_default_values), ['data-livewire-component' => $_instance->id, 'id' => 'add_default_values', 'wire:model' => 'add_default_values'])); ?>

                <?php echo e(trans('admin/models/general.add_default_values')); ?>

            </label>
        </div>
    </div>

    <?php if($this->add_default_values ): ?> 
            <?php if($fields): ?>

                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">

                        <label class="col-md-3 control-label<?php echo e($errors->has($field->name) ? ' has-error' : ''); ?>"><?php echo e($field->name); ?></label>

                        <div class="col-md-7">

                                <?php if($field->format == "DATE"): ?>

                                    <div class="input-group col-md-4" style="padding-left: 0px;">
                                        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                                            <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="default_values[<?php echo e($field->id); ?>]" id="default-value<?php echo e($field->id); ?>" value="<?php echo e($field->defaultValue($model_id)); ?>">
                                            <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                <?php elseif($field->element == "text"): ?>


                                        <input class="form-control" type="text" value="<?php echo e($field->defaultValue($model_id)); ?>" id="default-value<?php echo e($field->id); ?>" name="default_values[<?php echo e($field->id); ?>]">


                                <?php elseif($field->element == "textarea"): ?>


                                        <textarea class="form-control" style="width: 100%;" id="default-value<?php echo e($field->id); ?>" name="default_values[<?php echo e($field->id); ?>]"><?php echo e($field->defaultValue($model_id)); ?></textarea>


                                <?php elseif($field->element == "listbox"): ?>


                                        <select class="form-control" name="default_values[<?php echo e($field->id); ?>]">
                                            <option value=""></option>
                                            <?php $__currentLoopData = explode("\r\n", $field->field_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($field_value); ?>" <?php echo e($field->defaultValue($model_id) == $field_value ? 'selected="selected"': ''); ?>><?php echo e($field_value); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>


                                <?php elseif($field->element == "radio"): ?>

                                    <?php $__currentLoopData = explode("\r\n", $field->field_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="col-md-3 form-control" for="<?php echo e(str_slug($field_value)); ?>">
                                        <input id="<?php echo e(str_slug($field_value)); ?>" aria-label="<?php echo e(str_slug($field->name)); ?>"  type='radio' name="default_values[<?php echo e($field->id); ?>]" value="<?php echo e($field_value); ?>" <?php echo e($field->defaultValue($model_id) == $field_value ? 'checked="checked"': ''); ?> /><?php echo e($field_value); ?>

                                    </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php elseif($field->element == "checkbox"): ?>

                                     <?php $__currentLoopData = explode("\r\n", $field->field_values); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="col-md-3 form-control" for="<?php echo e(str_slug($field_value)); ?>">
                                            <input id="<?php echo e(str_slug($field_value)); ?>" type="checkbox" aria-label="<?php echo e(str_slug($field->name)); ?>" name="default_values[<?php echo e($field->id); ?>][]" value="<?php echo e($field_value); ?>"<?php echo e(in_array($field_value, explode(', ',$field->defaultValue($model_id))) ? ' checked="checked"': ''); ?>> <?php echo e($field_value); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <?php else: ?>
                                    <span class="help-block form-error">
                                        Unknown field element: <?php echo e($field->element); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

    <?php endif; ?>
</span>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/livewire/custom-field-set-default-values-for-model.blade.php ENDPATH**/ ?>