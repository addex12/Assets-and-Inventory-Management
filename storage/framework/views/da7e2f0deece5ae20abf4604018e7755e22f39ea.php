<?php $__env->startSection('title'); ?>
     <?php echo e(trans('admin/accessories/general.checkin')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
        <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <div class="row">
        <div class="col-md-7">
            <form class="form-horizontal" method="post" action="" autocomplete="off">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                <div class="box box-default">
                    <?php if($accessory->id): ?>
                        <div class="box-header with-border">
                            <h2 class="box-title"><?php echo e($accessory->name); ?></h2>
                        </div><!-- /.box-header -->
                    <?php endif; ?>

                            <div class="box-body">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                                    <?php if($accessory->name): ?>
                                    <!-- accessory name -->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo e(trans('admin/hardware/form.name')); ?></label>
                                        <div class="col-md-6">
                                          <p class="form-control-static"><?php echo e($accessory->name); ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <!-- Note -->
                                    <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
                                        <label for="note" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.notes')); ?></label>
                                        <div class="col-md-7">
                                            <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $accessory->note)); ?></textarea>
                                            <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                        </div>
                                    </div>
                            <!-- Checkout/Checkin Date -->
                            <div class="form-group<?php echo e($errors->has('checkin_at') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('checkin_at', trans('admin/hardware/form.checkin_date'), array('class' => 'col-md-3 control-label'))); ?>

                                <div class="col-md-7">
                                    <div class="input-group col-md-5 required" style="padding-left: 0px;">
                                        <div class="input-group date" data-date-clear-btn="true" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-autoclose="true">
                                            <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkin_at" id="checkin_at" value="<?php echo e(Request::old('checkin_at', date('Y-m-d'))); ?>">
                                            <span class="input-group-addon"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <?php echo $errors->first('checkin_at', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>'); ?>

                                    </div>
                                </div>
                            </div>

                              </div>
                        <div class="box-footer">
                            <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>
                            <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i>
                                <?php echo e(trans('general.checkin')); ?></button>
                        </div>


                </div> <!-- .box.box-default -->
            </form>
        </div> <!-- .col-md-9-->
    </div> <!-- .row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/accessories/checkin.blade.php ENDPATH**/ ?>