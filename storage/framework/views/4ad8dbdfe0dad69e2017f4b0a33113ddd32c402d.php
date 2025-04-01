



<?php $__env->startSection('title'); ?>
  <?php echo e(trans('admin/custom_fields/general.custom_fields')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('fields.index')); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <!-- Horizontal Form -->
    <?php if($field->id): ?>
        <?php echo e(Form::open(['route' => ['fields.update', $field->id], 'class'=>'form-horizontal'])); ?>

        <?php echo e(method_field('PUT')); ?>

    <?php else: ?>
        <?php echo e(Form::open(['route' => 'fields.store', 'class'=>'form-horizontal'])); ?>

    <?php endif; ?>

    <?php echo csrf_field(); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
        <div class="box-header with-border text-right">
            <button type="submit" class="btn btn-primary"> <?php echo e(trans('general.save')); ?></button>
        </div>
      <div class="box-body">

          <div class="col-md-8">

          <!-- Name -->
          <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <label for="name" class="col-md-3 control-label">
              <?php echo e(trans('admin/custom_fields/general.field_name')); ?>

            </label>
            <div class="col-md-8 required">
                <?php echo e(Form::text('name', old('name', $field->name), array('class' => 'form-control', 'aria-label'=>'name'))); ?>

                <?php echo $errors->first('name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>

          <!-- Element Type -->
          <div class="form-group <?php echo e($errors->has('element') ? ' has-error' : ''); ?>">
            <label for="element" class="col-md-3 control-label">
              <?php echo e(trans('admin/custom_fields/general.field_element')); ?>

            </label>
            <div class="col-md-8 required">

            <?php echo Form::customfield_elements('element', old('element', $field->element), 'field_element select2 form-control'); ?>

            <?php echo $errors->first('element', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>


            </div>
          </div>

          <!-- Element values -->
          <div class="form-group <?php echo e($errors->has('field_values') ? ' has-error' : ''); ?>" id="field_values_text" style="display:none;">
            <label for="field_values" class="col-md-3 control-label">
              <?php echo e(trans('admin/custom_fields/general.field_values')); ?>

            </label>
            <div class="col-md-8 required">
              <?php echo Form::textarea('field_values', old('name', $field->field_values), ['style' => 'width: 100%', 'rows' => 4, 'class' => 'form-control', 'aria-label'=>'field_values']); ?>

              <?php echo $errors->first('field_values', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

              <p class="help-block"><?php echo e(trans('admin/custom_fields/general.field_values_help')); ?></p>
            </div>
          </div>

          <!-- Format -->
          <div class="form-group <?php echo e($errors->has('format') ? ' has-error' : ''); ?>" id="format_values">
            <label for="format" class="col-md-3 control-label">
              <?php echo e(trans('admin/custom_fields/general.field_format')); ?>

            </label>
              <?php
              $field_format = '';
              if (stripos($field->format, 'regex') === 0){
                $field_format = 'CUSTOM REGEX';
              }
              ?>
            <div class="col-md-8 required">
              <?php echo e(Form::select("format",Helper::predefined_formats(), ($field_format == '') ? $field->format : $field_format, array('class'=>'format select2 form-control', 'aria-label'=>'format', 'style' => 'width:100%;'))); ?>

              <?php echo $errors->first('format', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>
          <!-- Custom Format -->
          <div class="form-group <?php echo e($errors->has('custom_format') ? ' has-error' : ''); ?>" id="custom_regex" style="display:none;">
            <label for="custom_format" class="col-md-3 control-label">
              <?php echo e(trans('admin/custom_fields/general.field_custom_format')); ?>

            </label>
            <div class="col-md-8 required">
                <?php echo e(Form::text('custom_format', old('custom_format', (($field->format!='') && (stripos($field->format,'regex')===0)) ? $field->format : ''), array('class' => 'form-control', 'id' => 'custom_format','aria-label'=>'custom_format', 'placeholder'=>'regex:/^[0-9]{15}$/'))); ?>

                <p class="help-block"><?php echo trans('admin/custom_fields/general.field_custom_format_help'); ?></p>

              <?php echo $errors->first('custom_format', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>


            </div>
          </div>

          <!-- Help Text -->
          <div class="form-group <?php echo e($errors->has('help_text') ? ' has-error' : ''); ?>">
              <label for="help_text" class="col-md-3 control-label">
                  <?php echo e(trans('admin/custom_fields/general.help_text')); ?>

              </label>
              <div class="col-md-8">
                  <?php echo e(Form::text('help_text', old('help_text', $field->help_text), array('class' => 'form-control', 'aria-label'=>'help_text'))); ?>

                  <p class="help-block"><?php echo e(trans('admin/custom_fields/general.help_text_description')); ?></p>
                  <?php echo $errors->first('help_text', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

              </div>
          </div>

         <!-- Set up checkbox form group -->
         <div class="form-group">

          <!-- Encrypted warning callout box -->
          <?php if(($field->id) && ($field->field_encrypted=='1')): ?>
              <div class="col-md-9 col-md-offset-3">
                      <div class="alert alert-warning fade in">
                          <i class="fas fa-exclamation-triangle faa-pulse animated"></i>
                          <strong><?php echo e(trans('general.notification_warning')); ?>:</strong>
                          <?php echo e(trans('admin/custom_fields/general.encrypted_options')); ?>

                      </div>

              </div>
          <?php endif; ?>

          <?php if(!$field->id): ?>
              <!-- Encrypted  -->
              <div class="col-md-9 col-md-offset-3" id="encryption_section">
                  <label class="form-control">
                      <input type="checkbox" value="1" name="field_encrypted" id="field_encrypted"<?php echo e((Request::old('field_encrypted') || $field->field_encrypted) ? ' checked="checked"' : ''); ?>>
                      <?php echo e(trans('admin/custom_fields/general.encrypt_field')); ?>

                  </label>
              </div>
              <div class="col-md-9 col-md-offset-3" id="encrypt_warning" style="display:none;">
                  <div class="callout callout-danger">
                      <p><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> <?php echo e(trans('admin/custom_fields/general.encrypt_field_help')); ?></p>
                  </div>
              </div>
          <?php endif; ?>



              <!-- Auto-Add to Future Fieldsets  -->
              <div class="col-md-9 col-md-offset-3">
                  <label class="form-control">
                      <input type="checkbox" name="auto_add_to_fieldsets" aria-label="auto_add_to_fieldsets" value="1"<?php echo e((old('auto_add_to_fieldsets') || $field->auto_add_to_fieldsets) ? ' checked="checked"' : ''); ?>>
                      <?php echo e(trans('admin/custom_fields/general.auto_add_to_fieldsets')); ?>

                  </label>
              </div>

              <!-- Show in list view -->
              <div class="col-md-9 col-md-offset-3">
                  <label class="form-control">
                      <input type="checkbox" name="show_in_listview" aria-label="show_in_listview" value="1"<?php echo e((old('show_in_listview') || $field->show_in_listview) ? ' checked="checked"' : ''); ?>>
                      <?php echo e(trans('admin/custom_fields/general.show_in_listview')); ?>

                  </label>
              </div>


              <?php if((!$field->id) || ($field->field_encrypted=='0')): ?>

              <!-- Show in requestable list view -->
              <div class="col-md-9 col-md-offset-3" id="show_in_requestable_list">
                  <label class="form-control">
                      <input type="checkbox" name="show_in_requestable_list" aria-label="show_in_requestable_list" value="1"<?php echo e((old('show_in_requestable_list') || $field->show_in_requestable_list) ? ' checked="checked"' : ''); ?>>
                      <?php echo e(trans('admin/custom_fields/general.show_in_requestable_list')); ?>

                  </label>
              </div>

              <!-- Show in Email  -->
              <div class="col-md-9 col-md-offset-3" id="show_in_email">
                  <label class="form-control">
                      <input type="checkbox" name="show_in_email" aria-label="show_in_email" value="1"<?php echo e((old('show_in_email') || $field->show_in_email) ? ' checked="checked"' : ''); ?>>
                      <?php echo e(trans('admin/custom_fields/general.show_in_email')); ?>

                  </label>
              </div>

              <!-- Value Must be Unique -->
              <div class="col-md-9 col-md-offset-3" id="is_unique">
                  <label class="form-control">
                      <input type="checkbox" name="is_unique" aria-label="is_unique" value="1"<?php echo e((old('is_unique') || $field->is_unique) ? ' checked="checked"' : ''); ?>>
                      <?php echo e(trans('admin/custom_fields/general.is_unique')); ?>

                  </label>
              </div>
              <?php endif; ?>

              <!-- Show in View All Assets profile view  -->
              <div class="col-md-9 col-md-offset-3" id="display_in_user_view">
                  <label class="form-control">
                      <input type="checkbox" name="display_in_user_view" aria-label="display_in_user_view" value="1" <?php echo e((old('display_in_user_view') || $field->display_in_user_view) ? ' checked="checked"' : ''); ?>>
                      <?php echo e(trans('admin/custom_fields/general.display_in_user_view')); ?>

                  </label>
              </div>



          </div>

          </div>

          <?php if($fieldsets->count() > 0): ?>
          <!-- begin fieldset columns -->
          <div class="col-md-4">

              <h4><?php echo e(trans('admin/custom_fields/general.fieldsets')); ?></h4>
              <?php echo $errors->first('associate_fieldsets', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>


              <label class="form-control">
                  <input type="checkbox" id="checkAll">
                  <?php echo e(trans('general.select_all')); ?>

              </label>

                <?php $__currentLoopData = $fieldsets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $array_fieldname = 'associate_fieldsets.'.$fieldset->id;

                        // Consider the form data first
                        if (old($array_fieldname) == $fieldset->id) {
                            $checked = 'checked';
                        // Otherwise check DB
                        } elseif (isset($field->fieldset) && ($field->fieldset->contains($fieldset->id))) {
                            $checked = 'checked';
                        } else {
                            $checked = '';
                        }
                    ?>

                          <label class="form-control<?php echo e($errors->has('associate_fieldsets.'.$fieldset->id) ? ' has-error' : ''); ?>">
                              <input type="checkbox"
                                     name="associate_fieldsets[<?php echo e($fieldset->id); ?>]"
                                     class="fieldset"
                                     value="<?php echo e($fieldset->id); ?>"
                                    <?php echo e($checked); ?>>
                              <?php echo e($fieldset->name); ?>

                              <?php echo $errors->first('associate_fieldsets.'.$fieldset->id, '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>


                          </label>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
          <?php endif; ?>
      </div> <!-- /.box-body-->

      <div class="box-footer text-right">
        <button type="submit" class="btn btn-primary"> <?php echo e(trans('general.save')); ?></button>
      </div>

    </div> <!--.box.box-default-->


  </div> <!--/.col-md-9-->


</div>
<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<script nonce="<?php echo e(csrf_token()); ?>">
    $(document).ready(function(){

        $("#checkAll").change(function () {
            $(".fieldset").prop('checked', $(this).prop("checked"));
        });

        // Only display the custom format field if it's a custom format validation type
        $(".format").change(function(){
            $(this).find("option:selected").each(function(){
                if ($('.format').prop("selectedIndex") == 1) {
                    $("#custom_regex").show();
                } else{
                    $("#custom_regex").hide();
                }
            });
        }).change();

        // If the element is a radiobutton/checkbox, doesn't show the format input box
        $(".field_element").change(function(){
            $(this).find("option:selected").each(function(){
                if (($(this).attr("value") != "radio") && ($(this).attr("value") != "checkbox")){
                    $("#format_values").show();
                } else{
                    $("#format_values").hide();
                }
            });
        }).change();

        // Only display the field element if the type is not text
        // and don't display encryption option for checkbox or radio
        $(".field_element").change(function(){
            $(this).find("option:selected").each(function(){
                if (($(this).attr("value")!="text") && ($(this).attr("value")!="textarea")){
                    $("#field_values_text").show();
                if ($(this).attr("value") == "checkbox" || $(this).attr("value") == "radio") {
                    $("#encryption_section").hide();
                }
                } else{
                    $("#encryption_section").show();
                    $("#field_values_text").hide();
                }
            });
        }).change();
    });


    $("#field_encrypted").change(function() {
        if (this.checked) {
            $("#encrypt_warning").show();
            $("#show_in_email").hide();
            $("#display_in_user_view").hide();
            $("#is_unique").hide();
            $("#show_in_requestable_list").hide();
        } else {
            $("#encrypt_warning").hide();
            $("#show_in_email").show();
            $("#display_in_user_view").show();
            $("#is_unique").show();
            $("#show_in_requestable_list").show();
        }
    });



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', [
    'helpText' => trans('admin/custom_fields/general.about_fieldsets_text'),
    'helpPosition' => 'right',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/custom_fields/fields/edit.blade.php ENDPATH**/ ?>