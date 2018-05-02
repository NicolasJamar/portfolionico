<!-- Ici, pas besoin de nommer un nouveau template. Avec le nom "single" (devant le post type "portfolio" qu'on a créé), WP va directement reconnaître qu'il s'agit du template pour customizer individuellement ce type de post > voir dans la hierarchie WP -->


<?php get_header(); ?>

<section class="two-column row no-max pad">
      <div class="small-12 columns">
        <div class="row">
          <!-- Primary Column -->
          <div class="small-12 medium-7 medium-offset-1 medium-push-4 columns">
            <div class="primary">

          		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                	<?php the_field('image'); //the_field est lié uniquement au plugin Custom Fields --> Field Name ?>

            </div>
          </div>
        
          <!-- Secondary Column -->
            <div class="small-12 medium-4 medium-pull-8 columns">
              <div class="secondary">

                <h1><?php the_title(); ?></h1>
                <p><?php the_field('description');  ?></p>

                <hr>

                <p>
                  <?php previous_post_link(); ?> - 
                  <a href="<?php bloginfo('url')?>/portfolionico/">Back to the portfolio</a> - 
                  <?php next_post_link(); ?>

                </p>

              </div>
            </div>

          <?php endwhile; endif; ?>
     </div>
  </section>

<?php get_footer(); ?>