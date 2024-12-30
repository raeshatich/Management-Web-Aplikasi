<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Architecture</h1>
        <form role="search" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" name="find" id="find" autocomplete="off">
            </div>
        </form>
    </div>
    <div class="table-responsive-xxl" id="results">
        <table class="table table-bordered table table-striped table-hover">
            <thead>
                <tr>

                    <th class="text-center">No</th>
                    <th>Name Application</th>
                    <th>Description</th>
                    <th>DC</th>
                    <th>DRC</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php
                foreach ($applikasi as $row) :
                ?><tr>
                        <td><?= ++$page; ?></td>
                        <?php if (!empty($row['dns_address'])) : ?>
                            <td nowrap class="link"><a target="_blank" nowrap href="<?= $row['dns_address']; ?>"><?php echo $row['name_apps'] ?></td>
                        <?php elseif (empty($row['dns_address'])) : ?>
                            <td><?php echo $row['name_apps'] ?></td>
                        <?php endif; ?>
                        <td><?php echo $row['description'] ?></td>

                        <td>
                            <a type=" button" class='btninfo' href="<?= base_url(); ?>archdc/detail/<?= $row['application_id']; ?>"><span class="badge rounded-pill text-bg-success">DC</span></a>
                        </td>
                        <td>
                            <a type="button" class='btninfo' href="<?= base_url(); ?>archdrc/detail/<?= $row['application_id']; ?>"><span class="badge rounded-pill text-bg-warning">DRC</span></a>

                        </td>

                    </tr><?php endforeach; ?></tbody>
        </table>
    </div>
    <div class="row">
        <div class="col"><?php echo $pagination; ?></div>
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        $("#find").on("keyup", function() {

            var find = $(this).val();
            $.ajax({
                url: "<?php echo base_url('architecture/search'); ?>",
                type: "POST",
                data: {
                    find: find
                },
                success: function(data) {
                    $("#results").html(data);
                }
            });
        });
    });
</script>