<div id="sidebar">
	<!--<div id="searchbar">
	<form>
        <input class="search" type="text" placeholder="Search..." required>
        <input class="button" type="button" value="Search">
	</form>
	</div>-->
<h2 ><?php _e('Categories'); ?></h2>
<ul >
<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
</ul>
<h2 ><?php _e('Archives'); ?></h2>
<ul >
<?php wp_get_archives('type=monthly'); ?>
</ul>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div>