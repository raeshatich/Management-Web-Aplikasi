<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <!-- rapihin editnya untuk admin-->
    <div class="card">
        <div class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h2">Update activity</h3>

        </div>

        <?= form_open('activity/update/' . $activity['id_activity']); ?>
        <div class="card-body">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>


            <form method="post" action="" class="row gy-2 gx-3 align-items-center">

                <div class="row">

                 
                    <div class="col ">
                        <label class="updateapp">Name Activity: <span class="spanapp">*</span></label>
                        <input class="form-control" type="text" id="object_pin_x" name="name" value="<?= $activity['name_activity']; ?>">
                    </div>

                    <?php
                    $role = $this->session->userdata('role_id');

                    if ($role == 2) { ?>
                        <div class="form-group">
                            <label class="updateapp">Name Application: <span class="spanapp">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="id_apps">
                                <?php foreach ($row as $a) : ?>
                                    <option selected value="<?php echo $a['id_apps']; ?>"><?php echo $a['name_apps']; ?></option>
                                <?php endforeach; ?>
                                <?php foreach ($appuser as $b) : ?>
                                    <option value="<?php echo $b['application_id']; ?>"><?php echo $b['name_apps']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                    <?php } else { ?>
                        <div class="form-group">
                            <label class="updateapp">Name Application: <span class="spanapp">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="id_apps">
                                <?php foreach ($row as $a) : ?>
                                    <option selected value="<?php echo $a['id_apps']; ?>"><?php echo $a['name_apps']; ?></option>
                                <?php endforeach; ?>
                                <?php foreach ($appadmin as $b) : ?>
                                    <option value="<?php echo $b['application_id']; ?>"><?php echo $b['name_apps']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                    <?php } ?>
                    <div class="">
                        <label class="updateapp">Detail Activity: <span class="spanapp">*</span></label>
                        <textarea class="form-control" type="text" id="detail" name="detail" rows="3"><?= $activity['detail']; ?></textarea>
                    </div>
                    <div class="form-group col-auto">
                        <label class="updateapp">Status Activity: <span class="spanapp">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="status_activity">
                            <option selected><?= $activity['status_activity']; ?></option>
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

                    <!-- <div class="form-group">
                        <label class="updateapp">PIC Activity: <span class="spanapp">*</span></label>
                        <select class="form-select" aria-label="Default select example" name="id_role" readonly>
                            <?php foreach ($row as $a) : ?>
                                <option selected value="<?php echo $a['id_role']; ?>"><?php echo $a['pic_name']; ?></option>
                            <?php endforeach; ?>
                            <?php foreach ($pic as $a) : ?>
                                <option value="<?php echo $a['id_user']; ?>"><?php echo $a['pic_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->

                    <div class="form-group col">
                        <label class="updateapp">Activity Date: <span class="spanapp">*</span></label>
                        <input class="form-control" type="date" id="date_activity" name="date_activity" value="<?php echo $activity['date_activity']; ?>">
                    </div>

                    <div class=" form-group col-auto">
                        <input class="form-control" type="hidden" id="user_created" name="user_created" value="<?= $user['name']; ?>">
                    </div>
                    <div class="form-group col-auto">
                        <input class="form-control" type="hidden" id="user_created" name="user_created" value="<?php echo $activity['user_created']; ?>" readonly>
                    </div>
                    <div class="form-group col-auto">
                        <input class="form-control" type="hidden" readonly id="created" name="created" value="<?php echo date("Y-m-d"); ?>" value=" <?= $activity['created']; ?>">
                    </div>
                    <div class="col">
                        <label for=""></label>
                        <input type="hidden" class="form-control" readonly value="<?= $activity['id_activity']; ?>" name="id_activity" id="id_activity">
                    </div>
                   
                    <div class="">
                        <label for=""></label>
                        <input type="hidden" class="form-control" readonly value="<?= $activity['id_role']; ?>" name="id_role" id="id_role">
                    </div>

                </div>



                <div class="btngrid d-grid gap-2 d-md-flex justify-content-md-end">

                    <a href="<?= base_url(); ?>activity/detail/<?= $activity['id_role']; ?>" class="btncancel mb-2">Cancel</a>
                    <button class="btnbase me-md-2 mb-2 " name=" submit" id="submit" type="submit">Save</button>

                </div>
            </form>

        </div>
        <?= form_close(); ?>
    </div>
</main>