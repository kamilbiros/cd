<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbrn
 */

get_header();
?>

<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-6">
          <!-- <img class="img-fluid header-logo" src="img/mazowieckie.svg"> -->
          <h1 class="text-uppercase font-weight-bold">Mazowiecki Rejestr Nowotworów</h1>
          <!-- <hr class="divider my-4"> -->
        </div>
        <div class="col-lg-6">
          <img class="img-fluid" src="<?php bloginfo('stylesheet_directory')?>/img/header.svg">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <!-- <p class="text-white-75 font-weight-light mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p> -->
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#onas">Dowiedz się więcej</a>
        </div>
      </div>
    </div>
</header>

<section class="page-section text-dark" id="aktualnosci">
    <div class="container">
        <div class="row justify-content-around">
        	<div class="col-lg-10 text-center">
	        	<h2>Aktualności</h2>
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

<section class="page-section bg-primary" id="onas">
    <div class="container">
        <div class="row justify-content-center">
        	<div class="col-lg-10 text-center">
	        	<h2 class="text-white mt-0" id="onas_tytul"><?php echo get_theme_mod( "onas_tytul" ); ?></h2>
	        	<hr class="divider light mb-5">
	        </div>
	        <div class="col-lg-5">
		    	<p class="text-white-70 text-indent text-justify mb-4" id="onas_tresc_block1"><?php echo get_theme_mod( "onas_tresc_block1" ); ?></p>
		    </div>
		    <div class="col-lg-5">
		    	<p class="text-white-70 text-indent text-justify mb-4" id="onas_tresc_block2"><?php echo get_theme_mod( "onas_tresc_block2" ); ?></p>
		    </div>
		    <div class="text-center mt-lg-5 col-lg-5">
		    	<p class="text-white-70 text-justify mb-4"><img class="img-fluid" src="<?php bloginfo('stylesheet_directory')?>/img/chart.svg"></p>
		    </div>
		    <div class="text-center col-lg-5">
		    	<p class="text-white-70 text-indent text-justify mb-4" id="onas_tresc_block3"><?php echo get_theme_mod( "onas_tresc_block3" ); ?></p>
		    	<ul class="text-justify ml-0">
		    		<li class="text-white-70" id="onas_list1"><?php echo get_theme_mod( "onas_list1" ); ?>
		    			<ul class="text-justify ml-0">
				    		<li class="text-white-70" id="onas_list1_1"><?php echo get_theme_mod( "onas_list1_1" ); ?></li>
				    		<li class="text-white-70" id="onas_list1_2"><?php echo get_theme_mod( "onas_list1_2" ); ?></li>
		    			</ul>
		    		</li>
		    		<li class="text-white-70" id="onas_list2"><?php echo get_theme_mod( "onas_list2" ); ?></li>
		    		<li class="text-white-70" id="onas_list3"><?php echo get_theme_mod( "onas_list3" ); ?></li>

		    	</ul>
		    </div>
		</div>
		<div class="row justify-content-center" id="mbrn">
		    <div class="col-lg-10 mt-lg-5 text-center">
	        	<h2 class="text-white mt-0" id="mazowieckie_tytul"><?php echo get_theme_mod( "mazowieckie_tytul" ); ?></h2>
	        	<hr class="divider light my-4">
	        </div>
	        <div class="col-lg-4">
		    	<p class="text-white-70 text-indent text-justify mb-4" id="mazowieckie_blok1"><?php echo get_theme_mod( "mazowieckie_blok1" ); ?></p>
		    </div>
		    <div class="col-lg-4">
		    	<p class="text-white-70 text-indent text-justify mb-4" id="mazowieckie_blok1"><?php echo get_theme_mod( "mazowieckie_blok2" ); ?></p>
		    </div>
		    <div class="col-lg-4">
		    	<p class="text-white-70 text-indent text-justify mb-4" id="mazowieckie_blok1"><?php echo get_theme_mod( "mazowieckie_blok3" ); ?></p>
		    </div>
		</div>
		<div class="row justify-content-around">
		    <div class="col-offset-lg-2 col-lg-5 mt-lg-4">
		    	<p class="text-white-70 text-indent text-justify mb-4" id="mazowieckie_blok1"><?php echo get_theme_mod( "mazowieckie_blok4" ); ?></p>
		    	<p class="text-white-70 text-indent text-justify mb-4" id="mazowieckie_blok1"><?php echo get_theme_mod( "mazowieckie_blok5" ); ?></p>
		    </div>
		    <div class="col-lg-4 mt-lg-n5 text-left">
		    	<p class="text-white-70 text-left"><img class="img-fluid" src="<?php bloginfo('stylesheet_directory')?>/img/mazowieckie_light.svg"></p>
		    </div>
		</div>



		<!-- TEAM -->
		    
		<div class="row justify-content-center" id="zespol">

			<div class="col-lg-10 mt-lg-5 text-center">
	        	<h2 class="text-white mt-0" id="zespol_tytul"><?php echo get_theme_mod( "zespol_tytul" ); ?></h2>
	        	<hr class="divider light my-4">
	        </div>

			<!-- 1 -->
			<div class="col-xl-4 col-sm-6 mb-5">
	            <div class="bg-white rounded shadow-sm py-5 px-4"><div class="text-center"><i class="display-1 far fa-user mb-3"></i></div>
	                <h5 class="mb-0" id="zespol_imie1"><?php echo get_theme_mod( "zespol_imie1" ); ?></h5><span class="small text-uppercase text-muted">Kierownik</span>
	                <ul class="social mb-0 mx-2 list-inline mt-3">
	                    <li id="zespol_tel1"><span class="display-5 mr-3"><i class="fas fa-phone-alt"></i></span><?php echo get_theme_mod( "zespol_tel1" ); ?></li>
	                    <li id="zespol_email1"><span class="display-5 mr-3"><i class="far fa-paper-plane"></i></span> <?php echo get_theme_mod( "zespol_email1" ); ?></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <div class="row justify-content-center">
			<!-- 2 -->
			<div class="col-xl-4 col-sm-6 mb-5">
	            <div class="bg-white rounded shadow-sm py-5 px-4"><div class="text-center"><i class="display-1 far fa-user mb-3"></i></div>
	                <h5 class="mb-0" id="zespol_imie2"><?php echo get_theme_mod( "zespol_imie2" ); ?></h5><span class="small text-uppercase text-muted">Pracownik</span>
	                <ul class="social mb-0 mx-2 list-inline mt-3">
	                    <li id="zespol_tel2"><span class="display-5 mr-3"><i class="fas fa-phone-alt"></i></span><?php echo get_theme_mod( "zespol_tel2" ); ?></li>
	                    <li id="zespol_email2"><span class="display-5 mr-3"><i class="far fa-paper-plane"></i></span> <?php echo get_theme_mod( "zespol_email2" ); ?></li>
	                </ul>
	            </div>
	        </div>

	        <!-- 3 -->
			<div class="col-xl-4 col-sm-6 mb-5">
	            <div class="bg-white rounded shadow-sm py-5 px-4"><div class="text-center"><i class="display-1 far fa-user mb-3"></i></div>
	                <h5 class="mb-0" id="zespol_imie3"><?php echo get_theme_mod( "zespol_imie3" ); ?></h5><span class="small text-uppercase text-muted">Pracownik</span>
	                <ul class="social mb-0 mx-2 list-inline mt-3">
	                    <li id="zespol_tel3"><span class="display-5 mr-3"><i class="fas fa-phone-alt"></i></span><?php echo get_theme_mod( "zespol_tel3" ); ?></li>
	                    <li id="zespol_email3"><span class="display-5 mr-3"><i class="far fa-paper-plane"></i></span> <?php echo get_theme_mod( "zespol_email3" ); ?></li>
	                </ul>
	            </div>
	        </div>

	        <!-- 4 -->
			<div class="col-xl-4 col-sm-6 mb-5">
	            <div class="bg-white rounded shadow-sm py-5 px-4"><div class="text-center"><i class="display-1 far fa-user mb-3"></i></div>
	                <h5 class="mb-0" id="zespol_imie4"><?php echo get_theme_mod( "zespol_imie4" ); ?></h5><span class="small text-uppercase text-muted">Pracownik</span>
	                <ul class="social mb-0 mx-2 list-inline mt-3">
	                    <li id="zespol_tel4"><span class="display-5 mr-3"><i class="fas fa-phone-alt"></i></span><?php echo get_theme_mod( "zespol_tel4" ); ?></li>
	                    <li id="zespol_email4"><span class="display-5 mr-3"><i class="far fa-paper-plane"></i></span> <?php echo get_theme_mod( "zespol_email4" ); ?></li>
	                </ul>
	            </div>
	        </div>

	        <!-- 5 -->
			<div class="col-xl-4 col-sm-6 mb-5">
	            <div class="bg-white rounded shadow-sm py-5 px-4"><div class="text-center"><i class="display-1 far fa-user mb-3"></i></div>
	                <h5 class="mb-0" id="zespol_imie5"><?php echo get_theme_mod( "zespol_imie5" ); ?></h5><span class="small text-uppercase text-muted">Pracownik</span>
	                <ul class="social mb-0 mx-2 list-inline mt-3">
	                    <li id="zespol_tel5"><span class="display-5 mr-3"><i class="fas fa-phone-alt"></i></span><?php echo get_theme_mod( "zespol_tel5" ); ?></li>
	                    <li id="zespol_email5"><span class="display-5 mr-3"><i class="far fa-paper-plane"></i></span> <?php echo get_theme_mod( "zespol_email5" ); ?></li>
	                </ul>
	            </div>
	        </div>

	        <!-- 6 -->
			<div class="col-xl-4 col-sm-6 mb-5">
	            <div class="bg-white rounded shadow-sm py-5 px-4"><div class="text-center"><i class="display-1 far fa-user mb-3"></i></div>
	                <h5 class="mb-0" id="zespol_imie6"><?php echo get_theme_mod( "zespol_imie6" ); ?></h5><span class="small text-uppercase text-muted">Pracownik</span>
	                <ul class="social mb-0 mx-2 list-inline mt-3">
	                    <li id="zespol_tel6"><span class="display-5 mr-3"><i class="fas fa-phone-alt"></i></span><?php echo get_theme_mod( "zespol_tel6" ); ?></li>
	                    <li id="zespol_email6"><span class="display-5 mr-3"><i class="far fa-paper-plane"></i></span> <?php echo get_theme_mod( "zespol_email6" ); ?></li>
	                </ul>
	            </div>
	        </div>

	        <!-- 7 -->
			<div class="col-xl-4 col-sm-6 mb-5">
	            <div class="bg-white rounded shadow-sm py-5 px-4"><div class="text-center"><i class="display-1 far fa-user mb-3"></i></div>
	                <h5 class="mb-0" id="zespol_imie7"><?php echo get_theme_mod( "zespol_imie7" ); ?></h5><span class="small text-uppercase text-muted">Pracownik</span>
	                <ul class="social mb-0 mx-2 list-inline mt-3">
	                    <li id="zespol_tel7"><span class="display-5 mr-3"><i class="fas fa-phone-alt"></i></span><?php echo get_theme_mod( "zespol_tel7" ); ?></li>
	                    <li id="zespol_email7"><span class="display-5 mr-3"><i class="far fa-paper-plane"></i></span> <?php echo get_theme_mod( "zespol_email7" ); ?></li>
	                </ul>
	            </div>
	        </div>
	    </div>



		<div class="row justify-content-center">
		    <div class="text-center col-lg-8 mt-4">
		        <a class="btn btn-light btn-xl js-scroll-trigger" href="#biuletyny" id="onas_przycisk" style="<?php if( get_theme_mod( 'onas_przycisk_checkbox' ) == 1 ){ echo 'display:initial';} else{ echo 'display:none' ;}?>"><?php echo get_theme_mod( "onas_przycisk" ); ?></a>
        	</div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="page-section" id="biuletyny">
	<div class="container">
		<h2 class="text-center mt-0">Publikacje</h2>
		<hr class="divider my-4">
		<div class="col-md-8" >
			<h2 class="text-left text-muted mt-5" id="biuletyn_tytul"><?php echo get_theme_mod( "biuletyn_tytul" ); ?></h2>
		</div>
		<div class="row">
			<div style="<?php if(!empty(get_theme_mod( 'biuletyn_plik1' ))) {echo 'display:initial';} else{echo 'display:none';} ?>" class="col-lg-3 col-md-6 text-left">
				<div class="mt-5">
					<h3 class="h4 mb-2" id="biuletyn_rok1"><?php echo get_theme_mod( "biuletyn_rok1" ); ?></h3>
					<p class="text-muted mb-0">
						<a class="btn btn-primary shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik1' ); ?> " target="_blank">Otwórz</a>
						<a class="btn btn-light shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik1' ); ?> " download>Pobierz</a>
					</p>
				</div>
			</div>
			<div style="<?php if(!empty(get_theme_mod( 'biuletyn_plik2' ))) {echo 'display:initial';} else{echo 'display:none';} ?>" class="col-lg-3 col-md-6 text-left">
				<div class="mt-5">
					<h3 class="h4 mb-2" id="biuletyn_rok2"><?php echo get_theme_mod( "biuletyn_rok2" ); ?></h3>
					<p class="text-muted mb-0">
						<a class="btn btn-primary shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik2' ); ?> " target="_blank">Otwórz</a>
						<a class="btn btn-light shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik2' ); ?> " download>Pobierz</a>
					</p>
				</div>
			</div>
			<div style="<?php if(!empty(get_theme_mod( 'biuletyn_plik3' ))) {echo 'display:initial';} else{echo 'display:none';} ?>" class="col-lg-3 col-md-6 text-left">
				<div class="mt-5">
					<h3 class="h4 mb-2" id="biuletyn_rok3"><?php echo get_theme_mod( "biuletyn_rok3" ); ?></h3>
					<p class="text-muted mb-0">
						<a class="btn btn-primary shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik3' ); ?> " target="_blank">Otwórz</a>
						<a class="btn btn-light shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik3' ); ?> " download>Pobierz</a>
					</p>
				</div>
			</div>
			<div style="<?php if(!empty(get_theme_mod( 'biuletyn_plik4' ))) {echo 'display:initial';} else{echo 'display:none';} ?>" class="col-lg-3 col-md-6 text-left">
				<div class="mt-5">
					<h3 class="h4 mb-2" id="biuletyn_rok4"><?php echo get_theme_mod( "biuletyn_rok4" ); ?></h3>
					<p class="text-muted mb-0">
						<a class="btn btn-primary shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik4' ); ?> " target="_blank">Otwórz</a>
						<a class="btn btn-light shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'biuletyn_plik4' ); ?> " download>Pobierz</a>
					</p>
				</div>
			</div>
			
		</div>
		<div class="row justify-content-end mt-5">
			<div class="col-lg-8" id="raporty">
				<h3 class="text-right text-muted mt-5"><?php echo get_theme_mod( "raporty_tytul" ); ?></h3>
			</div>
			<div style="<?php if(!empty(get_theme_mod( 'raporty_plik1' ))) {echo 'display:initial';} else{echo 'display:none';} ?>" class="col-lg-6 text-right">
				<div class="mt-5">
					<p class="mb-2" id="raporty_nazwa1"><?php echo get_theme_mod( "raporty_nazwa1" ); ?></p>
					<p class="text-muted mb-0">
						<a class="btn btn-primary shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'raporty_plik1' ); ?> " target="_blank">Otwórz</a>
						<a class="btn btn-light shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'raporty_plik1' ); ?> " download>Pobierz</a>
					</p>
				</div>
			</div>

			<div style="<?php if(!empty(get_theme_mod( 'raporty_plik2' ))) {echo 'display:initial';} else{echo 'display:none';} ?>" class="col-lg-12 text-right">
				<div class="mt-5">
					<p class="mb-2" id="raporty_nazwa2"><?php echo get_theme_mod( "raporty_nazwa2" ); ?></p>
					<p class="text-muted mb-0">
						<a class="btn btn-primary shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'raporty_plik2' ); ?> " target="_blank">Otwórz</a>
						<a class="btn btn-light shadow-sm mt-2 js-scroll-trigger" href="<?php echo get_theme_mod( 'raporty_plik2' ); ?> " download>Pobierz</a>
					</p>
				</div>
			</div>
			
		</div>
	</div>

