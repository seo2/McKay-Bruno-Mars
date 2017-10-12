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
			</div>
		</section>
	<div class="container-fluid nopad">
		<section class="box-formulario-codigo">
				<div class="container">
						<div class="row">
						 <div class="" id="formcod">
						      <?php
						        if( $detect->isMobile() && !$detect->isTablet() ){
						          include('include-form-codigo-mobile.php');
						      }else{
						          include('include-form-codigo-desk.php');
						      }
						      ?>
						  </div>
						</div> <!-- row -->
				</div>
		</section>
		<section class="box-fila">
			<div class="container">
				<form id="busca-nombre" class="form-inline hidden-xs">
							<div class="form-group">

							  <input type="email" class="form-control" id="name" placeholder="Ingresa tu nombre">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-default bt-buscar">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>

							</div>
				</form> <!-- busca nombre -->

				<form id="busca-nombre2" class="form-inline">

								<div class="row">
											<div class="col-xs-2">
												<img class="img-responsive" src="assets/img/estadio.png" alt="">
											</div>
										<div class="col-xs-8">
											<div class="form-group">
												<input type="email" class="form-control" id="name" placeholder="Ingresa tu nombre">
											</div>
										</div>
										<div class="col-xs-2">
												<div class="form-group">
													<button type="submit" class="btn btn-default bt-buscar">
														<i class="fa fa-search" aria-hidden="true"></i>
													</button>
												</div>
										</div>
								</div>



				</form> <!-- busca nombre -->



				<div class="hidden-xs hidden-sm">
						<?php include('include-section-fila-desk.php') ?>
				</div>
				<div class="visible-xs visible-sm">
						<?php include('include-section-fila-xs.php') ?>
				</div>
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

