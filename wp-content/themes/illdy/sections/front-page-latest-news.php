<?php
/**
 *    The template for displaying the latest news section in front page.
 *
 * @package    WordPress
 * @subpackage illdy
 */
?>
<?php

$blog_page_id = get_option( 'page_for_posts' );
$button_url   = '#';
if ( $blog_page_id ) {
	$button_url = get_permalink( $blog_page_id );
}
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title   = get_theme_mod( 'illdy_latest_news_general_title', __( 'Latest News', 'illdy' ) );
	$general_entry   = get_theme_mod( 'illdy_latest_news_general_entry', __( 'If you are interested in the latest articles in the industry, take a sneak peek at our blog. You have got nothing to loose!', 'illdy' ) );
	$button_text     = get_theme_mod( 'illdy_latest_news_button_text', __( 'See blog', 'illdy' ) );
	$number_of_posts = get_theme_mod( 'illdy_latest_news_number_of_posts', absint( 3 ) );
} else {
	$general_title   = get_theme_mod( 'illdy_latest_news_general_title' );
	$general_entry   = get_theme_mod( 'illdy_latest_news_general_entry' );
	$button_text     = get_theme_mod( 'illdy_latest_news_button_text' );
	$number_of_posts = get_theme_mod( 'illdy_latest_news_number_of_posts', absint( 3 ) );
}

$number_of_words = get_theme_mod( 'illdy_latest_news_words_number', absint( 20 ) );

$post_query_args = array(
	'post_type'              => array( 'post' ),
	'nopaging'               => false,
	'posts_per_page'         => absint( $number_of_posts ),
	'ignore_sticky_posts'    => true,
	'cache_results'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => true,
);

$post_query = new WP_Query( $post_query_args );

if ( $post_query->have_posts() || '' != $general_title || '' != $general_entry || '' != $button_text ) {

	?>

	<section id="latest-news" class="front-page-section">
		<div class="section-header">
			<div class="container">
				<div class="row">
					<?php if ( $general_title ) : ?>
						<div class="col-sm-12">
							<h3><?php echo do_shortcode( wp_kses_post( $general_title ) ); ?></h3>
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if ( $general_entry ) : ?>
						<div class="col-sm-10 col-sm-offset-1">
							<div class="section-description"><?php echo do_shortcode( wp_kses_post( $general_entry ) ); ?></div>
						</div><!--/.col-sm-10.col-sm-offset-1-->
					<?php endif; ?>
				</div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.section-header-->
		<?php if ( $button_text ) : ?>
			<a href="<?php echo esc_url( $button_url ); ?>" title="<?php echo esc_attr( $button_text ); ?>" class="latest-news-button"><i class="fa fa-chevron-circle-right"></i><?php echo esc_html( $button_text ); ?>
			</a>
		<?php endif; ?>

<?php if ( $post_query->have_posts() ) : ?>
			<div class="section-content">
				<div class="container" style="width:100%;display:flex;justify-content:center;">
					<div class="row brd" style="width:100%;">
						<?php $counter = 0; ?>
						<?php while ( $post_query->have_posts() ) : ?>
							<?php $post_query->the_post(); ?>
							<?php $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'illdy-front-page-latest-news' ); ?>

							<div class="col-md-6 col-xs-12">
								<div class="embed fb-video" data-href="https://www.facebook.com/pepsi/videos/vb.339150749455906/317971252092544/?type=3&amp;theater"  data-show-text="true"><blockquote cite="https://www.facebook.com/pepsi/videos/317971252092544/" class="fb-xfbml-parse-ignore">
									<a href="https://www.facebook.com/pepsi/videos/317971252092544/">
							Pepsi Presents | The PUMA x Pepsi Collection</a>
							<p>Legacies never go out of style. A walk down a city street reveals that the PUMA x Pepsi collection shines, pops, and flexes in every era. &#064;Pepsi &#064;Puma #pumaxpepsi Capsule collection available at participating retailers.</p>Posted by 
							<a href="https://www.facebook.com/pepsi/">Pepsi</a> on Friday, October 5, 2018</blockquote>
						        </div>
					        </div>


							<div class="col-md-6 col-xs-12 embed">
								<a class="twitter-timeline" data-width="500" height="500" data-theme="light" href="https://twitter.com/Tesla?ref_src=twsrc%5Etfw">Tweets by Tesla
								</a> 

								<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

			                </div>

							
							<?php $counter ++; ?>
						<?php endwhile; ?>
					</div><!--/.row-->
				</div><!--/.container-->
			</div><!--/.section-content-->
		  <?php endif; ?>
		  <?php wp_reset_postdata(); ?>
	</section><!--/#latest-news.front-page-section-->
<?php }// End if().
	?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
