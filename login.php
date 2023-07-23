<?= view('common/header'); ?>
<div class="register_form">
    <div class="register_head">
        <h4>Login</h4>
    </div>
    <?php if (!empty(session()->getFlashData('success'))) { ?>
        <div class="alert alert-success">
            <?= session()->getFlashData('success') ?>
        </div>
    <?php } else if (!empty(session()->getFlashData('fail'))) { ?>
            <div class="alert alert-danger">
            <?= session()->getFlashData('fail') ?>
            </div>
        <?php } ?>
    <?= form_open(base_url('login')) ?>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email here" value="<?= set_value('email') ?>">
        <span class="text-danger text-sm">
            <?= isset($validation) ? display_errors($validation, 'email') : '' ?>
        </span>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password here"
            value="<?= set_value('password') ?>">
        <span class="text-danger text-sm">
            <?= isset($validation) ? display_errors($validation, 'password') : '' ?>
        </span>
    </div>
    <div class="form-group submit-btn">
        <input type="submit" class="btn btn-info" value="log in">
    </div>
    <?= form_close(); ?>
</div>
<?= view('common/footer'); ?>