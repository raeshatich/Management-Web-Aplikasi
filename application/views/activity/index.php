<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Activity</h1>

    </div>
    <div class="table-responsive small">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>App Support</th>
                    <th>Detail</th>

                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php
                $application_id = 1;
                foreach ($activity as $row) :
                ?>
                    <tr>
                        <td class="text-center"><?= ++$page; ?></td>
                        <td><?php echo $row['pic_name'] ?></td>
                        <td class="text-center">
                            <?php if (isset($admin)) { ?>
                                <a class='btninfo' href="<?= base_url(); ?>activity/detail/<?= $row['id_user']; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stickies-fill" viewBox="0 0 16 16">
                                        <path d="M0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5A1.5 1.5 0 0 0 0 1.5" />
                                        <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2zm6 8.5a1 1 0 0 1 1-1h4.396a.25.25 0 0 1 .177.427l-5.146 5.146a.25.25 0 0 1-.427-.177z" />
                                    </svg>
                                </a>


                                <?php  } else {
                                $id_user = $_SESSION['id_user'];
                                if ($id_user == $row['id_user']) { ?>
                                    <a class='btninfo' href="<?= base_url(); ?>activity/detail/<?= $row['id_user']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stickies-fill" viewBox="0 0 16 16">
                                            <path d="M0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5A1.5 1.5 0 0 0 0 1.5" />
                                            <path d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2zm6 8.5a1 1 0 0 1 1-1h4.396a.25.25 0 0 1 .177.427l-5.146 5.146a.25.25 0 0 1-.427-.177z" />
                                        </svg>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col">
            <?php echo $pagination; ?>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-1.7.0.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/mindmap.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.tooltipster.js') ?>"></script>

</main>