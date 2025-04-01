<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/hardware/general.checkout')); ?>

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
                <form class="form-horizontal" method="post" action="" autocomplete="off">
                    <div class="box-header with-border">
                        <h2 class="box-title"> <?php echo e(trans('admin/hardware/form.tag')); ?> <?php echo e($asset->asset_tag); ?></h2>
                    </div>
                    <div class="box-body">
                    <?php echo e(csrf_field()); ?>

                        <?php if($asset->company && $asset->company->name): ?>
                            <div class="form-group">
                                <?php echo e(Form::label('model', trans('general.company'), array('class' => 'col-md-3 control-label'))); ?>

                                <div class="col-md-8">
                                    <p class="form-control-static">
                                        <?php echo e($asset->company->name); ?>

                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    <!-- AssetModel name -->
                        <div class="form-group">
                            <?php echo e(Form::label('model', trans('admin/hardware/form.model'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <p class="form-control-static">
                                    <?php if(($asset->model) && ($asset->model->name)): ?>
                                        <?php echo e($asset->model->name); ?>

                                    <?php else: ?>
                                        <span class="text-danger text-bold">
                  <i class="fas fa-exclamation-triangle"></i><?php echo e(trans('admin/hardware/general.model_invalid')); ?>

                  <a href="<?php echo e(route('hardware.edit', $asset->id)); ?>"></a> <?php echo e(trans('admin/hardware/general.model_invalid_fix')); ?></span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>

                        <!-- Asset Name -->
                        <div class="form-group <?php echo e($errors->has('name') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('name', trans('admin/hardware/form.name'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name', $asset->name)); ?>" tabindex="1">
                                <?php echo $errors->first('name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group <?php echo e($errors->has('status_id') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('status_id', trans('admin/hardware/form.status'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-7 required">
                                <?php echo e(Form::select('status_id', $statusLabel_list, $asset->status_id, array('class'=>'select2', 'style'=>'width:100%','', 'aria-label'=>'status_id'))); ?>

                                <?php echo $errors->first('status_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                    <?php echo $__env->make('partials.forms.checkout-selector', ['user_select' => 'true','asset_select' => 'true', 'location_select' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('general.user'), 'fieldname' => 'assigned_user', 'required'=>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- We have to pass unselect here so that we don't default to the asset that's being checked out. We want that asset to be pre-selected everywhere else. -->
                    <?php echo $__env->make('partials.forms.edit.asset-select', ['translated_name' => trans('general.asset'), 'fieldname' => 'assigned_asset', 'unselect' => 'true', 'style' => 'display:none;', 'required'=>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'assigned_location', 'style' => 'display:none;', 'required'=>'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                    <!-- Checkout/Checkin Date -->
                        <div class="form-group <?php echo e($errors->has('checkout_at') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('checkout_at', trans('admin/hardware/form.checkout_date'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <div class="input-group date col-md-7" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-end-date="0d" data-date-clear-btn="true">
                                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkout_at" id="checkout_at" value="<?php echo e(old('checkout_at', date('Y-m-d'))); ?>">
                                    <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <?php echo $errors->first('checkout_at', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                        <!-- Expected Checkin Date -->
                        <div class="form-group <?php echo e($errors->has('expected_checkin') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('expected_checkin', trans('admin/hardware/form.expected_checkin'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <div class="input-group date col-md-7" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-start-date="0d" data-date-clear-btn="true">
                                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="expected_checkin" id="expected_checkin" value="<?php echo e(old('expected_checkin')); ?>">
                                    <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <?php echo $errors->first('expected_checkin', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                        <!-- Note -->
                        <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $asset->note)); ?></textarea>
                                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                        <?php if($asset->requireAcceptance() || $asset->getEula() || ($snipeSettings->webhook_endpoint!='')): ?>
                            <div class="form-group notification-callout">
                                <div class="col-md-8 col-md-offset-3">
                                    <div class="callout callout-info">

                                        <?php if($asset->requireAcceptance()): ?>
                                            <i class="far fa-envelope" aria-hidden="true"></i>
                                            <?php echo e(trans('admin/categories/general.required_acceptance')); ?>

                                            <br>
                                        <?php endif; ?>

                                        <?php if($asset->getEula()): ?>
                                            <i class="far fa-envelope" aria-hidden="true"></i>
                                            <?php echo e(trans('admin/categories/general.required_eula')); ?>

                                            <br>
                                        <?php endif; ?>

                                        <?php if($snipeSettings->webhook_endpoint!=''): ?>
                                            <i class="fab fa-slack" aria-hidden="true"></i>
                                            <?php echo e(trans('general.webhook_msg_note')); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div> <!--/.box-body-->
                    <div class="box-footer">
                        <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"> <?php echo e(trans('button.cancel')); ?></a>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.checkout')); ?></button>
                    </div>
                </form>
            </div>
        </div> <!--/.col-md-7-->

        <!-- right column -->
        <div class="col-md-5" id="current_assets_box" style="display:none;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title"><?php echo e(trans('admin/users/general.current_assets')); ?></h2>
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

    <script>
        //        $('#checkout_at').datepicker({
        //            clearBtn: true,
        //            todayHighlight: true,
        //            endDate: '0d',
        //            format: 'yyyy-mm-dd'
        //        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/hardware/checkout.blade.php ENDPATH**/ ?>