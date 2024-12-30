<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <div id="flash" data-flash="<?php echo $this->session->flashdata('flash'); ?>"></div>
   
    <form class="input" action="<?php echo base_url('auth/registration'); ?>" method="post">
        <h1 class="h3 mb-3 fw-normal text-enter">Registration</h1>

        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="name" name="name" placeholder="Username" value="<?= set_value('name'); ?>">
            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
            <label for="floatingInput">Username<span class="spanapp">*</span></label>
        </div>
        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="pic_name" name="pic_name" placeholder="PIC Name" value="<?= set_value('pic_name'); ?>">
            <?= form_error('pic_name', '<small class="text-danger">', '</small>'); ?>
            <label for="floatingInput">Nama PIC<span class="spanapp">*</span></label>
        </div>
        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            <label for="floatingInput">Email<span class="spanapp">*</span></label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

            <label for="floatingPassword">Password<span class="spanapp">*</span></label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password">
            <?= form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>

            <label for="floatingPassword">Konfirmasi password<span class="spanapp">*</span></label>
        </div>

        <button class="btnbase w-100 py-9 btn-lg" type="submit">Registration</button>
    </form>
</main>