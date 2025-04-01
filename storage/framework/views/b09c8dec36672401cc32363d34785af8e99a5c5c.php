<!-- Purchase Date -->
<div class="form-group <?php echo e($errors->has('purchase_date') ? ' has-error' : ''); ?>">
   <label for="purchase_date" class="col-md-3 control-label"><?php echo e(trans('general.purchase_date')); ?></label>
   <div class="input-group col-md-4">
        <div class="input-group date" data-provide="datepicker" data-date-clear-btn="true" data-date-format="yyyy-mm-dd"  data-autoclose="true">
            <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="purchase_date" id="purchase_date" readonly value="<?php echo e(old('purchase_date', ($item->purchase_date) ? $item->purchase_date->format('Y-m-d') : '')); ?>" style="background-color:inherit">
            <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
       </div>
       <?php echo $errors->first('purchase_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

   </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/purchase_date.blade.php ENDPATH**/ ?>