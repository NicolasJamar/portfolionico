<!-- Avec le nom "home.php", WP reconnaît qu'il s'agit du template de la page d'accueil du blog ! 

Ici on travaille à partir du template Sidebar left -->

<?php get_header(); ?>

<section class="two-column row no-max pad">
      <div class="small-12 columns">
        <div class="row">
          <!-- Primary Column -->
          <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
            <div class="primary">

          		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <article <?php post_class('post'); ?>>
                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <h2><?php echo strip_tags(get_the_excerpt() ); ?></h2>
                  <ul class="post-meta no-bullet">
                    <li class="author">
                        <span class="wpt-avatar small">
                          <?php echo get_avatar( get_the_author_meta('ID'), 24 ); //pour reprendre l'avatar de l'auteur ! ?>
                        </span>
                        by <?php the_author_posts_link(); ?>
                    </li>
                    <li class="cat">in <?php the_category(' '); //ça crée automatiquement un lien, donc pas besoin de mettre <a> ?></li>
                    <li class="date">on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></li>
                  </ul>

                  <?php if( get_the_post_thumbnail() ) : //il faut mettre 'get' sinon, il affiche directement l'image! ?>
                    <div class="img-container">
                      <?php the_post_thumbnail('medium'); ?>
                    </div>
                  <?php endif; ?>

                </article>

                <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
                <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

          		<?php endwhile; else : ?>

          			<p><?php _e( 'Sorry, no posts matched your criteria.', 'portfolionico' ); ?></p>

          		<?php endif; ?>

            </div>
          </div>
        
          <!-- Secondary Column -->
            <?php get_sidebar(); ?>

     </div>
  </section>

<?php get_footer(); ?>