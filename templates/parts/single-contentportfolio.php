<?php
/**
 * The template for displaying all portfolio single posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="entry-content">
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
	<aside class="project-information">
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
		<?php 
			
			the_excerpt();
			
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

		?>
	</aside>

</article><!-- #post-<?php the_ID(); ?> -->
