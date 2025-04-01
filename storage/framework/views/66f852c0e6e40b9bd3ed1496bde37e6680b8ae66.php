<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin/users/general.view_user', ['name' => $user->present()->fullName()])); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



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

        <li>
          <a href="#files" data-toggle="tab">
            <span class="hidden-lg hidden-md">
                <i class="far fa-file fa-2x"></i>
            </span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.file_uploads')); ?>

              <?php echo ($user->uploads->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($user->uploads->count()).'</badge>' : ''; ?>

            </span>
          </a>
        </li>

        <li>
          <a href="#history" data-toggle="tab">
            <span class="hidden-lg hidden-md">
                <i class="fas fa-history fa-2x"></i>
            </span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.history')); ?></span>
          </a>
        </li>

        <?php if($user->managedLocations->count() >= 0 ): ?>
        <li>
          <a href="#managed-locations" data-toggle="tab">
            <span class="hidden-lg hidden-md">
              <i class="fas fa-map-marker-alt fa-2x"></i></span>
            <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/table.managed_locations')); ?>

              <?php echo ($user->managedLocations->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($user->managedLocations->count()).'</badge>' : ''; ?>

          </a>
        </li>
        <?php endif; ?>

          <?php if($user->managesUsers->count() >= 0 ): ?>
              <li>
                  <a href="#managed-users" data-toggle="tab">
            <span class="hidden-lg hidden-md">
              <i class="fa-solid fa-users fa-2x"></i></span>
                      <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/table.managed_users')); ?>

                      <?php echo ($user->managesUsers->count() > 0 ) ? '<badge class="badge badge-secondary">'.number_format($user->managesUsers->count()).'</badge>' : ''; ?>

                  </a>
              </li>
          <?php endif; ?>


      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
          <li class="dropdown pull-right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="hidden-xs"><i class="fas fa-cog" aria-hidden="true"></i></span>
              <span class="hidden-lg hidden-md hidden-xl"><i class="fas fa-cog fa-2x" aria-hidden="true"></i></span>
              
              <span class="hidden-xs hidden-sm">
                <?php echo e(trans('button.actions')); ?>

              </span>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo e(route('users.edit', $user->id)); ?>"><?php echo e(trans('admin/users/general.edit')); ?></a></li>
              <li><a href="<?php echo e(route('users.clone.show', $user->id)); ?>"><?php echo e(trans('admin/users/general.clone')); ?></a></li>
              <?php if((Auth::user()->id !== $user->id) && (!config('app.lock_passwords')) && ($user->deleted_at=='') && ($user->isDeletable())): ?>
                <li><a href="<?php echo e(route('users.destroy', $user->id)); ?>"><?php echo e(trans('button.delete')); ?></a></li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\User::class)): ?>
          <li class="pull-right">
              <a href="#" data-toggle="modal" data-target="#uploadFileModal">
              <span class="hidden-xs"><i class="fas fa-paperclip" aria-hidden="true"></i></span>
              <span class="hidden-lg hidden-md hidden-xl"><i class="fas fa-paperclip fa-2x" aria-hidden="true"></i></span>
              <span class="hidden-xs hidden-sm"><?php echo e(trans('button.upload')); ?></span>
              </a>
          </li>
        <?php endif; ?>
      </ul>

      <div class="tab-content">
        <div class="tab-pane active" id="details">
          <div class="row">

            
            <?php if($user->deleted_at!=''): ?>
              <div class="col-md-12">
                <div class="callout callout-warning">
                  <i class="icon fas fa-exclamation-triangle"></i>
                  <?php echo e(trans('admin/users/message.user_deleted_warning')); ?>

                </div>
              </div>
            <?php endif; ?>

            <!-- Start button column -->
            <div class="col-md-3 col-xs-12 col-sm-push-9">

              

              <div class="col-md-12 text-center">
                
                 <?php if(($user->isSuperUser()) || ($user->hasAccess('admin'))): ?>
                    <i class="fas fa-crown fa-2x<?php echo e(($user->isSuperUser()) ? ' text-danger' : ' text-orange'); ?>"></i>
                    <div class="<?php echo e(($user->isSuperUser()) ? 'text-danger' : ' text-orange'); ?>" style="font-weight: bold"><?php echo e(($user->isSuperUser()) ? 'superadmin' : 'admin'); ?></div>
                  <?php endif; ?>

                
              </div>
              <div class="col-md-12 text-center">
                <img src="<?php echo e($user->present()->gravatar()); ?>"  class=" img-thumbnail hidden-print" style="margin-bottom: 20px;" alt="<?php echo e($user->present()->fullName()); ?>">  
               </div>
               
          

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                <div class="col-md-12">
                  <a href="<?php echo e(route('users.edit', $user->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print"><?php echo e(trans('admin/users/general.edit')); ?></a>
                </div>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $user)): ?>
                <div class="col-md-12" style="padding-top: 5px;">
                  <a href="<?php echo e(route('users.clone.show', $user->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print"><?php echo e(trans('admin/users/general.clone')); ?></a>
                </div>
               <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $user)): ?>
                <div class="col-md-12" style="padding-top: 5px;">
                <?php if($user->allAssignedCount() != '0'): ?> 
                  <a href="<?php echo e(route('users.print', $user->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print" target="_blank" rel="noopener"><?php echo e(trans('admin/users/general.print_assigned')); ?></a>
                  <?php else: ?>
                  <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print" rel="noopener" disabled title="<?php echo e(trans('admin/users/message.user_has_no_assets_assigned')); ?>"><?php echo e(trans('admin/users/general.print_assigned')); ?></button>
                <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $user)): ?>
                  <div class="col-md-12" style="padding-top: 5px;">
                  <?php if(!empty($user->email) && ($user->allAssignedCount() != '0')): ?>
                    <form action="<?php echo e(route('users.email',['userId'=> $user->id])); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                      <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print" rel="noopener"><?php echo e(trans('admin/users/general.email_assigned')); ?></button>
                    </form>
                  <?php elseif(!empty($user->email) && ($user->allAssignedCount() == '0')): ?>
                      <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print" rel="noopener" disabled title="<?php echo e(trans('admin/users/message.user_has_no_assets_assigned')); ?>"><?php echo e(trans('admin/users/general.email_assigned')); ?></button>
                  <?php else: ?>
                      <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print" rel="noopener" disabled title="<?php echo e(trans('admin/users/message.user_has_no_email')); ?>"><?php echo e(trans('admin/users/general.email_assigned')); ?></button>
                  <?php endif; ?>
                  </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user)): ?>
                  <?php if(($user->activated == '1') && ($user->ldap_import == '0')): ?>
                  <div class="col-md-12" style="padding-top: 5px;">
                    <?php if($user->email != ''): ?>
                      <form action="<?php echo e(route('users.password',['userId'=> $user->id])); ?>" method="POST">
                          <?php echo e(csrf_field()); ?>

                      <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print"><?php echo e(trans('button.send_password_link')); ?></button>
                      </form>
                    <?php else: ?>
                      <button style="width: 100%;" class="btn btn-sm btn-primary hidden-print" rel="noopener" disabled title="<?php echo e(trans('admin/users/message.user_has_no_email')); ?>"><?php echo e(trans('button.send_password_link')); ?></button> 
                    <?php endif; ?>
                  </div>
                  <?php endif; ?>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $user)): ?>
                  <?php if($user->deleted_at==''): ?>
                    <div class="col-md-12" style="padding-top: 30px;">
                        <?php if($user->isDeletable()): ?>
                          <form action="<?php echo e(route('users.destroy',$user->id)); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field("DELETE")); ?>

                            <button style="width: 100%;" class="btn btn-sm btn-warning hidden-print"><?php echo e(trans('button.delete')); ?></button>
                          </form>
                            <?php else: ?>
                            <button style="width: 100%;" class="btn btn-sm btn-warning hidden-print disabled"><?php echo e(trans('button.delete')); ?></button>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12" style="padding-top: 5px;">
                      <form action="<?php echo e(route('users/bulkedit')); ?>" method="POST">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <input type="hidden" name="bulk_actions" value="delete" />

                        <input type="hidden" name="ids[<?php echo e($user->id); ?>]" value="<?php echo e($user->id); ?>" />
                        <button style="width: 100%;" class="btn btn-sm btn-danger hidden-print"><?php echo e(trans('button.checkin_and_delete')); ?></button>
                      </form>
                    </div>
                  <?php else: ?>
                    <div class="col-md-12" style="padding-top: 5px;">
                        <form method="POST" action="<?php echo e(route('users.restore.store', $user->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <button style="width: 100%;" class="btn btn-sm btn-warning hidden-print"><?php echo e(trans('button.restore')); ?></button>
                        </form>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
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


                     <!-- groups -->
                     <div class="row">
                        <div class="col-md-3">
                          <?php echo e(trans('general.groups')); ?>

                        </div>
                        <div class="col-md-9">
                          <?php if($user->groups->count() > 0): ?>
                            <?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
                                  <a href="<?php echo e(route('groups.show', $group->id)); ?>" class="label label-default"><?php echo e($group->name); ?></a>
                              <?php else: ?>
                              <?php echo e($group->name); ?>

                              <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php else: ?>
                              --
                          <?php endif; ?>
                        </div>
                      </div>

                   <!-- start date -->
                   <?php if($user->start_date): ?>
                       <div class="row">
                           <div class="col-md-3">
                               <?php echo e(trans('general.start_date')); ?>

                           </div>
                           <div class="col-md-9">
                               <?php echo e(\App\Helpers\Helper::getFormattedDateObject($user->start_date, 'date', false)); ?>

                           </div>
                       </div>
                   <?php endif; ?>

                   <!-- end date -->
                   <?php if($user->end_date): ?>
                       <div class="row">
                           <div class="col-md-3">
                               <?php echo e(trans('general.end_date')); ?>

                           </div>
                           <div class="col-md-9">
                               <?php echo e(\App\Helpers\Helper::getFormattedDateObject($user->end_date, 'date', false)); ?>

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
                        <a href="mailto:<?php echo e($user->email); ?>" data-tooltip="true" title="<?php echo e(trans('general.send_email')); ?>"><i class="fa-regular fa-envelope" aria-hidden="true"></i> <?php echo e($user->email); ?></a>
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
                          <a href="<?php echo e($user->website); ?>" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> <?php echo e($user->website); ?></a>
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
                          <a href="tel:<?php echo e($user->phone); ?>" data-tooltip="true" title="<?php echo e(trans('general.call')); ?>"><i class="fa-solid fa-phone" aria-hidden="true"></i> <?php echo e($user->phone); ?></a>
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
                        <a href="<?php echo e(route('departments.show', $user->department)); ?>">
                          <?php echo e($user->department->name); ?>

                        </a>
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


                          <?php if($user->createdBy): ?>
                              -
                              <?php if($user->createdBy->deleted_at==''): ?>
                                  <a href="<?php echo e(route('users.show', ['user' => $user->created_by])); ?>"><?php echo e($user->createdBy->present()->fullName); ?></a>
                              <?php else: ?>
                                  <del><?php echo e($user->createdBy->present()->fullName); ?></del>
                              <?php endif; ?>


                          <?php endif; ?>
                      </div>
                    </div>
                    <?php endif; ?>

                    <!-- vip -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/general.vip_label')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo ($user->vip=='1') ? '<i class="fas fa-check fa-fw fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                      </div>
                    </div> 
                    
                    <!-- remote -->
                     <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/general.remote')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo ($user->remote=='1') ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                      </div>
                    </div>

                    <!-- login enabled -->
                    <div class="row">
                      <div class="col-md-3">
                        <?php echo e(trans('general.login_enabled')); ?>

                      </div>
                      <div class="col-md-9">
                        <?php echo ($user->activated=='1') ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                      </div>
                    </div>

                   <!-- auto assign license -->
                   <div class="row">
                       <div class="col-md-3">
                           <?php echo e(trans('general.autoassign_licenses')); ?>

                       </div>
                       <div class="col-md-9">
                           <?php echo ($user->autoassign_licenses=='1') ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                       </div>
                   </div>


                   <!-- LDAP -->
                    <div class="row">
                      <div class="col-md-3">
                          LDAP
                      </div>
                      <div class="col-md-9">
                        <?php echo ($user->ldap_import=='1') ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>


                      </div>
                    </div>

                    <?php if($user->activated == '1'): ?>

                          <!-- 2FA active -->
                          <div class="row">
                            <div class="col-md-3">
                              <?php echo e(trans('admin/users/general.two_factor_active')); ?>

                            </div>
                            <div class="col-md-9">
                          
                              <?php echo ($user->two_factor_active()) ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                          
                            </div>
                          </div>
                          
                          <!-- 2FA enrolled -->
                          <div class="row two_factor_resetrow">
                            <div class="col-md-3">
                              <?php echo e(trans('admin/users/general.two_factor_enrolled')); ?>

                            </div>
                            <div class="col-md-9" id="two_factor_reset_toggle">
                              <?php echo ($user->two_factor_active_and_enrolled()) ? '<i class="fas fa-check fa-fw text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times fa-fw text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>


                            </div>
                          </div>
                          
                          <?php if((Auth::user()->isSuperUser()) && ($user->two_factor_active_and_enrolled()) && ($snipeSettings->two_factor_enabled!='0') && ($snipeSettings->two_factor_enabled!='')): ?>
                          
                            <!-- 2FA reset -->
                            <div class="row">
                              <div class="col-md-3">

                              </div>
                              <div class="col-md-9">
                                
                                <a class="btn btn-default btn-sm" id="two_factor_reset" style="margin-right: 10px; margin-top: 10px;">
                                  <?php echo e(trans('admin/settings/general.two_factor_reset')); ?>

                                </a>
                                <span id="two_factor_reseticon">
                                </span>
                                <span id="two_factor_resetresult">
                                </span>
                                <span id="two_factor_resetstatus">
                                </span>
                                <br>
                                <p class="help-block" style="line-height: 1.6;"><?php echo e(trans('admin/settings/general.two_factor_reset_help')); ?></p>
                          
                                
                              </div>
                            </div>
                            <?php endif; ?> 
                  <?php endif; ?>
                    

                    <?php if($user->notes): ?>
                     <!-- empty -->
                     <div class="row">

                      <div class="col-md-3">
                        <?php echo e(trans('admin/users/table.notes')); ?>

                      </div>
                      <div class="col-md-9">
                          <?php echo nl2br(Helper::parseEscapedMarkedownInline($user->notes)); ?>

                      </div>

                    </div>
                    <?php endif; ?>
                   <?php if($user->getUserTotalCost()->total_user_cost > 0): ?>
                   <div class="row">
                       <div class="col-md-3">
                           <?php echo e(trans('admin/users/table.total_assets_cost')); ?>

                       </div>
                       <div class="col-md-9">
                           <?php echo e(Helper::formatCurrencyOutput($user->getUserTotalCost()->total_user_cost)); ?>


                           <a id="optional_info" class="text-primary">
                               <i class="fa fa-caret-right fa-2x" id="optional_info_icon"></i>
                               <strong><?php echo e(trans('admin/hardware/form.optional_infos')); ?></strong>
                           </a>
                       </div>
                           <div id="optional_details" class="col-md-12" style="display:none">
                               <div class="col-md-3" style="border-top:none;"></div>
                               <div class="col-md-9" style="border-top:none;">
                               <?php echo e(trans('general.assets').': '. Helper::formatCurrencyOutput($user->getUserTotalCost()->asset_cost)); ?><br>
                               <?php echo e(trans('general.licenses').': '. Helper::formatCurrencyOutput($user->getUserTotalCost()->license_cost)); ?><br>
                               <?php echo e(trans('general.accessories').': '.Helper::formatCurrencyOutput($user->getUserTotalCost()->accessory_cost)); ?><br>
                               </div>
                           </div>
                   </div><!--/.row-->
                   <?php endif; ?>
                  </div> <!--/end striped container-->
                </div> <!-- end col-md-9 -->
          </div> <!--/.row-->
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="asset">
          <!-- checked out assets table -->

            <?php echo $__env->make('partials.asset-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="table table-responsive">

            <table
                    data-click-to-select="true"
                    data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                    data-cookie-id-table="userAssetsListingTable"
                    data-pagination="true"
                    data-id-table="userAssetsListingTable"
                    data-search="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-fullscreen="true"
                    data-show-export="true"
                    data-show-footer="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-sort-name="name"
                    data-toolbar="#assetsBulkEditToolbar"
                    data-bulk-button-id="#bulkAssetEditButton"
                    data-bulk-form-id="#assetsBulkForm"
                    id="userAssetsListingTable"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.assets.index',['assigned_to' => e($user->id), 'assigned_type' => 'App\Models\User'])); ?>"
                    data-export-options='{
                "fileName": "export-<?php echo e(str_slug($user->present()->fullName())); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
            </table>
          </div>
        </div><!-- /asset -->

        <div class="tab-pane" id="licenses">
          <div class="table-responsive">
            <table
                    data-cookie-id-table="userLicenseTable"
                    data-id-table="userLicenseTable"
                    id="userLicenseTable"
                    data-search="true"
                    data-pagination="true"
                    data-side-pagination="client"
                    data-show-columns="true"
                    data-show-fullscreen="true"
                    data-show-export="true"
                    data-show-footer="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    data-sort-name="name"
                    class="table table-striped snipe-table table-hover"
                    data-export-options='{
                    "fileName": "export-license-<?php echo e(str_slug($user->username)); ?>-<?php echo e(date('Y-m-d')); ?>",
                    "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","delete","download","icon"]
                    }'>

              <thead>
                <tr>
                  <th class="col-md-5"><?php echo e(trans('general.name')); ?></th>
                  <th><?php echo e(trans('admin/licenses/form.license_key')); ?></th>
                  <th data-footer-formatter="sumFormatter" data-fieldname="purchase_cost"><?php echo e(trans('general.purchase_cost')); ?></th>
                  <th><?php echo e(trans('admin/licenses/form.purchase_order')); ?></th>
                  <th><?php echo e(trans('general.order_number')); ?></th>
                  <th class="col-md-1 hidden-print"><?php echo e(trans('general.action')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td class="col-md-4">
                    <?php echo $license->present()->nameUrl(); ?>

                  </td>
                  <td class="col-md-4">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                    <?php echo $license->present()->serialUrl(); ?>

                    <?php else: ?>
                      ------------
                    <?php endif; ?>
                  </td>
                  <td class="col-md-2">
                    <?php echo e(Helper::formatCurrencyOutput($license->purchase_cost)); ?>

                  </td>
                  <td>
                    <?php echo e($license->purchase_order); ?>

                  </td>
                  <td>
                    <?php echo e($license->order_number); ?>

                  </td>
                  <td class="hidden-print col-md-2">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $license)): ?>
                      <a href="<?php echo e(route('licenses.checkin', array('licenseSeatId'=> $license->pivot->id, 'backto'=>'user'))); ?>" class="btn btn-primary btn-sm hidden-print"><?php echo e(trans('general.checkin')); ?></a>
                     <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
          </div>
        </div><!-- /licenses-tab -->

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
                    data-show-refresh="true"
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
                    <th class-="col-md-5" data-fieldname="note"><?php echo e(trans('general.notes')); ?></th>
                    <th class="col-md-1" data-footer-formatter="sumFormatter" data-fieldname="purchase_cost"><?php echo e(trans('general.purchase_cost')); ?></th>
                    <th class="col-md-1 hidden-print"><?php echo e(trans('general.action')); ?></th>
                </tr>
              </thead>
              <tbody>
                  <?php $__currentLoopData = $user->accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo $accessory->present()->nameUrl(); ?></td>
                      <td><?php echo $accessory->pivot->note; ?></td>
                      <td>
                      <?php echo Helper::formatCurrencyOutput($accessory->purchase_cost); ?>

                      </td>
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
                    data-show-refresh="true"
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
                  <th class="col-md-2" data-footer-formatter="sumFormatter" data-fieldname="purchase_cost"><?php echo e(trans('general.purchase_cost')); ?></th>
                  <th class="col-md-2"><?php echo e(trans('general.date')); ?></th>
                    <th class="col-md-5"><?php echo e(trans('general.notes')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $user->consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo $consumable->present()->nameUrl(); ?></td>
                  <td>
                    <?php echo Helper::formatCurrencyOutput($consumable->purchase_cost); ?>

                  </td>
                  <td><?php echo e(Helper::getFormattedDateObject($consumable->pivot->created_at, 'datetime',  false)); ?></td>
                  <td><?php echo e($consumable->pivot->note); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
          </div>
        </div><!-- /consumables-tab -->

        <div class="tab-pane" id="files">
          <div class="row">

            <div class="col-md-12 col-sm-12">
              <div class="table-responsive">
                  <table
                          data-cookie-id-table="userUploadsTable"
                          data-id-table="userUploadsTable"
                          id="userUploadsTable"
                          data-search="true"
                          data-pagination="true"
                          data-side-pagination="client"
                          data-show-columns="true"
                          data-show-fullscreen="true"
                          data-show-export="true"
                          data-show-footer="true"
                          data-toolbar="#upload-toolbar"
                          data-show-refresh="true"
                          data-sort-order="asc"
                          data-sort-name="name"
                          class="table table-striped snipe-table"
                          data-export-options='{
                    "fileName": "export-license-uploads-<?php echo e(str_slug($user->name)); ?>-<?php echo e(date('Y-m-d')); ?>",
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
                    <?php $__currentLoopData = $user->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i>
                                <span class="sr-only"><?php echo e(Helper::filetype_icon($file->filename)); ?></span>

                            </td>
                            <td>
                                <?php if(($file->filename) && (Storage::exists('private_uploads/users/'.$file->filename))): ?>
                                   <?php if(Helper::checkUploadIsImage($file->get_src('users'))): ?>
                                        <a href="<?php echo e(route('show/userfile', [$user->id, $file->id, 'inline' => 'true'])); ?>" data-toggle="lightbox" data-type="image"><img src="<?php echo e(route('show/userfile', [$user->id, $file->id, 'inline' => 'true'])); ?>" class="img-thumbnail" style="max-width: 50px;"></a>
                                    <?php else: ?>
                                        <?php echo e(trans('general.preview_not_available')); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                        <?php echo e(trans('general.file_not_found')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($file->filename); ?>

                            </td>
                            <td data-value="<?php echo e((Storage::exists('private_uploads/users/'.$file->filename)) ? Storage::size('private_uploads/users/'.$file->filename) : ''); ?>">
                                <?php echo e((Storage::exists('private_uploads/users/'.$file->filename)) ? Helper::formatFilesizeUnits(Storage::size('private_uploads/users/'.$file->filename)) : ''); ?>

                            </td>

                            <td>
                                <?php if($file->note): ?>
                                    <?php echo e($file->note); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($file->filename): ?>
                                    <?php if(Storage::exists('private_uploads/users/'.$file->filename)): ?>
                                        <a href="<?php echo e(route('show/userfile', [$user->id, $file->id])); ?>" class="btn btn-sm btn-default">
                                            <i class="fas fa-download" aria-hidden="true"></i>
                                            <span class="sr-only"><?php echo e(trans('general.download')); ?></span>
                                        </a>

                                        <a href="<?php echo e(route('show/userfile', [$user->id, $file->id, 'inline' => 'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
                                            <i class="fa fa-external-link" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($file->created_at); ?></td>

                            <td>
                                <a class="btn delete-asset btn-danger btn-sm hidden-print" href="<?php echo e(route('userfile.destroy', [$user->id, $file->id])); ?>" data-content="Are you sure you wish to delete this file?" data-title="Delete <?php echo e($file->filename); ?>?">
                                    <i class="fa fa-trash icon-white" aria-hidden="true"></i>
                                    <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                                </a>
                            </td>



                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div> <!--/ROW-->
        </div><!--/FILES-->

        <div class="tab-pane" id="history">
          <div class="table-responsive">


            <table
                    data-click-to-select="true"
                    data-cookie-id-table="usersHistoryTable"
                    data-pagination="true"
                    data-id-table="usersHistoryTable"
                    data-search="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-fullscreen="true"
                    data-show-export="true"
                    data-show-refresh="true"
                    data-sort-order="desc"
                    id="usersHistoryTable"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.activity.index', ['target_id' => $user->id, 'target_type' => 'user'])); ?>"
                    data-export-options='{
                "fileName": "export-<?php echo e(str_slug($user->present()->fullName )); ?>-history-<?php echo e(date('Y-m-d')); ?>",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
              <thead>
              <tr>
                <th data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter">Icon</th>
                <th data-field="created_at" data-formatter="dateDisplayFormatter" data-sortable="true"><?php echo e(trans('general.date')); ?></th>
                  <th data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                  <th data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                  <th data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
                  <th data-field="note"><?php echo e(trans('general.notes')); ?></th>
                  <?php if($snipeSettings->require_accept_signature=='1'): ?>
                      <th data-field="signature_file" data-visible="false"  data-formatter="imageFormatter"><?php echo e(trans('general.signature')); ?></th>
                  <?php endif; ?>
                  <th data-field="item.serial" data-visible="false"><?php echo e(trans('admin/hardware/table.serial')); ?></th>
                  <th data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                  <th data-field="remote_ip" data-visible="false" data-sortable="true"><?php echo e(trans('admin/settings/general.login_ip')); ?></th>
                  <th data-field="user_agent" data-visible="false" data-sortable="true"><?php echo e(trans('admin/settings/general.login_user_agent')); ?></th>
                  <th data-field="action_source" data-visible="false" data-sortable="true"><?php echo e(trans('general.action_source')); ?></th>

              </tr>
              </thead>
            </table>

          </div>
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="managed-locations">

            <?php echo $__env->make('partials.locations-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <table
                    data-columns="<?php echo e(\App\Presenters\LocationPresenter::dataTableLayout()); ?>"
                    data-cookie-id-table="locationTable"
                    data-click-to-select="true"
                    data-pagination="true"
                    data-id-table="locationTable"
                    data-toolbar="#locationsBulkEditToolbar"
                    data-bulk-button-id="#bulkLocationsEditButton"
                    data-bulk-form-id="#locationsBulkForm"
                    data-search="true"
                    data-show-footer="true"
                    data-side-pagination="server"
                    data-show-columns="true"
                    data-show-fullscreen="true"
                    data-show-export="true"
                    data-show-refresh="true"
                    data-sort-order="asc"
                    id="locationTable"
                    class="table table-striped snipe-table"
                    data-url="<?php echo e(route('api.locations.index', ['manager_id' => $user->id])); ?>"
                    data-export-options='{
              "fileName": "export-locations-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
            </table>

          </div>

          <div class="tab-pane" id="managed-users">

              <?php echo $__env->make('partials.locations-bulk-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


              <table
                      data-columns="<?php echo e(\App\Presenters\UserPresenter::dataTableLayout()); ?>"
                      data-cookie-id-table="managedUsersTable"
                      data-click-to-select="true"
                      data-pagination="true"
                      data-id-table="managedUsersTable"
                      data-toolbar="#usersBulkEditToolbar"
                      data-bulk-button-id="#bulkUsersEditButton"
                      data-bulk-form-id="#usersBulkForm"
                      data-search="true"
                      data-show-footer="true"
                      data-side-pagination="server"
                      data-show-columns="true"
                      data-show-fullscreen="true"
                      data-show-export="true"
                      data-show-refresh="true"
                      data-sort-order="asc"
                      id="managedUsersTable"
                      class="table table-striped snipe-table"
                      data-url="<?php echo e(route('api.users.index', ['manager_id' => $user->id])); ?>"
                      data-export-options='{
              "fileName": "export-users-<?php echo e(date('Y-m-d')); ?>",
              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
              }'>
              </table>

          </div>
        </div><!-- /consumables-tab -->
      </div><!-- /.tab-content -->
    </div><!-- nav-tabs-custom -->
  </div>
</div>

  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\User::class)): ?>
    <?php echo $__env->make('modals.upload-file', ['item_type' => 'user', 'item_id' => $user->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>



  <?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
  <?php echo $__env->make('partials.bootstrap-table', ['simple_view' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script nonce="<?php echo e(csrf_token()); ?>">
$(function () {

  $("#two_factor_reset").click(function(){
    $("#two_factor_resetrow").removeClass('success');
    $("#two_factor_resetrow").removeClass('danger');
    $("#two_factor_resetstatus").html('');
    $("#two_factor_reseticon").html('<i class="fas fa-spinner spin"></i>');
    $.ajax({
      url: '<?php echo e(route('api.users.two_factor_reset', ['id'=> $user->id])); ?>',
      type: 'POST',
      data: {},
      headers: {
        "X-Requested-With": 'XMLHttpRequest',
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',

      success: function (data) {
        $("#two_factor_reset_toggle").html('').html('<span class="text-danger"><i class="fas fa-times" aria-hidden="true"></i> <?php echo e(trans('general.no')); ?></span>');
        $("#two_factor_reseticon").html('');
        $("#two_factor_resetstatus").html('<span class="text-success"><i class="fas fa-check"></i> ' + data.message + '</span>');

      },

      error: function (data) {
        $("#two_factor_reseticon").html('');
        $("#two_factor_reseticon").html('<i class="fas fa-exclamation-triangle text-danger"></i>');
        $('#two_factor_resetstatus').text(data.message);
      }


    });
  });


    //binds to onchange event of your input field
    var uploadedFileSize = 0;
    $('#fileupload').bind('change', function() {
      uploadedFileSize = this.files[0].size;
      $('#progress-container').css('visibility', 'visible');
    });

    $('#fileupload').fileupload({
        //maxChunkSize: 100000,
        dataType: 'json',
        formData:{
        _token:'<?php echo e(csrf_token()); ?>',
        notes: $('#notes').val(),
        },

        progress: function (e, data) {
            //var overallProgress = $('#fileupload').fileupload('progress');
            //var activeUploads = $('#fileupload').fileupload('active');
            var progress = parseInt((data.loaded / uploadedFileSize) * 100, 10);
            $('.progress-bar').addClass('progress-bar-warning').css('width',progress + '%');
            $('#progress-bar-text').html(progress + '%');
            //console.dir(overallProgress);
        },

        done: function (e, data) {
            console.dir(data);
            // We use this instead of the fail option, since our API
            // returns a 200 OK status which always shows as "success"

            if (data && data.jqXHR && data.jqXHR.responseJSON && data.jqXHR.responseJSON.status === "error") {
                var errorMessage = data.jqXHR.responseJSON.messages["file.0"];
                $('#progress-bar-text').html(errorMessage[0]);
                $('.progress-bar').removeClass('progress-bar-warning').addClass('progress-bar-danger').css('width','100%');
                $('.progress-checkmark').fadeIn('fast').html('<i class="fas fa-times fa-3x icon-white" style="color: #d9534f"></i>');
            } else {
                $('.progress-bar').removeClass('progress-bar-warning').addClass('progress-bar-success').css('width','100%');
                $('.progress-checkmark').fadeIn('fast');
                $('#progress-container').delay(950).css('visibility', 'visible');
                $('.progress-bar-text').html('Finished!');
                $('.progress-checkmark').fadeIn('fast').html('<i class="fas fa-check fa-3x icon-white" style="color: green"></i>');
                $.each(data.result, function (index, file) {
                    $('<tr><td>' + file.note + '</td><<td>' + file.filename + '</td></tr>').prependTo("#files-table > tbody");
                });
            }
            $('#progress').removeClass('active');


        }
    });
    $("#optional_info").on("click",function(){
        $('#optional_details').fadeToggle(100);
        $('#optional_info_icon').toggleClass('fa-caret-right fa-caret-down');
        var optional_info_open = $('#optional_info_icon').hasClass('fa-caret-down');
        document.cookie = "optional_info_open="+optional_info_open+'; path=/';
    });
});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/users/view.blade.php ENDPATH**/ ?>