<script>
    $(document).ready(function() {

        var arrayApplication = <?= json_encode($data_application_id) ?>;
        console.log(arrayApplication[0].pin_frame);

        var showPinFrame = arrayApplication[0].pin_frame;
        var wrapperDefaultW = arrayApplication[0].width_screen;
        var wrapperDefaultH = arrayApplication[0].height_screen;
        var pinposW = 30;
        var pinposH = 30;

        $("#wrapper").mousemove(function(event) {
            var rect = this.getBoundingClientRect();
            var scrollTop = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
            var scrollLeft = document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft;
            var elementLeft = rect.left + scrollLeft;
            var elementTop = rect.top + scrollTop;

            $(".curX").html(event.pageX - elementLeft);
            $(".curY").html(event.pageY - elementTop);
        });

        // set the wrapper width and height to match the img size
        $('#wrapper').css({
            'width': $('#wrapper img').width(),
            'height': $('#wrapper img').height()
        });

        var wrapperW = $(".wrapperW").html(); //$("#wrapper img").width();
        var wrapperH = $(".wrapperH").html(); //$("#wrapper img").height();
        //console.log(wrapperW, wrapperH);

        if (wrapperDefaultW >
            wrapperW) {
            var scalaW = wrapperW / wrapperDefaultW;
            var scalaH = wrapperH / wrapperDefaultH;
            //console.log(scalaW, scalaH); 
        } else {
            var scalaW = (wrapperW / wrapperDefaultW);
            //alert(wrapperDefaultW + ' / ' + wrapperW + ' = ' + scalaW);
            var scalaH = (wrapperH / wrapperDefaultH);
            //alert(wrapperDefaultH + ' / ' + wrapperH + ' = ' + scalaH);
            //console.log(scalaW, scalaH); 
        }

        pinposW = Math.round(pinposW * scalaW);
        pinposH = Math.round(pinposH * scalaH);
        //alert(pinposW + ' x ' + pinposH);

        var arrayArchitecture = <?= json_encode($data_architecture) ?>;
        //console.log(arrayArchitecture);

        $.each(arrayArchitecture, function(i, v) {
            //console.log(i, v);
            var i = v.architecture_id;
            //console.log(i);
            var pinX = (v.object_pin_x * scalaW); //($(".pin").eq(i).data('xpos'));
            var pinY = (v.object_pin_y * scalaH); //($(".pin").eq(i).data('ypos'));

            var rangeX = v.object_pin_shape_x; //*scalaW;//($(".pin").eq(i).data('xrange'));
            var rangeY = v.object_pin_shape_y; //*scalaH;//($(".pin").eq(i).data('yrange'));
            //console.log(rangeX, rangeY); 

            var pinRange = (rangeX != '') ? "width:" + Math.round(rangeX * scalaW) + "px;height:" + Math.round(rangeY * scalaH) + "px" : "width:" + pinposW + "px;height:" + pinposH + "px";
            //console.log(pinRange); 

            // append the tooltip
            $("#wrapper").append("<div id='obj" + i + "' style='border:" + showPinFrame + "px solid #000;left:" + pinX + "px;top:" + pinY + "px; " + pinRange + ";' class='pinpos'>\</div>");
            //tooltip
            $('#obj' + i).tooltipster({
                animation: 'grow',
                arrow: true,
                interactive: true,
                delay: 200,
                minWidth: 10,
                maxWidth: 550,
                theme: 'tooltipster-default',
                touchDevices: false,
                trigger: 'hover',
                content: $("#info" + i).html(),
                contentAsHTML: true,

            });
        });
    });
</script>


