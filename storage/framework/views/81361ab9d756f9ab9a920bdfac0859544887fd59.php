<?php $__env->startSection('title'); ?>
	<?php if($user->id): ?>
		<?php echo e(trans('admin/users/table.updateuser')); ?>

		<?php echo e($user->present()->fullName()); ?>

	<?php else: ?>
		<?php echo e(trans('admin/users/table.createuser')); ?>

	<?php endif; ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary pull-right">
  <?php echo e(trans('general.back')); ?></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<style>
    .form-horizontal .control-label {
      padding-top: 0px;
    }

    input[type='text'][disabled], input[disabled], textarea[disabled], input[readonly], textarea[readonly], .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
      background-color: white;
      color: #555555;
      cursor:text;
    }
    table.permissions {
      display:flex;
      flex-direction: column;
    }

    .permissions.table > thead, .permissions.table > tbody {
      margin: 15px;
      margin-top: 0px;
    }

    .permissions.table > tbody {
        border: 1px solid;
    }

    .header-row {
      border-bottom: 1px solid #ccc;
    }

    .permissions-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .table > tbody > tr > td.permissions-item {
      padding: 1px;
      padding-left: 8px;
    }

    .header-name {
      cursor: pointer;
    }

</style>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form class="form-horizontal" method="post" autocomplete="off" action="<?php echo e((isset($user->id)) ? route('users.update', ['user' => $user->id]) : route('users.store')); ?>" enctype="multipart/form-data" id="userForm">
      <?php echo e(csrf_field()); ?>


      <?php if($user->id): ?>
          <?php echo e(method_field('PUT')); ?>

      <?php endif; ?>
        <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#info" data-toggle="tab"><?php echo e(trans('general.information')); ?> </a></li>
          <li><a href="#permissions" data-toggle="tab"><?php echo e(trans('general.permissions')); ?> </a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="info">
            <div class="row">
              <div class="col-md-12">
                <!-- First Name -->
                <div class="form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="first_name"><?php echo e(trans('general.first_name')); ?></label>
                  <div class="col-md-6<?php echo e((Helper::checkIfRequired($user, 'first_name')) ? ' required' : ''); ?>">
                    <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo e(old('first_name', $user->first_name)); ?>" maxlength="191" />
                    <?php echo $errors->first('first_name', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                  </div>
                </div>

                <!-- Last Name -->
                <div class="form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="last_name"><?php echo e(trans('general.last_name')); ?> </label>
                  <div class="col-md-6<?php echo e((Helper::checkIfRequired($user, 'last_name')) ? ' required' : ''); ?>">
                    <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo e(old('last_name', $user->last_name)); ?>" maxlength="191" />
                    <?php echo $errors->first('last_name', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                  </div>
                </div>

                <!-- Username -->
                <div class="form-group <?php echo e($errors->has('username') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="username"><?php echo e(trans('admin/users/table.username')); ?></label>

                  <div class="col-md-6<?php echo e((Helper::checkIfRequired($user, 'username')) ? ' required' : ''); ?>">
                    <?php if($user->ldap_import!='1' || str_contains(Route::currentRouteName(), 'clone')): ?>
                      <input
                        class="form-control"
                        type="text"
                        name="username"
                        id="username"
                        value="<?php echo e(old('username', $user->username)); ?>"
                        autocomplete="off"
                        maxlength="191"
                        readonly
                        onfocus="this.removeAttribute('readonly');"
                        <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>

                      >

                    <?php else: ?>
                        <!-- insert the old username so we don't break validation -->
                         <?php echo e(trans('general.managed_ldap')); ?>

                          <input type="hidden" name="username" value="<?php echo e(Request::old('username', $user->username)); ?>">
                    <?php endif; ?>
                  </div>


                    <?php if(config('app.lock_passwords') && ($user->id)): ?>
                        <!-- disallow changing existing usernames on the demo -->
                        <div class="col-md-8 col-md-offset-3">
                            <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if($errors->first('username')): ?>
                        <div class="col-md-8 col-md-offset-3">
                            <?php echo $errors->first('username', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                        </div>
                    <?php endif; ?>

                </div>

                <!-- Password -->
                <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="password">
                    <?php echo e(trans('admin/users/table.password')); ?>

                  </label>
                  <div class="col-md-6<?php echo e((Helper::checkIfRequired($user, 'password')) ? ' required' : ''); ?>">
                    <?php if($user->ldap_import!='1' || str_contains(Route::currentRouteName(), 'clone') ): ?>
                      <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        value=""
                        maxlength="500"
                        autocomplete="off"
                        readonly
                        onfocus="this.removeAttribute('readonly');"
                        <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>>
                    <?php else: ?>
                      <?php echo e(trans('general.managed_ldap')); ?>

                    <?php endif; ?>
                    <span id="generated-password"></span>
                    <?php echo $errors->first('password', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                  </div>
                  <div class="col-md-2">
                    <?php if($user->ldap_import!='1'): ?>
                      <a href="#" class="left" id="genPassword"><?php echo e(trans('general.generate')); ?></a>
                    <?php endif; ?>
                  </div>
                </div>


                <?php if($user->ldap_import!='1' || str_contains(Route::currentRouteName(), 'clone')): ?>
                <!-- Password Confirm -->
                <div class="form-group <?php echo e($errors->has('password_confirmation') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="password_confirmation">
                    <?php echo e(trans('admin/users/table.password_confirm')); ?>

                  </label>
                  <div class="col-md-6<?php echo e(((Helper::checkIfRequired($user, 'password_confirmation')) && (!$user->id)) ? ' required' : ''); ?>">
                    <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirm"
                    class="form-control"
                    value=""
                    maxlength="500"
                    autocomplete="off"
                    aria-label="password_confirmation"
                    readonly
                    onfocus="this.removeAttribute('readonly');"
                    <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>

                    >
                    <?php if(config('app.lock_passwords') && ($user->id)): ?>
                    <p class="help-block"><?php echo e(trans('admin/users/table.lock_passwords')); ?></p>
                    <?php endif; ?>
                    <?php echo $errors->first('password_confirmation', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                  </div>
                </div>
                <?php endif; ?>

              <!-- Activation Status (Can the user login?) -->
                  <div class="form-group <?php echo e($errors->has('activated') ? 'has-error' : ''); ?>">
                          <div class="col-md-9 col-md-offset-3">

                              <!-- checkbox($name, $value = 1, $checked = null, $options = array() -->
                              <?php if(config('app.lock_passwords')): ?>
                                  <!-- demo mode - disallow changes -->
                                  <label class="form-control form-control--disabled">
                                      <input type="checkbox" value="1" name="activated" class="disabled" <?php echo e((old('activated', $user->activated)) == '1' ? ' checked="checked"' : ''); ?> disabled="disabled" aria-label="activated">
                                      <?php echo e(trans('admin/users/general.activated_help_text')); ?>


                                  </label>
                                  <p class="text-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>

                              <?php elseif($user->id === Auth::user()->id): ?>
                                  <!-- disallow the user from editing their own login status -->
                                  <label class="form-control form-control--disabled">
                                      <?php echo e(Form::checkbox('activated', '1', old('activated', $user->activated), ['disabled' => true, 'checked'=> 'checked', 'aria-label'=>'update_real_loc'])); ?>

                                      <?php echo e(trans('admin/users/general.activated_help_text')); ?>

                                  </label>
                                  <p class="text-warning"><?php echo e(trans('admin/users/general.activated_disabled_help_text')); ?></p>
                              <?php else: ?>
                                  <!-- everything is normal - as you were -->
                                  <label class="form-control">
                                      <input type="checkbox" value="1" name="activated"<?php echo e(((old('activated') == '1') || ($user->activated) == '1') ? ' checked="checked"' : ''); ?> aria-label="activated" id="activated">
                                      <?php echo e(trans('admin/users/general.activated_help_text')); ?>

                                  </label>
                              <?php endif; ?>

                          </div>
                  </div>


                  <!-- Email -->
                <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                  <label class="col-md-3 control-label" for="email"><?php echo e(trans('admin/users/table.email')); ?> </label>
                  <div class="col-md-6<?php echo e((Helper::checkIfRequired($user, 'email')) ? ' required' : ''); ?>">
                    <input
                      class="form-control"
                      type="text"
                      name="email"
                      id="email"
                      maxlength="191"
                      value="<?php echo e(Request::old('email', $user->email)); ?>"
                      <?php echo e(((config('app.lock_passwords') && ($user->id)) ? ' disabled' : '')); ?>

                      autocomplete="off"
                      readonly
                      onfocus="this.removeAttribute('readonly');">
                    <?php if(config('app.lock_passwords') && ($user->id)): ?>
                    <p class="help-block"><?php echo e(trans('admin/users/table.lock_passwords')); ?></p>
                    <?php endif; ?>
                    <?php echo $errors->first('email', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                  </div>
                </div>


                  <!-- Email user -->
                  <?php if(!$user->id): ?>
                      <div class="form-group" id="email_user_row">

                          <div class="col-md-8 col-md-offset-3">
                              <label class="form-control form-control--disabled">

                                  <?php echo e(Form::checkbox('email_user', '1', old('email_user'), ['id' => "email_user_checkbox", 'aria-label'=>'email_user'])); ?>


                                  <?php echo e(trans('admin/users/general.email_user_creds_on_create')); ?>

                              </label>

                              <p class="help-block"> <?php echo e(trans('admin/users/general.send_email_help')); ?></p>

                          </div>
                      </div> <!--/form-group-->
                  <?php endif; ?>

                  <?php echo $__env->make('partials.forms.edit.image-upload', ['fieldname' => 'avatar', 'image_path' => app('users_upload_path')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                  <!-- begin optional disclosure arrow stuff -->
                  <div class="form-group">
                      <label class="col-md-3 control-label"></label>

                      <div class="col-md-9 col-sm-9 col-md-offset-3">

                          <a id="optional_user_info" class="text-primary">
                              <i class="fa fa-caret-right fa-2x" id="optional_user_info_icon"></i>
                              <strong><?php echo e(trans('admin/hardware/form.optional_infos')); ?></strong>
                          </a>

                      </div>

                      <div id="optional_user_details" class="col-md-12" style="display:none">
                          <!-- everything here should be what is considered optional -->
                          <br>
                          <!-- Company -->
                          <?php if(\App\Models\Company::canManageUsersCompanies()): ?>
                              <?php echo $__env->make('partials.forms.edit.company-select', ['translated_name' => trans('general.select_company'), 'fieldname' => 'company_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <?php endif; ?>


                          <!-- language -->
                          <div class="form-group <?php echo e($errors->has('locale') ? 'has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="locale"><?php echo e(trans('general.language')); ?></label>
                              <div class="col-md-9">
                                  <?php echo Form::locales('locale', old('locale', $user->locale), 'select2'); ?>

                                  <?php echo $errors->first('locale', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>

                          <!-- Employee Number -->
                          <div class="form-group <?php echo e($errors->has('employee_num') ? 'has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="employee_num"><?php echo e(trans('general.employee_number')); ?></label>
                              <div class="col-md-6">
                                  <input
                                          class="form-control"
                                          type="text"
                                          aria-label="employee_num"
                                          name="employee_num"
                                          maxlength="191"
                                          id="employee_num"
                                          value="<?php echo e(Request::old('employee_num', $user->employee_num)); ?>"
                                  />
                                  <?php echo $errors->first('employee_num', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>


                          <!-- Jobtitle -->
                          <div class="form-group <?php echo e($errors->has('jobtitle') ? 'has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="jobtitle"><?php echo e(trans('admin/users/table.title')); ?></label>
                              <div class="col-md-6">
                                  <input
                                          class="form-control"
                                          type="text"
                                          maxlength="191"
                                          name="jobtitle"
                                          id="jobtitle"
                                          value="<?php echo e(Request::old('jobtitle', $user->jobtitle)); ?>"
                                  />
                                  <?php echo $errors->first('jobtitle', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>


                          <!-- Manager -->
                          <?php echo $__env->make('partials.forms.edit.user-select', ['translated_name' => trans('admin/users/table.manager'), 'fieldname' => 'manager_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                          <!--  Department -->
                          <?php echo $__env->make('partials.forms.edit.department-select', ['translated_name' => trans('general.department'), 'fieldname' => 'department_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                          <?php echo $__env->make('partials.forms.edit.datepicker', ['translated_name' => trans('general.start_date'), 'fieldname' => 'start_date', 'item' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                          <?php echo $__env->make('partials.forms.edit.datepicker', ['translated_name' => trans('general.end_date'), 'fieldname' => 'end_date', 'item' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                          <!-- VIP checkbox -->

                          <div class="form-group">
                              <div class="col-md-7 col-md-offset-3">

                                  <label class="form-control" for="vip">
                                      <input type="checkbox" value="1" name="vip" <?php echo e((old('vip', $user->vip)) == '1' ? ' checked="checked"' : ''); ?> aria-label="vip">
                                      <?php echo e(trans('admin/users/general.vip_label')); ?>

                                  </label>

                                  <p class="help-block"><?php echo e(trans('admin/users/general.vip_help')); ?></p>
                              </div>
                          </div>

                          <!-- Auto assign checkbox -->

                          <div class="form-group">
                              <div class="col-md-7 col-md-offset-3">

                                  <label class="form-control" for="autoassign_licenses">
                                      <input type="checkbox" value="1" name="autoassign_licenses" <?php echo e((old('autoassign_licenses', $user->autoassign_licenses)) == '1' ? " checked='checked'" : ''); ?> aria-label="autoassign_licenses">
                                      <?php echo e(trans('general.autoassign_licenses')); ?>

                                  </label>

                                  <p class="help-block"><?php echo e(trans('general.autoassign_licenses_help_long')); ?></p>
                              </div>
                          </div>


                          <!-- remote checkbox -->
                          <div class="form-group">
                              <div class="col-md-7 col-md-offset-3">
                                  <label for="remote" class="form-control">
                                      <input type="checkbox" value="1" name="remote" <?php echo e((old('remote', $user->remote)) == '1' ? ' checked="checked"' : ''); ?> aria-label="remote">
                                      <?php echo e(trans('admin/users/general.remote_label')); ?>

                                  </label>
                                  <p class="help-block"><?php echo e(trans('admin/users/general.remote_help')); ?>

                                  </p>
                              </div>
                          </div>


                          <!-- Location -->
                          <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                          <!-- Phone -->
                          <div class="form-group <?php echo e($errors->has('phone') ? 'has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="phone"><?php echo e(trans('admin/users/table.phone')); ?></label>
                              <div class="col-md-6">
                                  <input class="form-control" type="text" name="phone" id="phone" value="<?php echo e(old('phone', $user->phone)); ?>" maxlength="191" />
                                  <?php echo $errors->first('phone', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>

                          <!-- Website URL -->
                          <div class="form-group <?php echo e($errors->has('website') ? ' has-error' : ''); ?>">
                              <label for="website" class="col-md-3 control-label"><?php echo e(trans('general.website')); ?></label>
                              <div class="col-md-6">
                                  <input class="form-control" type="text" name="website" id="website" value="<?php echo e(old('website', $user->website)); ?>" maxlength="191" />
                                  <?php echo $errors->first('website', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                              </div>
                          </div>

                          <!-- Address -->
                          <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="address"><?php echo e(trans('general.address')); ?></label>
                              <div class="col-md-6">
                                  <input class="form-control" type="text" name="address" id="address" value="<?php echo e(old('address', $user->address)); ?>" maxlength="191" />
                                  <?php echo $errors->first('address', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>

                          <!-- City -->
                          <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="city"><?php echo e(trans('general.city')); ?></label>
                              <div class="col-md-6">
                                  <input class="form-control" type="text" name="city" id="city" aria-label="city" value="<?php echo e(old('city', $user->city)); ?>" maxlength="191" />
                                  <?php echo $errors->first('city', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>

                          <!-- State -->
                          <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="state"><?php echo e(trans('general.state')); ?></label>
                              <div class="col-md-6">
                                  <input class="form-control" type="text" name="state" id="state" value="<?php echo e(old('state', $user->state)); ?>" maxlength="191" />
                                  <?php echo $errors->first('state', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>

                          <!-- Country -->
                          <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="country"><?php echo e(trans('general.country')); ?></label>
                              <div class="col-md-6">
                                  <?php echo Form::countries('country', old('country', $user->country), 'col-md-12 select2'); ?>

                                  <?php echo $errors->first('country', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>

                          <!-- Zip -->
                          <div class="form-group<?php echo e($errors->has('zip') ? ' has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="zip"><?php echo e(trans('general.zip')); ?></label>
                              <div class="col-md-3">
                                  <input class="form-control" type="text" name="zip" id="zip" value="<?php echo e(old('zip', $user->zip)); ?>" maxlength="10" />
                                  <?php echo $errors->first('zip', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

                              </div>
                          </div>

                          <!-- Notes -->
                          <div class="form-group<?php echo $errors->has('notes') ? ' has-error' : ''; ?>">
                              <label for="notes" class="col-md-3 control-label"><?php echo e(trans('admin/users/table.notes')); ?></label>
                              <div class="col-md-6">
                                  <textarea class="form-control" rows="5" id="notes" name="notes"><?php echo e(old('notes', $user->notes)); ?></textarea>
                                  <?php echo $errors->first('notes', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                              </div>
                          </div>

                          <?php if($snipeSettings->two_factor_enabled!=''): ?>
                              <?php if($snipeSettings->two_factor_enabled=='1'): ?>
                                  <div class="form-group">
                                      <div class="col-md-9 col-md-offset-3">

                                          <?php if(config('app.lock_passwords')): ?>

                                              <label class="form-control form-control--disabled" for="two_factor_optin">
                                                  <input type="checkbox" value="1" name="two_factor_optin" <?php echo e((old('two_factor_optin', $user->two_factor_optin)) == '1' ? ' checked="checked"' : ''); ?> aria-label="two_factor_optin" disabled>
                                                  <?php echo e(trans('admin/settings/general.two_factor')); ?>

                                              </label>

                                          <?php else: ?>

                                              <label class="form-control" for="two_factor_optin">
                                                  <input type="checkbox" value="1" name="two_factor_optin" <?php echo e((old('two_factor_optin', $user->two_factor_optin)) == '1' ? ' checked="checked"' : ''); ?> aria-label="two_factor_optin">
                                                  <?php echo e(trans('admin/settings/general.two_factor')); ?>

                                              </label>
                                              <p class="help-block"><?php echo e(trans('admin/users/general.two_factor_admin_optin_help')); ?></p>

                                          <?php endif; ?>

                                      </div>
                                  </div>
                              <?php endif; ?>

                              <?php if((Auth::user()->isSuperUser()) && ($user->two_factor_active_and_enrolled()) && ($snipeSettings->two_factor_enabled!='0') && ($snipeSettings->two_factor_enabled!='')): ?>
                                  <!-- Reset Two Factor -->
                                  <div class="form-group">
                                      <div class="col-md-8 col-md-offset-3 two_factor_resetrow">
                                          <a class="btn btn-default btn-sm pull-left" id="two_factor_reset" style="margin-right: 10px;"> <?php echo e(trans('admin/settings/general.two_factor_reset')); ?></a>
                                          <span id="two_factor_reseticon"></span>
                                          <span id="two_factor_resetresult"></span>
                                          <span id="two_factor_resetstatus"></span>
                                      </div>
                                      <div class="col-md-8 col-md-offset-3 two_factor_resetrow">
                                          <p class="help-block"><?php echo e(trans('admin/settings/general.two_factor_reset_help')); ?></p>
                                      </div>
                                  </div>
                              <?php endif; ?>

                          <?php endif; ?>

                          <!-- Groups -->
                          <div class="form-group<?php echo e($errors->has('groups') ? ' has-error' : ''); ?>">
                              <label class="col-md-3 control-label" for="groups[]"> <?php echo e(trans('general.groups')); ?></label>
                              <div class="col-md-6">

                                  <?php if($groups->count()): ?>
                                      <?php if((Config::get('app.lock_passwords') || (!Auth::user()->isSuperUser()))): ?>

                                          <?php if(count($userGroups->keys()) > 0): ?>
                                              <ul>
                                                  <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <?php echo ($userGroups->keys()->contains($id) ? '<li>'.e($group).'</li>' : ''); ?>

                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              </ul>
                                          <?php endif; ?>

                                          <span class="help-block"><?php echo e(trans('admin/users/general.group_memberships_helpblock')); ?></span>
                                  <?php else: ?>
                                   <div class="controls">
                                    <select
                                            name="groups[]"
                                            aria-label="groups[]"
                                            id="groups[]"
                                            multiple="multiple"
                                            class="form-control">

                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($id); ?>"
                                                    <?php echo e(($userGroups->keys()->contains($id) ? ' selected="selected"' : '')); ?>>
                                                <?php echo e($group); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <span class="help-block">
                                      <?php echo e(trans('admin/users/table.groupnotes')); ?>

                                    </span>
                            </div>
                                 <?php endif; ?>
                           <?php else: ?>
                                      <p><?php echo e(trans('admin/users/table.nogroup')); ?> <code><?php echo e(trans('admin/settings/general.admin_settings')); ?> <i class="fa fa-cogs"></i> > <?php echo e(trans('general.groups')); ?> <i class="fas fa-user-friends"></i></code> </p>
                           <?php endif; ?>

                              </div>
                          </div>
                      </div>
                  </div>





              </div> <!--/col-md-12-->
            </div>
          </div><!-- /.tab-pane -->

          <div class="tab-pane" id="permissions">
            <div class="col-md-12">
              <?php if(!Auth::user()->isSuperUser()): ?>
                <p class="alert alert-warning"><?php echo e(trans('admin/users/general.superadmin_permission_warning')); ?></p>
              <?php endif; ?>

              <?php if(!Auth::user()->hasAccess('admin')): ?>
                <p class="alert alert-warning"><?php echo e(trans('admin/users/general.admin_permission_warning')); ?></p>
              <?php endif; ?>
            </div>

            <table class="table table-striped permissions">
              <thead>
                <tr class="permissions-row">
                  <th class="col-md-5"><?php echo e(trans('admin/groups/titles.permission')); ?></th>
                  <th class="col-md-1"><?php echo e(trans('admin/groups/titles.grant')); ?></th>
                  <th class="col-md-1"><?php echo e(trans('admin/groups/titles.deny')); ?></th>
                  <th class="col-md-1"><?php echo e(trans('admin/users/table.inherit')); ?></th>
                </tr>
              </thead>
                <?php echo $__env->make('partials.forms.edit.permissions-base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </table>
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
        <div class="box-footer text-right">
          <button type="submit" accesskey="s" class="btn btn-primary"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.save')); ?></button>
        </div>
      </div><!-- nav-tabs-custom -->
    </form>
  </div> <!--/col-md-8-->
</div><!--/row-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>

<script nonce="<?php echo e(csrf_token()); ?>">

$(document).ready(function() {


    // If the "user can login" check box is checked, show them the ability to email the user credentials
    $("#activated").change(function() {
        if (this.checked) {
            $("#email_user_row").show();
        } else {
            $("#email_user_row").hide();
        }
    });


    // Set some defaults
    $('#email_user_checkbox').prop("disabled", true);
    $('#email_user_checkbox').prop("checked", false);
    $("#email_user_checkbox").removeAttr('checked');

    // If the email address is longer than 5 characters, enable the "send email" checkbox
    $('#email').on('keyup',function(){
        //event.preventDefault();

        <?php if(!config('app.lock_passwords')): ?>

        if (this.value.length > 5){
            console.log('email field is ' + this.value.length + ' - enable the checkbox');
            $('#email_user_checkbox').prop("disabled", false);
            $("#email_user_checkbox").parent().removeClass("form-control--disabled");
        } else {
            console.log('email field is ' + this.value.length + ' - DISABLE the checkbox');
            $('#email_user_checkbox').prop("disabled", true);
            $('#email_user_checkbox').prop("checked", false);
            $("#email_user_checkbox").parent().addClass("form-control--disabled");
        }

        <?php endif; ?>
    });


	// Check/Uncheck all radio buttons in the group
    $('tr.header-row input:radio').change(function() {
        value = $(this).attr('value');
        area = $(this).data('checker-group');
        $('.radiochecker-'+area+'[value='+value+']').prop('checked', true);
    });

    $('.header-name').click(function() {
        $(this).parent().nextUntil('tr.header-row').slideToggle(500);
    });

    $('.tooltip-base').tooltip({container: 'body'})
    $(".superuser").change(function() {
        var perms = $(this).val();
        if (perms =='1') {
            $("#nonadmin").hide();
        } else {
            $("#nonadmin").show();
        }
    });

    $('#genPassword').pGenerator({
        'bind': 'click',
        'passwordElement': '#password',
        'displayElement': '#generated-password',
        'passwordLength': 16,
        'uppercase': true,
        'lowercase': true,
        'numbers':   true,
        'specialChars': true,
        'onPasswordGenerated': function(generatedPassword) {
            $('#password_confirm').val($('#password').val());
        }
    });

    $("#optional_user_info").on("click",function(){
        $('#optional_user_details').fadeToggle(100);
        $('#optional_user_info_icon').toggleClass('fa-caret-right fa-caret-down');
        var optional_user_info_open = $('#optional_user_info_icon').hasClass('fa-caret-down');
        document.cookie = "optional_user_info_open="+optional_user_info_open+'; path=/';
    });

    var all_cookies = document.cookie.split(';')
    for(var i in all_cookies) {
        var trimmed_cookie = all_cookies[i].trim(' ')
        if (trimmed_cookie.startsWith('optional_user_info_open=')) {
            elems = all_cookies[i].split('=', 2)
            if (elems[1] == 'true') {
                $('#optional_user_info').trigger('click')
            }
        }
    }

    $("#two_factor_reset").click(function(){
        $("#two_factor_resetrow").removeClass('success');
        $("#two_factor_resetrow").removeClass('danger');
        $("#two_factor_resetstatus").html('');
        $("#two_factor_reseticon").html('<i class="fas fa-spinner spin"></i> ');
        $.ajax({
            url: '<?php echo e(route('api.users.two_factor_reset', ['id'=> $user->id])); ?>',
            type: 'POST',
            data: {},
            headers: {
                "X-Requested-With": 'XMLHttpRequest',
                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') // TODO` - we should do this in ajaxSetup
            },
            dataType: 'json',

            success: function (data) {
                $("#two_factor_reseticon").html('');
                $("#two_factor_resetstatus").html('<span class="text-success"><i class="fas fa-check"></i> ' + data.message + '</span>');
            },

            error: function (data) {
                $("#two_factor_reseticon").html('');
                $("#two_factor_resetstatus").html('<span class="text-danger"><i class="fas fa-exclamation-triangle text-danger"></i> ' + data.message + '</span>');
            }


        });
    });


});
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/users/edit.blade.php ENDPATH**/ ?>