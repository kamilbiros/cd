<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbrn
 */

?>
<section class="page-section <?php if ( !is_singular() ) echo 'my-0 py-2' ?> " id="aktualnosci">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <div class="container">
	        <div class="row justify-content-center">
	        	<div class="col-lg-6 ">
	        	
					<header class="entry-header">
						<h2 class="mt-0 text-left">

						<?php
						if ( is_singular() ) :
							the_title();
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
						?>

						</h2>
	        			<hr class="divider">
	        			<?php
						if ( 'post' === get_post_type() ) :
							?>
					</header>
				</div>
				<div class="col-lg-12">	
						<div class="text-right mb-5">
							<i>
								<?php
								mbrn_posted_on();
								// mbrn_posted_by();
								?>
							</i>
						</div><!-- .entry-meta -->

						<?php endif; ?>
					</header><!-- .entry-header -->

					<?php mbrn_post_thumbnail(); ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 text-justify">
					<div class="entry-content">
						
						<?php
						if ( is_singular() ) :
						the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mbrn' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mbrn' ),
							'after'  => '</div>',
						) );
						?>

					</div>
				</div>
			</div>
		</div>
	</article>
</section>


<div class="container my-0 py-0">
	<div class="row justify-content-center">
		<div class="col-lg-10 text-right"> 
			<div class="entry-content">

				<?php
				else :
					the_excerpt();

				?>
				<div class="text-right">
					<a href="<?php echo esc_url( get_permalink() );?> " class="btn btn-primary btn-xl">Czytaj więcej...</a>
				</div>
					
					
				
				<?php
				endif;
				?>
			</div>
		</div>
	</div>
</div>
		
				
