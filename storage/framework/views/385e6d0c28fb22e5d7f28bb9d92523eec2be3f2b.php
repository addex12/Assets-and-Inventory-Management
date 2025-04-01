<!-- Modal -->
<div class="modal fade" id="<?php echo e($modal_name); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($modal_name); ?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="<?php echo e($modal_name); ?>Label"><?php echo e($title); ?></h4>
            </div>
            <form action="<?php echo e($route); ?>" method="POST" class="form-horizontal">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <?php echo e($body); ?>

                    </div>
                </div>

            </div> <!-- /.modal-body-->
            <div class="modal-footer">
                <a href="#" class="pull-left" data-dismiss="modal"><?php echo e(trans('button.cancel')); ?></a>
                <button type="submit" class="btn btn-primary"><?php echo e(trans('general.confirm')); ?></button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/modals/confirm-action.blade.php ENDPATH**/ ?>