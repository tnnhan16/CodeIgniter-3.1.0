<?php $this->load->view('admin/layout/breadcrumb'); ?>
<br />
<?php echo form_open('admin/baiviet/delete/'.$info->id ); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Form xóa bài viết
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col-2">ID:</div>
                    <div class="col-10"> <?php echo $info->id ?></div>
                </div>
                <div class="row form-group">
                    <div class="col-2">Name:</div>
                    <div class="col-10"> <?php echo $info->name ?></div>
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