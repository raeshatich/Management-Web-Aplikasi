<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">

    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Update Architecture</h3>

        </div>
        <?= form_open('archdrc/update/' . $drc['architecture_id']); ?>
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
                        <input class="form-control" type="text" id="object_pin_name" name="object_pin_name" value="<?= $drc['object_pin_name']; ?>">
                    </div>
                    <div class="col ">
                        <label class="updateapp">Object Pin X: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="object_pin_x" name="object_pin_x" value="<?= $drc['object_pin_x']; ?>">
                    </div>
                    <div class="col ">
                        <label class="updateapp">Object Pin Y: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="object_pin_y" name="object_pin_y" value="<?= $drc['object_pin_y']; ?>">
                    </div>
                    <div class="">
                        <label class="updateapp">Service Description: <span class="spanapp">*</span></label>
                        <textarea class="form-control" type="text" id="service_description" name="service_description" rows="3"><?= $drc['service_description']; ?>
                        </textarea>
                    </div>
                    <div class="col">
                        <label class="updateapp">Service Type: <span class="spanapp">*</span></label>
                        <select name="service_type" class="form-select" aria-label="Default select example" value="">
                            <option selected><?= $drc['service_type']; ?></option>

                            <option value="Middleware">Middleware</option>
                            <option value="Application Server">Application Server</option>
                            <option value="Database Server">Database Server</option>
                            <option value="T24 Webservice">T24 Webservice</option>
                            <option value="SFTP">SFTP</option>
                            <option value="Load Balancer">Load Balancer</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="updateapp">IP APP: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="ip_appdrc" name="ip_appdrc" value="<?= $drc['ip_appdrc']; ?>">
                    </div>
                    <div class=" form-group">
                        <label class="updateapp">Webserver: <span class="spanapp">*</span></label>
                        <input class="form-control" id="webserver" name="webserver" value="<?= $drc['webserver']; ?>">
                    </div>
                    <div class="form-group ">
                        <label class="updateapp">Database: <span class="spanapp">*</span></label>
                        <input class="form-control" id="database" name="database" value="<?= $drc['database']; ?>">
                    </div>
                    <div class="form-group ">
                        <label class="updateapp">Framework: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="framework" name="framework" rows="3" value="<?= $drc['framework']; ?>">
                    </div>
                    <div class="col ">
                        <label class="updateapp">API Method: <span class="spanapp">*</span></label>
                        <select name="api_method" class="form-select" aria-label="Default select example" value="<?= $drc['api_method']; ?>">
                            <option selected><?= $drc['api_method']; ?></option>
                            <option value="SOAP">SOAP</option>
                            <option value="REST">REST</option>
                            <option value="ISO">ISO</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label class="updateapp">API Address: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="api_address" name="api_address" rows="3" value="<?= $drc['api_address']; ?>">
                    </div>
                    <div class="col">
                        <label class="updateapp">Server Type: <span class="spanapp">*</span></label>
                        <select name="server_type" class="form-select" aria-label="Default select example" value="<?= $drc['server_type']; ?>">
                            <option selected><?= $drc['server_type']; ?></option>
                            <option value="Virtual Server">Virtual Server</option>
                            <option value="Physical Server">Physical Server</option>
                        </select>
                    </div>

                    <div class="form-group ">
                        <label class="updateapp">Operation System: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="operation_system" name="operation_system" value="<?= $drc['operation_system']; ?>">
                    </div>
                    <div class="form-group ">
                        <label class="updateapp">Processor: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="processor" name="processor" value="<?= $drc['processor']; ?>">
                    </div>
                    <div class="form-group ">
                        <!-- <label class="updateapp">Processor: <span class="spanapp">*</span></label> -->
                        <input class="form-control" type="hidden" id="apps_id" name="apps_id" value="<?= $drc['apps_id']; ?>">
                    </div>
                    <div class="form-group ">
                        <!-- <label class="updateapp">Processor: <span class="spanapp">*</span></label> -->
                        <input class="form-control" type="hidden" id="architecture_id" name="architecture_id" value="<?= $drc['architecture_id']; ?>">
                    </div>

                </div>

                <div class="btngrid d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url(); ?>archdrc/detail/<?= $drc['apps_id']; ?>" class="btncancel  mb-2">Cancel</a>

                    <button class="btnbase btn me-md-2 mb-2 d-md-flex justify-content-md-center" name="submit" id="submit" type="submit">Update</button>
                </div>
            </form>
        </div>
        <?= form_close(); ?>
    </div>
</main>