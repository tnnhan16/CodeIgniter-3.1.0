<?php $this->load->view('admin/layout/breadcrumb'); ?>
<br />
<?php echo form_open_multipart('admin/user/edit/'.$info['id'] ,'class="form-horizontal"'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Form edit người dùng
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <div class="input-group col-5">
                        <div class="input-group-addon">Username</div>
                        <input name="username" class="form-control" type="text" value="<?php echo $info['username'] ?>">
                    </div>
                    <div class="input-group col-12">
                        <font color='red'><?php echo form_error('username');?></font>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group col-5">
                        <div class="input-group-addon">Email</div>
                        <input name="email" class="form-control" type="email" value="<?php echo $info['email'] ?>">
                    </div>
                    <div class="input-group col-12">
                        <font color='red'><?php echo form_error('email');?></font>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group col-5">
                        <div class="input-group-addon">Password</div>
                        <input name="password" class="form-control" type="password" value="">
                    </div>
                    <div class="input-group col-12">
                        <font color='red'><?php echo form_error('password');?></font>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group col-5">
                        <div class="input-group-addon">Password confirm</div>
                        <input name="password_confirm" class="form-control" type="password" value="">
                    </div>
                    <div class="input-group col-12">
                        <font color='red'><?php echo form_error('password_confirm');?></font>
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