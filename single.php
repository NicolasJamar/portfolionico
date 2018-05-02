<!-- Simplement avec le nom "single.php", WP reconnaît qu'il s'agit du template d'un post du blog ! -> ça fonctionne suivant la WP hierarchy -->

<?php get_header(); ?>

<section class="two-column row no-max pad">
      <div class="small-12 columns">
        <div class="row">
          <!-- Primary Column -->
          <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
            <div class="primary">

          		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <article class="post">

                 <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
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
                        <?php the_post_thumbnail('large'); ?>
                      </div>
                    <?php endif; ?>

                    <?php the_content(); ?>
                    <?php comments_template(); ?>
                </article>

          		<?php endwhile; else : ?>

          			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

          		<?php endif; ?>

            </div>
          </div>
        
          <!-- Secondary Column -->
            <?php get_sidebar(); ?>
            
     </div>
  </section>

<?php get_footer(); ?>