<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-2">

    <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h3 class="h2">Add Activity</h3>
    </div>
    <div class="card-body">


        <form method="post" action="<?php echo site_url('activity/create'); ?>" class="row gy-2 gx-3 align-items-center">

            <div class="col">
                <input type="hidden" class="form-control" readonly name="id_role" id="id_role" value="<?= $activity['id_user']; ?>">
            </div>

            <div class=" form-group">
                <label class="updateapp">Name Activity: <span class="spanapp">*</span></label>
                <input class="form-control" id="name" name="name"></input>
            </div>
            <div class="form-group">
                <label class="updateapp">Name Application: <span class="spanapp">*</span></label>
                <?php if (isset($appadmin)) { ?>
                    <select class="form-select" aria-label="Default select example" name="id_apps">
                        <?php foreach ($appadmin as $row) : ?>
                            <option value="<?php echo $row['application_id']; ?>"><?php echo $row['name_apps']; ?></option>
                        <?php endforeach; ?>

                    </select>

                <?php } else {
                ?>
                    <select class="form-select" aria-label="Default select example" name="id_apps">
                        <?php foreach ($appuser as $row) : ?>
                            <option value="<?php echo $row['id_apps']; ?>"><?php echo $row['name_apps']; ?></option>
                        <?php endforeach; ?>

                    </select>
                <?php } ?>

            </div>


            <div class="form-group">
                <label class="updateapp">Detail Activity: <span class="spanapp">*</span></label>
                <textarea class="form-control" id="detail" name="detail" rows="5"></textarea>

            </div>
            <div class="form-group col-auto">
                <label class="updateapp">Status Activity: <span class="spanapp">*</span></label>
                <select class="form-select" aria-label="Default select example" name="status_activity">
                    <option selected>Pilih</option>
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
           
            <div class="form-group col-auto">
                <label class="updateapp">Activity Date: <span class="spanapp">*</span></label>
                <input class="form-control" type="date" id="date_activity" name="date_activity">

            </div>
            <div class="form-group">
                <input class="form-control" type="hidden" id="user_created" name="user_created" value="<?php echo $user['name']; ?>" readonly>
            </div>

            <div class="form-group">
                <input class="form-control" type="hidden" readonly id="created" name="created" value="<?php echo date("Y-m-d"); ?>">
            </div>
         

            <div class="btngrid d-grid gap-2 d-md-flex justify-content-md-end">

                <a href="<?= base_url(); ?>activity/detail/<?= $activity['id_user']; ?>" class="btncancel mb-2">Cancel</a>
                <button class="btnbase me-md-2 mb-2 " name=" submit" id="submit" type="submit">Save</button>

            </div>
            <hr>
        </form>
    </div>

</main>