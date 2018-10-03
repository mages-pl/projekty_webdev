
<?php
get_header();
?>
<?php
include('nav.php');
?>
<div class="container">


<?php
while ( have_posts() ) : the_post();
?>
<h1><?php the_title(); ?></h1>
<div id="piro_ajax_content">

<?php
the_content();
?>
</div>
<?php
endwhile;
?>
</div>
<?php
get_footer();
?>