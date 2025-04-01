<?php $__env->startSection('title'); ?>

 <?php echo e($accessory->name); ?>

 <?php echo e(trans('general.accessory')); ?>

 <?php if($accessory->model_number!=''): ?>
     (<?php echo e($accessory->model_number); ?>)
 <?php endif; ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
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

                    <li>
                        <a href="#history" data-toggle="tab">
                        <span class="hidden-lg hidden-md">
                        <i class="fas fa-history fa-2x" aria-hidden="true"></i></span>
                        <span class="hidden-xs hidden-sm"><?php echo e(trans('general.history')); ?></span>
                        </a>
                    </li>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accessories.files', $accessory)): ?>
                        <li>
                            <a href="#files" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="far fa-file fa-2x" aria-hidden="true"></i></span>
                                <span class="hidden-xs hidden-sm"><?php echo e(trans('general.file_uploads')); ?>

                                    <?php echo ($accessory->uploads->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($accessory->uploads->count()).'</badge>' : ''; ?>

            </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $accessory)): ?>
                        <li class="pull-right">
                            <a href="#" data-toggle="modal" data-target="#uploadFileModal">
                                <i class="fas fa-paperclip" aria-hidden="true"></i> <?php echo e(trans('button.upload')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="checkedout">
                        <div class="table table-responsive">
                          <div class="row">
                              <div class="col-md-12">
                                <table
                                    data-cookie-id-table="usersTable"
                                    data-pagination="true"
                                    data-id-table="usersTable"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-fullscreen="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    id="usersTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.accessories.checkedout', $accessory->id)); ?>"
                                    data-export-options='{
                                    "fileName": "export-accessories-<?php echo e(str_slug($accessory->name)); ?>-users-<?php echo e(date('Y-m-d')); ?>",
                                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                                    }'>
                                <thead>
                                    <tr>
                                    <th data-searchable="false" data-formatter="usersLinkFormatter" data-sortable="false" data-field="name"><?php echo e(trans('general.user')); ?></th>
                                    <th data-searchable="false" data-sortable="false" data-field="checkout_notes"><?php echo e(trans('general.notes')); ?></th>
                                    <th data-searchable="false" data-formatter="dateDisplayFormatter" data-sortable="false" data-field="last_checkout"><?php echo e(trans('admin/hardware/table.checkout_date')); ?></th>
                                    <th data-searchable="false" data-sortable="false" data-field="actions" data-formatter="accessoriesInOutFormatter"><?php echo e(trans('table.actions')); ?></th>
                                    </tr>
                                </thead>
                                </table>
                            </div><!--col-md-9-->
                          </div> <!-- close tab-pane div -->
                        </div>
                    </div>

                    <!-- history tab pane -->
                     <div class="tab-pane fade" id="history">
                         <div class="table table-responsive">
                             <div class="row">
                                 <div class="col-md-12">
                                <table
                                        class="table table-striped snipe-table"
                                        data-cookie-id-table="AccessoryHistoryTable"
                                        data-id-table="AccessoryHistoryTable"
                                        id="AccessoryHistoryTable"
                                        data-pagination="true"
                                        data-show-columns="true"
                                        data-side-pagination="server"
                                        data-show-refresh="true"
                                        data-show-export="true"
                                        data-sort-order="desc"
                                        data-export-options='{
                       "fileName": "export-<?php echo e(str_slug($accessory->name)); ?>-history-<?php echo e(date('Y-m-d')); ?>",
                       "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                     }'
                                                data-url="<?php echo e(route('api.activity.index', ['item_id' => $accessory->id, 'item_type' => 'accessory'])); ?>">

                                            <thead>
                                            <tr>
                                                <th class="col-sm-2" data-visible="false" data-sortable="true" data-field="created_at" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.record_created')); ?></th>
                                                <th class="col-sm-2"data-visible="true" data-sortable="true" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                                                <th class="col-sm-2" data-sortable="true"  data-visible="true" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                                                <th class="col-sm-2" data-field="file" data-visible="false" data-formatter="fileUploadNameFormatter"><?php echo e(trans('general.file_name')); ?></th>
                                                <th class="col-sm-2" data-sortable="true"  data-visible="true" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                                                <th class="col-sm-2" data-visible="true" data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
                                                <th class="col-sm-2" data-sortable="true" data-visible="true" data-field="note"><?php echo e(trans('general.notes')); ?></th>
                                                <th class="col-sm-2" data-visible="true" data-field="action_date" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
                                                <?php if($snipeSettings->require_accept_signature=='1'): ?>
                                                    <th class="col-md-3" data-field="signature_file" data-visible="false"  data-formatter="imageFormatter"><?php echo e(trans('general.signature')); ?></th>
                                                <?php endif; ?>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div> <!-- /.col-md-12-->
                                </div> <!-- /.row-->
                            </div><!--tab history-->
                     </div>



                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accessories.files', $accessory)): ?>
                        <div class="tab-pane" id="files">

                            <div class="table table-responsive">
                                <div class="row">
                                    <div class="col-md-12">
                                <table
                                        data-cookie-id-table="accessoryUploadsTable"
                                        data-id-table="accessoryUploadsTable"
                                        id="accessoryUploadsTable"
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
            "fileName": "export-accessories-uploads-<?php echo e(str_slug($accessory->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
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
                                    <?php if($accessory->uploads->count() > 0): ?>
                                        <?php $__currentLoopData = $accessory->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i>
                                                    <span class="sr-only"><?php echo e(Helper::filetype_icon($file->filename)); ?></span>

                                                </td>
                                                <td>
                                                    <?php if($file->filename): ?>
                                                        <?php if( Helper::checkUploadIsImage($file->get_src('accessories'))): ?>
                                                            <a href="<?php echo e(route('show.accessoryfile', ['accessoryId' => $accessory->id, 'fileId' => $file->id, 'download' => 'false'])); ?>" data-toggle="lightbox" data-type="image"><img src="<?php echo e(route('show.accessoryfile', ['accessoryId' => $accessory->id, 'fileId' => $file->id])); ?>" class="img-thumbnail" style="max-width: 50px;"></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php echo e($file->filename); ?>

                                                </td>
                                                <td data-value="<?php echo e((Storage::exists('private_uploads/accessories/'.$file->filename) ? Storage::size('private_uploads/accessories/'.$file->filename) : '')); ?>">
                                                    <?php echo e(@Helper::formatFilesizeUnits(Storage::exists('private_uploads/accessories/'.$file->filename) ? Storage::size('private_uploads/accessories/'.$file->filename) : '')); ?>

                                                </td>

                                                <td>
                                                    <?php if($file->note): ?>
                                                        <?php echo e($file->note); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($file->filename): ?>
                                                        <a href="<?php echo e(route('show.accessoryfile', [$accessory->id, $file->id])); ?>" class="btn btn-sm btn-default">
                                                            <i class="fas fa-download" aria-hidden="true"></i>
                                                            <span class="sr-only"><?php echo e(trans('general.download')); ?></span>
                                                        </a>

                                                        <a href="<?php echo e(route('show.accessoryfile', [$accessory->id, $file->id, 'inline' => 'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
                                                            <i class="fa fa-external-link" aria-hidden="true"></i>
                                                        </a>

                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($file->created_at); ?></td>
                                                <td>
                                                    <a class="btn delete-asset btn-danger btn-sm" href="<?php echo e(route('delete/accessoryfile', [$accessory->id, $file->id])); ?>" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>" data-title="<?php echo e(trans('general.delete')); ?>">
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
                        </div>
                    </div>
                </div> <!-- /.tab-pane -->
                <?php endif; ?>
            </div>
        </div>
    </div>



