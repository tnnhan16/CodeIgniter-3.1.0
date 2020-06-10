<?php $this->load->view('admin/layout/breadcrumb'); ?>
<br />
<?php echo form_open_multipart('admin/baiviet/edit/'.$info['id'] ,'class="form-horizontal"'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Form edit bài viết
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <div class="input-group col-5">
                        <div class="input-group-addon">Name</div>
                        <input name="name" class="form-control" type="text" value="<?php echo $info['name'] ?>">
                        <div class="input-group col-12">
                            <font color='red'><?php echo form_error('name');?></font>
                        </div>
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