<div class="header">
    <?php
    $app_id = $data_application_id[0]['application_id'];
    $roles = $this->Dashboardmodel->getDetailAppId($app_id);

    if ($role == 'user') { ?>
        <a class="btn_green" href="<?= base_url('user'); ?>">Back to Map</a>

        <div class="app-selection">
            <span>Application:</span>
            <select class="form-select form-select-sm" id="app" name="app" onChange="window.location.href='<?php echo site_url('user/detail/'); ?>' + this.value">
                <option>[Select Application]</option>
                <?php
                $i = 1;
                foreach ($data_application as $row_application) {
                    $selected = ($row_application["application_id"] == $app_id) ? "selected" : "";
                    echo '<option value="' . $row_application["application_id"] . '" ' . $selected . '>' . $i . '. ' . $row_application["name_apps"] . '</option>';
                    $i++;
                }
                ?>
            </select>

        </div>
    <?php } else { ?>
        <a class="btn_green" href="<?= base_url('admin'); ?>">Back to Map</a>

        <div class="app-selection">
            <span>Application:</span>
            <select class="form-select form-select-sm" id="app" name="app" onChange="window.location.href='<?php echo site_url('admin/detail/'); ?>' + this.value">
                <option>[Select Application]</option>
                <?php
                $i = 1;
                foreach ($data_application as $row_application) {
                    $selected = ($row_application["application_id"] == $app_id) ? "selected" : "";
                    echo '<option value="' . $row_application["application_id"] . '" ' . $selected . '>' . $i . '. ' . $row_application["name_apps"] . '</option>';
                    $i++;
                }
                ?>
            </select>

        </div>
    <?php } ?>


</div>

