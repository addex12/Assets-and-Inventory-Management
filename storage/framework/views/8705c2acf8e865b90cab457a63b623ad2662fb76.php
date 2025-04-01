<?php $__env->startSection('title'); ?>
  <?php echo e(trans('admin/kits/general.checkout')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<style>
  .input-group {
    padding-left: 0px !important;
  }
</style>


<div class="row">
  <!-- left column -->
  <div class="col-md-7">
    <div class="box box-default">
      <div class="box-body">
        <form class="form-horizontal" method="post" action="" autocomplete="off">
          <?php echo e(csrf_field()); ?>

          <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.select_user'), 'fieldname' => 'user_id', 'required'=> 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- Checkout/Checkin Date -->
              <div class="form-group <?php echo e($errors->has('checkout_at') ? 'error' : ''); ?>">
                  <?php echo e(Form::label('name', trans('admin/hardware/form.checkout_date'), array('class' => 'col-md-3 control-label'))); ?>

                  <div class="col-md-8">
                      <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-clear-btn="true">
                          <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkout_at" id="checkout_at" value="<?php echo e(Request::old('checkout_at')); ?>">
                          <span class="input-group-addon"><i class="fas fa-calendar"></i></span>
                      </div>
                      <?php echo $errors->first('checkout_at', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

                  </div>
              </div>

              <!-- Expected Checkin Date -->
              <div class="form-group <?php echo e($errors->has('expected_checkin') ? 'error' : ''); ?>">
                  <?php echo e(Form::label('name', trans('admin/hardware/form.expected_checkin'), array('class' => 'col-md-3 control-label'))); ?>

                  <div class="col-md-8">
                      <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-start-date="0d">
                          <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="expected_checkin" id="expected_checkin" value="<?php echo e(Request::old('expected_checkin')); ?>">
                          <span class="input-group-addon"><i class="fas fa-calendar"></i></span>
                      </div>
                      <?php echo $errors->first('expected_checkin', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

                  </div>
              </div>


          <!-- Note -->
          <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
            <?php echo e(Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label'))); ?>

            <div class="col-md-8">
              <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(Request::old('note')); ?></textarea>
              <?php echo $errors->first('note', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

            </div>
          </div>

      </div> <!--./box-body-->
      <div class="box-footer">
        <a class="btn btn-link" href="<?php echo e(route('kits.index')); ?>"> <?php echo e(trans('button.cancel')); ?></a>
        <button type="submit" class="btn btn-success pull-right"><i class="fas fa-check icon-white"></i> <?php echo e(trans('general.checkout')); ?></button>
      </div>
    </div>
      </form>
  </div> <!--/.col-md-7-->

  <!-- right column -->
  <div class="col-md-5" id="current_assets_box" style="display:none;">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans('admin/users/general.current_assets')); ?></h3>
      </div>
      <div class="box-body">
        <div id="current_assets_content">
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials/assets-assigned', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('notifications'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('notifications'); ?>
<!-- included content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/kits/checkout.blade.php ENDPATH**/ ?>