<?php 
if (have_posts()) : while (have_posts()) : the_post();  ?>
<a href='<?php echo $permalink = get_permalink(); ?>'><h1><?php the_title(); ?></h1></a>
<h4>Dipublikasikan pada <?php the_time('F jS, Y') ?></h4>
<?php if(is_single()){ ?>
<p><?php the_content(); ?></p>
<?php } else { ?>
<p><?php the_excerpt(); ?></p>
<?php } ?>
<hr> <?php endwhile; else: ?>
<p><?php _e('Maaf post dengan kriteria tersebut tidak ditemukan.'); ?></p><?php endif; ?>
<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
<div id="delimiter">
</div>