<?php $__env->startSection('title'); ?>
    <?php echo e($model->name); ?>

    <?php echo e(($model->model_number) ? '(#'.$model->model_number.')' : ''); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\AssetModel::class)): ?>
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo e(trans('button.actions')); ?>

                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <?php if($model->deleted_at==''): ?>
                    <li><a href="<?php echo e(route('models.edit', $model->id)); ?>"><?php echo e(trans('admin/models/table.edit')); ?></a></li>
                    <li><a href="<?php echo e(route('models.clone.create', $model->id)); ?>"><?php echo e(trans('admin/models/table.clone')); ?></a></li>
                    <li><a href="<?php echo e(route('hardware.create', ['model_id' => $model->id])); ?>"><?php echo e(trans('admin/hardware/form.create')); ?></a></li>
                <?php else: ?>
                    <li><a href="<?php echo e(route('models.restore.store', $model->id)); ?>"><?php echo e(trans('admin/models/general.restore')); ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="row">
    <div class="col-md-9">
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#assets" data-toggle="tab">

                        <span class="hidden-lg hidden-md">
                          <i class="fas fa-barcode fa-2x"></i>
                        </span>
                                    <span class="hidden-xs hidden-sm">
                            <?php echo e(trans('general.assets')); ?>

                                        <?php echo ($model->assets_count > 0 ) ? '<badge class="badge badge-secondary">'.number_format($model->assets_count).'</badge>' : ''; ?>

                        </span>
                    </a>
                </li>

                <li>
                    <a href="#uploads" data-toggle="tab">

                        <span class="hidden-lg hidden-md">
                          <i class="fas fa-barcode fa-2x"></i>
                        </span>
                        <span class="hidden-xs hidden-sm">
                            <?php echo e(trans('general.files')); ?>

                            <?php echo ($model->uploads->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($model->uploads->count()).'</badge>' : ''; ?>

                          </span>
                    </a>
                </li>
                <li class="pull-right">
                    <a href="#" data-toggle="modal" data-target="#uploadFileModal">
                        <i class="fas fa-paperclip" aria-hidden="true"></i>
                        <?php echo e(trans('button.upload')); ?>

                    </a>
                </li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="assets">

                    <?php echo $__env->make('partials.asset-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <table
                            data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                            data-cookie-id-table="assetListingTable"
                            data-pagination="true"
                            data-id-table="assetListingTable"
                            data-search="true"
                            data-side-pagination="server"
                            data-show-columns="true"
                            data-show-fullscreen="true"
                            data-toolbar="#assetsBulkEditToolbar"
                            data-bulk-button-id="#bulkAssetEditButton"
                            data-bulk-form-id="#assetsBulkForm"
                            data-click-to-select="true"
                            data-show-export="true"
                            data-show-refresh="true"
                            data-sort-order="asc"
                            id="assetListingTable"
                            data-url="<?php echo e(route('api.assets.index',['model_id'=> $model->id])); ?>"
                            class="table table-striped snipe-table"
                            data-export-options='{
                "fileName": "export-models-<?php echo e(str_slug($model->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
                    </table>
                    <?php echo e(Form::close()); ?>

                </div> <!-- /.tab-pane assets -->


                <div class="tab-pane fade" id="uploads">

                    <div class="row">
                        <div class="col-md-12">

                            <?php if($model->uploads->count() > 0): ?>
                                <table
                                        class="table table-striped snipe-table"
                                        id="modelFileHistory"
                                        data-pagination="true"
                                        data-id-table="modelFileHistory"
                                        data-search="true"
                                        data-side-pagination="client"
                                        data-sortable="true"
                                        data-show-columns="true"
                                        data-show-fullscreen="true"
                                        data-show-refresh="true"
                                        data-sort-order="desc"
                                        data-sort-name="created_at"
                                        data-show-export="true"
                                        data-export-options='{
                         "fileName": "export-asset-<?php echo e($model->id); ?>-files",
                         "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                       }'
                                        data-cookie-id-table="assetFileHistory">
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

                                    <?php $__currentLoopData = $model->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i></td>
                                            <td>
                                                <?php if((Storage::exists('private_uploads/assetmodels/'.$file->filename)) && ( Helper::checkUploadIsImage($file->get_src('assetmodels')))): ?>
                                                    <a href="<?php echo e(route('show/modelfile', ['modelID' => $model->id, 'fileId' => $file->id])); ?>" data-toggle="lightbox" data-type="image" data-title="<?php echo e($file->filename); ?>">
                                                        <img src="<?php echo e(route('show/modelfile', ['modelID' => $model->id, 'fileId' =>$file->id])); ?>" style="max-width: 50px;">
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(Storage::exists('private_uploads/assetmodels/'.$file->filename)): ?>
                                                    <?php echo e($file->filename); ?>

                                                <?php else: ?>
                                                    <del><?php echo e($file->filename); ?></del>
                                                <?php endif; ?>
                                            </td>
                                            <td data-value="<?php echo e((Storage::exists('private_uploads/assetmodels/'.$file->filename)) ? Storage::size('private_uploads/assetmodels/'.$file->filename) : ''); ?>">
                                                <?php echo e((Storage::exists('private_uploads/assetmodels/'.$file->filename)) ? Helper::formatFilesizeUnits(Storage::size('private_uploads/assetmodels/'.$file->filename)) : ''); ?>

                                            </td>
                                            <td>
                                                <?php if($file->note): ?>
                                                    <?php echo e($file->note); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(($file->filename) && (Storage::exists('private_uploads/assetmodels/'.$file->filename))): ?>
                                                    <a href="<?php echo e(route('show/modelfile', [$model->id, $file->id])); ?>" class="btn btn-sm btn-default">
                                                        <i class="fas fa-download" aria-hidden="true"></i>
                                                    </a>

                                                    <a href="<?php echo e(route('show/modelfile', [$model->id, $file->id, 'inline'=>'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
                                                        <i class="fa fa-external-link" aria-hidden="true"></i>
                                                    </a>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($file->created_at): ?>
                                                    <?php echo e(Helper::getFormattedDateObject($file->created_at, 'datetime', false)); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\AssetModel::class)): ?>
                                                    <a class="btn delete-asset btn-sm btn-danger btn-sm" href="<?php echo e(route('delete/assetfile', [$model->id, $file->id])); ?>" data-tooltip="true" data-title="Delete" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>"><i class="fas fa-trash icon-white" aria-hidden="true"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                            <?php else: ?>

                                <div class="alert alert-info alert-block">
                                    <i class="fas fa-info-circle"></i>
                                    <?php echo e(trans('general.no_results')); ?>

                                </div>
                            <?php endif; ?>

                        </div> <!-- /.col-md-12 -->
                    </div> <!-- /.row -->

                </div>


            </div> <!-- /.tab-content -->
        </div>  <!-- /.nav-tabs-custom -->
    </div><!-- /. col-md-12 -->

    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <div class="box-heading">
                            <h2 class="box-title"> <?php echo e(trans('general.moreinfo')); ?>:</h2>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">



                <?php if($model->image): ?>
                    <img src="<?php echo e(Storage::disk('public')->url(app('models_upload_path').e($model->image))); ?>" class="img-responsive"></li>
                <?php endif; ?>


                <ul class="list-unstyled" style="line-height: 25px;">
                    <?php if($model->category): ?>
                        <li><?php echo e(trans('general.category')); ?>:
                            <a href="<?php echo e(route('categories.show', $model->category->id)); ?>"><?php echo e($model->category->name); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if($model->created_at): ?>
                        <li><?php echo e(trans('general.created_at')); ?>:
                            <?php echo e(Helper::getFormattedDateObject($model->created_at, 'datetime', false)); ?>

                        </li>
                    <?php endif; ?>

                    <?php if($model->min_amt): ?>
                        <li><?php echo e(trans('general.min_amt')); ?>:
                           <?php echo e($model->min_amt); ?>

                        </li>
                    <?php endif; ?>

                    <?php if($model->manufacturer): ?>
                        <li>
                            <?php echo e(trans('general.manufacturer')); ?>:
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Manufacturer::class)): ?>
                                <a href="<?php echo e(route('manufacturers.show', $model->manufacturer->id)); ?>">
                                    <?php echo e($model->manufacturer->name); ?>

                                </a>
                            <?php else: ?>
                                <?php echo e($model->manufacturer->name); ?>

                            <?php endif; ?>
                        </li>

                        <?php if($model->manufacturer->url): ?>
                            <li>
                                <i class="fas fa-globe-americas"></i> <a href="<?php echo e($model->manufacturer->url); ?>"><?php echo e($model->manufacturer->url); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($model->manufacturer->support_url): ?>
                            <li>
                                <i class="far fa-life-ring"></i> <a href="<?php echo e($model->manufacturer->support_url); ?>"><?php echo e($model->manufacturer->support_url); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if($model->manufacturer->support_phone): ?>
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="tel:<?php echo e($model->manufacturer->support_phone); ?>"><?php echo e($model->manufacturer->support_phone); ?></a>

                            </li>
                        <?php endif; ?>

                        <?php if($model->manufacturer->support_email): ?>
                            <li>
                                <i class="far fa-envelope"></i> <a href="mailto:<?php echo e($model->manufacturer->support_email); ?>"><?php echo e($model->manufacturer->support_email); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($model->model_number): ?>
                        <li>
                            <?php echo e(trans('general.model_no')); ?>:
                            <?php echo e($model->model_number); ?>

                        </li>
                    <?php endif; ?>

                    <?php if($model->depreciation): ?>
                        <li>
                            <?php echo e(trans('general.depreciation')); ?>:
                            <?php echo e($model->depreciation->name); ?> (<?php echo e($model->depreciation->months.' '.trans('general.months')); ?>)
                        </li>
                    <?php endif; ?>

                    <?php if($model->eol): ?>
                        <li><?php echo e(trans('general.eol')); ?>:
                            <?php echo e($model->eol .' '. trans('general.months')); ?>

                        </li>
                    <?php endif; ?>

                    <?php if($model->fieldset): ?>
                        <li><?php echo e(trans('admin/models/general.fieldset')); ?>:
                            <a href="<?php echo e(route('fieldsets.show', $model->fieldset->id)); ?>"><?php echo e($model->fieldset->name); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if($model->notes): ?>
                        <li>
                            <?php echo e(trans('general.notes')); ?>:
                            <?php echo nl2br(Helper::parseEscapedMarkedownInline($model->notes)); ?>

                        </li>
                    <?php endif; ?>

                </ul>

                <?php if($model->note): ?>
                    Notes:
                    <p>
                        <?php echo $model->present()->note(); ?>

                    </p>
                <?php endif; ?>
            </div>
        </div>
        </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\AssetModel::class)): ?>
            <div class="col-md-12" style="padding-bottom: 5px;">
                <a href="<?php echo e(route('models.edit', $model->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print"><?php echo e(trans('admin/models/table.edit')); ?></a>
            </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\AssetModel::class)): ?>
            <div class="col-md-12" style="padding-bottom: 5px;">
                <a href="<?php echo e(route('models.clone.create', $model->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print"><?php echo e(trans('admin/models/table.clone')); ?></a>
            </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', \App\Models\AssetModel::class)): ?>
                <?php if($model->assets_count > 0): ?>
                    <div class="col-md-12" style="padding-bottom: 5px;">
                        <button class="btn btn-block btn-sm btn-primary hidden-print disabled" data-tooltip="true"  data-placement="top" data-title="<?php echo e(trans('general.cannot_be_deleted')); ?>"><?php echo e(trans('general.delete')); ?></button>
                    </div>
                <?php else: ?>

                <?php endif; ?>


               <div class="text-center col-md-12" style="padding-top: 30px; padding-bottom: 30px;">
                <?php if($model->deleted_at!=''): ?>
                    <form method="POST" action="<?php echo e(route('models.restore.store', $model->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <button style="width: 100%;" class="btn btn-sm btn-warning hidden-print"><?php echo e(trans('button.restore')); ?></button>
                    </form>
                <?php else: ?>
                    <button class="btn btn-block btn-sm btn-danger delete-asset" data-toggle="modal" title="<?php echo e(trans('general.delete_what', ['item'=> trans('general.asset_model')])); ?>" data-content="<?php echo e(trans('general.sure_to_delete_var', ['item' => $model->name])); ?>" data-target="#dataConfirmModal" data-tooltip="true"  data-placement="top" data-title="<?php echo e(trans('general.delete_what', ['item'=> trans('general.asset_model')])); ?>"><?php echo e(trans('general.delete')); ?> </button>
                    <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                <?php endif; ?>
               </div>

           <?php endif; ?>
        </div>
</div> <!-- /.row -->

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\AssetModel::class)): ?>
    <?php echo $__env->make('modals.upload-file', ['item_type' => 'models', 'item_id' => $model->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

    <?php echo $__env->make('partials.bootstrap-table', ['exportFile' => 'manufacturer' . $model->name . '-export', 'search' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/models/view.blade.php ENDPATH**/ ?>