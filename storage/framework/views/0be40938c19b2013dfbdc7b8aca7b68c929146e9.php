<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/licenses/general.checkout')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
        <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
        <!-- left column -->
    <div class="col-md-7">
        <form class="form-horizontal" method="post" action="" autocomplete="off">
            <?php echo e(csrf_field()); ?>


            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title"> <?php echo e($license->name); ?> (<?php echo e(trans('admin/licenses/message.seats_available', ['seat_count' => $license->availCount()->count()])); ?>)</h2>
                </div>
                <div class="box-body">


                    <!-- Asset name -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo e(trans('admin/hardware/form.name')); ?></label>
                        <div class="col-md-9">
                            <p class="form-control-static"><?php echo e($license->name); ?></p>
                        </div>
                    </div>
                    <!-- Category -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo e(trans('general.category')); ?></label>
                        <div class="col-md-9">
                            <p class="form-control-static"><?php echo e($license->category->name); ?></p>
                        </div>
                    </div>

                    <!-- Serial -->
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo e(trans('admin/licenses/form.license_key')); ?></label>
                        <div class="col-md-9">
                            <p class="form-control-static" style="word-wrap: break-word;">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                                    <?php echo e($license->serial); ?>

                                <?php else: ?>
                                    ------------
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>

                    <?php echo $__env->make('partials.forms.checkout-selector', ['user_select' => 'true','asset_select' => 'true', 'location_select' => 'false'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.user'), 'fieldname' => 'assigned_to', 'required'=>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('admin/licenses/form.asset'), 'fieldname' => 'asset_id', 'style' => 'display:none;'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <!-- Note -->
                    <div class="form-group <?php echo e($errors->has('notes') ? 'error' : ''); ?>">
                        <label for="note" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
                        <div class="col-md-8">
                            <textarea class="col-md-6 form-control" id="notes" name="notes" style="width: 100%"><?php echo e(old('note')); ?></textarea>
                            <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                        </div>
                    </div>
                </div>


                <?php if($license->requireAcceptance() || $license->getEula() || ($snipeSettings->webhook_endpoint!='')): ?>
                    <div class="form-group notification-callout">
                        <div class="col-md-8 col-md-offset-3">
                            <div class="callout callout-info">

                                <?php if($license->requireAcceptance()): ?>
                                    <i class="far fa-envelope"></i>
                                    <?php echo e(trans('admin/categories/general.required_acceptance')); ?>

                                    <br>
                                <?php endif; ?>

                                <?php if($license->getEula()): ?>
                                    <i class="far fa-envelope"></i>
                                    <?php echo e(trans('admin/categories/general.required_eula')); ?>

                                    <br>
                                <?php endif; ?>

                                <?php if(($license->category) && ($license->category->checkin_email)): ?>
                                    <i class="far fa-envelope"></i>
                                    <?php echo e(trans('admin/categories/general.checkin_email_notification')); ?>

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

                <div class="box-footer">
                    <a class="btn btn-link" href="<?php echo e(route('licenses.index')); ?>"><?php echo e(trans('button.cancel')); ?></a>
                    <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.checkout')); ?></button>
                </div>
            </div> <!-- /.box-->
        </form>
    </div> <!-- /.col-md-7-->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/licenses/checkout.blade.php ENDPATH**/ ?>