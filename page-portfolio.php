<?php 
/**
 *Template Name: Portfolio Page
 */ 
?>

<?php get_header(); ?>

    <section class="row">
      <div class="small-12 columns text-center">
        <div class="leader">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      		<h1><?php the_title(); ?></h1>
          	<?php the_content(); ?>

		<?php endwhile; 

     endif; ?>

        </div>
      </div>
    </section>

    <?php get_template_part('content', 'portfolio'); //pour include une partie de page/ la fonction contient 1 ou 2 paramètres qui sont liés au nom du fichier appelé (ici: content-portfolio.php)
    //Donc sir le fichier s'appellait portfolio.php, on aurait écrit seulement ('porfolio') en paramètre.
     ?>

<?php get_footer(); ?>