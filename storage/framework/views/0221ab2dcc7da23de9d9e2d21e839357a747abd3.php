<?php $__env->startSection('title'); ?>

    <?php echo e($department->name); ?>

    <?php echo e(trans('general.department')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('departments.edit', ['department' => $department->id])); ?>" class="btn btn-sm btn-primary pull-right"><?php echo e(trans('admin/departments/table.update')); ?> </a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table table-responsive">

                                <table
                                        data-columns="<?php echo e(\App\Presenters\UserPresenter::dataTableLayout()); ?>"
                                        data-cookie-id-table="departmentsUsersTable"
                                        data-pagination="true"
                                        data-id-table="departmentsUsersTable"
                                        data-search="true"
                                        data-show-footer="true"
                                        data-side-pagination="server"
                                        data-show-columns="true"
                                        data-show-export="true"
                                        data-show-refresh="true"
                                        data-sort-order="asc"
                                        id="departmentsUsersTable"
                                        class="table table-striped snipe-table"
                                        data-url="<?php echo e(route('api.users.index',['department_id'=> $department->id])); ?>"
                                        data-export-options='{
                              "fileName": "export-departments-<?php echo e(str_slug($department->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table',
    ['exportFile' => 'departments-users-export',
    'search' => true,
    'columns' => \App\Presenters\UserPresenter::dataTableLayout()
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/departments/view.blade.php ENDPATH**/ ?>