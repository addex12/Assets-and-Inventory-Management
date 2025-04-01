<a style="padding-left: 5px; font-size: 15px;" class="text-dark-gray hidden-print" data-trigger="focus" tabindex="0" role="button" data-toggle="popover" title="<?php echo e(trans('general.more_info')); ?>" data-placement="right" data-html="true" data-content="<?php echo e((isset($helpText)) ? $helpText : 'Help Info Missing'); ?>">
    <?php if (isset($component)) { $__componentOriginalce262628e3a8d44dc38fd1f3965181bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce262628e3a8d44dc38fd1f3965181bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'b755fd58408e5b8e1a655ca0e3e17e80::icon','data' => ['type' => 'more-info','style' => 'padding-top: 9px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'more-info','style' => 'padding-top: 9px;']); ?>
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
    <span class="sr-only"><?php echo e(trans('general.moreinfo')); ?></span>
</a>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/partials/more-info.blade.php ENDPATH**/ ?>