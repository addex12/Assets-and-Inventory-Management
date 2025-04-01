<!-- Item Number -->
<div class="form-group <?php echo e($errors->has('item_no') ? ' has-error' : ''); ?>">
   <label for="item_no" class="col-md-3 control-label"><?php echo e(trans('admin/consumables/general.item_no')); ?></label>
   <div class="col-md-7 col-sm-12<?php echo e((Helper::checkIfRequired($item, 'item_no')) ? ' required' : ''); ?>">
       <input class="form-control" type="text" name="item_no" id="item_no" value="<?php echo e(old('item_no', $item->item_no)); ?>" />
       <?php echo $errors->first('item_no', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

   </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/item_number.blade.php ENDPATH**/ ?>