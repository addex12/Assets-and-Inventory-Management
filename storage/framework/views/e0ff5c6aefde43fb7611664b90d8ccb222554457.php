<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    
<img class="header-img" style="margin-bottom: 50px;top: 0;" src="<?php echo e(config('app.url')); ?>/uploads/FISFAIM.png" style="width: 1176px; height: 88px;">

<h4 style="position: absolute; top: 150px; right: 20px;">Date:  
    <td><span style="text-decoration: underline;"> <?php echo e(now()->format('Y-m-d')); ?></span></td>
</h4>
<h4 style="position: absolute; top: 200px; right: 20px;">Ref No:. ________________</h4>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo e(trans('general.assigned_to', ['name' => $show_user->present()->fullName()])); ?> - <?php echo e(date('Y-m-d H:i', time())); ?></title>

    <link rel="shortcut icon" type="image/ico" href="<?php echo e(($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->favicon)) : config('app.url').'/favicon.ico'); ?>">
</a>    
    <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/all.css'))); ?>">
                
<br><br><br>             <br>
<h3> <strong>General Device Sign-Off Agreement</strong></h3>

<p><strong>Purpose:</strong> This agreement outlines the terms and conditions for the use of school-owned devices by authorized personnel.</p> <p>It aims to promote responsible use, accountability, and efficient management of these resources while minimizing device damage.</p>

<h4>Agreement:</h4>
<p>By signing this agreement, the authorized personnel acknowledge and agree to the following:</p>
<ul>
    <li><strong>Responsible Use:</strong> The personnel will use the device solely for authorized purposes and in accordance with school policies.</li>
    <li><strong>Careful Usage:</strong> The personnel will handle the device with care, avoiding actions that could cause damage, such as dropping, spilling liquids on, or exposing it to extreme temperatures.</li>
    <li><strong>Maintenance and Care:</strong> The personnel will ensure the device is properly maintained, including regular cleaning and updates, to prevent damage and optimize performance.</li>
    <li><strong>Security:</strong> The personnel will comply with all security measures and policies to protect the device and its data.</li>
    <li><strong>Inventory Management:</strong> The personnel will report any issues or problems with the device promptly to the IT department, including any signs of damage or malfunction.</li>
    <li><strong>Sign-Off Procedure:</strong> When the device is no longer needed or is being transferred, the personnel will sign off on the device in the inventory management system, providing accurate information about its condition and any necessary repairs.</li>
</ul>
<p>The specific details of the device, including its model number, serial number, and location, will be recorded and managed in the school's inventory management system as follows.</p>
<p>By signing this agreement, the authorized personnel also agree to abide by the School IT Policy, and understand that their use of the device will be governed by the rules and guidelines set forth in that policy.</p>
    <script nonce="<?php echo e(csrf_token()); ?>">
        window.snipeit = {
            settings: {
                "per_page": 50
            }
        };
    </script>

    <style>
        body {
            font-family: "Arial, Helvetica", sans-serif;
            padding: 10px;
        }
        table.inventory {
            width: 100%;
            border: 1px solid #d3d3d3;
        }

        @page  {
            size: A4;
        }


        .print-logo {
            max-height: 40px;
        }

        h4 {
            margin-top: 20px;
            margin-bottom: 10px;
        }


    </style>

    <script nonce="<?php echo e(csrf_token()); ?>">
        window.snipeit = {
            settings: {
                "per_page": 50
            }
        };
    </script>

</head>
<body>

<?php if($snipeSettings->logo_print_assets=='1'): ?>
    <?php if($snipeSettings->brand == '3'): ?>

        <h3>
            <?php if($snipeSettings->logo!=''): ?>
                <img class="print-logo" src="<?php echo e(config('app.url')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
            <?php endif; ?>
        <?php echo e($snipeSettings->site_name); ?>

        </h3>
    <?php elseif($snipeSettings->brand == '2'): ?>
        <?php if($snipeSettings->logo!=''): ?>
            <img class="print-logo" src="<?php echo e(config('app.url')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
        <?php endif; ?>
    <?php else: ?>
        <?php echo e($snipeSettings->site_name); ?>

    <?php endif; ?>
<?php endif; ?>

<h3>
    <?php echo e(trans('general.assigned_to', ['name' => $show_user->present()->fullName()])); ?>

    <?php echo e(($show_user->employee_num!='') ? ' (#'.$show_user->employee_num.') ' : ''); ?>

    <?php echo e(($show_user->jobtitle!='' ? ' - '.$show_user->jobtitle : '')); ?>

