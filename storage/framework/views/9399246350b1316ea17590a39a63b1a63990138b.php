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
                                        'last_audit_date' => Helper::getFormattedDateObject($asset->last_audit_date, 'date', false),
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
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle faa-pulse animated" aria-hidden="true"></i>
                    <strong><?php echo e(trans('general.notification_warning')); ?> </strong>
                    <?php echo e(trans('general.asset_deleted_warning')); ?>

                </div>
            </div>
        <?php endif; ?>

        <div class="col-md-12">


            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active">
                        <a href="#details" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                          <i class="fas fa-info-circle fa-2x"></i>
                          </span>
                          <span class="hidden-xs hidden-sm"><?php echo e(trans('admin/users/general.info')); ?></span>
                        </a>
                    </li>

                    <li>
                        <a href="#software" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <i class="far fa-save fa-2x" aria-hidden="true"></i>
                          </span>
                          <span class="hidden-xs hidden-sm"><?php echo e(trans('general.licenses')); ?>

                            <?php echo ($asset->licenses->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->licenses->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#components" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <i class="far fa-hdd fa-2x" aria-hidden="true"></i>
                          </span>
                          <span class="hidden-xs hidden-sm"><?php echo e(trans('general.components')); ?>

                            <?php echo ($asset->components->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->components->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#assets" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <i class="fas fa-barcode fa-2x" aria-hidden="true"></i>
                          </span>
                          <span class="hidden-xs hidden-sm"><?php echo e(trans('general.assets')); ?>

                            <?php echo ($asset->assignedAssets()->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->assignedAssets()->count()).'</span>' : ''; ?>


                          </span>
                        </a>
                    </li>


                    <li>
                        <a href="#history" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <i class="fas fa-history fa-2x" aria-hidden="true"></i>
                          </span>
                          <span class="hidden-xs hidden-sm"><?php echo e(trans('general.history')); ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#maintenances" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <i class="fas fa-wrench fa-2x" aria-hidden="true"></i>
                          </span>
                          <span class="hidden-xs hidden-sm"><?php echo e(trans('general.maintenances')); ?>

                            <?php echo ($asset->assetmaintenances()->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->assetmaintenances()->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <li>
                        <a href="#files" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                            <i class="far fa-file fa-2x" aria-hidden="true"></i>
                          </span>
                          <span class="hidden-xs hidden-sm"><?php echo e(trans('general.files')); ?>

                            <?php echo ($asset->uploads->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->uploads->count()).'</span>' : ''; ?>

                          </span>
                        </a>
                    </li>

                    <li>
                    <a href="#modelfiles" data-toggle="tab">
                          <span class="hidden-lg hidden-md">
                              <i class="fa-solid fa-laptop-file fa-2x" aria-hidden="true"></i>
                          </span>
                        <span class="hidden-xs hidden-sm">
                            <?php echo e(trans('general.additional_files')); ?>

                            <?php echo ($asset->model) && ($asset->model->uploads->count() > 0 ) ? '<span class="badge badge-secondary">'.number_format($asset->model->uploads->count()).'</span>' : ''; ?>

                          </span>
                    </a>
                    </li>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                        <li class="pull-right">
                            <a href="#" data-toggle="modal" data-target="#uploadFileModal">
                                <i class="fas fa-paperclip" aria-hidden="true"></i>
                                <?php echo e(trans('button.upload')); ?>

                            </a>
                        </li>
                    <?php endif; ?>


                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="details">
                        <div class="row">
                            <div class="col-md-8">

                                <!-- start striped rows -->
                                <div class="container row-striped">

                                    <?php if($asset->deleted_at!=''): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="text-danger"><strong><?php echo e(trans('general.deleted')); ?></strong></span>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(\App\Helpers\Helper::getFormattedDateObject($asset->deleted_at, 'date', false)); ?>


                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <?php if($asset->name): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong><?php echo e(trans('admin/hardware/form.name')); ?></strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e($asset->name); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <?php if($asset->assetstatus): ?>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong><?php echo e(trans('general.status')); ?></strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if(($asset->assignedTo) && ($asset->deleted_at=='')): ?>
                                                    <i class="fas fa-circle text-blue"></i>
                                                    <?php echo e($asset->assetstatus->name); ?>

                                                    <label class="label label-default"><?php echo e(trans('general.deployed')); ?></label>

                                                    <i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
                                                    <?php echo $asset->assignedTo->present()->glyph(); ?>

                                                    <?php echo $asset->assignedTo->present()->nameUrl(); ?>

                                                <?php else: ?>
                                                    <?php if(($asset->assetstatus) && ($asset->assetstatus->deployable=='1')): ?>
                                                        <i class="fas fa-circle text-green"></i>
                                                    <?php elseif(($asset->assetstatus) && ($asset->assetstatus->pending=='1')): ?>
                                                        <i class="fas fa-circle text-orange"></i>
                                                    <?php else: ?>
                                                        <i class="fas fa-times text-red"></i>
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
                                            <div class="col-md-2">
                                                <strong><?php echo e(trans('general.company')); ?></strong>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="<?php echo e(url('/companies/' . $asset->company->id)); ?>"><?php echo e($asset->company->name); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>



                                    <?php if($asset->serial): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong><?php echo e(trans('admin/hardware/form.serial')); ?></strong>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="js-copy"><?php echo e($asset->serial); ?></span>

                                                <i class="fa-regular fa-clipboard js-copy-link" data-clipboard-target=".js-copy" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
                                                    <span class="sr-only"><?php echo e(trans('general.copy_to_clipboard')); ?></span>
                                                </i>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if((isset($audit_log)) && ($audit_log->created_at)): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.last_audit')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $asset->checkInvalidNextAuditDate() ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                <?php echo e(Helper::getFormattedDateObject($audit_log->created_at, 'date', false)); ?>

                                                <?php if($audit_log->user): ?>
                                                    (by <?php echo e(link_to_route('users.show', $audit_log->user->present()->fullname(), [$audit_log->user->id])); ?>)
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->next_audit_date): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.next_audit_date')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo $asset->checkInvalidNextAuditDate() ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                <?php echo e(Helper::getFormattedDateObject($asset->next_audit_date, 'date', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(($asset->model) && ($asset->model->manufacturer)): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.manufacturer')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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

                                                    <?php if(($asset->model) && ($asset->model->manufacturer->url)): ?>
                                                        <li>
                                                            <i class="fas fa-globe-americas" aria-hidden="true"></i>
                                                            <a href="<?php echo e($asset->model->manufacturer->url); ?>" target="_blank">
                                                                <?php echo e($asset->model->manufacturer->url); ?>

                                                                <i class="fa fa-external-link" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer->support_url)): ?>
                                                        <li>
                                                            <i class="far fa-life-ring" aria-hidden="true"></i>
                                                            <a href="<?php echo e($asset->model->manufacturer->support_url); ?>" target="_blank">
                                                                <?php echo e($asset->model->manufacturer->support_url); ?>

                                                                <i class="fa fa-external-link" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model->manufacturer) && ($asset->model->manufacturer->warranty_lookup_url!='')): ?>
                                                        <li>
                                                            <i class="far fa-wrench" aria-hidden="true"></i>
                                                            <a href="<?php echo e($asset->present()->dynamicWarrantyUrl()); ?>" target="_blank">
                                                                <?php echo e($asset->present()->dynamicWarrantyUrl()); ?>

                                                                <i class="fa fa-external-link" aria-hidden="true"><span class="sr-only"><?php echo e(trans('admin/hardware/general.mfg_warranty_lookup', ['manufacturer' => $asset->model->manufacturer->name])); ?></span></i>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer->support_phone)): ?>
                                                        <li>
                                                            <i class="fas fa-phone" aria-hidden="true"></i>
                                                            <a href="tel:<?php echo e($asset->model->manufacturer->support_phone); ?>">
                                                                <?php echo e($asset->model->manufacturer->support_phone); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(($asset->model) && ($asset->model->manufacturer->support_email)): ?>
                                                        <li>
                                                            <i class="far fa-envelope" aria-hidden="true"></i>
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
                                        <div class="col-md-2">
                                            <strong>
                                                <?php echo e(trans('general.category')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.model')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                        <div class="col-md-2">
                                            <strong>
                                                <?php echo e(trans('admin/models/table.modelnumber')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo e(($asset->model) ? $asset->model->model_number : ''); ?>

                                        </div>
                                    </div>

                                    <!-- byod -->
                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong><?php echo e(trans('general.byod')); ?></strong>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo ($asset->byod=='1') ? '<i class="fas fa-check text-success" aria-hidden="true"></i> '.trans('general.yes') : '<i class="fas fa-times text-danger" aria-hidden="true"></i> '.trans('general.no'); ?>

                                        </div>
                                    </div>

                                    <?php if(($asset->model) && ($asset->model->fieldset)): ?>
                                        <?php $__currentLoopData = $asset->model->fieldset->fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <strong>
                                                        <?php echo e($field->name); ?>

                                                    </strong>
                                                </div>
                                                <div class="col-md-6<?php echo e((($field->format=='URL') && ($asset->{$field->db_column_name()}!='')) ? ' ellipsis': ''); ?>">
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
                                                                <span class="js-copy-<?php echo e($field->id); ?>" id="text-<?php echo e($field->id); ?>-to-show" style="font-size: 0px;">
                                                                <?php if(($field->format=='URL') && ($asset->{$field->db_column_name()}!='')): ?>
                                                                    <a href="<?php echo e(Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?>" target="_new"><?php echo e(Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?></a>
                                                                <?php elseif(($field->format=='DATE') && ($asset->{$field->db_column_name()}!='')): ?>
                                                                    <?php echo e(\App\Helpers\Helper::gracefulDecrypt($field, \App\Helpers\Helper::getFormattedDateObject($asset->{$field->db_column_name()}, 'date', false))); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(Helper::gracefulDecrypt($field, $asset->{$field->db_column_name()})); ?>

                                                                <?php endif; ?>
                                                                </span>
                                                                <i class="fa-regular fa-clipboard js-copy-link" data-clipboard-target=".js-copy-<?php echo e($field->id); ?>" aria-hidden="true" data-tooltip="true" data-placement="top" title="<?php echo e(trans('general.copy_to_clipboard')); ?>">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.date')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Helper::getFormattedDateObject($asset->purchase_date, 'date', false)); ?>

                                                -
                                                <?php echo e(Carbon::parse($asset->purchase_date)->diff(Carbon::now())->format('%y years, %m months and %d days')); ?>


                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->purchase_cost): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.cost')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/table.components_cost')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/table.current_value')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.order_number')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="<?php echo e(route('hardware.index', ['order_number' => $asset->order_number])); ?>">#<?php echo e($asset->order_number); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->supplier): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.supplier')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.warranty')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e($asset->warranty_months); ?>

                                                <?php echo e(trans('admin/hardware/form.months')); ?>


                                                <?php if(($asset->model) && ($asset->model->manufacturer) && ($asset->model->manufacturer->warranty_lookup_url!='')): ?>
                                                    <a href="<?php echo e($asset->present()->dynamicWarrantyUrl()); ?>" target="_blank">
                                                        <i class="fa fa-external-link" aria-hidden="true"><span class="sr-only"><?php echo e(trans('admin/hardware/general.mfg_warranty_lookup', ['manufacturer' => $asset->model->manufacturer->name])); ?></span></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <strong>
                                                        <?php echo e(trans('admin/hardware/form.warranty_expires')); ?>

                                                        <?php if($asset->purchase_date): ?>
                                                        <?php echo $asset->present()->warranty_expires() < date("Y-m-d") ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                        <?php endif; ?>

                                                    </strong>
                                                </div>
                                                <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.depreciation')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e($asset->depreciation->name); ?>

                                                (<?php echo e($asset->depreciation->months); ?>

                                                <?php echo e(trans('admin/hardware/form.months')); ?>)
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.fully_depreciated')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.eol_rate')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Carbon::parse($asset->asset_eol_date)->diffInMonths($asset->purchase_date)); ?>

                                                <?php echo e(trans('admin/hardware/form.months')); ?>


                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($asset->asset_eol_date): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.eol_date')); ?>

                                                    <?php if($asset->purchase_date): ?>
							<?php echo $asset->asset_eol_date < date("Y-m-d") ? '<i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i>' : ''; ?>

                                                    <?php endif; ?>
                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php if($asset->asset_eol_date): ?>
                                                <?php echo e(Helper::getFormattedDateObject($asset->asset_eol_date, 'date', false)); ?>

                                                -
                                                <?php echo e(Carbon::parse($asset->asset_eol_date)->diffForHumans(['parts' => 2])); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('general.na_no_purchase_date')); ?>

                                                <?php endif; ?>
                                                <?php if($asset->eol_explicit): ?>
                                                    <i class="fas fa-exclamation-triangle text-orange"
                                                       aria-hidden="true"
                                                       data-tooltip="true"
                                                       data-placement="top"
                                                       data-title="Explicit EOL"
                                                       title="Explicit EOL">
                                                    </i>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->expected_checkin!=''): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.expected_checkin')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Helper::getFormattedDateObject($asset->expected_checkin, 'date', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong>
                                                <?php echo e(trans('admin/hardware/form.notes')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo nl2br(Helper::parseEscapedMarkedownInline($asset->notes)); ?>

                                        </div>
                                    </div>

                                    <?php if($asset->location): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.location')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/form.default_location')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
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
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.created_at')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Helper::getFormattedDateObject($asset->created_at, 'datetime', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($asset->updated_at!=''): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('general.updated_at')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Helper::getFormattedDateObject($asset->updated_at, 'datetime', false)); ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                     <?php if($asset->last_checkout!=''): ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>
                                                    <?php echo e(trans('admin/hardware/table.checkout_date')); ?>

                                                </strong>
                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Helper::getFormattedDateObject($asset->last_checkout, 'datetime', false)); ?>

                                            </div>
                                        </div>
                                     <?php endif; ?>
                                     <?php if($asset->last_checkin!=''): ?>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <strong>
                                                        <?php echo e(trans('admin/hardware/table.last_checkin_date')); ?>

                                                    </strong>
                                                </div>
                                                <div class="col-md-6">
                                                    <?php echo e(Helper::getFormattedDateObject($asset->last_checkin, 'datetime', false)); ?>

                                                </div>
                                            </div>
                                     <?php endif; ?>



                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong>
                                                <?php echo e(trans('general.checkouts_count')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo e(($asset->checkouts) ? (int) $asset->checkouts->count() : '0'); ?>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong>
                                                <?php echo e(trans('general.checkins_count')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo e(($asset->checkins) ? (int) $asset->checkins->count() : '0'); ?>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong>
                                                <?php echo e(trans('general.user_requests_count')); ?>

                                            </strong>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo e(($asset->userRequests) ? (int) $asset->userRequests->count() : '0'); ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong>
                                               Labels
                                            </strong>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo e(Form::open([
                                                      'method' => 'POST',
                                                      'route' => ['hardware/bulkedit'],
                                                      'class' => 'form-inline',
                                                       'id' => 'bulkForm'])); ?>

                                                <input type="hidden" name="bulk_actions" value="labels" />
                                                <input type="hidden" name="ids[<?php echo e($asset->id); ?>]" value="<?php echo e($asset->id); ?>" />
                                                <button class="btn btn-sm btn-default" id="bulkEdit" ><i class="fas fa-barcode" aria-hidden="true"></i> <?php echo e(trans_choice('button.generate_labels', 1)); ?></button>

                                            <?php echo e(Form::close()); ?>


                                        </div>
                                    </div>
                                </div> <!-- end row-striped -->

                            </div><!-- /col-md-8 -->

                            <div class="col-md-4">

                                <?php if(($asset->image) || (($asset->model) && ($asset->model->image!=''))): ?>
                                    <div class="text-center col-md-12" style="padding-bottom: 15px;">
                                        <a href="<?php echo e(($asset->getImageUrl()) ? $asset->getImageUrl() : null); ?>" data-toggle="lightbox">
                                            <img src="<?php echo e(($asset->getImageUrl()) ? $asset->getImageUrl() : null); ?>" class="assetimg img-responsive" alt="<?php echo e($asset->getDisplayNameAttribute()); ?>">
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <!-- generic image goes here -->
                                <?php endif; ?>

                                    <!-- Start side button column -->

                                    <?php if(($asset->assetstatus) && ($asset->assetstatus->deployable=='1')): ?>
                                        <?php if(($asset->assigned_to != '') && ($asset->deleted_at=='')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', \App\Models\Asset::class)): ?>
                                                <div class="col-md-12">
                                                    <a href="<?php echo e(route('hardware.checkin.create', $asset->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print">
                                                        <?php echo e(trans('admin/hardware/general.checkin')); ?>

                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php elseif(($asset->assigned_to == '') && ($asset->deleted_at=='')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', \App\Models\Asset::class)): ?>
                                                <div class="col-md-12" style="padding-top: 5px;">
                                                    <a href="<?php echo e(route('hardware.checkout.create', $asset->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print">
                                                        <?php echo e(trans('admin/hardware/general.checkout')); ?>

                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>


                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $asset)): ?>
                                        <?php if($asset->deleted_at==''): ?>
                                        <div class="col-md-12" style="padding-top: 5px;">
                                            <a href="<?php echo e(route('hardware.edit', $asset->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print">
                                                <?php echo e(trans('admin/hardware/general.edit')); ?>

                                            </a>
                                        </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', $asset)): ?>
                                        <div class="col-md-12" style="padding-top: 5px;">
                                            <a href="<?php echo e(route('clone/hardware', $asset->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print">
                                                <?php echo e(trans('admin/hardware/general.clone')); ?>

                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit', \App\Models\Asset::class)): ?>
                                        <div class="col-md-12" style="padding-top: 5px;">
                                            <a href="<?php echo e(route('asset.audit.create', $asset->id)); ?>" style="width: 100%;" class="btn btn-sm btn-primary hidden-print">
                                                <?php echo e(trans('general.audit')); ?>

                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $asset)): ?>
                                        <div class="col-md-12" style="padding-top: 30px; padding-bottom: 30px;">
                                            <?php if($asset->deleted_at==''): ?>
                                                <button class="btn btn-sm btn-block btn-danger delete-asset" data-toggle="modal" data-title="<?php echo e(trans('general.delete')); ?>" data-content="<?php echo e(trans('general.sure_to_delete_var', ['item' => $asset->asset_tag])); ?>" data-target="#dataConfirmModal"><?php echo e(trans('general.delete')); ?> </button>
                                                <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                                            <?php else: ?>
                                                <form method="POST" action="<?php echo e(route('restore/hardware', ['assetId' => $asset->id])); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="btn btn-sm btn-warning col-md-12"><?php echo e(trans('general.restore')); ?></button>
                                                </form>
                                           <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                <?php if(($asset->assignedTo) && ($asset->deleted_at=='')): ?>
                                    <div style="text-align: left">
                                        <h2><?php echo e(trans('admin/hardware/form.checkedout_to')); ?></h2>
                                        <p>
                                        <?php if($asset->checkedOutToUser()): ?> <!-- Only users have avatars currently-->
                                            <img src="<?php echo e($asset->assignedTo->present()->gravatar()); ?>" class="user-image-inline" alt="<?php echo e($asset->assignedTo->present()->fullName()); ?>">
                                            <?php endif; ?>
                                        </p>
                                            <?php echo $asset->assignedTo->present()->glyph() . ' ' .$asset->assignedTo->present()->nameUrl(); ?>

                                        </p>

                                        <ul class="list-unstyled" style="line-height: 25px;">
                                            <?php if((isset($asset->assignedTo->email)) && ($asset->assignedTo->email!='')): ?>
                                                <li>
                                                    <i class="far fa-envelope" aria-hidden="true"></i>
                                                    <a href="mailto:<?php echo e($asset->assignedTo->email); ?>"><?php echo e($asset->assignedTo->email); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if((isset($asset->assignedTo)) && ($asset->assignedTo->phone!='')): ?>
                                                <li>
                                                    <i class="fas fa-phone" aria-hidden="true"></i>
                                                    <a href="tel:<?php echo e($asset->assignedTo->phone); ?>"><?php echo e($asset->assignedTo->phone); ?></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if((isset($asset->assignedTo)) && ($asset->assignedTo->department)): ?>
                                                <li><?php echo e(trans('admin/hardware/general.user_department')); ?>: <?php echo e($asset->assignedTo->department->name); ?></li>
                                            <?php endif; ?>

                                            <?php if(isset($asset->location)): ?>
                                                <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo e($asset->location->name); ?></li>
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
                                                    <i class="fas fa-calendar"></i> <?php echo e(trans('admin/hardware/form.checkout_date')); ?>: <?php echo e(Helper::getFormattedDateObject($asset->last_checkout, 'date', false)); ?>

                                                </li>
                                            <?php if(isset($asset->expected_checkin)): ?>
                                                <li>
                                                    <i class="fas fa-calendar"></i> <?php echo e(trans('admin/hardware/form.expected_checkin')); ?>: <?php echo e(Helper::getFormattedDateObject($asset->expected_checkin, 'date', false)); ?>

                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                <?php endif; ?>

                                <?php if($snipeSettings->qr_code=='1'): ?>
                                    <div class="col-md-12" style="padding-top: 15px;">
                                        <img src="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($asset->id); ?>/qr_code" class="img-thumbnail pull-right" style="height: 100px; width: 100px; margin-right: 10px;" alt="QR code for <?php echo e($asset->getDisplayNameAttribute()); ?>">
                                    </div>
                                <?php endif; ?>

                            </div> <!-- div.col-md-4 -->
                        </div><!-- /row -->
                    </div><!-- /.tab-pane asset details -->
                 

                    <div class="tab-pane fade" id="software">
                        <div class="row">
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
                                                        <a href="<?php echo e(route('licenses.checkin', $seat->id)); ?>" class="btn btn-sm bg-purple" data-tooltip="true"><?php echo e(trans('general.checkin')); ?></a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>

                                    <div class="alert alert-info alert-block">
                                        <i class="fas fa-info-circle"></i>
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>
                                <?php endif; ?>
                            </div><!-- /col -->
                        </div> <!-- row -->
                    </div> <!-- /.tab-pane software -->

                    <div class="tab-pane fade" id="components">
                        <!-- checked out assets table -->
                        <div class="row">
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
                                                    <td><?php echo e(Helper::formatCurrencyOutput($component->purchase_cost)); ?> each</td>
                                                    <td><?php echo e($component->serial); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('components.checkin.show', $component->pivot->id)); ?>" class="btn btn-sm bg-purple" data-tooltip="true"><?php echo e(trans('general.checkin')); ?></a>
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
                                    <div class="alert alert-info alert-block">
                                        <i class="fas fa-info-circle"></i>
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div> <!-- /.tab-pane components -->


                    <div class="tab-pane fade" id="assets">
                        <div class="row">
                            <div class="col-md-12">

                                <?php if($asset->assignedAssets->count() > 0): ?>


                                    <?php echo e(Form::open([
                                              'method' => 'POST',
                                              'route' => ['hardware/bulkedit'],
                                              'class' => 'form-inline',
                                               'id' => 'bulkForm'])); ?>

                                    <div id="toolbar">
                                        <label for="bulk_actions"><span class="sr-only"><?php echo e(trans('general.bulk_actions')); ?></span></label>
                                        <select name="bulk_actions" class="form-control select2" style="width: 150px;" aria-label="bulk_actions">
                                            <option value="edit"><?php echo e(trans('button.edit')); ?></option>
                                            <option value="delete"><?php echo e(trans('button.delete')); ?></option>
                                            <option value="labels"><?php echo e(trans_choice('button.generate_labels', 2)); ?></option>
                                        </select>
                                        <button class="btn btn-primary" id="bulkEdit" disabled><?php echo e(trans('button.go')); ?></button>
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
                                                id="assetsListingTable"
                                                class="table table-striped snipe-table"
                                                data-url="<?php echo e(route('api.assets.index',['assigned_to' => $asset->id, 'assigned_type' => 'App\Models\Asset'])); ?>"
                                                data-export-options='{
                              "fileName": "export-assets-<?php echo e(str_slug($asset->name)); ?>-assets-<?php echo e(date('Y-m-d')); ?>",
                              "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                              }'>

                                        </table>


                                        <?php echo e(Form::close()); ?>

                                    </div>

                                <?php else: ?>

                                    <div class="alert alert-info alert-block">
                                        <i class="fas fa-info-circle"></i>
                                        <?php echo e(trans('general.no_results')); ?>

                                    </div>
                                <?php endif; ?>


                            </div><!-- /col -->
                        </div> <!-- row -->
                    </div> <!-- /.tab-pane software -->


                    <div class="tab-pane fade" id="maintenances">
                        <div class="row">
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
          <div class="row">
            <div class="col-md-12">

              <?php if($asset->uploads->count() > 0): ?>
              <table
                      class="table table-striped snipe-table"
                      id="assetFileHistory"
                      data-pagination="true"
                      data-id-table="assetFileHistory"
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
                         "fileName": "export-asset-<?php echo e($asset->id); ?>-files",
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

                                        <?php $__currentLoopData = $asset->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i></td>
                                                <td>
                                                    <?php if( Helper::checkUploadIsImage($file->get_src('assets'))): ?>
                                                        <a href="<?php echo e(route('show/assetfile', ['assetId' => $asset->id, 'fileId' =>$file->id])); ?>" data-toggle="lightbox" data-type="image" data-title="<?php echo e($file->filename); ?>" data-footer="<?php echo e(Helper::getFormattedDateObject($asset->last_checkout, 'datetime', false)); ?>">
                                                            <img src="<?php echo e(route('show/assetfile', ['assetId' => $asset->id, 'fileId' =>$file->id])); ?>" style="max-width: 50px;">
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if(Storage::exists('private_uploads/assets/'.$file->filename)): ?>
                                                    <?php echo e($file->filename); ?>

                                                    <?php else: ?>
                                                    <del><?php echo e($file->filename); ?></del>
                                                    <?php endif; ?>
                                                </td>
                                                <td data-value="<?php echo e((Storage::exists('private_uploads/assets/'.$file->filename) ? Storage::size('private_uploads/assets/'.$file->filename) : '')); ?>">
                                                    <?php echo e(@Helper::formatFilesizeUnits(Storage::exists('private_uploads/assets/'.$file->filename) ? Storage::size('private_uploads/assets/'.$file->filename) : '')); ?>

                                                </td>
                                                <td>
                                                    <?php if($file->note): ?>
                                                        <?php echo e($file->note); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if(($file->filename) && (Storage::exists('private_uploads/assets/'.$file->filename))): ?>
                                                        <a href="<?php echo e(route('show/assetfile', [$asset->id, $file->id, 'download'=>'true'])); ?>" class="btn btn-sm btn-default">
                                                            <i class="fas fa-download" aria-hidden="true"></i>
                                                        </a>

                                                        <a href="<?php echo e(route('show/assetfile', [$asset->id, $file->id, 'inline'=>'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
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
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', \App\Models\Asset::class)): ?>
                                                        <a class="btn delete-asset btn-sm btn-danger btn-sm" href="<?php echo e(route('delete/assetfile', [$asset->id, $file->id])); ?>" data-tooltip="true" data-title="Delete" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>"><i class="fas fa-trash icon-white" aria-hidden="true"></i></a>
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
                    </div> <!-- /.tab-pane files -->

                    <div class="tab-pane fade" id="modelfiles">
                        <div class="row">
                            <div class="col-md-12">

                                <?php if(($asset->model) && ($asset->model->uploads->count() > 0)): ?>
                                    <table
                                            class="table table-striped snipe-table"
                                            id="assetModelFileHistory"
                                            data-pagination="true"
                                            data-id-table="assetModelFileHistory"
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
                         "fileName": "export-assetmodel-<?php echo e($asset->model->id); ?>-files",
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

                                        <?php $__currentLoopData = $asset->model->uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><i class="<?php echo e(Helper::filetype_icon($file->filename)); ?> icon-med" aria-hidden="true"></i></td>
                                                <td>
                                                    <?php if( Helper::checkUploadIsImage($file->get_src('assetmodels'))): ?>
                                                        <a href="<?php echo e(route('show/modelfile', ['modelID' => $asset->model->id, 'fileId' =>$file->id])); ?>" data-toggle="lightbox" data-type="image" data-title="<?php echo e($file->filename); ?>" data-footer="<?php echo e(Helper::getFormattedDateObject($asset->last_checkout, 'datetime', false)); ?>">
                                                            <img src="<?php echo e(route('show/modelfile', ['modelID' => $asset->model->id, 'fileId' =>$file->id])); ?>" style="max-width: 50px;">
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
                                                        <a href="<?php echo e(route('show/modelfile', [$asset->model->id, $file->id])); ?>" class="btn btn-sm btn-default">
                                                            <i class="fas fa-download" aria-hidden="true"></i>
                                                        </a>

                                                        <a href="<?php echo e(route('show/modelfile', [$asset->model->id, $file->id, 'inline'=>'true'])); ?>" class="btn btn-sm btn-default" target="_blank">
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
                                                        <a class="btn delete-asset btn-sm btn-danger btn-sm" href="<?php echo e(route('delete/modelfile', [$asset->model->id, $file->id])); ?>" data-tooltip="true" data-title="Delete" data-content="<?php echo e(trans('general.delete_confirm', ['item' => $file->filename])); ?>"><i class="fas fa-trash icon-white" aria-hidden="true"></i></a>
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
                    </div> <!-- /.tab-pane files -->
                </div> <!-- /. tab-content -->
            </div> <!-- /.nav-tabs-custom -->
        </div> <!-- /. col-md-12 -->
    </div> <!-- /. row -->

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