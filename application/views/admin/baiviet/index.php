<?php $this->load->view('admin/layout/breadcrumb'); ?>
<?php $this->load->view('admin/layout/message'); ?>
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-primary btn-sm" href="<?php echo '/admin/baiviet/insert/' ?>">
            <i class="zmdi zmdi-plus"></i> Thêm mới</a>
    </div>
</div>
<br />
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list as $row): ?>
                    <tr>
                        <td class="text-center"><?php echo $row->id ?></td>
                        <td><?php echo $row->name ?></td>
                        <td class="text-center">
                            <a title="edit" href="<?php echo site_url('/admin/baiviet/edit/'.$row->id); ?>"><i
                                    class="fa fa-edit"></i></a>
                            <a title="delete" href="<?php echo '/admin/baiviet/delete/'.$row->id ?>"><i class="fa fa-trash"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <?php echo $links; ?>
        </div>
    </div>
</div>