<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/statuslabels/table.title')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Statuslabel::class)): ?>
        <a href="<?php echo e(route('statuslabels.create')); ?>" class="btn btn-primary pull-right">
<?php echo e(trans('general.create')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

            <table
                    data-cookie-id-table="statuslabelsTable"
                    data-pagination="true"
                    data-id-table="statuslabelsTable"
                    data-search="true"
                    data-show-footer="false"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-export="true"
                    data-show-fullscreen="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-sort-name="name"
                    id="statuslabelsTable"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.statuslabels.index')); ?>"
                    data-export-options='{
                "fileName": "export-statuslabels-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
            <thead>
              <tr>
                <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
                <th data-sortable="true" data-field="name" data-formatter="statuslabelsAssetLinkFormatter"><?php echo e(trans('admin/statuslabels/table.name')); ?></th>
                <th data-sortable="false" data-field="type" data-formatter="statusLabelTypeFormatter"><?php echo e(trans('admin/statuslabels/table.status_type')); ?></th>
                  <th data-sortable="true" data-field="assets_count"><?php echo e(trans('general.assets')); ?></th>
                <th data-sortable="true" data-field="color" data-formatter="colorSqFormatter"><?php echo e(trans('admin/statuslabels/table.color')); ?></th>
                <th class="text-center" data-sortable="true" data-field="show_in_nav" data-formatter="trueFalseFormatter"><?php echo e(trans('admin/statuslabels/table.show_in_nav')); ?></th>
                  <th class="text-center" data-sortable="true" data-field="default_label" data-formatter="trueFalseFormatter"><?php echo e(trans('admin/statuslabels/table.default_label')); ?></th>
                  <th data-sortable="true" data-field="notes" data-visible="false"><?php echo e(trans('general.notes')); ?></th>
                <th data-formatter="statuslabelsActionsFormatter" data-searchable="false" data-sortable="false" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- side address column -->
  <div class="col-md-3">
    <h2><?php echo e(trans('admin/statuslabels/table.about')); ?></h2>

      <div class="box box-success">
          <div class="box-body">
          <p><i class="fas fa-circle text-green"></i> <strong><?php echo e(trans('admin/statuslabels/table.deployable')); ?></strong>: <?php echo trans('admin/statuslabels/message.help.deployable'); ?></p>
          </div>
      </div>

      <div class="box box-warning">
          <div class="box-body">
              <p><i class="fas fa-circle text-orange"></i> <strong><?php echo e(trans('admin/statuslabels/table.pending')); ?></strong>: <?php echo e(trans('admin/statuslabels/message.help.pending')); ?></p>
          </div>
      </div>
      <div class="box box-danger">
          <div class="box-body">
            <p><i class="fas fa-times text-red"></i> <strong><?php echo e(trans('admin/statuslabels/table.undeployable')); ?></strong>: <?php echo e(trans('admin/statuslabels/message.help.undeployable')); ?></p>
          </div>
      </div>

      <div class="box box-danger">
          <div class="box-body">
              <p><i class="fas fa-times text-red"></i> <strong><?php echo e(trans('admin/statuslabels/table.archived')); ?></strong>: <?php echo e(trans('admin/statuslabels/message.help.archived')); ?></p>
          </div>
      </div>

  </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <script nonce="<?php echo e(csrf_token()); ?>">
      function colorSqFormatter(value, row) {
          if (value) {
              return '<span class="label" style="background-color: ' + value + ';">&nbsp;</span> ' + value;
          }
      }

      function statuslabelsAssetLinkFormatter(value, row) {
          if ((row) && (row.name)) {
              return '<a href="<?php echo e(config('app.url')); ?>/hardware/?status_id=' + row.id + '"> ' + row.name + '</a>';
          }
      }

      function statusLabelTypeFormatter (row, value) {

          switch (value.type) {
              case 'deployable':
                  text_color = 'green';
                  icon_style = 'fa-circle';
                  trans  = '<?php echo e(strtolower(trans('admin/hardware/general.deployable'))); ?>';

                  break;
              case 'pending':
                  text_color = 'orange';
                  icon_style = 'fa-circle';
                  trans  = '<?php echo e(strtolower(trans('general.pending'))); ?>';

                  break;
              case 'undeployable':
                  text_color = 'red';
                  icon_style = 'fa-circle';
                  trans  ='<?php echo e(trans('admin/statuslabels/table.undeployable')); ?>';

                  break;
              default:
                  text_color = 'red';
                  icon_style = 'fa-times';
                  trans  = '<?php echo e(strtolower(trans('general.archived'))); ?>';

          }

          var typename_lower = trans;
          var typename = typename_lower.charAt(0).toUpperCase() + typename_lower.slice(1);
          return '<i class="fa ' + icon_style + ' text-' + text_color + '"></i> ' + typename;


      }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', [
    'helpText' => trans('admin/statuslabels/table.info') ,
    'helpPosition' => 'right',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/statuslabels/index.blade.php ENDPATH**/ ?>