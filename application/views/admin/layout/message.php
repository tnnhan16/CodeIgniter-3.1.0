<?php if($this->session->flashdata('mess')): ?>
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show" style="margin-top: 1rem !important;margin-bottom:0rem !important;">
    <span class="badge badge-pill badge-success">Success</span>
    <?php echo $this->session->flashdata('mess'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<?php endif ?>
<br/>