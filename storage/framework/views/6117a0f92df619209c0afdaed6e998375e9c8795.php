<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/models/table.name'), 'required' => 'true'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.category-select', ['translated_name' => trans('admin/categories/general.category_name'), 'fieldname' => 'category_id', 'required' => 'true', 'category_type' => 'asset'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.manufacturer-select', ['translated_name' => trans('general.manufacturer'), 'fieldname' => 'manufacturer_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.model_number', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.depreciation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.minimum_quantity', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- EOL -->

<div class="form-group <?php echo e($errors->has('eol') ? ' has-error' : ''); ?>">
    <label for="eol" class="col-md-3 control-label"><?php echo e(trans('general.eol')); ?></label>
    <div class="col-md-3 col-sm-4 col-xs-7">
        <div class="input-group">
            <input class="form-control" type="text" name="eol" id="eol" value="<?php echo e(Request::old('eol', isset($item->eol)) ? $item->eol : ''); ?>" />
            <span class="input-group-addon">
                <?php echo e(trans('general.months')); ?>

            </span>
        </div>
    </div>
    <div class="col-md-9 col-md-offset-3">
        <?php echo $errors->first('eol', '<span class="alert-msg" aria-hidden="true"><br><i class="fas fa-times"></i> :message</span>'); ?>

    </div>
</div>

<!-- Custom Fieldset -->
<!-- If $item->id is null we are cloning the model and we need the $model_id variable -->
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('custom-field-set-default-values-for-model',["model_id" => $item->id ?? $model_id ?? null  ])->html();
} elseif ($_instance->childHasBeenRendered('TgNcoeD')) {
    $componentId = $_instance->getRenderedChildComponentId('TgNcoeD');
    $componentTag = $_instance->getRenderedChildComponentTagName('TgNcoeD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TgNcoeD');
} else {
    $response = \Livewire\Livewire::mount('custom-field-set-default-values-for-model',["model_id" => $item->id ?? $model_id ?? null  ]);
    $html = $response->html();
    $_instance->logRenderedChild('TgNcoeD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php echo $__env->make('partials.forms.edit.notes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.requestable', ['requestable_text' => trans('admin/models/general.requestable')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.forms.edit.image-upload', ['image_path' => app('models_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/models/table.create') ,
    'updateText' => trans('admin/models/table.update'),
    'topSubmit' => true,
    'helpPosition' => 'right',
    'helpText' => trans('admin/models/general.about_models_text'),
    'formAction' => (isset($item->id)) ? route('models.update', ['model' => $item->id]) : route('models.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/models/edit.blade.php ENDPATH**/ ?>