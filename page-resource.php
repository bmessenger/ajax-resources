<?php
/**
 * Template Name: Resource
 */

get_header();
?>

	<div id="primary" class="content-area resources">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );  

			endwhile; // End of the loop.
			?>

			<div class="container">
				<div class="filter-bar">
					<div class="row">
						<div class="col-lg-3">    
							<?php
							
							/* Set initial state of the Filter Bar */
							/* Check to see if coming from page with a GET var attached, if so, set the initial state to that taxonomy and filter the results */
							/* Added items to main nav under Resources to allow user to land on an already filtered page */
							/* Getting the term ID using the slug so we can test for an ID match when printing out the select list */
							!empty($_GET['type'])?$type = $_GET['type']:$type = null;
							
							
							!empty($type)?$initial = '':$initial='selected="true"';
								
							if( $terms = get_terms( array(
								'taxonomy' => 'resource-type', // to make it simple I use default categories
								'orderby' => 'name',
								'exclude' => array( 169 ),
							) ) ) :
								// if categories exist, display the dropdown
								echo '<label class="select">';
								echo '<select name="resourcefilter" class="resource-filter">';
								echo '<option value="" ' .$initial. ' disabled="disabled">Filter by Resource Type</option>';
								echo '<option value="all">All Resources</option>';
								foreach ( $terms as $term ) :
									$type == $term->slug?$selected='selected="true"':$selected='';
									echo '<option value="' . $term->slug . '" ' .$selected. '>' . $term->name . '</option>'; // ID of the category as an option value
								endforeach;
								echo '</select>';
								echo '</label>';
							endif;
							?>
						</div>
						<div class="col-lg-6">
							<?php get_template_part( 'searchform', 'resource' ); ?>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-9 col-md-8 mb-5 mb-md-0 position-relative">
						<div class="resources-filtered">
							<?php
							$args = array(
								'post_type'			=> 'resource',
								'posts_per_page'	=> -1,
								'post_status'		=> 'publish'
							);
							if( $type ) :
								$args['tax_query'] = array(
									array(
										'taxonomy' => 'resource-type',
										'field'    => 'slug',
										'terms'    => $type,
									),
								);
							endif;
							$resources = new WP_Query( $args );
							?>

							<?php if ( $resources->have_posts() ) : ?>

								<div class="row">
									<div class="loader"><img src="<?php echo get_template_directory_uri(); ?>/img/Generic-Loading.gif" alt="Generic loading gif" width="150px" height="150px"></div>
									<?php while ( $resources->have_posts() ) : $resources->the_post(); ?>

										<?php get_template_part( 'template-parts/content', 'resource' ); ?>

									<?php endwhile; wp_reset_postdata(); ?>
								</div>

							<?php endif; ?>
						</div>

					</div>
					<div class="col-lg-3 col-md-4 resource-sidebar">
						<?php get_sidebar('resources'); ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>