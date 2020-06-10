<?php $this->load->view('admin/layout/breadcrumb'); ?>
<br />
<?php echo form_open_multipart('admin/uploadfile/edit/'.$info->id ,'class="form-horizontal"','enctype="multipart/form-data"'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Form upload file edit
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col-4">
                        <img src="<?php echo base_url('/public/uploads/').$info->name ?>" height="100" />
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <input class="form-control" type='file' name='userfile' size='20' />
                        <font color='red'><?php echo !empty($error) ? $error : ''; ?></font>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" href="#" class="btn btn-primary btn-sm">
                    <i class="fa fa-save"></i> save
                </button>
            </div>
        </div>
    </div>
</div>
<?php echo "</form>"?>