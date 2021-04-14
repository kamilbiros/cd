<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mbrn
 */

?>

<section class="page-section bg-dark text-light" id="kontakt">
	<div class="container-fluid">
		<div class="row justify-content-around">
			<div class="col-md-10">
				<h2 class="text-center text-white mt-0">Kontakt</h2>
				<hr class="divider light my-4">
			</div>
			

			<div class="col-lg-6 text-center">
				<p class="text-center display-3 mb-2"><i class="fas fa-map-marker-alt"></i></p>
				<h3 id="kontakt_text1_1"><?php echo get_theme_mod( 'kontakt_text1_1' ); ?></h3>
				<h4 class="mb-4" id="kontakt_text1_2"><?php echo get_theme_mod( 'kontakt_text1_2' ); ?></h4>
				<div class="text-white-70">
					<p class="lead mb-0" id="kontakt_text1_3"><?php echo get_theme_mod( 'kontakt_text1_3' ); ?></p>
					<p class="lead mb-0" id="kontakt_text1_4"><?php echo get_theme_mod( 'kontakt_text1_4' ); ?></p>
					<p class="lead mb-0" id="kontakt_text1_5"><?php echo get_theme_mod( 'kontakt_text1_5' ); ?></p>
				</div>
			</div>
			<div class="col-lg-3 text-center">
				<p class="text-center display-3 mb-2"><i class="far fa-user"></i></p>
				<h4 class="text-center my-3" id="kontakt_text2_1"><?php echo get_theme_mod( 'kontakt_text2_1' ); ?></h4>
				<div class="text-white-70">
					<p class="lead mb-0 my-3" id="kontakt_text2_2"><?php echo get_theme_mod( 'kontakt_text2_2' ); ?></p>
					<p class="lead mb-0" id="kontakt_text2_3"><i class="fas fa-phone-alt mr-2"></i> <?php echo get_theme_mod( 'kontakt_text2_3' ); ?></p>
					<p class="lead mb-0" id="kontakt_text2_4"><i class="far fa-paper-plane mr-2"></i> <?php echo get_theme_mod( 'kontakt_text2_4' ); ?></p>
				</div>

			</div>
			<div class="col-lg-3 text-center" >
				<p class="text-center display-3 mb-2"><i class="fas fa-phone-alt"></i></p>
				<h4 class="text-center my-3" id="kontakt_text3_1"><?php echo get_theme_mod( 'kontakt_text3_1' ); ?></h4>
				<div class="text-white-70">
					<p class="lead mb-0" id="kontakt_text3_2"><i class="fas fa-phone-alt mr-2"></i> <?php echo get_theme_mod( 'kontakt_text3_2' ); ?></p>
					<p class="lead mb-0" id="kontakt_text3_3"><i class="fas fa-fax mr-2"></i> <?php echo get_theme_mod( 'kontakt_text3_3' ); ?></p>
					<p class="lead mb-0" id="kontakt_text3_4"><i class="far fa-paper-plane mr-2"></i> <?php echo get_theme_mod( 'kontakt_text3_4' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

	

<?php wp_footer(); ?>


<!-- Bootstrap core JavaScript -->
  <script src="<?php bloginfo('stylesheet_directory')?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php bloginfo('stylesheet_directory')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php bloginfo('stylesheet_directory')?>/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php bloginfo('stylesheet_directory')?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php bloginfo('stylesheet_directory')?>/js/creative.min.js"></script>
  <script type="text/javascript">
  	$('.nav-link .dropdown-toggle').on('click',function(e){
  		e.preventDefault();
  	});
  	$('.menu-item-has-children').on('click',function(e){
  		e.preventDefault();
  		$('.menu-item-has-children').removeClass('menu-item');
  		
  	});
  </script>

</body>
</html>
