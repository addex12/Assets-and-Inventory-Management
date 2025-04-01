



<?php $__env->startSection('title'); ?>
  <?php echo e(trans('admin/custom_fields/general.manage')); ?> <?php echo e(trans('admin/custom_fields/general.custom_fields')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\CustomFieldset::class)): ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">

      <div class="box-header with-border">
        <h2 class="box-title"><?php echo e(trans('admin/custom_fields/general.fieldsets')); ?></h2>
        <div class="box-tools pull-right">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\CustomFieldset::class)): ?>
          <a href="<?php echo e(route('fieldsets.create')); ?>" class="btn btn-sm btn-primary" data-tooltip="true" title="<?php echo e(trans('admin/custom_fields/general.create_fieldset_title')); ?>"><?php echo e(trans('admin/custom_fields/general.create_fieldset')); ?></a>
          <?php endif; ?>
        </div>
      </div><!-- /.box-header -->

      <div class="box-body">
        <table
                data-cookie-id-table="customFieldsetsTable"
                data-id-table="customFieldsetsTable"
                data-search="true"
                data-side-pagination="client"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="name"
                id="customFieldsTable"
                class="table table-striped snipe-table"
                data-export-options='{
                "fileName": "export-fieldsets-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
          <thead>
            <tr>
              <th><?php echo e(trans('general.name')); ?></th>
              <th><?php echo e(trans('admin/custom_fields/general.qty_fields')); ?></th>
              <th><?php echo e(trans('admin/custom_fields/general.used_by_models')); ?></th>
              <th><?php echo e(trans('table.actions')); ?></th>
            </tr>
          </thead>

          <?php if(isset($custom_fieldsets)): ?>
          <tbody>
            <?php $__currentLoopData = $custom_fieldsets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                <?php echo e(link_to_route("fieldsets.show",$fieldset->name,['fieldset' => $fieldset->id])); ?>

              </td>
              <td>
                <?php echo e($fieldset->fields->count()); ?>

              </td>
              <td>
                <?php $__currentLoopData = $fieldset->models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(route('models.show', $model->id)); ?>" class="label label-default"><?php echo e($model->name); ?><?php echo e(($model->model_number) ? ' ('.$model->model_number.')' : ''); ?></a>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </td>
              <td>

                <nobr>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $fieldset)): ?>

                  <a href="<?php echo e(route('fieldsets.show', ['fieldset' => $fieldset->id])); ?>" data-tooltip="true" title="<?php echo e(trans('general.edit_fieldset')); ?>">
                    <button type="submit" class="btn btn-info btn-sm">
                      <i class="fa-regular fa-rectangle-list"></i>
                    </button>
                  </a>

                  <a href="<?php echo e(route('fieldsets.edit', $fieldset->id)); ?>" class="btn btn-warning btn-sm" data-tooltip="true" title="<?php echo e(trans('general.update')); ?>">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo e(trans('button.edit')); ?></span>
                  </a>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $fieldset)): ?>
                <?php echo e(Form::open(['route' => array('fieldsets.destroy', $fieldset->id), 'method' => 'delete','style' => 'display:inline-block'])); ?>

                  <?php if($fieldset->models->count() > 0): ?>
                  <button type="submit" class="btn btn-danger btn-sm disabled" data-tooltip="true" title="<?php echo e(trans('general.cannot_be_deleted')); ?>" disabled><i class="fas fa-trash"></i></button>
                  <?php else: ?>
                  <button type="submit" class="btn btn-danger btn-sm" data-tooltip="true" title="<?php echo e(trans('general.delete')); ?>"><i class="fas fa-trash"></i></button>
                  <?php endif; ?>
                <?php echo e(Form::close()); ?>

                <?php endif; ?>
                  </nobr>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <?php endif; ?>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box.box-default -->

  </div> <!-- .col-md-12-->