</h3>
<p></p><?php echo e(trans('admin/users/general.all_assigned_list_generation')); ?> <?php echo e(Helper::getFormattedDateObject(now(), 'datetime', false)); ?></body>
    <?php if($assets->count() > 0): ?>
        <?php
            $counter = 1;
        ?>

        <div id="assets-toolbar">
            <h4><?php echo e(trans_choice('general.countable.assets', $assets->count(), ['count' => $assets->count()])); ?>

            </h4>
        </div>

        <table
                class="snipe-table table table-striped inventory"
                id="AssetsAssigned"
                data-pagination="false"
                data-id-table="AssetsAssigned"
                data-search="false"
                data-side-pagination="client"
                data-sortable="true"
                data-toolbar="#assets-toolbar"
                data-show-columns="true"
                data-sort-order="desc"
                data-sort-name="created_at"
                data-show-columns-toggle-all="true"
                data-cookie-id-table="AssetsAssigned">
            <thead>
                <th data-field="asset_id" data-sortable="false" data-visible="true" data-switchable="false">#</th>
                <th data-field="asset_image" data-sortable="true" data-visible="false" data-switchable="true"><?php echo e(trans('general.image')); ?></th>
                <th data-field="asset_tag" data-sortable="true" data-visible="true" data-switchable="false"><?php echo e(trans('admin/hardware/table.asset_tag')); ?></th>
                <th data-field="asset_name" data-sortable="true" data-visible="true"><?php echo e(trans('general.name')); ?></th>
                <th data-field="asset_category" data-sortable="true" data-visible="true"><?php echo e(trans('general.category')); ?></th>
                <th data-field="asset_model" data-sortable="true" data-visible="true"><?php echo e(trans('admin/hardware/form.model')); ?></th>
                <th data-field="rtd_location" data-sortable="true" data-visible="true"><?php echo e(trans('admin/hardware/form.default_location')); ?></th>
                <th data-field="asset_location" data-sortable="true" data-visible="false"><?php echo e(trans('general.location')); ?></th>
                <th data-field="asset_serial" data-sortable="true" data-visible="true"><?php echo e(trans('admin/hardware/form.serial')); ?></th>
                <th data-field="asset_checkout_date" data-sortable="true" data-visible="true"><?php echo e(trans('admin/hardware/table.checkout_date')); ?></th>
                <th data-field="signature" data-sortable="true" data-visible="true"><?php echo e(trans('general.signature')); ?></th>
            </thead>
            <tbody>
            <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($counter); ?></td>
                    <td>
                        <?php if($asset->getImageUrl()): ?>
                            <img src="<?php echo e($asset->getImageUrl()); ?>" class="thumbnail" style="max-height: 50px;">
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($asset->asset_tag); ?></td>
                    <td><?php echo e($asset->name); ?></td>
                    <td><?php echo e((($asset->model) && ($asset->model->category)) ? $asset->model->category->name : trans('general.invalid_category')); ?></td>
                    <td><?php echo e(($asset->model) ? $asset->model->name : trans('general.invalid_model')); ?></td>
                    <td><?php echo e(($asset->defaultLoc) ? $asset->defaultLoc->name : ''); ?></td>
                    <td><?php echo e(($asset->location) ? $asset->location->name : ''); ?></td>
                    <td><?php echo e($asset->serial); ?></td>
                    <td>
                        <?php echo e(Helper::getFormattedDateObject($asset->last_checkout, 'datetime', false)); ?></td>
                    <td>
                        <?php if(($asset->assetlog->first()) && ($asset->assetlog->first()->accept_signature!='')): ?>
                            <img style="width:auto;height:100px;" src="<?php echo e(asset('/')); ?>display-sig/<?php echo e($asset->assetlog->first()->accept_signature); ?>">
                        <?php endif; ?>
                    </td>
                </tr>


                <?php if($settings->show_assigned_assets): ?>
                    <?php
                        $assignedCounter = 1;
                    ?>
                    <?php $__currentLoopData = $asset->assignedAssets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($counter); ?>.<?php echo e($assignedCounter); ?></td>
                            <td data-formatter="imageFormatter">
                                <?php if($asset->getImageUrl()): ?>
                                    <img src="<?php echo e($asset->getImageUrl()); ?>" class="thumbnail" style="max-height: 50px;">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($asset->asset_tag); ?></td>
                            <td><?php echo e($asset->name); ?></td>
                            <td><?php echo e($asset->model->category->name); ?></td>
                            <td><?php echo e(($asset->defaultLoc) ? $asset->defaultLoc->name : ''); ?></td>
                            <td><?php echo e(($asset->location) ? $asset->location->name : ''); ?></td>
                            <td><?php echo e($asset->model->name); ?></td>
                            <td><?php echo e($asset->serial); ?></td>
                            <td><?php echo e($asset->last_checkout); ?></td>
                            <td><img style="width:auto;height:100px;" src="<?php echo e(asset('/')); ?>display-sig/<?php echo e($asset->assetlog->first()->accept_signature); ?>"></td>
                        </tr>
                        <?php
                            $assignedCounter++
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php
                    $counter++
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>


    <?php if($licenses->count() > 0): ?>
        <div id="licenses-toolbar">
            <h4><?php echo e(trans_choice('general.countable.licenses', $licenses->count(), ['count' => $licenses->count()])); ?></h4>
        </div>

        <table
                class="snipe-table table table-striped inventory"
                id="licensessAssigned"
                data-toolbar="#licenses-toolbar"
                data-pagination="false"
                data-id-table="licensessAssigned"
                data-search="false"
                data-side-pagination="client"
                data-sortable="true"
                data-show-columns="true"
                data-sort-order="desc"
                data-sort-name="created_at"
                data-show-columns-toggle-all="true"
                data-cookie-id-table="licensessAssigned">
            <thead>
            <tr>
                <th style="width: 20px;" data-sortable="false" data-switchable="false">#</th>
                <th style="width: 40%;" data-sortable="true" data-switchable="false"><?php echo e(trans('general.name')); ?></th>
                <th style="width: 50%;" data-sortable="true"><?php echo e(trans('admin/licenses/form.license_key')); ?></th>
                <th style="width: 10%;" data-sortable="true"><?php echo e(trans('admin/hardware/table.checkout_date')); ?></th>
            </tr>
            </thead>
            
            <?php
                $lcounter = 1;
            ?>

            <?php $__currentLoopData = $licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($lcounter); ?></td>
                    <td><?php echo e($license->name); ?></td>
                    <td>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewKeys', $license)): ?>
                            <?php echo e($license->serial); ?>

                        <?php else: ?>
                            <i class="fa-lock" aria-hidden="true"></i> <?php echo e(str_repeat('x', 15)); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($license->pivot->updated_at); ?></td>
                </tr>
                <?php
                    $lcounter++
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>


    <?php if($accessories->count() > 0): ?>
        <div id="accessories-toolbar">
            <h4><?php echo e(trans_choice('general.countable.accessories', $accessories->count(), ['count' => $accessories->count()])); ?></h4>
        </div>

        <table
                class="snipe-table table table-striped inventory"
                id="accessoriesAssigned"
                data-toolbar="#accessories-toolbar"
                data-pagination="false"
                data-id-table="accessoriesAssigned"
                data-search="false"
                data-side-pagination="client"
                data-sortable="true"
                data-show-columns="true"
                data-sort-order="desc"
                data-sort-name="created_at"
                data-show-columns-toggle-all="true"
                data-cookie-id-table="accessoriesAssigned">
            <thead>
            <tr>
                <th style="width: 20px;" data-sortable="false" data-switchable="false">#</th>
                <th data-field="accessory_image" data-sortable="true"  data-visible="true"><?php echo e(trans('general.image')); ?></th>
                <th style="width: 40%;" data-sortable="true" data-switchable="false"><?php echo e(trans('general.name')); ?></th>
                <th style="width: 50%;" data-sortable="true"><?php echo e(trans('general.category')); ?></th>
                <th style="width: 10%;" data-sortable="true"><?php echo e(trans('admin/hardware/table.checkout_date')); ?></th>
                <th style="width: 10%;" data-sortable="true"><?php echo e(trans('general.signature')); ?></th>
            </tr>
            </thead>
            <?php
                $acounter = 1;
            ?>

            <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($accessory): ?>
                    <tr>
                        <td><?php echo e($acounter); ?></td>
                        <td>
                            <?php if($accessory->getImageUrl()): ?>
                                <img src="<?php echo e($accessory->getImageUrl()); ?>" class="thumbnail" style="max-height: 50px;">
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(($accessory->manufacturer) ? $accessory->manufacturer->name : ''); ?> <?php echo e($accessory->name); ?> <?php echo e($accessory->model_number); ?></td>
                        <td><?php echo e($accessory->category->name); ?></td>
                        <td><?php echo e($accessory->pivot->created_at); ?></td>

                        <td>
                            <?php if(($accessory->assetlog->first()) && ($accessory->assetlog->first()->accept_signature!='')): ?>
                            <img style="width:auto;height:100px;" src="<?php echo e(asset('/')); ?>display-sig/<?php echo e($accessory->assetlog->first()->accept_signature); ?>">
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        $acounter++
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>

    <?php if($consumables->count() > 0): ?>
        <div id="consumables-toolbar">
            <h4><?php echo e(trans_choice('general.countable.consumables', $consumables->count(), ['count' => $consumables->count()])); ?></h4>
        </div>

        <table
                class="snipe-table table table-striped inventory"
                id="consumablesAssigned"
                data-pagination="false"
                data-toolbar="#consumables-toolbar"
                data-id-table="consumablesAssigned"
                data-search="false"
                data-side-pagination="client"
                data-sortable="true"
                data-show-columns="true"
                data-sort-order="desc"
                data-sort-name="created_at"
                data-show-columns-toggle-all="true"
                data-cookie-id-table="consumablesAssigned">
            <thead>
            <tr>
                <th style="width: 20px;" data-sortable="false" data-switchable="false"></th>
                <th style="width: 40%;" data-sortable="true" data-switchable="false"><?php echo e(trans('general.name')); ?></th>
                <th style="width: 50%;" data-sortable="true"><?php echo e(trans('general.category')); ?></th>
                <th style="width: 10%;" data-sortable="true"><?php echo e(trans('admin/hardware/table.checkout_date')); ?></th>
                <th style="width: 10%;" data-sortable="true"><?php echo e(trans('general.signature')); ?></th>

            </tr>
            </thead>
            <?php
                $ccounter = 1;
            ?>

            <?php $__currentLoopData = $consumables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consumable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($consumable): ?>
                    <tr>
                        <td><?php echo e($ccounter); ?></td>


                        <td>
                        <?php if($consumable->deleted_at!=''): ?>
                            <td><?php echo e(($consumable->manufacturer) ? $consumable->manufacturer->name : ''); ?>  <?php echo e($consumable->name); ?> <?php echo e($consumable->model_number); ?></td>
                            <?php else: ?>
                            <?php echo e(($consumable->manufacturer) ? $consumable->manufacturer->name : ''); ?>  <?php echo e($consumable->name); ?> <?php echo e($consumable->model_number); ?>

                            <?php endif; ?>
                            </td>
                            <td><?php echo e(($consumable->category) ? $consumable->category->name : ' invalid/deleted category'); ?> </td>
                            <td><?php echo e($consumable->pivot->created_at); ?></td>
                            <td>
                                <?php if(($consumable->assetlog->first()) && ($consumable->assetlog->first()->accept_signature!='')): ?>
                                    <img style="width:auto;height:100px;" src="<?php echo e(asset('/')); ?>display-sig/<?php echo e($consumable->assetlog->first()->accept_signature); ?>">
                                <?php endif; ?>
                            </td>
                    </tr>
                    <?php
                        $ccounter++
                    ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php endif; ?>
