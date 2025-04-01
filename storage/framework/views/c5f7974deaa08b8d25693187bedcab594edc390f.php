<?php $__env->startSection('title'); ?>

  <?php echo e(trans('admin/suppliers/table.view')); ?> -
  <?php echo e($supplier->name); ?>

  
  <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('suppliers.edit', $supplier->id)); ?>" class="btn btn-default pull-right">
        <?php echo e(trans('admin/suppliers/table.update')); ?></a>

    <a href="<?php echo e(route('suppliers.index')); ?>" class="btn btn-primary text-right" style="margin-right: 10px;"><?php echo e(trans('general.back')); ?></a>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

  <div class="row">
    <div class="col-md-9">

      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs hidden-print">
          
          <li class="active">
            <a href="#assets" data-toggle="tab">

                <span class="hidden-lg hidden-md">
                    <i class="fas fa-barcode fa-2x" aria-hidden="true"></i>
                </span>
                <span class="hidden-xs hidden-sm">
                    <?php echo e(trans('general.assets')); ?>

                    <?php echo ($supplier->assets()->AssetsForShow()->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($supplier->assets()->AssetsForShow()->count()).'</badge>' : ''; ?>

               </span>

            </a>
          </li>

          <li>
            <a href="#accessories" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <i class="far fa-keyboard fa-2x" aria-hidden="true"></i>
                    </span>
              <span class="hidden-xs hidden-sm">
                          <?php echo e(trans('general.accessories')); ?>

                          <?php echo ($supplier->accessories->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($supplier->accessories->count()).'</badge>' : ''; ?>

                    </span>
            </a>
          </li>

          <li>
            <a href="#licenses" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <i class="far fa-save fa-2x" aria-hidden="true"></i>
                    </span>
              <span class="hidden-xs hidden-sm">
                          <?php echo e(trans('general.licenses')); ?>

                          <?php echo ($supplier->licenses->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($supplier->licenses->count()).'</badge>' : ''; ?>

                    </span>
            </a>
          </li>

            <li>
                <a href="#components" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <i class="far fa-save fa-2x" aria-hidden="true"></i>
                    </span>
                    <span class="hidden-xs hidden-sm">
                          <?php echo e(trans('general.components')); ?>

                        <?php echo ($supplier->components->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($supplier->components->count()).'</badge>' : ''; ?>

                    </span>
                </a>
            </li>

            <li>
                <a href="#consumables" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <i class="far fa-save fa-2x" aria-hidden="true"></i>
                    </span>
                    <span class="hidden-xs hidden-sm">
                          <?php echo e(trans('general.consumables')); ?>

                        <?php echo ($supplier->consumables->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($supplier->consumables->count()).'</badge>' : ''; ?>

                    </span>
                </a>
            </li>

          <li>
            <a href="#maintenances" data-toggle="tab">
                    <span class="hidden-lg hidden-md">
                        <i class="fas fa-wrench fa-2x"></i>
                    </span>
              <span class="hidden-xs hidden-sm">
                        <?php echo e(trans('admin/asset_maintenances/general.asset_maintenances')); ?>

                        <?php echo ($supplier->asset_maintenances->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($supplier->asset_maintenances->count()).'</badge>' : ''; ?>

                    </span>
            </a>
          </li>
        </ul>


        <div class="tab-content">


          <div class="tab-pane active" id="assets">
            <h2 class="box-title"><?php echo e(trans('general.assets')); ?></h2>

            <div class="table table-responsive">
              <?php echo $__env->make('partials.asset-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <table
                      data-cookie-id-table="suppliersAssetsTable"
                      data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                      data-pagination="true"
                      data-id-table="suppliersAssetsTable"
                      data-search="true"
                      data-show-footer="true"
                      data-side-pagination="server"
                      data-show-columns="true"
                      data-show-export="true"
                      data-show-refresh="true"
                      data-show-fullscreen="true"
                      data-sort-order="asc"
                      data-toolbar="#assetsBulkEditToolbar"
                      data-bulk-button-id="#bulkAssetEditButton"
                      data-bulk-form-id="#assetsBulkForm"
                      data-click-to-select="true"
                      id="suppliersAssetsTable"
                      class="table table-striped snipe-table"
                      data-url="<?php echo e(route('api.assets.index', ['supplier_id' => $supplier->id])); ?>"
                      data-export-options='{
                              "fileName": "export-suppliers-<?php echo e(str_slug($supplier->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
              </table>

            </div><!-- /.table-responsive -->
          </div><!-- /.tab-pane -->



          <div class="tab-pane" id="accessories">
            <h2 class="box-title"><?php echo e(trans('general.accessories')); ?></h2>
            <div class="table table-responsive">
              <table
                      data-columns="<?php echo e(\App\Presenters\AccessoryPresenter::dataTableLayout()); ?>"
                      data-cookie-id-table="accessoriesListingTable"
                      data-pagination="true"
                      data-id-table="accessoriesListingTable"
                      data-search="true"
                      data-side-pagination="server"
                      data-show-columns="true"
                      data-show-fullscreen="true"
                      data-show-export="true"
                      data-show-refresh="true"
                      data-sort-order="asc"
                      id="accessoriesListingTable"
                      class="table table-striped snipe-table"
                      data-url="<?php echo e(route('api.accessories.index', ['supplier_id' => $supplier->id])); ?>"
                      data-export-options='{
                              "fileName": "export-suppliers-<?php echo e(str_slug($supplier->name)); ?>-accessories-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
              </table>
            </div><!-- /.table-responsive -->
          </div><!-- /.tab-pane -->


          <div class="tab-pane" id="licenses">
            <h2 class="box-title"><?php echo e(trans('general.licenses')); ?></h2>

            <div class="table table-responsive">
              <table
                      data-columns="<?php echo e(\App\Presenters\LicensePresenter::dataTableLayout()); ?>"
                      data-cookie-id-table="licensesListingTable"
                      data-pagination="true"
                      data-id-table="licensesListingTable"
                      data-search="true"
                      data-side-pagination="server"
                      data-show-columns="true"
                      data-show-fullscreen="true"
                      data-show-export="true"
                      data-show-refresh="true"
                      data-sort-order="asc"
                      id="licensesListingTable"
                      class="table table-striped snipe-table"
                      data-url="<?php echo e(route('api.licenses.index', ['supplier_id' => $supplier->id])); ?>"
                      data-export-options='{
                              "fileName": "export-suppliers-<?php echo e(str_slug($supplier->name)); ?>-licenses-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
              </table>

            </div><!-- /.table-responsive -->
          </div><!-- /.tab-pane -->

            <div class="tab-pane" id="components">
                <h2 class="box-title"><?php echo e(trans('general.components')); ?></h2>
                <div class="table table-responsive">
                    <table
                            data-columns="<?php echo e(\App\Presenters\ComponentPresenter::dataTableLayout()); ?>"
                            data-cookie-id-table="componentsListingTable"
                            data-pagination="true"
                            data-id-table="componentsListingTable"
                            data-search="true"
                            data-side-pagination="server"
                            data-show-columns="true"
                            data-show-fullscreen="true"
                            data-show-export="true"
                            data-show-refresh="true"
                            data-sort-order="asc"
                            id="accessoriesListingTable"
                            class="table table-striped snipe-table"
                            data-url="<?php echo e(route('api.components.index', ['supplier_id' => $supplier->id])); ?>"
                            data-export-options='{
                              "fileName": "export-suppliers-<?php echo e(str_slug($supplier->name)); ?>-components-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="consumables">
            <h2 class="box-title"><?php echo e(trans('general.consumables')); ?></h2>
            <div class="table table-responsive">
                <table
                        data-columns="<?php echo e(\App\Presenters\ConsumablePresenter::dataTableLayout()); ?>"
                        data-cookie-id-table="consumablesListingTable"
                        data-pagination="true"
                        data-id-table="consumablesListingTable"
                        data-search="true"
                        data-side-pagination="server"
                        data-show-columns="true"
                        data-show-fullscreen="true"
                        data-show-export="true"
                        data-show-refresh="true"
                        data-sort-order="asc"
                        id="accessoriesListingTable"
                        class="table table-striped snipe-table"
                        data-url="<?php echo e(route('api.consumables.index', ['supplier_id' => $supplier->id])); ?>"
                        data-export-options='{
                              "fileName": "export-suppliers-<?php echo e(str_slug($supplier->name)); ?>-consumables-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.tab-pane -->


          <div class="tab-pane" id="maintenances">
            <h2 class="box-title"><?php echo e(trans('admin/asset_maintenances/general.asset_maintenances')); ?></h2>
            <div class="table table-responsive">

              <table
                      data-columns="<?php echo e(\App\Presenters\AssetMaintenancesPresenter::dataTableLayout()); ?>"
                      data-cookie-id-table="maintenancesTable"
                      data-pagination="true"
                      data-id-table="maintenancesTable"
                      data-search="true"
                      data-side-pagination="server"
                      data-show-columns="true"
                      data-show-fullscreen="true"
                      data-show-export="true"
                      data-show-refresh="true"
                      data-sort-order="asc"
                      id="maintenancesTable"
                      class="table table-striped snipe-table"
                      data-url="<?php echo e(route('api.maintenances.index', ['supplier_id' => $supplier->id])); ?>"
                      data-export-options='{
                              "fileName": "export-suppliers-<?php echo e(str_slug($supplier->name)); ?>-maintenances-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>

              </table>
            </div><!-- /.table-responsive -->
          </div><!-- /.tab-pane -->

        </div><!--/.col-md-9-->
      </div><!--/.col-md-9-->
    </div><!--/.col-md-9-->

      <!-- side address column -->
      <div class="col-md-3">



              <?php if($supplier->fax!=''): ?>
                  <li><i class="fas fa-print"></i> <?php echo e($supplier->fax); ?></li>
              <?php endif; ?>


      <?php if(($supplier->address!='') && ($supplier->state!='') && ($supplier->country!='') && (config('services.google.maps_api_key'))): ?>
              <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                  <img src="https://maps.googleapis.com/maps/api/staticmap?markers=<?php echo e(urlencode($supplier->address.','.$supplier->city.' '.$supplier->state.' '.$supplier->country.' '.$supplier->zip)); ?>&size=500x300&maptype=roadmap&key=<?php echo e(config('services.google.maps_api_key')); ?>" class="img-responsive img-thumbnail" alt="Map">
              </div>
          <?php endif; ?>


          <ul class="list-unstyled" style="line-height: 25px; padding-bottom: 20px; padding-top: 20px;">
              <?php if($supplier->contact!=''): ?>
                  <li><i class="fas fa-user" aria-hidden="true"></i> <?php echo e($supplier->contact); ?></li>
              <?php endif; ?>
              <?php if($supplier->phone!=''): ?>
                  <li><i class="fas fa-phone"></i>
                      <a href="tel:<?php echo e($supplier->phone); ?>"><?php echo e($supplier->phone); ?></a>
                  </li>
              <?php endif; ?>


              <?php if($supplier->email!=''): ?>
                  <li>
                      <i class="far fa-envelope"></i>
                      <a href="mailto:<?php echo e($supplier->email); ?>">
                          <?php echo e($supplier->email); ?>

                      </a>
                  </li>
              <?php endif; ?>
<!---
              <?php if($supplier->url!=''): ?>
                  <li>
                      <i class="fas fa-globe-americas"></i>
                      <a href="<?php echo e($supplier->url); ?>" target="_new"><?php echo e($supplier->url); ?></a>
                  </li>
              <?php endif; ?>
--->
              <?php if($supplier->address!=''): ?>
                  <li><br>
                      <?php echo e($supplier->address); ?>


                      <?php if($supplier->address2): ?>
                          <br>
                          <?php echo e($supplier->address2); ?>

                      <?php endif; ?>
                      <?php if(($supplier->city) || ($supplier->state)): ?>
                          <br>
                          <?php echo e($supplier->city); ?> <?php echo e(strtoupper($supplier->state)); ?> <?php echo e($supplier->zip); ?> <?php echo e(strtoupper($supplier->country)); ?>

                      <?php endif; ?>
                  </li>
              <?php endif; ?>

              <?php if($supplier->notes!=''): ?>
                  <li><i class="fa fa-comment"></i> <?php echo nl2br(Helper::parseEscapedMarkedownInline($supplier->notes)); ?></li>
              <?php endif; ?>

          </ul>
          <?php if($supplier->image!=''): ?>
              <div class="col-md-12 text-center" style="padding-bottom: 20px;">
                  <img src="<?php echo e(Storage::disk('public')->url(app('suppliers_upload_url').e($supplier->image))); ?>" class="img-responsive img-thumbnail" alt="<?php echo e($supplier->name); ?>">
              </div>
          <?php endif; ?>

      </div> <!--/col-md-3-->

  </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', [
      'exportFile' => 'locations-export',
      'search' => true
   ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/suppliers/view.blade.php ENDPATH**/ ?>