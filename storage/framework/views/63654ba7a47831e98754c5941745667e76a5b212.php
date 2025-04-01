<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin/settings/general.backups')); ?>

<?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header_right'); ?>
    <a href="<?php echo e(route('settings.index')); ?>" class="btn btn-default pull-right" style="margin-left: 5px;"> 
      <?php echo e(trans('general.back')); ?>

    </a>

    <form method="POST" style="display: inline">
      <?php echo e(Form::hidden('_token', csrf_token())); ?>

            <button class="btn btn-primary <?php echo e((config('app.lock_passwords')) ? ' disabled': ''); ?>"><?php echo e(trans('admin/settings/general.generate_backup')); ?></button>
      </form>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<div class="row">

  <div class="col-md-8">
    
    <div class="box box-default">
      <div class="box-body">
       
        
          
        <div class="table-responsive">
          
            <table
                    data-cookie="true"
                    data-cookie-id-table="system-backups"
                    data-pagination="true"
                    data-id-table="system-backups"
                    data-search="true"
                    data-side-pagination="client"
                    data-sort-order="desc"
                    data-sort-name="modified_display"
                    id="system-backups"
                    class="table table-striped snipe-table">
            <thead>
              <tr>
              <th data-sortable="true"><?php echo e(trans('general.file_name')); ?></th>
              <th data-sortable="true" data-field="modified_display" data-sort-name="modified_value"><?php echo e(trans('admin/settings/table.created')); ?></th>
              <th data-field="modified_value" data-visible="false"></th>
              <th data-sortable="true"><?php echo e(trans('admin/settings/table.size')); ?></th>
              <th><?php echo e(trans('table.actions')); ?></th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td>
                  <a href="<?php echo e(route('settings.backups.download', [$file['filename']])); ?>">
                      <?php echo e($file['filename']); ?>

                  </a>
              </td>
              <td><?php echo e($file['modified_display']); ?> </td>
              <td><?php echo e($file['modified_value']); ?> </td>
              <td><?php echo e($file['filesize']); ?></td>
              <td>

                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
                      <?php if(config('app.allow_backup_delete')=='true'): ?>
                      <a data-html="false"
                         class="btn delete-asset btn-danger btn-sm <?php echo e((config('app.lock_passwords')) ? ' disabled': ''); ?>" 
                         data-toggle="modal" href="<?php echo e(route('settings.backups.destroy', $file['filename'])); ?>" 
                         data-content="<?php echo e(trans('admin/settings/message.backup.delete_confirm')); ?>" 
                         data-title="<?php echo e(trans('general.delete')); ?>  <?php echo e(e($file['filename'])); ?>?"
                         onClick="return false;">
                          <i class="fas fa-trash icon-white" aria-hidden="true"></i>
                          <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                      </a>
                      <?php else: ?>
                          <a href="#"
                             class="btn delete-asset btn-danger btn-sm disabled">
                              <i class="fas fa-trash icon-white" aria-hidden="true"></i>
                              <span class="sr-only"><?php echo e(trans('general.delete')); ?></span>
                          </a>
                      <?php endif; ?>

                     <a data-html="true" 
                     href="<?php echo e(route('settings.backups.restore', $file['filename'])); ?>" 
                     class="btn btn-warning btn-sm restore-asset <?php echo e((config('app.lock_passwords')) ? ' disabled': ''); ?>" 
                     data-toggle="modal" 
                     data-content="<?php echo e(trans('admin/settings/message.backup.restore_warning')); ?>" 
                     data-title="<?php echo e(trans('admin/settings/message.backup.restore_confirm', array('filename' => e($file['filename'])))); ?>"
                     onClick="return false;">
                      <i class="fas fa-retweet" aria-hidden="true"></i>
                      <span class="sr-only"><?php echo e(trans('general.restore')); ?></span>
                    </a>
                     
                  <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
      </div> <!-- end table-responsive div -->
    </div> <!-- end box-body div -->
