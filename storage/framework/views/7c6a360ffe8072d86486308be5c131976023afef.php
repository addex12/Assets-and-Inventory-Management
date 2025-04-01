<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.import')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>
<div>
    
        <div class="row">


<?php if($message != ''): ?>
    <div class="col-md-12" class="<?php echo e($message_type); ?>">
        <div class="alert alert-<?php echo e($this->message_type); ?>">
            <button type="button" class="close" wire:click="$set('message','')">&times;</button>
            <?php if($message_type == 'success'): ?>
                <i class="fas fa-check faa-pulse animated" aria-hidden="true"></i>
            <?php endif; ?>
            <strong> </strong>
            <?php echo e($message); ?>

        </div>
    </div>
<?php endif; ?>

        <?php if($import_errors): ?>
          <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="alert alert-warning">

                        <i class="fa fa-warning info" aria-hidden="true"></i> <strong><?php echo e(trans('general.warning', ['warning'=> trans('general.errors_importing')])); ?></strong>
                    </div>

                    <div class="errors-table">
                        <table class="table table-striped table-bordered" id="errors-table">
                            <thead>
                            <th><?php echo e(trans('general.item')); ?></th>
                            <th><?php echo e(trans('general.error')); ?></th>
                            </thead>
                            <tbody>
                            <?php \Log::debug("import errors are: ".print_r($import_errors,true)); ?>
                            <?php $__currentLoopData = $import_errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $actual_import_errors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php \Log::debug("Key is: $key"); ?>
                                <?php $__currentLoopData = $actual_import_errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table => $error_bag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php \Log::debug("Table is: $table"); ?>
                                    <?php $__currentLoopData = $error_bag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $error_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php \Log::debug("Field is: $field"); ?>
                                        <tr>
                                            <td><?php echo e($activeFile->file_path ?? "Unknown File"); ?></td>
                                            <td>
                                                <b><?php echo e($field); ?>:</b>
                                                <span><?php echo e(implode(", ",$error_list)); ?></span>
                                                <br />
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       </div>
<?php endif; ?>

            <div class="col-md-9">
                <div class="box">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-12">

                                <?php if($progress != -1): ?>
                                    <div class="col-md-10 col-sm-5 col-xs-12" style="height: 35px;" id='progress-container'>
                                        <div class="progress progress-striped-active" style="height: 100%;">
                                            <div id='progress-bar' class="progress-bar <?php echo e($progress_bar_class); ?>" role="progressbar" style="width: <?php echo e($progress); ?>%">
                                                <h4 id="progress-text"><?php echo $progress_message; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="col-md-2 col-sm-5 col-xs-12 text-right pull-right">

                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <?php if(!config('app.lock_passwords')): ?>
                                        <span class="btn btn-primary fileinput-button">
                                        <span><?php echo e(trans('button.select_file')); ?></span>
                                         <!-- The file input field used as target for the file upload widget -->
                                        <label for="files[]"><span class="sr-only"><?php echo e(trans('admin/importer/general.select_file')); ?></span></label>
                                        <input id="fileupload" type="file" name="files[]" data-url="<?php echo e(route('api.imports.index')); ?>" accept="text/csv" aria-label="files[]">
                                        </span>
                                    <?php endif; ?>

                                </div>

                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-12 table-responsive" style="padding-top: 30px;">
                                <table data-pagination="true"
                                        data-id-table="upload-table"
                                        data-search="true"
                                        data-side-pagination="client"
                                        id="upload-table"
                                        class="col-md-12 table table-striped snipe-table">

                                    <tr>
                                        <th class="col-md-6">
                                            <?php echo e(trans('general.file_name')); ?>

                                        </th>
                                        <th class="col-md-3">
                                            <?php echo e(trans('general.created_at')); ?>

                                        </th>
                                        <th class="col-md-1">
                                            <?php echo e(trans('general.filesize')); ?>

                                        </th>
                                        <th class="col-md-1 text-right">
                                            <span class="sr-only"><?php echo e(trans('general.actions')); ?></span>
                                        </th>
                                    </tr>

                                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    		<tr style="<?php echo e(($activeFile && ($currentFile->id == $activeFile->id)) ? 'font-weight: bold' : ''); ?>" class="<?php echo e(($activeFile && ($currentFile->id == $activeFile->id)) ? 'warning' : ''); ?>">
                                    			<td class="col-md-6"><?php echo e($currentFile->file_path); ?></td>
                                    			<td class="col-md-3"><?php echo e(Helper::getFormattedDateObject($currentFile->created_at, 'datetime', false)); ?></td>
                                    			<td class="col-md-1"><?php echo e(Helper::formatFilesizeUnits($currentFile->filesize)); ?></td>
                                                <td class="col-md-1 text-right" style="white-space: nowrap;">
                                                    <button class="btn btn-sm btn-info" wire:click="selectFile(<?php echo e($currentFile->id); ?>)" data-tooltip="true" title="<?php echo e(trans('general.import_this_file')); ?>">
                                                        <i class="fa-solid fa-list-check" aria-hidden="true"></i>
                                                        <span class="sr-only"><?php echo e(trans('general.import')); ?></span>
                                                    </button>
                                                    <a href="#" wire:click="$set('activeFile',null)">
                                                    <button class="btn btn-sm btn-danger" wire:click="destroy(<?php echo e($currentFile->id); ?>)">
                                                        <i class="fas fa-trash icon-white" aria-hidden="true"></i><span class="sr-only"></span></button>
                                                    </a>
                                    			</td>
                                    		</tr>

                                            <?php if( $currentFile && $activeFile && ($currentFile->id == $activeFile->id)): ?>
                                                <tr class="warning">
                                                    <td colspan="4">

                                                        <div class="form-group">

                                                                <label for="activeFile.import_type" class="col-md-3 col-xs-12">
                                                                    <?php echo e(trans('general.import_type')); ?>

                                                                </label>

                                                                <div class="col-md-9 col-xs-12">
                                                                    <?php echo e(Form::select('activeFile.import_type', $importTypes, $activeFile->import_type, [
                                                                        'id' => 'import_type',
                                                                        'class' => 'livewire-select2',
                                                                        'style' => 'min-width: 350px',
                                                                        'data-placeholder' => trans('general.select_var', ['thing' => trans('general.import_type')]),
                                                                        'placeholder' => '', //needed so that the form-helper will put an empty option first
                                                                        'data-minimum-results-for-search' => '-1', // Remove this if the list gets long enough that we need to search
                                                                        'data-livewire-component' => $_instance->id
                                                                    ])); ?>

                                                                    <?php if($activeFile->import_type === 'asset' && $snipeSettings->auto_increment_assets == 0): ?>
                                                                        <p class="help-block">
                                                                            <?php echo e(trans('general.auto_incrementing_asset_tags_disabled_so_tags_required')); ?>

                                                                        </p>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-9 col-md-offset-3">
                                                                <label class="form-control">
                                                                    <input type="checkbox" name="update" data-livewire-component="<?php echo e($_instance->id); ?>" wire:model="update">
                                                                    <?php echo e(trans('general.update_existing_values')); ?>

                                                                </label>
                                                                <?php if($activeFile->import_type === 'asset' && $snipeSettings->auto_increment_assets == 1 && $update): ?>
                                                                    <p class="help-block">
                                                                        <?php echo e(trans('general.auto_incrementing_asset_tags_enabled_so_now_assets_will_be_created')); ?>

                                                                    </p>
                                                                <?php endif; ?>

                                                                <label class="form-control">
                                                                    <input type="checkbox" name="send_welcome" data-livewire-component="<?php echo e($_instance->id); ?>" wire:model="send_welcome">
                                                                    <?php echo e(trans('general.send_welcome_email_to_users')); ?>

                                                                </label>

                                                                <label class="form-control">
                                                                    <input type="checkbox" name="run_backup" data-livewire-component="<?php echo e($_instance->id); ?>" wire:model="run_backup">
                                                                    <?php echo e(trans('general.back_before_importing')); ?>

                                                                </label>

                                                            </div>


                                                            <?php if($statusText): ?>
                                                                <div class="alert col-md-8 col-md-offset-3<?php echo e($statusType == 'success' ? ' alert-success' : ($statusType == 'error' ? ' alert-danger' : ' alert-info')); ?>" style="padding-top: 20px;">
                                                                    <?php echo $statusText; ?>

                                                                </div>
                                                            <?php endif; ?>


                                                            <?php if($activeFile->import_type): ?>
                                                                <div class="form-group col-md-12">
                                                                    <hr style="border-top: 1px solid lightgray">
                                                                    <h3><i class="<?php echo e(Helper::iconTypeByItem($activeFile->import_type)); ?>"></i> Map <?php echo e(ucwords($activeFile->import_type)); ?> Import Fields</h3>
                                                                    <hr style="border-top: 1px solid lightgray">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <div class="col-md-3 text-right">
                                                                        <strong><?php echo e(trans('general.csv_header_field')); ?></strong>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <strong><?php echo e(trans('general.import_field')); ?></strong>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <strong><?php echo e(trans('general.sample_value')); ?></strong>
                                                                    </div>
                                                                </div><!-- /div row -->

                                                                <?php if($activeFile->header_row): ?>

                                                                    <?php $__currentLoopData = $activeFile->header_row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <div class="form-group col-md-12" wire:key="header-row-<?php echo e($index); ?>">

                                                                            <label for="field_map.<?php echo e($index); ?>" class="col-md-3 control-label text-right"><?php echo e($header); ?></label>
                                                                            <div class="col-md-4">

                                                                                <?php echo e(Form::select('field_map.'.$index, $columnOptions[$activeFile->import_type], @$field_map[$index],
                                                                                    [
                                                                                        'class' => 'mappings livewire-select2',
                                                                                        'placeholder' => trans('general.importer.do_not_import'),
                                                                                        'style' => 'min-width: 100%',
                                                                                        'data-livewire-component' => $_instance->id
                                                                                    ],[
                                                                                        '-' => ['disabled' => true] // this makes the "-----" line unclickable
                                                                                    ])); ?>

                                                                            </div>
									                                    <?php if(($activeFile->first_row) && (array_key_exists($index, $activeFile->first_row))): ?>
                                                                            <div class="col-md-5">
                                                                                <p class="form-control-static"><?php echo e(str_limit($activeFile->first_row[$index], 50, '...')); ?></p>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <?php
                                                                            $statusText = trans('help.empty_file');
                                                                            $statusType = 'info';
                                                                            ?>
                                                                        <?php endif; ?>
                                                                        </div><!-- /div row -->
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <?php echo e(trans('general.no_headers')); ?>

                                                                <?php endif; ?>

                                                                <div class="form-group col-md-12">
                                                                    <div class="col-md-3 text-left">
                                                                        <a href="#" wire:click="$set('activeFile',null)"><?php echo e(trans('general.cancel')); ?></a>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <button type="submit" class="btn btn-primary col-md-5" id="import">Import</button>
                                                                        <br><br>
                                                                    </div>
                                                                </div>

                                                                <?php if($statusText): ?>
                                                                    <div class="alert col-md-8 col-md-offset-3<?php echo e($statusType == 'success' ? ' alert-success' : ($statusType == 'error' ? ' alert-danger' : ' alert-info')); ?>" style="padding-top: 20px;">
                                                                        <?php echo $statusText; ?>

                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <div class="form-group col-md-10">
                                                                    <div class="col-md-3 text-left">
                                                                        <a href="#" wire:click="$set('activeFile',null)"><?php echo e(trans('general.cancel')); ?></a>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?> 

                                                        </div><!-- /div v-show -->                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2><?php echo e(trans('general.importing')); ?></h2>
                <p><?php echo trans('general.importing_help'); ?></p>
            </div>

        </div>
