<div class="form-group <?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
    <label for="address" class="col-md-3 control-label"><?php echo e(trans('general.address')); ?></label>
    <div class="col-md-7">
        <input class="form-control" aria-label="address" maxlength="191" name="address" type="text" id="address" value="<?php echo e(old('address', $item->address)); ?>">
        <?php echo $errors->first('address', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('address2') ? ' has-error' : ''); ?>">
    <label class="sr-only " for="address2"><?php echo e(trans('general.address')); ?></label>
    <div class="col-md-7 col-md-offset-3">
        <input class="form-control" aria-label="address2" maxlength="191" name="address2" type="text" value="<?php echo e(old('address2', $item->address2)); ?>">
        <?php echo $errors->first('address2', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
    <label for="city" class="col-md-3 control-label"><?php echo e(trans('general.city')); ?></label>
    <div class="col-md-7">
        <input class="form-control" aria-label="city" maxlength="191" name="city" type="text" id="city" value="<?php echo e(old('city', $item->city)); ?>">
        <?php echo $errors->first('city', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
    <label for="state" class="col-md-3 control-label"><?php echo e(trans('general.state')); ?></label>
    <div class="col-md-7">
        <input class="form-control" aria-label="state" maxlength="191" name="state" type="text" id="state" value="<?php echo e(old('state', $item->state)); ?>">
        <?php echo $errors->first('state', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>


    </div>
</div>

<div class="form-group <?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
    <label for="country" class="col-md-3 control-label"><?php echo e(trans('general.country')); ?></label>
    <div class="col-md-7">
    <?php echo Form::countries('country', old('country', $item->country), 'select2'); ?>

        <p class="help-block"><?php echo e(trans('general.countries_manually_entered_help')); ?></p>
        <?php echo $errors->first('country', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
    <label for="zip" class="col-md-3 control-label" maxlength="10"><?php echo e(trans('general.zip')); ?></label>
    <div class="col-md-7">
        <input class="form-control" name="zip" type="text" id="zip" value="<?php echo e(old('zip', $item->zip)); ?>">
        <?php echo $errors->first('zip', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/address.blade.php ENDPATH**/ ?>