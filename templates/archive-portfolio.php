<?php
/**
 * The template for displaying all portfolio archive posts
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			<?php 
				$interior_header = get_field('interior_header', 'option');
			?>
			<header class="page-header interior-banner entry-header" style="background-image: url(<?php echo $interior_header; ?>) ">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			echo "<div class='grid'>";
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					
						include( plugin_dir_path( __FILE__ ) . 'parts/archive-contentportfolio.php');
				
				endwhile;
			echo "</div>"; // end grid
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
