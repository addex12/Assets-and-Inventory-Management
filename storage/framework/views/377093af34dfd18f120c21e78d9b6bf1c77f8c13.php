<?php $__env->startSection('title'); ?>

  <?php if(Request::get('status')=='deleted'): ?>
    <?php echo e(trans('admin/models/general.view_deleted')); ?>

    <?php echo e(trans('admin/models/table.title')); ?>

    <?php else: ?>
    <?php echo e(trans('admin/models/general.view_models')); ?>

  <?php endif; ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\AssetModel::class)): ?>
    <a href="<?php echo e(route('models.create')); ?>" class="btn btn-primary pull-right"> <?php echo e(trans('general.create')); ?></a>
  <?php endif; ?>

  <?php if(Request::get('status')=='deleted'): ?>
    <a class="btn btn-default pull-right" href="<?php echo e(route('models.index')); ?>" style="margin-right: 5px;"><?php echo e(trans('admin/models/general.view_models')); ?></a>
  <?php else: ?>
    <a class="btn btn-default pull-right" href="<?php echo e(route('models.index', ['status' => 'deleted'])); ?>" style="margin-right: 5px;"><?php echo e(trans('admin/models/general.view_deleted')); ?></a>
  <?php endif; ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">

        <?php echo $__env->make('partials.models-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <div class="table-responsive">
                <table
                        data-columns="<?php echo e(\App\Presenters\AssetModelPresenter::dataTableLayout()); ?>"
                        data-cookie-id-table="asssetModelsTable"
                        data-pagination="true"
                        data-id-table="asssetModelsTable"
                        data-search="true"
                        data-show-footer="true"
                        data-side-pagination="server"
                        data-show-columns="true"
                        data-toolbar="#modelsBulkEditToolbar"
                        data-bulk-button-id="#bulkModelsEditButton"
                        data-bulk-form-id="#modelsBulkForm"
                        data-show-export="true"
                        data-show-refresh="true"
                        data-sort-order="asc"
                        id="asssetModelsTable"
                        class="table table-striped snipe-table"
                        data-url="<?php echo e(route('api.models.index', ['status' => request('status')])); ?>"
                        data-export-options='{
              "fileName": "export-models-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
              </table>

          </div>
        </div>
        </div>
        <?php echo e(Form::close()); ?>

      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'models-export', 'search' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/models/index.blade.php ENDPATH**/ ?>