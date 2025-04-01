<?php $__env->startSection('title'); ?>
  <?php echo e(trans('general.companies')); ?>

  <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
  <a href="<?php echo e(route('companies.create')); ?>" class="btn btn-primary pull-right">
    <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-md-9">
      <div class="box box-default">
        <div class="box-body">
          <div class="table-responsive">

            <table
              data-columns="<?php echo e(\App\Presenters\CompanyPresenter::dataTableLayout()); ?>"
              data-cookie-id-table="companiesTable"
              data-pagination="true"
              data-id-table="companiesTable"
              data-search="true"
              data-side-pagination="server"
              data-show-columns="true"
              data-show-export="true"
              data-show-refresh="true"
              data-show-fullscreen="true"
              data-sort-order="asc"
              id="companiesTable"
              class="table table-striped snipe-table"
              data-url="<?php echo e(route('api.companies.index')); ?>"
              data-export-options='{
                        "fileName": "export-companies-<?php echo e(date('Y-m-d')); ?>",
                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                        }'>

            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- side address column -->
    <div class="col-md-3">
      <h2><?php echo e(trans('admin/companies/general.about_companies')); ?></h2>
      <p><?php echo e(trans('admin/companies/general.about_companies_description')); ?></p>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/companies/index.blade.php ENDPATH**/ ?>