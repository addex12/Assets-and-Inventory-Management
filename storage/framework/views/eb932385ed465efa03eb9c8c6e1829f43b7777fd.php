<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Labels</title>

</head>
<body>

<?php
$settings->labels_width = $settings->labels_width - $settings->labels_display_sgutter;
$settings->labels_height = $settings->labels_height - $settings->labels_display_bgutter;
// Leave space on bottom for 1D barcode if necessary
$qr_size = ($settings->alt_barcode_enabled=='1') && ($settings->alt_barcode!='') ? $settings->labels_height - .3 : $settings->labels_height - 0.1;
?>

<style>
    body {
        font-family: arial, helvetica, sans-serif;
        width: <?php echo e($settings->labels_pagewidth); ?>in;
        height: <?php echo e($settings->labels_pageheight); ?>in;
        margin: <?php echo e($settings->labels_pmargin_top); ?>in <?php echo e($settings->labels_pmargin_right); ?>in <?php echo e($settings->labels_pmargin_bottom); ?>in <?php echo e($settings->labels_pmargin_left); ?>in;
        font-size: <?php echo e($settings->labels_fontsize); ?>pt;
    }
    .label {
        width: <?php echo e($settings->labels_width); ?>in;
        height: <?php echo e($settings->labels_height); ?>in;
        padding: 0in;
        margin-right: <?php echo e($settings->labels_display_sgutter); ?>in; /* the gutter */
        margin-bottom: <?php echo e($settings->labels_display_bgutter); ?>in;
        display: inline-block;
        overflow: hidden;
    }
    .page-break  {
        page-break-after:always;
    }
    div.qr_img {
        width: <?php echo e($qr_size); ?>in;
        height: <?php echo e($qr_size); ?>in;

        float: left;
        display: inline-flex;
        padding-right: .15in;
    }
    img.qr_img {

        width: 120.79%;
        height: 120.79%;
        margin-top: -6.9%;
        margin-left: -6.9%;
        padding-bottom: .04in;
    }
    img.barcode {
        display:block;
        margin-top:<?php echo e($settings->qr_code=='1' ? '-15px' : '-7px;'); ?>;
        width: 100%;
    }
    div.label-logo {
        float: right;
        display: inline-block;
    }
    img.label-logo {
        height: 0.5in;
    }
    .qr_text {
        width: <?php echo e($settings->labels_width); ?>in;
        height: <?php echo e($settings->labels_height); ?>in;
        padding-top: <?php echo e($settings->labels_display_bgutter); ?>in;
        font-family: arial, helvetica, sans-serif;
        font-size: <?php echo e($settings->labels_fontsize); ?>pt;
        padding-right: .0001in;
        overflow: hidden !important;
        display: inline;
        word-wrap: break-word;
        word-break: break-all;
    }
    div.barcode_container {

        width: 100%;
        display: inline;
        overflow: hidden;
    }
    .next-padding {
        margin: <?php echo e($settings->labels_pmargin_top); ?>in <?php echo e($settings->labels_pmargin_right); ?>in <?php echo e($settings->labels_pmargin_bottom); ?>in <?php echo e($settings->labels_pmargin_left); ?>in;
    }
    @media  print {
        .noprint {
            display: none !important;
        }
        .next-padding {
            margin: <?php echo e($settings->labels_pmargin_top); ?>in <?php echo e($settings->labels_pmargin_right); ?>in <?php echo e($settings->labels_pmargin_bottom); ?>in <?php echo e($settings->labels_pmargin_left); ?>in;
            font-size: 0;
        }
    }
    @media  screen {
        .label {
            outline: .02in black solid; /* outline doesn't occupy space like border does */
        }
        .noprint {
            font-size: 13px;
            padding-bottom: 15px;
        }
    }
    <?php if($snipeSettings->custom_css): ?>
        <?php echo $snipeSettings->show_custom_css(); ?>

    <?php endif; ?>
</style>

<?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $count++; ?>
    <div class="label">

        <?php if($settings->qr_code=='1'): ?>
            <div class="qr_img">
                <img src="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($asset->id); ?>/qr_code" class="qr_img">
            </div>
        <?php endif; ?>

        <div class="qr_text">
            <?php if($settings->label_logo): ?>
                <div class="label-logo">
                    <img class="label-logo" src="<?php echo e(Storage::disk('public')->url('').e($snipeSettings->label_logo)); ?>">
                </div>
            <?php endif; ?>
            <?php if($settings->qr_text!=''): ?>
                <div class="pull-left">
                    <strong><?php echo e($settings->qr_text); ?></strong>
                    <br>
                </div>
            <?php endif; ?>
            <?php if(($settings->labels_display_company_name=='1') && ($asset->company)): ?>
                <div class="pull-left">
                    C: <?php echo e($asset->company->name); ?>

                </div>
            <?php endif; ?>
            <?php if(($settings->labels_display_name=='1') && ($asset->name!='')): ?>
                <div class="pull-left">
                    N: <?php echo e($asset->name); ?>

                </div>
            <?php endif; ?>
            <?php if(($settings->labels_display_tag=='1') && ($asset->asset_tag!='')): ?>
                <div class="pull-left">
                    T: <?php echo e($asset->asset_tag); ?>

                </div>
            <?php endif; ?>
            <?php if(($settings->labels_display_serial=='1') && ($asset->serial!='')): ?>
                <div class="pull-left">
                    S: <?php echo e($asset->serial); ?>

                </div>
            <?php endif; ?>
            <?php if(($settings->labels_display_model=='1') && ($asset->model->name!='')): ?>
                <div class="pull-left">
                    M: <?php echo e($asset->model->name); ?> <?php echo e($asset->model->model_number); ?>

                </div>
            <?php endif; ?>

        </div>

        <?php if((($settings->alt_barcode_enabled=='1') && $settings->alt_barcode!='')): ?>
            <div class="barcode_container">
                <img src="<?php echo e(config('app.url')); ?>/hardware/<?php echo e($asset->id); ?>/barcode" class="barcode">
            </div>
        <?php endif; ?>



    </div>

    <?php if(($count % $settings->labels_per_page == 0) && $count!=count($assets)): ?>
    <div class="page-break"></div>
    <div class="next-padding">&nbsp;</div>
    <?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</body>
</html>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/hardware/labels.blade.php ENDPATH**/ ?>