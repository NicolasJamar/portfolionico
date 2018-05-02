<?php
 //pour ajouter gestion des menus dans le Dashboard
add_theme_support('menus');
//pour ajouter Featured Image dans le Dashboard -> post 'Portfolio'
add_theme_support('post-thumbnails');


//pour définir la longueur des extrait du blog
function wpt_excerpt_length( $length ){
	return 16;
}
add_filter('excerpt_length','wpt_excerpt_length', 999);


//pour dire à WordPress que notre menu existe
function register_theme_menus() {
	//Manage location du menu
	register_nav_menus(array (
		'primary-menu' => __('Primary Menu')
	));
}
add_action('init', 'register_theme_menus');


//menu sidebar à gauche
function wpt_create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="module-heading">',
		'after_title' => '</h2>'
	));
}
//appels de la function -> grâce à ça l'option Widgets apparaît dans le dashboard -> Appearance
//Le 1er paramètre créé des options dans Widgets
wpt_create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages with a sidebar' );
wpt_create_widget( 'Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section' );


//function pour appeler les feuilles de style
function pn_theme_styles() {

	wp_enqueue_style('foundation_css', get_template_directory_uri() . '/css/foundation.css');
	// wp_enqueue_style('normalize_css', get_template_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('googlefont_css', 'http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic');
	wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}
//Pour définir quel Javascript file ou stylesheet à activer en fonction de la page
add_action('wp_enqueue_scripts', 'pn_theme_styles');


//function pour appeler les feuilles js
function pn_theme_js() {

	wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/js/modernizr.js', '', '', false);
	wp_enqueue_script('foundation_js', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '', true); //-> On doit ajouter des paramètres qui définissent la dépendance. Ici, nos fichiers js dépendent de jQuery, version x, apparaît dans le footer ou non ? 
	wp_enqueue_script('main_js', get_template_directory_uri() . '/js/app.js', array('jquery', 'foundation_js'), '', true);
}
add_action('wp_enqueue_scripts', 'pn_theme_js');


