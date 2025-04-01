<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/groups/titles.group_management')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('groups.create')); ?>" class="btn btn-primary text-right"> <?php echo e(trans('general.create')); ?></a>
<a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default text-right"><?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-body">
        <div class="table-responsive">

            <table
                data-cookie-id-table="groupsTable"
                data-pagination="true"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-show-fullscreen="true"
                data-sort-order="asc"
                data-sort-name="name"
                id="groupsTable"
                class="table table-striped snipe-table"
                data-url="<?php echo e(route('api.groups.index')); ?>"
                data-export-options='{
        "fileName": "export-groups-<?php echo e(date('Y-m-d')); ?>",
            "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
            }'>

            <thead>
              <tr>
               <th data-switchable="true" data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
               <th data-switchable="true" data-sortable="true" data-field="name" data-formatter="groupsAdminLinkFormatter" data-visible="true"><?php echo e(trans('admin/groups/table.name')); ?></th>
                  <th data-switchable="true" data-sortable="true" data-field="users_count" data-visible="true"><i class="fas fa-user" aria-hidden="true"></i><span class="sr-only"><?php echo e(trans('admin/groups/table.users')); ?></span></th>
               <th data-switchable="true" data-sortable="true" data-field="created_at" data-visible="true" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.created_at')); ?></th>
               <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="created_by"  data-formatter="usersLinkFormatter"><?php echo e(trans('general.created_by')); ?></th>
               <th data-switchable="false" data-searchable="false" data-sortable="false" data-field="actions"   data-formatter="groupsActionsFormatter"><?php echo e(trans('table.actions')); ?></th>

              </tr>
            </thead>
          </table>
        </div>
      </div> <!--.box-body-->
    </div> <!-- /.box.box-default-->
  </div> <!-- .col-md-12-->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'groups-export', 'search' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/groups/index.blade.php ENDPATH**/ ?>