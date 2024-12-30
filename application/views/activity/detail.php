<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div id="flash" data-flash="<?php echo $this->session->flashdata('flash'); ?>"></div>

    <div class="card-body mt-3">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <?= form_open('activity/detail/' . $filter['id_user']); ?>

                <div class="flex-container">
                    <div class="flex-item-left">
                        <label style="font-size: .8rem;">Tanggal activity :</label>
                        <input id="start" class=" form-control" type="date" name="start">
                    </div>
                    <div class="flex-item-left">
                        <label style="font-size: .8rem;">s/d</label>
                        <input type="date" name="end" class="form-control" id="end">

                    </div>

                </div>

                <div class="filter_btn mt-3">
                    <button type="submit" name="submit" id="submit" class="btnfilter">Filter</button>
                    <a href="  <?php echo base_url('activity/detail/' . $filter['id_user']); ?>" class="btnfilter" type="button">Reset Filter</a>

                    <div class="dropdown">
                        <button class="dropbtn1">Export</button>
                        <div class="dropdown-content">
                            <a class="nav-link d-flex align-items-center gap-2" href="<?php echo base_url('activity/export/' . $filter['id_user']); ?>">
                                Excel
                                <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
                <?= form_close(); ?>

            </div>

            <div class="col-sm-12 col-md-6">
                <form action="<?php echo base_url('activity/detail/' . $filter['id_user']); ?>" method="post" id="filter-form">
                    <label style="font-size: .8rem;">Status Activity :</label>
                    <div class="option">
                        <select class="form-control" style="font-size: .8rem;" style="width: 100%;" aria-label="Default select example" name="status" id="status" onchange="this.form.submit()">
                            <option selected>Pilih Status Activity</option>
                            <option value="In Review">In Review</option>
                            <option value="Unit Test">Unit Test</option>
                            <option value="Development">Development</option>
                            <option value="SIT">SIT</option>
                            <option value="UIT">UIT</option>
                            <option value="RCB">RCB</option>
                            <option value="PTR">PTR</option>
                            <option value="Live">Live</option>
                        </select>
                    </div>
                </form>


            </div>

        </div>

    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h2 class="h2">Activity
                    <a href="<?= base_url(); ?>activity/add/<?= $filter['id_user']; ?>" class="btnaddapp">
                        <svg class="bi">
                            <use xlink:href="#add" />
                        </svg>

                    </a>
                </h2>
                <form role="search" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" name="find" id="find" autocomplete="off">
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
                                    <th>No</th>
                                    <th colspan="2" class="text-center">Action</th>
                                    <th nowrap>Name Activity</th>
                                    <th nowrap>Name Application</th>
                                    <th nowrap>Detail Activity</th>
                                    <th nowrap>Status Activity</th>
                                    <th nowrap>PIC Activity</th>
                                    <th nowrap>Activity Date</th>
                                    <th nowrap>User Created</th>
                                    <th nowrap>Created Date</th>

                                    <?= $pagination; ?>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $application_id = 1;

                                foreach ($activity as $row) :
                                ?>
                                    <tr>

                                        <td><?= $application_id++; ?></td>

                                        <td>
                                            <a class="btnedit" href="<?= base_url(); ?>activity/edit/<?= $row['id_activity']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                </svg>
                                        </td>
                                        <td>
                                            <a class=" btnhapus" id="btn-delete" href="<?= base_url(); ?>activity/hapus/<?= $row['id_activity']; ?>">
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5' />
                                                </svg>
                                            </a>
                                        </td>

                                        <td nowrap><?php echo $row['name_activity'] ?></td>
                                        <td nowrap><?php echo $row['name_apps'] ?></td>
                                        <td class="btn-modal" nowrap data-bs-toggle="modal" data-bs-target="#modal-detail<?= $row['id_activity']; ?>">
                                            <?= word_limiter($row['detail'], 5) ?>

                                        </td>
                                        <td class="text-center"><?php echo $row['status_activity'] ?></td>
                                        <td nowrap><?php echo $row['pic_name'] ?></td>
                                        <td nowrap><?php echo $row['date_activity'] ?></td>
                                        <td nowrap><?php echo $row['user_created'] ?></td>
                                        <td nowrap><?php echo $row['created'] ?></td>
                                    </tr>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <?php if (empty($activity)) : ?>
                            <p class="mt-3 text-danger">Data Kosong</p>
                        <?php endif; ?>
                        <?= form_close(); ?>
                    </div>
                </tbody>
            </div>

        </div>
    </div>

    <?php foreach ($activity as $modal) : ?>

        <div class="modal fade" id="modal-detail<?= $modal['id_activity']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Description</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= $modal['detail']; ?>
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
<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/js/alert.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#find').keyup(function() {
            var find = $(this).val();
            $.ajax({
                url: "<?php echo site_url('activity/search/' . $row['id_role']); ?>",
                type: 'post',
                data: {
                    find: find
                },
                success: function(response) {
                    $('#results').html(response);
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var statusInput = document.getElementById('status');

        function sendFilterRequest() {
            var status = statusInput.value;
            var filterUrl = '<?php echo base_url('activity/filter/' . $filter['id_user']); ?>?status=' + status;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('data-container').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', filterUrl, true);
            xhr.send();
        }
        statusInput.addEventListener('change', sendFilterRequest);
    })
</script>