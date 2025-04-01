<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.license_report')); ?> 
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-body">
                <div class="table-responsive">

                    <table
                            data-cookie-id-table="licensesReport"
                            data-pagination="true"
                            data-id-table="licensesReport"
                            data-search="true"
                            data-side-pagination="client"
                            data-show-columns="true"
                            data-show-export="true"
                            data-show-refresh="true"
                            data-sort-order="asc"
                            id="licensesReport"
                            class="table table-striped snipe-table"
                            data-export-options='{
                        "fileName": "license-report-<?php echo e(date('Y-m-d')); ?>",
                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                        }'>
                        <thead>
                            <tr role="row">
                                <th class="col-sm-1"><?php echo e(trans('admin/companies/table.title')); ?></th>
                                <th class="col-sm-1"><?php echo e(trans('admin/licenses/table.title')); ?></th>
                                <th class="col-sm-1"><?php echo e(trans('admin/licenses/form.license_key')); ?></th>
                                <th class="col-sm-1"><?php echo e(trans('admin/licenses/form.seats')); ?></th>
                                <th class="col-sm-1"><?php echo e(trans('admin/licenses/form.remaining_seats')); ?></th>
                                <th class="col-sm-1"><?php echo e(trans('admin/licenses/form.expiration')); ?></th>
                                <th class="col-sm-1"><?php echo e(trans('general.purchase_date')); ?></th>
                                <th class="col-sm-1 text-right" class="col-sm-1"><?php echo e(trans('general.purchase_cost')); ?></th>
                                <th class="col-sm-1"><?php echo e(trans('general.depreciation')); ?></th>
                                <th class="col-sm-1 text-right"><?php echo e(trans('admin/hardware/table.book_value')); ?></th>
                                <th class="col-sm-1 text-right"><?php echo e(trans('admin/hardware/table.diff')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(is_null($license->company) ? '' : $license->company->name); ?></td>
                                <td><?php echo e($license->name); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                                        <?php echo e($license->serial); ?>

                                    <?php else: ?>
                                        ------------
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($license->seats); ?></td>
                                <td><?php echo e($license->remaincount()); ?></td>
                                <td><?php echo e($license->expiration_date); ?></td>
                                <td><?php echo e($license->purchase_date); ?></td>
                                <td class="text-right">
                                    <?php echo e($snipeSettings->default_currency); ?><?php echo e(Helper::formatCurrencyOutput($license->purchase_cost)); ?>

                                </td>
                                <td>
                                    <?php echo e(($license->depreciation) ? e($license->depreciation->name).' ('.$license->depreciation->months.' '.trans('general.months').')' : ''); ?>

                                </td>
                                <td class="text-right">
                                    <?php echo e($snipeSettings->default_currency); ?><?php echo e(Helper::formatCurrencyOutput($license->getDepreciatedValue())); ?>

                                </td>
                                <td class="text-right">
                                    -<?php echo e($snipeSettings->default_currency); ?><?php echo e(Helper::formatCurrencyOutput(($license->purchase_cost - $license->getDepreciatedValue()))); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div> <!-- /.table-responsive-->
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/reports/licenses.blade.php ENDPATH**/ ?>