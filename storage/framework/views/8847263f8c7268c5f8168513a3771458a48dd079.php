<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', \App\Models\Location::class)): ?>
    <div id="locationsBulkEditToolbar">
    <?php echo e(Form::open([
              'method' => 'POST',
              'route' => ['locations.bulkdelete.show'],
              'class' => 'form-inline',
              'id' => 'locationsBulkForm'])); ?>


            <div id="locations-toolbar">
                <label for="bulk_actions" class="sr-only"><?php echo e(trans('general.bulk_actions')); ?></label>
                <select name="bulk_actions" class="form-control select2" style="width: 200px;" aria-label="bulk_actions">
                    <option value="delete"><?php echo e(trans('general.bulk_delete')); ?></option>
                </select>
                <button class="btn btn-primary" id="bulkLocationsEditButton" disabled><?php echo e(trans('button.go')); ?></button>
            </div>

    <?php echo e(Form::close()); ?>

    </div>
<?php endif; ?>

<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/locations-bulk-actions.blade.php ENDPATH**/ ?>