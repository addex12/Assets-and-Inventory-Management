<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo e(trans('general.assigned_to', array('name' => $location->present()->fullName()))); ?> </title>
    <style>
        body {
            font-family: "Arial, Helvetica", sans-serif;
        }
        table.inventory {
            border: solid #000;
            border-width: 1px 1px 1px 1px;
            width: 100%;
        }

        @page  {
            size: A4;
        }
        table.inventory th, table.inventory td {
            border: solid #000;
            border-width: 0 1px 1px 0;
            padding: 3px;
            font-size: 12px;
        }

        .print-logo {
            max-height: 40px;
        }

    </style>
</head>
<body>

<?php if($snipeSettings->logo_print_assets=='1'): ?>
    <?php if($snipeSettings->brand == '3'): ?>

        <h3>
        <?php if($snipeSettings->logo!=''): ?>
            <img class="print-logo" src="<?php echo e(config('app.url')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
        <?php endif; ?>
        <?php echo e($snipeSettings->site_name); ?>

        </h3>
    <?php elseif($snipeSettings->brand == '2'): ?>
        <?php if($snipeSettings->logo!=''): ?>
            <img class="print-logo" src="<?php echo e(config('app.url')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
        <?php endif; ?>
    <?php else: ?>
      <h3><?php echo e($snipeSettings->site_name); ?></h3>
    <?php endif; ?>
<?php endif; ?>

<h2><?php echo e(trans('general.assigned_to', array('name' => $location->present()->fullName()))); ?></h2>
    <?php if($parent): ?>
        <?php echo e($parent->present()->fullName()); ?>

    <?php endif; ?>

<?php if($manager): ?>
    <b><?php echo e(trans('general.manager')); ?></b> <?php echo e($manager->present()->fullName()); ?><br>
<?php endif; ?>
<b><?php echo e(trans('general.date')); ?></b>  <?php echo e(\App\Helpers\Helper::getFormattedDateObject(now(), 'datetime', false)); ?><br><br>

<?php if($users->count() > 0): ?>
    <?php
        $counter = 1;
    ?>
    <table class="inventory">
        <thead>
        <tr>
            <th colspan="6"><?php echo e(trans('general.users')); ?></th>
        </tr>
        </thead>
        <thead>
            <tr>
            <th style="width: 5px;"></th>
            <th style="width: 25%;"><?php echo e(trans('general.company')); ?></th>
            <th style="width: 25%;"><?php echo e(trans('admin/locations/table.user_name')); ?></th>
            <th style="width: 10%;"><?php echo e(trans('general.employee_number')); ?></th>
	        <th style="width: 20%;"><?php echo e(trans('admin/locations/table.department')); ?></th>
		    <th style="width: 20%;"><?php echo e(trans('admin/locations/table.location')); ?></th>
            </tr>
        </thead>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
        <td><?php echo e($counter); ?></td>
        <td><?php echo e((($user) && ($user->company)) ? $user->company->name : ''); ?></td>
        <td><?php echo e(($user)  ? $user->first_name .' '. $user->last_name : ''); ?></td>
        <td><?php echo e(($user)  ? $user->employee_num : ''); ?></td>
        <td><?php echo e((($user) && ($user->department)) ? $user->department->name : ''); ?></td>
        <td><?php echo e((($user) && ($user->location)) ? $user->location->name : ''); ?></td>
        </tr>
            <?php
                $counter++
            ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php endif; ?>



<?php if($assets->count() > 0): ?>
    <br><br>
    <table class="inventory">
        <thead>
        <tr>
            <th colspan="10"><?php echo e(trans('general.assets')); ?></th>
        </tr>
        </thead>
        <thead>
            <tr>
            <th style="width: 20px;"></th>
            <th style="width: 10%;"><?php echo e(trans('admin/locations/table.asset_tag')); ?></th>
            <th style="width: 10%;"><?php echo e(trans('admin/locations/table.asset_name')); ?></th>
            <th style="width: 10%;"><?php echo e(trans('admin/locations/table.asset_category')); ?></th>
	        <th style="width: 10%;"><?php echo e(trans('admin/locations/table.asset_manufacturer')); ?></th>
            <th style="width: 15%;"><?php echo e(trans('admin/locations/table.asset_model')); ?></th>
            <th style="width: 15%;"><?php echo e(trans('admin/locations/table.asset_serial')); ?></th>
            <th style="width: 10%;"><?php echo e(trans('admin/locations/table.asset_location')); ?></th>
            <th style="width: 10%;"><?php echo e(trans('admin/locations/table.asset_checked_out')); ?></th>
            <th style="width: 10%;"><?php echo e(trans('admin/locations/table.asset_expected_checkin')); ?></th>
            </tr>
        </thead>
		<?php
        	$counter = 1;
    	?>
    	
    	<?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if($snipeSettings->show_archived_in_list != 1 && $asset->assetstatus->archived == 1){
                    continue;
                }
            ?>
        <tr>
        <td><?php echo e($counter); ?></td>
        <td><?php echo e($asset->asset_tag); ?></td>
        <td><?php echo e($asset->name); ?></td>
        <td><?php echo e((($asset->model) && ($asset->model->category)) ? $asset->model->category->name : ''); ?></td>
        <td><?php echo e((($asset->model) && ($asset->model->manufacturer)) ? $asset->model->manufacturer->name : ''); ?></td>
        <td><?php echo e(($asset->model) ? $asset->model->name : ''); ?></td>
        <td><?php echo e($asset->serial); ?></td>
        <td><?php echo e($asset->location->name); ?></td>
        <td><?php echo e(\App\Helpers\Helper::getFormattedDateObject( $asset->last_checkout, 'datetime', false)); ?></td>
        <td><?php echo e(\App\Helpers\Helper::getFormattedDateObject( $asset->expected_checkin, 'datetime', false)); ?></td>
        </tr>
            <?php
                $counter++
            ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php endif; ?>

<br>
<br>
<br>
<table>
    <tr>
        <td><?php echo e(trans('admin/locations/table.signed_by_asset_auditor')); ?></td>
        <td><br>------------------------------------------------------ &nbsp;&nbsp;&nbsp;<br></td>
        <td><?php echo e(trans('admin/locations/table.date')); ?></td>
        <td><br>------------------------------ &nbsp;&nbsp;&nbsp;<br></td>
    </tr>

    <tr>
        <td><?php echo e(trans('admin/locations/table.signed_by_finance_auditor')); ?></td>
        <td><br>------------------------------------------------------ &nbsp;&nbsp;&nbsp;<br></td>
        <td><?php echo e(trans('admin/locations/table.date')); ?></td>
        <td><br>------------------------------ &nbsp;&nbsp;&nbsp;<br></td>
    </tr>

    <tr>
        <td><?php echo e(trans('admin/locations/table.signed_by_location_manager')); ?></td>
        <td><br>------------------------------------------------------ &nbsp;&nbsp;&nbsp;<br></td>
        <td><?php echo e(trans('admin/locations/table.date')); ?></td>
        <td><br>------------------------------ &nbsp;&nbsp;&nbsp;<br></td>
    </tr>
</table>


</body>
</html>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/locations/print.blade.php ENDPATH**/ ?>