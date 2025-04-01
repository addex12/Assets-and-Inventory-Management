<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.accept_assets', array('name' => empty($user) ? '' : $user->present()->full_name))); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

      <div class="box-body">
        <!-- checked out Accessories table -->

        <div class="table-responsive">
          <table
                  data-cookie-id-table="pendingAcceptances"
                  data-pagination="true"
                  data-id-table="pendingAcceptances"
                  data-search="true"
                  data-side-pagination="client"
                  data-show-columns="true"
                  data-show-export="true"
                  data-show-refresh="false"
                  data-sort-order="asc"
                  id="pendingAcceptances"
                  class="table table-striped snipe-table"
                  data-export-options='{
                  "fileName": "my-pending-acceptances-<?php echo e(date('Y-m-d')); ?>",
                  "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                  }'>
            <thead>
              <tr>
                <th><?php echo e(trans('general.name')); ?></th>
                <th><?php echo e(trans('table.actions')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $acceptances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acceptance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <?php if($acceptance->checkoutable): ?>
                <td><?php echo e(($acceptance->checkoutable) ? $acceptance->checkoutable->present()->name : ''); ?></td>
                <td><a href="<?php echo e(route('account.accept.item', $acceptance)); ?>" class="btn btn-default btn-sm"><?php echo e(trans('general.accept_decline')); ?></a></td>
                <?php else: ?>
                <td> ----- </td>
                <td> <?php echo e(trans('general.error_user_company_accept_view')); ?> </td>
                <?php endif; ?>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>

       </div> <!-- .box-body-->
    </div><!--.box.box-default-->
  </div> <!-- .col-md-12-->
</div> <!-- .row-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/account/accept/index.blade.php ENDPATH**/ ?>