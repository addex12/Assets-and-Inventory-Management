<?php $__env->startSection('inputFields'); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/locations/table.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- parent -->
<?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('admin/locations/table.parent'), 'fieldname' => 'parent_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Manager-->
<?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('admin/users/table.manager'), 'fieldname' => 'manager_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('partials.forms.edit.phone', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.fax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Currency -->
<div class="form-group <?php echo e($errors->has('currency') ? ' has-error' : ''); ?>">
    <label for="currency" class="col-md-3 control-label">
        <?php echo e(trans('admin/locations/table.currency')); ?>

    </label>
    <div class="col-md-9<?php echo e((Helper::checkIfRequired($item, 'currency')) ? ' required' : ''); ?>">
        <?php echo e(Form::text('currency', old('currency', $item->currency), array('class' => 'form-control','placeholder' => 'USD', 'maxlength'=>'3', 'style'=>'width: 60px;', 'aria-label'=>'currency'))); ?>

        <?php echo $errors->first('currency', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

    </div>
</div>

<?php echo $__env->make('partials.forms.edit.address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- LDAP Search OU -->
<?php if($snipeSettings->ldap_enabled == 1): ?>
    <div class="form-group <?php echo e($errors->has('ldap_ou') ? ' has-error' : ''); ?>">
        <label for="ldap_ou" class="col-md-3 control-label">
            <?php echo e(trans('admin/locations/table.ldap_ou')); ?>

        </label>
        <div class="col-md-7<?php echo e((Helper::checkIfRequired($item, 'ldap_ou')) ? ' required' : ''); ?>">
            <?php echo e(Form::text('ldap_ou', old('ldap_ou', $item->ldap_ou), array('class' => 'form-control'))); ?>

            <?php echo $errors->first('ldap_ou', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

        </div>
    </div>
<?php endif; ?>

<?php echo $__env->make('partials.forms.edit.image-upload', ['image_path' => app('locations_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/locations/table.create') ,
    'updateText' => trans('admin/locations/table.update'),
    'topSubmit' => true,
    'helpPosition' => 'right',
    'helpText' => trans('admin/locations/table.about_locations'),
    'formAction' => (isset($item->id)) ? route('locations.update', ['location' => $item->id]) : route('locations.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/locations/edit.blade.php ENDPATH**/ ?>