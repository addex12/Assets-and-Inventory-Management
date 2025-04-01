<div>
    <!-- EULA text -->
    <div class="form-group <?php echo e($errors->has('eula_text') ? 'error' : ''); ?>">
        <label for="eula_text" class="col-md-3 control-label"><?php echo e(trans('admin/categories/general.eula_text')); ?></label>
        <div class="col-md-7">
            <?php echo e(Form::textarea('eula_text', null, ['wire:model' => 'eulaText', 'class' => 'form-control', 'aria-label'=>'eula_text', 'disabled' => $this->eulaTextDisabled])); ?>

            <p class="help-block"><?php echo trans('admin/categories/general.eula_text_help'); ?> </p>
            <p class="help-block"><?php echo trans('admin/settings/general.eula_markdown'); ?> </p>
            <?php echo $errors->first('eula_text', '<span class="alert-msg" aria-hidden="true">:message</span>'); ?>

        </div>
        <?php if($this->eulaTextDisabled): ?>
            <input type="hidden" name="eula_text" wire:model="eulaText" />
        <?php endif; ?>
    </div>

    <!-- Use default checkbox -->
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <?php if($defaultEulaText!=''): ?>
                <label class="form-control">
                    <?php echo e(Form::checkbox('use_default_eula', '1', null, ['wire:model' => 'useDefaultEula', 'aria-label'=>'use_default_eula'])); ?>

                    <span><?php echo trans('admin/categories/general.use_default_eula'); ?></span>
                </label>
            <?php else: ?>
                <label class="form-control form-control--disabled">
                    <?php echo e(Form::checkbox('use_default_eula', '0', null, ['wire:model' => 'useDefaultEula', 'class'=>'disabled','disabled' => 'disabled', 'aria-label'=>'use_default_eula'])); ?>

                    <span><?php echo trans('admin/categories/general.use_default_eula_disabled'); ?></span>
                </label>
            <?php endif; ?>
        </div>
    </div>

    <!-- Require Acceptance -->
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <label class="form-control">
                <?php echo e(Form::checkbox('require_acceptance', '1', null, ['wire:model' => 'requireAcceptance', 'aria-label'=>'require_acceptance'])); ?>

                <?php echo e(trans('admin/categories/general.require_acceptance')); ?>

            </label>
        </div>
    </div>

    <!-- Email on Checkin -->
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <label class="form-control">
                <?php echo e(Form::checkbox('checkin_email', '1', null, ['wire:model' => 'sendCheckInEmail', 'aria-label'=>'checkin_email', 'disabled' => $this->sendCheckInEmailDisabled])); ?>

                <?php echo e(trans('admin/categories/general.checkin_email')); ?>

            </label>
            <?php if($this->shouldDisplayEmailMessage): ?>
                <div class="callout callout-info">
                    <i class="far fa-envelope"></i>
                    <span><?php echo e($this->emailMessage); ?></span>
                </div>
            <?php endif; ?>
            <?php if($this->sendCheckInEmailDisabled): ?>
                <input type="hidden" name="checkin_email" wire:model="sendCheckInEmail" />
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/livewire/category-edit-form.blade.php ENDPATH**/ ?>