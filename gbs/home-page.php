<body>
    <style> 
        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        .captionOrange
        {
            background: #EB5100;
            background-color: rgba(235, 81, 0, 0.6);
        }
        .captionBlack
        {
            font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }
        a.captionOrange, A.captionOrange:active, A.captionOrange:visited
        {
            color: #ffffff;
            text-decoration: none;
        }
        a.captionOrange:hover
        {
            color: #eb5100;
            text-decoration: underline;
            background-color: #eeeeee;
            background-color: rgba(238, 238, 238, 0.7);
        }
        .bricon
        {
            background: url(../img/browser-icons.png);
        }
    </style>
    <!-- it works the same with all jquery version from 1.x to 2.x -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (40KB) or jssor.sliderc.mini.js (32KB, with caption, no slideshow) or jssor.sliders.mini.js (28KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jssor.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jssor.slider.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            //Reference http://www.jssor.com/development/tip-make-responsive-slider.html

            var _CaptionTransitions = [];
            _CaptionTransitions["CLIP|L"] = { $Duration: 600, $Clip: 1, $Easing: $JssorEasing$.$EaseInOutCubic };
            _CaptionTransitions["RTT|10"] = { $Duration: 600, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
            _CaptionTransitions["ZMF|10"] = { $Duration: 600, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
            _CaptionTransitions["FLTTR|R"] = { $Duration: 600, x: -0.2, y: -0.1, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $Opacity: 2, $Round: { $Top: 1.3} };

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0),

                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                }
            };

            var jssor_slider2 = new $JssorSlider$("slider2_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {

                //reserve blank width for margin+padding: margin+padding-left (10) + margin+padding-right (10)
                var paddingWidth = 20;

                //minimum width should reserve for text
                var minReserveWidth = 225;

                var parentElement = jssor_slider2.$Elmt.parentNode;

                //evaluate parent container width
                var parentWidth = parentElement.clientWidth;

                if (parentWidth) {

                    //exclude blank width
                    var availableWidth = parentWidth - paddingWidth;

                    //calculate slider width as 70% of available width
                    var sliderWidth = availableWidth * 0.7;

                    //slider width is maximum 600
                    sliderWidth = Math.min(sliderWidth, 600);

                    //slider width is minimum 200
                    sliderWidth = Math.max(sliderWidth, 200);
                    var clearFix = "none";

                    //evaluate free width for text, if the width is less than minReserveWidth then fill parent container
                    if (availableWidth - sliderWidth < minReserveWidth) {

                        //set slider width to available width
                        sliderWidth = availableWidth;

                        //slider width is minimum 200
                        sliderWidth = Math.max(sliderWidth, 200);

                        clearFix = "both";
                    }

                    //clear fix for safari 3.1, chrome 3
                    $('#clearFixDiv').css('clear', clearFix);

                    jssor_slider2.$ScaleWidth(sliderWidth);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
    <div style="display: block; overflow: hidden; margin:0; padding: 0; width: 96%; max-width:100%; min-width: 100%; border: 0px solid #ccc; background-color: #fff;  font-size: .8em; line-height: 1.5em;">
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
        <h1 class="gal-tit">Gallery</h1>
        <div id="slider2_container" style="position: relative; margin: auto auto 10% auto; float: left; top: 0px; left: 0px; width: 600px;
            height: 300px; overflow: hidden;">
            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px; margin: 5%;
                overflow: hidden;">
                <div><img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/header2.jpg" />
                    <div u="caption" t="CLIP|L" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="CLIP|L" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="CLIP|L" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                </div>
                <div><img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/header1.jpg" />
                    <div u="caption" t="ZMF|10" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="ZMF|10" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="ZMF|10" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                </div>
                <div><img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/background.jpg" />
                    <div u="caption" t="RTT|10" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="RTT|10" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="RTT|10" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                </div>
                <div><img u="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/header.jpg" />
                    <div u="caption" t="FLTTR|R" style="position:absolute;left:100px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="FLTTR|R" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                    <div u="caption" t="FLTTR|R" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;"></div>
                </div>
            </div>
        <a style="display: none" href="http://www.jssor.com">jquery slider plugin</a>
        </div>
        <!-- Jssor Slider End -->
        <div id="classment">
        <h1 style="color: #CE0000;">Classment</h1>
        <?php get_simple_classment(1); ?>
		</div>
