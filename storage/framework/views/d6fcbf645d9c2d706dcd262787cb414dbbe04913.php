<?php $__env->startComponent('mail::message'); ?>
<?php echo e(trans('mail.hello')); ?> <?php echo e($first_name); ?> <?php echo e($last_name); ?>,

<?php echo e(trans('mail.admin_has_created', ['web' => $snipeSettings->site_name])); ?>


<?php echo e(trans('mail.login')); ?> <?php echo e($username); ?> <br>
<?php echo e(trans('mail.password')); ?> <?php echo e($password); ?>


<?php $__env->startComponent('mail::button', ['url' => $url]); ?>
Go To <?php echo e($snipeSettings->site_name); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo e(trans('mail.best_regards')); ?> <br>
<?php if($snipeSettings->show_url_in_emails=='1'): ?>
    <p><a href="<?php echo e(config('app.url')); ?>"><?php echo e($snipeSettings->site_name); ?></a></p>
<?php else: ?>
    <p><?php echo e($snipeSettings->site_name); ?></p>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/notifications/Welcome.blade.php ENDPATH**/ ?>