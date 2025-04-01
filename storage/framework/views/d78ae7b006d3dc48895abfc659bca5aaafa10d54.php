<?php $__env->startSection('inputFields'); ?>

<?php echo $__env->make('partials.forms.edit.name', ['translated_name' => trans('admin/categories/general.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Type -->
<div class="form-group <?php echo e($errors->has('category_type') ? ' has-error' : ''); ?>">
    <label for="category_type" class="col-md-3 control-label"><?php echo e(trans('general.type')); ?></label>
    <div class="col-md-7 required">
        <?php echo e(Form::select('category_type', $category_types , old('category_type', $item->category_type), array('class'=>'select2', 'style'=>'min-width:350px', 'aria-label'=>'category_type', ($item->category_type!='') || ($item->itemCount() > 0) ? 'disabled' : ''))); ?>

        <?php echo $errors->first('category_type', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
    <div class="col-md-7 col-md-offset-3">
        <p class="help-block"><?php echo trans('admin/categories/message.update.cannot_change_category_type'); ?> </p>
    </div>
</div>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('category-edit-form', ['defaultEulaText' => $snipeSettings->default_eula_text,'eulaText' => old('eula_text', $item->eula_text),'requireAcceptance' => old('require_acceptance', $item->require_acceptance),'sendCheckInEmail' => old('checkin_email', $item->checkin_email),'useDefaultEula' => old('use_default_eula', $item->use_default_eula)])->html();
} elseif ($_instance->childHasBeenRendered('EHWijRY')) {
    $componentId = $_instance->getRenderedChildComponentId('EHWijRY');
    $componentTag = $_instance->getRenderedChildComponentTagName('EHWijRY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EHWijRY');
} else {
    $response = \Livewire\Livewire::mount('category-edit-form', ['defaultEulaText' => $snipeSettings->default_eula_text,'eulaText' => old('eula_text', $item->eula_text),'requireAcceptance' => old('require_acceptance', $item->require_acceptance),'sendCheckInEmail' => old('checkin_email', $item->checkin_email),'useDefaultEula' => old('use_default_eula', $item->use_default_eula)]);
    $html = $response->html();
    $_instance->logRenderedChild('EHWijRY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php echo $__env->make('partials.forms.edit.image-upload', ['image_path' => app('categories_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('content'); ?>


<?php if($snipeSettings->default_eula_text!=''): ?>
<!-- Modal -->
<div class="modal fade" id="eulaModal" tabindex="-1" role="dialog" aria-labelledby="eulaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="eulaModalLabel"><?php echo e(trans('admin/settings/general.default_eula_text')); ?></h2>
            </div>
            <div class="modal-body">
                <?php echo e(\App\Models\Setting::getDefaultEula()); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('button.cancel')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/categories/general.create') ,
    'updateText' => trans('admin/categories/general.update'),
    'helpPosition'  => 'right',
    'helpText' => trans('help.categories'),
    'topSubmit'  => 'true',
    'formAction' => (isset($item->id)) ? route('categories.update', ['category' => $item->id]) : route('categories.store'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/categories/edit.blade.php ENDPATH**/ ?>