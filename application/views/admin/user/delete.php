<?php $this->load->view('admin/layout/breadcrumb'); ?>
<br />
<?php echo form_open_multipart('admin/user/delete/'.$info->id ,'class="form-horizontal"','enctype="multipart/form-data"'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Form xóa người dùng
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col-2">ID:</div>
                    <div class="col-10"> <?php echo $info->id ?></div>
                </div>
                <div class="row form-group">
                    <div class="col-2">Username:</div>
                    <div class="col-10"> <?php echo $info->username ?></div>
                </div>
                <div class="row form-group">
                    <div class="col-2">Email:</div>
                    <div class="col-10"> <?php echo $info->email ?></div>
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