<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <?= form_open('archdrc/create'); ?>
    <div id="table_field" class="mt-1 mb-9">

        <div class="card">
            <div class="card-header">
                Add IP DRC
                <a class="btnaddapp" type="button" name="add" id="add">
                    <svg class="bi">
                        <use xlink:href="#add" />
                    </svg>
                </a>
            </div>

            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <form method="post">
                    <div class="row">

                        <div class="form-group col-auto">
                            <label class="updateapp">Object Pin Name: <span class="spanapp">*</span></label>
                            <input class="form-control" type="text" id="object_pin_name" name="object_pin_name[]">
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Object Pin X: <span class="spanapp">*</span></label>
                            <input class="form-control" type="text" id="object_pin_x" name="object_pin_x[]">
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Object Pin Y: <span class="spanapp">*</span></label>
                            <input class="form-control" type="text" id="object_pin_y" name="object_pin_y[]">
                        </div>
                        <div class="form-group">
                            <label class="updateapp">Service Description: <span class="spanapp">*</span></label>
                            <textarea class="form-control" rows="3" type="text" id="service_description" name="service_description[]"></textarea>
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Service Type: <span class="spanapp">*</span></label>
                            <select name="service_type[]" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Service Type</option>
                                <option value="Middleware">Middleware</option>
                                <option value="Application Server">Application Server</option>
                                <option value="Database Server">Database Server</option>
                                <option value="T24 Webservice">T24 Webservice</option>
                                <option value="SFTP">SFTP</option>
                                <option value="Load Balancer">Load Balancer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="updateapp">IP APP: <span class="spanapp">*</span></label>
                            <textarea class="form-control" rows="3" type="text" id="ip_appdrc" name="ip_appdrc[]"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="updateapp">Webserver: <span class="spanapp">*</span></label>
                            <input class="form-control" id="webserver" name="webserver[]"></input>
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Database: <span class="spanapp">*</span></label>
                            <input class="form-control" id="database" name="database[]"></input>
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Framework: <span class="spanapp">*</span></label>
                            <input class="form-control" type="text" id="framework" name="framework[]">
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">API Method: <span class="spanapp">*</span></label>
                            <select name="api_method[]" class="form-select" aria-label="Default select example">
                                <option selected>Pilih API Method</option>
                                <option value="SOAP">SOAP</option>
                                <option value="REST">REST</option>
                                <option value="ISO">ISO</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="updateapp">API Address: <span class="spanapp">*</span></label>
                            <input class="form-control" type="text" id="api_address" name="api_address[]"></input>
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Server Type: <span class="spanapp">*</span></label>
                            <select name="server_type[]" class="form-select" aria-label="Default select example">
                                <option selected>Pilih API Method</option>
                                <option value="Virtual Machine">Virtual Machine</option>
                                <option value="Virtual Server">Virtual Server</option>
                                <option value="Physical Server">Physical Server</option>
                            </select>
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Operation System: <span class="spanapp">*</span></label>
                            <input class="form-control" type="text" id="operation_system" name="operation_system[]">
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Processor: <span class="spanapp">*</span></label>
                            <input class="form-control" type="text" id="processor" name="processor[]">
                        </div>
                        <div class="form-group col-auto">
                            <label class="updateapp">Created</label>
                            <input class="form-control" type="text" readonly id="created" name="created[]" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="form-group ">
                            <input class="form-control" type="hidden" id="apps_id" name="apps_id[]" value=" <?= $applikasi['application_id']; ?>">
                        </div>
                        <div class="form-group ">
                            <input class="form-control" type="hidden" id="architecture_id" name="architecture_id[]">
                        </div>

                    </div>

            </div>

        </div>
    </div>
    <div class=" btngrid d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="<?= base_url(); ?>architecture/archdrc/detail/<?= $applikasi['application_id']; ?>" class="btncancelarch me-md-2 mb-2">Cancel</a>
        <button class="btnsavearch me-md-2 mb-2 d-md-flex justify-content-md-center" name="submit" id="submit" value="Simpan" type="submit">Save</button>
    </div>
    <?php echo form_close(); ?>
    </form>


