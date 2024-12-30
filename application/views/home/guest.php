<body>
    <h1>test</h1>
    <?php foreach ($file as $f) {
        if ($f["flag_show"] == '1') { ?>
            <?= base_url('upload/file/' . $f['name_file']); ?>
    <?php }
    } ?>
    <div class="panel">
        <div id="warper">

            <br><br>
            <div id="container">

                <br>
                <div id="pptx"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            <?php foreach ($file as $f) {
                if ($f["flag_show"] == '1') { ?>
                    $("#pptx").pptxToHtml({
                        pptxFileUrl: "<?= base_url('upload/file/' . $f['name_file']); ?>",
                        slidesScale: "",
                        slideMode: true,
                        keyBoardShortCut: true,
                        slideModeConfig: {
                            first: 1,
                            nav: true,

                            navTxtColor: "white",

                            navNextTxt: "&#8250;",
                            navPrevTxt: "&#8249;",
                            showPlayPauseBtn: true,

                            keyBoardShortCut: true,

                            showSlideNum: true,

                            showTotalSlideNum: true,

                            autoSlide: true,

                            randomAutoSlide: true,

                            loop: true,

                            background: "white",

                            transition: "default",

                            transitionTime: 1
                        }
                    });
            <?php }
            } ?>
        });
    </script>

</body>

</html>