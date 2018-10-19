<?php
/**
 *    The template for displaying the header.
 *
 * @package    WordPress
 * @subpackage illdy
 */
?>
<?php
$logo_id                   = get_theme_mod( 'custom_logo' );
$logo_image                = wp_get_attachment_image_src( $logo_id, 'full' );
$text_logo                 = get_theme_mod( 'illdy_text_logo', __( 'Illdy', 'illdy' ) );
$jumbotron_general_image   = get_theme_mod( 'illdy_jumbotron_general_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-header.png' ) );
$jumbotron_type            = get_theme_mod( 'illdy_jumbotron_background_type', 'image' );
$jumbotron_single_image    = get_theme_mod( 'illdy_jumbotron_enable_featured_image', false );
$jumbotron_parallax_enable = get_theme_mod( 'illdy_jumbotron_enable_parallax_effect', true );
$preloader_enable          = get_theme_mod( 'illdy_preloader_enable', 1 );
$is_mobile_safari          = preg_match( '/(iPod|iPhone|iPad)/', $_SERVER['HTTP_USER_AGENT'] );
$accent_color              = get_theme_mod( 'epsilon_accent_color', '#f1d204' );

$style = '';

if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
	if ( $jumbotron_general_image && 'image' == $jumbotron_type ) {
		$style = 'background-image: url(' . esc_url( $jumbotron_general_image ) . ');';
	}
} elseif ( ( is_single() || is_page() ) && true == $jumbotron_single_image ) {

	global $post;
	if ( has_post_thumbnail( $post->ID ) ) {
		$style = 'background-image: url(' . esc_url( get_the_post_thumbnail_url( $post->ID, 'full' ) ) . ');';
	} elseif ( has_header_image() ) {
		$style = 'background-image: url(' . get_header_image() . ');';
	} else {
		$style = 'background-color: ' . $accent_color . ';';
	}
} elseif ( has_header_image() ) {
	$style = 'background-image: url(' . get_header_image() . ');';
} else {
	$style = 'background-color: ' . $accent_color . ';';
}

$url = get_theme_mod( 'header_image', get_theme_support( 'custom-header', 'default-image' ) );

// append the parallax effect
if ( $is_mobile_safari ) {
	$style .= 'background-attachment: scroll;';
} elseif ( $jumbotron_parallax_enable ) {
	$style .= 'background-attachment: fixed;';
}

if ( ( is_single() || is_page() || is_archive() ) && get_theme_mod( 'illdy_archive_page_background_stretch' ) == 2 ) {
	$style .= 'background-size:contain;background-repeat:no-repeat;';
}

$header_class = '';

if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
	$header_class = 'header-front-page';
} else {
	$header_class = 'header-blog';
}

