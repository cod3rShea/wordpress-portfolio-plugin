<?php
/**
 * The template for displaying all portfolio archive posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style='background-image: url("<?php the_post_thumbnail_url();?>")'>
	<header class="entry-header">
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

	<div class="entry-content">
		<?php
			// Get the taxonomy's terms
			$terms = get_terms(
			    array(
			        'taxonomy'   => 'portfolio-tags',
			        'hide_empty' => false,
			    )
			);
			
			// Check if any term exists
			if ( ! empty( $terms ) && is_array( $terms ) ) {
			    // Run a loop and print them all
			?>
				<h2> Built With:</h2>
				<?php 
			    foreach ( $terms as $term ) { ?>
			        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
			            <?php echo $term->name; ?>
			        </a><?php
			    }
			} 
		

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sean-shea-development' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
