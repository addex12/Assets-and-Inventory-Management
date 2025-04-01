<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.bulk.delete.header', ['object_type' => trans_choice('general.location_plural', $valid_count)])); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
        <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal" method="post" action="<?php echo e(route('locations.bulkdelete.store')); ?>" autocomplete="off" role="form">
                <?php echo e(csrf_field()); ?>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h2 class="box-title" style="color: red"><?php echo e(trans_choice('general.bulk.delete.warn', $valid_count, ['count' => $valid_count,'object_type' => trans_choice('general.location_plural', $valid_count)])); ?></h2>
                    </div>

                    <div class="box-body">
                        <table class="table table-striped table-condensed">
                            <thead>
                            <tr>
                                <td class="col-md-1">
                                    <label>
                                        <input type="checkbox" id="checkAll" checked="checked">
                                    </label>
                                </td>
                                <td class="col-md-10"><?php echo e(trans('general.name')); ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr<?php echo (($location->assets_count > 0 ) ? ' class="danger"' : ''); ?>>
                                    <td>
                                        <input type="checkbox" name="ids[]" class="{  ($location->isDeletable() ? '' : ' disabled') }}" value="<?php echo e($location->id); ?>" <?php echo (($location->isDeletable()) ? ' checked="checked"' : ' disabled'); ?>>
                                    </td>
                                    <td><?php echo e($location->name); ?></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->

                    <div class="box-footer text-right">
                        <a class="btn btn-link pull-left" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>
                        <button type="submit" class="btn btn-success" id="submit-button"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.delete')); ?></button>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </form>
        </div> <!-- .col-md-12-->
    </div><!--.row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>
    <script>


        $("#checkAll").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/locations/bulk-delete.blade.php ENDPATH**/ ?>