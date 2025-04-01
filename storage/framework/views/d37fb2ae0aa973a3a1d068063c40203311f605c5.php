<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo e(trans('general.assigned_to', ['name' => $show_user->present()->fullName()])); ?> - <?php echo e(date('Y-m-d H:i', time())); ?></title>

    <link rel="shortcut icon" type="image/ico" href="<?php echo e(($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->favicon)) : config('app.url').'/favicon.ico'); ?>">

    <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/bootstrap-table.css'))); ?>">

    
    <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/all.css'))); ?>">

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
            padding: 20px;
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

        <h2>
            <?php if($snipeSettings->logo!=''): ?>
                <img class="print-logo" src="<?php echo e(config('app.url')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
            <?php endif; ?>
            <?php echo e($snipeSettings->site_name); ?>

        </h2>
    <?php elseif($snipeSettings->brand == '2'): ?>
        <?php if($snipeSettings->logo!=''): ?>
            <img class="print-logo" src="<?php echo e(config('app.url')); ?>/uploads/<?php echo e($snipeSettings->logo); ?>">
        <?php endif; ?>
    <?php else: ?>
        <h2><?php echo e($snipeSettings->site_name); ?></h2>
    <?php endif; ?>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>


<script src="<?php echo e(url(mix('js/dist/all.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>

<script src="<?php echo e(url(mix('js/dist/bootstrap-table.js'))); ?>"></script>
<script src="<?php echo e(url(mix('js/dist/bootstrap-table-locale-all.min.js'))); ?>"></script>

<!-- load english again here, even though it's in the all.js file, because if BS table doesn't have the translation, it otherwise defaults to chinese. See https://bootstrap-table.com/docs/api/table-options/#locale -->
<script src="<?php echo e(url(mix('js/dist/bootstrap-table-en-US.min.js'))); ?>"></script>

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
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/users/print-shell.blade.php ENDPATH**/ ?>