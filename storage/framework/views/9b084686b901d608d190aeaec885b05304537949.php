<?php if($setupCompleted = \App\Models\Setting::setupCompleted()): ?>
<?php $__env->startComponent('mail::message'); ?>
<?php endif; ?>

<?php echo e(trans('mail.test_mail_text')); ?>


Thanks,
Adugna G
<?php if($setupCompleted): ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/notifications/Test.blade.php ENDPATH**/ ?>