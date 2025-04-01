


<?php $__env->startSection('title'); ?>
<?php echo e(trans('general.hello_name', array('name' => $user->present()->getFullNameAttribute()))); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php if($acceptances = \App\Models\CheckoutAcceptance::forUser(Auth::user())->pending()->count()): ?>
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert alert-warning fade in">
        <i class="fas fa-exclamation-triangle faa-pulse animated"></i>

        <strong>
          <a href="<?php echo e(route('account.accept')); ?>" style="color: white;">
            <?php echo e(trans('general.unaccepted_profile_warning', array('count' => $acceptances))); ?>

          </a>
          </strong>
      </div>
    </div>
  </div>
<?php endif; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs hidden-print">

          <li class="active">
            <a href="#details" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fas fa-info-circle fa-2x"></i>
            </span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
            </a>
          </li>

          <li>
            <a href="#asset" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="fas fa-barcode fa-2x" aria-hidden="true"></i>
            </span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('general.assets')); ?>

                <?php echo ($user->assets()->AssetsForShow()->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($user->assets()->AssetsForShow()->count()).'</badge>' : ''; ?>

            </span>
            </a>
          </li>

          <li>
            <a href="#licenses" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="far fa-save fa-2x"></i>
            </span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('general.licenses')); ?>

                <?php echo ($user->licenses->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($user->licenses->count()).'</badge>' : ''; ?>

            </span>
            </a>
          </li>

          <li>
            <a href="#accessories" data-toggle="tab">
            <span class="hidden-lg hidden-md">
            <i class="far fa-keyboard fa-2x"></i>
            </span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('general.accessories')); ?>

                <?php echo ($user->accessories->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($user->accessories->count()).'</badge>' : ''; ?>

            </span>
            </a>
          </li>

          <li>
            <a href="#consumables" data-toggle="tab">
            <span class="hidden-lg hidden-md">
                <i class="fas fa-tint fa-2x"></i>
            </span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('general.consumables')); ?>

                <?php echo ($user->consumables->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($user->consumables->count()).'</badge>' : ''; ?>

            </span>
            </a>
          </li>

        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="details">
            <div class="row">


              <!-- Start button column -->
              <div class="col-md-3 col-xs-12 col-sm-push-9">



                <div class="col-md-12 text-center">

                </div>
                <div class="col-md-12 text-center">
                  <img src="<?php echo e($user->present()->gravatar()); ?>"  class=" img-thumbnail hidden-print" style="margin-bottom: 20px;" alt="<?php echo e($user->present()->fullName()); ?>">
                </div>

                  <div class="col-md-12">
                    <a href="<?php echo e(route('profile')); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print">
                      <?php echo e(trans('general.editprofile')); ?>

                    </a>
                  </div>

                <div class="col-md-12" style="padding-top: 5px;">
                  <a href="<?php echo e(route('account.password.index')); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print" target="_blank" rel="noopener">
                    <?php echo e(trans('general.changepassword')); ?>

                  </a>
                </div>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.api')): ?>
                <div class="col-md-12" style="padding-top: 5px;">
                  <a href="<?php echo e(route('user.api')); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print" target="_blank" rel="noopener">
                    <?php echo e(trans('general.manage_api_keys')); ?>

                  </a>
                </div>
                <?php endif; ?>


                  <div class="col-md-12" style="padding-top: 5px;">
                    <a href="<?php echo e(route('profile.print')); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print" target="_blank" rel="noopener">
                      <?php echo e(trans('admin/users/general.print_assigned')); ?>

                    </a>
                  </div>


                  <div class="col-md-12" style="padding-top: 5px;">
                    <?php if(!empty($user->email)): ?>
                      <form action="<?php echo e(route('profile.email_assets')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print" rel="noopener"><?php echo e(trans('admin/users/general.email_assigned')); ?></button>
                      </form>
                    <?php else: ?>
                      <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print" rel="noopener" disabled title="<?php echo e(trans('admin/users/message.user_has_no_email')); ?>"><?php echo e(trans('admin/users/general.email_assigned')); ?></button>
                    <?php endif; ?>
                  </div>

                <br><br>
              </div>

              <!-- End button column -->

              <div class="col-md-9 col-xs-12 col-sm-pull-3">

                <div class="row-new-striped">

                  <div class="row">
                    <!-- name -->

                    <div class="col-md-3 col-sm-2">
                      <?php echo e(trans('admin/users/table.name')); ?>

                    </div>
                    <div class="col-md-9 col-sm-2">
                      <?php echo e($user->present()->fullName()); ?>

                    </div>

                  </div>



                  <!-- company -->
                  <?php if(!is_null($user->company)): ?>
                    <div class="row">

                      <div class="col-md-3">
                        <?php echo e(trans('general.company')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($user->company->name); ?>

                      </div>

                    </div>

                  <?php endif; ?>

                  <!-- username -->
                  <div class="row">

                    <div class="col-md-3">
                      <?php echo e(trans('admin/users/table.username')); ?>

                    </div>
                    <div class="col-md-9">

                      <?php if($user->isSuperUser()): ?>
                        <label class="label label-danger"><i class="fas fa-crown" title="superuser"></i></label>&nbsp;
                      <?php elseif($user->hasAccess('admin')): ?>
                        <label class="label label-warning"><i class="fas fa-crown" title="admin"></i></label>&nbsp;
                      <?php endif; ?>
                      <?php echo e($user->username); ?>


                    </div>

                  </div>

                  <!-- address -->
                  <?php if(($user->address) || ($user->city) || ($user->state) || ($user->country)): ?>
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.address')); ?>

                      </div>
                      <div class="col-md-9">

                        <?php if($user->address): ?>
                          <?php echo e($user->address); ?> <br>
                        <?php endif; ?>
                        <?php if($user->city): ?>
                          <?php echo e($user->city); ?>

                        <?php endif; ?>
                        <?php if($user->state): ?>
                          <?php echo e($user->state); ?>

                        <?php endif; ?>
                        <?php if($user->country): ?>
                          <?php echo e($user->country); ?>

                        <?php endif; ?>
                        <?php if($user->zip): ?>
                          <?php echo e($user->zip); ?>

                        <?php endif; ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($user->jobtitle): ?>
                    <!-- jobtitle -->
                    <div class="row">

                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.job')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($user->jobtitle); ?>

                      </div>

                    </div>
                  <?php endif; ?>

                  <?php if($user->employee_num): ?>
                    <!-- employee_num -->
                    <div class="row">

                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.employee_num')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e($user->employee_num); ?>

                      </div>

                    </div>
                  <?php endif; ?>

                  <?php if($user->manager): ?>
                    <!-- manager -->
                    <div class="row">

                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.manager')); ?>

                      </div>
                      <div class="col-md-9">
                        <a href="<?php echo e(route('users.show', $user->manager->id)); ?>">
                          <?php echo e($user->manager->getFullNameAttribute()); ?>

                        </a>
                      </div>

                    </div>

                  <?php endif; ?>


                  <?php if($user->email): ?>
                    <!-- email -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.email')); ?>

                      </div>
                      <div class="col-md-9">
                        <a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($user->website): ?>
                    <!-- website -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.website')); ?>

                      </div>
                      <div class="col-md-9">
                        <a href="<?php echo e($user->website); ?>" target="_blank"><?php echo e($user->website); ?></a>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($user->phone): ?>
                    <!-- phone -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.phone')); ?>

                      </div>
                      <div class="col-md-9">
                        <a href="tel:<?php echo e($user->phone); ?>"><?php echo e($user->phone); ?></a>
                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($user->userloc): ?>
                    <!-- location -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.location')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e(link_to_route('locations.show', $user->userloc->name, [$user->userloc->id])); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <!-- last login -->
                  <div class="row">
                    <div class="col-md-3">
                      <?php echo e(trans('general.last_login')); ?>

                    </div>
                    <div class="col-md-9">
                      <?php echo e(\App\Helpers\Helper::getFormattedDateObject($user->last_login, 'datetime', false)); ?>

                    </div>
                  </div>


                  <?php if($user->department): ?>
                    <!-- empty -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.department')); ?>

                      </div>
                      <div class="col-md-9">
                          <?php echo e($user->department->name); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                  <?php if($user->created_at): ?>
                    <!-- created at -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.created_at')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo e(\App\Helpers\Helper::getFormattedDateObject($user->created_at, 'datetime')['formatted']); ?>

                      </div>
                    </div>
                  <?php endif; ?>

                </div> <!--/end striped container-->
              </div> <!-- end col-md-9 -->



            </div> <!--/.row-->
          </div><!-- /.tab-pane -->

          <div class="tab-pane" id="asset">
            <!-- checked out assets table -->


            <div class="table table-responsive">
              <?php if($user->id): ?>
                <div class="box-header with-border">
                  <div class="box-heading">
                    <h2 class="box-title"> <?php echo e(trans('admin/users/general.assets_user', array('name' => $user->first_name))); ?></h2>
                  </div>
                </div><!-- /.box-header -->
              <?php endif; ?>

              <div class="box-body">
                <!-- checked out assets table -->
                <div class="table-responsive">

                  <table
                          data-cookie="true"
                          data-cookie-id-table="userAssets"
                          data-pagination="true"
                          data-id-table="userAssets"
                          data-search="true"
                          data-side-pagination="client"
                          data-show-columns="true"
                          data-show-export="true"
                          data-show-footer="true"
                          data-sort-order="asc"
                          id="userAssets"
                          class="table table-striped snipe-table"
                          data-export-options='{
                  "fileName": "my-assets-<?php echo e(date('Y-m-d')); ?>",
                  "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                  }'>
                    <thead>
                    <tr>
                      <th class="col-md-1">#</th>
                      <th class="col-md-1"><?php echo e(trans('general.image')); ?></th>
                      <th class="col-md-2" data-switchable="true" data-visible="true"><?php echo e(trans('general.category')); ?></th>
                      <th class="col-md-2" data-switchable="true" data-visible="true"><?php echo e(trans('admin/hardware/table.asset_tag')); ?></th>
                      <th class="col-md-2" data-switchable="true" data-visible="true"><?php echo e(trans('general.name')); ?></th>
                      <th class="col-md-2" data-switchable="true" data-visible="true"><?php echo e(trans('admin/hardware/table.asset_model')); ?></th>
                      <th class="col-md-3" data-switchable="true" data-visible="true"><?php echo e(trans('admin/hardware/table.serial')); ?></th>
                      <th class="col-md-2" data-switchable="true" data-visible="false"><?php echo e(trans('admin/hardware/form.default_location')); ?></th>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.view_purchase_cost')): ?>
                        <th class="col-md-6" data-footer-formatter="sumFormatter" data-fieldname="purchase_cost"><?php echo e(trans('general.purchase_cost')); ?></th>
                      <?php endif; ?>
                      <?php $__currentLoopData = $field_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $db_column => $field_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th class="col-md-1" data-switchable="true" data-visible="true"><?php echo e($field_name); ?></th>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tr>

                    </thead>
                    <tbody>
                    <?php
                      $counter = 1
                    ?>
                    <?php $__currentLoopData = $user->assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($counter); ?></td>
                        <td>
                          <?php if(($asset->image) && ($asset->image!='')): ?>
                            <img src="<?php echo e(Storage::disk('public')->url(app('assets_upload_path').e($asset->image))); ?>" style="max-height: 30px; width: auto" class="img-responsive">
                          <?php elseif(($asset->model) && ($asset->model->image!='')): ?>
                            <img src="<?php echo e(Storage::disk('public')->url(app('models_upload_path').e($asset->model->image))); ?>" style="max-height: 30px; width: auto" class="img-responsive">
                          <?php endif; ?>
                        </td>
                        <td>
                          <?php if(($asset->model) && ($asset->model->category)): ?>
                          <?php echo e($asset->model->category->name); ?>

                          <?php endif; ?>
                        </td>
                        <td><?php echo e($asset->asset_tag); ?></td>
                        <td><?php echo e($asset->name); ?></td>
                        <td>
                          <?php if($asset->physical=='1'): ?>
                            <?php echo e($asset->model->name); ?>

                          <?php endif; ?>
                        </td>
                        <td><?php echo e($asset->serial); ?></td>
                        <td><?php echo e(($asset->defaultLoc) ? $asset->defaultLoc->name : ''); ?></td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.view_purchase_cost')): ?>
                        <td>
                          <?php echo Helper::formatCurrencyOutput($asset->purchase_cost); ?>

                        </td>
                        <?php endif; ?>

                        <?php $__currentLoopData = $field_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $db_column => $field_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <td>
                            <?php echo e($asset->{$db_column}); ?>

                          </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </tr>

                      <?php
                        $counter++
                      ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
                </div> <!-- .table-responsive-->
            </div>
          </div><!-- /asset -->
          <div class="tab-pane" id="licenses">

            <div class="table-responsive">
              <table
                      data-cookie-id-table="userLicenses"
                      data-pagination="true"
                      data-id-table="userLicenses"
                      data-search="true"
                      data-side-pagination="client"
                      data-show-columns="true"
                      data-show-export="true"
                      data-show-refresh="false"
                      data-sort-order="asc"
                      id="userLicenses"
                      class="table table-striped snipe-table"
                      data-export-options='{
                    "fileName": "my-licenses-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                    }'>
                <thead>
                <tr>
                  <th><?php echo e(trans('general.name')); ?></th>
                  <th><?php echo e(trans('admin/licenses/form.license_key')); ?></th>
                  <th><?php echo e(trans('admin/licenses/form.to_name')); ?></th>
                  <th><?php echo e(trans('admin/licenses/form.to_email')); ?></th>
                  <th><?php echo e(trans('general.category')); ?></th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $user->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($license->name); ?></td>
                    <td>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                        <?php echo e($license->serial); ?>

                      <?php else: ?>
                        ------------
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                        <?php echo e($license->license_name); ?>

                      <?php else: ?>
                        ------------
                      <?php endif; ?>
                    </td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                    <td><?php echo e($license->license_email); ?></td>
                    <?php else: ?>
                      ------------
                    <?php endif; ?>
                    <td><?php echo e(($license->category) ? $license->category->name : trans('general.deleted')); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div> <!-- .table-responsive-->
          </div>

          <div class="tab-pane" id="accessories">
            <div class="table-responsive">
              <table
                      data-cookie-id-table="userAccessoryTable"
                      data-id-table="userAccessoryTable"
                      id="userAccessoryTable"
                      data-search="true"
                      data-pagination="true"
                      data-side-pagination="client"
                      data-show-columns="true"
                      data-show-fullscreen="true"
                      data-show-export="true"
                      data-show-footer="true"
                      data-show-refresh="false"
                      data-sort-order="asc"
                      data-sort-name="name"
                      class="table table-striped snipe-table table-hover"
                      data-export-options='{
                    "fileName": "export-accessory-<?php echo e(str_slug($user->username)); ?>-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","delete","download","icon"]
                    }'>
                <thead>
                <tr>
                  <th class="col-md-5"><?php echo e(trans('general.name')); ?></th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.view_purchase_cost')): ?>
                    <th class="col-md-6" data-footer-formatter="sumFormatter" data-fieldname="purchase_cost"><?php echo e(trans('general.purchase_cost')); ?></th>
                  <?php endif; ?>
                  <th class="col-md-1 hidden-print"><?php echo e(trans('general.action')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $user->accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($accessory->name); ?></td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.view_purchase_cost')): ?>
                      <td>
                        <?php echo Helper::formatCurrencyOutput($accessory->purchase_cost); ?>

                      </td>
                    <?php endif; ?>
                    <td class="hidden-print">
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', $accessory)): ?>
                        <a href="<?php echo e(route('accessories.checkin.show', array('accessoryID'=> $accessory->pivot->id, 'backto'=>'user'))); ?>" class="btn btn-primary btn-sm hidden-print"><?php echo e(trans('general.checkin')); ?></a>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div><!-- /accessories-tab -->

          <div class="tab-pane" id="consumables">
            <div class="table-responsive">
              <table
                      data-cookie-id-table="userConsumableTable"
                      data-id-table="userConsumableTable"
                      id="userConsumableTable"
                      data-search="true"
                      data-pagination="true"
                      data-side-pagination="client"
                      data-show-columns="true"
                      data-show-fullscreen="true"
                      data-show-export="true"
                      data-show-footer="true"
                      data-show-refresh="false"
                      data-sort-order="asc"
                      data-sort-name="name"
                      class="table table-striped snipe-table table-hover"
                      data-export-options='{
                    "fileName": "export-consumable-<?php echo e(str_slug($user->username)); ?>-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","delete","download","icon"]
                    }'>
                <thead>
                <tr>
                  <th class="col-md-3"><?php echo e(trans('general.name')); ?></th>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.view_purchase_cost')): ?>
                    <th class="col-md-2" data-footer-formatter="sumFormatter" data-fieldname="purchase_cost"><?php echo e(trans('general.purchase_cost')); ?></th>
                  <?php endif; ?>
                  <th class="col-md-2"><?php echo e(trans('general.date')); ?></th>
                  <th class="col-md-5"><?php echo e(trans('general.notes')); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $user->consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($consumable->name); ?></td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.view_purchase_cost')): ?>
                      <td>
                        <?php echo Helper::formatCurrencyOutput($consumable->purchase_cost); ?>

                      </td>
                    <?php endif; ?>
                    <td><?php echo e(Helper::getFormattedDateObject($consumable->pivot->created_at, 'datetime',  false)); ?></td>
                    <td><?php echo e($consumable->pivot->note); ?></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
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
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/account/view-assets.blade.php ENDPATH**/ ?>