<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.audit')); ?>

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

                <?php echo e(Form::open([
                  'method' => 'POST',
                  'route' => ['asset.audit.store', $asset->id],
                  'files' => true,
                  'class' => 'form-horizontal' ])); ?>


                    <div class="box-header with-border">
                        <h2 class="box-title"> <?php echo e(trans('admin/hardware/form.tag')); ?> <?php echo e($asset->asset_tag); ?></h2>
                    </div>
                    <div class="box-body">
                    <?php echo e(csrf_field()); ?>

                    <?php if($asset->model->name): ?>
                        <!-- Asset name -->
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <?php echo e(Form::label('name', trans('admin/hardware/form.model'), array('class' => 'col-md-3 control-label'))); ?>

                                <div class="col-md-8">
                                    <p class="form-control-static"><?php echo e($asset->model->name); ?></p>
                                </div>
                            </div>
                    <?php endif; ?>

                    <!-- Asset Name -->
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <?php echo e(Form::label('name', trans('admin/hardware/form.name'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo e($asset->name); ?></p>
                            </div>
                        </div>

                        <!-- Locations -->
                    <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Update location -->
                        <div class="form-group">

                            <div class="col-md-8 col-md-offset-3">
                                <label class="form-control">
                                    <input type="checkbox" value="1" name="update_location" <?php echo e(Request::old('update_location') == '1' ? ' checked="checked"' : ''); ?>> <?php echo e(trans('admin/hardware/form.asset_location')); ?>

                                </label>
                                <p class="help-block"><?php echo trans('help.audit_help'); ?></p>
                            </div>

                        </div>


                        <!-- Show last audit date -->
                        <div class="form-group">
                            <label class="control-label col-md-3">
                                <?php echo e(trans('general.last_audit')); ?>

                            </label>
                            <div class="col-md-8">

                                <p class="form-control-static">
                                    <?php if($asset->last_audit_date): ?>
                                        <?php echo e(Helper::getFormattedDateObject($asset->last_audit_date, 'datetime', false)); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('admin/settings/general.none')); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>


                        <!-- Next Audit -->
                        <div class="form-group<?php echo e($errors->has('next_audit_date') ? ' has-error' : ''); ?>">
                            <?php echo e(Form::label('name', trans('general.next_audit_date'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-clear-btn="true">
                                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.next_audit_date')); ?>" name="next_audit_date" id="next_audit_date" value="<?php echo e(old('next_audit_date', $next_audit_date)); ?>">
                                    <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <?php echo $errors->first('next_audit_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                                 <p class="help-block"><?php echo trans('general.next_audit_date_help'); ?></p>
                            </div>
                        </div>


                        <!-- Note -->
                        <div class="form-group<?php echo e($errors->has('note') ? ' has-error' : ''); ?>">
                            <?php echo e(Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note', $asset->note)); ?></textarea>
                                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>

                        <!-- Audit Image -->
                        <?php echo $__env->make('partials.forms.edit.image-upload', ['help_text' => trans('general.audit_images_help')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    </div> <!--/.box-body-->
                    <div class="box-footer">
                        <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"> <?php echo e(trans('button.cancel')); ?></a>
                        <button type="submit" class="btn btn-success pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.audit')); ?></button>
                    </div>
                </form>
            </div>
        </div> <!--/.col-md-7-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/hardware/audit.blade.php ENDPATH**/ ?>