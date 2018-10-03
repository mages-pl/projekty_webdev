<!--Header -->

<?php
get_header();
?>
 
<div>
<?php if(have_posts()): 
while(have_posts()) : the_post(); 
    ?>
<!--Tytuł-->
<div class="title_page">
<h1><?php
the_title();
?></h1>
</div>
<!--Treść-->
<p>
<?php
the_content();
endwhile;
endif;
?>
</p>
</div>

<!--Stopka -->

<?php 
get_footer();
?>
