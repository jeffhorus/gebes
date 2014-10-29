<div id="slider1_container" style="position: relative; top: 0px; left: 0px; width: 810px; height: 370px; background: #000; overflow: hidden; ">

<!-- Slides Container -->
<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 500px; height: 370px;
    overflow: hidden;">
    <?php
		$args = array( "showposts" => 5 );                  
		query_posts($args);
	
		$content = "";
	
		if( have_posts() ) : 
			while( have_posts() ) :
	
				the_post();
				$link = get_permalink();
				$title = get_the_title();
				$date = get_the_date();                              
				
				$content .= "<div>".PHP_EOL.'<a u=image href="'.$link.'">'.'<img u="image" src="'.get_firstimage().'" /></a>'.PHP_EOL.'<div u="thumb">'.PHP_EOL;
				$content .= '<img name="coba" class="i" src="'.get_firstimage().'" /><div class="t"><a href="'.$link.'">'.$title.'</a></div>'.PHP_EOL;
				$content .= '<div class="c">'.get_the_excerpt().'</div>'.PHP_EOL.'</div></div>'.PHP_EOL;
	
			endwhile;
	
			wp_reset_query();
	
		endif;
	
		// Leave one line commented out depending on usage
		echo $content;   // For use as widget
		//return $content; // for use as shortcode     
	?>
</div>

<!-- ThumbnailNavigator Skin Begin -->
<div u="thumbnavigator" class="jssort11" style="position: absolute; width: 300px; height: 370px; left:505px; top:0px;">
    <!-- Thumbnail Item Skin Begin -->
    <div u="slides" style="cursor: move;">
        <div u="prototype" class="p" style="position: absolute; width: 300px; height: 69px; top: 0; left: 0;">
            <thumbnailtemplate style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></thumbnailtemplate>
        </div>
    </div>
    <!-- Thumbnail Item Skin End -->
</div>
<a style="display: none" href="http://www.jssor.com">javascript image slider</a>
</div>
<!-- Jssor Slider End -->