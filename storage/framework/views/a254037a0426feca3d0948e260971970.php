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
    <div class="col-md-7">
        <input class="form-control" style="width:100px" type="text" name="currency" aria-label="currency" id="currency" value="<?php echo e(old('currency', $item->currency)); ?>"<?php echo (Helper::checkIfRequired($item, 'currency')) ? ' required' : ''; ?> maxlength="3" />
        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="alert-msg">
            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
            <?php echo e($message); ?>

        </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    </div>
</div>

<?php echo $__env->make('partials.forms.edit.address', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- LDAP Search OU -->
<?php if($snipeSettings->ldap_enabled == 1): ?>
    <div class="form-group <?php echo e($errors->has('ldap_ou') ? ' has-error' : ''); ?>">
        <label for="ldap_ou" class="col-md-3 control-label">
            <?php echo e(trans('admin/locations/table.ldap_ou')); ?>

        </label>
        <div class="col-md-7">
            <input class="form-control" type="text" name="ldap_ou" aria-label="ldap_ou" id="ldap_ou" value="<?php echo e(old('ldap_ou', $item->ldap_ou)); ?>"<?php echo (Helper::checkIfRequired($item, 'ldap_ou')) ? ' required' : ''; ?> maxlength="191" />
            <?php $__errorArgs = ['ldap_ou'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="alert-msg">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <?php echo e($message); ?>

        </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
<?php endif; ?>


<?php echo $__env->make('partials.forms.edit.image-upload', ['image_path' => app('locations_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="form-group<?php echo $errors->has('notes') ? ' has-error' : ''; ?>">
    <label for="notes" class="col-md-3 control-label"><?php echo e(trans('general.notes')); ?></label>
    <div class="col-md-8">
        <?php if (isset($component)) { $__componentOriginal9ff136736d107222a7c2416559088828 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ff136736d107222a7c2416559088828 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::input.textarea','data' => ['name' => 'notes','id' => 'notes','value' => old('notes', $item->notes),'placeholder' => ''.e(trans('general.placeholders.notes')).'','ariaLabel' => 'notes','rows' => '5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'notes','id' => 'notes','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('notes', $item->notes)),'placeholder' => ''.e(trans('general.placeholders.notes')).'','aria-label' => 'notes','rows' => '5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $attributes = $__attributesOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__attributesOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ff136736d107222a7c2416559088828)): ?>
<?php $component = $__componentOriginal9ff136736d107222a7c2416559088828; ?>
<?php unset($__componentOriginal9ff136736d107222a7c2416559088828); ?>
<?php endif; ?>
        <?php echo $errors->first('notes', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/locations/table.create') ,
    'updateText' => trans('admin/locations/table.update'),
    'topSubmit' => true,
    'helpPosition' => 'right',
    'helpText' => trans('admin/locations/table.about_locations'),
    'formAction' => (isset($item->id)) ? route('locations.update', ['location' => $item->id]) : route('locations.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/locations/edit.blade.php ENDPATH**/ ?>