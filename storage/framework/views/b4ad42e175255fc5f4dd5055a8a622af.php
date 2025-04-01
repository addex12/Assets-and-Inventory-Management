<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.admin')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>



  <!-- search filter box -->
  <div class="pull-right">


    <form onsubmit="return false;">
      <div class="btn-group">
        <input id="searchinput" name="search" type="search" class="search form-control" placeholder="<?php echo e(trans('admin/settings/general.filter_by_keyword')); ?>">
        <span id="searchclear" class="fas fa-times" aria-hidden="true"></span>
        <button type="submit" disabled style="display: none" aria-hidden="true"></button>
      </div>
    </form>




  </div>
  <!--/ search filter box -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



  <style>
    #searchinput {
      width: 200px;
    }
    #searchclear {
      position: absolute;
      right: 5px;
      top: 0;
      bottom: 0;
      height: 14px;
      margin: auto;
      font-size: 14px;
      cursor: pointer;
      color: #ccc;
    }
  </style>

  <div class="row">
    <!-- search filter list -->
    <div class="list clearfix">

        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
              <a href="<?php echo e(route('settings.branding.index')); ?>" class="settings_button">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'branding','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'branding','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <br><br>
                <span class="name"><?php echo e(trans('admin/settings/general.brand')); ?></span>
                <span class="keywords" aria-hidden="true" style="display:none"><?php echo e(trans('admin/settings/general.keywords.brand')); ?></span>
              </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.brand_help')); ?></p>
            </div>
          </div>
        </div>


        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.general.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'general-settings','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'general-settings','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"> <?php echo e(trans('admin/settings/general.general_settings')); ?></span>
                  <span class="keywords" aria-hidden="true" style="display:none"><?php echo e(trans('admin/settings/general.keywords.general_settings')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.general_settings_help')); ?></p>
            </div>
          </div>
        </div>


        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.security.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'locked','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'locked','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('admin/settings/general.security')); ?></span>
                  <span class="keywords" aria-hidden="true" style="display:none"><?php echo e(trans('admin/settings/general.keywords.security')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.security_help')); ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('groups.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'groups','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'groups','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('general.groups')); ?></span>
                  <span class="keywords" aria-hidden="true" style="display:none"> <?php echo e(trans('admin/settings/general.keywords.groups')); ?></span>
                  </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.groups_help')); ?></p>
            </div>
          </div>
        </div>


        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.localization.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'globe-us','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'globe-us','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('admin/settings/general.localization')); ?></span>
                  <span class="keywords" aria-hidden="true" style="display:none"> <?php echo e(trans('admin/settings/general.keywords.localization')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.localization_help')); ?></p>

            </div>
          </div>
        </div>


        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.alerts.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'bell','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'bell','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('admin/settings/general.notifications')); ?></span>

                </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.notifications_help')); ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.slack.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'hashtag','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'hashtag','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('admin/settings/general.integrations')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.webhook_help')); ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.asset_tags.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'asset-tags','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'asset-tags','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('general.asset_tags')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.asset_tags_help')); ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.labels.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'labels','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'labels','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('admin/settings/general.labels')); ?></span>
                  <span class="keywords" aria-hidden="true" style="display:none"> <?php echo e(trans('admin/settings/general.keywords.labels')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo trans('admin/settings/general.labels_help'); ?></p>
            </div>
          </div>
        </div>


        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.ldap.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'ldap','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'ldap','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('admin/settings/general.ldap')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.ldap_help')); ?></p>
            </div>
          </div>
        </div>

      <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
        <div class="admin box box-default">
          <div class="box-body text-center">
            <h5>
              <a href="<?php echo e(route('settings.google.index')); ?>" class="settings_button">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'google','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'google','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <br><br>
                <span class="name">Google</span>
              </a>
            </h5>
            <p class="help-block"><?php echo e(trans('admin/settings/general.google_login')); ?></p>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
        <div class="admin box box-default">
          <div class="box-body text-center">
            <h5>
              <a href="<?php echo e(route('settings.saml.index')); ?>" class="settings_button">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'saml','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'saml','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <br><br>
                <span class="name"><?php echo e(trans('admin/settings/general.saml')); ?></span>
              </a>
            </h5>
            <p class="help-block"><?php echo e(trans('admin/settings/general.saml_help')); ?></p>
          </div>
        </div>
      </div>

        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
                <a href="<?php echo e(route('settings.backups.index')); ?>" class="settings_button">
                  <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'backups','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'backups','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                  <br><br>
                  <span class="name"><?php echo e(trans('admin/settings/general.backups')); ?></span>
                </a>
              </h5>
              <p class="help-block"><?php echo trans('admin/settings/general.backups_help'); ?></p>
            </div>
          </div>
        </div>


      <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
        <div class="admin box box-default">
          <div class="box-body text-center">
            <h5>
              <a href="<?php echo e(route('settings.logins.index')); ?>" class="settings_button">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'logins','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'logins','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <br><br>
                <span class="name"><?php echo e(trans('admin/settings/general.login')); ?></span>
              </a>
            </h5>
            <p class="help-block"><?php echo e(trans('admin/settings/general.login_help')); ?> </p>
          </div>
        </div>
      </div>

        <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
          <div class="admin box box-default">
            <div class="box-body text-center">
              <h5>
              <a href="<?php echo e(route('settings.oauth.index')); ?>" class="settings_button">
                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'oauth','class' => 'fa-4x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'oauth','class' => 'fa-4x']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $attributes = $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__attributesOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc)): ?>
<?php $component = $__componentOriginalce262628e3a8d44dc38fd1f3965181bc; ?>
<?php unset($__componentOriginalce262628e3a8d44dc38fd1f3965181bc); ?>
<?php endif; ?>
                <br><br>
                <span class="name"><?php echo e(trans('admin/settings/general.oauth')); ?></span>
              </a>
              </h5>
              <p class="help-block"><?php echo e(trans('admin/settings/general.oauth_help')); ?></p>
            </div>
          </div>
        </div>

        <?php if(config('app.debug')=== true): ?>
          <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
            <div class="admin box box-default">
              <div class="box-body text-center">
                <h5>
                  <a href="<?php echo e(route('settings.phpinfo.index')); ?>" class="settings_button">
                    <i class="fab fa-php fa-4x" aria-hidden="true"></i>
                    <br><br>
                    <span class="name"><?php echo e(trans('admin/settings/general.php_overview')); ?></span>
                    <span class="keywords" aria-hidden="true" style="display:none"><?php echo e(trans('admin/settings/general.keywords.php_overview')); ?></span>
                  </a>
                </h5>
                <p class="help-block"><?php echo e(trans('admin/settings/general.php_overview_help')); ?></p>
              </div>
            </div>
          </div>
        <?php endif; ?>


    <div class="col-md-4 col-lg-3 col-sm-6 col-xl-1">
      <div class="admin box box-danger">
        <div class="box-body text-center">
          <h5>
            <a href="<?php echo e(route('settings.purge.index')); ?>" class="link-danger">
              <i class="fas fa-trash fa-4x" aria-hidden="true"></i>
              <br><br>
              <span class="name"><?php echo e(trans('admin/settings/general.purge')); ?></span>
              <span class="keywords" aria-hidden="true" style="display:none"><?php echo e(trans('admin/settings/general.keywords.purge')); ?></span>
            </a>
          </h5>
          <p class="help-block"><?php echo e(trans('admin/settings/general.purge_help')); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="row">
  <div class="col-md-12">
    <div class="box box-default">
      <div class="box-header">
        <h2 class="box-title"><?php echo e(trans('admin/settings/general.system')); ?></h2>
      </div>
      <div class="box-body">
        <div class="col-md-12" style="margin-right:4px;">
        <div class="row row-new-striped" style="line-height: 23px;">

          <!-- row -->
          <div class="row">
            <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
              <strong><?php echo e(trans('admin/settings/general.snipe_version')); ?>:</strong>
            </div>
            <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
              <?php echo e(config('version.app_version')); ?>  build <?php echo e(config('version.build_version')); ?> (<?php echo e(config('version.hash_version')); ?>)
            </div>

            <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
              <strong><?php echo e(trans('admin/settings/general.license')); ?>:</strong>
            </div>
            <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
              <a href="https://www.gnu.org/licenses/agpl-3.0.en.html" rel="noopener">AGPL3</a>
           </div>
          </div>
          <!-- / row -->

          <!-- row -->
          <div class="row">
            <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
              <strong><?php echo e(trans('admin/settings/general.php')); ?>:</strong>
            </div>
            <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
              <?php echo e(phpversion()); ?>

            </div>

            <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
              <strong><?php echo e(trans('admin/settings/general.laravel')); ?>:</strong>
            </div>
            <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
              <?php echo e($snipeSettings->lar_ver()); ?>

            </div>
          </div>

          <!-- row -->
          <div class="row">
              <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
                <strong><?php echo e(trans('admin/settings/general.timezone')); ?>:</strong>
              </div>
              <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
                <?php echo e(config('app.timezone')); ?>

              </div>

              <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
                <strong><?php echo e(trans('admin/settings/general.database_driver')); ?>:</strong>
              </div>
              <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
                <?php echo e(config('database.default')); ?>

              </div>
          </div>

          <!-- row -->
          <div class="row">
            <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
              <strong><?php echo e(trans('admin/settings/general.mail_from')); ?>:</strong>
            </div>
            <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
              <?php echo e(config('mail.from.name')); ?>

              <code>&lt;<?php echo e(config('mail.from.address')); ?>&gt;</code>
            </div>

            <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
              <strong><?php echo e(trans('admin/settings/general.mail_reply_to')); ?>:</strong>
            </div>
            <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
              <?php echo e(config('mail.reply_to.name')); ?>

              <code>&lt;<?php echo e(config('mail.reply_to.address')); ?>&gt;</code>
            </div>
          </div>

          <!-- row -->
          <div class="row">
            <div class="col-md-2" style="padding-top: 3px; padding-bottom: 3px;">
              <strong><?php echo e(trans('admin/settings/general.bs_table_storage')); ?>:</strong>
            </div>
            <div class="col-md-4" style="padding-top: 3px; padding-bottom: 3px;">
              <?php echo e(config('session.bs_table_storage')); ?>

            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>
        </div>
          </div>
          <!--/ row -->
        </div>
      </div> <!-- /box-body-->
    </div> <!--/box-default-->






  <?php $__env->startSection('moar_scripts'); ?>
<script nonce="<?php echo e(csrf_token()); ?>">



  var options = {
    valueNames: [ 'name', 'keywords', 'summary', 'help-block']
  };

  var settingList = new List('setting-list', options);

  $("#searchclear").click(function(){
    $("#searchinput").val('');
    settingList.search();
  });



</script>
  <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/settings/index.blade.php ENDPATH**/ ?>