<?php
/**
 * The template for displaying all portfolio archive posts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style='background-image: url("<?php the_post_thumbnail_url();?>")'>

	<div class="entry-content">
		<div class="overlay"> 
			<div class="text">
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
					// Get the taxonomy's terms
					$terms = get_terms( array( 'taxonomy'   => 'portfolio-tags', 'hide_empty' => false, ));

					// Check if any term exists
					if ( ! empty( $terms ) && is_array( $terms ) ) {
					    // Run a loop and print them all 
					    
						echo "<h2> Built With:</h2>";
						echo "<ul class='built-with'>";
					    $post_type = get_post_type(get_the_ID());   
					    $taxonomies = get_object_taxonomies($post_type);   
					    $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
					    if(!empty($taxonomy_names)) :
					       foreach($taxonomy_names as $tax_name) : ?>              
					          <li><?php echo $tax_name; ?> </li>
					       <?php endforeach;
					    endif;
						echo "</ul";
					}
					wp_link_pages( array('before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sean-shea-development' ), 'after'  => '</div>', ) );
				?>

			</div>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
