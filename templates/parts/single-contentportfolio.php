<?php
/**
 * The template for displaying all portfolio single posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<?php 
		$interior_header = get_field('interior_header', 'option');
	?>
	<header class="entry-header interior-banner entry-heade" style="background-image: url(<?php echo $interior_header; ?>)">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				sean_shea_development_posted_on();
				sean_shea_development_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="grid wp-block-columns has-2-columns">
		<div class="entry-content wp-block-column">
			<?php
				// Get the taxonomy's terms
				$terms = get_terms(
				    array(
				        'taxonomy'   => 'portfolio-tags',
				        'hide_empty' => false,
				    )
				);
						
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'sean-shea-development' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sean-shea-development' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		<aside class="project-information wp-block-column">
			<?php 
				
				$about_your_portfolio = get_field('about_your_portfolio');

				if ($about_your_portfolio !="") {
					echo $about_your_portfolio;
				}

				// Check if any term exists
				if ( ! empty( $terms ) && is_array( $terms ) ) {
				    // Run a loop and print them all
				?>
					<h2> Built With:</h2>
					<ul class="built-with">
					<?php 
						$post_type = get_post_type(get_the_ID());   
					    $taxonomies = get_object_taxonomies($post_type);   
					    $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
					    if(!empty($taxonomy_names)) :
					       foreach($taxonomy_names as $tax_name) : ?>              
					          <p><?php echo $tax_name; ?> </p>
					       <?php endforeach;
					    endif;
				    ?>
					</ul>
				<?php } ?>
		</aside>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
