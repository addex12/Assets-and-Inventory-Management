<?php $__env->startSection('title'); ?>
 <?php echo e(trans('admin/components/general.checkout')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8">
    <form class="form-horizontal" id="checkout_form" method="post" action="" autocomplete="off">
      <!-- CSRF Token -->
      <?php echo e(csrf_field()); ?>


      <div class="box box-default">
        <?php if($component->id): ?>
        <div class="box-header with-border">
          <div class="box-heading">
            <h2 class="box-title"><?php echo e($component->name); ?>  (<?php echo e($component->numRemaining()); ?>  <?php echo e(trans('admin/components/general.remaining')); ?>)</h2>
          </div>
        </div><!-- /.box-header -->
        <?php endif; ?>

        <div class="box-body">
          <!-- Asset -->
            <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('general.select_asset'), 'fieldname' => 'asset_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="form-group <?php echo e($errors->has('assigned_qty') ? ' has-error' : ''); ?>">
              <label for="assigned_qty" class="col-md-3 control-label">
                <?php echo e(trans('general.qty')); ?>

              </label>
              <div class="col-md-2 col-sm-5 col-xs-5">
                <input class="form-control required col-md-12" type="text" name="assigned_qty" id="assigned_qty" value="<?php echo e(old('assigned_qty') ?? 1); ?>" />
              </div>
              <?php if($errors->first('assigned_qty')): ?>
                <div class="col-md-9 col-md-offset-3">
                  <?php echo $errors->first('assigned_qty', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                </div>
              <?php endif; ?>
            </div>


            <!-- Note -->
            <div class="form-group<?php echo e($errors->has('note') ? ' error' : ''); ?>">
              <label for="note" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
              <div class="col-md-7">
                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $component->note)); ?></textarea>
                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

              </div>
            </div>


        </div> <!-- .BOX-BODY-->
        <div class="box-footer">
          <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>
          <button type="submit" id="submit_button" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.checkout')); ?></button>
       </div>
      </div> <!-- .box-default-->
    </form>
  </div> <!-- .col-md-9-->
</div> <!-- .row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/components/checkout.blade.php ENDPATH**/ ?>