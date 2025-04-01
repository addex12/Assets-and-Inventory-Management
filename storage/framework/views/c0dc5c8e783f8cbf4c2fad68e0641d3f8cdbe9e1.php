<?php
//set array up before loop so it doesn't get wiped at every iteration
    $fields = [];
?>
<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(($model) && ($model->fieldset)): ?>
    <?php $__currentLoopData = $model->fieldset->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        //prevents some duplicate queries - open to a better way of skipping dupes in output
        //its ugly, but if we'd rather deal with duplicate queries we can get rid of this. 
            if (in_array($field->db_column_name(), $fields)) {
                $duplicate = true;
                continue; 
            } else {
                $duplicate = false;
            }
            $fields[] = $field->db_column_name(); 
        ?>

    <div class="form-group<?php echo e($errors->has($field->db_column_name()) ? ' has-error' : ''); ?>">
      <label for="<?php echo e($field->db_column_name()); ?>" class="col-md-3 control-label"><?php echo e($field->name); ?> </label>
      <div class="col-md-7 col-sm-12<?php echo e(($field->pivot->required=='1') ? ' required' : ''); ?>">

          <?php if($field->element!='text'): ?>
              <!-- Listbox -->
              <?php if($field->element=='listbox'): ?>
                  <?php echo e(Form::select($field->db_column_name(), $field->formatFieldValuesAsArray(),
                  Request::old($field->db_column_name(),(isset($item) ? Helper::gracefulDecrypt($field, $item->{$field->db_column_name()}) : $field->defaultValue($model->id))), ['class'=>'format select2 form-control'])); ?>


              <?php elseif($field->element=='textarea'): ?>
                <?php if($field->is_unique): ?>
                    <input type="text" class="form-control" disabled value="<?php echo e(trans('/admin/hardware/form.bulk_update_custom_field_unique')); ?>">
                <?php endif; ?>
                <?php if(!$field->is_unique): ?> 
                    <textarea class="col-md-6 form-control" id="<?php echo e($field->db_column_name()); ?>" name="<?php echo e($field->db_column_name()); ?>"><?php echo e(Request::old($field->db_column_name(),(isset($item) ? Helper::gracefulDecrypt($field, $item->{$field->db_column_name()}) : $field->defaultValue($model->id)))); ?></textarea>
                <?php endif; ?> 
              <?php elseif($field->element=='checkbox'): ?>
                    <!-- Checkboxes -->
                  <?php $__currentLoopData = $field->formatFieldValuesAsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <label class="form-control">
                          <input type="checkbox" value="<?php echo e($value); ?>" name="<?php echo e($field->db_column_name()); ?>[]" <?php echo e(isset($item) ? (in_array($value, array_map('trim', explode(',', $item->{$field->db_column_name()}))) ? ' checked="checked"' : '') : (Request::old($field->db_column_name()) != '' ? ' checked="checked"' : (in_array($key, array_map('trim', explode(',', $field->defaultValue($model->id)))) ? ' checked="checked"' : ''))); ?>>
                          <?php echo e($value); ?>

                      </label>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php elseif($field->element=='radio'): ?>
            <?php $__currentLoopData = $field->formatFieldValuesAsArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <label class="form-control">
                      <input type="radio" value="<?php echo e($value); ?>" name="<?php echo e($field->db_column_name()); ?>" <?php echo e(isset($item) ? ($item->{$field->db_column_name()} == $value ? ' checked="checked"' : '') : (Request::old($field->db_column_name()) != '' ? ' checked="checked"' : (in_array($value, explode(', ', $field->defaultValue($model->id))) ? ' checked="checked"' : ''))); ?>>
                      <?php echo e($value); ?>

                  </label>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

            <?php else: ?>
            <!-- Date field -->

            <?php if($field->format=='DATE'): ?>

            <div class="input-group col-md-5" style="padding-left: 0px;">
                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-autoclose="true" data-date-clear-btn="true">
                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="<?php echo e($field->db_column_name()); ?>" id="<?php echo e($field->db_column_name()); ?>" readonly value="<?php echo e(old($field->db_column_name(),(isset($item) ? Helper::gracefulDecrypt($field, $item->{$field->db_column_name()}) : $field->defaultValue($model->id)))); ?>"  style="background-color:inherit">
                    <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                </div>
            </div>


                <?php else: ?>
                    
                    <?php if(($field->field_encrypted=='0') || (Gate::allows('admin'))): ?>
                        <?php if($field->is_unique): ?> 
                                <input type="text" class="form-control" disabled value="<?php echo e(trans('/admin/hardware/form.bulk_update_custom_field_unique')); ?>">
                            <?php endif; ?>  
                        <?php if(!$field->is_unique): ?> 
                                <input type="text" value="<?php echo e(Request::old($field->db_column_name(),(isset($item) ? Helper::gracefulDecrypt($field, $item->{$field->db_column_name()}) : $field->defaultValue($model->id)))); ?>" id="<?php echo e($field->db_column_name()); ?>" class="form-control" name="<?php echo e($field->db_column_name()); ?>" placeholder="Enter <?php echo e(strtolower($field->format)); ?> text">
                        <?php endif; ?> 
                            <?php else: ?>
                                <input type="text" value="<?php echo e(strtoupper(trans('admin/custom_fields/general.encrypted'))); ?>" class="form-control disabled" disabled>
                    <?php endif; ?>
                   
                <?php endif; ?>

          <?php endif; ?>

        <?php if($field->help_text!=''): ?>
            <p class="help-block"><?php echo e($field->help_text); ?></p>
        <?php endif; ?>

        <p><?php echo e(trans('admin/hardware/form.bulk_update_model_prefix')); ?>: 
                    <?php echo e($field->assetModels()->pluck('name')->intersect($modelNames)->implode(', ')); ?> 
            </p>     

              
              

          <?php
          $errormessage=$errors->first($field->db_column_name());
          if ($errormessage) {
              $errormessage=preg_replace('/ snipeit /', '', $errormessage);
              print('<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> '.$errormessage.'</span>');
          }
            ?>
      </div>

        <?php if($field->field_encrypted): ?>
        <div class="col-md-1 col-sm-1 text-left">
            <i class="fas fa-lock" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('admin/custom_fields/general.value_encrypted')); ?>"></i>
        </div>
        <?php endif; ?>


    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/models/custom_fields_form_bulk_edit.blade.php ENDPATH**/ ?>