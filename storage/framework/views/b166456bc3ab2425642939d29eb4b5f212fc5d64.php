<?php $__env->startSection('title'); ?>
404
<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



<div class="row">
  <div class="col-md-8 col-md-offset-2">

    <div style="padding-top: 200px">
      <img src="<?php echo e(config('app.url')); ?>/img/sad-panda.png" style="width: 200px; height: 200px;" class="pull-left">
            <div class="error-content">
              <h2><i class="fas fa-exclamation-triangle text-yellow"></i> 404 Page not found.</h2>
              <p>
                Sad panda. We could not find the page you were looking for.
                You should maybe <a href="<?php echo e(config('app.url')); ?>">return to the dashboard</a>.
              </p>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/errors/404.blade.php ENDPATH**/ ?>