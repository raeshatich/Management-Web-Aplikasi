            $(function() {
                var oldWidth, oldMargin, isFullscreenMode = false;
                $("#fullscreen-btn").on("click", function() {

                    if (!isFullscreenMode) {
                        oldWidth = $("#pptx .slide").css("width");
                        oldMargin = $("#pptx .slide").css("margin");
                        $("#pptx .slide").css({
                            "width": "90%",
                            "margin": "0 auto"
                        })
                        $("#pptx").toggleFullScreen();
                        isFullscreenMode = true;
                    } else {
                        $("#pptx .slide").css({
                            "width": oldWidth,
                            "margin": oldMargin
                        })
                        $("#pptx").toggleFullScreen();
                        isFullscreenMode = false;
                    }
                });
                $(document).bind("fullscreenchange", function() {
                    if (!$(document).fullScreen()) {
                        $("#pptx .slide").css({
                            "width": oldWidth,
                            "margin": oldMargin
                        })
                    }
                });
            });
