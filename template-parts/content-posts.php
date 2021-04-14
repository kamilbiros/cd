<section class="page-section text-dark" id="aktualnosci">
    <div class="container">
        <div class="row justify-content-around">
        	<div class="col-lg-10 text-center">
	        	<h2 id="onas_tytul">Aktualności</h2>
	        	<hr class="divider mb-5">
	        </div>

        		<?php

				// New query
				$custom_query = new WP_Query(array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'order' => 'DESC'
				));

				if ($custom_query->have_posts()) :
					while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
					<div class="col-md-4 mr-0">
						<a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail') ?></a>

						<div class="text-left">
							<a href="<?php the_permalink();?>"><h5><?php the_title(); ?></h5></a>
						</div>
						<div class="text-justify">
							<p><?php the_excerpt(); ?></p>
						</div> 
						<div class="text-right">
							<a class="btn btn-sm btn-primary shadow-sm" href="<?php the_permalink();?>">Czytaj więcej...</a>
						</div>
					</div>
					
					

					<?php 
					endwhile;
						
				endif;
				wp_reset_postdata(); ?>

        </div>
        <div class="row justify-content-center text-center mt-5">
			<div class="col-lg-8 align-self-baseline">

      			<a class="btn btn-primary btn-xl js-scroll-trigger" href="/mbrn/aktualnosci">Zobacz wszystkie</a>
      		</div>
      	</div>
    </div>
</section>