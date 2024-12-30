<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/button.css') ?>">


    <div class="">
        <div class="header_home" id="myHeader">
            <div>
                <img src="<?= base_url('assets/images/bsi.png') ?>" alt="BSI Logo" class="logo">
            </div>
            <div>
                <div class="title">IT Wholesale & Office Automation Services</div>
                <div class="subtitle">The Fast and The Serious</div>
            </div>
            <div>
                <img src="<?= base_url('assets/images/akhlak.png') ?>" alt="Akhlak Logo" class="right-logo">
            </div>
        </div>
    </div>

</head>
<main class="form-signin w-100 m-auto mt-300">
    <form class="input" action="<?= base_url('auth'); ?>" method="post">
        <h1 class="h3 mb-3 fw-bold">Login</h1>
        <?= $this->session->flashdata('message'); ?>

        <div class="form-floating">
            <input type="text" class="form-control" id="name" name="name" placeholder="Username">
            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
            <label for="">Username</label>

        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

            <label for="">Password</label>
        </div>
        <button class="btnlogin w-100  btn-lg" name="login" type="submit">Login</button>
    </form>
</main>
<script src="<?php base_url('assets/bootstrap/js/bootstrap.min.js') ?>"> </script>

</html>