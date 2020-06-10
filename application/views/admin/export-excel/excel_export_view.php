<?php $this->load->view('admin/layout/breadcrumb'); ?>
<div class="row m-t-20">
    <div class="col-sm-3 col-lg-2">
        <form method="post" action="/admin/exportxls/action">
            <button type="submit" href="#" class="btn btn-primary btn-sm">
                <i class="fa fa-download"></i>  Export excel one sheet
            </button>
        </form>
    </div>
    <div class="col-sm-3 col-lg-2">
        <form method="post" action="/admin/exportxls/exportexcel">
            <button type="submit" href="#" class="btn btn-primary btn-sm">
                <i class="fa fa-download"></i>  Export excel multi sheet
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
                        <th>Name</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Designation</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($employee_data as $row): ?>
                    <tr>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->address ?></td>
                        <td><?php echo $row->gender == 1 ? 'Nam': 'Nữ' ?></td>
                        <td><?php echo $row->designation  ?></td>
                        <td><?php echo $row->age  ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>