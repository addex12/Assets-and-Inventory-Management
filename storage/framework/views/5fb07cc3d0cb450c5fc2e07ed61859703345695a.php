<?php $__env->startSection('title'); ?>

 <?php echo e($category->name); ?>

 <?php echo e(ucwords($category_type_route)); ?>


<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>

    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary" style="margin-right: 10px;">
        <?php echo e(trans('general.back')); ?></a>

<div class="btn-group pull-right">
  <button class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo e(trans('button.actions')); ?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo e(route('categories.edit', ['category' => $category->id])); ?>"><?php echo e(trans('admin/categories/general.edit')); ?></a></li>
    <li><a href="<?php echo e(route('categories.create')); ?>"><?php echo e(trans('general.create')); ?></a></li>
  </ul>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



    <div class="row">
        <div class="col-md-12">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#items" data-toggle="tab" title="<?php echo e(trans('general.items')); ?>"> <?php echo e(ucwords($category_type_route)); ?>

                            <?php if($category->category_type=='asset'): ?>
                            <badge class="badge badge-secondary"> <?php echo e($category->showableAssets()->count()); ?></badge>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php if($category->category_type=='asset'): ?>
                    <li>
                        <a href="#models" data-toggle="tab" title="<?php echo e(trans('general.asset_models')); ?>"><?php echo e(trans('general.asset_models')); ?>

                            <badge class="badge badge-secondary"> <?php echo e($category->models->count()); ?></badge>
                        </a>
                    </li>
                   <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="items">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <?php if($category->category_type=='asset'): ?>
                                        <?php echo $__env->make('partials.asset-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>

                                    <table

                                            <?php if($category->category_type=='asset'): ?>

                                            data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                                            data-cookie-id-table="categoryAssetsTable"
                                            id="categoryAssetsTable"
                                            data-id-table="categoryAssetsTable"
                                            data-toolbar="#assetsBulkEditToolbar"
                                            data-bulk-button-id="#bulkAssetEditButton"
                                            data-bulk-form-id="#assetsBulkForm"
                                            data-click-to-select="true"
                                            data-export-options='{
                    "fileName": "export-<?php echo e(str_slug($category->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                    }'
                                            <?php elseif($category->category_type=='accessory'): ?>
                                                data-columns="<?php echo e(\App\Presenters\AccessoryPresenter::dataTableLayout()); ?>"
                                            data-cookie-id-table="categoryAccessoryTable"
                                            id="categoryAccessoryTable"
                                            data-id-table="categoryAccessoryTable"
                                            data-export-options='{
                      "fileName": "export-<?php echo e(str_slug($category->name)); ?>-accessories-<?php echo e(date('Y-m-d')); ?>",
                      "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                      }'
                                            <?php elseif($category->category_type=='consumable'): ?>
                                                data-columns="<?php echo e(\App\Presenters\ConsumablePresenter::dataTableLayout()); ?>"
                                            data-cookie-id-table="categoryConsumableTable"
                                            id="categoryConsumableTable"
                                            data-id-table="categoryConsumableTable"
                                            data-export-options='{
                      "fileName": "export-<?php echo e(str_slug($category->name)); ?>-consumables-<?php echo e(date('Y-m-d')); ?>",
                      "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                      }'
                                            <?php elseif($category->category_type=='component'): ?>
                                                data-columns="<?php echo e(\App\Presenters\ComponentPresenter::dataTableLayout()); ?>"
                                            data-cookie-id-table="categoryCompomnentTable"
                                            id="categoryCompomnentTable"
                                            data-id-table="categoryCompomnentTable"
                                            data-export-options='{
                      "fileName": "export-<?php echo e(str_slug($category->name)); ?>-components-<?php echo e(date('Y-m-d')); ?>",
                      "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                      }'
                                            <?php elseif($category->category_type=='license'): ?>
                                                data-columns="<?php echo e(\App\Presenters\LicensePresenter::dataTableLayout()); ?>"
                                            data-cookie-id-table="categoryLicenseTable"
                                            id="categoryLicenseTable"
                                            data-id-table="categoryLicenseTable"
                                            data-export-options='{
                      "fileName": "export-<?php echo e(str_slug($category->name)); ?>-licenses-<?php echo e(date('Y-m-d')); ?>",
                      "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                      }'
                                            <?php endif; ?>

                                            data-pagination="true"
                                            data-search="true"
                                            data-show-footer="true"
                                            data-side-pagination="server"
                                            data-show-columns="true"
                                            data-show-export="true"
                                            data-show-refresh="true"
                                            data-sort-order="asc"
                                            class="table table-striped snipe-table"
                                            data-url="<?php echo e(route('api.'.$category_type_route.'.index',['category_id'=> $category->id])); ?>">

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="models">
                        <div class="row">
                            <div class="col-md-12">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\AssetModel::class)): ?>
                                <?php if($category->models->count() > 0): ?>
                                    <?php if($category->category_type=='asset'): ?>
                                        <?php echo $__env->make('partials.models-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>

                                    <table
                                            data-columns="<?php echo e(\App\Presenters\AssetModelPresenter::dataTableLayout()); ?>"
                                            data-cookie-id-table="asssetModelsTable"
                                            data-pagination="true"
                                            data-id-table="asssetModelsTable"
                                            data-search="true"
                                            data-show-footer="true"
                                            data-side-pagination="server"
                                            data-show-columns="true"
                                            data-toolbar="#modelsBulkEditToolbar"
                                            data-bulk-button-id="#bulkModelsEditButton"
                                            data-bulk-form-id="#modelsBulkForm"
                                            data-show-export="true"
                                            data-show-refresh="true"
                                            data-sort-order="asc"
                                            id="asssetModelsTable"
                                            class="table table-striped snipe-table"
                                            data-url="<?php echo e(route('api.models.index', ['status' => request('status'), 'category_id' => $category->id])); ?>"
                                            data-export-options='{
              "fileName": "export-models-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
                                    </table>

                            </div>
                        </div>
                    </div>

                </div> <!-- .tab-content-->
            </div> <!-- .nav-tabs-custom -->
        </div> <!-- .col-md-12> -->
    </div> <!-- .row -->
<?php $__env->stopSection(); ?>





<?php $__env->startSection('moar_scripts'); ?>
<?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/categories/view.blade.php ENDPATH**/ ?>