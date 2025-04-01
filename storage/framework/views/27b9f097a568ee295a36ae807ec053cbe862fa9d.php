<?php $__env->startSection('title'); ?>
    <?php echo e($group->name); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('groups.edit', ['group' => $group->id])); ?>" class="btn btn-primary text-right"><?php echo e(trans('admin/groups/titles.update')); ?> </a>
    <a href="<?php echo e(route('groups.index')); ?>" class="btn btn-default pull-right"><?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table table-responsive">

                                <table
                                    data-columns="<?php echo e(\App\Presenters\UserPresenter::dataTableLayout()); ?>"
                                    data-cookie-id-table="groupsUsersTable"
                                    data-pagination="true"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    id="groupsUsersTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.users.index',['group_id'=> $group->id])); ?>"
                                    data-export-options='{
                                    "fileName": "export-<?php echo e(str_slug($group->name)); ?>-group-users-<?php echo e(date('Y-m-d')); ?>",
                                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                        }'>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">

            <?php if(is_array($group->decodePermissions())): ?>
            <ul class="list-unstyled">
                <?php $__currentLoopData = $group->decodePermissions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_name => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><?php echo ($permission == '1') ? '<i class="fas fa-check text-success" aria-hidden="true"></i><span class="sr-only">'.trans('general.yes').': </span>' :  '<i class="fas fa-times text-danger" aria-hidden="true"></i><span class="sr-only">'.trans('general.no').': </span>'; ?> <?php echo e(e(str_replace('.', ': ', ucwords($permission_name)))); ?> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
            <?php else: ?>
                <p><?php echo e(trans('admin/groups/title.no_permissions')); ?></p>
            <?php endif; ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/groups/view.blade.php ENDPATH**/ ?>