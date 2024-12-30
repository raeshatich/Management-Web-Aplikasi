<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="search-result">
        <h1 class="h2">Application
            <a href="<?= base_url(); ?>applicationn/add" class="btnaddapp">
                <svg class="bi">
                    <use xlink:href="#add" />
                </svg>
            </a>
        </h1>
        <form role="search" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" name="keyword" id="keyword" autocomplete="off">
            </div>
        </form>
    </div>
    <div id="flash" data-flash="<?php echo $this->session->flashdata('flash'); ?>"></div>


    <div class="table-responsive-xxl" id="results">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th colspan="2" class="text-center">Action</th>
                    <th class="text-center">Critical</th>
                    <th>Category</th>
                    <th>Name Application</th>
                    <th class="desc">Description</th>
                    <th>APP Support</th>
                    <th>Developer</th>
                    <th>PMO</th>
                    <th>Product Owner</th>
                    <th>Version</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                

                foreach ($applikasi as $row) :

                ?>

                    <tr>
                        <td><?= ++$page; ?></td>
                        <td>

                            <a class='btnedit' href="<?= base_url(); ?>applications/edit/<?= $row['application_id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                        </td>
                        <td>
                            <a class="btnhapus" id="btn-delete" href="<?= base_url(); ?>applicationn/delete/<?= $row['application_id']; ?>">
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5' />
                                </svg>
                            </a>
                        </td>

                        <td nowrap>
                            <?php if ($row['critical'] == 'Very Critical') : ?>
                                <span class="badge rounded-pill text-bg-danger">Very Critical</span>
                            <?php elseif ($row['critical'] == 'Critical') : ?>
                                <span class="badge rounded-pill" style="background-color: #ffa500;">Critical</span>
                            <?php elseif ($row['critical'] == 'Moderate') : ?>
                                <span class="badge rounded-pill" style="background-color: #ffcc00;">Moderate</span>
                            <?php elseif ($row['critical'] == 'Non Critical') : ?>
                                <span class="badge rounded-pill text-bg-success">Non Critical</span>
                            <?php endif; ?>
                        </td>

                        <td nowrap><?php echo $row['category'] ?></td>
                        <?php if (!empty($row['dns_address'])) : ?>
                            <td nowrap class="link"><a target="_blank" nowrap href="<?= $row['dns_address']; ?>"><?php echo $row['name_apps'] ?></td>
                        <?php elseif (empty($row['dns_address'])) : ?>
                            <td nowrap><?php echo $row['name_apps'] ?></td>
                        <?php endif; ?>


                        <td class="btn-modal" nowrap data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['application_id']; ?>">
                            <?= word_limiter($row['description'], 5) ?>

                        </td>
                        <?php
                        $app_id = $row['application_id'];
                        $roles = $this->Applicationmodel->getApplicationRoles($app_id);
                        ?>
                        <td nowrap>
                            <?php if ($roles) : ?>
                                <?php foreach ($roles as $a) : ?>
                                    <?php echo $a['pic_name']; ?><br>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <span class="badge text-bg-danger">PIC Empty!</span>
                            <?php endif; ?>
                        </td>

                        <td nowrap><?php echo $row['pic_dev']; ?></td>

                        <td nowrap><?php echo $row['pic_pmo'] ?></td>
                        <td nowrap><?php echo $row['pic_po'] ?></td>
                        <td nowrap><?php echo $row['version'] ?></td>
                        <td nowrap><?php echo $row['status'] ?></td>
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

    <?php foreach ($applikasi as $modal) : ?>

        <div class="modal fade" id="modalEdit<?= $modal['application_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Description</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= $modal['description']; ?>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</main>
<script src="<?= base_url('assets/js/alert.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#keyword").on("keyup", function() {

            var keyword = $(this).val();
            $.ajax({
                url: "<?php echo base_url('applicationn/search'); ?>",
                type: "POST",
                data: {
                    keyword: keyword
                },
                success: function(data) {
                    $("#results").html(data);
                }
            });
        });
    });
</script>