<!-- Name -->
<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <label for="name" class="col-md-3 control-label"><?php echo e($translated_name); ?></label>
    <div class="col-md-7 col-sm-12<?php echo e((Helper::checkIfRequired($item, 'name')) ? ' required' : ''); ?>">
        <input class="form-control" type="text" name="name" aria-label="name" id="name" value="<?php echo e(old('name', $item->name)); ?>"<?php echo (Helper::checkIfRequired($item, 'name')) ? ' data-validation="required" required' : ''; ?> />
        <?php echo $errors->first('name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/name.blade.php ENDPATH**/ ?>