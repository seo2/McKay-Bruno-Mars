<?php include('header.php') ?>
<body class="bg-blanco">
  <div class="container">
    <div class="row">
      <section class="ganadores">
			 <div class="content_ganadores clearfix">
				<div class="col-sm-12">
					<div class="row">
						<!-- <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-0">
							<img class="img-responsive" src="assets/img/logo125.png" alt="">
						</div> -->
						<div class="col-sm-12">
							<div class="row text-center">
								<h3>GANADORES</h3>
								<h4>REVISA AQUÍ LOS GANADORES</h4>
								<div class="texto_amarillo visible-xs">
										<p>*ganador sujeto a verificación</p>
									</div>
									<div class="linea-amarilla"></div>
							</div>
							<div class="row">
								<div class="col-sm-12" id="caja_ganadores">
									<div class="row head_caja">
										<div class="col-xs-4 text-center texto-gris hidden-xs hidden-sm">
											NOMBRE
										</div>
										<div class="col-xs-6 col-sm-4 text-center texto-gris visible-xs visible-sm">
											NOMBRE / RUT
										</div>
										<div class="col-xs-4 text-center texto-rojo hidden-xs">
											<div> RUT</div>
										</div>
										<div class="col-xs-6 col-sm-4 text-center texto-gris">
											Nº CÓDIGOS
										</div>
									</div>
								  <?php
								  	$resultado = $db->rawQuery('select * from mckaybruno_ganadores order by ganID DESC');
									if($resultado){
										foreach ($resultado as $r) {
											$mk125_ID   = $r["ganID"];
											$mk125_Nom  = $r["ganNom"];
											$mk125_Rut  = $r["ganRut"];
											$mk125_Fec  = $r["ganFec"];
											$ganCod  = $r["ganCod"];
									?>
									<div class="row content_caja">
										<div class="col-xs-6 col-sm-4 text-center caja_nom">
											<p>
												 <?php echo $mk125_Nom; ?>

											</p>
											<div class="visible-xs rut-xs">
												 <?php echo $mk125_Rut; ?>
											</div>

										</div>
										<div class="col-xs-4 text-center caja_rut hidden-xs">
											<p class="hidden-xs">
													<?php echo $mk125_Rut; ?>
											</p>
										</div>
										<div class="col-xs-6 col-sm-4 text-center caja_rut">
											<p>
													<?php echo $ganCod; ?>
											</p>
										</div>
									</div>
								<?php
										}
									}
								?>


								</div> <!-- caja ganadores -->
							</div>
						</div>

					</div>


				</div>




									<div class="texto_amarillo hidden-xs">
										<p>*ganador sujeto a verificación</p>
									</div>



            </div> <!-- content ganadores -->

        </section>

    </div><!-- row -->


  </div> <!-- container -->
  <div class="clearfix"></div>
<?php include('footer.php') ?>

