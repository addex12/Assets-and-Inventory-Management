<div id="userBulkEditToolbar">
    <?php echo e(Form::open([
              'method' => 'POST',
              'route' => ['users/bulkedit'],
              'class' => 'form-inline',
              'id' => 'usersBulkForm'])); ?>


<?php if(request('status')!='deleted'): ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', \App\Models\User::class)): ?>
        <div id="users-toolbar">
            <label for="bulk_actions" class="sr-only"><?php echo e(trans('general.bulk_actions')); ?></label>
            <select name="bulk_actions" class="form-control select2" style="min-width:300px;" aria-label="bulk_actions">
                <option value="edit"><?php echo e(trans('general.bulk_edit')); ?></option>
                <option value="delete"><?php echo trans('general.bulk_checkin_delete'); ?></option>
                <option value="merge"><?php echo trans('general.merge_users'); ?></option>
                <option value="bulkpasswordreset"><?php echo e(trans('button.send_password_link')); ?></option>
            </select>
            <button class="btn btn-primary" id="bulkUserEditButton" disabled><?php echo e(trans('button.go')); ?></button>
        </div>
    <?php endif; ?>
<?php endif; ?>
    <?php echo e(Form::close()); ?>

</div><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/users-bulk-actions.blade.php ENDPATH**/ ?>