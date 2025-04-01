<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/licenses/general.software_licenses')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\License::class)): ?>
    <a href="<?php echo e(route('licenses.create')); ?>" accesskey="n" class="btn btn-primary pull-right">
      <?php echo e(trans('general.create')); ?>

    </a>
    <?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\License::class)): ?>
    <a class="btn btn-default pull-right" href="<?php echo e(route('licenses.export')); ?>" style="margin-right: 5px;"><?php echo e(trans('general.export')); ?></a>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body">

          <table
              data-columns="<?php echo e(\App\Presenters\LicensePresenter::dataTableLayout()); ?>"
              data-cookie-id-table="licensesTable"
              data-pagination="true"
              data-search="true"
              data-side-pagination="server"
              data-show-columns="true"
              data-show-fullscreen="true"
              data-show-export="true"
              data-show-footer="true"
              data-show-refresh="true"
              data-sort-order="asc"
              data-sort-name="name"
              id="licensesTable"
              class="table table-striped snipe-table"
              data-url="<?php echo e(route('api.licenses.index')); ?>"
              data-export-options='{
            "fileName": "export-licenses-<?php echo e(date('Y-m-d')); ?>",
            "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
            }'>
          </table>

      </div><!-- /.box-body -->

      <div class="box-footer clearfix">
      </div>
    </div><!-- /.box -->
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/licenses/index.blade.php ENDPATH**/ ?>