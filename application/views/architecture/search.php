<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>

            <th>No</th>
            <th>Name Application</th>
            <th>Description</th>
            <th>DC</th>
            <th>DRC</th>
        </tr>
    </thead>

    <tbody class="table-group-divider">
        <?php
        foreach ($applikasi as $row) : ?>
            <tr>
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

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>