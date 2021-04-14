<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbrn
 */

?>
<?php
	if (! is_front_page() ) :
?>
<section class="page-section" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	else :
?>
<section class="page-section py-0" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	endif;
?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<header class=" text-center entry-header">
					<?php
					if (! is_front_page() ) :
						?>
						
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<hr class="divider dark my-4">
						
						<?php
					endif;
					?>
					
				</header><!-- .entry-header -->
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-8">
				<?php mbrn_post_thumbnail(); ?>
			</div>
		</div>

		<div class="entry-content">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mbrn' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</div>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'mbrn' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</section><!-- #post-<?php the_ID(); ?> -->
