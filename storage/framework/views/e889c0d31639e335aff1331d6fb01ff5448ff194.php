<!-- Asset Model -->
<div id="<?php echo e($fieldname); ?>" class="form-group<?php echo e($errors->has($fieldname) ? ' has-error' : ''); ?>">

    <?php echo e(Form::label($fieldname, $translated_name, array('class' => 'col-md-3 control-label'))); ?>


    <div class="col-md-7<?php echo e(((isset($required)) && ($required=='true')) ? ' required' : ''); ?>">
        <select class="js-data-ajax" data-endpoint="statuslabels" data-placeholder="<?php echo e(trans('general.select_statuslabel')); ?>" name="<?php echo e($fieldname); ?>" style="width: 100%" id="status_select_id" aria-label="<?php echo e($fieldname); ?>" <?php echo ((isset($item)) && (Helper::checkIfRequired($item, $fieldname))) ? ' data-validation="required" required' : ''; ?><?php echo e((isset($multiple) && ($multiple=='true')) ? " multiple='multiple'" : ''); ?>>
            <?php if($status_id = old($fieldname,  (isset($item)) ? $item->{$fieldname} : '')): ?>
                <option value="<?php echo e($status_id); ?>" selected="selected" role="option" aria-selected="true"  role="option">
                    <?php echo e((\App\Models\Statuslabel::find($status_id)) ? \App\Models\Statuslabel::find($status_id)->name : ''); ?>

                </option>
            <?php else: ?>
                <option value=""  role="option"><?php echo e(trans('general.select_status')); ?></option>
            <?php endif; ?>

        </select>
    </div>

    <div class="col-md-1 col-sm-1 text-left">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Statuslabel::class)): ?>
            <?php if((!isset($hide_new)) || ($hide_new!='true')): ?>
                <a href='<?php echo e(route('modal.show', 'statuslabel')); ?>' data-toggle="modal"  data-target="#createModal" data-select='status_select_id' class="btn btn-sm btn-primary"><?php echo e(trans('button.new')); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>


    <?php echo $errors->first($fieldname, '<div class="col-md-8 col-md-offset-3"><span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span></div>'); ?>

</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/forms/edit/status-select.blade.php ENDPATH**/ ?>