</div>
<?php $__env->startPush('js'); ?>
    <script>

        
        $('#fileupload').fileupload({
            dataType: 'json',
            done: function(e, data) {
                window.livewire.find('<?php echo e($_instance->id); ?>').progress_bar_class = 'progress-bar-success';
                window.livewire.find('<?php echo e($_instance->id); ?>').progress_message = '<i class="fas fa-check faa-pulse animated"></i> <?php echo e(trans('general.notification_success')); ?>';
                window.livewire.find('<?php echo e($_instance->id); ?>').progress = 100;
            },
            add: function(e, data) {
                data.headers = {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                };
                data.process().done( function () {data.submit();});
                window.livewire.find('<?php echo e($_instance->id); ?>').progress = 0;
                window.livewire.find('<?php echo e($_instance->id); ?>').clearMessage();
            },
            progress: function(e, data) {
                window.livewire.find('<?php echo e($_instance->id); ?>').progress = parseInt((data.loaded / data.total * 100, 10));
                window.livewire.find('<?php echo e($_instance->id); ?>').progress_message = '<?php echo e(trans('general.uploading')); ?>';
            },
            fail: function() {
                window.livewire.find('<?php echo e($_instance->id); ?>').progress_bar_class = "progress-bar-danger";
                window.livewire.find('<?php echo e($_instance->id); ?>').progress = 100;
                window.livewire.find('<?php echo e($_instance->id); ?>').progress_message = '<i class="fas fa-exclamation-triangle faa-pulse animated"></i> <?php echo e(trans('general.upload_error')); ?>';
            }
        })

        // For the importFile part:
        $(function () {


            // we have to hook up to the `<tr id='importer-file'>` at the root of this display,
            // because the #import button isn't visible until you click an import_type
            $('#upload-table').on('click', '#import', function () {
                if(!window.livewire.find('<?php echo e($_instance->id); ?>').activeFile.import_type) {
                    window.livewire.find('<?php echo e($_instance->id); ?>').statusType='error';
                    window.livewire.find('<?php echo e($_instance->id); ?>').statusText= "An import type is required... "; //TODO: translate?
                    return;
                }
                window.livewire.find('<?php echo e($_instance->id); ?>').statusType ='pending';
                window.livewire.find('<?php echo e($_instance->id); ?>').statusText = '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> <?php echo e(trans('admin/hardware/form.processing_spinner')); ?>';
                window.livewire.find('<?php echo e($_instance->id); ?>').generate_field_map().then(function (mappings_raw) {
                    var mappings = JSON.parse(mappings_raw)
                    // console.warn("Here is the mappings:")
                    // console.dir(mappings)
                    // console.warn("Uh, active file id is, I guess: "+window.livewire.find('<?php echo e($_instance->id); ?>').activeFile.id)
                    var this_file = window.livewire.find('<?php echo e($_instance->id); ?>').file_id; // okay, I actually don't know what I'm doing here.
                    $.post({
                        
                        url: "api/v1/imports/process/"+this_file, // maybe? Good a guess as any..FIXME. HARDCODED DUMB FILE
                        contentType: 'application/json',
                        data: JSON.stringify({
                            'import-update': !!window.livewire.find('<?php echo e($_instance->id); ?>').update,
                            'send-welcome': !!window.livewire.find('<?php echo e($_instance->id); ?>').send_welcome,
                            'import-type': window.livewire.find('<?php echo e($_instance->id); ?>').activeFile.import_type,
                            'run-backup': !!window.livewire.find('<?php echo e($_instance->id); ?>').run_backup,
                            'column-mappings': mappings
                        }),
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done( function (body) {
                        // Success
                        window.livewire.find('<?php echo e($_instance->id); ?>').statusType="success";
                        window.livewire.find('<?php echo e($_instance->id); ?>').statusText = "<?php echo e(trans('general.success_redirecting')); ?>";
                        // console.dir(body)
                        window.location.href = body.messages.redirect_url;
                    }).fail( function (jqXHR, textStatus, error) {
                        // Failure
                        var body = jqXHR.responseJSON
                        if((body) && (body.status) && body.status == 'import-errors') {
                            window.livewire.find('<?php echo e($_instance->id); ?>').emit('importError', body.messages);
                            window.livewire.find('<?php echo e($_instance->id); ?>').import_errors = body.messages

                            window.livewire.find('<?php echo e($_instance->id); ?>').statusType='error';
                            window.livewire.find('<?php echo e($_instance->id); ?>').statusText = "Error";

                        //  If Slack/notifications hits API thresholds, we *do* 500, but we never
                        //  actually surface that info.
                        //
                        // A 500 on notifications doesn't mean your import failed, so this is a confusing state.
                        //
                        //  Ideally we'd have a message like "Your import worked, but not all
                        // notifications could be sent".
                        } else {
                            console.warn("Not import-errors, just regular errors - maybe API limits")
                            window.livewire.find('<?php echo e($_instance->id); ?>').message_type="warning"
                            if ((body) && (error in body)) {
                                window.livewire.find('<?php echo e($_instance->id); ?>').message = body.error ? body.error:"Unknown error - might just be throttling by notifications."
                            } else {
                                window.livewire.find('<?php echo e($_instance->id); ?>').message = "<?php echo e(trans('general.importer_generic_error')); ?>"
                            }

                        }
                        window.livewire.find('<?php echo e($_instance->id); ?>').activeFile = null; //window.livewire.find('<?php echo e($_instance->id); ?>').set('hideDetails')
                    });
                })
                return false;
            });})

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/livewire/importer.blade.php ENDPATH**/ ?>