<h4>Agreement Acceptance:</h4>
<p>By signing below, the authorized personnel confirms their understanding and acceptance of the terms and conditions outlined in this agreement.</p>
    <table style="margin-top: 20px;">
        <tr>
            <td style="padding-right: 10px; vertical-align: top; font-weight: bold;"><?php echo e(trans('general.signed_off_by')); ?> :</td>
            <td style="padding-right: 10px; vertical-align: top;">   
          <span style="text-decoration: underline;"> <?php echo e($show_user->present()->fullName()); ?>

           <?php echo e(($show_user->employee_num!='') ? ' (#'.$show_user->employee_num.') ' : ''); ?></span>  </td>
            <td style="padding-right: 10px; vertical-align: top;">___________________</td>
            <td><span style="text-decoration: underline;"> <?php echo e(now()->format('Y-m-d')); ?></span></td>
        </tr>
        <tr style="height: 70px;">
            <td></td>
            <td style="padding-right: 10px; vertical-align: top;">Name</td>
            <td style="padding-right: 10px; vertical-align: top;">Signature</td>
            <td style="padding-right: 10px; vertical-align: top;"><?php echo e(trans('general.date')); ?></td>
        </tr>
        <tr>
            <td style="padding-right: 10px; vertical-align: top; font-weight: bold;">IT Manager :</td>
            <td style="padding-right: 10px; vertical-align: top;"><span style="text-decoration: underline;"> Adugna Gizaw</span></td>
            <td style="padding-right: 10px; vertical-align: top;">__________________</td>
            <td><span style="text-decoration: underline;"> <?php echo e(now()->format('Y-m-d')); ?></span></td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-right: 10px; vertical-align: top;">Name</td>
            <td style="padding-right: 10px; vertical-align: top;">Signature</td>
            <td style="padding-right: 10px; vertical-align: top;"><?php echo e(trans('general.date')); ?></td>
            <td></td>
        </tr>
    </table>
