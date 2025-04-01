<?php $__env->startSection('title'); ?>
  <?php echo e(trans('admin/asset_maintenances/general.asset_maintenances')); ?>

  <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header_right'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
    <a href="<?php echo e(route('maintenances.create')); ?>" class="btn btn-primary pull-right"> <?php echo e(trans('general.create')); ?></a>
  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">

          <table
              data-columns="<?php echo e(\App\Presenters\AssetMaintenancesPresenter::dataTableLayout()); ?>"
              data-cookie-id-table="maintenancesTable"
              data-pagination="true"
              data-search="true"
              data-side-pagination="server"
              data-show-columns="true"
              data-show-fullscreen="true"
              data-show-footer="true"
              data-show-export="true"
              data-show-refresh="true"
              id="maintenancesTable"
              class="table table-striped snipe-table"
              data-url="<?php echo e(route('api.maintenances.index')); ?>"
              data-export-options='{
                "fileName": "export-maintenances-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>

        </table>

      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'maintenances-export', 'search' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script nonce="<?php echo e(csrf_token()); ?>">
    function maintenanceActions(value, row) {
        var actions = '<nobr>';
        if ((row) && (row.available_actions.update === true)) {
            actions += '<a href="<?php echo e(config('app.url')); ?>/hardware/maintenances/' + row.id + '/edit" class="btn btn-sm btn-warning" data-tooltip="true" title="Update"><i class="fas fa-pencil-alt"></i></a>&nbsp;';
        }
        actions += '</nobr>'
        if ((row) && (row.available_actions.delete === true)) {
            actions += '<a href="<?php echo e(config('app.url')); ?>/hardware/maintenances/' + row.id + '" '
                + ' class="btn btn-danger btn-sm delete-asset"  data-tooltip="true"  '
                + ' data-toggle="modal" '
                + ' data-content="<?php echo e(trans('general.sure_to_delete')); ?> ' + row.name + '?" '
                + ' data-title="<?php echo e(trans('general.delete')); ?>" onClick="return false;">'
                + '<i class="fas fa-trash"></i></a></nobr>';
        }

        return actions;
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/asset_maintenances/index.blade.php ENDPATH**/ ?>