<?php include('header.php') ?>
<body class="body-offcanvas" id="home">

		<section class="call">
			<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<img src="assets/img/nuevo_llamado_desk.png" alt="" class="img-responsive center-block hidden-xs">
							<img src="assets/img/mobile_header.png" alt="" class="img-responsive center-block visible-xs">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="row">
								<div class="col-xs-8 col-xs-offset-2 visible-xs">
									<img src="assets/img/mobile_llamado.png" alt="" class="img-responsive center-block visible-xs">
								</div>
							</div>
						</div>
					</div>
			</div>
		</section>
	<div class="container-fluid nopad">
		<section class="box-formulario-codigo">
				<div class="container">

						<div class="row">
						 <div class="" id="formcod">
						      <?php
						        if( $detect->isMobile() && !$detect->isTablet() ){
						          // include('include-form-codigo-mobile.php');
						      }else{
						          //    include('include-form-codigo-desk.php');
						      }
						      ?>
						      <?php
						          //include('include-form-codigo-mobile.php');
						          include('include-form-codigo-desk.php');
						       ?>
						  </div>
						</div> <!-- row -->

				</div>
		</section>
		<section class="box-fila">
			<div class="container">

				seccion fila

			</div>
		</section> <!-- box fila -->

	</div>

	<div class="container nopad">
		<section class="banner-bruno">
				<img class="img-responsive center-block hidden-xs" src="assets/img/banner-bruno.png" alt="">
				<img class="img-responsive center-block visible-xs" src="assets/img/banner-bruno-xs.png" alt="">
		</section>

	</div>



		<section class="box-ingreso-datos">
			<div class="container">
					<div class="row">
							<?php  include('include-form-ingreso-datos.php'); ?>
					</div><!-- row -->
			</div>
		</section> <!-- box-ingreso-datos -->
		<?php  include('include-modal-mensaje.php'); ?>
		<?php  include('include-modal-instawin.php'); ?>
		<?php include('footer.php') ?>

