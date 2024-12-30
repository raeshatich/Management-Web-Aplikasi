<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h3 class="h2">Edit DC</h3>

        </div>

        <?= form_open('archdc/update/' . $dc['architecture_id']); ?>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>


            <form method="post" action="" class="row gy-2 gx-3 align-items-center">

                <div class="row">
                    <div class="form-group col">
                        <label class="updateapp">Object Pin Name: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="object_pin_name" name="object_pin_name" value="<?= $dc['object_pin_name']; ?>">
                    </div>
                    <div class="col ">
                        <label class="updateapp">Object Pin X: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="object_pin_x" name="object_pin_x" value="<?= $dc['object_pin_x']; ?>">
                    </div>
                    <div class="col ">
                        <label class="updateapp">Object Pin Y: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="object_pin_y" name="object_pin_y" value="<?= $dc['object_pin_y']; ?>">
                    </div>
                    <div class="">
                        <label class="updateapp">Service Description: <span class="spanapp">*</span></label>
                        <textarea class="form-control" type="text" id="service_description" name="service_description" rows="3"><?= $dc['service_description']; ?>
                        </textarea>
                    </div>
                    <div class="col">
                        <label class="updateapp">Service Type: <span class="spanapp">*</span></label>
                        <select name="service_type" class="form-select" aria-label="Default select example" value="">
                            <option selected><?= $dc['service_type']; ?></option>

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
                        <textarea class="form-control" type="text" id="ip_appdc" rows="3" name="ip_appdc" value="<?= $dc['ip_appdc']; ?>"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="updateapp">IP WEB: <span class="spanapp">*</span></label>
                        <textarea class="form-control" id="ip_webdc" rows="3" name="ip_webdc" value="<?= $dc['ip_webdc']; ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="updateapp">IP DB: <span class="spanapp">*</span></label>
                        <textarea class="form-control" id="ip_dbdc" name="ip_dbdc" rows="3" value="<?= $dc['ip_dbdc']; ?>"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="updateapp">IP DMZ: <span class="spanapp">*</span></label>
                        <textarea class="form-control" id="ip_dmzdc" name="ip_dmzdc" rows="3" value="<?= $dc['ip_dmzdc']; ?>"></textarea>
                    </div>
                    <div class=" form-group">
                        <label class="updateapp">Webserver: <span class="spanapp">*</span></label>
                        <input class="form-control" id="webserver" name="webserver" value="<?= $dc['webserver']; ?>">
                    </div>
                    <div class="form-group ">
                        <label class="updateapp">Database: <span class="spanapp">*</span></label>
                        <input class="form-control" id="database" name="database" value="<?= $dc['database']; ?>">
                    </div>
                    <div class="form-group ">
                        <label class="updateapp">Framework: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="framework" name="framework" rows="3" value="<?= $dc['framework']; ?>">
                    </div>

                    <div class="form-group ">
                        <label class="updateapp">API Address: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="api_address" name="api_address" rows="3" value="<?= $dc['api_address']; ?>">
                    </div>
                    <div class="col ">
                        <label class="updateapp">API Method: <span class="spanapp">*</span></label>
                        <select name="api_method" class="form-select" aria-label="Default select example" value="<?= $dc['api_method']; ?>">
                            <option selected><?= $dc['api_method']; ?></option>
                            <option value="SOAP">SOAP</option>
                            <option value="REST">REST</option>
                            <option value="ISO">ISO</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="updateapp">Server Type: <span class="spanapp">*</span></label>
                        <select name="server_type" class="form-select" aria-label="Default select example" value="<?= $dc['server_type']; ?>">
                            <option selected><?= $dc['server_type']; ?></option>
                            <option value="Virtual Server">Virtual Server</option>
                            <option value="Physical Server">Physical Server</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label class="updateapp">Operation System: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="operation_system" name="operation_system" value="<?= $dc['operation_system']; ?>">
                    </div>
                    <div class="form-group col">
                        <label class="updateapp">Processor: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="processor" name="processor" value="<?= $dc['processor']; ?>">
                    </div>
                    <div class="form-group ">
                        <input class="form-control" type="hidden" id="apps_id" name="apps_id" value="<?= $dc['apps_id']; ?>">
                    </div>

                    <div class="form-group col-auto">
                        <input class="form-control" type="hidden" readonly id="created" name="created" value="<?php echo date("Y-m-d"); ?>">
                    </div>

                </div>

                <div class="btngrid d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url(); ?>archdc/detail/<?= $dc['apps_id']; ?>" class="btncancel  mb-2">Cancel</a>

                    <button class="btnbase btn me-md-2 mb-2 d-md-flex justify-content-md-center" name="submit" id="submit" type="submit">Update</button>
                </div>
            </form>
            <?= form_close(); ?>
        </div>
    </div>
</main>