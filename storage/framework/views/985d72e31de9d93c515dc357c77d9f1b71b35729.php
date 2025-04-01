


<?php $__env->startSection('title'); ?>
  <?php if($item->id): ?>
    <?php echo e(trans('admin/asset_maintenances/form.update')); ?>

  <?php else: ?>
    <?php echo e(trans('admin/asset_maintenances/form.create')); ?>

  <?php endif; ?>
  <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">
    <?php if($item->id): ?>
      <form class="form-horizontal" method="post" action="<?php echo e(route('maintenances.update', $item->id)); ?>" autocomplete="off">
      <?php echo e(method_field('PUT')); ?>

    <?php else: ?>
      <form class="form-horizontal" method="post" action="<?php echo e(route('maintenances.store')); ?>" autocomplete="off">
    <?php endif; ?>
    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="box box-default">
      <div class="box-header with-border">
        <h2 class="box-title">
          <?php if($item): ?>
          <?php echo e($item->name); ?>

          <?php endif; ?>
        </h2>
      </div><!-- /.box-header -->

      <div class="box-body">
        <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('admin/hardware/table.asset_tag'), 'fieldname' => 'asset_id', 'required' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.forms.edit.supplier-select', ['translated_name' => trans('general.supplier'), 'fieldname' => 'supplier_id', 'required' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.repair_assignee'), 'fieldname' => 'assigned_to'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.forms.edit.maintenance_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Title -->
        <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
          <label for="title" class="col-md-3 control-label">
            <?php echo e(trans('admin/asset_maintenances/form.title')); ?>

          </label>
          <div class="col-md-7<?php echo e((Helper::checkIfRequired($item, 'title')) ? ' required' : ''); ?>">
            <input class="form-control" type="text" name="title" id="title" value="<?php echo e(old('title', $item->title)); ?>" />
            <?php echo $errors->first('title', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

          </div>
        </div>

        <!-- Start Date -->
        <div class="form-group <?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
          <label for="start_date" class="col-md-3 control-label"><?php echo e(trans('admin/asset_maintenances/form.start_date')); ?></label>

          <div class="input-group col-md-3<?php echo e((Helper::checkIfRequired($item, 'start_date')) ? ' required' : ''); ?>">
            <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true" data-date-clear-btn="true">
              <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="start_date" id="start_date" value="<?php echo e(old('start_date', $item->start_date)); ?>">
              <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
            </div>
            <?php echo $errors->first('start_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

          </div>
        </div>



        <!-- Completion Date -->
        <div class="form-group <?php echo e($errors->has('completion_date') ? ' has-error' : ''); ?>">
          <label for="start_date" class="col-md-3 control-label"><?php echo e(trans('admin/asset_maintenances/form.completion_date')); ?></label>

          <div class="input-group col-md-3<?php echo e((Helper::checkIfRequired($item, 'completion_date')) ? ' required' : ''); ?>">
            <div class="input-group date" data-date-clear-btn="true" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
              <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="completion_date" id="completion_date" value="<?php echo e(old('completion_date', $item->completion_date)); ?>">
              <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
            </div>
            <?php echo $errors->first('completion_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

          </div>
        </div>

        <!-- Warranty -->
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
              <label class="form-control">
                <input type="checkbox" value="1" name="is_warranty" id="is_warranty" <?php echo e(old('is_warranty', $item->is_warranty) == '1' ? ' checked="checked"' : ''); ?>>
                <?php echo e(trans('admin/asset_maintenances/form.is_warranty')); ?>

              </label>
          </div>
        </div>

        <!-- Asset Maintenance Cost -->
        <div class="form-group <?php echo e($errors->has('cost') ? ' has-error' : ''); ?>">
          <label for="cost" class="col-md-3 control-label"><?php echo e(trans('admin/asset_maintenances/form.cost')); ?></label>
          <div class="col-md-2">
            <div class="input-group">
              <span class="input-group-addon">
                <?php if(($item->asset) && ($item->asset->location) && ($item->asset->location->currency!='')): ?>
                  <?php echo e($item->asset->location->currency); ?>

                <?php else: ?>
                  <?php echo e($snipeSettings->default_currency); ?>

                <?php endif; ?>
              </span>
              <input class="col-md-2 form-control" type="text" name="cost" id="cost" value="<?php echo e(old('cost', Helper::formatCurrencyOutput($item->cost))); ?>" />
              <?php echo $errors->first('cost', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>
        </div>

        <!-- Notes -->
        <div class="form-group <?php echo e($errors->has('notes') ? ' has-error' : ''); ?>">
          <label for="notes" class="col-md-3 control-label"><?php echo e(trans('admin/asset_maintenances/form.notes')); ?></label>
          <div class="col-md-7">
            <textarea class="col-md-6 form-control" id="notes" name="notes"><?php echo e(old('notes', $item->notes)); ?></textarea>
            <?php echo $errors->first('notes', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

          </div>
        </div>
      </div> <!-- .box-body -->

      <div class="box-footer text-right">
        <button type="submit" class="btn btn-success"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.save')); ?></button>
      </div>
    </div> <!-- .box-default -->
    </form>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/asset_maintenances/edit.blade.php ENDPATH**/ ?>