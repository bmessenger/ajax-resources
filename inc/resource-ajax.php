<?php
/** Resources Page - Filter Resources by Resource Type
***************************************************************/
add_action( 'wp_ajax_nopriv_resources', 'resources_ajax' );
add_action( 'wp_ajax_resources', 'resources_ajax');

function resources_ajax() {

	if ( isset($_POST['type'] ) ) :
		
		$args = array(
			'post_type'			=> 'resource',
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish'
		);
		
		$type = $_POST['type'];
		
		if ( $type != 'all' ) :
			$args['tax_query'] = array(
					array(
						'taxonomy' => 'resource-type',
						'field'    => 'slug',
						'terms'    => $type,
					),
				);
		endif;

		$resources = new WP_Query( $args );

		if ( $resources->have_posts() ) :

			echo '<div class="row">';
				echo '<div class="loader"><img src="' .get_template_directory_uri(). '/img/Generic-Loading.gif" width="150px" height="150px"></div>';
				while ( $resources->have_posts() ) : $resources->the_post();
					get_template_part( 'template-parts/content', 'resource' );
				endwhile;
				wp_reset_postdata();
			echo "</div>";

		endif;

	endif;

	die;

};

/** Resources Page - Search Resources
***************************************************************/
add_action( 'wp_ajax_nopriv_resource_search_results', 'resources_ajax_search' );
add_action( 'wp_ajax_resource_search_results', 'resources_ajax_search');

function resources_ajax_search() {

	$query = $_POST['query'];

		$args = array(
		'post_type' => 'resource',
		'post_status' => 'publish',
		's' => $query
	);
	$search = new WP_Query( $args );

	if ( $search->have_posts() ) :

		echo '<div class="row">';
			echo '<div class="loader"><img src="' .get_template_directory_uri(). '/img/Generic-Loading.gif" width="150px" height="150px"></div>';
			while ( $search->have_posts() ) : $search->the_post();
				get_template_part( 'template-parts/content', 'resource' );
			endwhile;
			wp_reset_postdata();
		echo "</div>";

	endif;

	die;

};