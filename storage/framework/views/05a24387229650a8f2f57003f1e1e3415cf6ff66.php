<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.depreciation_report')); ?> 
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">


          <?php if(($depreciations) && ($depreciations->count() > 0)): ?>
          <div class="table-responsive">

                  <table
                        data-cookie-id-table="depreciationReport"
                        data-pagination="true"
                        data-id-table="depreciationReport"
                        data-search="true"
                        data-side-pagination="server"
                        data-show-columns="true"
                        data-show-export="true"
                        data-show-refresh="true"
                        data-sort-order="desc"
                        data-sort-name="created_at"
                        data-show-footer="true"
                        id="depreciationReport"
                        data-url="<?php echo e(route('api.depreciation-report.index')); ?>"
                        data-mobile-responsive="true"
                        
                        class="table table-striped snipe-table"
                        data-columns="<?php echo e(\App\Presenters\DepreciationReportPresenter::dataTableLayout()); ?>"
                        data-export-options='{
                          "fileName": "depreciation-report-<?php echo e(date('Y-m-d')); ?>",
                          "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                          }'>

          </table>
        </div> <!-- /.table-responsive-->
              <?php else: ?>
              <div class="col-md-12">
                  <div class="alert alert-warning fade in">
                      <i class="fas fa-exclamation-triangle faa-pulse animated"></i>
                      <?php echo trans('admin/depreciations/general.no_depreciations_warning'); ?>

                  </div>
              </div>
          <?php endif; ?>
      </div> <!-- /.box-body-->
    </div> <!--/box.box-default-->
  </div> <!-- /.col-md-12-->
</div> <!--/.row-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/reports/depreciation.blade.php ENDPATH**/ ?>