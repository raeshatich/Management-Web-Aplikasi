<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul; ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/button.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/alert/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/mindmap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/mindmap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tooltipster.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/accordion.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/hover-img.css') ?>">


    <script src="https://code.jquery.com/jquery-3.7.1.min.js?v=<?= date("YmdHis"); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"> </script>
    <script src="<?= base_url('assets/alert/sweetalert2.min.js') ?>"> </script>

    <link rel="stylesheet" href="<?= base_url('assets/pptxjs/css/pptxjs.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pptxjs/css/nv.d3.min.css') ?>">

    <!-- <script type="text/javascript" src="<?= base_url('assets/js/pptx.js') ?>"></script> -->

    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/jquery-1.11.3.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/jszip.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/filereader.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/d3.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/nv.d3.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/pptxjs.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/divs2slides.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/pptxjs/js/jquery.fullscreen-min.js') ?>"></script>

    <!-- <script src="<?= base_url('assets/js/jquery-1.7.0.min.js') ?>"></script> -->
    <script src="<?= base_url('assets/js/mindmap.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.tooltipster.js?v=<?= date("YmdHis"); ?>') ?>"></script>

    <style>
        .swal2-popup {
            font-size: .5rem !important;
        }
    </style>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">

        <symbol id="chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </symbol>

        <symbol id="list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </symbol>

        <symbol id="search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </symbol>
        <symbol id="logout" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
        </symbol>
        <symbol id="useradd" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
        </symbol>
        <symbol id="add" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
        </symbol>


    </svg>


    <?php
    $id_user = $_SESSION['id_user'];

    if ($this->session->userdata('role_id') == 'user') { ?>


        <header class="navbar sticky-top p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#"> WHA</a>
            <?php
            if (($this->uri->segment(1) == 'user') ? 'active' : '') { ?>
                <nav class="nav">
                    <a class="nav-item nav-link text-white <?= ($this->uri->segment(1) == 'user') ? 'active' : '' ?>" href="<?php echo base_url(); ?>user">Dashboard</a>
                    <a class="nav-item nav-link text-white <?= ($this->uri->segment(1) == 'applications') ? 'active' : '' ?>" href="<?php echo base_url(); ?>applications">Application</a>
                    <a class="nav-item nav-link text-white <?= ($this->uri->segment(1) == 'architecture') ? 'active' : '' ?>" href="<?php echo base_url(); ?>architecture">Architecture</a>
                    <a class="nav-item nav-link text-white<?= ($this->uri->segment(1) == 'activity') ? 'active' : '' ?>" href="<?php echo base_url(); ?>activity/detail/<?= $id_user; ?>">Activity</a>
                </nav>
                <div class="dropdown">
                    <button class="dropbtn ">HI, <?= $user['name']; ?>!</button>
                    <div class="dropdown-content">
                        <a class="nav-link d-flex align-items-center gap-2" href="<?php echo base_url('auth/logout'); ?>">
                            Logout
                            <svg class="bi">
                                <use xlink:href="#logout" />
                            </svg>
                        </a>

                    </div>
                </div>
        </header>
    <?php } else { ?>

        <div class="dropdown">
            <button class="dropbtn ">HI, <?= $user['name']; ?>!</button>
            <div class="dropdown-content">

                <a class="nav-link d-flex align-items-center gap-2" href="<?php echo base_url('auth/logout'); ?>">
                    <svg class="bi">
                        <use xlink:href="#logout" />
                    </svg>
                    Logout
                </a>

            </div>
        </div>
        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="bi">
                        <use xlink:href="#list" />
                    </svg>
                </button>
            </li>
        </ul>
        </header>
    <?php } ?>

<?php } else { ?>
    <header class="navbar sticky-top p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href=""> WHA</a>
        <?php

        if (($this->uri->segment(1) == 'admin') ? 'active' : '') { ?>
            <nav class="nav">
                <a class="nav-item nav-link text-white <?= ($this->uri->segment(1) == 'admin') ? 'active' : '' ?>" href="<?php echo base_url(); ?>admin">Dashboard</a>
                <a class="nav-item nav-link text-white <?= ($this->uri->segment(1) == 'applications') ? 'active' : '' ?>" href="<?php echo base_url(); ?>applications">Application</a>
                <a class="nav-item nav-link text-white <?= ($this->uri->segment(1) == 'architecture') ? 'active' : '' ?>" href="<?php echo base_url(); ?>architecture">Architecture</a>
                <a class="nav-item nav-link text-white <?= ($this->uri->segment(1) == 'activity') ? 'active' : '' ?>" href="<?php echo base_url(); ?>activity">Activity</a>

            </nav>
            <div class="dropdown">
                <button class="dropbtn ">HI, <?= $user['name']; ?>!</button>
                <div class="dropdown-content">

                    <a class="nav-link d-flex align-items-center gap-2 <?= ($this->uri->segment(1) == 'auth/user') ? 'active' : '' ?>" href="<?php echo base_url('auth/user'); ?>">
                        <svg class="bi">
                            <use xlink:href="#useradd" />
                        </svg>
                        User

                    </a>
                    <a class="nav-link d-flex align-items-center gap-2" href="<?php echo base_url('auth/logout'); ?>">
                        <svg class="bi">
                            <use xlink:href="#logout" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>

            <ul class="navbar-nav flex-row d-md-none">
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <svg class="bi">
                            <use xlink:href="#list" />
                        </svg>
                    </button>
                </li>
            </ul>
    </header>
<?php } else { ?>

    <div class="dropdown">
        <button class="dropbtn ">HI, <?= $user['name']; ?>!</button>
        <div class="dropdown-content">

            <a class="nav-link d-flex align-items-center gap-2 <?= ($this->uri->segment(1) == 'auth/user') ? 'active' : '' ?>" href="<?php echo base_url('auth/user'); ?>">
                <svg class="bi">
                    <use xlink:href="#useradd" />
                </svg>
                User
            </a>
            <a class="nav-link d-flex align-items-center gap-2" href="<?php echo base_url('auth/logout'); ?>">
                <svg class="bi">
                    <use xlink:href="#logout" />
                </svg>
                Logout
            </a>
        </div>
    </div>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="bi">
                    <use xlink:href="#list" />
                </svg>
            </button>
        </li>
    </ul>
    </header>
<?php } ?>

<?php } ?>

<!-- sidebar -->
<script src="<?= base_url('assets/js/alert.js') ?>"></script>
