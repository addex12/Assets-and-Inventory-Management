<?php $__env->startSection('title'); ?>
<?php echo trans('general.bulk_checkin_delete'); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="box box-default">
      <form class="form-horizontal" role="form" method="post" action="<?php echo e(route('users/bulksave')); ?>">
        <div class="box-body">
          <!-- CSRF Token -->
          <?php echo e(csrf_field()); ?>

          <div class="col-md-12">
            <div class="callout callout-danger">
              <i class="fas fa-exclamation-triangle"></i>
              <strong><?php echo e(trans('admin/users/general.warning_deletion_information', array('count' => count($users)))); ?> </strong>

            </div>
          </div>

          <?php if(config('app.lock_passwords')): ?>
            <div class="col-md-12">
              <div class="callout callout-warning">
                <p><?php echo e(trans('general.feature_disabled')); ?></p>
              </div>
            </div>
          <?php endif; ?>

          <div class="col-md-12">
            <div class="table-responsive">
              <table class="display table table-hover">
                <thead>
                  <tr>
                    <th class="col-md-1">
                      <!-- <input type="checkbox" id="checkAll"> -->
                      </th>
                    <th class="col-md-6"><?php echo e(trans('general.name')); ?></th>
                    <th class="col-md-5"><?php echo e(trans('general.groups')); ?></th>
                    <th class="col-md-5"><?php echo e(trans('general.assets')); ?></th>
                    <th class="col-md-5"><?php echo e(trans('general.accessories')); ?></th>
                    <th class="col-md-5"><?php echo e(trans('general.licenses')); ?></th>
                    <th class="col-md-5"><?php echo e(trans('general.consumables')); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr <?php echo ($user->isSuperUser() ? ' class="danger"':''); ?>>
                    <td>
                      <?php if(Auth::id()!=$user->id): ?>
                      <input type="checkbox" name="ids[]" value="<?php echo e($user->id); ?>"  checked="checked">
                      <?php else: ?>
                      <input type="checkbox" name="ids[]" class="cannot_delete" value="<?php echo e($user->id); ?>" disabled>
                      <?php endif; ?>
                    </td>

                    <td>
                      <span <?php echo (Auth::user()->id==$user->id ? ' style="text-decoration: line-through"' : ''); ?>>
                        <?php echo e($user->present()->fullName()); ?> (<?php echo e($user->username); ?>)
                      </span>
                      <?php echo e((Auth::id()==$user->id ? ' (cannot delete yourself)' : '')); ?>

                    </td>
                    <td>
                      <?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href=" <?php echo e(route('groups.update', $group->id)); ?>" class="label  label-default">
                        <?php echo e($group->name); ?>

                      </a>&nbsp;
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                      <?php echo e(number_format($user->assets()->count())); ?>

                    </td>
                    <td>
                      <?php echo e(number_format($user->accessories()->count())); ?>

                    </td>
                    <td>
                      <?php echo e(number_format($user->licenses()->count())); ?>

                    </td>
                    <td>
                      <?php echo e(number_format($user->consumables()->count())); ?>

                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>

                  <tr>
                    <td colspan="7">
                      <?php echo e(Form::select('status_id', $statuslabel_list , Request::old('status_id'), array('class'=>'select2', 'style'=>'width:250px'))); ?>

                      <label><?php echo e(trans('admin/users/general.update_user_assets_status')); ?></label>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="7" class="col-md-12 alert-danger">
                      <label class="form-control">
                        <input type="checkbox" name="delete_user" value="1">
                        <span><i class="fa fa-warning fa-2x"></i> <?php echo e(trans('general.bulk_soft_delete')); ?></span>
                      </label>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div> <!--/table-responsive-->
          </div><!--/col-md-12-->
        </div> <!--/box-body-->
        <div class="box-footer text-right">
          <a class="btn btn-link pull-left" href="<?php echo e(URL::previous()); ?>"><?php echo e(trans('button.cancel')); ?></a>

          <button type="submit" class="btn btn-success"<?php echo e((config('app.lock_passwords') ? ' disabled' : '')); ?> disabled="disabled"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('button.submit')); ?></button>

        </div><!-- /.box-footer -->
      </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<script>


  // TODO: include a class that excludes certain checkboxes by class to not be select-all'd
  // $("#checkAll").change(function () {
  //   $("input:checkbox").prop('checked', $(this).prop("checked"));
  // });


  $(":submit").attr("disabled", "disabled");
   $("[name='status_id']").on('select2:select', function (e) {
     if (e.params.data.id != "") {
       console.log(e.params.data.id);
       $(":submit").removeAttr("disabled");
     } else {
       $(":submit").attr("disabled", "disabled");
     }
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/users/confirm-bulk-delete.blade.php ENDPATH**/ ?>