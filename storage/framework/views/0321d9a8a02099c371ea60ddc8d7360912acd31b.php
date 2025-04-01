<?php $__env->startSection('title'); ?>
    <?php echo e($company->name); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">


                    <li class="active">
                        <a href="#asset_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="fas fa-barcode" aria-hidden="true"></i>
                            </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.assets')); ?>

                                <?php echo ($company->assets()->AssetsForShow()->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($company->assets()->AssetsForShow()->count()).'</badge>' : ''; ?>


                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#licenses_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="far fa-save"></i>
                            </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.licenses')); ?>

                                <?php echo ($company->licenses->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($company->licenses->count()).'</badge>' : ''; ?>

                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#accessories_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="far fa-keyboard"></i>
                            </span> <span class="hidden-xs hidden-sm"><?php echo e(trans('general.accessories')); ?>

                                <?php echo ($company->accessories->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($company->accessories->count()).'</badge>' : ''; ?>

                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#consumables_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="fas fa-tint"></i></span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.consumables')); ?>

                                <?php echo ($company->consumables->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($company->consumables->count()).'</badge>' : ''; ?>

                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#components_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="far fa-hdd"></i></span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.components')); ?>

                                <?php echo (($company->components) && ($company->components->count() > 0 )) ? '<badge class="badge badge-secondary">'.number_format($company->components->count()).'</badge>' : ''; ?>

                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#users_tab" data-toggle="tab">
                            <span class="hidden-lg hidden-md">
                            <i class="fas fa-users"></i></span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.people')); ?>

                                <?php echo (($company->users) && ($company->users->count() > 0 )) ? '<badge class="badge badge-secondary">'.number_format($company->users->count()).'</badge>' : ''; ?>

                            </span>
                        </a>
                    </li>



                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="asset_tab">
                        <!-- checked out assets table -->
                        <div class="table table-responsive">
                            <?php echo $__env->make('partials.asset-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <table
                                    data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                                    data-cookie-id-table="assetsListingTable"
                                    data-pagination="true"
                                    data-id-table="assetsListingTable"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    data-toolbar="#assetsBulkEditToolbar"
                                    data-bulk-button-id="#bulkAssetEditButton"
                                    data-bulk-form-id="#assetsBulkForm"
                                    data-click-to-select="true"
                                    id="assetsListingTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.assets.index',['company_id' => $company->id])); ?>"
                                    data-export-options='{
                              "fileName": "export-companies-<?php echo e(str_slug($company->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                            </table>
                        </div>
                    </div><!-- /asset_tab -->

                    <div class="tab-pane" id="licenses_tab">
                        <div class="table-responsive">

                            <table
                                    data-columns="<?php echo e(\App\Presenters\LicensePresenter::dataTableLayout()); ?>"
                                    data-cookie-id-table="licensesTable"
                                    data-pagination="true"
                                    data-id-table="licensesTable"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    id="licensesTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.licenses.index',['company_id' => $company->id])); ?>"
                                    data-export-options='{
                              "fileName": "export-companies-<?php echo e(str_slug($company->name)); ?>-licenses-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                            </table>

                        </div>
                    </div><!-- /licenses-tab -->

                    <div class="tab-pane" id="accessories_tab">
                        <div class="table-responsive">

                            <table
                                    data-columns="<?php echo e(\App\Presenters\AccessoryPresenter::dataTableLayout()); ?>"
                                    data-cookie-id-table="accessoriesTable"
                                    data-pagination="true"
                                    data-id-table="accessoriesTable"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    id="accessoriesTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.accessories.index',['company_id' => $company->id])); ?>"
                                    data-export-options='{
                              "fileName": "export-companies-<?php echo e(str_slug($company->name)); ?>-accessories-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                            </table>

                        </div>
                    </div><!-- /accessories-tab -->

                    <div class="tab-pane" id="consumables_tab">
                        <div class="table-responsive">

                            <table
                                    data-columns="<?php echo e(\App\Presenters\ConsumablePresenter::dataTableLayout()); ?>"
                                    data-cookie-id-table="consumablesTable"
                                    data-pagination="true"
                                    data-id-table="consumablesTable"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    id="consumablesTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.consumables.index',['company_id' => $company->id])); ?>"
                                    data-export-options='{
                              "fileName": "export-companies-<?php echo e(str_slug($company->name)); ?>-consumables-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                            </table>

                        </div>
                    </div><!-- /consumables-tab -->

                    <div class="tab-pane" id="components_tab">
                        <div class="table-responsive">

                            <table
                                    data-columns="<?php echo e(\App\Presenters\ComponentPresenter::dataTableLayout()); ?>"
                                    data-cookie-id-table="componentsTable"
                                    data-pagination="true"
                                    data-id-table="componentsTable"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    id="componentsTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.components.index',['company_id' => $company->id])); ?>"
                                    data-export-options='{
                              "fileName": "export-companies-<?php echo e(str_slug($company->name)); ?>-components-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>

                            </table>
                        </div>
                    </div><!-- /consumables-tab -->

                    <div class="tab-pane" id="users_tab">
                        <div class="table-responsive">

                            <table
                                    data-columns="<?php echo e(\App\Presenters\UserPresenter::dataTableLayout()); ?>"
                                    data-cookie-id-table="usersTable"
                                    data-pagination="true"
                                    data-id-table="usersTable"
                                    data-search="true"
                                    data-side-pagination="server"
                                    data-show-columns="true"
                                    data-show-export="true"
                                    data-show-refresh="true"
                                    data-sort-order="asc"
                                    id="usersTable"
                                    class="table table-striped snipe-table"
                                    data-url="<?php echo e(route('api.users.index',['company_id' => $company->id])); ?>"
                                    data-export-options='{
                              "fileName": "export-companies-<?php echo e(str_slug($company->name)); ?>-users-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>

                            </table>
                        </div>
                    </div><!-- /consumables-tab -->




                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('moar_scripts'); ?>
    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/companies/view.blade.php ENDPATH**/ ?>