<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.departments')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-primary pull-right">
        <?php echo e(trans('general.create')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-body">
                    <div class="table-responsive">

                        <table
                                data-cookie-id-table="departmentsTable"
                                data-pagination="true"
                                data-id-table="departmentsTable"
                                data-search="true"
                                data-side-pagination="server"
                                data-show-columns="true"
                                data-show-fullscreen="true"
                                data-show-export="true"
                                data-show-refresh="true"
                                data-sort-order="asc"
                                id="departmentsTable"
                                class="table table-striped snipe-table"
                                data-url="<?php echo e(route('api.departments.index')); ?>"
                                data-export-options='{
                              "fileName": "export-departments-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                            <thead>
                            <tr>
                                <th data-sortable="true" data-field="id" data-visible="false"><?php echo e(trans('general.id')); ?></th>
                                <th data-sortable="true" data-field="company" data-visible="false" data-formatter="companiesLinkObjFormatter"><?php echo e(trans('general.company')); ?></th>
                                <th data-sortable="true" data-formatter="departmentsLinkFormatter" data-field="name" data-searchable="false"><?php echo e(trans('admin/departments/table.name')); ?></th>
                                <th data-sortable="true" data-field="image" data-visible="false" data-formatter="imageFormatter"><?php echo e(trans('general.image')); ?></th>
                                <th data-sortable="true" data-formatter="usersLinkObjFormatter" data-field="manager" data-searchable="false"><?php echo e(trans('admin/departments/table.manager')); ?></th>
                                <th data-sortable="true" data-field="users_count" data-searchable="false"><?php echo e(trans('general.users')); ?></th>
                                <th data-sortable="true" data-formatter="locationsLinkObjFormatter" data-field="location" data-searchable="false"><?php echo e(trans('admin/departments/table.location')); ?></th>
                                <th data-sortable="false" data-formatter="departmentsActionsFormatter" data-field="actions" data-searchable="false"><?php echo e(trans('table.actions')); ?></th>

                            </tr>
                            </thead>
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

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/departments/index.blade.php ENDPATH**/ ?>