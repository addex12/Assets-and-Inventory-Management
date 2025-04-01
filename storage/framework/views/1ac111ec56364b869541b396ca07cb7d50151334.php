<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.accessory_report')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-body">
                    <div class="table-responsive">

                        <table
                                data-cookie-id-table="accessoriesReport"
                                data-pagination="true"
                                data-id-table="accessoriesReport"
                                data-search="true"
                                data-side-pagination="server"
                                data-show-columns="true"
                                data-show-export="true"
                                data-show-refresh="true"
                                data-sort-order="asc"
                                id="accessoriesReport"
                                class="table table-striped snipe-table"
                                data-url="<?php echo e(route('api.accessories.index')); ?>"
                                data-export-options='{
                        "fileName": "accessory-report-<?php echo e(date('Y-m-d')); ?>",
                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                        }'>

                            <thead>
                            <tr>
                                <th class="col-sm-1" data-field="company.name"><?php echo e(trans('admin/companies/table.title')); ?></th>
                                <th class="col-sm-1" data-field="name"><?php echo e(trans('admin/accessories/table.title')); ?></th>
                                <th class="col-sm-1" data-field="model_number"><?php echo e(trans('general.model_no')); ?></th>
                                <th class="col-sm-1" data-field="qty"><?php echo e(trans('admin/accessories/general.total')); ?></th>
                                <th class="col-sm-1" data-field="remaining_qty"><?php echo e(trans('admin/accessories/general.remaining')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('moar_scripts'); ?>
            <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/reports/accessories.blade.php ENDPATH**/ ?>