<!-- side address column -->

<div class="col-md-3">

      <?php if($accessory->image!=''): ?>
          <div class="row">
              <div class="col-md-12 text-center" style="padding-bottom: 15px;">
                  <a href="<?php echo e(Storage::disk('public')->url('accessories/'.e($accessory->image))); ?>" data-toggle="lightbox"><img src="<?php echo e(Storage::disk('public')->url('accessories/'.e($accessory->image))); ?>" class="img-responsive img-thumbnail" alt="<?php echo e($accessory->name); ?>"></a>
              </div>
          </div>
      <?php endif; ?>

      <?php if($accessory->company): ?>
          <div class="row">
              <div class="col-md-3" style="padding-bottom: 15px;">
                  <strong> <?php echo e(trans('general.company')); ?></strong>
              </div>
              <div class="col-md-9">
                  <a href="<?php echo e(route('companies.show', $accessory->company->id)); ?>"><?php echo e($accessory->company->name); ?> </a>
              </div>
          </div>
      <?php endif; ?>


      <?php if($accessory->category): ?>
          <div class="row">
              <div class="col-md-3" style="padding-bottom: 10px;">
                  <strong><?php echo e(trans('general.category')); ?></strong>
              </div>
              <div class="col-md-9">
                  <a href="<?php echo e(route('categories.show', $accessory->category->id)); ?>"><?php echo e($accessory->category->name); ?> </a>
              </div>
          </div>
      <?php endif; ?>


      <?php if($accessory->notes): ?>
        <div class="row">
          <div class="col-md-3" style="padding-bottom: 10px;">
              <strong>
                  <?php echo e(trans('general.notes')); ?>

              </strong>
          </div>
          <div class="col-md-9">
              <?php echo nl2br(Helper::parseEscapedMarkedownInline($accessory->notes)); ?>

          </div>
       </div>

     <?php endif; ?>


      <div class="row">
          <div class="col-md-3" style="padding-bottom: 10px;">
              <strong><?php echo e(trans('admin/accessories/general.remaining')); ?></strong>
          </div>
          <div class="col-md-9">
              <?php echo e($accessory->numRemaining()); ?>

          </div>
      </div>

      <div class="row">
          <div class="col-md-3" style="padding-bottom: 10px;">
              <strong><?php echo e(trans('general.checked_out')); ?></strong>
          </div>
          <div class="col-md-9">
              <?php echo e($accessory->users_count); ?>

          </div>
      </div>
