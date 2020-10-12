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
$project_details = get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_portfolio_grp', true );
?>
<?php
	if( is_tax() || !is_single() ) {
		if( has_post_thumbnail() ) {
			?>
			<div class="col-md-4 col-sm-4 col-xs-6 gallery-section">
				<div class="content-image-block">
					<?php 
					
						$url = esc_url( get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_portfolio_video_embed', 1 ) );
						if($url != "" ) {
							echo wp_oembed_get( $url );
						}
						else{
							the_post_thumbnail('maxelectric_476_477');
						}
					?>
					<div class="content-block-hover">
						<?php
							if($url != "" ){
								?>
								<a class="popup-video" href="<?php echo esc_url(esc_url( get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_portfolio_video_embed', 1 ) ) ); ?>" title="<?php the_title(); ?>">
									<i class="icon icon-Search"></i>
								</a>
								<?php
							}
							else {
								?>
								<a class="zoom-in" href="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id( maxelectric_get_the_ID() ) ) ); ?>" title="<?php the_title(); ?>"><i class="icon icon-Search"></i></a>
								<?php
							}
						?>
						<h5>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h5>
					</div>
				</div>
			</div>
			<?php
		}
	}
	else {
		?>
		<!-- Gallery Single -->
		<div class="gallery-single">
			<div class="gallery-single-content">
				<div class="col-md-8 col-sm-6 col-xs-12">
					<h5>
						<?php esc_html_e('project ',"maxelectric");?>
						<span><?php esc_html_e('Details',"maxelectric"); ?></span>
					</h5>
					<?php
						if( get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_single_img_id', true ) ) { 
							echo wp_get_attachment_image( get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_single_img_id', true ), "maxelectric_756_499" ); 
						}
						else {
							the_post_thumbnail( 'maxelectric_756_499' );
						}
					?>
				</div>
				<?php
					if($project_details != "" ) {
						?>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="project-detail">
								<?php
									if( count( $project_details ) > 0 && is_array( $project_details ) ) {
										foreach ( (array) $project_details as $key => $value ) {	
											?>
											<div class="project-box">
												<?php 
													if ( isset( $value['icon_class'] ) ){
														?>
														<i class="<?php echo esc_attr( $value['icon_class'] ); ?>"></i>
														<?php
													}
													if ( isset( $value['single_title'] ) ){
														?>
														<h6><?php echo esc_attr( $value['single_title'] ); ?></h6>
														<?php
													}
													if ( isset( $value['single_value'] ) ){
														?>
														<span><?php echo esc_attr( $value['single_value'] );?></span>
														<?php
													}
												?>
											</div>
											<?php 
										}
									}
								?>
							</div>
						</div>
						<?php
					}
				?>
			</div>
			<div class="project-description col-md-12">
				<h5>
					<?php esc_html_e('Project ',"maxelectric"); ?>
					<span><?php esc_html_e('Description',"maxelectric"); ?></span>
				</h5>
				<?php
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
				?>
			</div>
			<?php 
			$terms = get_the_terms( $post->ID , 'maxelectric_portfolio_tax', 'string');
			$term_ids = wp_list_pluck( $terms,'term_id' );
			
			$qry = new WP_Query( array(
				'post_type' => 'maxele_portfolio',
				'posts_per_page' => 4,
				'tax_query' => array(
					array(
						'taxonomy' => 'maxelectric_portfolio_tax',
						'field' => 'id',
						'terms' => $term_ids,
						'operator'=> 'IN'
					)
				),
			) );
			
			if( $qry->have_posts() ) {
				?>
				<div class="related-images col-md-12">
					<h5><?php esc_html_e('Similar ',"maxelectric"); ?>
					<span><?php esc_html_e('items',"maxelectric"); ?></span>
				</h5>
					<!-- Row -->
					<div class="row">
						<?php
							while( $qry->have_posts() ) : $qry->the_post();
								?>				
								<div class="col-md-3 col-sm-4 col-xs-4">
									<a href="<?php the_permalink(); ?>">
										<?php 
											$url = esc_url( get_post_meta( maxelectric_get_the_ID(), 'maxelectric_cf_portfolio_video_embed', 1 ) );
											if($url != "" ) {
												echo wp_oembed_get( $url );
											}
											else {
												the_post_thumbnail("maxelectric_270_247"); 
											}
										?>
									</a>
								</div>
								<?php
							endwhile;

							// Restore original Post Data
							wp_reset_postdata();
						?>
					</div><!-- Row /- -->
				</div>
				<?php
			}
			?>
		</div><!-- Gallery Single /- -->
		<?php
	}
?>