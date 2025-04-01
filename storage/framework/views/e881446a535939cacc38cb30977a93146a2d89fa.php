<?php $__env->startSection('title'); ?>
  <?php echo e(trans('admin/hardware/general.checkin')); ?>

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
    <div class="col-md-9">
      <div class="box box-default">
        <div class="box-header with-border">
          <h2 class="box-title"><?php echo e(trans('admin/hardware/form.tag')); ?> <?php echo e($asset->asset_tag); ?></h2>
        </div><!-- /.box-header -->

        <div class="box-body">
          <div class="col-md-12">
            <?php if($backto=='user'): ?>
              <form class="form-horizontal" method="post"
                    action="<?php echo e(route('hardware.checkin.store', array('assetId'=> $asset->id, 'backto'=>'user'))); ?>"
                    autocomplete="off">
                <?php else: ?>
                  <form class="form-horizontal" method="post"
                        action="<?php echo e(route('hardware.checkin.store', array('assetId'=> $asset->id))); ?>" autocomplete="off">
                  <?php endif; ?>
                  <?php echo e(csrf_field()); ?>


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
                        <input class="form-control" type="text" name="name" aria-label="name" id="name"
                               value="<?php echo e(old('name', $asset->name)); ?>"/>
                        <?php echo $errors->first('name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                      </div>
                    </div>

                    <!-- Status -->
                    <div class="form-group <?php echo e($errors->has('status_id') ? 'error' : ''); ?>">
                      <?php echo e(Form::label('status_id', trans('admin/hardware/form.status'), array('class' => 'col-md-3 control-label'))); ?>

                      <div class="col-md-7 required">
                        <?php echo e(Form::select('status_id', $statusLabel_list, '', array('class'=>'select2', 'style'=>'width:100%','id' =>'modal-statuslabel_types', 'aria-label'=>'status_id'))); ?>

                        <?php echo $errors->first('status_id', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                      </div>
                    </div>

                  <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id', 'help_text' => ($asset->defaultLoc) ? 'You can choose to check this asset in to a location other than the default location of '.$asset->defaultLoc->name.' if one is set.' : null, 'hide_location_radio' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <!-- Checkout/Checkin Date -->
                    <div class="form-group<?php echo e($errors->has('checkin_at') ? ' has-error' : ''); ?>">
                      <?php echo e(Form::label('checkin_at', trans('admin/hardware/form.checkin_date'), array('class' => 'col-md-3 control-label'))); ?>

                      <div class="col-md-8">
                        <div class="input-group col-md-5 required">
                          <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true">
                            <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="checkin_at" id="checkin_at" value="<?php echo e(old('checkin_at', date('Y-m-d'))); ?>">
                            <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                          </div>
                          <?php echo $errors->first('checkin_at', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                        </div>
                      </div>
                    </div>


                    <!-- Note -->
                    <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">

                      <?php echo e(Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label'))); ?>


                      <div class="col-md-8">
                  <textarea class="col-md-6 form-control" id="note"
                            name="note"><?php echo e(old('note', $asset->note)); ?></textarea>
                        <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                      </div>
                    </div>
                    <div class="box-footer">
                      <a class="btn btn-link" href="<?php echo e(URL::previous()); ?>"> <?php echo e(trans('button.cancel')); ?></a>
                      <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.checkin')); ?></button>
                    </div>
                  </form>
          </div> <!--/.col-md-12-->
        </div> <!--/.box-body-->

      </div> <!--/.box.box-default-->
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/hardware/checkin.blade.php ENDPATH**/ ?>