</div> <!-- end box div -->
</div> <!-- end col-md div -->

   <!-- side address column -->
  <div class="col-md-4">

    <div class="box box-default">
      <div class="box-header with-border">
        <h2 class="box-title">
          <i class="far fa-file-archive" aria-hidden="true"></i>
          <?php echo e(trans('admin/settings/general.backups_upload')); ?>

        </h2>
        <div class="box-tools pull-right">
        </div>
      </div><!-- /.box-header -->

      <div class="box-body">

        <p>
          <?php echo trans('admin/settings/general.backups_path', ['path'=> $path]); ?>

        </p>

        <?php if(config('app.lock_passwords')===true): ?>
        <p class="alert alert-warning"><i class="fas fa-lock"></i> <?php echo e(trans('general.feature_disabled')); ?></p>
          <?php else: ?>
              
      <?php echo e(Form::open([
        'method' => 'POST',
        'route' => 'settings.backups.upload',
        'files' => true,
        'class' => 'form-horizontal' ])); ?>

        <?php echo csrf_field(); ?>

        
      <div class="form-group <?php echo e($errors->has((isset($fieldname) ? $fieldname : 'file')) ? 'has-error' : ''); ?>" style="margin-bottom: 0px;">
        <div class="col-md-8 col-xs-8">
          
          
             <!-- displayed on screen -->
            <label class="btn btn-default col-md-12 col-xs-12" aria-hidden="true">
              <i class="fas fa-paperclip" aria-hidden="true"></i>
                <?php echo e(trans('button.select_file')); ?>

                <input type="file" name="file" class="js-uploadFile" id="uploadFile" data-maxsize="<?php echo e(Helper::file_upload_max_size()); ?>" accept="application/zip" style="display:none;" aria-label="file" aria-hidden="true">
            </label>
        </div>
        <div class="col-md-4 col-xs-4">
            <button class="btn btn-primary col-md-12 col-xs-12" id="uploadButton" disabled><?php echo e(trans('button.upload')); ?> <span id="uploadIcon"></span></button>
        </div>
        <div class="col-md-12">
          
          <p class="label label-default col-md-12" style="font-size: 120%!important; margin-top: 10px; margin-bottom: 10px;" id="uploadFile-info"></p>
          <p class="help-block" style="margin-top: 10px;" id="uploadFile-status"><?php echo e(trans_choice('general.filetypes_accepted_help', 1, ['size' => Helper::file_upload_max_size_readable(), 'types' => '.zip'])); ?></p>     
          <?php echo $errors->first('file', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

            
        </div>  
            
    </div>
    
    <?php echo e(Form::close()); ?>

    <?php endif; ?>  
      </div>
    </div>

    <div class="box box-warning">
      <div class="box-header with-border">
        <h2 class="box-title">
          <i class="fas fa-exclamation-triangle text-orange" aria-hidden="true"></i> <?php echo e(trans('admin/settings/general.backups_restoring')); ?></h2>
        <div class="box-tools pull-right">
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        
      <p>
        <?php echo trans('admin/settings/general.backups_restore_warning', ['app_name' => config('app.name') ]); ?>

      </p>
        
      <p class="text-danger" style="font-weight: bold; font-size: 120%;">
        <?php echo e(trans('admin/settings/general.backups_logged_out')); ?>

      </p>

      <p>
        <?php echo e(trans('admin/settings/general.backups_large')); ?> 
      </p>
      
    </div>
  </div>
    
        </div> <!-- end col-md-12 form div -->
   </div> <!-- end form group div -->

  </div> <!-- end col-md-3 div -->
</div> <!-- end row div -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>

    <?php echo $__env->make('partials.bootstrap-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <script>
      /*
      * This just disables the upload button via JS unless they have actually selected a file.
      *
      * Todo: - key off the javascript response for JS file upload info as well, so that if it fails that 
      * check (file size and type) we should also leave it disabled.
      */

      $(document).ready(function() {
        
        $("#uploadFile").on('change',function(event){

            if ($('#uploadFile').val().length == 0) {
                $("#uploadButton").attr("disabled", true);
                $("#uploadIcon").html('');
            } else {
              $('#uploadButton').removeAttr('disabled');

                $("#uploadButton").click(function(){
                    $("#uploadIcon").html('<i class="fas fa-spinner spin"></i>');
                });
            }




        });
      });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/settings/backups.blade.php ENDPATH**/ ?>