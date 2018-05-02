<!-- On isole une partie de page. Pour créer une partie de page, utiliser le terme "content". Ca sert à utiliser ce code sur pls pages -->

    <?php 
        $num_posts = ( is_front_page() ) ? 4 : -1;
        //Condition: Si ? c'est une front-page, $num_posts = 4, else : , $num_posts = -1 (pas de limite).
        //is_front_page() est une function spéciale à utiliser dans une condition. Voir Conditional tags dans le Codex

        $args = array(
        'post_type' => 'portfolio', //va chercher le type de Post qu'on a créé dans CPT UI
        'posts_per_page' => $num_posts
        ); 
        //'post_type' et 'posts_per_page' sont des paramètres propres à WP_Query. Voir la doc dans le Codex

        $query = New WP_Query($args); //pour customizer nos posts 'portfolio'
    ?>

    <section class="row no-max pad">

    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


      <div class="small-6 medium-4 large-3 columns grid-item" id="images-portfolio">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); //pour placer l'image et lui donner des paramètres ?></a>
      </div>
  

    <?php endwhile; endif; 

    wp_reset_postdata(); //pour arrêter l'appel à 'Portfolio' ?>

    </section>

