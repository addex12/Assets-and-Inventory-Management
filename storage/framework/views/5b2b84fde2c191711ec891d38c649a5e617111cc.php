<div class="form-group" id="assignto_selector"<?php echo (isset($style)) ? ' style="'.e($style).'"' : ''; ?>>
    <?php echo e(Form::label('checkout_to_type', trans('admin/hardware/form.checkout_to'), array('class' => 'col-md-3 control-label'))); ?>

    <div class="col-md-8">
        <div class="btn-group" data-toggle="buttons">
            <?php if((isset($user_select)) && ($user_select!='false')): ?>
            <label class="btn btn-default active">
                <input name="checkout_to_type" value="user" aria-label="checkout_to_type" type="radio" checked="checked"><i class="fas fa-user" aria-hidden="true"></i> <?php echo e(trans('general.user')); ?>

            </label>
            <?php endif; ?>
            <?php if((isset($asset_select)) && ($asset_select!='false')): ?>
            <label class="btn btn-default">
                <input name="checkout_to_type" value="asset" aria-label="checkout_to_type" type="radio"><i class="fas fa-barcode" aria-hidden="true"></i> <?php echo e(trans('general.asset')); ?>

            </label>
            <?php endif; ?>
            <?php if((isset($location_select)) && ($location_select!='false')): ?>
            <label class="btn btn-default">
                <input name="checkout_to_type" value="location" aria-label="checkout_to_type" class="active" type="radio"><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo e(trans('general.location')); ?>

            </label>
            <?php endif; ?>

            <?php echo $errors->first('checkout_to_type', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/checkout-selector.blade.php ENDPATH**/ ?>