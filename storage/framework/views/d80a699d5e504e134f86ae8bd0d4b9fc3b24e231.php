          <!-- Improvement Type -->
          <div class="form-group <?php echo e($errors->has('asset_maintenance_type') ? ' has-error' : ''); ?>">
              <label for="asset_maintenance_type" class="col-md-3 control-label"><?php echo e(trans('admin/asset_maintenances/form.asset_maintenance_type')); ?>

              </label>
              <div class="col-md-7<?php echo e((Helper::checkIfRequired($item, 'asset_maintenance_type')) ? ' required' : ''); ?>">
                  <?php echo e(Form::select('asset_maintenance_type', $assetMaintenanceType , old('asset_maintenance_type', $item->asset_maintenance_type), ['class'=>'select2', 'style'=>'min-width:350px', 'aria-label'=>'asset_maintenance_type'])); ?>

                  <?php echo $errors->first('asset_maintenance_type', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

              </div>
          </div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/maintenance_type.blade.php ENDPATH**/ ?>