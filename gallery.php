<?php 
if (have_posts()) : while (have_posts()) : the_post();  ?>
<div style="text-align:center;"><a href='<?php echo $permalink = get_permalink(); ?>'><h1><?php the_title(); ?></h1></a></div>
<!--<h4>Dipublikasikan pada <?php //the_time('F jS, Y') ?></h4>-->
<p><?php the_content(__('(more...)')); ?></p>
<hr> <?php endwhile; else: ?>
<p><?php _e('Maaf post dengan kriteria tersebut tidak ditemukan.'); ?></p><?php endif; ?>
<div class="navigation"><p><?php posts_nav_link(); ?></p>
</div>
<div id="delimiter">
</div>