<!-- Warranty -->
<div class="form-group <?php echo e($errors->has('warranty_months') ? ' has-error' : ''); ?>">
    <label for="warranty_months" class="col-md-3 control-label"><?php echo e(trans('admin/hardware/form.warranty')); ?></label>
    <div class="col-md-9">
        <div class="input-group col-md-3" style="padding-left: 0px;">
            <input class="form-control" type="text" name="warranty_months" id="warranty_months" value="<?php echo e(Request::old('warranty_months', $item->warranty_months)); ?>" maxlength="3" />
            <span class="input-group-addon"><?php echo e(trans('admin/hardware/form.months')); ?></span>
        </div>
        <div class="col-md-9" style="padding-left: 0px;">
            <?php echo $errors->first('warranty_months', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

        </div>
    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/warranty.blade.php ENDPATH**/ ?>