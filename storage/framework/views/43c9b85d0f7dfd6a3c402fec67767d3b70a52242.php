<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.localization_title')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-primary"> <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <style>
        .checkbox label {
            padding-right: 40px;
        }
    </style>


    <?php echo e(Form::open(['method' => 'POST', 'files' => false, 'autocomplete' => 'off', 'class' => 'form-horizontal', 'role' => 'form' ])); ?>

    <!-- CSRF Token -->
    <?php echo e(csrf_field()); ?>


    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">


            <div class="panel box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">
                        <i class="fas fa-globe-americas" aria-hidden="true"></i> <?php echo e(trans('admin/settings/general.localization')); ?>

                    </h2>
                </div>
                <div class="box-body">


                    <div class="col-md-12">

                        <!-- Language -->
                        <div class="form-group <?php echo e($errors->has('site_name') ? 'error' : ''); ?>">
                            <div class="col-md-3 col-xs-12">
                                <?php echo e(Form::label('site_name', trans('admin/settings/general.default_language'))); ?>

                            </div>
                            <div class="col-md-5 col-xs-12">
                                <?php echo Form::locales('locale', Request::old('locale', $setting->locale), 'select2'); ?>


                                <?php echo $errors->first('locale', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>

                        <!-- name display format -->
                        <div class="form-group <?php echo e($errors->has('name_display_format') ? 'error' : ''); ?>">
                            <div class="col-md-3 col-xs-12">
                                <?php echo e(Form::label('name_display_format', trans('general.name_display_format'))); ?>

                            </div>
                            <div class="col-md-5 col-xs-12">
                                <?php echo Form::name_display_format('name_display_format', Request::old('name_display_format', $setting->name_display_format), 'select2'); ?>


                                <?php echo $errors->first('name_display_format', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>



                        <!-- Date format -->
                        <div class="form-group <?php echo e($errors->has('time_display_format') ? 'error' : ''); ?>">
                            <div class="col-md-3 col-xs-12">
                                <?php echo e(Form::label('time_display_format', trans('general.time_and_date_display'))); ?>

                            </div>
                            <div class="col-md-5 col-xs-12">
                                <?php echo Form::date_display_format('date_display_format', Request::old('date_display_format', $setting->date_display_format), 'select2'); ?>

                            </div>
                            <div class="col-md-3 col-xs-12">
                                <?php echo Form::time_display_format('time_display_format', Request::old('time_display_format', $setting->time_display_format), 'select2'); ?>

                            </div>
                            
                            <?php echo $errors->first('time_display_format', '<div class="col-md-9 col-md-offset-3"><span class="alert-msg" aria-hidden="true">:message</span> </div>'); ?>


                        </div>

                        <!-- Currency -->
                        <div class="form-group <?php echo e($errors->has('default_currency') ? 'error' : ''); ?>">
                            <div class="col-md-3 col-xs-12">
                                <?php echo e(Form::label('default_currency', trans('admin/settings/general.default_currency'))); ?>

                            </div>
                            <div class="col-md-9 col-xs-12">
                                <?php echo e(Form::text('default_currency', old('default_currency', $setting->default_currency), array('class' => 'form-control select2-container','placeholder' => 'USD', 'maxlength'=>'3', 'style'=>'width: 60px; display: inline-block; '))); ?>


                                <?php echo Form::digit_separator('digit_separator', old('digit_separator', $setting->digit_separator), 'select2'); ?>


                                <?php echo $errors->first('default_currency', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                            </div>
                        </div>


                    </div>

                </div> <!--/.box-body-->
                <div class="box-footer">
                    <div class="text-left col-md-6">
                        <a class="btn btn-link text-left" href="<?php echo e(route('settings.index')); ?>"><?php echo e(trans('button.cancel')); ?></a>
                    </div>
                    <div class="text-right col-md-6">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.save')); ?></button>
                    </div>

                </div>
            </div> <!-- /box -->
        </div> <!-- /.col-md-8-->
    </div> <!-- /.row-->

    <?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/settings/localization.blade.php ENDPATH**/ ?>