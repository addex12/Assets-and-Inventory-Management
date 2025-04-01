<?php $__env->startComponent('mail::message'); ?>

<?php echo e(trans('general.reminder_checked_out_items', array('reply_to_name' => config('mail.reply_to.name'), 'reply_to_address' => config('mail.reply_to.address')))); ?>


<?php $__env->startComponent('mail::table'); ?>

<?php if($assets->count() > 0): ?>

## <?php echo e($assets->count()); ?> <?php echo e(trans('general.assets')); ?>


<table width="100%">
    <tr><th align="left"><?php echo e(trans('mail.name')); ?> </th><th align="left"><?php echo e(trans('mail.asset_tag')); ?></th><th align="left"><?php echo e(trans('admin/hardware/table.serial')); ?></th><th align="left"><?php echo e(trans('admin/hardware/table.location')); ?></th> <th></th> </tr>
<?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($asset->present()->name); ?></td>
    <td> <?php echo e($asset->asset_tag); ?> </td>
    <td> <?php echo e($asset->serial); ?> </td>
    <td> <?php echo e($asset->location->name); ?> </td>
     <?php if(($snipeSettings->show_images_in_email =='1') && $asset->getImageUrl()): ?>
    <td>
        <img src="<?php echo e(asset($asset->getImageUrl())); ?>" alt="Asset" style="max-width: 64px;">
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php endif; ?>

<?php if($accessories->count() > 0): ?>
## <?php echo e($accessories->count()); ?> <?php echo e(trans('general.accessories')); ?>


<table width="100%">
    <tr><th align="left"><?php echo e(trans('mail.name')); ?> </th> <th></th> </tr>
<?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($accessory->name); ?></td>
    <?php if(($snipeSettings->show_images_in_email =='1') && $accessory->getImageUrl()): ?>
    <td>
        <img src="<?php echo e(asset($accessory->getImageUrl())); ?>" alt="Accessory" style="max-width: 64px;">
    </td>
    <?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php endif; ?>

<?php if($licenses->count() > 0): ?>
## <?php echo e($licenses->count()); ?> <?php echo e(trans('general.licenses')); ?>


<table width="100%">
<tr><th align="left"><?php echo e(trans('mail.name')); ?> </th></tr>
<?php $__currentLoopData = $licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($license->name); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php endif; ?>

<?php if($consumables->count() > 0): ?>
## <?php echo e($consumables->count()); ?> <?php echo e(trans('general.consumables')); ?>


<table width="100%">
<tr><th align="left"><?php echo e(trans('mail.name')); ?> </th> <th></th> </tr>
<?php $__currentLoopData = $consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($consumable->name); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php endif; ?>


<?php echo $__env->renderComponent(); ?>


<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/notifications/markdown/user-inventory.blade.php ENDPATH**/ ?>