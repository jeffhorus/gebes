<?php
if ( is_page( 'schedule' ) ) {
	get_header('schedule');
	get_template_part('schedule');
}
else if ( is_page( 'gallery' ) ) {
	get_header('gallery');
	echo '<div id="container">';
	get_template_part('gallery'); 
}
else if ( is_page( 'classment' ) ) {
	get_header('classment');
	echo '<div id="container">';
	get_template_part('classment'); 
}
else if ( is_page( 'team' ) ) {
	get_header('team');
	echo '<div id="container">';
	get_template_part('team'); 
}
else if ( is_page( 'about' ) ) {
	get_header('about');
	echo '<div id="container">';
	get_template_part('about'); 
}
else if ( is_page( 'about-brodo' ) ) {
	get_header('about');
	echo '<div id="container">';
	get_template_part('about-brodo'); 
}
else if ( is_page( 'player' ) ) {
	get_header('player');
	echo '<div id="container">';
	echo '<h1>player</h1>';
	get_template_part('player'); 
}
else if ( is_page( 'home' ) ) {
	get_header();
	get_template_part('home-page'); 
}
else {
	get_header();
	echo '<div id="container"><div id="allnews">';
	get_template_part('postcontent'); 
	echo '</div>';
	get_sidebar();
}
echo '</div>';
get_footer();
?>
</body>
</html>