<?php
		include('header.php');
		include('sidebar.php');
		?>
 <?php
	function total_codigos($mk125_ID){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
		$total = 0;
	  	$resultado = $db->rawQuery("select count(*) as total from mckay125_codigos where codUS = $mk125_ID");
		if($resultado){
			foreach ($resultado as $r) {
				$total   = $r["total"];
		
			}
		} 
		return $total;
	}  
	function codigo_ganador($mk125_ID){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
		$total = 0;
	  	$resultado = $db->rawQuery("select * from mckay125_codigos where codUS = $mk125_ID");
		if($resultado){
			foreach ($resultado as $r) {
				$codigo   = $r["total"];
		
			}
		} 
		return $total;
	}  
	
		function region($id){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery('select * from region where region_id = '.$id);
		if($resultado){
			foreach ($resultado as $r) {
				$region   = $r["region_nombre"];
			}
		}   
		return $region;
	}
	                        
?>
		<!-- start: Content -->
		<div class="main">
			
				
			<div class="row">		
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading" data-original-title>
							<h2><i class="fa fa-user"></i><span class="break"></span>Participantes con Instawin</h2>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered datatable">
							  <thead>
								  <tr>
<!-- 									  <th>ID</th> -->
									<th>Ingreso</th>
									  <th>Participante</th>
									  <th>Código</th>
									  <th>Sueño</th>
									  <th>Códigos</th>
								  </tr>
							  </thead>   
							  <tbody>
								  <?php
								  	$resultado = $db->rawQuery('select * from mckay125_participantes where mk125_gan = 1');
									if($resultado){
										foreach ($resultado as $r) {
											$mk125_ID   = $r["mk125_ID"];
											$mk125_Nom  = $r["mk125_nom"];
											$mk125_Rut  = $r["mk125_rut"];
											$mk125_FN   = $r["mk125_fn"];
											$mk125_Mail = $r["mk125_mail"];
											$mk125_Fono = $r["mk125_fono"];
											$mk125_reg  = $r["mk125_reg"];
											$mk125_cat  = $r["mk125_cat"];
											$mk125_gan  = $r["mk125_gan"];
											$ok = 0;
											$codigo   = "";
											$hora	  = "";
											$rts	  = "";
										  	$resultado = $db->rawQuery("select * from mckay125_codigos where codUS = $mk125_ID and codGan = 1");
											if($resultado){
												foreach ($resultado as $r) {
													$codigo   = $r["codCod"];
													$hora	  = $r["codHora"];
													$rts	  = $r["codRTS"];
													$ok		  = 1;
												}
											}else{
/*
											  	$resultado = $db->rawQuery("select * from mckay125_codigos where codUS = $mk125_ID ORDER BY codID DESC");
												if($resultado){
													foreach ($resultado as $r) {
														$codigo   = $r["codCod"];
														$hora	  = $r["codHora"];
														$rts	  = $r["codRTS"];
													}
												}
*/
											} 
									?>
								<tr>
<!-- 									<td><?php echo $mk125_ID; ?></td> -->
									<td><?php echo $rts; ?></td>
									<td><a href="codigos.php?mk125_ID=<?php echo $mk125_ID; ?>"  class="text-capitalize"><?php echo strtolower($mk125_Nom) ?></a><br><?php echo strtolower($mk125_Mail); ?><br>RUT: <?php echo $mk125_Rut; ?><br>Fec. Nac.:<?php echo $mk125_FN; ?><br>Fono: <?php echo $mk125_Fono; ?><br>Región <?php echo region($mk125_reg); ?></td>
									<td><strong><?php echo $codigo; ?></br><?php echo $hora; ?><strong></td>									<td><?php echo $mk125_cat; ?></td>
									<td><?php echo total_codigos($mk125_ID); ?></td>
								</tr>   
								<?php  
										}
									}                           
								?>
							  </tbody>
							</table>  
   
						</div>
					</div>
				</div><!--/col-->
			</div><!--/row-->
			

				
		</div>
		<!-- end: Content -->
		
		
		<footer>

			<div class="row">

				<div class="col-sm-5">
					&copy; 2017 Seo2
				</div><!--/.col-->

				
			</div><!--/.row-->	

		</footer>
		
				<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>Here settings can be configured...</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<!-- start: JavaScript-->
		<!--[if !IE]>-->

				<script src="assets/js/jquery-2.1.1.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>

			<script src="assets/js/jquery-1.11.1.min.js"></script>

		<![endif]-->

		<!--[if !IE]>-->

			<script type="text/javascript">
				window.jQuery || document.write("<script src='assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
			</script>

		<!--<![endif]-->

		<!--[if IE]>

			<script type="text/javascript">
		 	window.jQuery || document.write("<script src='assets/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
			</script>

		<![endif]-->
		<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<script src="assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script>
		<script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script> 
		<script src="assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
	

		<!-- theme scripts -->
		<script src="assets/plugins/pace/pace.min.js"></script>
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
	<!-- inline scripts related to this page -->
	<script src="assets/js/pages/table.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.min.js"></script>
		<script src="assets/js/demo.min.js"></script>

		<!-- Scritps de Seo2 -->
		<script src="assets/js/sweetalert.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/jquery.Rut.min.js"></script>
		<script src="assets/js/cloudcore.js"></script>
		<!-- end: JavaScript-->

	</body>
</html>
