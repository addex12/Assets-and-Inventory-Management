


<?php $__env->startSection('title'); ?>
  <?php echo e(trans('admin/custom_fields/general.custom_fields')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(route('fields.index')); ?>" class="btn btn-primary pull-right">
        <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header with-border">
        <h2 class="box-title"><?php echo e($custom_fieldset->name); ?> <?php echo e(trans('admin/custom_fields/general.fieldset')); ?></h2>
        <div class="box-tools pull-right">
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table
          name="fieldsets" id="sort" class="table table-responsive todo-list">
          <thead>
            <tr>
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $custom_fieldset)): ?>
              <th class="col-md-1"><span class="sr-only"><?php echo e(trans('admin/custom_fields/general.reorder')); ?></span></th>
              <?php endif; ?>
              <th class="col-md-1" style="display: none;"><?php echo e(trans('admin/custom_fields/general.order')); ?></th>
              <th class="col-md-3"><?php echo e(trans('admin/custom_fields/general.field_name')); ?></th>
              <th class="col-md-2"><?php echo e(trans('admin/custom_fields/general.field_format')); ?></th>
              <th class="col-md-2"><?php echo e(trans('admin/custom_fields/general.field_element')); ?></th>
              <th class="col-md-1"><?php echo e(trans('admin/custom_fields/general.encrypted')); ?></th>
              <th class="col-md-1"><?php echo e(trans('admin/custom_fields/general.required')); ?></th>
              <th class="col-md-1"><span class="sr-only"><?php echo e(trans('button.remove')); ?></span></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $custom_fieldset->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="<?php echo e(Auth::user()->can('update', $custom_fieldset)?'cansort':''); ?>" data-index="<?php echo e($field->pivot->custom_field_id); ?>" id="item_<?php echo e($field->pivot->custom_field_id); ?>">
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $custom_fieldset)): ?>
              <td>
                <!-- drag handle -->
                <span class="handle">
                <i class="fas fa-ellipsis-v"></i>
                <i class="fas fa-ellipsis-v"></i>
                </span>
              </td>
              <?php endif; ?>
              <td class="index" style="display: none;"><?php echo e($field->pivot->order + 1); ?></td> 
              <td><?php echo e($field->name); ?></td>
              <td><?php echo e($field->format); ?></td>
              <td><?php echo e($field->element); ?></td>
              <td><?php echo e($field->field_encrypted=='1' ?  trans('general.yes') : trans('general.no')); ?></td>
                <td>

                    <?php if($field->pivot->required): ?>
                    <form method="post" action="<?php echo e(route('fields.optional', [$custom_fieldset->id, $field->id])); ?>">
                      <?php echo csrf_field(); ?> 
                      <button type="submit" class="btn btn-link"><i class="fa fa-check text-success" aria-hidden="true"></i></button>
                      </form>

                    <?php else: ?>

                      <form method="post" action="<?php echo e(route('fields.required', [$custom_fieldset->id, $field->id])); ?>">
                      <?php echo csrf_field(); ?> 
                      <button type="submit" class="btn btn-link"><i class="fa fa-times text-danger" aria-hidden="true"></i></button>
                      </form>
                    <?php endif; ?>

                </td>
              <td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $custom_fieldset)): ?>
                <form method="post" action="<?php echo e(route('fields.disassociate', [$field, $custom_fieldset->id])); ?>">
                  <?php echo csrf_field(); ?> 
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash icon-white" aria-hidden="true"></i></button>
                </form>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $custom_fieldset)): ?>
          <tfoot>
            <tr>
              <td colspan="8">
                <?php echo e(Form::open(['route' =>
                ["fieldsets.associate",$custom_fieldset->id],
                'class'=>'form-inline',
                'id' => 'ordering'])); ?>



                <div class="form-group">
                  <label for="field_id" class="sr-only">
                    <?php echo e(trans('admin/custom-field/general.add_field_to_fieldset')); ?>

                  </label>
                  <?php echo e(Form::select("field_id",$custom_fields_list,"",['aria-label'=>'field_id', 'class'=>'select2', 'style' => 'min-width:400px;'])); ?>


                </div>

                <div class="form-group" style="display: none;">
                  <?php echo e(Form::text('order', $maxid, array('aria-label'=>'order', 'maxlength'=>'3', 'size'=>'3'))); ?>

                  <label for="order"><?php echo e(trans('admin/custom_fields/general.order')); ?></label>
                </div>

                <div class="checkbox-inline">
                    <label>
                    <?php echo e(Form::checkbox('required', 'on', old('required'))); ?>

                      <span style="padding-left: 10px;"><?php echo e(trans('admin/custom_fields/general.required')); ?></span>
                    </label>
                </div>

                <span style="padding-left: 10px;">
                  <button type="submit" class="btn btn-primary"> <?php echo e(trans('general.save')); ?></button>
                </span>

                <?php echo e(Form::close()); ?>


              </td>
            </tr>
          </tfoot>
          <?php endif; ?>
        </table>
      </div> <!-- /.box-body-->
    </div> <!-- /.box.box-default-->
  </div> <!-- /.col-md-12-->
</div> <!--/.row-->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $custom_fieldset)): ?>

  <script nonce="<?php echo e(csrf_token()); ?>">
  var fixHelperModified = function(e, tr) {
      var $originals = tr.children();
      var $helper = tr.clone();
      $helper.children().each(function(index) {
          $(this).width($originals.eq(index).width())
      });
      return $helper;
  },
      updateIndex = function(e, ui) {
          $('td.index', ui.item.parent()).each(function (i) {
              $(this).html(i + 1);
              $.ajax({
                method: "POST",
                url: "<?php echo e(route('api.customfields.order', $custom_fieldset->id)); ?>",
                headers: {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                data: $("#sort tbody").sortable('serialize', {
                }),

                success: function(data) {
                    //console.log('ajax fired');
                    // do some stuff here


                }
      	    });
          });
      };

  // this uses the jquery UI sortable method, NOT the query-dragtable library
  $("#sort tbody").sortable({
      helper: fixHelperModified,
      stop: updateIndex
  }).disableSelection();
</script>
  <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/custom_fields/fieldsets/view.blade.php ENDPATH**/ ?>