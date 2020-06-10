<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('admin/layout/head')?>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username"
                                        placeholder="Username" value="<?php echo set_value('username'); ?>">
                                    <font color='red'><?php echo form_error('username');?></font>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                        placeholder="Email">
                                    <font color='red'><?php echo form_error('email');?></font>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password">
                                    <font color='red'><?php echo form_error('password');?></font>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password_confirm"
                                        placeholder="Confirm Password">
                                    <font color='red'><?php echo form_error('password_confirm');?></font>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20"
                                    type="submit">register</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="/admin/login">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('admin/layout/footer')?>
</body>
</html>