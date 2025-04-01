


<?php $__env->startSection('title'); ?>
 <?php echo e($consumable->name); ?>

 <?php echo e(trans('general.consumable')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-md-9">

    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs hidden-print">

        <li class="active">
          <a href="#checkedout" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fas fa-info-circle fa-2x" aria-hidden="true"></i>
            </span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
          </a>
        </li>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('consumables.files', $consumable)): ?>
          <li>
            <a href="#files" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="far fa-file fa-2x" aria-hidden="true"></i></span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('general.file_uploads')); ?>

                <?php echo ($consumable->uploads->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($consumable->uploads->count()).'</badge>' : ''; ?>

            </span>
            </a>
          </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $consumable)): ?>
          <li class="pull-right">
            <a href="#" data-toggle="modal" data-target="#uploadFileModal">
              <i class="fas fa-paperclip" aria-hidden="true"></i> <?php echo e(trans('button.upload')); ?>

            </a>
          </li>
        <?php endif; ?>

      </ul>

      <div class="tab-content">

        <div class="tab-pane active" id="checkedout">
              <div class="table-responsive">

                <table
                        data-cookie-id-table="consumablesCheckedoutTable"
                        data-pagination="true"
                        data-id-table="consumablesCheckedoutTable"
                        data-search="false"
                        data-side-pagination="server"
                        data-show-columns="true"
                        data-show-export="true"
                        data-show-footer="true"
                        data-show-refresh="true"
                        data-sort-order="asc"
                        data-sort-name="name"
                        id="consumablesCheckedoutTable"
                        class="table table-striped snipe-table"
                        data-url="<?php echo e(route('api.consumables.show.users', $consumable->id)); ?>"
                        data-export-options='{
                "fileName": "export-consumables-<?php echo e(str_slug($consumable->name)); ?>-checkedout-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
                  <thead>
                  <tr>
                    <th data-searchable="false" data-sortable="false" data-field="avatar" data-formatter="imageFormatter"><?php echo e(trans('general.image')); ?></th>
                    <th data-searchable="false" data-sortable="false" data-field="name" formatter="usersLinkFormatter"><?php echo e(trans('general.user')); ?></th>
                    <th data-searchable="false" data-sortable="false" data-field="created_at" data-formatter="dateDisplayFormatter">
                      <?php echo e(trans('general.date')); ?>

                    </th>
                    <th data-searchable="false" data-sortable="false" data-field="note"><?php echo e(trans('general.notes')); ?></th>
                    <th data-searchable="false" data-sortable="false" data-field="admin"><?php echo e(trans('general.admin')); ?></th>
                  </tr>
                  </thead>
                </table>
          </div>
        </div> <!-- close tab-pane div -->


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('consumables.files', $consumable)): ?>
          <div class="tab-pane" id="files">

            <div class="table-responsive">
              <table
                      data-cookie-id-table="consumableUploadsTable"
                      data-id-table="consumableUploadsTable"
                      id="consumableUploadsTable"
                      data-search="true"
                      data-pagination="true"
                      data-side-pagination="client"
                      data-show-columns="true"
                      data-show-export="true"
                      data-show-footer="true"
                      data-toolbar="#upload-toolbar"
                      data-show-refresh="true"
                      data-sort-order="asc"
                      data-sort-name="name"
                      class="table table-striped snipe-table"
                      data-export-options='{
                    "fileName": "export-consumables-uploads-<?php echo e(str_slug($consumable->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","delete","download","icon"]
                    }'>
                <thead>
                <tr>
                  <th data-visible="true" data-field="icon" data-sortable="true"><?php echo e(trans('general.file_type')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="image"><?php echo e(trans('general.image')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="filename" data-sortable="true"><?php echo e(trans('general.file_name')); ?></th>
                  <th class="col-md-1" data-searchable="true" data-visible="true" data-field="filesize"><?php echo e(trans('general.filesize')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="notes" data-sortable="true"><?php echo e(trans('general.notes')); ?></th>
                  <th class="col-md-1" data-searchable="true" data-visible="true" data-field="download"><?php echo e(trans('general.download')); ?></th>
                  <th class="col-md-2" data-searchable="true" data-visible="true" data-field="created_at" data-sortable="true"><?php echo e(trans('general.created_at')); ?></th>
                  <th class="col-md-1" data-searchable="true" data-visible="true" data-field="actions"><?php echo e(trans('table.actions')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if($consumable->uploads->count() > 0): ?>
                  <?php $__currentLoopData = $consumable->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i>
                        <span class="sr-only"><?php echo e(Helper::filetype_icon($file->filename)); ?></span>

                      </td>
                      <td>
                        <?php if($file->filename): ?>
                          <?php if( Helper::checkUploadIsImage($file->get_src('consumables'))): ?>
                            <a href="<?php echo e(route('show.consumablefile', ['consumableId' => $consumable->id, 'fileId' => $file->id, 'download' => 'false'])); ?>" data-toggle="lightbox" data-type="image"><img src="<?php echo e(route('show.consumablefile', ['consumableId' => $consumable->id, 'fileId' => $file->id])); ?>" class="img-thumbnail" style="max-width: 50px;"></a>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php echo e($file->filename); ?>

                      </td>
                      <td data-value="<?php echo e((Storage::exists('private_uploads/consumables/'.$file->filename) ? Storage::size('private_uploads/consumables/'.$file->filename) : '')); ?>">
                        <?php echo e(@Helper::formatFilesizeUnits(Storage::exists('private_uploads/consumables/'.$file->filename) ? Storage::size('private_uploads/consumables/'.$file->filename) : '')); ?>

                      </td>

                      <td>
                        <?php if($file->note): ?>
                          <?php echo nl2br(Helper::parseEscapedMarkedownInline($file->note)); ?>

                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if($file->filename): ?>
                          <a href="<?php echo e(route('show.consumablefile', [$consumable->id, $file->id])); ?>" class="btn btn-sm btn-default">
                            <i class="fas fa-download" aria-hidden="true"></i>
                            <span class="sr-only"><?php echo e(trans('general.download')); ?></span>
                          </a>

                          <a href="<?php echo e(route('show.consumablefile', [$consumable->id, $file->id, 'inline' => 'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
                            <i class="fa fa-external-link" aria-hidden="true"></i>
                          </a>
                        <?php endif; ?>
                      </td>
                      <td><?php echo e($file->created_at); ?></td>
                      <td>
                        <a class="btn delete-asset btn-danger btn-sm" href="<?php echo e(route('delete/consumablefile', [$consumable->id, $file->id])); ?>" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>" data-title="<?php echo e(trans('general.delete')); ?>">
                          <i class="fas fa-trash icon-white" aria-hidden="true"></i>
                          <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <tr>
                    <td colspan="8"><?php echo e(trans('general.no_results')); ?></td>
                  </tr>
                <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div> <!-- /.tab-pane -->
        <?php endif; ?>

      </div>
    </div>

  </div>


  <div class="col-md-3">

        <div class="box box-default">
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">


                <?php if($consumable->image!=''): ?>
                <div class="col-md-12 text-center">
                  <a href="<?php echo e(Storage::disk('public')->url('consumables/'.e($consumable->image))); ?>" data-toggle="lightbox">
                      <img src="<?php echo e(Storage::disk('public')->url('consumables/'.e($consumable->image))); ?>" class="img-responsive img-thumbnail" alt="<?php echo e($consumable->name); ?>"></a>
                </div>
                <?php endif; ?>

                <?php if($consumable->purchase_date): ?>
                  <div class="col-md-12">
                    <strong><?php echo e(trans('general.purchase_date')); ?>: </strong>
                    <?php echo e(Helper::getFormattedDateObject($consumable->purchase_date, 'date', false)); ?>

                  </div>
                <?php endif; ?>

                <?php if($consumable->purchase_cost): ?>
                  <div class="col-md-12">
                    <strong><?php echo e(trans('general.purchase_cost')); ?>:</strong>
                    <?php echo e($snipeSettings->default_currency); ?>

                    <?php echo e(Helper::formatCurrencyOutput($consumable->purchase_cost)); ?>

                  </div>
                <?php endif; ?>

                <?php if($consumable->item_no): ?>
                  <div class="col-md-12">
                    <strong><?php echo e(trans('admin/consumables/general.item_no')); ?>:</strong>
                    <?php echo e($consumable->item_no); ?>

                  </div>
                <?php endif; ?>

                <?php if($consumable->model_number): ?>
                  <div class="col-md-12">
                    <strong><?php echo e(trans('general.model_no')); ?>:</strong>
                    <?php echo e($consumable->model_number); ?>

                  </div>
                <?php endif; ?>

                <?php if($consumable->manufacturer): ?>
                  <div class="col-md-12">
                    <strong><?php echo e(trans('general.manufacturer')); ?>:</strong>
                    <a href="<?php echo e(route('manufacturers.show', $consumable->manufacturer->id)); ?>"><?php echo e($consumable->manufacturer->name); ?></a>
                  </div>
                <?php endif; ?>

                <?php if($consumable->order_number): ?>
                  <div class="col-md-12">
                    <strong><?php echo e(trans('general.order_number')); ?>:</strong>
                    <?php echo e($consumable->order_number); ?>

                  </div>
                <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', \App\Models\Consumable::class)): ?>

      <div class="col-md-12">
        <br><br>
        <?php if($consumable->numRemaining() > 0): ?>
          <a href="<?php echo e(route('consumables.checkout.show', $consumable->id)); ?>" style="margin-bottom:10px; width:100%" class="btn btn-primary btn-sm">
            <?php echo e(trans('general.checkout')); ?>

          </a>
        <?php else: ?>
          <button style="margin-bottom:10px; width:100%" class="btn btn-primary btn-sm disabled">
            <?php echo e(trans('general.checkout')); ?>

          </button>
        <?php endif; ?>
      </div>

    <?php endif; ?>

    <?php if($consumable->notes): ?>

    <div class="col-md-12">
      <strong>
        <?php echo e(trans('general.notes')); ?>:
      </strong>
              </div>
    <div class="col-md-12">
      <?php echo nl2br(Helper::parseEscapedMarkedownInline($consumable->notes)); ?>

            </div>
          </div>
  <?php endif; ?>

    </div>

  </div> <!-- /.col-md-3-->
</div> <!-- /.row-->



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('consumables.files', \App\Models\Consumable::class)): ?>
  <?php echo $__env->make('modals.upload-file', ['item_type' => 'consumable', 'item_id' => $consumable->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'consumable' . $consumable->name . '-export', 'search' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/consumables/view.blade.php ENDPATH**/ ?>