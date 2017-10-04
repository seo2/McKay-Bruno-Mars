<?php include('header.php') ?>
<body class="body-offcanvas" id="home">
	<div class="container" >
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

	<div class="container">
		<div class="row">
		 <div class="col-md-10 col-md-offset-1" id="formcod">
				<?php
						if( $detect->isMobile() && !$detect->isTablet() ){
							 include('include-form-codigo-mobile.php');
					}else{
								include('include-form-codigo-desk.php');
					}
					?>
			</div>
		</div> <!-- row -->

		<div class="row">
				<?php  include('include-form-ingreso-datos.php'); ?>
		</div><!-- row -->
	</div> <!-- container -->

		<?php  include('include-modal-mensaje.php'); ?>
		<?php  include('include-modal-instawin.php'); ?>
		<?php include('footer.php') ?>

