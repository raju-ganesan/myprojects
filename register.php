<?= view('common/header'); ?>
<div class="register_form">
    <div class="register_head">
        <h4>Register</h4>
    </div>

    <?php if (!empty(session()->getFlashData('success'))) { ?>
        <div class="alert alert-success">
            <?= session()->getFlashData('success') ?>
        </div>
    <?php } else if (!empty(session()->getFlashData('fail'))) { ?>
            <div class="alert alert-danger">
            <?= session()->getFlashData('fail') ?>
            </div>
        <?php }


    $user_id = '';
    if (isset($id)) {
        $user_id = $id;
    } ?>

    <?= form_open_multipart(base_url('/' . $user_id)); ?>
    <div class="form-group row">
        <div class="col-2">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="First name here"
                value="<?= isset($logged_user) ? $logged_user['first_name'] : set_value('first_name') ?>">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_errors($validation, 'first_name') : '' ?>
            </span>
        </div>
        <div class="col-2">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Last name here"
                value="<?= isset($logged_user) ? $logged_user['last_name'] : set_value('last_name') ?>">
            <span class="text-danger text-sm">
                <?= isset($validation) ? display_errors($validation, 'last_name') : '' ?>
            </span>
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email here"
            value="<?= isset($logged_user) ? $logged_user['email'] : set_value('email') ?>">
        <span class="text-danger text-sm">
            <?= isset($validation) ? display_errors($validation, 'email') : '' ?>
        </span>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password here"
            value="<?= isset($logged_user) ? $logged_user['password'] : set_value('password') ?>">
        <span class="text-danger text-sm">
            <?= isset($validation) ? display_errors($validation, 'password') : '' ?>
        </span>
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password here"
            value="<?= isset($logged_user) ? $logged_user['password'] : set_value('confirm_password') ?>">
        <span class="text-danger text-sm">
            <?= isset($validation) ? display_errors($validation, 'confirm_password') : '' ?>
        </span>
    </div>
    <div class="form-group">
        <label>Profile Picture</label>
        <input type="file" class="form-control" name="profile" accept="image/*">
        <span class="text-danger text-sm">
            <?= isset($validation) ? display_errors($validation, 'profile') : '' ?>
        </span>
    </div>
    <div class="form-group">
        <label>Select a role:</label>
        <select class="form-control" name="role">
            <option value="" disabled selected>Select your option</option>
            <option value="admin" <?= isset($logged_user) && $logged_user['role'] === 'admin' ? 'selected' : set_select('role', 'admin') ?>>Admin
            </option>
            <option value="user" <?= isset($logged_user) && $logged_user['role'] === 'user' ? 'selected' : set_select('role', 'user') ?>>User
            </option>
        </select>
        <span class="text-danger text-sm">
            <?= isset($validation) ? display_errors($validation, 'role') : '' ?>
        </span>
    </div>
    <div class="form-group login row">
        <div class="login-page col-2">
            <span>Already have an account?<a class="login-link" href="<?php echo base_url('login'); ?>">
                    Login</a></span>
        </div>
        <div class="col-2">
            <div class="submit-btn">
                <input type="submit" class="btn btn-info" value="Submit">
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>
<?= view('common/footer'); ?>