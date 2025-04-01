<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.asset_maintenance_report')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">

        <div class="table-responsive">

            <table
                    data-cookie-id-table="maintenancesReport"
                    data-pagination="true"
                    data-show-footer="true"
                    data-id-table="maintenancesReport"
                    data-search="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-export="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    id="maintenancesReport"
                    data-url="<?php echo e(route('api.maintenances.index')); ?>"
                    class="table table-striped snipe-table"
                    data-export-options='{
                        "fileName": "maintenance-report-<?php echo e(date('Y-m-d')); ?>",
                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                        }'>
                <thead>
                <tr>
                    <th data-field="company" data-sortable="false" data-visible="false" data-formatter="companiesLinkObjFormatter"><?php echo e(trans('admin/companies/table.title')); ?></th>
                    <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
                    <th data-sortable="true" data-field="asset_tag" data-formatter="assetTagLinkFormatter" data-visible="false"><?php echo e(trans('general.asset_tag')); ?></th>
                    <th data-sortable="false" data-field="asset_name" data-formatter="assetNameLinkFormatter"><?php echo e(trans('admin/asset_maintenances/table.asset_name')); ?></th>
                    <th data-sortable="false" data-field="supplier" data-formatter="suppliersLinkObjFormatter"><?php echo e(trans('general.supplier')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="asset_maintenance_type"><?php echo e(trans('admin/asset_maintenances/form.asset_maintenance_type')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="title"><?php echo e(trans('admin/asset_maintenances/form.title')); ?></th>
                    <th data-searchable="true" data-sortable="false" data-field="start_date" data-formatter="dateDisplayFormatter"><?php echo e(trans('admin/asset_maintenances/form.start_date')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="completion_date" data-formatter="dateDisplayFormatter"><?php echo e(trans('admin/asset_maintenances/form.completion_date')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="asset_maintenance_time"><?php echo e(trans('admin/asset_maintenances/form.asset_maintenance_time')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="cost" class="text-right" data-footer-formatter="sumFormatter"><?php echo e(trans('admin/asset_maintenances/form.cost')); ?></th>
                    <th data-sortable="true" data-field="location" data-formatter="deployedLocationFormatter" data-visible="false"><?php echo e(trans('general.location')); ?></th>
                    <th data-sortable="true" data-field="rtd_location" data-formatter="deployedLocationFormatter" data-visible="false"><?php echo e(trans('admin/hardware/form.default_location')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="is_warranty" data-formatter="trueFalseFormatter"><?php echo e(trans('admin/asset_maintenances/table.is_warranty')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="user_id" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                    <th data-searchable="true" data-sortable="true" data-field="notes" data-visible="false"><?php echo e(trans('admin/asset_maintenances/form.notes')); ?></th>
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
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/reports/asset_maintenances.blade.php ENDPATH**/ ?>