<!-- front-page.php est la page d'accueil du site suivant la WP Hierarchy (static page). S'il n'y a pas de front-page.php, il va prendre page.php et si y a pas index.php.

Attention de bien définir le rôle des pages dans Customize -> Homepage Settings. Il y a 2 types de présentation A static page (front-page.php) ou Your lasted posts (home.php). 
-->

<?php get_header(); ?>

<section class="row">
      <div class="small-12 columns text-center">
        <div class="leader">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      		<h1><?php the_title(); ?></h1>
          	<p><?php the_content(); ?></p>

		<?php endwhile; endif; ?>

<!-- On fait appel à la partie content-porfolio.php (qui affiche le tableau d'images) avec un include. get_template_part() est la fonction pour include dans WP
 -->    
 	<?php get_template_part('content', 'portfolio') ?>

        </div>
      </div>
    </section>

<?php get_footer(); ?>