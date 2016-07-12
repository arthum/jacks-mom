<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/**
 * Display logo.
 */
function graphy_logo() {
	if ( ! get_theme_mod( 'graphy_logo' ) ) {
		return;
	}
	$logo_tag = ( is_front_page() && get_theme_mod( 'graphy_replace_blogname' ) ) ? 'h1' : 'div';
	$logo_alt = ( get_theme_mod( 'graphy_replace_blogname' ) ) ? get_bloginfo( 'name' ) : '';
	$logo_src = esc_url( get_theme_mod( 'graphy_logo' ) );
	if ( get_theme_mod( 'graphy_retina_logo' ) ) :
		list( $logo_width ) = getimagesize( $logo_src );
		$logo_width = round( $logo_width / 2 ); ?>
		<<?php echo esc_attr( $logo_tag ); ?> class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="<?php echo esc_attr( $logo_alt ); ?>" src="<?php echo esc_attr( $logo_src ); ?>" width="<?php echo esc_attr( $logo_width ); ?>" /></a></<?php echo esc_attr( $logo_tag ); ?>>
	<?php else: ?>
		<<?php echo esc_attr( $logo_tag ); ?> class="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img alt="<?php echo esc_attr( $logo_alt ); ?>" src="<?php echo esc_attr( $logo_src ); ?>" /></a></<?php echo esc_attr( $logo_tag ); ?>>
	<?php endif;
}

/**
 * Display site title.
 */
function graphy_site_title() {
	if ( get_theme_mod( 'graphy_logo' ) && get_theme_mod( 'graphy_replace_blogname' ) ) {
		return;
	}
	$title_tag = ( is_front_page() ) ? 'h1' : 'div';
	?>
    <div class="site-title-container">

    <?php if ( ! get_theme_mod( 'graphy_hide_blogdescription' ) ) : ?>
                <div class="site-description"><?php bloginfo( 'description' ); ?></div>
            <?php endif; ?>
    </div>
	<?php
}
?>