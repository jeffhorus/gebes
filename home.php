<?php
get_header(news);?>
<div id="container">
<div id="allnews">
<h1>Berita Terbaru</h1><br>
<?php 
get_template_part('postcontent');?>


</div>
<?php 
get_sidebar();?>
</div>
<?php get_footer(); ?>
</body>
</html>