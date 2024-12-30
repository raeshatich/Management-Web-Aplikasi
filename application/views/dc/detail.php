<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <div class="card" style="width: 100%;">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Details DC</h1>

            </div>

            <div class="card-body">

                <div class="col">
                    <label for="col-auto">Name Application</label>
                    <input type="text" class="form-control" disabled value="<?= $applikasi['name_apps']; ?>" name="name_apps" id="name_apps">
                </div>
                <div class="">
                    <label for="">Description</label>
                    <input type="text" class="form-control" disabled value="<?= $applikasi['description']; ?>" name="description" id="description">
                </div>
                <div class="">
                    <label for="">DNS Address</label>
                    <a href="<?= $applikasi['dns_address']; ?>" disabled class="form-control dns" id="dns_address" name="dns_address"><?= $applikasi['dns_address']; ?></a>
                </div>



            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">DC
                    <a href="<?= base_url(); ?>archdc/add/<?= $applikasi['application_id']; ?>" class="btnaddapp">
                        <svg class="bi">
                            <use xlink:href="#add" />
                        </svg>
                    </a>
                </h2>
                <form role="search" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" name="lihat" id="lihat" autocomplete="off">
                    </div>
                </form>
            </div>
            <div id="flash" data-flash="<?php echo $this->session->flashdata('flash'); ?>"></div>

            <div class="card-body">
                <tbody>
                    <div class="table-responsive-xxl" id="results">
                        <table class="table table-bordered table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th colspan="2" class="text-center">Action</th>
                                    <th nowrap>Object Pin Name</th>
                                    <th nowrap>Object Pin X</th>
                                    <th nowrap>Object Pin Y</th>
                                    <th nowrap>Service Description</th>
                                    <th nowrap>Service Type</th>
                                    <th nowrap>IP APP</th>
                                    <th nowrap>IP WEB</th>
                                    <th nowrap>IP DB</th>
                                    <th nowrap>IP DMZ</th>
                                    <th>Webserver</th>
                                    <th>Database</th>
                                    <th>Framework</th>
                                    <th>API Method</th>
                                    <th>API Address</th>
                                    <th nowrap>Server Type</th>
                                    <th nowrap>Operation System</th>
                                    <th nowrap>Processor</th>
                                    <th nowrap>Created</th>

                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                foreach ($dc as $row) :
                                ?>
                                    <tr>
                                        <td><?= ++$page; ?></td>

                                        <td>
                                            <a class=" btnedit" href="<?= base_url(); ?>archdc/edit/<?= $row['architecture_id']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                        </td>
                                        <td>
                                            <a class=" btnhapus" id="btn-delete" href="<?= base_url(); ?>archdc/delete/<?= $row['architecture_id']; ?>">
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5' />
                                                </svg>
                                            </a>
                                        </td>
                                        <td nowrap><?php echo $row['object_pin_name'] ?></td>
                                        <td nowrap><?php echo $row['object_pin_x'] ?></td>
                                        <td nowrap><?php echo $row['object_pin_y'] ?></td>

                                        <td class="btn-modal" nowrap data-bs-toggle="modal" data-bs-target="#modalArch<?= $row['application_id']; ?>">
                                            <?= word_limiter($row['service_description'], 5) ?>
                                        </td>

                                        <td nowrap><?php echo $row['service_type'] ?></td>
                                        <td nowrap><?php echo $row['ip_appdc'] ?></td>
                                        <td nowrap><?php echo $row['ip_webdc'] ?></td>
                                        <td nowrap><?php echo $row['ip_dbdc'] ?></td>
                                        <td nowrap><?php echo $row['ip_dmzdc'] ?></td>
                                        <td nowrap><?php echo $row['webserver'] ?></td>
                                        <td nowrap><?php echo $row['database'] ?></td>
                                        <td nowrap><?php echo $row['framework'] ?></td>
                                        <td nowrap><?php echo $row['api_method'] ?></td>
                                        <td><?php echo $row['api_address'] ?></td>
                                        <td nowrap><?php echo $row['server_type'] ?></td>
                                        <td nowrap><?php echo $row['operation_system'] ?></td>
                                        <td nowrap><?php echo $row['processor'] ?></td>
                                        <td nowrap><?php echo $row['created'] ?></td>


                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </tbody>

            </div>

            <div class="row">
                <div class="col">
                    <?php echo $pagination;

                    ?>
                </div>
            </div>
        </div>

    </div>
    <?php foreach ($dc as $modal) : ?>

        <div class="modal fade" id="modalArch<?= $modal['application_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Description</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= $modal['service_description']; ?>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>



</main>
</body>

</html>
<script src="<?= base_url('assets/js/alert.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#lihat").on("keyup", function() {

            var lihat = $(this).val();
            $.ajax({
                url: "<?php echo base_url('archdc/search/' . $row['apps_id']); ?>",
                type: "POST",
                data: {
                    lihat: lihat
                },
                success: function(data) {
                    $("#results").html(data);
                }
            });
        });
    });
</script>