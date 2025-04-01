<?php $__env->startSection('title'); ?>
  <?php echo e(trans('general.kits')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('kits.create')); ?>" class="btn btn-primary text-right"><?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">
            <table
                data-cookie-id-table="kitsTable"
                data-columns="<?php echo e(\App\Presenters\PredefinedKitPresenter::dataTableLayout()); ?>"
                data-pagination="true"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-fullscreen="true"
                data-show-export="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="name"
                id="kitsTable"
                class="table table-striped snipe-table"
                data-url="<?php echo e(route('api.kits.index')); ?>"
                data-export-options='{
        "fileName": "export-kits-<?php echo e(date('Y-m-d')); ?>",
            "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
            }'>
          </table>
        </div>
      </div> <!--.box-body-->
    </div> <!-- /.box.box-default-->
  </div> <!-- .col-md-12-->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'kits-export', 'search' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', [
    'helpTitle' => trans('admin/kits/general.about_kits_title'),
    'helpText' => trans('admin/kits/general.about_kits_text')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/kits/index.blade.php ENDPATH**/ ?>