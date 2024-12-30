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

                <!-- <?= $pagination; ?> -->
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $application_id = 1;

            foreach ($activity as $row) :
                if ($row['id_role'] == $id_role) {
            ?>
                    <tr>

                        <td><?= $application_id++; ?></td>

                        <td>
                            <a class=" btnedit" href="<?= base_url(); ?>activity/edit/<?= $row['id_activity']; ?>">
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

            <?php }
            endforeach; ?>
        </tbody>

    </table>
    <div class="group">

        <?php if (empty($activity)) : ?>
            <p class="mt-3 text-danger">Data Kosong</p>
        <?php endif; ?>
        <?= form_close(); ?>

    </div>