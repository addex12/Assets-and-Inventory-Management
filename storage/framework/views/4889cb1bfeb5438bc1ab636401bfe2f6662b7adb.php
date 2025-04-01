<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/licenses/general.view')); ?>

 - <?php echo e($license->name); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-9">

    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      
      <ul class="nav nav-tabs hidden-print">

        <li class="active">
          <a href="#details" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fas fa-info-circle fa-2x" aria-hidden="true"></i>
            </span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
          </a>
        </li>

        <li>
          <a href="#seats" data-toggle="tab">
            <span class="hidden-lg hidden-md">
              <i class="far fa-list-alt fa-2x" aria-hidden="true"></i>
              </span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/licenses/form.seats')); ?></span>
              <span class="badge badge-secondary"><?php echo e(number_format($license->availCount()->count())); ?> / <?php echo e(number_format($license->seats)); ?></span>

            </a>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('licenses.files', $license)): ?>
        <li>
          <a href="#files" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="far fa-file fa-2x" aria-hidden="true"></i></span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.file_uploads')); ?>

              <?php echo ($license->uploads->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($license->uploads->count()).'</badge>' : ''; ?>

            </span>
          </a>
        </li>
        <?php endif; ?>

        <li>
          <a href="#history" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fas fa-history fa-2x" aria-hidden="true"></i></span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.history')); ?></span>
          </a>
        </li>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\License::class)): ?>
          <li class="pull-right"><a href="#" data-toggle="modal" data-target="#uploadFileModal">
              <i class="fas fa-paperclip" aria-hidden="true"></i> <?php echo e(trans('button.upload')); ?></a>
          </li>
        <?php endif; ?>
      </ul>

      <div class="tab-content">

        <div class="tab-pane active" id="details">
          <div class="row">
            <div class="col-md-12">
              <div class="container row-new-striped">

                <?php if(!is_null($license->company)): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong><?php echo e(trans('general.company')); ?></strong>
                    </div>
                    <div class="col-md-9">
                      <a href="<?php echo e(route('companies.show', $license->company->id)); ?>"><?php echo e($license->company->name); ?></a>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if($license->manufacturer): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong><?php echo e(trans('admin/hardware/form.manufacturer')); ?></strong>
                    </div>
                    <div class="col-md-9">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Manufacturer::class)): ?>
                        <a href="<?php echo e(route('manufacturers.show', $license->manufacturer->id)); ?>">
                          <?php echo e($license->manufacturer->name); ?>

                        </a>
                      <?php else: ?>
                        <?php echo e($license->manufacturer->name); ?>

                      <?php endif; ?>

                      <?php if($license->manufacturer->url): ?>
                        <br><i class="fas fa-globe-americas" aria-hidden="true"></i> <a href="<?php echo e($license->manufacturer->url); ?>" rel="noopener"><?php echo e($license->manufacturer->url); ?></a>
                      <?php endif; ?>

                      <?php if($license->manufacturer->support_url): ?>
                        <br><i class="far fa-life-ring" aria-hidden="true"></i>
                        <a href="<?php echo e($license->manufacturer->support_url); ?>"  rel="noopener"><?php echo e($license->manufacturer->support_url); ?></a>
                      <?php endif; ?>

                      <?php if($license->manufacturer->support_phone): ?>
                        <br><i class="fas fa-phone" aria-hidden="true"></i>
                        <a href="tel:<?php echo e($license->manufacturer->support_phone); ?>"><?php echo e($license->manufacturer->support_phone); ?></a>
                      <?php endif; ?>

                      <?php if($license->manufacturer->support_email): ?>
                        <br><i class="far fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo e($license->manufacturer->support_email); ?>"><?php echo e($license->manufacturer->support_email); ?></a>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>


                <?php if(!is_null($license->serial)): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong><?php echo e(trans('admin/licenses/form.license_key')); ?></strong>
                    </div>
                    <div class="col-md-9">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                        <span class="js-copy"><?php echo nl2br(e($license->serial)); ?></span>
                          <i class="fa-regular fa-clipboard js-copy-link" data-clipboard-target=".js-copy" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                            <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                          </i>
                      <?php else: ?>
                        ------------
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>


                <?php if($license->category): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong><?php echo e(trans('general.category')); ?></strong>
                    </div>
                    <div class="col-md-9">
                      <a href="<?php echo e(route('categories.show', $license->category->id)); ?>"><?php echo e($license->category->name); ?></a>
                    </div>
                  </div>
                <?php endif; ?>


                <?php if($license->license_name!=''): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong><?php echo e(trans('admin/licenses/form.to_name')); ?></strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo e($license->license_name); ?>

                    </div>
                  </div>
                <?php endif; ?>

                <?php if($license->license_email!=''): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('admin/licenses/form.to_email')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo e($license->license_email); ?>

                    </div>
                  </div>
                <?php endif; ?>


                <?php if($license->supplier): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <strong><?php echo e(trans('general.supplier')); ?></strong>
                      </div>
                      <div class="col-md-9">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Supplier::class)): ?>
                          <a href="<?php echo e(route('suppliers.show', $license->supplier->id)); ?>">
                            <?php echo e($license->supplier->name); ?>

                          </a>
                        <?php else: ?>
                          <?php echo e($license->supplier->name); ?>

                        <?php endif; ?>

                          <?php if($license->supplier->url): ?>
                            <br><i class="fas fa-globe-americas" aria-hidden="true"></i> <a href="<?php echo e($license->supplier->url); ?>" rel="noopener"><?php echo e($license->supplier->url); ?></a>
                          <?php endif; ?>

                          <?php if($license->supplier->phone): ?>
                            <br><i class="fas fa-phone" aria-hidden="true"></i>
                            <a href="tel:<?php echo e($license->supplier->phone); ?>"><?php echo e($license->supplier->phone); ?></a>
                          <?php endif; ?>

                          <?php if($license->supplier->email): ?>
                            <br><i class="far fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo e($license->supplier->email); ?>"><?php echo e($license->supplier->email); ?></a>
                          <?php endif; ?>

                          <?php if($license->supplier->address): ?>
                            <br><?php echo e($license->supplier->address); ?>

                          <?php endif; ?>
                          <?php if($license->supplier->address2): ?>
                            <br><?php echo e($license->supplier->address2); ?>

                          <?php endif; ?>
                          <?php if($license->supplier->city): ?>
                            <br><?php echo e($license->supplier->city); ?>,
                          <?php endif; ?>
                          <?php if($license->supplier->state): ?>
                            <?php echo e($license->supplier->state); ?>

                          <?php endif; ?>
                          <?php if($license->supplier->country): ?>
                            <?php echo e($license->supplier->country); ?>

                          <?php endif; ?>
                          <?php if($license->supplier->zip): ?>
                            <?php echo e($license->supplier->zip); ?>

                          <?php endif; ?>
                        
                      </div>
                    </div>
                <?php else: ?>
                    <?php echo e(trans('general.deleted')); ?>

                <?php endif; ?>


                <?php if(isset($license->expiration_date)): ?>
                <div class="row">
                  <div class="col-md-3">
                    <strong>
                      <?php echo e(trans('admin/licenses/form.expiration')); ?>

                    </strong>
                  </div>
                  <div class="col-md-9">
                    <?php echo e(Helper::getFormattedDateObject($license->expiration_date, 'date', false)); ?>

                  </div>
                </div>
                <?php endif; ?>

                <?php if($license->termination_date): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('admin/licenses/form.termination_date')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo e(Helper::getFormattedDateObject($license->termination_date, 'date', false)); ?>

                    </div>
                  </div>
                <?php endif; ?>


                <?php if($license->depreciation): ?>
                <div class="row">
                  <div class="col-md-3">
                    <strong>
                      <?php echo e(trans('admin/hardware/form.depreciation')); ?>

                    </strong>
                  </div>
                  <div class="col-md-9">
                    <?php echo e($license->depreciation->name); ?>

                    (<?php echo e($license->depreciation->months); ?>

                    <?php echo e(trans('admin/hardware/form.months')); ?>

                    )
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <strong>
                      <?php echo e(trans('admin/hardware/form.depreciates_on')); ?>

                    </strong>
                  </div>
                  <div class="col-md-9">
                    <?php echo e(Helper::getFormattedDateObject($license->depreciated_date(), 'date', false)); ?>

                  </div>
                </div>


                <div class="row">
                  <div class="col-md-3">
                    <strong>
                      <?php echo e(trans('admin/hardware/form.fully_depreciated')); ?>

                    </strong>
                  </div>
                  <div class="col-md-9">
                    <?php if($license->time_until_depreciated()->y > 0): ?>
                      <?php echo e($license->time_until_depreciated()->y); ?>

                      <?php echo e(trans('admin/hardware/form.years')); ?>,
                    <?php endif; ?>
                    <?php echo e($license->time_until_depreciated()->m); ?>

                    <?php echo e(trans('admin/hardware/form.months')); ?>

                  </div>
                </div>
                <?php endif; ?>

                  <?php if($license->purchase_order): ?>
                <div class="row">
                  <div class="col-md-3">
                    <strong>
                      <?php echo e(trans('admin/licenses/form.purchase_order')); ?>

                    </strong>
                  </div>
                  <div class="col-md-9">
                    <?php echo e($license->purchase_order); ?>

                  </div>
                </div>
                  <?php endif; ?>


                <?php if(isset($license->purchase_date)): ?>
                <div class="row">
                  <div class="col-md-3">
                    <strong><?php echo e(trans('general.purchase_date')); ?></strong>
                  </div>
                  <div class="col-md-9">
                    <?php echo e(Helper::getFormattedDateObject($license->purchase_date, 'date', false)); ?>


                  </div>
                </div>
                  <?php endif; ?>

                  <?php if($license->purchase_cost > 0): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('general.purchase_cost')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo e($snipeSettings->default_currency); ?>

                      <?php echo e(Helper::formatCurrencyOutput($license->purchase_cost)); ?>

                    </div>
                  </div>
                  <?php endif; ?>

                  <?php if($license->order_number): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('general.order_number')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo e($license->order_number); ?>

                    </div>
                  </div>
                  <?php endif; ?>

                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('admin/licenses/form.maintained')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo $license->maintained ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                    </div>
                  </div>

                  <?php if(($license->seats) && ($license->seats) > 0): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('admin/licenses/form.seats')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">

                      <?php if($license->remaincount()  <= ($license->min_amt - \App\Models\Setting::getSettings()->alert_threshold)): ?>
                        <span data-tooltip="true" title="<?php echo e(trans('admin/licenses/general.below_threshold', ['remaining_count' => $license->remaincount(), 'min_amt' => $license->min_amt])); ?>"><i class="fas fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                        <span class="sr-only"><?php echo e(trans('general.warning')); ?></span>
                        </span>
                      <?php endif; ?>

                      <?php echo e($license->seats); ?>

                        <?php if($license->remaincount()  <= ($license->min_amt - \App\Models\Setting::getSettings()->alert_threshold)): ?>

                        <?php endif; ?>

                    </div>
                  </div>
                  <?php endif; ?>


                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('admin/licenses/form.reassignable')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo $license->reassignable ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                    </div>
                  </div>


                  <?php if($license->notes): ?>
                  <div class="row">
                    <div class="col-md-3">
                      <strong>
                        <?php echo e(trans('general.notes')); ?>

                      </strong>
                    </div>
                    <div class="col-md-9">
                      <?php echo nl2br(Helper::parseEscapedMarkedownInline($license->notes)); ?>

                    </div>
                  </div>
                  <?php endif; ?>

              </div> <!-- end row-striped -->
            </div>


          </div>
       </div> <!-- end tab-pane -->



        <div class="tab-pane" id="seats">
          <div class="row">
            <div class="col-md-12">

              <div class="table-responsive">

                <table
                        data-columns="<?php echo e(\App\Presenters\LicensePresenter::dataTableLayoutSeats()); ?>"
                        data-cookie-id-table="seatsTable"
                        data-id-table="seatsTable"
                        id="seatsTable"
                        data-pagination="true"
                        data-search="false"
                        data-side-pagination="server"
                        data-show-columns="true"
                        data-show-fullscreen="true"
                        data-show-export="true"
                        data-show-refresh="true"
                        data-sort-order="asc"
                        data-sort-name="name"
                        class="table table-striped snipe-table"
                        data-url="<?php echo e(route('api.licenses.seats.index', $license->id)); ?>"
                        data-export-options='{
                        "fileName": "export-seats-<?php echo e(str_slug($license->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
                        "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                        }'>
                </table>

              </div>

            </div>

          </div> <!--/.row-->
        </div> <!-- /.tab-pane -->

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('licenses.files', $license)): ?>
        <div class="tab-pane" id="files">
          <div class="table-responsive">
            <table
                data-cookie-id-table="licenseUploadsTable"
                data-id-table="licenseUploadsTable"
                id="licenseUploadsTable"
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
                    "fileName": "export-license-uploads-<?php echo e(str_slug($license->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
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
            <?php if($license->uploads->count() > 0): ?>
              <?php $__currentLoopData = $license->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i>
                  <span class="sr-only"><?php echo e(Helper::filetype_icon($file->filename)); ?></span>

                </td>
                <td>
                  <?php if($file->filename): ?>
                    <?php if((Storage::exists('private_uploads/licenses/'.$file->filename)) && ( Helper::checkUploadIsImage($file->get_src('licenses')))): ?>
                      <a href="<?php echo e(route('show.licensefile', ['licenseId' => $license->id, 'fileId' => $file->id, 'download' => 'false'])); ?>" data-toggle="lightbox" data-type="image"><img src="<?php echo e(route('show.licensefile', ['licenseId' => $license->id, 'fileId' => $file->id])); ?>" class="img-thumbnail" style="max-width: 50px;"></a>
                    <?php endif; ?>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if(Storage::exists('private_uploads/licenses/'.$file->filename)): ?>
                    <?php echo e($file->filename); ?>

                  <?php else: ?>
                    <del><?php echo e($file->filename); ?></del>
                  <?php endif; ?>
                </td>
                <td data-value="<?php echo e((Storage::exists('private_uploads/licenses/'.$file->filename)) ? Storage::size('private_uploads/licenses/'.$file->filename) : ''); ?>">
                  <?php echo e((Storage::exists('private_uploads/licenses/'.$file->filename)) ? Helper::formatFilesizeUnits(Storage::size('private_uploads/licenses/'.$file->filename)) : ''); ?>

                </td>

                <td>
                  <?php if($file->note): ?>
                    <?php echo e($file->note); ?>

                  <?php endif; ?>
                </td>
                <td>
                  <?php if($file->filename): ?>
                    <a href="<?php echo e(route('show.licensefile', [$license->id, $file->id])); ?>" class="btn btn-sm btn-default">
                      <i class="fas fa-download" aria-hidden="true"></i>
                      <span class="sr-only"><?php echo e(trans('general.download')); ?></span>
                    </a>

                    <a href="<?php echo e(route('show.licensefile', [$license->id, $file->id, 'inline' => 'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
                      <i class="fa fa-external-link" aria-hidden="true"></i>
                    </a>

                  <?php endif; ?>
                </td>
                <td><?php echo e($file->created_at); ?></td>
                <td>
                  <a class="btn delete-asset btn-danger btn-sm" href="<?php echo e(route('delete/licensefile', [$license->id, $file->id])); ?>" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>" data-title="<?php echo e(trans('general.delete')); ?>">
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

        <div class="tab-pane" id="history">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
              <table
                      class="table table-striped snipe-table"
                      data-cookie-id-table="licenseHistoryTable"
                      data-id-table="licenseHistoryTable"
                      id="licenseHistoryTable"
                      data-pagination="true"
                      data-show-columns="true"
                      data-side-pagination="server"
                      data-show-refresh="true"
                      data-show-export="true"
                      data-sort-order="desc"
                      data-export-options='{
                       "fileName": "export-<?php echo e(str_slug($license->name)); ?>-history-<?php echo e(date('Y-m-d')); ?>",
                       "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                     }'
                      data-url="<?php echo e(route('api.activity.index', ['item_id' => $license->id, 'item_type' => 'license'])); ?>">

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
              </div>
            </div> <!-- /.col-md-12-->


          </div> <!-- /.row-->
        </div> <!-- /.tab-pane -->

      </div> <!-- /.tab-content -->

    </div> <!-- nav-tabs-custom -->
  </div>  <!-- /.col -->
  <div class="col-md-3">

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $license)): ?>
      <a href="<?php echo e(route('licenses.edit', $license->id)); ?>" class="btn btn-block btn-primary" style="margin-bottom: 10px;"><?php echo e(trans('admin/licenses/general.edit')); ?></a>
      <a href="<?php echo e(route('clone/license', $license->id)); ?>" class="btn btn-block btn-primary" style="margin-bottom: 10px;"><?php echo e(trans('admin/licenses/general.clone')); ?></a>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', $license)): ?>

      <?php if($license->availCount()->count() > 0): ?>
        <a href="<?php echo e(route('licenses.checkout', $license->id)); ?>" class="btn-block btn bg-maroon" style="margin-bottom: 10px;">
          <?php echo e(trans('general.checkout')); ?>

        </a>
        <a href="#" class="btn-block btn bg-maroon" style="margin-bottom: 10px;" data-toggle="modal" data-tooltip="true" title="<?php echo e(trans('admin/licenses/general.bulk.checkout_all.enabled_tooltip')); ?>" data-target="#checkoutFromAllModal">
          <?php echo e(trans('admin/licenses/general.bulk.checkout_all.button')); ?>

        </a>

      <?php else: ?>
        <a href="<?php echo e(route('licenses.checkout', $license->id)); ?>" class="btn btn-block bg-maroon disabled" style="margin-bottom: 10px;">
          <?php echo e(trans('general.checkout')); ?>

        </a>
        <span data-tooltip="true" title=" <?php echo e(trans('admin/licenses/general.bulk.checkout_all.disabled_tooltip')); ?>">
                    <a href="#" class="btn btn-block bg-maroon disabled" style="margin-bottom: 10px;" data-tooltip="true" title="<?php echo e(trans('general.checkout')); ?>">
                      <?php echo e(trans('admin/licenses/general.bulk.checkout_all.button')); ?>

                    </a>
                  </span>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', $license)): ?>
  
      <?php if(($license->seats - $license->availCount()->count()) <= 0 ): ?>
        <span data-tooltip="true" title=" <?php echo e(trans('admin/licenses/general.bulk.checkin_all.disabled_tooltip')); ?>">
            <a href="#" class="btn btn-block bg-purple disabled" style="margin-bottom: 25px;">
             <?php echo e(trans('admin/licenses/general.bulk.checkin_all.button')); ?>

            </a>
        </span>
      <?php elseif(! $license->reassignable): ?>
        <span data-tooltip="true" title=" <?php echo e(trans('admin/licenses/general.bulk.checkin_all.disabled_tooltip_reassignable')); ?>">
            <a href="#" class="btn btn-block bg-purple disabled" style="margin-bottom: 25px;">
             <?php echo e(trans('admin/licenses/general.bulk.checkin_all.button')); ?>

            </a>
        </span>
      <?php else: ?>
        <a href="#" class="btn btn-block bg-purple" style="margin-bottom: 25px;" data-toggle="modal" data-tooltip="true"  data-target="#checkinFromAllModal" data-content="<?php echo e(trans('general.sure_to_delete')); ?> data-title="<?php echo e(trans('general.delete')); ?>" onClick="return false;">
          <?php echo e(trans('admin/licenses/general.bulk.checkin_all.button')); ?>

        </a>
      <?php endif; ?>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $license)): ?>

      <?php if($license->availCount()->count() == $license->seats): ?>
        <button class="btn btn-block btn-danger delete-asset" data-toggle="modal" data-title="<?php echo e(trans('general.delete')); ?>" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $license->name])); ?>" data-target="#dataConfirmModal">
          <?php echo e(trans('general.delete')); ?>

        </button>
      <?php else: ?>
          <span data-tooltip="true" title=" <?php echo e(trans('admin/licenses/general.delete_disabled')); ?>">
            <a href="#" class="btn btn-block btn-danger disabled">
              <?php echo e(trans('general.delete')); ?>

            </a>
          </span>
      <?php endif; ?>
    <?php endif; ?>
  </div>

</div> <!-- /.row -->


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', \App\Models\License::class)): ?>
  <?php echo $__env->make('modals.confirm-action',
        [
            'modal_name' => 'checkinFromAllModal',
            'route' => route('licenses.bulkcheckin', $license->id),
            'title' => trans('general.modal_confirm_generic'),
            'body' => trans_choice('admin/licenses/general.bulk.checkin_all.modal', 2, ['checkedout_seats_count' => $checkedout_seats_count])
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', \App\Models\License::class)): ?>
  <?php echo $__env->make('modals.confirm-action',
        [
            'modal_name' => 'checkoutFromAllModal',
            'route' => route('licenses.bulkcheckout', $license->id),
            'title' => trans('general.modal_confirm_generic'),
            'body' => trans_choice('admin/licenses/general.bulk.checkout_all.modal', 2, ['available_seats_count' => $available_seats_count])
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\License::class)): ?>
  <?php echo $__env->make('modals.upload-file', ['item_type' => 'license', 'item_id' => $license->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/licenses/view.blade.php ENDPATH**/ ?>