</div>

    <div class="col-md-3 pull-right">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', \App\Models\Accessory::class)): ?>
                <div class="text-center" style="padding-top:5px;">
                    <a href="<?php echo e(route('accessories.checkout.show', $accessory->id)); ?>" style="margin-right:5px; width:100%" class="btn btn-primary btn-sm" <?php echo e((($accessory->numRemaining() > 0 ) ? '' : ' disabled')); ?>><?php echo e(trans('general.checkout')); ?></a>
                </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Accessory::class)): ?>
               <div class="text-center" style="padding-top:5px;">
                  <a href="<?php echo e(route('accessories.edit', $accessory->id)); ?>" style="margin-right:5px; width:100%" class="btn btn-primary btn-sm"><?php echo e(trans('admin/accessories/general.edit')); ?></a>
               </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Accessory::class)): ?>
                <div class="text-center" style="padding-top:5px;">
                    <a href="<?php echo e(route('clone/accessories', $accessory->id)); ?>" style="margin-right:5px; width:100%" class="btn btn-primary btn-sm"><?php echo e(trans('admin/accessories/general.clone')); ?></a>
                </div>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $accessory)): ?>
            <?php if($accessory->users_count == 0): ?>
                <div class="text-center" style="padding-top:5px;">
                    <button class="btn btn-block btn-danger delete-asset" style="padding-top:5px;" data-toggle="modal" data-title="<?php echo e(trans('general.delete')); ?>" data-content="<?php echo e(trans('general.delete_confirm_no_undo', ['item' => $accessory->name])); ?>" data-target="#dataConfirmModal">
                    <?php echo e(trans('general.delete')); ?>

                    </button>
                </div>
            <?php else: ?>
                <div class="text-center" style="padding-top:5px;">
                    <span data-tooltip="true" title=" <?php echo e(trans('admin/accessories/general.delete_disabled')); ?>">
                        <a href="#" class="btn btn-block btn-danger disabled">
                        <?php echo e(trans('general.delete')); ?>

                        </a>
                    </span>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accessories.files', Accessory::class)): ?>
    <?php echo $__env->make('modals.upload-file', ['item_type' => 'accessory', 'item_id' => $accessory->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('moar_scripts'); ?>
    <script>
        $('#dataConfirmModal').on('show.bs.modal', function (event) {
            var content = $(event.relatedTarget).data('content');
            var title = $(event.relatedTarget).data('title');
            $(this).find(".modal-body").text(content);
            $(this).find(".modal-header").text(title);
        });
    </script>
<?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/accessories/view.blade.php ENDPATH**/ ?>