<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.custom_report')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8 col-md-offset-2">

    <?php echo e(Form::open(['method' => 'post', 'class' => 'form-horizontal'])); ?>

    <?php echo e(csrf_field()); ?>


    <!-- Horizontal Form -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h2 class="box-title"><?php echo e(trans('general.customize_report')); ?></h2>
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="col-md-4">

              <label class="form-control">
                <input type="checkbox" id="checkAll" checked="checked">
               <?php echo e(trans('general.select_all')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('id', '1', '1')); ?>

                <?php echo e(trans('general.id')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('company', '1', '1')); ?>

                <?php echo e(trans('general.company')); ?>

              </label>

              <label class="form-control">
              <?php echo e(Form::checkbox('asset_tag', '1', '1')); ?>

                <?php echo e(trans('general.asset_tag')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('asset_name', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/form.name')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('manufacturer', '1', '1')); ?>

                <?php echo e(trans('general.manufacturer')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('model', '1', '1')); ?>

                <?php echo e(trans('general.asset_models')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('category', '1', '1')); ?>

                <?php echo e(trans('general.category')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('serial', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/table.serial')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('purchase_date', '1', '1')); ?>

                <?php echo e(trans('admin/licenses/table.purchase_date')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('purchase_cost', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/form.cost')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('eol', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/table.eol')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('order', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/form.order')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('supplier', '1', '1')); ?>

                <?php echo e(trans('general.suppliers')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('location', '1', '1')); ?>

                <?php echo e(trans('general.location')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('location_address', '1', '1')); ?>

                - <?php echo e(trans('general.address')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('rtd_location', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/form.default_location')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('rtd_location_address', '1', '1')); ?>

                - <?php echo e(trans('general.address')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('status', '1', '1')); ?>

                <?php echo e(trans('general.status')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('warranty', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/form.warranty')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('depreciation', '1', '1')); ?>

                <?php echo e(trans('general.depreciation')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('checkout_date', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/table.checkout_date')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('checkin_date', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/table.last_checkin_date')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('expected_checkin', '1', '1')); ?>

                <?php echo e(trans('admin/hardware/form.expected_checkin')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('created_at', '1', '1')); ?>

                <?php echo e(trans('general.created_at')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('updated_at', '1', '1')); ?>

                <?php echo e(trans('general.updated_at')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('deleted_at', '1', '1')); ?>

                <?php echo e(trans('general.deleted')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('last_audit_date', '1', '1')); ?>

                <?php echo e(trans('general.last_audit')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('next_audit_date', '1', '1')); ?>

                <?php echo e(trans('general.next_audit_date')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('notes', '1', '1')); ?>

                <?php echo e(trans('general.notes')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('url', '1', '1')); ?>

                - <?php echo e(trans('general.url')); ?>

              </label>


            <!-- User fields -->

              <h2><?php echo e(trans('general.checked_out_to')); ?> <?php echo e(trans('general.fields')); ?>:</h2>

              <label class="form-control">
                <?php echo e(Form::checkbox('assigned_to', '1', '1')); ?>

                <?php echo e(trans('admin/licenses/table.assigned_to')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('username', '1', '1')); ?>

                <?php echo e(trans('admin/users/table.username')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('employee_num', '1', '1')); ?>

                <?php echo e(trans('general.employee_number')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('manager', '1', '1')); ?>

                <?php echo e(trans('admin/users/table.manager')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('department', '1', '1')); ?>

                <?php echo e(trans('general.department')); ?>

              </label>

              <label class="form-control">
                <?php echo e(Form::checkbox('title', '1', '1')); ?>

                <?php echo e(trans('admin/users/table.title')); ?>

              </label>

                <!-- new -->

              <label class="form-control">
                  <?php echo e(Form::checkbox('phone', '1', '1')); ?>

                  <?php echo e(trans('admin/users/table.phone')); ?>

              </label>

              <label class="form-control">
                  <?php echo e(Form::checkbox('user_address', '1', '1')); ?>

                  <?php echo e(trans('general.address')); ?>

              </label>

              <label class="form-control">
                  <?php echo e(Form::checkbox('user_city', '1', '1')); ?>

                  <?php echo e(trans('general.city')); ?>

              </label>

              <label class="form-control">
                  <?php echo e(Form::checkbox('user_state', '1', '1')); ?>

                  <?php echo e(trans('general.state')); ?>

              </label>

              <label class="form-control">
                  <?php echo e(Form::checkbox('user_country', '1', '1')); ?>

                  <?php echo e(trans('general.country')); ?>

              </label>

              <label class="form-control">
                  <?php echo e(Form::checkbox('user_zip', '1', '1')); ?>

                  <?php echo e(trans('general.zip')); ?>

              </label>



            <?php if($customfields->count() > 0): ?>

                <h2><?php echo e(trans('admin/custom_fields/general.custom_fields')); ?></h2>

              <?php $__currentLoopData = $customfields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customfield): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <label class="form-control">
                    <?php echo e(Form::checkbox($customfield->db_column_name(), '1', '1')); ?>

                    <?php echo e($customfield->name); ?>

                  </label>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div> <!-- /.col-md-4-->

          <div class="col-md-8">

            <p>
                <?php echo trans('general.report_fields_info'); ?>

            </p>

              <br>

            <?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'),'multiple' => 'true', 'fieldname' => 'by_company_id[]', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'multiple' => 'true', 'fieldname' => 'by_location_id[]', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('admin/hardware/form.default_location'), 'multiple' => 'true', 'fieldname' => 'by_rtd_location_id[]', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.forms.edit.department-select', ['translated_name' => trans('general.department'), 'fieldname' => 'by_dept_id', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.forms.edit.supplier-select', ['translated_name' => trans('general.supplier'), 'fieldname' => 'by_supplier_id[]', 'multiple' => 'true', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.forms.edit.model-select', ['translated_name' => trans('general.asset_model'), 'fieldname' => 'by_model_id[]', 'multiple' => 'true', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.forms.edit.manufacturer-select', ['translated_name' => trans('general.manufacturer'), 'fieldname' => 'by_manufacturer_id', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.forms.edit.category-select', ['translated_name' => trans('general.category'), 'fieldname' => 'by_category_id', 'hide_new' => 'true', 'category_type' => 'asset'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php echo $__env->make('partials.forms.edit.status-select', ['translated_name' => trans('admin/hardware/form.status'), 'fieldname' => 'by_status_id[]', 'multiple' => 'true', 'hide_new' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Order Number -->
            <div class="form-group">
              <label for="by_order_number" class="col-md-3 control-label"><?php echo e(trans('general.order_number')); ?></label>
              <div class="col-md-7">
                <input class="form-control" type="text" name="by_order_number" value="" aria-label="by_order_number">
              </div>
            </div>

          <!-- Purchase Date -->
            <div class="form-group purchase-range<?php echo e(($errors->has('purchase_start') || $errors->has('purchase_end')) ? ' has-error' : ''); ?>">
              <label for="purchase_start" class="col-md-3 control-label"><?php echo e(trans('general.purchase_date')); ?> <?php echo e(trans('general.range')); ?></label>
              <div class="input-daterange input-group col-md-7" id="datepicker">
                <input type="text" class="form-control" name="purchase_start" aria-label="purchase_start" value="<?php echo e(old('purchase_start')); ?>">
                <span class="input-group-addon">to</span>
                <input type="text" class="form-control" name="purchase_end" aria-label="purchase_end" value="<?php echo e(old('purchase_end')); ?>">
              </div>

                <?php if($errors->has('purchase_start') || $errors->has('purchase_end')): ?>
                    <div class="col-md-9 col-lg-offset-3">
                        <?php echo $errors->first('purchase_start', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                        <?php echo $errors->first('purchase_end', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                    </div>
                <?php endif; ?>

            </div>

            <!-- Created Date -->
            <div class="form-group purchase-range<?php echo e(($errors->has('created_start') || $errors->has('created_end')) ? ' has-error' : ''); ?>">
              <label for="created_start" class="col-md-3 control-label"><?php echo e(trans('general.created_at')); ?> <?php echo e(trans('general.range')); ?></label>
              <div class="input-daterange input-group col-md-7" id="datepicker">
                <input type="text" class="form-control" name="created_start" aria-label="created_start" value="<?php echo e(old('created_start')); ?>">
                <span class="input-group-addon">to</span>
                <input type="text" class="form-control" name="created_end" aria-label="created_end" value="<?php echo e(old('created_end')); ?>">
              </div>

                <?php if($errors->has('created_start') || $errors->has('created_end')): ?>
                    <div class="col-md-9 col-lg-offset-3">
                        <?php echo $errors->first('created_start', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                        <?php echo $errors->first('created_end', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                    </div>
                <?php endif; ?>
            </div>

          <!-- Checkout Date -->
          <div class="form-group checkout-range<?php echo e(($errors->has('checkout_date_start') || $errors->has('checkout_date_end')) ? ' has-error' : ''); ?>">
              <label for="checkout_date" class="col-md-3 control-label"><?php echo e(trans('general.checkout')); ?> <?php echo e(trans('general.range')); ?></label>
              <div class="input-daterange input-group col-md-7" id="datepicker">
                  <input type="text" class="form-control" name="checkout_date_start" aria-label="checkout_date_start" value="<?php echo e(old('checkout_date_start')); ?>">
                  <span class="input-group-addon">to</span>
                  <input type="text" class="form-control" name="checkout_date_end" aria-label="checkout_date_end" value="<?php echo e(old('checkout_date_end')); ?>">
              </div>

              <?php if($errors->has('checkout_date_start') || $errors->has('checkout_date_end')): ?>
                  <div class="col-md-9 col-lg-offset-3">
                      <?php echo $errors->first('checkout_date_start', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                      <?php echo $errors->first('checkout_date_end', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                  </div>
              <?php endif; ?>

          </div>

          <!-- Last Checkin Date -->
          <div class="form-group checkin-range<?php echo e(($errors->has('checkin_date_start') || $errors->has('checkin_date_end')) ? ' has-error' : ''); ?>">
              <label for="checkin_date" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/table.last_checkin_date')); ?></label>
              <div class="input-daterange input-group col-md-7" id="datepicker">
                  <input type="text" class="form-control" name="checkin_date_start" aria-label="checkin_date_start" value="<?php echo e(old('checkin_date_start')); ?>">
                  <span class="input-group-addon"><?php echo e(strtolower(trans('general.to'))); ?></span>
                  <input type="text" class="form-control" name="checkin_date_end" aria-label="checkin_date_end" value="<?php echo e(old('checkin_date_end')); ?>">
              </div>

              <?php if($errors->has('checkin_date_start') || $errors->has('checkin_date_end')): ?>
                  <div class="col-md-9 col-lg-offset-3">
                      <?php echo $errors->first('checkin_date_start', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                      <?php echo $errors->first('checkin_date_end', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                  </div>
              <?php endif; ?>
          </div>

            <!-- Expected Checkin Date -->
            <div class="form-group expected_checkin-range<?php echo e(($errors->has('expected_checkin_start') || $errors->has('expected_checkin_end')) ? ' has-error' : ''); ?>">
              <label for="expected_checkin_start" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.expected_checkin')); ?></label>
              <div class="input-daterange input-group col-md-7" id="datepicker">
                <input type="text" class="form-control" name="expected_checkin_start" aria-label="expected_checkin_start" value="<?php echo e(old('expected_checkin_start')); ?>">
                <span class="input-group-addon">to</span>
                <input type="text" class="form-control" name="expected_checkin_end" aria-label="expected_checkin_end" value="<?php echo e(old('expected_checkin_end')); ?>">
              </div>

                <?php if($errors->has('expected_checkin_start') || $errors->has('expected_checkin_end')): ?>
                    <div class="col-md-9 col-lg-offset-3">
                        <?php echo $errors->first('expected_checkin_start', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                        <?php echo $errors->first('expected_checkin_end', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                    </div>
                <?php endif; ?>

            </div>

              <!-- Last Audit Date -->
              <div class="form-group last_audit-range<?php echo e(($errors->has('last_audit_start') || $errors->has('last_audit_end')) ? ' has-error' : ''); ?>">
                  <label for="last_audit_start" class="col-md-3 control-label"><?php echo e(trans('general.last_audit')); ?></label>
                  <div class="input-daterange input-group col-md-7" id="datepicker">
                      <input type="text" class="form-control" name="last_audit_start" aria-label="last_audit_start" value="<?php echo e(old('last_audit_start')); ?>">
                      <span class="input-group-addon">to</span>
                      <input type="text" class="form-control" name="last_audit_end" aria-label="last_audit_end" value="<?php echo e(old('last_audit_end')); ?>">
                  </div>

                  <?php if($errors->has('last_audit_start') || $errors->has('last_audit_end')): ?>
                      <div class="col-md-9 col-lg-offset-3">
                          <?php echo $errors->first('last_audit_start', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                          <?php echo $errors->first('last_audit_end', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                      </div>
                  <?php endif; ?>
              </div>

              <!-- Next Audit Date -->
              <div class="form-group next_audit-range<?php echo e(($errors->has('next_audit_start') || $errors->has('next_audit_end')) ? ' has-error' : ''); ?>">
                  <label for="next_audit_start" class="col-md-3 control-label"><?php echo e(trans('general.next_audit_date')); ?></label>
                  <div class="input-daterange input-group col-md-7" id="datepicker">
                      <input type="text" class="form-control" name="next_audit_start" aria-label="next_audit_start" value="<?php echo e(old('next_audit_start')); ?>">
                      <span class="input-group-addon">to</span>
                      <input type="text" class="form-control" name="next_audit_end" aria-label="next_audit_end" value="<?php echo e(old('next_audit_end')); ?>">
                  </div>

                  <?php if($errors->has('next_audit_start') || $errors->has('next_audit_end')): ?>
                      <div class="col-md-9 col-lg-offset-3">
                          <?php echo $errors->first('next_audit_start', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                          <?php echo $errors->first('next_audit_end', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                      </div>
                  <?php endif; ?>
              </div>

            <div class="col-md-9 col-md-offset-3">
            <label class="form-control">
              <?php echo e(Form::checkbox('exclude_archived', '1', old('exclude_archived'))); ?>

              <?php echo e(trans('general.exclude_archived')); ?>

            </label>
            </div>
            <div class="col-md-9 col-md-offset-3">
              <label class="form-control">
                <?php echo e(Form::checkbox('use_bom', '1', old('use_bom'))); ?>

                <?php echo e(trans('general.bom_remark')); ?>

              </label>
            </div>

              <div class="col-md-9 col-md-offset-3">

                  <label class="form-control">
                    <?php echo e(Form::radio('deleted_assets', 'exclude_deleted', true, ['aria-label'=>'deleted_assets', 'id'=>'deleted_assets_exclude_deleted'])); ?>

                    <?php echo e(trans('general.exclude_deleted')); ?>

                  </label>
                  <label class="form-control">
                    <?php echo e(Form::radio('deleted_assets', 'include_deleted', old('deleted_assets'), ['aria-label'=>'deleted_assets', 'id'=>'deleted_assets_include_deleted'])); ?>

                    <?php echo e(trans('general.include_deleted')); ?>

                  </label>
                  <label class="form-control">
                  <?php echo e(Form::radio('deleted_assets', 'only_deleted', old('deleted_assets'), ['aria-label'=>'deleted_assets','id'=>'deleted_assets_only_deleted'])); ?>

                    <?php echo e(trans('general.only_deleted')); ?>

                  </label>
              </div>
          </div>



        </div> <!-- /.box-body-->
        <div class="box-footer text-right">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-download icon-white" aria-hidden="true"></i>
            <?php echo e(trans('general.generate')); ?>

          </button>
        </div>
      </div> <!--/.box.box-default-->
    <?php echo e(Form::close()); ?>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <script>

      $('.purchase-range .input-daterange').datepicker({
          clearBtn: true,
          todayHighlight: true,
          endDate: '0d',
          format: 'yyyy-mm-dd'
      });
      $('.checkout-range .input-daterange').datepicker({
          clearBtn: true,
          todayHighlight: true,
          endDate: '0d',
          format: 'yyyy-mm-dd'
      });

      $('.checkin-range .input-daterange').datepicker({
          clearBtn: true,
          todayHighlight: true,
          endDate: '0d',
          format: 'yyyy-mm-dd'
      });

      $('.expected_checkin-range .input-daterange').datepicker({
          clearBtn: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd'
      });

      $('.last_audit-range .input-daterange').datepicker({
          clearBtn: true,
          todayHighlight: true,
          endDate:'0d',
          format: 'yyyy-mm-dd'
      });

      $('.next_audit-range .input-daterange').datepicker({
          clearBtn: true,
          todayHighlight: true,
          format: 'yyyy-mm-dd'
      });

      $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
      });

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/reports/custom.blade.php ENDPATH**/ ?>