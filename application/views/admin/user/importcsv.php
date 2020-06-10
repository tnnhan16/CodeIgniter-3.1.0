<?php $this->load->view('admin/layout/breadcrumb'); ?>
<br />
<?php echo form_open_multipart('admin/user/importcsv','class="form-horizontal"','enctype="multipart/form-data"'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Form import file csv user
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col-4">
                        <input class="form-control" type='file' name='importcsv' size='20' />
                        <font color='red'><?php echo !empty($error) ? $error : ''; ?></font>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" href="#" class="btn btn-primary btn-sm">
                    <i class="fa fa-save"></i> import
                </button>
            </div>
        </div>
    </div>
</div>
<?php echo "</form>"?>