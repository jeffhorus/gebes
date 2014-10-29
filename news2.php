<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>List Slider Demo - Jssor Slider, Slideshow with Javascript Source Code</title>
</head>
<body style="font-family:Arial, Verdana;background-color:#fff;">
    <!-- it works the same with all jquery version from 1.x to 2.x -->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (40KB) or jssor.sliderc.mini.js (32KB, with caption, no slideshow) or jssor.sliders.mini.js (28KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.core.js + jssor.utils.js + jssor.slider.js) -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jssor.core.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jssor.utils.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jssor.slider.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slider.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/slider.css">
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 810px; height: 300px; background: #000; overflow: hidden; ">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px;
            overflow: hidden;">
            <div>
                <img u="image" src="<?php bloginfo('template_url'); ?>/img/photography/002.jpg" />
                <div u="thumb">
                    <img class="i" src="<?php bloginfo('template_url'); ?>/img/photography/thumb-002.jpg" /><div class="t">Banner Rotator</div>
                    <div class="c">360+ touch swipe slideshow effects</div>
                </div>
            </div>
            <div>
                <img u="image" src="<?php bloginfo('template_url'); ?>/img/photography/003.jpg" />
                <div u="thumb">
                    <img class="i" src="<?php bloginfo('template_url'); ?>/img/photography/thumb-003.jpg" /><div class="t">Image Gallery</div>
                    <div class="c">Image gallery with thumbnail navigation</div>
                </div>
            </div>
            <div>
                <img u="image" src="<?php bloginfo('template_url'); ?>/img/photography/004.jpg" />
                <div u="thumb">
                    <img class="i" src="<?php bloginfo('template_url'); ?>/img/photography/thumb-004.jpg" /><div class="t">Carousel</div>
                    <div class="c">Touch swipe, mobile device optimized</div>
                </div>
            </div>
            <div>
                <img u="image" src="<?php bloginfo('template_url'); ?>/img/photography/005.jpg" />
                <div u="thumb">
                    <img class="i" src="<?php bloginfo('template_url'); ?>/img/photography/thumb-005.jpg" /><div class="t">Themes</div>
                    <div class="c">30+ professional themems + growing</div>
                </div>
            </div>
            <div>
                <img u="image" src="<?php bloginfo('template_url'); ?>/img/photography/006.jpg" />
                <div u="thumb">
                    <img class="i" src="<?php bloginfo('template_url'); ?>/img/photography/thumb-006.jpg" /><div class="t">Tab Slider</div>
                    <div class="c">Tab slider with auto play options</div>
                </div>
            </div>
        </div>
        
        <!-- ThumbnailNavigator Skin Begin -->
        <div u="thumbnavigator" class="jssort11" style="position: absolute; width: 200px; height: 300px; left:605px; top:0px;">
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides" style="cursor: move;">
                <div u="prototype" class="p" style="position: absolute; width: 200px; height: 69px; top: 0; left: 0;">
                    <thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- ThumbnailNavigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">javascript image slider</a>
    </div>
    <!-- Jssor Slider End -->
</body>
</html>