if ( get_theme_mod( 'illdy_sticky_header_enable', false ) ) {
	$header_class .= ' header-has-sticky-menu';
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( 1 == $preloader_enable && ! is_customize_preview() ) : ?>
	<div class="pace-overlay"></div>
<?php endif; ?>
<header id="header" class="<?php echo $header_class; ?>" style="<?php echo $style; ?>">
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-8">

                     <div id="header-image">
                         <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                               <svg viewBox="0 0 512 211" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
                                   <g>
                                      <path d="M93.5520633,27.1031049 C87.5513758,34.2039183 77.9502759,39.8045599 68.349176,39.0044683 C67.1490386,29.4033684 71.849577,19.2021998 77.3502072,12.901478 C83.3508946,5.6006416 93.8520976,0.400045829 102.353071,0 C103.353186,10.0011457 99.4527392,19.8022685 93.5520633,27.1031049 Z M102.25306,40.904686 C88.3514675,40.1045943 76.4501041,48.8055911 69.8493479,48.8055911 C63.1485803,48.8055911 53.0474231,41.3047318 42.0461628,41.5047547 C27.7445244,41.7047776 14.4430006,49.8057057 7.14216427,62.7071836 C-7.8595543,88.5101396 3.24171744,126.714516 17.7433787,147.716922 C24.8441922,158.118114 33.345166,169.51942 44.5464492,169.119374 C55.1476637,168.719328 59.3481449,162.218584 72.1496114,162.218584 C85.0510894,162.218584 88.7515133,169.119374 99.9527965,168.919351 C111.554126,168.719328 118.854962,158.51816 125.955775,148.116968 C134.056703,136.315616 137.357081,124.814299 137.557104,124.21423 C137.357081,124.014207 115.154538,115.513233 114.954515,89.9103 C114.754492,68.5078482 132.45652,58.3066795 133.256612,57.7066108 C123.255466,42.9049151 107.653679,41.3047318 102.25306,40.904686 Z M182.56226,11.9013634 L182.56226,167.819225 L206.765033,167.819225 L206.765033,114.513118 L240.268871,114.513118 C270.872377,114.513118 292.37484,93.5107124 292.37484,63.1072295 C292.37484,32.7037465 271.272423,11.9013634 241.068963,11.9013634 L182.56226,11.9013634 Z M206.765033,32.3037007 L234.668229,32.3037007 C255.670635,32.3037007 267.67201,43.5049839 267.67201,63.2072409 C267.67201,82.909498 255.670635,94.2107926 234.568218,94.2107926 L206.765033,94.2107926 L206.765033,32.3037007 Z M336.579904,169.019363 C351.781646,169.019363 365.883261,161.31848 372.283994,149.117083 L372.784052,149.117083 L372.784052,167.819225 L395.186618,167.819225 L395.186618,90.2103344 C395.186618,67.7077565 377.184556,53.2060952 349.481382,53.2060952 C323.778438,53.2060952 304.776261,67.9077794 304.076181,88.1100938 L325.878678,88.1100938 C327.678884,78.5089939 336.579904,72.2082721 348.781302,72.2082721 C363.582998,72.2082721 371.883949,79.1090626 371.883949,91.8105177 L371.883949,100.411503 L341.680488,102.211709 C313.577269,103.911904 298.375528,115.413222 298.375528,135.415513 C298.375528,155.617827 314.077326,169.019363 336.579904,169.019363 Z M343.080649,150.517243 C330.179171,150.517243 321.978231,144.316533 321.978231,134.815444 C321.978231,125.014321 329.879137,119.313668 344.980867,118.413565 L371.883949,116.713371 L371.883949,125.514379 C371.883949,140.116051 359.482528,150.517243 343.080649,150.517243 Z M425.090044,210.224083 C448.692748,210.224083 459.794019,201.223052 469.495131,173.919924 L512,54.7062671 L487.397182,54.7062671 L458.893916,146.816819 L458.393859,146.816819 L429.890594,54.7062671 L404.587695,54.7062671 L445.592392,168.219271 L443.39214,175.120061 C439.691716,186.821402 433.691029,191.321918 422.989803,191.321918 C421.089585,191.321918 417.389162,191.121895 415.88899,190.921872 L415.88899,209.624014 C417.28915,210.02406 423.289838,210.224083 425.090044,210.224083 Z" ></path>
                                  </g>
                             </svg>
                         </a>
                  </div>

             </div>

				
		        <div class="col-sm-8 col-xs-4">
					<nav class="header-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary-menu',
								'menu'           => '',
								'container'      => false,
								'menu_class'     => 'clearfix',
								'menu_id'        => '',
							)
						);
						?>
					</nav>
					<button class="open-responsive-menu"><i class="fa fa-bars"></i></button>
				</div><!--/.col-sm-10-->
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.top-header-->
	<nav class="responsive-menu">
		<ul>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary-menu',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'items_wrap'      => '%3$s',
				)
			);
			?>
		</ul>
	</nav><!--/.responsive-menu-->
	<?php
	if ( get_option( 'show_on_front' ) == 'page' && is_front_page() ) {
		if ( 'video' == $jumbotron_type ) {
			get_template_part( 'sections/front-page', 'header-video' );
		} elseif ( 'slider' == $jumbotron_type ) {
			get_template_part( 'sections/front-page', 'header-slider' );
		}
		get_template_part( 'sections/front-page', 'bottom-header' );
	} else {
		get_template_part( 'sections/blog', 'bottom-header' );
	}
	?>
</header><!--/#header-->
