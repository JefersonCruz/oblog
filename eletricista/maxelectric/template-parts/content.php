<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Maxelectric
 * @since Maxelectric 1.0
 */
 
$css = "";
if( ! has_post_thumbnail() ) {
	$css = "no-post-thumbnail";
}

$css_content = "";
if(get_the_content() != "" ){
	$css_content = "";
}
else {
	$css_content = " no-post-content";
}
$post_css = $css.$css_content;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_css); ?>>
	<div class="entry-cover">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?> <span class="sticky-post"><?php esc_html_e( 'Featured', "maxelectric" ); ?></span> <?php endif; ?>

		<?php get_template_part("template-parts/format","gallery"); ?>

		<?php get_template_part("template-parts/format","video"); ?>

		<?php get_template_part("template-parts/format","audio"); ?>

		<?php
		if( has_post_thumbnail() && ( get_post_format() != "audio" && get_post_format() != "video" && get_post_format() != "gallery" ) ) {

			if( is_single() ) {
				the_post_thumbnail('maxelectric_870_362');
			}
			else {
				?>
				<a href="<?php the_permalink(); ?>" class="post-thumbnail">
					<?php the_post_thumbnail('maxelectric_870_362'); ?>
				</a>
				<?php
			}
		} 
		?>
		<div class="entry-meta">
			<div class="post-date">
				<?php
				if (is_single() ) {
					?>
					<span><i class="icon icon-Agenda"></i><?php echo get_the_date('F j, Y'); ?></span>
					<?php
				}
				else {
					?>
					<a href="<?php the_permalink(); ?>" title="<?php echo get_the_date('F j, Y'); ?>"><i class="icon icon-Agenda"></i><?php echo get_the_date('F j, Y'); ?></a>
					<?php
				}
				?>
			</div>
			<div class="post-comment">
				<a href="<?php comments_link(); ?>" title="Comments">
					<i class="icon icon-Message"></i>
					<?php printf( _nx( 'One comments', '%1$s comments', get_comments_number(), 'comments title', "maxelectric" ), number_format_i18n( get_comments_number() ) ); ?>
				</a>
				</div>
		</div>
	</div>
	<?php 
		if ( !is_single() ) {
			the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
		}
	?>
	<div class="entry-content">
		<?php
			if( is_single() ) {
				/* translators: %s: Name of current post */
				the_content( sprintf(
					esc_html__( 'Continue reading %s', "maxelectric" ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "maxelectric" ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "maxelectric" ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			}
			else {
				echo wpautop( wp_kses( wp_html_excerpt( strip_shortcodes( get_the_content() ), 225, ' [...]' ),maxelectric_allowhtmltags() ) );
				?>
				<a href="<?php the_permalink(); ?>" title="<?php esc_html_e('Read More',"maxelectric"); ?>" class="read-more">
					<?php esc_html_e('Read More',"maxelectric"); ?>
				</a>
				<?php
			}
		?>
	</div>
	<?php
		if( is_single() ) {
			if( has_tag() && maxelectric_options('opt_post_tags') != "0" ) {
				?>
				<div class="tags">
					<span><?php esc_html_e('Tags : ',"maxelectric"); ?></span>
					<?php echo get_the_tag_list(' '); ?>
				</div>
				<?php
			}
			if( maxelectric_options('opt_post_category') != "0") {
				?>
				<div class="post-categories">
					<span><?php esc_html_e('Categories :',"maxelectric"); ?></span>
					<?php the_category( '  ' ); ?>
				</div>
				<?php
			}
			if( maxelectric_options('opt_post_author') != "0" ) {
				if(get_the_author_meta('description') != '' && get_avatar( get_the_author_meta( 'ID' ) != '' ) ) {
					?>
					<!-- Author Block -->
					<div class="author-block">
						<div class="author-box">
							<?php echo get_avatar( get_the_author_meta( 'ID' ) , 130 ); ?>
							<h5><?php echo get_the_author(); ?></h5>
							<?php if( get_user_meta( get_the_author_meta('ID'), 'maxelectric_user_userdesig', true ) != "" ) { ?><span><?php echo get_user_meta( get_the_author_meta('ID'), 'maxelectric_user_userdesig', true ); ?></span><?php } ?>
							<?php echo wpautop( wp_kses( get_the_author_meta('description'), maxelectric_allowhtmltags() ) ); ?>
						</div>
					</div><!-- Author Block /- -->
					<?php
				}
			}
		}
	?>
</article>