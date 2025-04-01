<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/suppliers/table.suppliers')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<?php $__env->startSection('header_right'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Supplier::class)): ?>
    <a href="<?php echo e(route('suppliers.create')); ?>" class="btn btn-primary pull-right"> <?php echo e(trans('general.create')); ?></a>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
      <div class="table-responsive">

        <table
            data-cookie-id-table="suppliersTable"
            data-pagination="true"
            data-id-table="suppliersTable"
            data-search="true"
            data-side-pagination="server"
            data-show-columns="true"
            data-show-fullscreen="true"
            data-show-export="true"
            data-show-refresh="true"
            data-sort-order="asc"
            id="suppliersTable"
            class="table table-striped snipe-table"
            data-url="<?php echo e(route('api.suppliers.index')); ?>"
            data-export-options='{
            "fileName": "export-suppliers-<?php echo e(date('Y-m-d')); ?>",
            "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
            }'>
        <thead>
          <tr>
            <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('admin/suppliers/table.id')); ?></th>
            <th data-formatter="imageFormatter" data-sortable="true" data-field="image" data-visible="false"  data-searchable="false"><?php echo e(trans('general.image')); ?></th>
            <th data-sortable="true" data-field="name" data-formatter="suppliersLinkFormatter"><?php echo e(trans('admin/suppliers/table.name')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="fax" data-visible="true"><?php echo e(trans('admin/suppliers/table.fax')); ?></th>         
            <th data-sortable="true" data-field="address"><?php echo e(trans('admin/suppliers/table.address')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="contact"><?php echo e(trans('admin/suppliers/table.contact')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="email" data-formatter="emailFormatter"><?php echo e(trans('admin/suppliers/table.email')); ?></th>
            <th data-searchable="true" data-sortable="true" data-field="phone" data-formatter="phoneFormatter"><?php echo e(trans('admin/suppliers/table.phone')); ?></th>
        <th data-sortable="true" data-field="url" data-visible="false" data-formatter="externalLinkFormatter"><?php echo e(trans('general.url')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="assets_count"><?php echo e(trans('admin/suppliers/table.assets')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="accessories_count"><?php echo e(trans('general.accessories')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="licenses_count"><?php echo e(trans('admin/suppliers/table.licenses')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="components_count"><?php echo e(trans('general.components')); ?></th>
            <th data-searchable="false" data-sortable="true" data-field="consumables_count"><?php echo e(trans('general.consumables')); ?></th>
            <th data-switchable="false" data-formatter="suppliersActionsFormatter" data-searchable="false" data-sortable="false" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
          </tr>
        </thead>
      </table>
      </div>
    </div>
  </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'suppliers-export', 'search' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/suppliers/index.blade.php ENDPATH**/ ?>