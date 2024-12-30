<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">PIC ASP</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

            <button class="btnadd" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                </svg>
                Tambah
            </button>

        </div>
    </div>
    <?= form_open('role/create'); ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah PIC ASP</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <!-- <div class="col">
                                <label for="">ID</label>
                                <input type="text" class="form-control"  name="id_role" id="id_role">
                            </div> -->
                            <div class="col">
                                <label for="">Nama PIC</label>
                                <input type="text" class="form-control" name="name_pic" id="name_pic">
                            </div>
                        </div>

                        <div class=" btngrid d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url(); ?>applikasi/index1" class="btncancel me-md-2 mb-2">Cancel</a>
                            <button class="btnsave btn me-md-2 mb-2 " name="submit" id="submit" type="submit">Save</button>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" name="submit" id="submit" type="submit">Save</button>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama PIC </th>
                    <th colspan="2">Action</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($role as $role) : ?>

                    <tr>
                        <td><?php echo $role['id_role'] ?></td>
                        <td><?php echo $role['name_pic'] ?></td>

                        <td>
                            <!-- <a class=" btnedit" href="<?= base_url(); ?>architecture/edit/<?= $row['architecture_id']; ?>"> -->
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z' />
                            </svg>
                        </td>
                        <td>
                            <a class=" btnhapus" onclick="return confirm('yakin?');" href="<?= base_url(); ?>role/hapus/<?= $role['id_role']; ?>">
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5' />
                            </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</main>