<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-book"></i> <?php echo $this->lang->line('library'); ?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $this->lang->line('edit_journal'); ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form id="form1" action="<?php echo site_url('admin/journals/edit/' . $id) ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg') ?>
                            <?php } ?>
                            <?php
                            if (isset($error_message)) {
                                echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                            }
                            ?>
                            <?php echo $this->customlib->getCSRF(); ?>
                            <input type="hidden" name="id" value="<?php echo set_value('id', $editbook['id']); ?>">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('journal_title'); ?></label>
                                <input autofocus="" id="journal_title" name="journal_title" placeholder="" type="text" class="form-control" value="<?php echo set_value('journal_title', $editbook['journal_title']); ?>" />
                                <span class="text-danger"><?php echo form_error('journal_title'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('journal_no'); ?></label>
                                <input id="journal_no" name="journal_no" placeholder="" type="text" class="form-control" value="<?php echo set_value('journal_no', $editbook['journal_no']); ?>" />
                                <span class="text-danger"><?php echo form_error('journal_no'); ?></span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('issn_no'); ?></label>
                                <input id="issn_no" name="issn_no" placeholder="" type="text" class="form-control" value="<?php echo set_value('issn_no', $editbook['issn_no']); ?>" />
                                <span class="text-danger"><?php echo form_error('issn_no'); ?></span>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('publisher'); ?></label>
                                <input id="amount" name="publisher" placeholder="" type="text" class="form-control" value="<?php echo set_value('publisher', $editbook['publisher']); ?>" />
                                <span class="text-danger"><?php echo form_error('publisher'); ?></span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('author'); ?></label>
                                <input id="amount" name="author" placeholder="" type="text" class="form-control" value="<?php echo set_value('author', $editbook['author']); ?>" />
                                <span class="text-danger"><?php echo form_error('author'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('subject'); ?></label>
                                <input id="subject" name="subject" placeholder="" type="text" class="form-control" value="<?php echo set_value('subject', $editbook['subject']); ?>" />
                                <span class="text-danger"><?php echo form_error('subject'); ?></span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('rack_no'); ?></label>
                                <input id="rack_no" name="rack_no" placeholder="" type="text" class="form-control" value="<?php echo set_value('rack_no', $editbook['rack_no']); ?>" />
                                <span class="text-danger"><?php echo form_error('rack_no'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('qty'); ?></label>
                                <input id="amount" name="qty" placeholder="" type="text" class="form-control" value="<?php echo set_value('qty', $editbook['qty']); ?>" />
                                <span class="text-danger"><?php echo form_error('qty'); ?></span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('journalprice'); ?></label>
                                <input id="amount" name="journalprice" placeholder="" type="text" class="form-control" value="<?php echo set_value('journalprice', $editbook['journalprice']); ?>" />
                                <span class="text-danger"><?php echo form_error('journalprice'); ?></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('postdate'); ?></label>
                                <input id="postdate" name="postdate" placeholder="" type="text" class="form-control" value="<?php echo set_value('postdate', date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($editbook['postdate']))); ?>" />
                                <span class="text-danger"><?php echo form_error('postdate'); ?></span>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><?php echo $this->lang->line('description'); ?></label>
                                <textarea class="form-control" id="description" name="description" placeholder="" rows="3" placeholder=""><?php echo set_value('description', $editbook['description']); ?></textarea>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">

                            <button type="submit" class="btn btn-info pull-right"><?php echo $this->lang->line('save'); ?></button>
                        </div>
                    </form>
                </div>

            </div>
            <!--/.col (right) -->


        </div>
        <div class="row">
            <!-- left column -->
            <!-- right column -->
            <div class="col-md-12">
            </div>
            <!--/.col (right) -->
        </div> <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';
        $('#postdate').datepicker({
            //   format: "dd-mm-yyyy",
            format: date_format,
            autoclose: true
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function() {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>