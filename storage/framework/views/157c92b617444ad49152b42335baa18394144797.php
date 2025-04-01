<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.bulkaudit')); ?>

    <?php echo \Illuminate\View\Factory::parentPlaceholder('title'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <style>

        .input-group {
            padding-left: 0px !important;
        }
    </style>

    

    <div class="row">
    <?php echo e(Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'audit-form' ])); ?>

        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-default">

                    <div class="box-body">
                    <?php echo e(csrf_field()); ?>


                    <!-- Next Audit -->
                        <div class="form-group <?php echo e($errors->has('asset_tag') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('asset_tag', trans('general.asset_tag'), array('class' => 'col-md-3 control-label', 'id' => 'audit_tag'))); ?>

                            <div class="col-md-9">
                                <div class="input-group date col-md-5" data-date-format="yyyy-mm-dd">
                                    <input type="text" class="form-control" name="asset_tag" id="asset_tag" value="<?php echo e(Request::old('asset_tag')); ?>">

                                </div>
                                <?php echo $errors->first('asset_tag', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>



                        <!-- Locations -->
                    <?php echo $__env->make('partials.forms.edit.location-select', ['translated_name' => trans('general.location'), 'fieldname' => 'location_id'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                    <!-- Update location -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-md-9">
                                <label class="form-control">
                                    <input type="checkbox" value="1" name="update_location" <?php echo e(old('update_location') == '1' ? ' checked="checked"' : ''); ?>> <?php echo e(trans('admin/hardware/form.asset_location')); ?>

                                </label>

                                <a href="#" class="text-dark-gray" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="<i class='far fa-life-ring'></i> More Info" data-html="true" data-content="Checking this box will edit the asset record to reflect this new location. Leaving it unchecked will simply note the location in the audit log.<br><br>Note that if this asset is checked out, it will not change the location of the person, asset or location it is checked out to."><i class="far fa-life-ring"></i></a>

                            </div>
                        </div>


                        <!-- Next Audit -->
                        <div class="form-group <?php echo e($errors->has('next_audit_date') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('next_audit_date', trans('general.next_audit_date'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-9">
                                <div class="input-group date col-md-5" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-clear-btn="true">
                                    <input type="text" class="form-control" placeholder="<?php echo e(trans('general.next_audit_date')); ?>" name="next_audit_date" id="next_audit_date" value="<?php echo e(old('next_audit_date', $next_audit_date)); ?>">
                                    <span class="input-group-addon"><i class="fas fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                <?php echo $errors->first('next_audit_date', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>


                        <!-- Note -->
                        <div class="form-group <?php echo e($errors->has('note') ? 'error' : ''); ?>">
                            <?php echo e(Form::label('note', trans('admin/hardware/form.notes'), array('class' => 'col-md-3 control-label'))); ?>

                            <div class="col-md-8">
                                <textarea class="col-md-6 form-control" id="note" name="note"><?php echo e(old('note')); ?></textarea>
                                <?php echo $errors->first('note', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>'); ?>

                            </div>
                        </div>



                    </div> <!--/.box-body-->
                    <div class="box-footer">
                        <a class="btn btn-link" href="<?php echo e(route('hardware.index')); ?>"> <?php echo e(trans('button.cancel')); ?></a>
                        <button type="submit" id="audit_button" class="btn btn-success pull-right"><i class="fas fa-check icon-white" aria-hidden="true"></i> <?php echo e(trans('general.audit')); ?></button>
                    </div>



            </div>



            <?php echo e(Form::close()); ?>

        </div> <!--/.col-md-6-->

        <div class="col-md-6">
            <div class="box box-default" id="audited-div" style="display: none">
                <div class="box-header with-border">
                    <h2 class="box-title"> <?php echo e(trans('general.bulkaudit_status')); ?> (<span id="audit-counter">0</span> <?php echo e(trans('general.assets_audited')); ?>) </h2>
                </div>
                <div class="box-body">
    
                    <table id="audited" class="table table-striped snipe-table">
                        <thead>
                        <tr>
                            <th><?php echo e(trans('general.asset_tag')); ?></th>
                            <th><?php echo e(trans('general.bulkaudit_status')); ?></th>
                            <th></th>
                        </tr>
                        <tr id="audit-loader" style="display: none;">
                            <td colspan="3">
                                <i class="fas fa-spinner spin" aria-hidden="true"></i> <?php echo e(trans('admin/hardware/form.processing_spinner')); ?>

                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('moar_scripts'); ?>
    <script nonce="<?php echo e(csrf_token()); ?>">

        $("#audit-form").submit(function (event) {
            $('#audited-div').show();
            $('#audit-loader').show();

            event.preventDefault();

            var form = $("#audit-form").get(0);
            var formData = $('#audit-form').serializeArray();

            $.ajax({
                url: "<?php echo e(route('api.asset.audit')); ?>",
                type : 'POST',
                headers: {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                dataType : 'json',
                data : formData,
                success : function (data) {
                    if (data.status == 'success') {
                        $('#audited tbody').prepend("<tr class='success'><td>" + data.payload.asset_tag + "</td><td>" + data.messages + "</td><td><i class='fas fa-check text-success'></i></td></tr>");
                        incrementOnSuccess();
                    } else {
                        handleAuditFail(data);
                    }
                    $('input#asset_tag').val('');
                },
                error: function (data) {
                    handleAuditFail(data);
                },
                complete: function() {
                    $('#audit-loader').hide();
                }

            });

            return false;
        });

        function handleAuditFail (data) {
            if (data.asset_tag) {
                var asset_tag = data.asset_tag;
            } else {
                var asset_tag = '';
            }
            if (data.messages) {
                var messages = data.messages;
            } else {
                var messages = '';
            }
            $('#audited tbody').prepend("<tr class='danger'><td>" + data.payload.asset_tag + "</td><td>" + messages + "</td><td><i class='fas fa-times text-danger'></i></td></tr>");
        }

        function incrementOnSuccess() {
            var x = parseInt($('#audit-counter').html());
            y = x + 1;
            $('#audit-counter').html(y);
        }

        $("#audit_tag").focus();

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/hardware/quickscan.blade.php ENDPATH**/ ?>