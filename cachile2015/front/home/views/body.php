<div class="clear container">
	<div class="page-header title_section" id="hoy">
  	<h3>Partidos para hoy</h3>
  </div>
  <div class="page-header">
  	<h4 class="subtitle_section"><i class="fa fa-calendar"></i> <?php echo Home::dia_semana(date("Y-m-d")); ?></h4>
  </div>
  <?php if(!empty($para_hoy)) : ?>
  	<?php foreach($para_hoy as $hoy) : ?>
  <div class="row">
  	<div class="col-xs-3 col-sm-2">
    	<div class="col-xs-12 col-sm-12"><i class="fa fa-clock-o"></i> <?php echo $hoy['hora'] ?></div>
      <div class="col-xs-12 col-sm-12"><span>Hora de Colombia</span></div>
    </div>
    <div class="col-xs-2 col-sm-2">
    	<div class="col-xs-12 col-sm-6"><img src="<?php echo base_url($hoy['equipo1_imagen_path']) ?>" width="48" height="48" /></div>
			<div class="col-xs-12 col-sm-6"><?php echo $hoy['equipo1_nombre'] ?></div>
    </div>
    <div class="col-xs-2 col-sm-4">
    	<div class="col-xs-12 col-sm-12 text-center"><?php echo $hoy['goles_equipo1'] . " - " . $hoy['goles_equipo2'] ?></div>
    </div>
    <div class="col-xs-3 col-sm-2">
    	<div class="col-xs-12 col-sm-6"><img src="<?php echo base_url($hoy['equipo2_imagen_path']) ?>" width="48" height="48" /></div>
			<div class="col-xs-12 col-sm-6"><?php echo $hoy['equipo2_nombre'] ?></div>
    </div>
    <div class="col-xs-2 col-sm-2">
    	<?php echo $hoy['fase'] ?>
    </div>
  </div>
  	<?php endforeach; ?>
	<?php else: ?>
  <div class="row">
    <div class="col-xs-12 col-sm-12">No hay partidos programados para el día de hoy</div>
  </div>
  <?php endif; ?>
  <!-- Calendario -->
  <div class="page-header title_section" id="calendario">
  	<h3>Calendario</h3>
  </div>
  
  <div class="col-xs-12 col-sm-12 col-lg-12">
    <!-- Cuartos -->
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
    	<div class="page-header">
	      <h4>Cuartos</h4>
      </div>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[0]['equipo1_imagen_path']))?base_url($cuartos[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[0]['equipo1_nombre']))?$cuartos[0]['equipo1_nombre']:"Ganador 1A Vs. 2B";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[0]['goles_equipo1']))?$cuartos[0]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($cuartos[0]['fecha']))?explode("-", $cuartos[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-06-24") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 04"
          ?><br><?php
						echo (!empty($cuartos[0]['hora']))?$cuartos[0]['hora']:"06:30 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[0]['goles_equipo2']))?$cuartos[0]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[0]['equipo2_imagen_path']))?base_url($cuartos[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[0]['equipo2_nombre']))?$cuartos[0]['equipo2_nombre']:"Ganador 1C Vs. 2D";
					?></div>
        </div>
      </div>
      <br>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[1]['equipo1_imagen_path']))?base_url($cuartos[1]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[1]['equipo1_nombre']))?$cuartos[1]['equipo1_nombre']:"Ganador 1B Vs. 2A";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[1]['goles_equipo1']))?$cuartos[1]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($cuartos[2]['fecha']))?explode("-", $cuartos[1]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-06-25") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 05"
          ?><br><?php
						echo (!empty($cuartos[1]['hora']))?$cuartos[1]['hora']:"06:30 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[1]['goles_equipo2']))?$cuartos[1]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[1]['equipo2_imagen_path']))?base_url($cuartos[1]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[1]['equipo2_nombre']))?$cuartos[1]['equipo2_nombre']:"Ganador 1D Vs. 2C";
					?></div>
        </div>
      </div>
    </div>
    <!-- Semifinal -->
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
      <div class="page-header">
	      <h4>Semifinal</h4>
      </div>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($semifinal[0]['equipo1_imagen_path']))?base_url($semifinal[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($semifinal[0]['equipo1_nombre']))?$semifinal[0]['equipo1_nombre']:"Ganador Cuartos 2";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (!is_null($semifinal[0]['goles_equipo1']))?$semifinal[0]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($semifinal[0]['fecha']))?explode("-", $semifinal[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-06-29") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 29"
          ?><br><?php
						echo (!empty($semifinal[0]['hora']))?$semifinal[0]['hora']:"06:30 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (!is_null($semifinal[0]['goles_equipo2']))?$semifinal[0]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($semifinal[0]['equipo2_imagen_path']))?base_url($semifinal[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($semifinal[0]['equipo2_nombre']))?$semifinal[0]['equipo2_nombre']:"Ganador Cuartos 1";
					?></div>
        </div>
      </div>
    </div>
    <!-- Final -->
    <div class="col-xs-12 col-sm-4 col-lg-4 text-center">
    	<div class="page-header">
	      <h4>Final</h4>
      </div>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($final[0]['equipo1_imagen_path']))?base_url($final[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($final[0]['equipo1_nombre']))?$final[0]['equipo1_nombre']:"Ganador Semis 1";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (isset($final[0]))?((!is_null($final[0]['goles_equipo1']))?$final[0]['goles_equipo1']:"-"):"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($final[0]['fecha']))?explode("-", $final[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-07-04") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 04"
          ?><br><?php
						echo (!empty($final[0]['hora']))?$final[0]['hora']:"03:00 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (isset($final[0]))?(!is_null($final[0]['goles_equipo2']))?$final[0]['goles_equipo2']:"-":"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($final[0]['equipo2_imagen_path']))?base_url($final[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($final[0]['equipo2_nombre']))?$final[0]['equipo2_nombre']:"Ganador Semis 2";
					?></div>
        </div>
      </div>
      <br>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($final[1]['equipo1_imagen_path']))?base_url($final[1]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($final[1]['equipo1_nombre']))?$final[1]['equipo1_nombre']:"Perdedor Semis 1";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (isset($final[1]))?(!is_null($final[1]['goles_equipo1']))?$final[1]['goles_equipo1']:"-":"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($final[1]['fecha']))?explode("-", $final[1]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-07-03") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 03"
          ?><br><?php
						echo (!empty($final[1]['hora']))?$final[1]['hora']:"03:00 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (isset($fnal))?(!is_null($final[1]['goles_equipo2']))?$final[1]['goles_equipo2']:"-":"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($final[1]['equipo2_imagen_path']))?base_url($final[1]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($final[1]['equipo2_nombre']))?$final[1]['equipo2_nombre']:"Perdedor Semis 2";
					?></div>
        </div>
      </div>
    </div>
    <!-- Semifinal -->
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
      <div class="page-header">
	      <h4>Semifinal</h4>
      </div>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($semifinal[1]['equipo1_imagen_path']))?base_url($semifinal[1]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($semifinal[1]['equipo1_nombre']))?$semifinal[1]['equipo1_nombre']:"Ganador Cuartos 4";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (isset($semifinal[1]))?(!is_null($semifinal[1]['goles_equipo1']))?$semifinal[1]['goles_equipo1']:"-":"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($semifinal[1]['fecha']))?explode("-", $semifinal[1]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-06-30") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 30"
          ?><br><?php
						echo (!empty($semifinal[1]['hora']))?$semifinal[1]['hora']:"06:30 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (isset($semifinal[1]))?(!is_null($semifinal[1]['goles_equipo2']))?$semifinal[1]['goles_equipo2']:"-":"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($semifinal[1]['equipo2_imagen_path']))?base_url($semifinal[1]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($semifinal[1]['equipo2_nombre']))?$semifinal[1]['equipo2_nombre']:"Ganador Cuartos 3";
					?></div>
        </div>
      </div>
    </div>
    <!-- Cuartos -->
    <div class="col-xs-12 col-sm-2 col-lg-2 text-center">
      <div class="page-header">
	      <h4>Cuartos</h4>
      </div>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[2]['equipo1_imagen_path']))?base_url($cuartos[2]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[2]['equipo1_nombre']))?$cuartos[2]['equipo1_nombre']:"Ganador 1E Vs. 2F";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[2]['goles_equipo1']))?$cuartos[2]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($cuartos[2]['fecha']))?explode("-", $cuartos[2]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-06-26") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 26"
          ?><br><?php
						echo (!empty($cuartos[2]['hora']))?$cuartos[2]['hora']:"6:30 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[2]['goles_equipo2']))?$cuartos[2]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[2]['equipo2_imagen_path']))?base_url($cuartos[2]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[2]['equipo2_nombre']))?$cuartos[2]['equipo2_nombre']:"Equipo 1G Vs. 2H";
					?></div>
        </div>
      </div>
      <br>
      <div class="caja">
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[3]['equipo1_imagen_path']))?base_url($cuartos[3]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[3]['equipo1_nombre']))?$cuartos[3]['equipo1_nombre']:"Ganador 1F Vs. 2E";
					?></div>
        </div>
        <div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[3]['goles_equipo1']))?$cuartos[3]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div><?php
						$fec = (isset($cuartos[3]['fecha']))?explode("-", $cuartos[3]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2015-06-27") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 27"
          ?><br><?php
						echo (!empty($cuartos[3]['hora']))?$cuartos[3]['hora']:"06:30 PM";
          ?></div>
          <div>
          	<strong> <?php
						echo (!is_null($cuartos[3]['goles_equipo2']))?$cuartos[3]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado">
          <div><img src="<?php
          	echo (!empty($cuartos[3]['equipo2_imagen_path']))?base_url($cuartos[3]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div><?php
          	echo (!empty($cuartos[3]['equipo2_nombre']))?$cuartos[3]['equipo2_nombre']:"Equipo 1H Vs. 2G";
					?></div>
        </div>
      </div>
    </div>
  </div>
  <p>&nbsp;</p>
  <?php foreach($fechas as $fecha) : ?>
  <div class="page-header">
  	<h4 class="subtitle_section"><i class="fa fa-calendar"></i> <?php echo Home::dia_semana($fecha['fecha']); ?></h4>
  </div>
  	<?php foreach($calendario as $cal) : ?>
    	<?php if($cal['fecha'] == $fecha['fecha']) : ?>
  <div class="row">
  	<div class="col-xs-3 col-sm-2">
    	<div class="col-xs-12 col-sm-12"><i class="fa fa-clock-o"></i> <?php echo $cal['hora'] ?></div>
      <div class="col-xs-12 col-sm-12"><span>Hora de Colombia</span></div>
    </div>
    <div class="col-xs-2 col-sm-2">
    	<div class="col-xs-12 col-sm-6"><img src="<?php echo base_url($cal['equipo1_imagen_path']) ?>" width="48" height="48" /></div>
			<div class="col-xs-12 col-sm-6"><?php echo $cal['equipo1_nombre'] ?></div>
    </div>
    <div class="col-xs-2 col-sm-4">
    	<div class="col-xs-12 col-sm-12 text-center"><?php echo $cal['goles_equipo1'] . " - " . $cal['goles_equipo2'] ?></div>
    </div>
    <div class="col-xs-3 col-sm-2">
    	<div class="col-xs-12 col-sm-6"><img src="<?php echo base_url($cal['equipo2_imagen_path']) ?>" width="48" height="48" /></div>
			<div class="col-xs-12 col-sm-6"><?php echo $cal['equipo2_nombre'] ?></div>
    </div>
    <div class="col-xs-2 col-sm-2">
    	<?php echo $cal['fase'] ?>
    </div>
  </div>
      <?php endif; ?>
		<?php endforeach; ?>
  <?php endforeach; ?>
  <!-- Tablas de posiciones -->
  <div class="page-header title_section" id="posiciones">
  	<h3>Tabla de posiciones fase de grupos</h3>
  </div>
  <?php foreach($grupos as $grupo) : ?>
  <table width="100%" class="table">
    <caption class="pvm">Grupo <?php echo $grupo->nombre; ?></caption>
    <thead>
      <th class="text-center">Equipo</th>
      <th class="text-center">Pts.</th>
      <th class="text-center">PJ</th>
      <th class="text-center">PG</th>
      <th class="text-center">PE</th>
      <th class="text-center">PP</th>
      <th class="text-center">GF</th>
      <th class="text-center">GC</th>
      <th class="text-center">DG</th>
    </thead>
    <tbody>
    <?php
      $i = 1;
    ?>
    <?php foreach($posiciones as $equipo) : ?>
      <?php if($equipo->equipo_grupo_id == $grupo->id) : ?>
      <tr<?php echo ($i == 1 || $i==2)?' class="clasificado"':""; ?>>
        <td class="text-center">
          <div class="col-xs-12 col-sm-3"><img src="<?php echo base_url($equipo->equipo_imagen_path) ?>" width="48" height="48" /></div>
          <div class="col-xs-12 col-sm-9 text-left"><?php echo $equipo->equipo_nombre ?></div>
        </td>
        <td align="center"><?php echo $equipo->pts; ?></td>
        <td align="center"><?php echo $equipo->pj; ?></td>
        <td align="center"><?php echo $equipo->pg; ?></td>
        <td align="center"><?php echo $equipo->pe; ?></td>
        <td align="center"><?php echo $equipo->pp; ?></td>
        <td align="center"><?php echo $equipo->gf; ?></td>
        <td align="center"><?php echo $equipo->gc; ?></td>
        <td align="center"><?php echo $equipo->dg; ?></td>
      </tr>
        <?php $i++; ?>
      <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
  </table>
    <?php endforeach; ?>
</div>
    