


<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/consumables/general.checkout')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">

    <form class="form-horizontal" method="post" action="" autocomplete="off">
      <!-- CSRF Token -->
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

      <div class="box box-default">

        <?php if($consumable->id): ?>
          <div class="box-header with-border">
            <div class="box-heading">
              <h2 class="box-title"><?php echo e($consumable->name); ?> </h2>
            </div>
          </div><!-- /.box-header -->
        <?php endif; ?>

        <div class="box-body">
          <?php if($consumable->name): ?>
          <!-- consumable name -->
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo e(trans('admin/consumables/general.consumable_name')); ?></label>
            <div class="col-md-6">
              <p class="form-control-static"><?php echo e($consumable->name); ?></p>
            </div>
          </div>
          <?php endif; ?>

          <!-- User -->
            <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.select_user'), 'fieldname' => 'assigned_to', 'required'=> 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <?php if($consumable->requireAcceptance() || $consumable->getEula() || ($snipeSettings->webhook_endpoint!='')): ?>
              <div class="form-group notification-callout">
                <div class="col-md-8 col-md-offset-3">
                  <div class="callout callout-info">

                    <?php if($consumable->category->require_acceptance=='1'): ?>
                      <i class="far fa-envelope"></i>
                      <?php echo e(trans('admin/categories/general.required_acceptance')); ?>

                      <br>
                    <?php endif; ?>

                    <?php if($consumable->getEula()): ?>
                      <i class="far fa-envelope"></i>
                      <?php echo e(trans('admin/categories/general.required_eula')); ?>

                        <br>
                    <?php endif; ?>

                    <?php if($snipeSettings->webhook_endpoint!=''): ?>
                        <i class="fab fa-slack"></i>
                        <?php echo e(trans('general.webhook_msg_note')); ?>

                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>

          <!-- Checkout QTY -->
          <div class="form-group <?php echo e($errors->has('qty') ? 'error' : ''); ?> ">
              <label for="qty" class="col-md-3 control-label"><?php echo e(trans('general.qty')); ?></label>
              <div class="col-md-7 col-sm-12 required">
                  <div class="col-md-3" style="padding-left:0px">
                    <input class="form-control" type="number" name="qty" id="qty" value="1" min="1" max="<?php echo e($consumable->numRemaining()); ?>" />
                  </div>
              </div>
              <?php echo $errors->first('qty', '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>

          </div>
          
          <!-- Note -->
          <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
            <label for="note" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
            <div class="col-md-7">
              <textarea class="col-md-6 form-control" name="note"><?php echo e(old('note')); ?></textarea>
              <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

            </div>
          </div>
        </div> <!-- .box-body -->
        <div class="box-footer">
          <a class="btn btn-link" href="<?php echo e(route('consumables.show', ['consumable'=> $consumable->id])); ?>"><?php echo e(trans('button.cancel')); ?></a>
          <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.checkout')); ?></button>
       </div>
      </div>
    </form>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/consumables/checkout.blade.php ENDPATH**/ ?>