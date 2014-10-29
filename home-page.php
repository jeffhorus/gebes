<body>
    <div id="container">
    	<div id="latestnews">
            <a href="<?php echo get_home_url().'/gallery';?>"><h1>Galeri Foto Terbaru</h1></a>
            <?php get_template_part('latestphotos'); ?>
        </div>
        <div id="classment">
	        <a href="<?php echo get_home_url().'/classment';?>"><h1>Klasemen Sementara</h1></a>
	        <?php get_simple_classment(1); ?>
		</div>