<div class="accordion accordion-flush" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Architecture
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="screeninfo">
                    X = <span class="curX">0</span>, Y = <span class="curY">0</span>;&nbsp;&nbsp;
                    Canvas = <span class="wrapperW">0</span> px x <span class="wrapperH">0</span>px
                </div>
                <div id="wrapper">
                    <div class="img">
                        <?php foreach ($img as $a) {
                            if ($a["flag_show"] == 1) { ?>
                                <img width="100%" height="100%" src="<?= site_url('upload/file/' . $a["name_img"]); ?>">
                        <?php }
                        } ?>
                    </div>

                    <?php
                    foreach ($data_architecture as $row_architecture) {
                        echo '<div id="info' . $row_architecture["architecture_id"] . '" class="pin pinpos">
                        <table>
                        <tr><td colspan="3" class="titletooltip">' . $row_architecture["object_pin_name"] . '</td></tr>
                        <tr><td colspan="3">' . $row_architecture["service_description"] . '</td></tr>';

                        if ($row_architecture["service_type"] != '') {
                            echo '<tr><td width="90px">Service Type</td><td>:</td><td>' . $row_architecture["service_type"] . '</td></tr>
                        <tr><td valign="top">IP Address</td><td valign="top">:</td><td>' . $row_architecture["ip_address"] . '</td></tr>';
                        }

                        if ($row_architecture["service_type"] != 'Database Server' and $row_architecture["service_type"] != 'Load Balancer' and $row_architecture["service_type"] != 'SFTP' and $row_architecture["service_type"] != 'Hardware') {
                            echo '<tr><td>Webserver</td><td>:</td><td>' . $row_architecture["webserver"] . '</td></tr>
                        <tr><td>Database</td><td>:</td><td>' . $row_architecture["database"] . '</td></tr>
                        <tr><td>Framework</td><td>:</td><td>' . $row_architecture["framework"] . '</td></tr>';
                        }

                        if ($row_architecture["service_type"] != '' and $row_architecture["service_type"] == 'Middleware') {
                            echo '<tr><td width="90px">API Method</td><td>:</td><td>' . $row_architecture["api_method"] . '</td></tr>
                        <tr><td>API Address</td><td>:</td><td>' . $row_architecture["api_address"] . '</td></tr>';
                        }

                        if ($row_architecture["service_type"] != '' and $row_architecture["service_type"] != 'Load Balancer') {
                            echo '<tr><td colspan="3"><hr></td></tr>
                        <tr><td width="90px">Server Type</td><td>:</td><td>' . $row_architecture["server_type"] . '</td></tr>
                        <tr><td valign="top">Opr. System</td><td valign="top">:</td><td>' . $row_architecture["operation_system"] . '</td></tr>
                        <tr><td valign="top">Processor</td><td valign="top">:</td><td>' . $row_architecture["processor"] . '</td></tr>
                        <tr><td>Memory (RAM)</td><td>:</td><td>' . $row_architecture["memory_ram"] . '</td></tr>
                        <tr><td>Hardisk</td><td>:</td><td>' . $row_architecture["hardisk"] . '</td></tr>
                        <tr><td colspan="3">' . $row_architecture["other_info"] . '</td></tr>';
                        }

                        if ($row_architecture["service_type"] != '' and $row_architecture["service_type"] != 'Load Balancer' and $row_architecture["service_type"] != 'Database Server') {
                            echo '<tr><td colspan="3"><hr></td></tr>
                        <tr><td width="90px" valign="top">PIC Developer</td><td valign="top">:</td><td valign="top">' . $row_architecture["pic_developer"] . '</td></tr>
                        <tr><td valign="top" nowrap>PIC Prod. Owner</td><td valign="top">:</td><td valign="top">' . $row_architecture["pic_product_owner"] . '</td></tr>';
                        }

                        echo '</table></div>';
                    }
                    ?>
                </div>

                <div class="screeninfo">
                    X = <span class="curX">0</span>, Y = <span class="curY">0</span>;&nbsp;&nbsp;
                    Canvas = <span class="wrapperW">0</span> px x <span class="wrapperH">0</span>px
                </div>

                <hr>
                <div class="img">
                    <p>Old Architecture:</p>
                    <?php foreach ($carousel as $v) { ?>

                        <div class="image-container">
                            <img src="<?= base_url('upload/file/' . $v["name_img"]); ?>" alt="Current Image" class="current-image">
                            <p class="small"><?= $v['flag_show'] ?></p>
                            <div class="hover-popup">
                                <img src="<?= base_url('upload/file/' . $v["name_img"]); ?>" alt="Old Image" class="old-image">
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Informasi Detail
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="panel">
                    <div id="warper">
                        <br>
                        <div id="pptx"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        <?php foreach ($file as $f) {
            if ($f["flag_show"] == '1') { ?>
                $("#pptx").pptxToHtml({
                    pptxFileUrl: "<?= base_url('upload/file/' . $f['name_file']); ?>",
                    slideMode: true,
                    slidesScale: "70%",
                    keyBoardShortCut: true,
                    slideModeConfig: { //on slide mode (slideMode: true)
                        first: 1,
                        nav: true,

                        /** true,true : show or not nav buttons*/
                        navTxtColor: "#f6ad3c",
                        /** color */
                        navNextTxt: "&#8250;", //">"
                        navPrevTxt: "&#8249;", //"<"
                        showPlayPauseBtn: true,
                        /** true,true */
                        keyBoardShortCut: true,
                        /** true,true */
                        showSlideNum: true,
                        /** true,true */
                        showTotalSlideNum: true,
                        /** true,true */
                        autoSlide: false,
                        /** true or seconds (the pause time between slides) , F8 to active(keyBoardShortCut: true) */
                        randomAutoSlide: true,
                        /** true,true ,autoSlide:true */
                        loop: true,
                        /** true,true */
                        background: "false",
                        /** true or color*/
                        transition: "slid",
                        /** transition type: "slid","fade","default","random" , to show transition efects :transitionTime > 0.5 */
                        transitionTime: 1 /** transition time in seconds */
                    }
                });
        <?php }
        } ?>
    });
</script>

<script src="<?= base_url('assets/js/img.js') ?>"></script>
<script src="<?= base_url('assets/js/pptx.js') ?>"></script>

<script>
    $(".wrapperW").html($("#wrapper img").width());
    $(".wrapperH").html($("#wrapper img").height());
</script>

<script src="<?= base_url('assets/js/accordion.js') ?>"></script>