</main>

<script type="text/javascript">
    $(document).ready(function() {
        var html = '<div id="row' + i + '" class="mt-3 mb-9"><div class=" card"><div class="card-header d-md-flex justify-content-md-end"><button type="button" name="remove" id="' + i + '" value=" remove" class="btnclose d-md-flex justify-content-md-end remove mt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" /></svg></div><div class="card-body"><?php if (validation_errors()) : ?><div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div><?php endif; ?><div class="row"><div class="form-group col-auto"><label class="updateapp">Object Pin Name: <span class="spanapp">*</span></label><input class="form-control" type="text" id="object_pin_name" name="object_pin_name[]"></div><div class="form-group col-auto"><label class="updateapp">Object Pin X: <span class="spanapp">*</span></label><input class="form-control" type="text" id="object_pin_x" name="object_pin_x[]"></div><div class="form-group col-auto"><label class="updateapp">Object Pin Y: <span class="spanapp">*</span></label><input class="form-control" type="text" id="object_pin_y" name="object_pin_y[]"></div><div class="form-group"><label class="updateapp">Service Description: <span class="spanapp">*</span></label><textarea class="form-control" rows="3" type="text" id="service_description" name="service_description[]"></textarea></div><div class="form-group col-auto"><label class="updateapp">Service Type: <span class="spanapp">*</span></label><select name="service_type[]" class="form-select" aria-label="Default select example"><option selected>Pilih Service Type</option><option value="Middleware">Middleware</option><option value="Application Server">Application Server</option><option value="Database Server">Database Server</option><option value="T24 Webservice">T24 Webservice</option><option value="SFTP">SFTP</option><option value="Load Balancer">Load Balancer</option></select></div><div class="form-group"><label class="updateapp">IP APP: <span class="spanapp">*</span></label><textarea class="form-control" rows="3" type="text" id="ip_appdrc" name="ip_appdrc[]"></textarea></div><div class="form-group"><label class="updateapp">Webserver: <span class="spanapp">*</span></label><input class="form-control" id="webserver" name="webserver[]"></input></div><div class="form-group col-auto"><label class="updateapp">Database: <span class="spanapp">*</span></label><input class="form-control" id="database" name="database[]"></input></div><div class="form-group col-auto"><label class="updateapp">Framework: <span class="spanapp">*</span></label><input class="form-control" type="text" id="framework" name="framework[]"></div><div class="form-group col-auto"><label class="updateapp">API Method: <span class="spanapp">*</span></label><select name="api_method[]" class="form-select" aria-label="Default select example"><option selected>Pilih API Method</option><option value="SOAP">SOAP</option><option value="REST">REST</option><option value="ISO">ISO</option></select></div><div class="form-group"><label class="updateapp">API Address: <span class="spanapp">*</span></label><input class="form-control" type="text" id="api_address" name="api_address[]"></input></div><div class="form-group col-auto"><label class="updateapp">Server Type: <span class="spanapp">*</span></label><select name="server_type[]" class="form-select" aria-label="Default select example"><option selected>Pilih API Method</option><option value="Virtual Machine">Virtual Machine</option><option value="Virtual Server">Virtual Server</option><option value="Physical Server">Physical Server</option></select></div><div class="form-group col-auto"><label class="updateapp">Operation System: <span class="spanapp">*</span></label><input class="form-control" type="text" id="operation_system" name="operation_system[]"></div><div class="form-group col-auto"><label class="updateapp">Processor: <span class="spanapp">*</span></label><input class="form-control" type="text" id="processor" name="processor[]"></div><div class="form-group col-auto"><label class="updateapp">Created</label><input class="form-control" type="text" readonly id="created" name="created[]" value="<?php echo date("Y-m-d"); ?>"></div><div class="form-group "><input class="form-control" type="hidden" id="apps_id" name="apps_id[]" value=" <?= $applikasi['application_id']; ?>"></div><div class="form-group "><input class="form-control" type="hidden" id="architecture_id" name="architecture_id[]"></div></div></div></div></div>';

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
<script src="<?= base_url('assets/js/alert.js') ?>"></script>