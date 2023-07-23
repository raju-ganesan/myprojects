<?= view('common/header'); ?>
<div class="medicine_form">
    <div class="page-header"></div>
    <?php if (!empty(session()->getFlashData('fail'))) { ?>
        <div class="alert alert-danger">
            <?= session()->getFlashData('fail') ?>
        </div>
    <?php } ?>
    <?php $medicine_id = '';
    if (isset($id)) {
        $medicine_id = $id;
    } ?>
    <?= form_open(base_url('medicine' . ($medicine_id ? '/' . $medicine_id : ''))); ?>

    <div class="form-group order_qty">
        <label>Product Order Quantity:</label>
        <input type="number" class="form-control" name="order_quantity"
            value="<?= isset($medicine) ? $medicine['order_quantity'] : set_value('order_quantity') ?>">
    </div>
    <div class="form-group row">
        <div class="col-5">
            <label>Batch Number:</label>
            <input type="text" class="form-control" name="batch_number"
                value="<?= isset($medicine) ? $medicine['batch_number'] : '' ?>">
        </div>
        <div class="col-5">
            <label>Manufaturing Date:</label>
            <input type="date" class="form-control" name="mfg_date"
                value="<?= isset($medicine) ? $medicine['manufacture_date'] : '' ?>">
        </div>
        <div class="col-5">
            <label>Expiry Date:</label>
            <input type="date" class="form-control" name="exp_date"
                value="<?= isset($medicine) ? $medicine['expiry_date'] : '' ?>">
        </div>
        <div class="col-5">
            <label>Batch Quantity:</label>
            <input type="number" class="form-control" name="batch_quantity"
                value="<?= isset($medicine) ? $medicine['batch_quantity'] : '' ?>">
        </div>
        <div class="col-5">
            <input type="submit" class="btn btn-info" value="<?php echo !empty($id) ? "Update" : "Add" ?>">
        </div>
    </div>
    <?= form_close(); ?>
    <div class="box">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Batch Number</th>
                    <th>Manufaturing Date</th>
                    <th>Expiry Date</th>
                    <th>Batch Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($medicine_quantities)) {
                    foreach ($medicine_quantities as $medicine_quantity) {
                        $i = 1;
                        $actions = '<a href="' . base_url('medicine/' . $medicine_quantity['id']) . '" > <i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="' . base_url('medicine/delete/' . $medicine_quantity['id']) . '" > <i class="fa-sharp fa-solid fa-trash"></i></a>'
                            ?>
                        <tr>
                            <td>
                                <?= $i++ ?>
                            </td>
                            <td>
                                <?= $medicine_quantity['batch_number']; ?>
                            </td>
                            <td>
                                <?= $medicine_quantity['manufacture_date']; ?>
                            </td>
                            <td>
                                <?= $medicine_quantity['expiry_date']; ?>
                            </td>
                            <td>
                                <?= $medicine_quantity['batch_quantity']; ?>
                            </td>
                            <td>
                                <?= $actions ?>
                            </td>
                        </tr>
                        <?php
                    }
                } ?>
            </tbody>
        </table>
    </div>
    <div class="total_quantity">
        <label>Total Quantity:</label>
        <input class="form-control" value="<?= $ans_quantity ?>">
    </div>
</div>
<?= view('common/footer'); ?>