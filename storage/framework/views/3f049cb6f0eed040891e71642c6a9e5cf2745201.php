<?php $__env->startSection('inputFields'); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/licenses/form.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.category-select', ['translated_name' => trans('admin/categories/general.category_name'), 'fieldname' => 'category_id', 'required' => 'true', 'category_type' => 'license'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- Serial-->
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $item)): ?>
<div class="form-group <?php echo e($errors->has('serial') ? ' has-error' : ''); ?>">
    <label for="serial" class="col-md-3 control-label"><?php echo e(trans('admin/licenses/form.license_key')); ?></label>
    <div class="col-md-7<?php echo e((Helper::checkIfRequired($item, 'serial')) ? ' required' : ''); ?>">
        <textarea class="form-control" type="text" name="serial" id="serial"><?php echo e(old('serial', $item->serial)); ?></textarea>
        <?php echo $errors->first('serial', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<?php endif; ?>


<!-- Seats -->
<div class="form-group <?php echo e($errors->has('seats') ? ' has-error' : ''); ?>">
    <label for="seats" class="col-md-3 control-label"><?php echo e(trans('admin/licenses/form.seats')); ?></label>
    <div class="col-md-7 col-sm-12 required">
        <div class="col-md-2" style="padding-left:0px">
            <input class="form-control" type="text" name="seats" id="seats" value="<?php echo e(Request::old('seats', $item->seats)); ?>" />
        </div>
    </div>
    <?php echo $errors->first('seats', '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>

</div>
<?php echo $__env->make('partials.forms.edit.minimum_quantity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.company'), 'fieldname' => 'company_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.manufacturer-select', ['translated_name' => trans('general.manufacturer'), 'fieldname' => 'manufacturer_id',], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Licensed to name -->
<div class="form-group <?php echo e($errors->has('license_name') ? ' has-error' : ''); ?>">
    <label for="license_name" class="col-md-3 control-label"><?php echo e(trans('admin/licenses/form.to_name')); ?></label>
    <div class="col-md-7">
        <input class="form-control" type="text" name="license_name" id="license_name" value="<?php echo e(old('license_name', $item->license_name)); ?>" />
        <?php echo $errors->first('license_name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<!-- Licensed to email -->
<div class="form-group <?php echo e($errors->has('license_email') ? ' has-error' : ''); ?>">
    <label for="license_email" class="col-md-3 control-label"><?php echo e(trans('admin/licenses/form.to_email')); ?></label>
    <div class="col-md-7">
        <input class="form-control" type="text" name="license_email" id="license_email" value="<?php echo e(old('license_email', $item->license_email)); ?>" />
        <?php echo $errors->first('license_email', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<!-- Reassignable -->
<div class="form-group <?php echo e($errors->has('reassignable') ? ' has-error' : ''); ?>">
    <div class="col-md-3 control-label">
        <strong><?php echo e(trans('admin/licenses/form.reassignable')); ?></strong>
    </div>
    <div class="col-md-7">
        <label class="form-control">
        <?php echo e(Form::Checkbox('reassignable', '1', old('reassignable', $item->id ? $item->reassignable : '1'),array('aria-label'=>'reassignable'))); ?>

        <?php echo e(trans('general.yes')); ?>

        </label>
    </div>
</div>


<?php echo $__env->make('partials.forms.edit.supplier-select', ['translated_name' => trans('general.supplier'), 'fieldname' => 'supplier_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.order_number', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_cost', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.purchase_date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Expiration Date -->
<div class="form-group <?php echo e($errors->has('expiration_date') ? ' has-error' : ''); ?>">
    <label for="expiration_date" class="col-md-3 control-label"><?php echo e(trans('admin/licenses/form.expiration')); ?></label>

    <div class="input-group col-md-4">
        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd"  data-autoclose="true" data-date-clear-btn="true">
            <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="expiration_date" id="expiration_date" value="<?php echo e(old('expiration_date', ($item->expiration_date) ? $item->expiration_date->format('Y-m-d') : '')); ?>" maxlength="10">
            <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
        </div>
        <?php echo $errors->first('expiration_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>

</div>

<!-- Termination Date -->
<div class="form-group <?php echo e($errors->has('termination_date') ? ' has-error' : ''); ?>">
    <label for="termination_date" class="col-md-3 control-label"><?php echo e(trans('admin/licenses/form.termination_date')); ?></label>

    <div class="input-group col-md-4">
        <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-autoclose="true" data-date-clear-btn="true">
            <input type="text" class="form-control" placeholder="<?php echo e(trans('general.select_date')); ?>" name="termination_date" id="termination_date" value="<?php echo e(old('termination_date', ($item->termination_date) ? $item->termination_date->format('Y-m-d') : '')); ?>" maxlength="10">
            <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
        </div>
        <?php echo $errors->first('termination_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>


<!-- Purchase Order -->
<div class="form-group <?php echo e($errors->has('purchase_order') ? ' has-error' : ''); ?>">
    <label for="purchase_order" class="col-md-3 control-label"><?php echo e(trans('admin/licenses/form.purchase_order')); ?></label>
    <div class="col-md-3">
        <input class="form-control" type="text" name="purchase_order" id="purchase_order" value="<?php echo e(old('purchase_order', $item->purchase_order)); ?>" />
        <?php echo $errors->first('purchase_order', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<?php echo $__env->make('partials.forms.edit.depreciation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Maintained -->
<div class="form-group <?php echo e($errors->has('maintained') ? ' has-error' : ''); ?>">
    <div class="col-md-3 control-label"><strong><?php echo e(trans('admin/licenses/form.maintained')); ?></strong></div>
    <div class="col-md-7">
        <label class="form-control">
        <?php echo e(Form::Checkbox('maintained', '1', old('maintained', $item->maintained),array('aria-label'=>'maintained'))); ?>

        <?php echo e(trans('general.yes')); ?>

        </label>
    </div>
</div>

<?php echo $__env->make('partials.forms.edit.notes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/licenses/form.create'),
    'updateText' => trans('admin/licenses/form.update'),
    'topSubmit' => true,
    'formAction' => ($item->id) ? route('licenses.update', ['license' => $item->id]) : route('licenses.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/licenses/edit.blade.php ENDPATH**/ ?>