<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/hardware/general.view')); ?> <?php echo e($asset->asset_tag); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="row">

        <?php if(!$asset->model): ?>
            <div class="col-md-12">
                <div class="callout callout-danger">
                    <p><strong><?php echo e(trans('admin/models/message.no_association')); ?></strong> <?php echo e(trans('admin/models/message.no_association_fix')); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if($asset->checkInvalidNextAuditDate()): ?>
            <div class="col-md-12">
                <div class="callout callout-warning">
                    <p><strong><?php echo e(trans('general.warning',
                        [
                            'warning' => trans('admin/hardware/message.warning_audit_date_mismatch',
                                    [
                                        'last_audit_date' => Helper::getFormattedDateObject($asset->last_audit_date, 'datetime', false),
                                        'next_audit_date' => Helper::getFormattedDateObject($asset->next_audit_date, 'date', false)
                                    ]
                                    )
                        ]
                        )); ?></strong></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if($asset->deleted_at!=''): ?>
            <div class="col-md-12">
                <div class="callout callout-warning">
                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'warning']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning']); ?>
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
                    <?php echo e(trans('general.asset_deleted_warning')); ?>

                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs hidden-print">

                    <li class="active">
                        <a href="#details" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'info-circle','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info-circle','class' => 'fa-2x']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="#software" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                           <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'licenses','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'licenses','class' => 'fa-2x']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.licenses')); ?>

                                <?php echo ($asset->licenses->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->licenses->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#components" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'components','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'components','class' => 'fa-2x']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.components')); ?>

                                <?php echo ($asset->components->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->components->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#assets" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'assets','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'assets','class' => 'fa-2x']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm">
                                <?php echo e(trans('general.assets')); ?>

                                <?php echo ($asset->assignedAssets()->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->assignedAssets()->count()).'</span>' : ''; ?>


                          </span>
                        </a>
                    </li>

                    <?php if($asset->assignedAccessories->count() > 0): ?>
                        <li>
                            <a href="#accessories_assigned" data-toggle="tab" data-tooltip="true">

                                <span class="hidden-lg hidden-md">
                                    <i class="fas fa-keyboard fa-2x"></i>
                                </span>
                                <span class="hidden-xs hidden-sm">
                                    <?php echo e(trans('general.accessories_assigned')); ?>

                                    <?php echo ($asset->assignedAccessories()->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->assignedAccessories()->count()).'</span>' : ''; ?>


                                </span>
                            </a>
                        </li>
                    <?php endif; ?>


                    <li>
                        <a href="#history" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'history','class' => 'fa-2x ']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'history','class' => 'fa-2x ']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.history')); ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#maintenances" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'maintenances','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'maintenances','class' => 'fa-2x']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.maintenances')); ?>

                                <?php echo ($asset->assetmaintenances()->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->assetmaintenances()->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#files" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'files','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'files','class' => 'fa-2x']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm"><?php echo e(trans('general.files')); ?>

                                <?php echo ($asset->uploads->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->uploads->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $asset->model)): ?>
                    <li>
                        <a href="#modelfiles" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                              <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'more-files','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'more-files','class' => 'fa-2x']); ?>
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
                          </span>
                            <span class="hidden-xs hidden-sm">
                            <?php echo e(trans('general.additional_files')); ?>

                                <?php echo ($asset->model) && ($asset->model->uploads->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->model->uploads->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                        <li class="pull-right">
                            <a href="#" data-toggle="modal" data-target="#uploadFileModal">
                                <span class="hidden-lg hidden-xl hidden-md">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'paperclip','class' => 'fa-2x']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'paperclip','class' => 'fa-2x']); ?>
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
                                </span>
                                <span class="hidden-xs hidden-sm">
                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'paperclip']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'paperclip']); ?>
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
                                    <?php echo e(trans('button.upload')); ?>

                                </span>
                            </a>
                        </li>
                    <?php endif; ?>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="details">
                    <div class="row">

                        <div class="info-stack-container">
                            <!-- Start button column -->
                            <div class="col-md-3 col-xs-12 col-sm-push-9 info-stack">

                                <div class="col-md-12 text-center">
                                    <?php if(($asset->image) || (($asset->model) && ($asset->model->image!=''))): ?>
                                        <div class="text-center col-md-12" style="padding-bottom: 15px;">
                                            <a href="<?php echo e(($asset->getImageUrl()) ? $asset->getImageUrl() : null); ?>" data-toggle="lightbox" data-type="image">
                                                <img src="<?php echo e(($asset->getImageUrl()) ? $asset->getImageUrl() : null); ?>" class="assetimg img-responsive" alt="<?php echo e($asset->getDisplayNameAttribute()); ?>">
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <!-- generic image goes here -->
                                    <?php endif; ?>
                                </div>


                                <?php if($asset->deleted_at==''): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $asset)): ?>
                                        <div class="col-md-12 hidden-print" style="padding-top: 5px;">
                                            <a href="<?php echo e(route('hardware.edit', $asset)); ?>" class="btn btn-sm btn-warning btn-social btn-block hidden-print">
                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'edit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'edit']); ?>
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
                                                <?php echo e(trans('admin/hardware/general.edit')); ?>

                                            </a>
                                        </div>
                                    <?php endif; ?>


                                <?php if(($asset->assetstatus) && ($asset->assetstatus->deployable=='1')): ?>
                                    <?php if(($asset->assigned_to != '') && ($asset->deleted_at=='')): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', $asset)): ?>
                                            <div class="col-md-12 hidden-print" style="padding-top: 5px;">
                                                    <span class="tooltip-wrapper"<?php echo (!$asset->model ? ' data-tooltip="true" title="'.trans('admin/hardware/general.model_invalid_fix').'"' : ''); ?>>
                                                        <a role="button" href="<?php echo e(route('hardware.checkin.create', $asset->id)); ?>" class="btn btn-sm btn-primary bg-purple btn-social btn-block hidden-print<?php echo e((!$asset->model ? ' disabled' : '')); ?>">
                                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'checkin']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkin']); ?>
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
                                                            <?php echo e(trans('admin/hardware/general.checkin')); ?>

                                                        </a>
                                                    </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php elseif(($asset->assigned_to == '') && ($asset->deleted_at=='')): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', $asset)): ?>
                                            <div class="col-md-12 hidden-print" style="padding-top: 5px;">
                                                    <span class="tooltip-wrapper"<?php echo (!$asset->model ? ' data-tooltip="true" title="'.trans('admin/hardware/general.model_invalid_fix').'"' : ''); ?>>
                                                        <a href="<?php echo e(route('hardware.checkout.create', $asset->id)); ?>" class="btn btn-sm bg-maroon btn-social btn-block hidden-print<?php echo e((!$asset->model ? ' disabled' : '')); ?>">
                                                             <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'checkout']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'checkout']); ?>
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
                                                            <?php echo e(trans('admin/hardware/general.checkout')); ?>

                                                    </a>
                                                    </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                                        <!-- Add notes -->
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                                            <div class="col-md-12 hidden-print" style="padding-top: 5px;">
                                                <a href="#" style="width: 100%" data-toggle="modal" data-target="#createNoteModal" class="btn btn-sm btn-primary btn-block btn-social hidden-print">
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'note']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'note']); ?>
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
                                                    <?php echo e(trans('general.add_note')); ?>

                                                </a>
                                                <?php echo $__env->make('modals.add-note', ['type' => 'asset', 'id' => $asset->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
                                        <?php endif; ?>




                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit', \App\Models\Asset::class)): ?>
                                        <div class="col-md-12 hidden-print" style="padding-top: 5px;">
                                        <span class="tooltip-wrapper"<?php echo (!$asset->model ? ' data-tooltip="true" title="'.trans('admin/hardware/general.model_invalid_fix').'"' : ''); ?>>
                                            <a href="<?php echo e(route('asset.audit.create', $asset->id)); ?>" class="btn btn-sm btn-primary btn-block btn-social hidden-print<?php echo e((!$asset->model ? ' disabled' : '')); ?>">
                                                 <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'audit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'audit']); ?>
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
                                             <?php echo e(trans('general.audit')); ?>

                                            </a>
                                        </span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $asset)): ?>
                                    <div class="col-md-12 hidden-print" style="padding-top: 5px;">
                                        <a href="<?php echo e(route('clone/hardware', $asset->id)); ?>" class="btn btn-sm btn-info btn-block btn-social hidden-print">
                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'clone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'clone']); ?>
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
                                            <?php echo e(trans('admin/hardware/general.clone')); ?>

                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-12 hidden-print" style="padding-top: 5px;">
                                    <form
                                        method="POST"
                                        action="<?php echo e(route('hardware/bulkedit')); ?>"
                                        accept-charset="UTF-8"
                                        class="form-inline"
                                        target="_blank"
                                        id="bulkForm"
                                    >
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="bulk_actions" value="labels" />
                                    <input type="hidden" name="ids[<?php echo e($asset->id); ?>]" value="<?php echo e($asset->id); ?>" />
                                    <button class="btn btn-block btn-social btn-sm btn-default" id="bulkEdit"<?php echo e((!$asset->model ? ' disabled' : '')); ?><?php echo (!$asset->model ? ' data-tooltip="true" title="'.trans('admin/hardware/general.model_invalid').'"' : ''); ?>>
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'assets']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'assets']); ?>
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
                                        <?php echo e(trans_choice('button.generate_labels', 1)); ?></button>
                                    </form>
                                </div>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $asset)): ?>
                                    <div class="col-md-12 hidden-print" style="padding-top: 30px; padding-bottom: 30px;">

                                        <?php if($asset->deleted_at==''): ?>
                                            <button class="btn btn-sm btn-block btn-danger btn-social delete-asset" data-toggle="modal" data-title="<?php echo e(trans('general.delete')); ?>" data-content="<?php echo e(trans('general.sure_to_delete_var', ['item' => $asset->asset_tag])); ?>" data-target="#dataConfirmModal">

                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'delete']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'delete']); ?>
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
                                                <?php if($asset->assignedTo): ?>
                                                    <?php echo e(trans('general.checkin_and_delete')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('general.delete')); ?>

                                                <?php endif; ?>
                                            </button>
                                            <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                                        <?php else: ?>
                                            <form method="POST" action="<?php echo e(route('restore/hardware', [$asset])); ?>">
                                                <?php echo csrf_field(); ?>
                                                <button class="btn btn-sm btn-block btn-warning btn-social delete-asset">
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'restore']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'restore']); ?>
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
                                                    <?php echo e(trans('general.restore')); ?>

                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if(($asset->assignedTo) && ($asset->deleted_at=='')): ?>
                                    <div class="col-md-12" style="text-align: left">
                                        <h2>
                                            <?php echo e(trans('admin/hardware/form.checkedout_to')); ?>

                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'long-arrow-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'long-arrow-right']); ?>
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
                                        </h2>

                                        <ul class="list-unstyled" style="line-height: 25px; font-size: 14px">

                                            <?php if(($asset->checkedOutToUser()) && ($asset->assignedTo->present()->gravatar())): ?>
                                                <li>
                                                    <img src="<?php echo e($asset->assignedTo->present()->gravatar()); ?>" class="user-image-inline hidden-print" alt="<?php echo e($asset->assignedTo->present()->fullName()); ?>">
                                                    <?php echo $asset->assignedTo->present()->nameUrl(); ?>

                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => ''.e($asset->assignedType()).'','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => ''.e($asset->assignedType()).'','class' => 'fa-fw']); ?>
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
                                                    <?php echo $asset->assignedTo->present()->nameUrl(); ?>

                                                </li>
                                            <?php endif; ?>


                                            <?php if((isset($asset->assignedTo->employee_num)) && ($asset->assignedTo->employee_num!='')): ?>
                                                <li>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'employee_num','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'employee_num','class' => 'fa-fw']); ?>
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
                                                    <?php echo e($asset->assignedTo->employee_num); ?>

                                                </li>
                                            <?php endif; ?>
                                            <?php if((isset($asset->assignedTo->email)) && ($asset->assignedTo->email!='')): ?>
                                                <li>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'email','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email','class' => 'fa-fw']); ?>
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
                                                    <a href="mailto:<?php echo e($asset->assignedTo->email); ?>"><?php echo e($asset->assignedTo->email); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if((isset($asset->assignedTo)) && ($asset->assignedTo->phone!='')): ?>
                                                <li>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'phone','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'phone','class' => 'fa-fw']); ?>
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
                                                    <a href="tel:<?php echo e($asset->assignedTo->phone); ?>"><?php echo e($asset->assignedTo->phone); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if((isset($asset->assignedTo)) && ($asset->assignedTo->department)): ?>
                                                <li>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'department','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'department','class' => 'fa-fw']); ?>
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
                                                    <?php echo e($asset->assignedTo->department->name); ?></li>
                                            <?php endif; ?>

                                            <?php if(isset($asset->location)): ?>
                                                <li>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'locations','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'locations','class' => 'fa-fw']); ?>
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
                                                     <?php echo e($asset->location->name); ?></li>
                                                <li><?php echo e($asset->location->address); ?>

                                                    <?php if($asset->location->address2!=''): ?>
                                                        <?php echo e($asset->location->address2); ?>

                                                    <?php endif; ?>
                                                </li>

                                                <li><?php echo e($asset->location->city); ?>

                                                    <?php if(($asset->location->city!='') && ($asset->location->state!='')): ?>
                                                        ,
                                                    <?php endif; ?>
                                                    <?php echo e($asset->location->state); ?> <?php echo e($asset->location->zip); ?>

                                                </li>
                                            <?php endif; ?>
                                            <li>
                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'calendar','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'calendar','class' => 'fa-fw']); ?>
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
                                                <?php echo e(trans('admin/hardware/form.checkout_date')); ?>: <?php echo e(Helper::getFormattedDateObject($asset->last_checkout, 'date', false)); ?>

                                            </li>
                                            <?php if(isset($asset->expected_checkin)): ?>
                                                <li>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'calendar','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'calendar','class' => 'fa-fw']); ?>
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
                                                    <?php echo e(trans('admin/hardware/form.expected_checkin')); ?>: <?php echo e(Helper::getFormattedDateObject($asset->expected_checkin, 'date', false)); ?>

                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                    <?php if($snipeSettings->qr_code=='1'): ?>
                                        <div class="col-md-12 text-center" style="padding-top: 15px;">
                                            <img src="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($asset->id); ?>/qr_code" class="img-thumbnail" style="height: 150px; width: 150px; margin-right: 10px;" alt="QR code for <?php echo e($asset->getDisplayNameAttribute()); ?>">
                                        </div>
                                    <?php endif; ?>

                                <br><br>
                            </div>




                            <!-- End button column -->

                            <div class="col-md-9 col-xs-12 col-sm-pull-3 info-stack">

                                <div class="row-new-striped">

                                    <?php if($asset->asset_tag): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong><?php echo e(trans('admin/hardware/form.tag')); ?></strong>
                                            </div>
                                            <div class="col-md-9">
                                                <span class="js-copy-assettag"><?php echo e($asset->asset_tag); ?></span>

                                                <i class="fa-regular fa-clipboard js-copy-link hidden-print" data-clipboard-target=".js-copy-assettag" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                                                    <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                                                </i>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <?php if($asset->deleted_at!=''): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <span class="text-danger"><strong><?php echo e(trans('general.deleted')); ?></strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->deleted_at, 'date', false)); ?>


                                            </div>
                                        </div>
                                    <?php endif; ?>



                                    <?php if($asset->assetstatus): ?>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong><?php echo e(trans('general.status')); ?></strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if(($asset->assignedTo) && ($asset->deleted_at=='')): ?>
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'circle-solid','class' => 'text-blue']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'circle-solid','class' => 'text-blue']); ?>
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
                                                    <?php echo e($asset->assetstatus->name); ?>

                                                    <label class="label label-default"><?php echo e(trans('general.deployed')); ?></label>


                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'long-arrow-right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'long-arrow-right']); ?>
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
                                                    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => ''.e($asset->assignedType()).'','class' => 'fa-fw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => ''.e($asset->assignedType()).'','class' => 'fa-fw']); ?>
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
                                                    <?php echo $asset->assignedTo->present()->nameUrl(); ?>

                                                <?php else: ?>
                                                    <?php if(($asset->assetstatus) && ($asset->assetstatus->deployable=='1')): ?>
                                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'circle-solid','class' => 'text-green']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'circle-solid','class' => 'text-green']); ?>
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
                                                    <?php elseif(($asset->assetstatus) && ($asset->assetstatus->pending=='1')): ?>
                                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'circle-solid','class' => 'text-orange']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'circle-solid','class' => 'text-orange']); ?>
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
                                                    <?php else: ?>
                                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'x','class' => 'text-red']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'x','class' => 'text-red']); ?>
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
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('statuslabels.show', $asset->assetstatus->id)); ?>">
                                                        <?php echo e($asset->assetstatus->name); ?></a>
                                                    <label class="label label-default"><?php echo e($asset->present()->statusMeta); ?></label>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <?php if($asset->company): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong><?php echo e(trans('general.company')); ?></strong>
                                            </div>
                                            <div class="col-md-9">
                                                <a href="<?php echo e(url('/companies/' . $asset->company->id)); ?>"><?php echo e($asset->company->name); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->name): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong><?php echo e(trans('admin/hardware/form.name')); ?></strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e($asset->name); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->serial): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong><?php echo e(trans('admin/hardware/form.serial')); ?></strong>
                                            </div>
                                            <div class="col-md-9">
                                                <span class="js-copy-serial"><?php echo e($asset->serial); ?></span>

                                                <i class="fa-regular fa-clipboard js-copy-link hidden-print" data-clipboard-target=".js-copy-serial" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                                                    <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                                                </i>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->last_checkout!=''): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/table.checkout_date')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(Helper::getFormattedDateObject($asset->last_checkout, 'datetime', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if((isset($audit_log)) && ($audit_log->created_at)): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.last_audit')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo $asset->checkInvalidNextAuditDate() ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                <?php echo e(Helper::getFormattedDateObject($audit_log->created_at, 'datetime', false)); ?>

                                                <?php if($audit_log->user): ?>
                                                    (by <?php echo e(link_to_route('users.show', $audit_log->user->present()->fullname(), [$audit_log->user->id])); ?>)
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->next_audit_date): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.next_audit_date')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo $asset->checkInvalidNextAuditDate() ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                <?php echo e(Helper::getFormattedDateObject($asset->next_audit_date, 'date', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(($asset->model) && ($asset->model->manufacturer)): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.manufacturer')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <ul class="list-unstyled">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Manufacturer::class)): ?>

                                                        <li>
                                                            <a href="<?php echo e(route('manufacturers.show', $asset->model->manufacturer->id)); ?>">
                                                                <?php echo e($asset->model->manufacturer->name); ?>

                                                            </a>
                                                        </li>

                                                    <?php else: ?>
                                                        <li> <?php echo e($asset->model->manufacturer->name); ?></li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer) &&  ($asset->model->manufacturer->url!='')): ?>
                                                        <li>
                                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'globe-us']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'globe-us']); ?>
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
                                                            <a href="<?php echo e($asset->present()->dynamicUrl($asset->model->manufacturer->url)); ?>" target="_blank">
                                                                <?php echo e($asset->present()->dynamicUrl($asset->model->manufacturer->url)); ?>

                                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'external-link']); ?>
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
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer) &&  ($asset->model->manufacturer->support_url!='')): ?>
                                                        <li>
                                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'more-info']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'more-info']); ?>
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
                                                            <a href="<?php echo e($asset->present()->dynamicUrl($asset->model->manufacturer->support_url)); ?>" target="_blank">
                                                                <?php echo e($asset->present()->dynamicUrl($asset->model->manufacturer->support_url)); ?>

                                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'external-link']); ?>
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
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer) &&  ($asset->model->manufacturer->warranty_lookup_url!='')): ?>
                                                        <li>
                                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'maintenances']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'maintenances']); ?>
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
                                                            <a href="<?php echo e($asset->present()->dynamicUrl($asset->model->manufacturer->warranty_lookup_url)); ?>" target="_blank">
                                                                <?php echo e($asset->present()->dynamicUrl($asset->model->manufacturer->warranty_lookup_url)); ?>


                                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'external-link']); ?>
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
                                                                    <span class="sr-only"><?php echo e(trans('admin/hardware/general.mfg_warranty_lookup', ['manufacturer' => $asset->model->manufacturer->name])); ?></span></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer->support_phone)): ?>
                                                        <li>
                                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'phone']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'phone']); ?>
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
                                                            <a href="tel:<?php echo e($asset->model->manufacturer->support_phone); ?>">
                                                                <?php echo e($asset->model->manufacturer->support_phone); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer->support_email)): ?>
                                                        <li>
                                                            <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email']); ?>
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
                                                            <a href="mailto:<?php echo e($asset->model->manufacturer->support_email); ?>">
                                                                <?php echo e($asset->model->manufacturer->support_email); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong>
                                                <?php echo e(trans('general.category')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php if(($asset->model) && ($asset->model->category)): ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Category::class)): ?>

                                                    <a href="<?php echo e(route('categories.show', $asset->model->category->id)); ?>">
                                                        <?php echo e($asset->model->category->name); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e($asset->model->category->name); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                Invalid category
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if($asset->model): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.model')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if($asset->model): ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\AssetModel::class)): ?>
                                                        <a href="<?php echo e(route('models.show', $asset->model->id)); ?>">
                                                            <?php echo e($asset->model->name); ?>

                                                        </a>
                                                    <?php else: ?>
                                                        <?php echo e($asset->model->name); ?>

                                                    <?php endif; ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong>
                                                <?php echo e(trans('admin/models/table.modelnumber')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php echo e(($asset->model) ? $asset->model->model_number : ''); ?>

                                        </div>
                                    </div>

                                    <!-- byod -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong><?php echo e(trans('general.byod')); ?></strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php echo ($asset->byod=='1') ? '<i class="fas fa-check text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                                        </div>
                                    </div>

                                    <!-- requestable -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong><?php echo e(trans('admin/hardware/general.requestable')); ?></strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php echo ($asset->requestable=='1') ? '<i class="fas fa-check text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                                        </div>
                                    </div>

                                    <?php if(($asset->model) && ($asset->model->fieldset)): ?>
                                        <?php $__currentLoopData = $asset->model->fieldset->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <strong>
                                                        <?php echo e($field->name); ?>

                                                    </strong>
                                                </div>
                                                <div class="col-md-9<?php echo e((($field->format=='URL') && ($asset->{$field->db_column_name()}!='')) ? ' ellipsis': ''); ?>">
                                                    <?php if(($field->field_encrypted=='1') && ($asset->{$field->db_column_name()}!='')): ?>

                                                        <i class="fas fa-lock" data-tooltip="true" data-placement="top" title="<?php echo e(trans('admin/custom_fields/general.value_encrypted')); ?>" onclick="showHideEncValue(this)" id="text-<?php echo e($field->id); ?>"></i>
                                                    <?php endif; ?>

                                                    <?php if($field->isFieldDecryptable($asset->{$field->db_column_name()} )): ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assets.view.encrypted_custom_fields')): ?>
                                                            <?php
                                                                $fieldSize=strlen(Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()}))
                                                            ?>
                                                            <?php if($fieldSize>0): ?>
                                                                <span id="text-<?php echo e($field->id); ?>-to-hide"><?php echo e(str_repeat('*', $fieldSize)); ?></span>
                                                                <span class="js-copy-<?php echo e($field->id); ?> hidden-print" id="text-<?php echo e($field->id); ?>-to-show" style="font-size: 0px;">
                                                                <?php if(($field->format=='URL') && ($asset->{$field->db_column_name()}!='')): ?>
                                                                        <a href="<?php echo e(Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?>" target="_new"><?php echo e(Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?></a>
                                                                    <?php elseif(($field->format=='DATE') && ($asset->{$field->db_column_name()}!='')): ?>
                                                                        <?php echo e(\App\Helpers\Helper::gracefulDecrypt($field, \App\Helpers\Helper::getFormattedDateObject($asset->{$field->db_column_name()}, 'date', false))); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                                <i class="fa-regular fa-clipboard js-copy-link hidden-print" data-clipboard-target=".js-copy-<?php echo e($field->id); ?>" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                                                                    <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                                                                </i>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php echo e(strtoupper(trans('admin/custom_fields/general.encrypted'))); ?>

                                                        <?php endif; ?>

                                                    <?php else: ?>
                                                        <?php if(($field->format=='BOOLEAN') && ($asset->{$field->db_column_name()}!='')): ?>
                                                            <?php echo ($asset->{$field->db_column_name()} == 1) ? "<span class='fas fa-check-circle' style='color:green' />" : "<span class='fas fa-times-circle' style='color:red' />"; ?>

                                                        <?php elseif(($field->format=='URL') && ($asset->{$field->db_column_name()}!='')): ?>
                                                            <a href="<?php echo e($asset->{$field->db_column_name()}); ?>" target="_new"><?php echo e($asset->{$field->db_column_name()}); ?></a>
                                                        <?php elseif(($field->format=='DATE') && ($asset->{$field->db_column_name()}!='')): ?>
                                                            <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->{$field->db_column_name()}, 'date', false)); ?>

                                                        <?php else: ?>
                                                            <?php echo nl2br(e($asset->{$field->db_column_name()})); ?>

                                                        <?php endif; ?>

                                                    <?php endif; ?>

                                                    <?php if($asset->{$field->db_column_name()}==''): ?>
                                                        &nbsp;
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>


                                    <?php if($asset->purchase_date): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.date')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(Helper::getFormattedDateObject($asset->purchase_date, 'date', false)); ?>

                                                -
                                                <?php echo e(Carbon::parse($asset->purchase_date)->diff(Carbon::now())->format('%y years, %m months and %d days')); ?>


                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->purchase_cost): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.cost')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if(($asset->id) && ($asset->location)): ?>
                                                    <?php echo e($asset->location->currency); ?>

                                                <?php elseif(($asset->id) && ($asset->location)): ?>
                                                    <?php echo e($asset->location->currency); ?>

                                                <?php else: ?>
                                                    <?php echo e($snipeSettings->default_currency); ?>

                                                <?php endif; ?>
                                                <?php echo e(Helper::formatCurrencyOutput($asset->purchase_cost)); ?>


                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(($asset->components->count() > 0) && ($asset->purchase_cost)): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/table.components_cost')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if(($asset->id) && ($asset->location)): ?>
                                                    <?php echo e($asset->location->currency); ?>

                                                <?php elseif(($asset->id) && ($asset->location)): ?>
                                                    <?php echo e($asset->location->currency); ?>

                                                <?php else: ?>
                                                    <?php echo e($snipeSettings->default_currency); ?>

                                                <?php endif; ?>
                                                <?php echo e(Helper::formatCurrencyOutput($asset->getComponentCost())); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(($asset->model) && ($asset->depreciation) && ($asset->purchase_date)): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/table.current_value')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if(($asset->id) && ($asset->location)): ?>
                                                    <?php echo e($asset->location->currency); ?>

                                                <?php elseif(($asset->id) && ($asset->location)): ?>
                                                    <?php echo e($asset->location->currency); ?>

                                                <?php else: ?>
                                                    <?php echo e($snipeSettings->default_currency); ?>

                                                <?php endif; ?>
                                                <?php echo e(Helper::formatCurrencyOutput($asset->getDepreciatedValue() )); ?>



                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($asset->order_number): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.order_number')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <a href="<?php echo e(route('hardware.index', ['order_number' => $asset->order_number])); ?>"><?php echo e($asset->order_number); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->supplier): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.supplier')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superuser')): ?>
                                                    <a href="<?php echo e(route('suppliers.show', $asset->supplier_id)); ?>">
                                                        <?php echo e($asset->supplier->name); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e($asset->supplier->name); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <?php if($asset->warranty_months): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.warranty')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e($asset->warranty_months); ?>

                                                <?php echo e(trans('admin/hardware/form.months')); ?>


                                                <?php if(($asset->model) && ($asset->model->manufacturer) && ($asset->model->manufacturer->warranty_lookup_url!='')): ?>
                                                    <a href="<?php echo e($asset->present()->dynamicUrl($asset->model->manufacturer->warranty_lookup_url)); ?>" target="_blank">
                                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'external-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'external-link']); ?>
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
                                                        <span class="sr-only"><?php echo e(trans('admin/hardware/general.mfg_warranty_lookup', ['manufacturer' => $asset->model->manufacturer->name])); ?></span></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.warranty_expires')); ?>

                                                    <?php if($asset->purchase_date): ?>
                                                        <?php echo $asset->present()->warranty_expires() < date("Y-m-d") ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                    <?php endif; ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if($asset->purchase_date): ?>
                                                    <?php echo e(Helper::getFormattedDateObject($asset->present()->warranty_expires(), 'date', false)); ?>

                                                    -
                                                    <?php echo e(Carbon::parse($asset->present()->warranty_expires())->diffForHumans(['parts' => 2])); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('general.na_no_purchase_date')); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    <?php endif; ?>

                                    <?php if(($asset->model) && ($asset->depreciation)): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.depreciation')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e($asset->depreciation->name); ?>

                                                (<?php echo e($asset->depreciation->months); ?>

                                                <?php echo e(trans('admin/hardware/form.months')); ?>)
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.fully_depreciated')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if($asset->purchase_date): ?>
                                                    <?php echo e(Helper::getFormattedDateObject($asset->depreciated_date()->format('Y-m-d'), 'date', false)); ?>

                                                    -
                                                    <?php echo e(Carbon::parse($asset->depreciated_date())->diffForHumans(['parts' => 2])); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('general.na_no_purchase_date')); ?>

                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(($asset->asset_eol_date) && ($asset->purchase_date)): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.eol_rate')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(Carbon::parse($asset->asset_eol_date)->diffInMonths($asset->purchase_date)); ?>

                                                <?php echo e(trans('admin/hardware/form.months')); ?>


                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($asset->asset_eol_date): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.eol_date')); ?>

                                                    <?php if($asset->purchase_date): ?>
                                                        <?php echo $asset->asset_eol_date < date("Y-m-d") ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                    <?php endif; ?>
                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if($asset->asset_eol_date): ?>
                                                    <?php echo e(Helper::getFormattedDateObject($asset->asset_eol_date, 'date', false)); ?>

                                                    -
                                                    <?php echo e(Carbon::parse($asset->asset_eol_date)->diffForHumans(['parts' => 2])); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('general.na_no_purchase_date')); ?>

                                                <?php endif; ?>
                                                <?php if($asset->eol_explicit =='1'): ?>
                                                        <span data-tooltip="true"
                                                                data-placement="top"
                                                                data-title="Explicit EOL"
                                                                title="Explicit EOL">
                                                                <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'warning','class' => 'text-orange']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','class' => 'text-orange']); ?>
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
                                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong>
                                                <?php echo e(trans('admin/hardware/form.notes')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php echo nl2br(Helper::parseEscapedMarkedownInline($asset->notes)); ?>

                                        </div>
                                    </div>

                                    <?php if($asset->location): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.location')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superuser')): ?>
                                                    <a href="<?php echo e(route('locations.show', ['location' => $asset->location->id])); ?>">
                                                        <?php echo e($asset->location->name); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e($asset->location->name); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->defaultLoc): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.default_location')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superuser')): ?>
                                                    <a href="<?php echo e(route('locations.show', ['location' => $asset->defaultLoc->id])); ?>">
                                                        <?php echo e($asset->defaultLoc->name); ?>

                                                    </a>
                                                <?php else: ?>
                                                    <?php echo e($asset->defaultLoc->name); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->created_at!=''): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.created_at')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(Helper::getFormattedDateObject($asset->created_at, 'datetime', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->updated_at!=''): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('general.updated_at')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(Helper::getFormattedDateObject($asset->updated_at, 'datetime', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->expected_checkin!=''): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.expected_checkin')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(Helper::getFormattedDateObject($asset->expected_checkin, 'date', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->last_checkin!=''): ?>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/table.last_checkin_date')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo e(Helper::getFormattedDateObject($asset->last_checkin, 'datetime', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>



                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong>
                                                <?php echo e(trans('general.checkouts_count')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php echo e(($asset->checkouts) ? (int) $asset->checkouts->count() : '0'); ?>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong>
                                                <?php echo e(trans('general.checkins_count')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php echo e(($asset->checkins) ? (int) $asset->checkins->count() : '0'); ?>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong>
                                                <?php echo e(trans('general.user_requests_count')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-9">
                                            <?php echo e(($asset->userRequests) ? (int) $asset->userRequests->count() : '0'); ?>

                                        </div>
                                    </div>

                                </div> <!--/end striped container-->
                            </div> <!-- end col-md-9 -->
                        </div><!-- end info-stack-container -->
                        </div> <!--/.row-->
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane fade" id="software">
                        <div class="row<?php echo e(($asset->licenses->count() > 0 ) ? '' : ' hidden-print'); ?>">
                            <div class="col-md-12">
                                <!-- Licenses assets table -->
                                <?php if($asset->licenses->count() > 0): ?>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="col-md-4"><?php echo e(trans('general.name')); ?></th>
                                            <th class="col-md-4"><span class="line"></span><?php echo e(trans('admin/licenses/form.license_key')); ?></th>
                                            <th class="col-md-4"><span class="line"></span><?php echo e(trans('admin/licenses/form.expiration')); ?></th>
                                            <th class="col-md-1"><span class="line"></span><?php echo e(trans('table.actions')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $asset->licenseseats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($seat->license): ?>
                                                <tr>
                                                    <td><a href="<?php echo e(route('licenses.show', $seat->license->id)); ?>"><?php echo e($seat->license->name); ?></a></td>
                                                    <td>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $seat->license)): ?>
                                                            <?php echo nl2br(e($seat->license->serial)); ?>

                                                        <?php else: ?>
                                                            ------------
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e(Helper::getFormattedDateObject($seat->license->expiration_date, 'date', false)); ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(route('licenses.checkin', $seat->id)); ?>" class="btn btn-sm bg-purple hidden-print" data-tooltip="true"><?php echo e(trans('general.checkin')); ?></a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>

                                    <div class="alert alert-info alert-block hidden-print">
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info-circle']); ?>
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
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>
                                <?php endif; ?>
                            </div><!-- /col -->
                        </div> <!-- row -->
                    </div> <!-- /.tab-pane software -->

                    <div class="tab-pane fade" id="components">
                        <!-- checked out assets table -->
                        <div class="row<?php echo e(($asset->components->count() > 0 ) ? '' : ' hidden-print'); ?>">
                            <div class="col-md-12">
                                <?php if($asset->components->count() > 0): ?>
                                    <table class="table table-striped">
                                        <thead>
                                        <th><?php echo e(trans('general.name')); ?></th>
                                        <th><?php echo e(trans('general.qty')); ?></th>
                                        <th><?php echo e(trans('general.purchase_cost')); ?></th>
                                        <th><?php echo e(trans('admin/hardware/form.serial')); ?></th>
                                        <th><?php echo e(trans('general.checkin')); ?></th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                            <?php $totalCost = 0; ?>
                                        <?php $__currentLoopData = $asset->components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                            <?php if(is_null($component->deleted_at)): ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?php echo e(route('components.show', $component->id)); ?>"><?php echo e($component->name); ?></a>
                                                    </td>
                                                    <td><?php echo e($component->pivot->assigned_qty); ?></td>
                                                    <td>
                                                        <?php if($component->purchase_cost!=''): ?>
                                                            <?php echo e(trans('general.cost_each', ['amount' => Helper::formatCurrencyOutput($component->purchase_cost)])); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($component->serial); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('components.checkin.show', $component->pivot->id)); ?>" class="btn btn-sm bg-purple hidden-print" data-tooltip="true"><?php echo e(trans('general.checkin')); ?></a>
                                                    </td>

                                                        <?php $totalCost = $totalCost + ($component->purchase_cost *$component->pivot->assigned_qty) ?>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                            </td>
                                            <td><?php echo e($totalCost); ?></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                <?php else: ?>
                                    <div class="alert alert-info alert-block hidden-print">
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info-circle']); ?>
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
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div> <!-- /.tab-pane components -->


                    <div class="tab-pane fade" id="assets">
                        <div class="row<?php echo e(($asset->assignedAssets->count() > 0 ) ? '' : ' hidden-print'); ?>">
                            <div class="col-md-12">

                                <?php if($asset->assignedAssets->count() > 0): ?>


                                    <form
                                        method="POST"
                                        action="<?php echo e(route('hardware/bulkedit')); ?>"
                                        accept-charset="UTF-8"
                                        class="form-inline"
                                        id="bulkForm"
                                    >
                                    <?php echo csrf_field(); ?>
                                    <div id="toolbar">
                                        <label for="bulk_actions"><span class="sr-only"><?php echo e(trans('general.bulk_actions')); ?></span></label>
                                        <select name="bulk_actions" class="form-control select2" style="width: 150px;" aria-label="bulk_actions">
                                            <option value="edit"><?php echo e(trans('button.edit')); ?></option>
                                            <option value="delete"><?php echo e(trans('button.delete')); ?></option>
                                            <option value="labels"><?php echo e(trans_choice('button.generate_labels', 2)); ?></option>
                                        </select>
                                        <button class="btn btn-primary" id="<?php echo e((isset($id_button)) ? $id_button : 'bulkAssetEditButton'); ?>" disabled><?php echo e(trans('button.go')); ?></button>
                                    </div>

                                    <!-- checked out assets table -->
                                    <div class="table-responsive">

                                        <table
                                                data-columns="<?php echo e(\App\Presenters\AssetPresenter::dataTableLayout()); ?>"
                                                data-cookie-id-table="assetsTable"
                                                data-pagination="true"
                                                data-id-table="assetsTable"
                                                data-search="true"
                                                data-side-pagination="server"
                                                data-show-columns="true"
                                                data-show-fullscreen="true"
                                                data-show-export="true"
                                                data-show-refresh="true"
                                                data-sort-order="asc"
                                                data-bulk-button-id="#bulkAssetEditButton"
                                                id="assetsListingTable"
                                                class="table table-striped snipe-table"
                                                data-url="<?php echo e(route('api.assets.index',['assigned_to' => $asset->id, 'assigned_type' => 'App\Models\Asset'])); ?>"
                                                data-export-options='{
                              "fileName": "export-assets-<?php echo e(str_slug($asset->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>

                                        </table>


                                        </form>
                                    </div>

                                <?php else: ?>

                                    <div class="alert alert-info alert-block hidden-print">
                                        <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'info-circle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info-circle']); ?>
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
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>
                                <?php endif; ?>


                            </div><!-- /col -->
                        </div> <!-- row -->
                    </div> <!-- /.tab-pane software -->


                <div class="tab-pane" id="accessories_assigned">


                    <div class="table table-responsive">

                        <h2 class="box-title" style="float:left">
                            <?php echo e(trans('general.accessories_assigned')); ?>

                        </h2>

                        <table
                                data-columns="<?php echo e(\App\Presenters\AssetPresenter::assignedAccessoriesDataTableLayout()); ?>"
                                data-cookie-id-table="accessoriesAssignedListingTable"
                                data-pagination="true"
                                data-id-table="accessoriesAssignedListingTable"
                                data-search="true"
                                data-side-pagination="server"
                                data-show-columns="true"
                                data-show-export="true"
                                data-show-refresh="true"
                                data-sort-order="asc"
                                data-click-to-select="true"
                                id="accessoriesAssignedListingTable"
                                class="table table-striped snipe-table"
                                data-url="<?php echo e(route('api.assets.assigned_accessories', ['asset' => $asset])); ?>"
                                data-export-options='{
                              "fileName": "export-locations-<?php echo e(str_slug($asset->name)); ?>-accessories-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>
                        </table>

                    </div><!-- /.table-responsive -->
                </div><!-- /.tab-pane -->


                    <div class="tab-pane fade" id="maintenances">
                        <div class="row<?php echo e(($asset->assetmaintenances->count() > 0 ) ? '' : ' hidden-print'); ?>">
                            <div class="col-md-12">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                                    <div id="maintenance-toolbar">
                                        <a href="<?php echo e(route('maintenances.create', ['asset_id' => $asset->id])); ?>" class="btn btn-primary"><?php echo e(trans('button.add_maintenance')); ?></a>
                                    </div>
                                <?php endif; ?>

                                <!-- Asset Maintenance table -->
                                <table
                                        data-columns="<?php echo e(\App\Presenters\AssetMaintenancesPresenter::dataTableLayout()); ?>"
                                        class="table table-striped snipe-table"
                                        id="assetMaintenancesTable"
                                        data-pagination="true"
                                        data-id-table="assetMaintenancesTable"
                                        data-search="true"
                                        data-side-pagination="server"
                                        data-toolbar="#maintenance-toolbar"
                                        data-show-columns="true"
                                        data-show-fullscreen="true"
                                        data-show-refresh="true"
                                        data-show-export="true"
                                        data-export-options='{
                           "fileName": "export-<?php echo e($asset->asset_tag); ?>-maintenances",
                           "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                         }'
                                        data-url="<?php echo e(route('api.maintenances.index', array('asset_id' => $asset->id))); ?>"
                                        data-cookie-id-table="assetMaintenancesTable"
                                        data-cookie="true">
                                </table>
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.tab-pane maintenances -->

                    <div class="tab-pane fade" id="history">
                        <!-- checked out assets table -->
                        <div class="row">
                            <div class="col-md-12">
                                <table
                                        class="table table-striped snipe-table"
                                        id="assetHistory"
                                        data-pagination="true"
                                        data-id-table="assetHistory"
                                        data-search="true"
                                        data-side-pagination="server"
                                        data-show-columns="true"
                                        data-show-fullscreen="true"
                                        data-show-refresh="true"
                                        data-sort-order="desc"
                                        data-sort-name="created_at"
                                        data-show-export="true"
                                        data-export-options='{
                         "fileName": "export-asset-<?php echo e($asset->id); ?>-history",
                         "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                       }'

                                        data-url="<?php echo e(route('api.activity.index', ['item_id' => $asset->id, 'item_type' => 'asset'])); ?>"
                                        data-cookie-id-table="assetHistory"
                                        data-cookie="true">
                                    <thead>
                                    <tr>
                                        <th data-visible="true" data-field="icon" style="width: 40px;" class="hidden-xs" data-formatter="iconFormatter"><?php echo e(trans('admin/hardware/table.icon')); ?></th>
                                        <th data-visible="true" data-field="action_date" data-sortable="true" data-formatter="dateDisplayFormatter"><?php echo e(trans('general.date')); ?></th>
                                        <th data-visible="true" data-field="admin" data-formatter="usersLinkObjFormatter"><?php echo e(trans('general.admin')); ?></th>
                                        <th data-visible="true" data-field="action_type"><?php echo e(trans('general.action')); ?></th>
                                        <th class="col-sm-2" data-field="file" data-visible="false" data-formatter="fileUploadNameFormatter"><?php echo e(trans('general.file_name')); ?></th>
                                        <th data-visible="true" data-field="item" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.item')); ?></th>
                                        <th data-visible="true" data-field="target" data-formatter="polymorphicItemFormatter"><?php echo e(trans('general.target')); ?></th>
                                        <th data-field="note"><?php echo e(trans('general.notes')); ?></th>
                                        <th data-field="signature_file" data-visible="false"  data-formatter="imageFormatter"><?php echo e(trans('general.signature')); ?></th>
                                        <th data-visible="false" data-field="file" data-visible="false"  data-formatter="fileUploadFormatter"><?php echo e(trans('general.download')); ?></th>
                                        <th data-field="log_meta" data-visible="true" data-formatter="changeLogFormatter"><?php echo e(trans('admin/hardware/table.changed')); ?></th>
                                        <th data-field="remote_ip" data-visible="false" data-sortable="true"><?php echo e(trans('admin/settings/general.login_ip')); ?></th>
                                        <th data-field="user_agent" data-visible="false" data-sortable="true"><?php echo e(trans('admin/settings/general.login_user_agent')); ?></th>
                                        <th data-field="action_source" data-visible="false" data-sortable="true"><?php echo e(trans('general.action_source')); ?></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div> <!-- /.row -->
                    </div> <!-- /.tab-pane history -->

                    <div class="tab-pane fade" id="files">
                        <div class="row<?php echo e(($asset->uploads->count() > 0 ) ? '' : ' hidden-print'); ?>">
                            <div class="col-md-12">
                                <?php if (isset($component)) { $__componentOriginal0719d4299c67785b885b02286823a390 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0719d4299c67785b885b02286823a390 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::filestable','data' => ['filepath' => 'private_uploads/assets/','showfileRoutename' => 'show/assetfile','deletefileRoutename' => 'delete/assetfile','object' => $asset]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filestable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['filepath' => 'private_uploads/assets/','showfile_routename' => 'show/assetfile','deletefile_routename' => 'delete/assetfile','object' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($asset)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0719d4299c67785b885b02286823a390)): ?>
<?php $attributes = $__attributesOriginal0719d4299c67785b885b02286823a390; ?>
<?php unset($__attributesOriginal0719d4299c67785b885b02286823a390); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0719d4299c67785b885b02286823a390)): ?>
<?php $component = $__componentOriginal0719d4299c67785b885b02286823a390; ?>
<?php unset($__componentOriginal0719d4299c67785b885b02286823a390); ?>
<?php endif; ?>
                            </div> <!-- /.col-md-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.tab-pane files -->

                    <?php if($asset->model): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $asset->model)): ?>
                            <div class="tab-pane fade" id="modelfiles">
                                <div class="row<?php echo e((($asset->model) && ($asset->model->uploads->count() > 0)) ? '' : ' hidden-print'); ?>">
                                    <div class="col-md-12">

                                        <?php if (isset($component)) { $__componentOriginal0719d4299c67785b885b02286823a390 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0719d4299c67785b885b02286823a390 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::filestable','data' => ['filepath' => 'private_uploads/assetmodels/','showfileRoutename' => 'show/modelfile','deletefileRoutename' => 'delete/modelfile','object' => $asset->model]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filestable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['filepath' => 'private_uploads/assetmodels/','showfile_routename' => 'show/modelfile','deletefile_routename' => 'delete/modelfile','object' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($asset->model)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0719d4299c67785b885b02286823a390)): ?>
<?php $attributes = $__attributesOriginal0719d4299c67785b885b02286823a390; ?>
<?php unset($__attributesOriginal0719d4299c67785b885b02286823a390); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0719d4299c67785b885b02286823a390)): ?>
<?php $component = $__componentOriginal0719d4299c67785b885b02286823a390; ?>
<?php unset($__componentOriginal0719d4299c67785b885b02286823a390); ?>
<?php endif; ?>

                                    </div> <!-- /.col-md-12 -->
                                </div> <!-- /.row -->
                            </div> <!-- /.tab-pane files -->
                        <?php endif; ?>
                    <?php endif; ?>
            </div><!-- /.tab-content -->
        </div><!-- nav-tabs-custom -->
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
        <?php echo $__env->make('modals.upload-file', ['item_type' => 'asset', 'item_id' => $asset->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/hardware/view.blade.php ENDPATH**/ ?>