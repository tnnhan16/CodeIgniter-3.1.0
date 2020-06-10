<?php 
    $user_login = $this->session->userdata('logged_in');
    if(empty($user_login['username'])){
        redirect('admin/login');
    }
?>
<html lang="en">
<!--liên kết đến file head -->
<?php $this->load->view('admin/layout/head')?>

<body class="animsition" style="animation-duration: 900ms; opacity: 1;">
    <div class="page-wrapper">
        <?php $this->load->view('admin/layout/header')?>
        <?php $this->load->view('admin/layout/sidebar')?>
        <div class="page-container">
            <?php $this->load->view('admin/layout/header-desktop')?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php $this->load->view($temp_view)?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('admin/layout/footer')?>
</body>

</html>