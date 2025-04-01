<!-- begin redirect submit options -->
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'filepath',
    'object',
    'showfile_routename',
    'deletefile_routename',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'filepath',
    'object',
    'showfile_routename',
    'deletefile_routename',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<!-- begin non-ajaxed file listing table -->
<div class="table-responsive">
    <table
            data-cookie-id-table="<?php echo e(str_slug($object->name)); ?>UploadsTable"
            data-id-table="<?php echo e(str_slug($object->name)); ?>UploadsTable"
            id="<?php echo e(str_slug($object->name)); ?>}UploadsTable"
            data-search="true"
            data-pagination="true"
            data-side-pagination="client"
            data-show-columns="true"
            data-show-fullscreen="true"
            data-show-export="true"
            data-show-footer="true"
            data-toolbar="#upload-toolbar"
            data-show-refresh="true"
            data-sort-order="asc"
            data-sort-name="name"
            class="table table-striped snipe-table"
            data-export-options='{
                    "fileName": "export-license-uploads-<?php echo e(str_slug($object->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","delete","download","icon"]
                    }'>

        <thead>
        <tr>
            <th data-visible="false" data-field="id" data-sortable="true">
                <?php echo e(trans('general.id')); ?>

            </th>
            <th data-visible="true" data-field="type" data-sortable="true">
                <?php echo e(trans('general.file_type')); ?>

            </th>
            <th class="col-md-2" data-searchable="true" data-visible="true" data-field="image">
                <?php echo e(trans('general.image')); ?>

            </th>
            <th class="col-md-2" data-searchable="true" data-visible="true" data-field="filename" data-sortable="true">
                <?php echo e(trans('general.file_name')); ?>

            </th>
            <th class="col-md-1" data-searchable="true" data-visible="true" data-field="filesize">
                <?php echo e(trans('general.filesize')); ?>

            </th>
            <th class="col-md-2" data-searchable="true" data-visible="true" data-field="notes" data-sortable="true">
                <?php echo e(trans('general.notes')); ?>

            </th>
            <th class="col-md-1" data-searchable="true" data-visible="true" data-field="download">
                <?php echo e(trans('general.download')); ?>

            </th>
            <th class="col-md-2" data-searchable="true" data-visible="true" data-field="created_at" data-sortable="true">
                <?php echo e(trans('general.created_at')); ?>

            </th>
            <th class="col-md-2" data-searchable="true" data-visible="true" data-field="created_by" data-sortable="true">
                <?php echo e(trans('general.created_by')); ?>

            </th>
            <th class="col-md-1" data-searchable="true" data-visible="true" data-field="actions">
                <?php echo e(trans('table.actions')); ?>

            </th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $object->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($file->id); ?>

                </td>
                <td data-sort-value="<?php echo e(pathinfo($filepath.$file->filename, PATHINFO_EXTENSION)); ?>">
                    <?php if(Storage::exists($filepath.$file->filename)): ?>
                        <span class="sr-only"><?php echo e(pathinfo($filepath.$file->filename, PATHINFO_EXTENSION)); ?></span>
                        <i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true" data-tooltip="true" data-title="<?php echo e(pathinfo($filepath.$file->filename, PATHINFO_EXTENSION)); ?>"></i>
                    <?php endif; ?>
                </td>
                <td>

                    <?php if(($file->filename) && (Storage::exists($filepath.$file->filename))): ?>
                        <?php if(Helper::checkUploadIsImage($file->get_src(str_plural(strtolower(class_basename(get_class($object))))))): ?>
                            <a href="<?php echo e(route($showfile_routename, [$object->id, $file->id, 'inline' => 'true'])); ?>" data-toggle="lightbox" data-type="image">
                                <img src="<?php echo e(route($showfile_routename, [$object->id, $file->id, 'inline' => 'true'])); ?>" class="img-thumbnail" style="max-width: 50px;">
                            </a>
                        <?php else: ?>
                            <?php echo e(trans('general.preview_not_available')); ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'x','class' => 'text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'x','class' => 'text-danger']); ?>
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
                        <?php echo e(trans('general.file_not_found')); ?>

                    <?php endif; ?>

                </td>
                <td>
                    <?php echo e($file->filename); ?>

                </td>
                <td data-value="<?php echo e((Storage::exists($filepath.$file->filename)) ? Storage::size($filepath.$file->filename) : ''); ?>">
                    <?php echo e((Storage::exists($filepath.$file->filename)) ? Helper::formatFilesizeUnits(Storage::size($filepath.$file->filename)) : ''); ?>

                </td>

                <td>
                    <?php if($file->note): ?>
                        <?php echo e($file->note); ?>

                    <?php endif; ?>
                </td>
                <td style="white-space: nowrap;">
                    <?php if($file->filename): ?>
                        <?php if(Storage::exists($filepath.$file->filename)): ?>
                            <a href="<?php echo e(route($showfile_routename, [$object->id, $file->id])); ?>" class="btn btn-sm btn-default">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'download']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'download']); ?>
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
                                <span class="sr-only">
                                    <?php echo e(trans('general.download')); ?>

                                </span>
                            </a>

                            <a href="<?php echo e(StorageHelper::allowSafeInline($filepath.$file->filename) ? route($showfile_routename, [$object->id, $file->id, 'inline' => 'true']) : '#'); ?>" class="btn btn-sm btn-default<?php echo e(StorageHelper::allowSafeInline($filepath.$file->filename) ? '' : ' disabled'); ?>" target="_blank">
                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'external-link']); ?>
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
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo e($file->created_at); ?>

                </td>
                <td>
                    <?php echo e(($file->adminuser) ? $file->adminuser->present()->getFullNameAttribute() : ''); ?>

                </td>
                <td>
                    <a class="btn delete-asset btn-danger btn-sm hidden-print" href="<?php echo e(route($deletefile_routename, [$object->id, $file->id])); ?>" data-content="Are you sure you wish to delete this file?" data-title="<?php echo e(trans('general.delete')); ?> <?php echo e($file->filename); ?>?">
                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'delete']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'delete']); ?>
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
                        <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                    </a>
                </td>


            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</div>
<!-- end non-ajaxed file listing table --><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/app/Providers/../../resources/views/blade/filestable.blade.php ENDPATH**/ ?>