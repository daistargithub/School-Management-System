<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-object-group"></i> <?php echo $this->lang->line('activities'); ?></h1>
    </section>s
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if ($this->rbac->hasPrivilege('add_committee', 'can_add') || $this->rbac->hasPrivilege('add_committee', 'can_edit')) { ?>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $this->lang->line('edit_committee'); ?></h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form action="<?php echo site_url("admin/committee/edit/" . $id) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                            <div class="box-body">
                                <?php echo validation_errors(); ?>
                                <?php echo $this->customlib->getCSRF(); ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo $this->lang->line('committee_name'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="committee_name" name="committee_name" placeholder="Committee Name" type="text" class="form-control"  value="<?php echo set_value('committee name', $committee['committee_name']); ?>" />
                                    <span class="text-danger"><?php echo form_error('committee_name'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> <?php echo $this->lang->line('committee'); ?> <?php echo $this->lang->line('in_charge'); ?></label><small class="req"> *</small>
                                    <input autofocus="" id="in_charge" name="in_charge" placeholder="Committee In-charge " type="text" class="form-control"  value="<?php echo set_value('committee In-charge', $committee['in_charge']); ?>" />
                                    <span class="text-danger"><?php echo form_error('in_charge'); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                    <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder="Enter ..."><?php echo set_value('description', $committee['description']); ?></textarea>
                                    <span class="text-danger"><?php echo form_error('description'); ?></span>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">

                                <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div><!--/.col (right) -->
            <?php } ?>
            <div class="col-md-<?php
            if ($this->rbac->hasPrivilege('add_committee', 'can_add') || $this->rbac->hasPrivilege('add_committee', 'can_edit')) {
                echo "8";
            } else {
                echo "12";
            }
            ?>">
                <!-- general form elements -->
                <div class="box box-primary" id="exphead">
                    <div class="box-header ptbnull">
                        <h3 class="box-title titlefix"><?php echo $this->lang->line('committee_list'); ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body  ">
                        <div class="table-responsive mailbox-messages">
                            <div class="download_label"><?php echo $this->lang->line('committee_list'); ?></div>
                            <table class="table table-striped table-bordered table-hover example">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('committee_name'); ?></th>
                                        <th><?php echo $this->lang->line('committee'); ?> <?php echo $this->lang->line('in_charge'); ?></th>
                                        <th class="text-right no-print"><?php echo $this->lang->line('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($committeelist)) {
                                        ?>

                                        <?php
                                    } else {
                                        $count = 1;
                                        foreach ($committeelist as $committee) {
                                            ?>
                                            <tr>                                               
                                                <td class="mailbox-name">
                                                    <a href="#" data-toggle="popover" class="detail_popover" >
        <?php echo $committee['committee_name'] ?>
                                                    </a>

                                                    <div class="fee_detail_popover" style="display: none">
                                                        <?php
                                                        if ($committee['description'] == "") {
                                                            ?>
                                                            <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class="text text-info"><?php echo $committee['description']; ?></p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <td class="mailbox-name"><?php echo $committee['in_charge']; ?></td>
                                                <td class="mailbox-date pull-right no-print">
        <?php if ($this->rbac->hasPrivilege('add_commitee', 'can_edit')) { ?>
                                                        <a href="<?php echo base_url(); ?>admin/committee/edit/<?php echo $committee['id'] ?>" class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
        <?php } if ($this->rbac->hasPrivilege('add_committee', 'can_delete')) { ?>
                                                        <a href="<?php echo base_url(); ?>admin/committee/delete/<?php echo $committee['id'] ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line('delete'); ?>" onclick="return confirm('<?php echo $this->lang->line('delete_confirm') ?>');">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
        <?php } ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $count++;
                                    }
                                    ?>

                                </tbody>
                            </table><!-- /.table -->
                        </div><!-- /.mail-box-messages -->
                    </div><!-- /.box-body -->
                </div>
            </div>


        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
    $(document).ready(function () {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function () {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>