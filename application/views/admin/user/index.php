<?php $this->load->view('admin/layout/breadcrumb'); ?>
<?php $this->load->view('admin/layout/message'); ?>
<div class="row">
    <div class="col-sm-3 col-lg-1">
        <button type="button" url-api="<?php echo base_url(); ?>admin/user/deleteall" class="btn btn-primary btn-sm" id="deleteAllUser">
            <i class="fa fa-trash" aria-hidden="true"></i>  Delete all
        </button>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-primary btn-sm" href="<?php echo '/admin/user/insert/' ?>">
            <i class="zmdi zmdi-plus"></i> Thêm mới</a>
    </div>
    <div class="col-lg-1">
        <a class="btn btn-primary btn-sm" href="<?php echo '/admin/user/importcsv/' ?>">
            <i class="zmdi zmdi-plus"></i> Import csv</a>
    </div>
</div>
<br />
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th class="text-center">
                            <!-- Material checked -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkAll" name="checkAll"
                                    value="all"> <label>check all</label>
                            </div>
                        </th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Active</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list as $row): ?>
                    <tr>
                        <td class="text-center">
                            <!-- Material checked -->
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"  name="checkbox[]"
                                    value="<?php echo $row->id ?>">
                            </div>
                        </td>
                        <td class="text-center"><?php echo $row->email ?></td>
                        <td><?php echo $row->username ?></td>
                        <td><?php echo $row->active ? 'active':'not active' ?></td>
                        <td class="text-center">
                            <a title="edit" href="<?php echo site_url('/admin/user/edit/'.$row->id); ?>"><i
                                    class="fa fa-edit"></i></a>
                            <a title="delete" href="<?php echo '/admin/user/delete/'.$row->id ?>"><i class="fa fa-trash"
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