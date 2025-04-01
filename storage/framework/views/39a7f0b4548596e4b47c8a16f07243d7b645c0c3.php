<?php $__env->startSection('title0'); ?>
  <?php echo e(trans('admin/hardware/general.requestable')); ?>

  <?php echo e(trans('general.assets')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('title'); ?>
    <?php echo $__env->yieldContent('title0'); ?>  <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">


        <?php if(($assets->count() < 1) && ($models->count() < 1)): ?>

            <div class="col-md-12">
                <div class="alert alert-info fade in">
                    <i class="fas fa-info-circle faa-pulse animated"></i>
                    <strong><?php echo e(trans('general.notification_info')); ?>: </strong>
                    <?php echo e(trans('general.no_requestable')); ?>

                </div>
            </div>

        <?php else: ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <?php if($assets->count() > 0): ?>
                <li class="active">
                    <a href="#assets" data-toggle="tab" title="<?php echo e(trans('general.assets')); ?>"><?php echo e(trans('general.assets')); ?>

                        <badge class="badge badge-secondary"> <?php echo e($assets->count()); ?></badge>
                    </a>               
                </li>
                <?php endif; ?>
                <?php if($models->count() > 0): ?>
                <li>
                    <a href="#models" data-toggle="tab" title="<?php echo e(trans('general.asset_models')); ?>"><?php echo e(trans('general.asset_models')); ?>

                        <badge class="badge badge-secondary"> <?php echo e($models->count()); ?></badge>
                    </a>                   
                </li>
                <?php endif; ?>
            </ul>
            <div class="tab-content">
                <?php if($assets->count() > 0): ?>
                <div class="tab-pane fade in active" id="assets">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="table-responsive">
                                    <table
                                        data-click-to-select="true"
                                        data-cookie-id-table="requestableAssetsListingTable"
                                        data-pagination="true"
                                        data-id-table="requestableAssetsListingTable"
                                        data-search="true"
                                        data-side-pagination="server"
                                        data-show-columns="true"
                                        data-show-export="false"
                                        data-show-footer="false"
                                        data-show-refresh="true"
                                        data-sort-order="asc"
                                        data-sort-name="name"
                                        data-toolbar="#assetsBulkEditToolbar"
                                        data-bulk-button-id="#bulkAssetEditButton"
                                        data-bulk-form-id="#assetsBulkForm"
                                        id="assetsListingTable"
                                        class="table table-striped snipe-table"
                                        data-url="<?php echo e(route('api.assets.requestable', ['requestable' => true])); ?>">

                                        <thead>
                                            <tr>
                                                <th class="col-md-1" data-field="image" data-formatter="imageFormatter" data-sortable="true"><?php echo e(trans('general.image')); ?></th>
                                                <th class="col-md-2" data-field="asset_tag" data-sortable="true" ><?php echo e(trans('general.asset_tag')); ?></th>                                                
                                                <th class="col-md-2" data-field="model" data-sortable="true"><?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                                                <th class="col-md-2" data-field="model_number" data-sortable="true"><?php echo e(trans('admin/models/table.modelnumber')); ?></th>
                                                <th class="col-md-2" data-field="name" data-sortable="true"><?php echo e(trans('admin/hardware/form.name')); ?></th>
                                                <th class="col-md-3" data-field="serial" data-sortable="true"><?php echo e(trans('admin/hardware/table.serial')); ?></th>
                                                <th class="col-md-2" data-field="location" data-sortable="true"><?php echo e(trans('admin/hardware/table.location')); ?></th>
                                                <th class="col-md-2" data-field="status" data-sortable="true"><?php echo e(trans('admin/hardware/table.status')); ?></th>
                                                <th class="col-md-2" data-field="expected_checkin" data-formatter="dateDisplayFormatter" data-sortable="true"><?php echo e(trans('admin/hardware/form.expected_checkin')); ?></th>

                                                <?php $__currentLoopData = \App\Models\CustomField::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(($field->field_encrypted=='0') && ($field->show_in_requestable_list=='1')): ?>
                                                        <th class="col-md-2" data-field="custom_fields.<?php echo e($field->db_column); ?>" data-sortable="true"><?php echo e($field->name); ?></th>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th class="col-md-1" data-formatter="assetRequestActionsFormatter" data-field="actions" data-sortable="false"><?php echo e(trans('table.actions')); ?></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($models->count() > 0): ?>
                <div class="tab-pane fade in <?php echo e(($assets->count() == 0) ? 'active' : ''); ?>" id="models">
                    <div class="row">
                        <div class="col-md-12">
                                <table
                                        name="requested-assets"
                                        data-toolbar="#toolbar"
                                        class="table table-striped snipe-table"
                                        id="table"
                                        data-advanced-search="true"
                                        data-id-table="advancedTable"
                                        data-cookie-id-table="requestableAssets">
                                <thead>
                                    <tr role="row">
                                        <th class="col-md-1" data-sortable="true"><?php echo e(trans('general.image')); ?></th>
                                        <th class="col-md-6" data-sortable="true"><?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                                        <th class="col-md-3" data-sortable="true"><?php echo e(trans('admin/accessories/general.remaining')); ?></th>

                                        <th class="col-md-2 actions" data-sortable="false"><?php echo e(trans('table.actions')); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requestableModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>

                                                <td>

                                                    <?php if($requestableModel->image): ?>
                                                        <a href="<?php echo e(config('app.url')); ?>/uploads/models/<?php echo e($requestableModel->image); ?>" data-toggle="lightbox" data-type="image">
                                                            <img src="<?php echo e(config('app.url')); ?>/uploads/models/<?php echo e($requestableModel->image); ?>" style="max-height: <?php echo e($snipeSettings->thumbnail_max_h); ?>px; width: auto;" class="img-responsive">
                                                        </a>
                                                    <?php endif; ?>

                                                </td>

                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\AssetModel::class)): ?>
                                                        <a href="<?php echo e(route('models.show', ['model' => $requestableModel->id])); ?>"><?php echo e($requestableModel->name); ?></a>
                                                    <?php else: ?>
                                                        <?php echo e($requestableModel->name); ?>

                                                    <?php endif; ?>
                                                </td>

                                                <td><?php echo e($requestableModel->assets->where('requestable', '1')->count()); ?></td>

                                                <td>
                                                    <form  action="<?php echo e(route('account/request-item', ['itemType' => 'asset_model', 'itemId' => $requestableModel->id])); ?>" method="POST" accept-charset="utf-8">
                                                        <?php echo e(csrf_field()); ?>

                                                    <input type="text" style="width: 70px; margin-right: 10px;" class="form-control pull-left" name="request-quantity" value="" placeholder="<?php echo e(trans('general.qty')); ?>">
                                                    <?php if($requestableModel->isRequestedBy(Auth::user())): ?>
                                                        <?php echo e(Form::submit(trans('button.cancel'), ['class' => 'btn btn-danger btn-sm'])); ?>

                                                    <?php else: ?>
                                                        <?php echo e(Form::submit(trans('button.request'), ['class' => 'btn btn-primary btn-sm'])); ?>

                                                    <?php endif; ?>
                                                    </form>
                                                </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div> <!-- .tab-content-->
        </div> <!-- .nav-tabs-custom -->

        <?php endif; ?>
    </div> <!-- .col-md-12> -->
</div> <!-- .row -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', [
        'exportFile' => 'requested-export',
        'search' => true,
        'clientSearch' => true,
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script nonce="<?php echo e(csrf_token()); ?>">

    $( "a[name='Request']").click(function(event) {
        // event.preventDefault();
        quantity = $(this).closest('td').siblings().find('input').val();
        currentUrl = $(this).attr('href');
        // $(this).attr('href', currentUrl + '?quantity=' + quantity);
        // alert($(this).attr('href'));
    });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/account/requestable-assets.blade.php ENDPATH**/ ?>