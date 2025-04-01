<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area => $permissionsArray): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(count($permissionsArray) == 1): ?>
    <?php $localPermission = $permissionsArray[0]; ?>
    <tbody class="permissions-group">
    <tr class="header-row permissions-row">
      <td class="col-md-5 tooltip-base permissions-item"
        data-tooltip="true"
        data-placement="right"
        title="<?php echo e($localPermission['note']); ?>"
      >
        <?php if (! (empty($localPermission['label']))): ?>
         <h2><?php echo e($area . ': ' . $localPermission['label']); ?></h2>
        <?php else: ?>
          <h2><?php echo e($area); ?></h2>
        <?php endif; ?>
      </td>

      <td class="col-md-1 permissions-item">
        <label class="sr-only" for="<?php echo e('permission['.$localPermission['permission'].']'); ?>"><?php echo e('permission['.$localPermission['permission'].']'); ?></label>
        <?php if(($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '1',$userPermissions[$localPermission['permission'] ] == '1',['disabled'=>"disabled", 'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

        <?php elseif(($localPermission['permission'] == 'admin') && (!Auth::user()->hasAccess('admin'))): ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '1',$userPermissions[$localPermission['permission'] ] == '1',['disabled'=>"disabled", 'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

        <?php else: ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '1',$userPermissions[$localPermission['permission'] ] == '1',['value'=>"grant",  'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

        <?php endif; ?>

        
      </td>
      <td class="col-md-1 permissions-item">
        <label class="sr-only" for="<?php echo e('permission['.$localPermission['permission'].']'); ?>"><?php echo e('permission['.$localPermission['permission'].']'); ?></label>
        <?php if(($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '-1',$userPermissions[$localPermission['permission'] ] == '-1',['disabled'=>"disabled", 'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

        <?php elseif(($localPermission['permission'] == 'admin') && (!Auth::user()->hasAccess('admin'))): ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '-1',$userPermissions[$localPermission['permission'] ] == '-1',['disabled'=>"disabled", 'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

        <?php else: ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '-1',$userPermissions[$localPermission['permission'] ] == '-1',['value'=>"deny",   'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

        <?php endif; ?>
      </td>
      <td class="col-md-1 permissions-item">
        <label class="sr-only" for="<?php echo e('permission['.$localPermission['permission'].']'); ?>">
           <?php echo e('permission['.$localPermission['permission'].']'); ?></label>
        <?php if(($localPermission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']','0',$userPermissions[$localPermission['permission'] ] == '0',['disabled'=>"disabled", 'aria-label'=> 'permission['.$localPermission['permission'].']'] )); ?>

        <?php elseif(($localPermission['permission'] == 'admin') && (!Auth::user()->hasAccess('admin'))): ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']','0',$userPermissions[$localPermission['permission'] ] == '0',['disabled'=>"disabled", 'aria-label'=> 'permission['.$localPermission['permission'].']'] )); ?>

        <?php else: ?>
          <?php echo e(Form::radio('permission['.$localPermission['permission'].']','0',$userPermissions[$localPermission['permission'] ] == '0',['value'=>"inherit",   'aria-label'=> 'permission['.$localPermission['permission'].']'] )); ?>

        <?php endif; ?>
      </td>
    </tr>
  </tbody>

  <?php else: ?> <!-- count($permissionsArray) == 1-->
  <tbody class="permissions-group">
    <tr class="header-row permissions-row">
      <td class="col-md-5 header-name">
        <h2> <?php echo e($area); ?></h2>
      </td>
      <td class="col-md-1 permissions-item">
        <label for="<?php echo e($area); ?>" class="sr-only"><?php echo e($area); ?></label>
        <?php echo e(Form::radio("$area", '1',false,['value'=>"grant", 'data-checker-group' => str_slug($area), 'aria-label' => $area])); ?>

      </td>
      <td class="col-md-1 permissions-item">
        <label for="<?php echo e($area); ?>" class="sr-only"><?php echo e($area); ?></label>
        <?php echo e(Form::radio("$area", '-1',false,['value'=>"deny", 'data-checker-group' => str_slug($area), 'aria-label' => $area])); ?>

      </td>
      <td class="col-md-1 permissions-item">
        <label for="<?php echo e($area); ?>" class="sr-only"><?php echo e($area); ?></label>
        <?php echo e(Form::radio("$area", '0',false,['value'=>"inherit", 'data-checker-group' => str_slug($area), 'aria-label' => $area] )); ?>

      </td>
    </tr>

    <?php $__currentLoopData = $permissionsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr class="permissions-row">
        <?php if($permission['display']): ?>
          <td
            class="col-md-5 tooltip-base permissions-item"
            data-tooltip="true"
            data-placement="right"
            title="<?php echo e($permission['note']); ?>"
          >
            <?php echo e($permission['label']); ?>

          </td>
          <td class="col-md-1 permissions-item">
            <label class="sr-only" for="<?php echo e('permission['.$permission['permission'].']'); ?>"><?php echo e('permission['.$permission['permission'].']'); ?></label>

            <?php if(($permission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
              <?php echo e(Form::radio('permission['.$permission['permission'].']', '1', $userPermissions[$permission['permission'] ] == '1', ["value"=>"grant", 'disabled'=>'disabled', 'class'=>'radiochecker-'.str_slug($area), 'aria-label'=>'permission['.$permission['permission'].']'])); ?>

            <?php else: ?>
              <?php echo e(Form::radio('permission['.$permission['permission'].']', '1', $userPermissions[ $permission['permission'] ] == '1', ["value"=>"grant",'class'=>'radiochecker-'.str_slug($area), 'aria-label' =>'permission['.$permission['permission'].']'])); ?>

            <?php endif; ?>
          </td>
          <td class="col-md-1 permissions-item">
            <?php if(($permission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
              <?php echo e(Form::radio('permission['.$permission['permission'].']', '-1', $userPermissions[$permission['permission'] ] == '-1', ["value"=>"deny", 'disabled'=>'disabled', 'class'=>'radiochecker-'.str_slug($area), 'aria-label'=>'permission['.$permission['permission'].']'])); ?>

            <?php else: ?>
              <?php echo e(Form::radio('permission['.$permission['permission'].']', '-1', $userPermissions[$permission['permission'] ] == '-1', ["value"=>"deny",'class'=>'radiochecker-'.str_slug($area), 'aria-label'=>'permission['.$permission['permission'].']'])); ?>

            <?php endif; ?>
          </td>
          <td class="col-md-1 permissions-item">
            <?php if(($permission['permission'] == 'superuser') && (!Auth::user()->isSuperUser())): ?>
              <?php echo e(Form::radio('permission['.$permission['permission'].']', '0', $userPermissions[$permission['permission']] =='0', ["value"=>"inherit", 'disabled'=>'disabled', 'class'=>'radiochecker-'.str_slug($area), 'aria-label'=>'permission['.$permission['permission'].']'])); ?>

            <?php else: ?>
              <?php echo e(Form::radio('permission['.$permission['permission'].']', '0', $userPermissions[$permission['permission']] =='0', ["value"=>"inherit", 'class'=>'radiochecker-'.str_slug($area), 'aria-label'=>'permission['.$permission['permission'].']'])); ?>

            <?php endif; ?>
          </td>
        <?php endif; ?>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/permissions-base.blade.php ENDPATH**/ ?>