<div class="estadio"> </div>

<div class="box-personas">
  <div class="container-outer">
     <div class="container-inner">
        <ul>
	        <?php  
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
		        $weeknumber = date("W"); 
		        $i = 0;
				$sql = "SELECT COUNT( * ) AS total, WEEK( codTS ) AS week_number, codUS FROM mckay125_codigos WHERE WEEK( codTS ) = 38 GROUP BY codUS ORDER BY total DESC LIMIT 100" ;
				$semanas = $db->rawQuery($sql);
				if($semanas){
					foreach ($semanas as $s) {
						$codigos_semana = $s["total"];
						$i++;
		    ?>    
			<li>
				<a href="javascript:void(0);">
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
			<?php					
					}
				}   
			?>

        </ul>
       </div>
      </div>
      <input id="range" type="range" name="range" min="0" max="100">
</div>




