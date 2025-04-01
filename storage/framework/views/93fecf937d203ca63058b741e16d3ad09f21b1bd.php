<?php $__env->startSection('title'); ?>

    <?php if(request('status')=='deleted'): ?>
        <?php echo e(trans('general.deleted')); ?>

    <?php else: ?>
        <?php echo e(trans('general.current')); ?>

    <?php endif; ?>
    <?php echo e(trans('general.users')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\User::class)): ?>
        <?php if($snipeSettings->ldap_enabled == 1): ?>
            <a href="<?php echo e(route('ldap/user')); ?>" class="btn btn-default pull-right"><span class="fas fa-sitemap"></span><?php echo e(trans('general.ldap_sync')); ?></a>
        <?php endif; ?>
        <a href="<?php echo e(route('users.create')); ?>" accesskey="n" class="btn btn-primary pull-right" style="margin-right: 5px;">  <?php echo e(trans('general.create')); ?></a>
    <?php endif; ?>

    <?php if(request('status')=='deleted'): ?>
        <a class="btn btn-default pull-right" href="<?php echo e(route('users.index')); ?>" style="margin-right: 5px;"><?php echo e(trans('admin/users/table.show_current')); ?></a>
    <?php else: ?>
        <a class="btn btn-default pull-right" href="<?php echo e(route('users.index', ['status' => 'deleted'])); ?>" style="margin-right: 5px;"><?php echo e(trans('admin/users/table.show_deleted')); ?></a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\User::class)): ?>
        <a class="btn btn-default pull-right" href="<?php echo e(route('users.export')); ?>" style="margin-right: 5px;"><?php echo e(trans('general.export')); ?></a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
        <div class="box-body">

            <?php echo $__env->make('partials.users-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <table
                    data-click-to-select="true"
                    data-columns="<?php echo e(\App\Presenters\UserPresenter::dataTableLayout()); ?>"
                    data-cookie-id-table="usersTable"
                    data-pagination="true"
                    data-id-table="usersTable"
                    data-search="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-fullscreen="true"
                    data-show-export="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-toolbar="#userBulkEditToolbar"
                    data-bulk-button-id="#bulkUserEditButton"
                    data-bulk-form-id="#usersBulkForm"
                    id="usersTable"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.users.index',
              array('deleted'=> (request('status')=='deleted') ? 'true' : 'false','company_id' => e(request('company_id'))))); ?>"
                    data-export-options='{
                "fileName": "export-users-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
                    </table>


                    <?php echo e(Form::close()); ?>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>


<?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/users/index.blade.php ENDPATH**/ ?>