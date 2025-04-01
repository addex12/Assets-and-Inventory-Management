<?php
?>



<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.unaccepted_asset_report')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>

    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group mr-2" role="group">
            <?php if($showDeleted): ?>
                <a href="<?php echo e(route('reports/unaccepted_assets')); ?>" class="btn btn-default" ><i class="fa fa-trash icon-white" aria-hidden="true"></i> <?php echo e(trans('general.hide_deleted')); ?></a>
            <?php else: ?>
                <a href="<?php echo e(route('reports/unaccepted_assets', ['deleted' => 'deleted'])); ?>" class="btn btn-default" ><i class="fa fa-trash icon-white" aria-hidden="true"></i> <?php echo e(trans('general.show_deleted')); ?></a>
            <?php endif; ?>
        </div>
        <div class="btn-group mr-2" role="group">
            <?php echo e(Form::open(['method' => 'post', 'class' => 'form-horizontal'])); ?>

            <?php echo e(csrf_field()); ?>

            <button type="submit" class="btn btn-default"><i class="fa fa-download icon-white" aria-hidden="true"></i> <?php echo e(trans('general.download_all')); ?></button>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

            <table
                data-cookie-id-table="unacceptedAssetsReport"
                data-pagination="true"
                data-id-table="unacceptedAssetsReport"
                data-search="true"
                data-side-pagination="client"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="created_at"
                id="unacceptedAssetsReport"
                class="table table-striped snipe-table"
                data-export-options='{
                    "fileName": "maintenance-report-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                    }'>
            <thead>
              <tr role="row">
                <th class="col-sm-1" data-searchable="false" data-field="created_at"  data-sortable="true"><?php echo e(trans('general.date')); ?></th>
                <th class="col-sm-1" data-sortable="true" ><?php echo e(trans('admin/companies/table.title')); ?></th>
                <th class="col-sm-1" data-sortable="true" ><?php echo e(trans('general.category')); ?></th>
                <th class="col-sm-1" data-sortable="true" ><?php echo e(trans('admin/hardware/form.model')); ?></th>
                <th class="col-sm-1" data-sortable="true" ><?php echo e(trans('admin/hardware/form.name')); ?></th>
                <th class="col-sm-1" data-sortable="true" ><?php echo e(trans('admin/hardware/table.asset_tag')); ?></th>
                <th class="col-sm-1" data-sortable="true" ><?php echo e(trans('admin/hardware/table.checkoutto')); ?></th>
                <th class="col-md-1"><span class="line"></span><?php echo e(trans('table.actions')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if($assetsForReport): ?>
              <?php $__currentLoopData = $assetsForReport; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($item['assetItem']): ?>
                  <tr <?php if($item['acceptance']->trashed()): ?> style="text-decoration: line-through" <?php endif; ?>>
                    <td><?php echo e($item['acceptance']->created_at); ?></td>
                    <td><?php echo e(($item['assetItem']->company) ? $item['assetItem']->company->name : ''); ?></td>
                    <td><?php echo $item['assetItem']->model->category->present()->nameUrl(); ?></td>
                    <td><?php echo $item['assetItem']->present()->modelUrl(); ?></td>
                    <td><?php echo $item['assetItem']->present()->nameUrl(); ?></td>
                    <td><?php echo e($item['assetItem']->asset_tag); ?></td>
                    <td <?php if($item['acceptance']->assignedTo === null || $item['acceptance']->assignedTo->trashed()): ?> style="text-decoration: line-through" <?php endif; ?>><?php echo ($item['acceptance']->assignedTo) ? $item['acceptance']->assignedTo->present()->nameUrl() : trans('admin/reports/general.deleted_user'); ?></td>
                    <td class="white-space: nowrap;">
                        <nobr>
                        <?php if(!$item['acceptance']->trashed()): ?>
                           <form method="post" class="white-space: nowrap;" action="<?php echo e(route('reports/unaccepted_assets_sent_reminder')); ?>">
                            <?php if($item['acceptance']->assignedTo): ?>
                                <?php echo csrf_field(); ?>
                               <input type="hidden" name="acceptance_id" value="<?php echo e($item['acceptance']->id); ?>">
                                <button class="btn btn-sm btn-warning" data-tooltip="true" data-title="<?php echo e(trans('admin/reports/general.send_reminder')); ?>">
                                    <i class="fa fa-repeat" aria-hidden="true"></i>
                                </button>

                            <?php endif; ?>
                            <a href="<?php echo e(route('reports/unaccepted_assets_delete', ['acceptanceId' => $item['acceptance']->id])); ?>" class="btn btn-sm btn-danger delete-asset" data-tooltip="true" data-toggle="modal" data-content="<?php echo e(trans('general.delete_confirm', ['item' =>trans('admin/reports/general.acceptance_request')])); ?>" data-title="<?php echo e(trans('general.delete')); ?>" onClick="return false;"><i class="fa fa-trash"></i></a>
                           </form>
                        <?php endif; ?>

                        </nobr>
                    </td>
                  </tr>
                  <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </tbody>
            <tfoot>
              <tr>
              </tr>
            </tfoot>
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

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/reports/unaccepted_assets.blade.php ENDPATH**/ ?>