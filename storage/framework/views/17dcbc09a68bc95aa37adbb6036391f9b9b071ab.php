

<?php $__env->startSection('content'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('content'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inputFields'); ?>
<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('general.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/custom_fields/general.create_fieldset') ,
    'updateText' => trans('admin/custom_fields/general.update_fieldset'),
    'helpText' => trans('admin/custom_fields/general.about_fieldsets_text'),
    'helpPosition' => 'right',
    'formAction' => (isset($item->id)) ? route('fieldsets.update', ['fieldset' => $item->id]) : route('fieldsets.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/custom_fields/fieldsets/edit.blade.php ENDPATH**/ ?>