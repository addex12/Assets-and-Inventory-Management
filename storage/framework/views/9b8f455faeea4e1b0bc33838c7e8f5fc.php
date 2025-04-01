<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.locations')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Location::class)): ?>
      <a href="<?php echo e(route('locations.create')); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.create')); ?></a>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
          <?php echo $__env->make('partials.locations-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <table
                  data-columns="<?php echo e(\App\Presenters\LocationPresenter::dataTableLayout()); ?>"
                  data-cookie-id-table="locationTable"
                  data-click-to-select="true"
                  data-pagination="true"
                  data-id-table="locationTable"
                  data-toolbar="#locationsBulkEditToolbar"
                  data-bulk-button-id="#bulkLocationsEditButton"
                  data-bulk-form-id="#locationsBulkForm"
                  data-search="true"
                  data-side-pagination="server"
                  data-show-columns="true"
                  data-show-fullscreen="true"
                  data-show-export="true"
                  data-show-refresh="true"
                  data-sort-order="asc"
                  id="locationTable"
                  class="table table-striped snipe-table"
                  data-url="<?php echo e(route('api.locations.index')); ?>"
                  data-export-options='{
              "fileName": "export-locations-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
          </table>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'locations-export', 'search' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/locations/index.blade.php ENDPATH**/ ?>