</section>

<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->	

<section class="page-section bg-secondary text-white py-5" id="linki">
	<div class="container">
		<div class="row justify-content-center">
			<!-- <a href="http://onkologia.org.pl/" class="mx-5 my-2 text-white-40">Krajowy Rejestr Nowotworów</a>	
			<a href="https://www.coi.pl/" class="mx-5 my-2 text-white-40 ">Centrum Onkologii Instytut</a>
			<a href="https://www.gov.pl/web/zdrowie/" class="mx-5 my-2 text-white-40 ">Ministerstwo Zdrowia</a>
			<a href="https://stat.gov.pl/" class="mx-5 my-2 text-white-40 ">Główny Urząd Statystyczny</a>
			<a href="https://icd.who.int/browse10/2016/en" class="mx-5 my-2 text-white-40 ">Klasyfikacja ICD-10</a>
			<a href="http://gco.iarc.fr/" class="mx-5 my-2 text-white-40 ">Global Cancer Observatory</a>
			<a href="http://ci5.iarc.fr/Default.aspx" class="mx-5 my-2 text-white-40 ">Cancer Incidence in Five Continents</a> -->

			<a href="<?php echo get_theme_mod( 'linki_link1' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link1"><?php echo get_theme_mod( 'linki_text1' ); ?></a>	
			<a href="<?php echo get_theme_mod( 'linki_link2' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link2"><?php echo get_theme_mod( 'linki_text2' ); ?></a>
			<a href="<?php echo get_theme_mod( 'linki_link3' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link3"><?php echo get_theme_mod( 'linki_text3' ); ?></a>
			<a href="<?php echo get_theme_mod( 'linki_link4' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link4"><?php echo get_theme_mod( 'linki_text4' ); ?></a>
			<a href="<?php echo get_theme_mod( 'linki_link5' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link5"><?php echo get_theme_mod( 'linki_text5' ); ?></a>
			<a href="<?php echo get_theme_mod( 'linki_link6' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link6"><?php echo get_theme_mod( 'linki_text6' ); ?></a>
			<a href="<?php echo get_theme_mod( 'linki_link7' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link7"><?php echo get_theme_mod( 'linki_text7' ); ?></a>
			<a href="<?php echo get_theme_mod( 'linki_link8' ); ?>" class="mx-5 my-2 text-white-40" id="linki_link8"><?php echo get_theme_mod( 'linki_text8' ); ?></a>
		</div>
	</div>
</section>

<?php

get_footer();
