<div id="modelsBulkEditToolbar">
    <?php echo e(Form::open([
              'method' => 'POST',
              'route' => ['models.bulkedit.index'],
              'class' => 'form-inline',
              'id' => 'modelsBulkForm'])); ?>


    <?php if(request('status')!='deleted'): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', \App\Models\AssetModel::class)): ?>
            <div id="models-toolbar">
                <label for="bulk_actions" class="sr-only"><?php echo e(trans('general.bulk_actions')); ?></label>
                <select name="bulk_actions" class="form-control select2" style="width: 200px;" aria-label="bulk_actions">
                    <option value="edit"><?php echo e(trans('general.bulk_edit')); ?></option>
                    <option value="delete"><?php echo e(trans('general.bulk_delete')); ?></option>
                </select>
                <button class="btn btn-primary" id="bulkModelsEditButton" disabled><?php echo e(trans('button.go')); ?></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php echo e(Form::close()); ?>

</div>


<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/models-bulk-actions.blade.php ENDPATH**/ ?>