</div> <!-- .row-->
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\CustomField::class)): ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h2 class="box-title"><?php echo e(trans('admin/custom_fields/general.custom_fields')); ?></h2>
        <div class="box-tools pull-right">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\CustomField::class)): ?>
          <a href="<?php echo e(route('fields.create')); ?>" class="btn btn-sm btn-primary" data-tooltip="true" title="<?php echo e(trans('admin/custom_fields/general.create_field_title')); ?>"><?php echo e(trans('admin/custom_fields/general.create_field')); ?></a>
          <?php endif; ?>
        </div>

      </div><!-- /.box-header -->
      <div class="box-body">

        <div class="table-responsive">
        <table
                data-cookie-id-table="customFieldsTable"
                data-id-table="customFieldsTable"
                data-search="true"
                data-side-pagination="client"
                data-show-columns="true"
                data-show-export="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="name"
                id="customFieldsTable"
                class="table table-striped snipe-table"
                data-export-options='{
                "fileName": "export-fields-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
          <thead>
            <tr>
              <th data-sortable="true" data-searchable="true"><?php echo e(trans('general.name')); ?></th>
              <th data-sortable="true" data-searchable="true"><?php echo e(trans('admin/custom_fields/general.help_text')); ?></th>
              <th data-sortable="true" data-searchable="true"><?php echo e(trans('admin/custom_fields/general.unique')); ?></th>
              <th data-sortable="true" data-visible="false"><?php echo e(trans('admin/custom_fields/general.db_field')); ?></th>
              <th data-sortable="true" data-searchable="true"><?php echo e(trans('admin/custom_fields/general.field_format')); ?></th>
              <th data-sortable="true"><i class="fa fa-lock" aria-hidden="true"></i>
                <span class="hidden-xs hidden-sm hidden-md hidden-lg"><?php echo e(trans('admin/custom_fields/general.encrypted')); ?></span>
              </th>
              <th data-sortable="true" class="text-center"><i class="fa fa-list" aria-hidden="true"></i>
                <span class="hidden-xs hidden-sm hidden-md hidden-lg"><?php echo e(trans('admin/custom_fields/general.show_in_listview_short')); ?></span>
              </th>
              <th data-visible="false" data-sortable="true" class="text-center"><i class="fa fa-eye" aria-hidden="true"><span class="sr-only">Visible to User</span></i></th>
              <th data-sortable="true" data-searchable="true" class="text-center"><i class="fa fa-envelope" aria-hidden="true"><span class="sr-only"><?php echo e(trans('admin/custom_fields/general.show_in_email_short')); ?></span></i></th>
              <th data-sortable="true" data-searchable="true" class="text-center"><i class="fa fa-laptop fa-fw" aria-hidden="true"><span class="sr-only"><?php echo e(trans('admin/custom_fields/general.show_in_requestable_list_short')); ?></span></i></th>
              <th data-sortable="true" data-searchable="true" class="text-center"><i class="fa-solid fa-fingerprint"><span class="sr-only"><?php echo e(trans('admin/custom_fields/general.unique')); ?></span></i></th>
              <th data-sortable="true" data-searchable="true" class="text-center"><?php echo e(trans('admin/custom_fields/general.field_element_short')); ?></th>
              <th data-searchable="true"><?php echo e(trans('admin/custom_fields/general.fieldsets')); ?></th>
              <th><?php echo e(trans('button.actions')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($field->name); ?></td>
              <td><?php echo e($field->help_text); ?></td>

              <td class="text-center"><?php echo ($field->is_unique=='1') ? '<i class="fas fa-check text-success" aria-hidden="true"><span class="sr-only">'.trans('general.yes').'</span></i>' : '<i class="fas fa-times text-danger" aria-hidden="true"><span class="sr-only">'.trans('general.no').'</span></i>'; ?></td>
              <td>
                 <code><?php echo e($field->convertUnicodeDbSlug()); ?></code>
                <?php if($field->convertUnicodeDbSlug()!=$field->db_column): ?>
                  <br><i class="fas fa-exclamation-triangle text-danger"></i>
                  <?php echo trans('admin/custom_fields/general.db_convert_warning',['db_column' => $field->db_column, 'expected' => $field->convertUnicodeDbSlug()]); ?>

                <?php endif; ?>
              </td>
              <td><?php echo e($field->format); ?></td>
              <td class="text-center"><?php echo ($field->field_encrypted=='1' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'); ?></td>
              <td class="text-center"><?php echo ($field->show_in_listview=='1' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'); ?></td>
              <td class="text-center"><?php echo ($field->display_in_user_view=='1' ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times text-danger"></i>'); ?></td>
              <td class="text-center"><?php echo ($field->show_in_email=='1') ? '<i class="fas fa-check text-success" aria-hidden="true"><span class="sr-only">'.trans('general.yes').'</span></i>' : '<i class="fas fa-times text-danger" aria-hidden="true"><span class="sr-only">'.trans('general.no').'</span></i>'; ?></td>
              <td class="text-center"><?php echo ($field->show_in_requestable_list=='1') ? '<i class="fas fa-check text-success" aria-hidden="true"><span class="sr-only">'.trans('general.yes').'</span></i>' : '<i class="fas fa-times text-danger" aria-hidden="true"><span class="sr-only">'.trans('general.no').'</span></i>'; ?></td>
              <td class="text-center"><?php echo ($field->is_unique=='1') ? '<i class="fas fa-check text-success" aria-hidden="true"><span class="sr-only">'.trans('general.yes').'</span></i>' : '<i class="fas fa-times text-danger" aria-hidden="true"><span class="sr-only">'.trans('general.no').'</span></i>'; ?></td>
              <td><?php echo e($field->element); ?></td>
              <td>
                <?php $__currentLoopData = $field->fieldset; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(route('fieldsets.show', $fieldset->id)); ?>" class="label label-default"><?php echo e($fieldset->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </td>
              <td>
                <nobr>
                  <?php echo e(Form::open(array('route' => array('fields.destroy', $field->id), 'method' => 'delete', 'style' => 'display:inline-block'))); ?>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $field)): ?>
                    <a href="<?php echo e(route('fields.edit', $field->id)); ?>" class="btn btn-warning btn-sm" data-tooltip="true" title="<?php echo e(trans('general.update')); ?>">
                      <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                      <span class="sr-only"><?php echo e(trans('button.edit')); ?></span>
                    </a>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $field)): ?>

                  <?php if($field->fieldset->count()>0): ?>
                    <button type="submit" class="btn btn-danger btn-sm disabled" data-tooltip="true" title="<?php echo e(trans('general.cannot_be_deleted')); ?>" disabled>
                      <i class="fas fa-trash" aria-hidden="true"></i>
                      <span class="sr-only"><?php echo e(trans('button.delete')); ?></span></button>
                  <?php else: ?>
                    <button type="submit" class="btn btn-danger btn-sm" data-tooltip="true" title="<?php echo e(trans('general.delete')); ?>">
                      <i class="fas fa-trash" aria-hidden="true"></i>
                      <span class="sr-only"><?php echo e(trans('button.delete')); ?></span>
                    </button>
                  <?php endif; ?>

                <?php endif; ?>
                  <?php echo e(Form::close()); ?>

                </nobr>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div> <!-- /.col-md-9-->
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', [
    'helpText' => trans('admin/custom_fields/general.about_fieldsets_text'),
    'helpPosition' => 'right',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/custom_fields/index.blade.php ENDPATH**/ ?>