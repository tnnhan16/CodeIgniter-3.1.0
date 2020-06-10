<?php $this->load->view('admin/layout/breadcrumb'); ?>
<div class="row m-t-20">
    <div class="col-sm-3 col-lg-2">
        <form method="post" action="/admin/download-pdf/download">
            <button type="submit" href="#" class="btn btn-primary btn-sm">
                <i class="fa fa-download"></i>  Download pdf
            </button>
        </form>
    </div>
</div>
<br />
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th>Name</th>
                        <th>Name kana</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row): ?>
                    <tr>
                        <td class="text-center"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['name_kana']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>