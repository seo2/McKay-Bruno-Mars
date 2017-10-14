<div class="estadio"> </div>

<div class="box-personas">
	<div class="container-outer">
		<div class="container-inner">
	    <ul>
	        <?php
		        
				date_default_timezone_set('America/Santiago');
			
				function nombre($lol){
					$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
					$resultado = $db->rawQuery("select * from mckay125_participantes where mk125_ID = $lol");
					if($resultado){
						foreach ($resultado as $r) {
							$participantes   = $r["mk125_nom"];
						}
					}  
					return $participantes;
				}
				function id_x_rut($lol){
					$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
					$resultado = $db->rawQuery("select * from mckay125_participantes where mk125_rut LIKE '%$lol%'");
					if($resultado){
						foreach ($resultado as $r) {
							$participantes   = $r["mk125_ID"];
						}
					}  
					return $participantes;
				}
				
		        $weeknumber = date("W");
		        $i 	= 0;
		        $lugar = 0;
/* 		        $weeknumber = 38; */
		        if($_GET['rut']){
			        $codUS = id_x_rut($_GET['rut']);
			        
					$sql = "SELECT COUNT( * ) AS total, WEEK( codTS ) AS week_number, codUS FROM mckay125_codigos WHERE WEEK( codTS ) = $weeknumber GROUP BY codUS ORDER BY total DESC" ;
		        }else{
					$sql = "SELECT COUNT( * ) AS total, WEEK( codTS ) AS week_number, codUS FROM mckay125_codigos WHERE WEEK( codTS ) = $weeknumber GROUP BY codUS ORDER BY total DESC LIMIT 100" ;   
		        }
				$semanas = $db->rawQuery($sql);
				if($semanas){
					foreach ($semanas as $s) {
						$codigos_semana = $s["total"];
						$i++;
						$ok = 0;
						$sale = 0; 
						if($_GET['rut']){
							if($codUS == $s["codUS"]){
								$ok = 1;
								$sale = 1;
							}
						}else{
							$ok = 1;
						}
						if($ok == 1){ 
							$lugar++;
		    ?>
			<li>
				<a href="javascript:void(0);" data-posicion="<?php echo $lugar; ?>">
					<div class="lugar">
						<div class="num_circle"><?php echo $i; ?></div>
							<div class="nombre-codigo">
							<p><?php echo nombre($s["codUS"]); ?> <span class="codigo"><?php echo $codigos_semana; ?> códigos</span></p>
						</div>
					</div>
					<div class="persona-activa"></div>
					<img src="assets/img/persona.png" alt="">
				</a>
			</li>
			<?php		}
						if($sale==1){
							break;
						}
					}
				}
			?>
	    </ul>
	    <?php if($lugar==0){ ?>
	    <p class="nota">No existen resultados para mostrar.</p>
	    <?php } ?>
	   </div>
	</div>
	<input id="range" type="range" name="range" min="0" max="10">
</div>