<!----<div style="display: flex; justify-content: flex-end;">
    <img class="header-img" src="<?php echo e(config('app.url')); ?>/uploads/stamp.png" style="width: 190px; height: 200px; border-radius: 50%;">
</div> --->

<script src="<?php echo e(url(mix('js/dist/all.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>
<script defer src="<?php echo e(url(mix('js/dist/all-defer.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>


<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/bootstrap-table.css'))); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<script src="<?php echo e(url(mix('js/dist/bootstrap-table.js'))); ?>"></script>

<script>
    $('.snipe-table').bootstrapTable('destroy').each(function () {

        console.log('BS table loaded');
        data_export_options = $(this).attr('data-export-options');
        export_options = data_export_options ? JSON.parse(data_export_options) : {};
        export_options['htmlContent'] = false; // this is already the default; but let's be explicit about it
        export_options['jspdf']= {"orientation": "l"};
        // the following callback method is necessary to prevent XSS vulnerabilities
        // (this is taken from Bootstrap Tables's default wrapper around jQuery Table Export)
        export_options['onCellHtmlData'] = function (cell, rowIndex, colIndex, htmlData) {
            if (cell.is('th')) {
                return cell.find('.th-inner').text()
            }
            return htmlData
        }
        $(this).bootstrapTable({
            classes: 'table table-responsive table-no-bordered',
            ajaxOptions: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            // reorderableColumns: true,
            stickyHeader: true,
            stickyHeaderOffsetLeft: parseInt($('body').css('padding-left'), 10),
            stickyHeaderOffsetRight: parseInt($('body').css('padding-right'), 10),
            undefinedText: '',
            iconsPrefix: 'fa',
            cookieStorage: '<?php echo e(config('session.bs_table_storage')); ?>',
            cookie: true,
            cookieExpire: '2y',
            mobileResponsive: true,
            maintainSelected: true,
            trimOnSearch: false,
            showSearchClearButton: true,
            paginationFirstText: "<?php echo e(trans('general.first')); ?>",
            paginationLastText: "<?php echo e(trans('general.last')); ?>",
            paginationPreText: "<?php echo e(trans('general.previous')); ?>",
            paginationNextText: "<?php echo e(trans('general.next')); ?>",
            pageList: ['10','20', '30','50','100','150','200'<?php echo ((config('app.max_results') > 200) ? ",'500'" : ''); ?><?php echo ((config('app.max_results') > 500) ? ",'".config('app.max_results')."'" : ''); ?>],
            pageSize: <?php echo e((($snipeSettings->per_page!='') && ($snipeSettings->per_page > 0)) ? $snipeSettings->per_page : 20); ?>,
            paginationVAlign: 'both',
            queryParams: function (params) {
                var newParams = {};
                for(var i in params) {
                    if(!keyBlocked(i)) { // only send the field if it's not in blockedFields
                        newParams[i] = params[i];
                    }
                }
                return newParams;
            },
            formatLoadingMessage: function () {
                return '<h2><i class="fas fa-spinner fa-spin" aria-hidden="true"></i> <?php echo e(trans('general.loading')); ?> </h4>';
            },
            icons: {
                advancedSearchIcon: 'fas fa-search-plus',
                paginationSwitchDown: 'fa-caret-square-o-down',
                paginationSwitchUp: 'fa-caret-square-o-up',
                fullscreen: 'fa-expand',
                columns: 'fa-columns',
                refresh: 'fas fa-sync-alt',
                export: 'fa-download',
                clearSearch: 'fa-times'
            },
            exportOptions: export_options,

            exportTypes: ['xlsx', 'excel', 'csv', 'pdf','json', 'xml', 'txt', 'sql', 'doc' ],
            onLoadSuccess: function () {
                $('[data-tooltip="true"]').tooltip(); // Needed to attach tooltips after ajax call
            }

        });
    });
</script>



</body>
</html>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/users/print.blade.php ENDPATH**/ ?>