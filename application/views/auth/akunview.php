<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User
            <a href="<?= base_url(); ?>auth/registration">
                <svg class="bi">
                    <use xlink:href="#add" />
                </svg>

            </a>
        </h1>

    </div>
    <div id="flash" data-flash="<?php echo $this->session->flashdata('flash'); ?>"></div>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive small">
        <table class="table table-bordered table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Username </th>
                    <th class="text-center">Nama PIC </th>
                    <th class="text-center">Role </th>
                    <th colspan="2" class="text-center">Action</th>

                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php
                $b = 1;
                foreach ($role as $a) : ?>

                    <tr>
                        <td class="text-center"><?= $b++; ?></td>

                        <td><?php echo $a['name'] ?></td>
                        <td><?php echo $a['pic_name'] ?></td>
                        <td class="text-center"><?php echo $a['role_id'] ?></td>
                        <td class="text-center">
                            <a href="" class="btnhapus" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $a['id_user']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                        </td>
                        <td class="text-center">
                            <a class="btnhapus" id="btn-delete" href="<?= base_url(); ?>auth/hapus/<?= $a['id_user']; ?>">
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
    <!-- Modal -->
    <?php foreach ($role as $a) : ?>


        <div class="modal fade" id="modalEdit<?= $a['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('auth/update/' . $a['id_user']); ?>" method="post">
                            <div class="form-group">
                                <!-- <label for="nama">ID User</label> -->
                                <input type="text" hidden class="form-control" id="id_user" name="id_user" value="<?php echo $a['id_user']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="updateapp">Name: <span class="spanapp">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $a['name']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="updateapp">PIC Name: <span class="spanapp">*</span></label>
                                <input type="text" class="form-control" id="pic_name" name="pic_name" value="<?php echo $a['pic_name']; ?>">
                            </div>
                            <div class="form-group  col">
                                <label class="updateapp">Role: <span class="spanapp">*</span></label>
                                <select id="role_id" name="role_id" class="form-select form-select-sm" aria-label="Small select example" value="<?php echo $a['role_id']; ?>">
                                    <option selected><?= $a['role_id']; ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group  col">
                                <label class="updateapp">Active: <span class="spanapp">*</span></label>
                                <select id="is_active" name="is_active" class="form-select form-select-sm" aria-label="Small select example" value="<?php echo $a['role_id']; ?>">
                                    <option selected><?= $a['is_active']; ?></option>
                                    <option value="1">Active</option>
                                    <option value="0">Non-Active</option>
                                </select>
                            </div>

                            <hr>

                            <span>Ganti password?</span>
                            <button type="button" class="btnbase btn-sm" data-bs-toggle="modal" data-bs-target="#modalPassword<?= $a['id_user']; ?>">
                                Klik Here!
                            </button>

                            <div class="modal-footer mt-2">
                                <button type="submit" class="btnbase  btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>

    <!-- Button trigger modal -->

    <?php foreach ($role as $a) : ?>

        <!-- Modal -->
        <div class="modal fade" id="modalPassword<?= $a['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo base_url('auth/updatePassword/' . $a['id_user']); ?>" method="post">
                            <div class="form-group">
                                <label class="updateapp">Password baru:<span class="spanapp">*</span></label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label class="updateapp">Konfirmasi password:<span class="spanapp">*</span></label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                            <div class="form-group">
                                <!-- <label for="nama">ID User</label> -->
                                <input type="text" hidden class="form-control" id="id_user" name="id_user" value="<?php echo $a['id_user']; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btnbase btn-sm">Update Password</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

</main>

<script>
    var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: flash
        })

    }
    $(document).on('click', '#btn-delete', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Data akan dihapus",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "green",
            cancelButtonColor: "#d33",
            confirmButtonText: "Hapus data ini!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;

            }
        });
    })
</script>