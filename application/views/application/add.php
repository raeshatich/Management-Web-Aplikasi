<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h2 class="h2">Add Application</h2>

    </div>
    <div class="card-body">
        <form method="post" action="" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center mt-2">

            <div class="form-group col">
                <label for="dept" class="updateapp">Department</label>
                <input class="form-control" type="text" id="departement" readonly name="departement" value="WHA">
            </div>
            <div class="form-group col">
                <label class="updateapp">Category: <span class="spanapp">*</span></label>

                <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Category</option>
                    <option value="Internal">Internal</option>
                    <option value="External">External</option>
                </select>
            </div>
            <div class="form-group col">
                <label class="updateapp">Critical: <span class="spanapp">*</span></label>

                <select name="critical" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Value</option>

                    <option value="Very Critical">Very Critical</option>
                    <option value="Critical">Critical</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Non Critical">Non Critical</option>
                </select>
                <?= form_error('critical', '<small class="text-danger">', '</small>'); ?>

            </div>

            <div class="form-group">
                <label class="updateapp">Name: <span class="spanapp">*</span></label>

                <input class="form-control" type="text" id="name_apps" name="name_apps">
                <?= form_error('name_apps', '<small class="text-danger">', '</small>'); ?>

            </div>

            <div class="form-group">
                <label class="updateapp">Description: <span class="spanapp">*</span></label>

                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col">
                <label for="dns" class="updateapp">DNS Address:</label>
                <input class="form-control" id="dns_address" name="dns_address" rows="3"></input>
            </div>
            <div class="form-group">
                <label class="updateapp">Version</label>
                <textarea class="form-control" id="version" name="version" rows="3"></textarea>
            </div>

            <div class="form-group">
                <div class="col-sm-6">
                    <label class="updateapp">PIC ASP: <span class="spanapp">*</span></label>
                    <select name="role_id[]" id="pic" class="form-control" multiple size="3">
                        <option>Pilih PIC</option>
                        <?php foreach ($pic as $row) : ?>
                            <option value="<?php echo $row['id_user']; ?>"><?php echo $row['pic_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="id" class="updateapp">PIC DEV:</label>
                <input class="form-control" type="text" id="pic_dev" name="pic_dev" rows="3">
            </div>
            <div class="form-group">
                <label for="id" class="updateapp">PIC PMO:</label>
                <input class="form-control" type="text" id="pic_pmo" name="pic_pmo" rows="3">
            </div>
            <div class="form-group">
                <label for="id" class="updateapp">PIC PO:</label>
                <input class="form-control" type="text" id="pic_po" name="pic_po" rows="3">
            </div>
            <div class="form-group col-auto">
                <label class="updateapp">Status: <span class="spanapp">*</span></label>

                <select name="status" class="form-select" aria-label="Default select example">
                    <option selected>Pilih Status</option>
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
                </select>
                <?= form_error('status', '<small class="text-danger">', '</small>'); ?>

            </div>
            <div class="form-group col">
                <label for="">Upload File:</label>
                <small><span class="text-danger">*.pptx only</span></small>
                <input type="file" class="form-control" id="file" name="file" onchange="return validasiEkstensi()">

            </div>
            <div class="form-group col">
                <label class="form-group" for="">Upload Arsitektur:</label>
                <small><span class="text-danger">*img only</span></small>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" size="90">
            </div>
            <div class="form-group col">
                <label class="updateapp">Pin Frame:</label>

                <button type="button" class="btnbase" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Input
                </button>
            </div>
            <div class="form-group ">
                <label for="">Preview:</label><br>
                <img src="" width="100%" id="gambar_load">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" id="created" name="created" value="<?= date("Y-m-d"); ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" id="team" name="team" value="W">
            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" id="flag_show" name="flag_show" value="1">
            </div>

            <hr>
            <div class="btngrid d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url(); ?>applicationn" class="btncancel  mb-2">Cancel</a>
                <button class="btnsave" name="submit" id="submit" type="submit">Save</button>

            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Application</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="id" class="updateapp">Height Screen:</label>
                                <input class="form-control" type="text" id="height_screen" name="height_screen">
                            </div>
                            <div class="form-group">
                                <label for="id" class="updateapp">Width Screen:</label>
                                <input class="form-control" type="text" id="width_screen" name="width_screen">
                            </div>
                            <div class="form-group">
                                <label for="id" class="updateapp">Pin Frame:</label>
                                <input class="form-control" type="text" id="pin_frame" name="pin_frame">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>     -->
                            <button type="submit" class="btnbase">Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

</main>

<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/select2.min.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/dist/css/select2.min.css') ?>">
<script src="<?= base_url('assets/js/alertFile.js') ?>"></script>
<script src="<?= base_url('assets/js/alert.js') ?>"></script>
<script src="<?= base_url('assets/js/previewImg.js') ?>"></script>



<script>
    $(document).ready(function() {
        $('#pic').select2({
            placeholder: 'Pilih ASP',
            allowClear: true,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var html = '<div id="row' + i + '" class="mt-3 mb-9"><div class="form-group"><label class="updateapp">Input IP DRC: </label><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#drc-ip">DRC</button></div><div class="modal fade" id="drc-ip" tabindex="-1" aria-labelledby="drc-ip" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">Input IP DRC</h1><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><form method="post"><button type="button" name="remove" id="' + i + '" value=" remove" class="btnclose d-md-flex justify-content-md-end remove mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" /></svg>        <div class="row"><div class="form-group"><label class="updateapp">IP App:</label><input class="form-control" type="text" id="name_apps" name="name_apps"> </div></div></form></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button><button type="button" class="btn btn-primary">Save changes</button></div></div></div></div></div>';

        var i = 0;
        $("#add").click(function() {
            i++;
            $("#table_field").append(html);
        });

        $(document).on('click', '.remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>