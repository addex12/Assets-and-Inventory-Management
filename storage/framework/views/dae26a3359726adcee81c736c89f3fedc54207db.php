<?php $__env->startSection('content'); ?>

    <style>
        .form-horizontal .control-label {
            padding-top: 0px;
        }

        input[type='text'][disabled], input[disabled], textarea[disabled], input[readonly], textarea[readonly], .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
            background-color: white;
            color: #555555;
            cursor:text;
        }
        table.permissions {
            display:flex;
            flex-direction: column;
        }

        .permissions.table > thead, .permissions.table > tbody {
            margin: 15px;
            margin-top: 0px;
        }
        .permissions.table > tbody {
            border: 1px solid;
        }
        .header-row {
            border-bottom: 1px solid #ccc;
        }
        .permissions-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .table > tbody > tr > td.permissions-item {
            padding: 1px;
            padding-left: 8px;
        }

        .header-name {
            cursor: pointer;
        }

    </style>

<?php echo \Illuminate\View\Factory::parentPlaceholder('content'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inputFields'); ?>
<!-- Name -->
<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <label for="name" class="col-md-3 control-label"><?php echo e(trans('admin/groups/titles.group_name')); ?></label>
    <div class="col-md-6 required">
        <input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name', $group->name)); ?>" />
        <?php echo $errors->first('name', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

    </div>
</div>
<div class="col-md-12">

    <table class="table table-striped permissions">
        <thead>
        <tr class="permissions-row">
            <th class="col-md-5"><?php echo e(trans('admin/groups/titles.permission')); ?></th>
            <th class="col-md-1"><?php echo e(trans('admin/groups/titles.grant')); ?></th>
            <th class="col-md-1"><?php echo e(trans('admin/groups/titles.deny')); ?></th>
        </tr>
        </thead>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area => $area_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- handle superadmin and reports, and anything else with only one option -->
            <?php $localPermission = $area_permission[0]; ?>
            <?php if(count($area_permission) == 1): ?>
            <tbody class="permissions-group">
                <tr class="header-row permissions-row">
                    <td class="col-md-5 tooltip-base permissions-item"
                        data-tooltip="true"
                        data-placement="right"
                        title="<?php echo e($localPermission['note']); ?>">
                            <?php if (! (empty($localPermission['label']))): ?>
                                <h2><?php echo e($area . ': ' . $localPermission['label']); ?></h2>
                            <?php else: ?>
                                <h2><?php echo e($area); ?></h2>
                            <?php endif; ?>
                    </td>
                    <td class="col-md-1 permissions-item">
                        <label for="<?php echo e('permission['.$localPermission['permission'].']'); ?>" style="form-control"><span class="sr-only"><?php echo e(trans('admin/groups/titles.allow')); ?> <?php echo e('permission['.$localPermission['permission'].']'); ?></span></label>
                        <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '1',(array_key_exists($localPermission['permission'], $groupPermissions) ? $groupPermissions[$localPermission['permission'] ] == '1' : null),['value'=>"grant", 'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

                    </td>
                    <td class="col-md-1 permissions-item">
                        <label for="<?php echo e('permission['.$localPermission['permission'].']'); ?>"><span class="sr-only"><?php echo e(trans('admin/groups/titles.deny')); ?> <?php echo e('permission['.$localPermission['permission'].']'); ?></span></label>
                        <?php echo e(Form::radio('permission['.$localPermission['permission'].']', '0',(array_key_exists($localPermission['permission'], $groupPermissions) ? $groupPermissions[$localPermission['permission'] ] == '0' : null),['value'=>"grant", 'aria-label'=> 'permission['.$localPermission['permission'].']'])); ?>

                    </td>
                </tr>
            </tbody>
            <?php else: ?>
            <tbody class="permission-group">
                <tr class="header-row permissions-row">
                    <td class="col-md-5 tooltip-base permissions-item header-name"
                        data-tooltip="true"
                        data-placement="right"
                        title="<?php echo e($localPermission['note']); ?>">
                        <h2><?php echo e($area); ?></h2>


                    </td>
                    <td class="col-md-1 permissions-item" style="vertical-align: bottom">
                        <label for="<?php echo e($area); ?>"><span class="sr-only"><?php echo e(trans('admin/groups/titles.allow')); ?> <?php echo e($area); ?></span></label>
                        <?php echo e(Form::radio("$area", '1',false,['value'=>"grant",  'data-checker-group' => str_slug($area), 'aria-label'=> $area])); ?>

                    </td>
                    <td class="col-md-1 permissions-item">
                        <label for="<?php echo e($area); ?>"><span class="sr-only"><?php echo e(trans('admin/groups/titles.deny')); ?> <?php echo e($area); ?></span></label>
                        <?php echo e(Form::radio("$area", '0',false,['value'=>"deny", 'data-checker-group' => str_slug($area), 'aria-label'=> $area])); ?>

                    </td>
                </tr>

                <?php $__currentLoopData = $area_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $this_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($this_permission['display']): ?>
                    <tr class="permissions-row">
                        <td
                                class="col-md-5 tooltip-base permissions-item"
                                data-tooltip="true"
                                data-placement="right"
                                title="<?php echo e($this_permission['note']); ?>">
                                <?php echo e($this_permission['label']); ?>

                        </td>
                        <td class="col-md-1 permissions-item">
                            <label for="<?php echo e('permission['.$this_permission['permission'].']'); ?>"><span class="sr-only"><?php echo e(trans('admin/groups/titles.allow')); ?> <?php echo e('permission['.$this_permission['permission'].']'); ?></span></label>
                            <?php echo e(Form::radio('permission['.$this_permission['permission'].']', '1',(array_key_exists($this_permission['permission'], $groupPermissions) ? $groupPermissions[$this_permission['permission'] ] == '1' : null),['class'=>'radiochecker-'.str_slug($area), 'aria-label'=>'permission['.$this_permission['permission'].']'])); ?>

                        </td>
                        <td class="col-md-1 permissions-item">
                            <label for="<?php echo e('permission['.$this_permission['permission'].']'); ?>"><span class="sr-only"><?php echo e(trans('admin/groups/titles.deny')); ?> <?php echo e('permission['.$this_permission['permission'].']'); ?></span></label>
                            <?php echo e(Form::radio('permission['.$this_permission['permission'].']', '0',(array_key_exists($this_permission['permission'], $groupPermissions) ? $groupPermissions[$this_permission['permission'] ] == '0' : null),['class'=>'radiochecker-'.str_slug($area), 'aria-label'=>'permission['.$this_permission['permission'].']'])); ?>

                        </td>

                    </tr>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>
        </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>

    <script nonce="<?php echo e(csrf_token()); ?>">

        $(document).ready(function(){

            $('.tooltip-base').tooltip({container: 'body'});
            $(".superuser").change(function() {
                var perms = $(this).val();
                if (perms =='1') {
                    $("#nonadmin").hide();
                } else {
                    $("#nonadmin").show();
                }
            });

            // Check/Uncheck all radio buttons in the group
            $('tr.header-row input:radio').change(function() {
                value = $(this).attr('value');
                area = $(this).data('checker-group');
                $('.radiochecker-'+area+'[value='+value+']').prop('checked', true);
            });


            $('.header-name').click(function() {
                $(this).parent().nextUntil('tr.header-row').slideToggle(500);
            });


        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/edit-form', [
    'createText' => trans('admin/groups/titles.create') ,
    'updateText' => trans('admin/groups/titles.update'),
    'item' => $group,
    'formAction' => ($group !== null && $group->id !== null) ? route('groups.update', ['group' => $group->id]) : route('groups.store'),

], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/groups/edit.blade.php ENDPATH**/ ?>