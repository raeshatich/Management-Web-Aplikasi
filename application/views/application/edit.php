<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">

    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Update Application</h3>
        </div>

        <div class="card-body">

            <div id="flash" data-flash="<?php echo $this->session->flashdata('flash'); ?>"></div>

            <form method="post" action="<?= base_url('applications/update/') . $applikasi['application_id'] ?>" enctype="multipart/form-data" class="row gy-2 gx-3 align-items-center">


                <div class="row">
                    <div class="form-group col-auto">
                        <label class="updateapp">Department</label>
                        <input class="form-control" type="text" readonly id="departement" name="departement" value="<?= $applikasi['departement']; ?>">
                    </div>

                    <div class=" form-group col">
                        <label class="updateapp">Category: <span class="spanapp">*</span></label>

                        <select name="category" class="form-select" aria-label="Default select example" value="<?= $applikasi['category']; ?>">
                            <option selected><?= $applikasi['category']; ?></option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label class="updateapp">Critical: <span class="spanapp">*</span>
                        </label>

                        <select name="critical" class="form-select" aria-label="Default select example">
                            <option selected><?= $applikasi['critical']; ?></option>
                            <option value="Very Critical">Very Critical</option>
                            <option value="Critical">Critical</option>
                            <option value="Moderate">Moderate</option>
                            <option value="Non Critical">Non Critical</option>
                        </select>
                        <?= form_error('critical', '<small class="text-danger">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label class="updateapp">Name: <span class="spanapp">*</span></label>

                        <input class="form-control" type="text" id="name_apps" name="name_apps" value="<?= $applikasi['name_apps']; ?>">
                        <?= form_error('name_apps', '<small class="text-danger">', '</small>'); ?>

                    </div>

                    <div class="form-group">
                        <label class="updateapp">Description: <span class="spanapp">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= $applikasi['description']; ?></textarea>
                        <?= form_error('description', '<small class="text-danger">', '</small>'); ?>

                    </div>
                    <div class="form-group">
                        <label class="updateapp">DNS Address</label>
                        <textarea class="form-control" id="dns_address" name="dns_address" rows="3"><?= $applikasi['dns_address']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="updateapp">Version</label>
                        <textarea class="form-control" id="version" name="version" rows="3"><?= $applikasi['version']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="updateapp">PIC ASP: <span class="spanapp">*</span></label>

                        <select class="form-select" id="pic" aria-label="Default select example" name="id_pic[]" multiple>
                            <?php foreach ($pic as $a) : ?>
                                <option selected value="<?php echo $a['id_user']; ?>"><?php echo $a['pic_name']; ?></option>
                            <?php endforeach; ?>
                            <?php foreach ($all as $a) : ?>
                                <option value="<?php echo $a['id_user']; ?>"><?php echo $a['pic_name']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="updateapp">PIC DEV: </label>
                        <input class="form-control" type="text" id="pic_dev" name="pic_dev" value="<?= $applikasi['pic_dev']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="updateapp">PIC PMO:</label>
                        <input class="form-control" type="text" id="pic_pmo" name="pic_pmo" value="<?= $applikasi['pic_pmo']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="updateapp">PIC PO:</label>
                        <input class="form-control" type="text" id="pic_po" name="pic_po" value="<?= $applikasi['pic_po']; ?>">
                    </div>

                    <div class="form-group col-auto">
                        <label class="updateapp">Status: <span class="spanapp">*</span></label>

                        <select name="status" class="form-select" aria-label="Default select example">
                            <option selected><?= $applikasi['status']; ?></option>
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
                        <label for="">Architecture:</label>
                        <?php foreach ($img as $a) : ?>
                            <input type="hidden" class="form-control" id="old_prod_avatar" name="old_prod_avatar" value="<?= $a['name_img']; ?>">
                        <?php endforeach; ?>
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">

                        <div class="form-group ">
                            <label for="">Preview:</label><br>
                            <img width="100%" id="gambar_load">
                        </div>
                    </div>

                    <div class="form-group col">
                        <label class="updateapp">Pin Frame:</label>
                        <button type="button" class="btnbase" data-bs-toggle="modal" data-bs-target="#detailModal">
                            Input
                        </button>
                    </div>
                    <td nowrap class="mb-5">
                        <?php foreach ($img as $a) :
                            if ($a["flag_show"]  == 1) : ?>
                                <img src="<?= site_url('upload/avatar/' . $a["name_img"]); ?>" width="50%" alt="">
                        <?php endif;
                        endforeach; ?>
                    </td>

                    <div class="form-group col-auto">
                        <input class="form-control" type="hidden" id="team" name="team" value="<?= $applikasi['team']; ?>">
                    </div>
                    <div class="form-group col-auto">
                        <input class="form-control" type="hidden" id="flag_show" name="flag_show" value="0">
                    </div>
                    <div class=" form-group">
                        <input class="form-control" type="hidden" id="application_id" name="application_id" value="<?= $applikasi['application_id']; ?>" readonly>
                    </div>
                    <div class=" form-group">
                        <input class="form-control" type="hidden" id="id_apps" name="id_apps" value="<?= $image['application_id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" id="created" name="created" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                </div>
                <hr>
                <div class="btngrid d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url(); ?>applications" class="btncancel  mb-2">Cancel</a>
                    <button class="btnsave" name="submit" id="submit" type="submit">Update</button>
                </div>


                <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Application</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="id" class="updateapp">Height Screen:</label>
                                    <input class="form-control" type="text" id="height_screen" name="height_screen" value="<?= $applikasi['height_screen']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id" class="updateapp">Width Screen:</label>
                                    <input class="form-control" type="text" id="width_screen" name="width_screen" value="<?= $applikasi['width_screen']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="id" class="updateapp">Pin Frame:</label>
                                    <input class="form-control" type="text" id="pin_frame" name="pin_frame" value="<?= $applikasi['pin_frame']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btnbase">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</main>

<script src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/select2.min.js') ?>"></script>
<link rel="stylesheet" href="<?= base_url('assets/dist/css/select2.min.css') ?>">
<script src="<?= base_url('assets/js/alert.js') ?>"></script>
<script src="<?= base_url('assets/js/alertFile.js') ?>"></script>
<script src="<?= base_url('assets/js/previewImg.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#pic').select2({
            placeholder: 'Pilih ASP',
            allowClear: true,
        });
    });
</script>


<script>
    $("#slick").ddslick({
        width: "100%",
        imagePosition: "left",
        onSelected: function(data) {
            $("#selected").html(data.selectedData.value);
        }
    })
</script>