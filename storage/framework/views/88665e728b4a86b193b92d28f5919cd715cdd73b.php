<div class="form-group <?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('address', trans('general.address'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
        <?php echo e(Form::text('address', old('address', $item->address), array('class' => 'form-control', 'aria-label'=>'address', 'maxlength'=>'191'))); ?>

        <?php echo $errors->first('address', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('address2') ? ' has-error' : ''); ?>">
    <label class="sr-only " for="address2"><?php echo e(trans('general.address')); ?></label>
    <div class="col-md-7 col-md-offset-3">
        <?php echo e(Form::text('address2', old('address2', $item->address2), array('class' => 'form-control', 'aria-label'=>'address2', 'maxlength'=>'191'))); ?>

        <?php echo $errors->first('address2', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('city', trans('general.city'), array('class' => 'col-md-3 control-label', 'maxlength'=>'191'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('city', old('city', $item->city), array('class' => 'form-control', 'aria-label'=>'city'))); ?>

        <?php echo $errors->first('city', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('state', trans('general.state'), array('class' => 'col-md-3 control-label', 'maxlength'=>'191'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('state', old('state', $item->state), array('class' => 'form-control', 'aria-label'=>'state'))); ?>

        <?php echo $errors->first('state', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>


    </div>
</div>

<div class="form-group <?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('country', trans('general.country'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-7">
    <?php echo Form::countries('country', old('country', $item->country), 'select2'); ?>

        <?php echo $errors->first('country', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
    <?php echo e(Form::label('zip', trans('general.zip'), array('class' => 'col-md-3 control-label', 'maxlength'=>'10'))); ?>

    <div class="col-md-7">
    <?php echo e(Form::text('zip', old('zip', $item->zip), array('class' => 'form-control'))); ?>

        <?php echo $errors->first('zip', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/address.blade.php ENDPATH**/ ?>