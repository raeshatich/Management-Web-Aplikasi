<body>


    <div class="content">
        <div class="mindmap">
            <ol class="children children_leftbranch">
                <li class="children__item">
                    <div class="node__vcritical">
                        <div class="node__text">Very Critical Application</div>
                        <input type="text" class="node__input">
                    </div>
                    <ol class="children">

                        <?php
                        $h = 1;
                        foreach ($application_vcritical as $row_application_vcritical) {
                        ?>
                            <li class="children__item">

                                <div class="node">
                                    <?php if ($row_application_vcritical["critical"] == "Very Critical") : ?>

                                        <script>
                                            $(document).ready(function() {
                                                var content = "<table>" +
                                                    "<tr><td colspan=\"3\" align=\"center\" nowrap><b><?= $row_application_vcritical["name_apps"] ?></b></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Description</td><td valign=\"top\">:</td><td><?= preg_replace("/\r\n|\r|\n/", '<br/>', $row_application_vcritical["description"]) ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer Type</td><td>:</td><td><?= $row_application_vcritical["category"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Link</td><td>:</td><td><?= $row_application_vcritical["dns_address"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>App Support</td><td>:</td><td><?= $row_application_vcritical["pic_name"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer</td><td>:</td><td><?= $row_application_vcritical["pic_dev"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>PMO</td><td>:</td><td><?= $row_application_vcritical["pic_pmo"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Kritikalitas</td><td>:</td><td><?= $row_application_vcritical["critical"] ?></td></tr>" +
                                                    "</table>";

                                                $("#obj<?= $row_application_vcritical["application_id"] ?>").tooltipster({
                                                    animation: "grow",
                                                    arrow: true,
                                                    interactive: true,
                                                    delay: 200,
                                                    minWidth: 100,
                                                    maxWidth: 550,
                                                    theme: "tooltipster-default",
                                                    touchDevices: false,
                                                    trigger: "hover",
                                                    content: content,
                                                    contentAsHTML: true
                                                });
                                            });
                                        </script>
                                        <?php if ($row_application_vcritical["critical"] == "Very Critical") : ?>

                                            <?php if ($this->session->userdata('role_id') == 'admin') { ?>
                                                <div class="node__text" id="obj<?= $row_application_vcritical["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>admin/detail/<?= $row_application_vcritical['application_id']; ?>"><?= $row_application_vcritical["name_apps"] ?></a></div>
                                            <?php } else { ?>
                                                <div class="node__text" id="obj<?= $row_application_vcritical["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>user/detail/<?= $row_application_vcritical['application_id']; ?>"><?= $row_application_vcritical["name_apps"] ?></a></div>

                                            <?php } ?>
                                        <?php else : ?>
                                            <div class="node__text"><?= $h ?>. <?= $row_application_vcritical["name_apps"] ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>


                                    <input type="text" class="node__input">
                                </div>
                            </li>

                        <?php
                            $h++;
                        }
                        ?>

                    </ol>
                </li>
                <li class="children__item">
                    <div class="node__critical">
                        <div class="node__text">Critical Application</div>
                        <input type="text" class="node__input">
                    </div>
                    <ol class="children">

                        <?php
                        $h = 1;
                        foreach ($application_critical as $row_application_critical) {

                        ?>
                            <li class="children__item">
                                <div class="node">

                                    <?php if ($row_application_critical["critical"] == "Critical") : ?>
                                        <script>
                                            $(document).ready(function() {
                                                var content = "<table>" +
                                                    "<tr><td colspan=\"3\" align=\"center\" nowrap><b><?= $row_application_critical["name_apps"] ?></b></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Description</td><td valign=\"top\">:</td><td><?= preg_replace("/\r\n|\r|\n/", '<br/>', $row_application_critical["description"]) ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer Type</td><td>:</td><td><?= $row_application_critical["category"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Link</td><td>:</td><td><?= $row_application_critical["dns_address"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>App Support</td><td>:</td><td><?= $row_application_critical["pic_name"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer</td><td>:</td><td><?= $row_application_critical["pic_dev"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>PMO</td><td>:</td><td><?= $row_application_critical["pic_pmo"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Critical</td><td>:</td><td><?= $row_application_critical["critical"] ?></td></tr>" +

                                                    "</table>";

                                                $("#obj<?= $row_application_critical["application_id"] ?>").tooltipster({
                                                    animation: "grow",
                                                    arrow: true,
                                                    interactive: true,
                                                    delay: 200,
                                                    minWidth: 100,
                                                    maxWidth: 500,
                                                    theme: "tooltipster-default",
                                                    touchDevices: false,
                                                    trigger: "hover",
                                                    content: content,
                                                    contentAsHTML: true
                                                });
                                            });
                                        </script>

                                        <?php if ($row_application_critical["critical"] == "Critical") : ?>
                                            <?php if ($this->session->userdata('role_id') == 'admin') { ?>
                                                <div class="node__text" id="obj<?= $row_application_critical["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>admin/detail/<?= $row_application_critical['application_id']; ?>"><?= $row_application_critical["name_apps"] ?></a></div>
                                            <?php } else { ?>
                                                <div class="node__text" id="obj<?= $row_application_critical["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>user/detail/<?= $row_application_critical['application_id']; ?>"><?= $row_application_critical["name_apps"] ?></a></div>

                                            <?php } ?>
                                        <?php else : ?>

                                            <div class="node__text"><?= $h ?>. <?= $row_application_critical["name_apps"] ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <input type="text" class="node__input">
                                </div>
                            </li>

                        <?php
                            $h++;
                        }
                        ?>
                    </ol>
                </li>
            </ol>
            <div class="node node_root">
                <div class="node__text">WHA-ASP</div>
                <input type="text" class="node__input">
            </div>
            <ol class="children children_rightbranch">
                <li class="children__item">
                    <div class="node__moderate">
                        <div class="node__text">Moderate Application</div>
                        <input type="text" class="node__input">
                    </div>
                    <ol class="children">

                        <?php
                        $h = 1;
                        foreach ($application_moderate as $row_application_moderate) {

                        ?>

                            <li class="children__item">
                                <div class="node">
                                    <?php if ($row_application_moderate["critical"] == "Moderate") : ?>
                                        <script>
                                            $(document).ready(function() {
                                                var content = "<table>" +
                                                    "<tr><td colspan=\"3\" align=\"center\" nowrap><b><?= $row_application_moderate["name_apps"] ?></b></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Description</td><td valign=\"top\">:</td><td><?= preg_replace("/\r\n|\r|\n/", '<br/>', $row_application_moderate["description"]) ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer Type</td><td>:</td><td><?= $row_application_moderate["category"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Link</td><td>:</td><td><?= $row_application_moderate["dns_address"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>App Support</td><td>:</td><td><?= $row_application_moderate["pic_name"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer</td><td>:</td><td><?= $row_application_moderate["pic_dev"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>PMO</td><td>:</td><td><?= $row_application_moderate["pic_pmo"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Critical</td><td>:</td><td><?= $row_application_critical["critical"] ?></td></tr>" +


                                                    "</table>";

                                                $("#obj<?= $row_application_moderate["application_id"] ?>").tooltipster({
                                                    animation: "grow",
                                                    arrow: true,
                                                    interactive: true,
                                                    delay: 200,
                                                    minWidth: 100,
                                                    maxWidth: 500,
                                                    theme: "tooltipster-default",
                                                    touchDevices: false,
                                                    trigger: "hover",
                                                    content: content,
                                                    contentAsHTML: true
                                                });
                                            });
                                        </script>
                                        <?php if ($this->session->userdata('role_id') == 'admin') { ?>
                                            <div class="node__text" id="obj<?= $row_application_moderate["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>admin/detail/<?= $row_application_moderate['application_id']; ?>"><?= $row_application_moderate["name_apps"] ?></a></div>
                                        <?php } else { ?>
                                            <div class="node__text" id="obj<?= $row_application_moderate["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>user/detail/<?= $row_application_moderate['application_id']; ?>"><?= $row_application_moderate["name_apps"] ?></a></div>

                                        <?php } ?>
                                    <?php else : ?>
                                        <div class="node__text"><?= $h ?>. <?= $row_application_moderate["name_apps"] ?></div>
                                    <?php endif; ?>
                                    <input type="text" class="node__input">
                                </div>
                            </li>

                        <?php
                            $h++;
                        }
                        ?>
                    </ol>
                </li>
                <li class="children__item">
                    <div class="node__noncritical">
                        <div class="node__text">Non Critical Application</div>
                        <input type="text" class="node__input">
                    </div>
                    <ol class="children">

                        <?php
                        $h = 1;
                        foreach ($application_noncritical as $row_application_noncritical) {

                        ?>

                            <li class="children__item">
                                <div class="node">
                                    <?php if ($row_application_noncritical["critical"] == "Non Critical") : ?>
                                        <script>
                                            $(document).ready(function() {
                                                var content = "<table>" +
                                                    "<tr><td colspan=\"3\" align=\"center\" nowrap><b><?= $row_application_noncritical["name_apps"] ?></b></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Description</td><td valign=\"top\">:</td><td><?= preg_replace("/\r\n|\r|\n/", '<br/>', $row_application_noncritical["description"]) ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer Type</td><td>:</td><td><?= $row_application_noncritical["category"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Link</td><td>:</td><td><?= $row_application_noncritical["dns_address"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>App Support</td><td>:</td><td><?= $row_application_noncritical["pic_name"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Developer</td><td>:</td><td><?= $row_application_noncritical["pic_dev"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>PMO</td><td>:</td><td><?= $row_application_noncritical["pic_pmo"] ?></td></tr>" +
                                                    "<tr><td valign=\"top\" nowrap>Critical</td><td>:</td><td><?= $row_application_critical["critical"] ?></td></tr>" +

                                                    "</table>";

                                                $("#obj<?= $row_application_noncritical["application_id"] ?>").tooltipster({
                                                    animation: "grow",
                                                    arrow: true,
                                                    interactive: true,
                                                    delay: 200,
                                                    minWidth: 100,
                                                    maxWidth: 500,
                                                    theme: "tooltipster-default",
                                                    touchDevices: false,
                                                    trigger: "hover",
                                                    content: content,
                                                    contentAsHTML: true
                                                });
                                            });
                                        </script>
                                        <?php if ($this->session->userdata('role_id') == 'admin') { ?>
                                            <div class="node__text" id="obj<?= $row_application_noncritical["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>admin/detail/<?= $row_application_noncritical['application_id']; ?>"><?= $row_application_noncritical["name_apps"] ?></a></div>
                                        <?php } else { ?>
                                            <div class="node__text" id="obj<?= $row_application_noncritical["application_id"] ?>"><?= $h ?>. <a href="<?= base_url(); ?>user/detail/<?= $row_application_noncritical['application_id']; ?>"><?= $row_application_noncritical["name_apps"] ?></a></div>

                                        <?php } ?>
                                    <?php else : ?>
                                        <div class="node__text"><?= $h ?>. <?= $row_application_noncritical["name_apps"] ?></div>
                                    <?php endif; ?>
                                    <input type="text" class="node__input">
                                </div>
                            </li>

                        <?php
                            $h++;
                        }
                        ?>
                    </ol>
                </li>
            </ol>
        </div>


    </div>
    <script>
        $(function() {
            $('.mindmap').mindmap();
        });

        window.onscroll = function() {
            myFunction();
        }

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
</body>