<div class="body" id="hoy">
	<h3>Calendario para hoy</h3>
  <div class="fechas">
    <h4>
      <div class="fl ov mr"><i class="fa fa-calendar"></i></div>
      <?php echo Home::dia_semana(date("Y-m-d")); ?>
    </h4>
		<?php if(!empty($para_hoy)) : ?>
      <?php foreach($para_hoy as $hoy) : ?>
    <div class="ov">
      <div class="fl wm5 ml text pv">
        <div class="fl ov mr"><i class="fa fa-clock-o"></i></div>
        <?php echo $hoy['hora'] ?><br><span>Hora de Colombia</span>
      </div>
      <div class="fl wm5">
        <div class="fl"><img src="<?php echo base_url($hoy['equipo1_imagen_path']) ?>" width="48" height="48" /></div>
        <div class="fl ml text pv"><?php echo $hoy['equipo1_nombre'] ?></div>
      </div>
      <div class="fl wm5 ml text pv"><?php echo $hoy['goles_equipo1'] . " - " . $hoy['goles_equipo2'] ?></div>
      <div class="fl wm5">
        <div class="fl"><img src="<?php echo base_url($hoy['equipo2_imagen_path']) ?>" width="48" height="48" /></div>
        <div class="fl ml text pv"><?php echo $hoy['equipo2_nombre'] ?></div>
      </div>
      <div class="fl wm5 ml text pv"><?php echo $hoy['fase'] ?></div>
    </div>
      <?php endforeach; ?>
    <?php else: ?>
    <div class="ov">
      <div class="ml text pv">No hay partidos programados para el día de hoy</div>
    </div>
    <?php endif; ?>
  </div>
</div>
<div id="calendario" class="clear ov">
	<h3>Calendario</h3>
  <?php /*<div class="tac">
  	<!-- Octavos -->
    <div class="fl wm7 ov">
      <h4>Octavos</h4>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[0]['equipo1_imagen_path']))?base_url($octavos[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[0]['equipo1_nombre']))?$octavos[0]['equipo1_nombre']:"Equipo 1A";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[0]['goles_equipo1']))?$octavos[0]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[0]['fecha']))?explode("-", $octavos[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-06-28") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 28"
          ?><br><?php
						echo (!empty($octavos[0]['hora']))?$octavos[0]['hora']:"11:00 AM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[0]['goles_equipo2']))?$octavos[0]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[0]['equipo2_imagen_path']))?base_url($octavos[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[0]['equipo2_nombre']))?$octavos[0]['equipo2_nombre']:"Equipo 2B";
					?></div>
        </div>
      </div><br>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[2]['equipo1_imagen_path']))?base_url($octavos[2]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[2]['equipo1_nombre']))?$octavos[2]['equipo1_nombre']:"Equipo 1C";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[2]['goles_equipo1']))?$octavos[2]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[2]['fecha']))?explode("-", $octavos[2]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-06-28") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 28"
          ?><br><?php
						echo (!empty($octavos[2]['hora']))?$octavos[2]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[2]['goles_equipo2']))?$octavos[2]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[2]['equipo2_imagen_path']))?base_url($octavos[2]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[2]['equipo2_nombre']))?$octavos[2]['equipo2_nombre']:"Equipo 2D";
					?></div>
        </div>
      </div><br>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[4]['equipo1_imagen_path']))?base_url($octavos[4]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[4]['equipo1_nombre']))?$octavos[4]['equipo1_nombre']:"Equipo 1E";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[4]['goles_equipo1']))?$octavos[4]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[4]['fecha']))?explode("-", $octavos[4]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-06-30") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 30"
          ?><br><?php
						echo (!empty($octavos[4]['hora']))?$octavos[4]['hora']:"11:00 AM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[4]['goles_equipo2']))?$octavos[4]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[4]['equipo2_imagen_path']))?base_url($octavos[4]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[4]['equipo2_nombre']))?$octavos[4]['equipo2_nombre']:"Equipo 2F";
					?></div>
        </div>
      </div><br>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[6]['equipo1_imagen_path']))?base_url($octavos[6]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[6]['equipo1_nombre']))?$octavos[6]['equipo1_nombre']:"Equipo 1G";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[6]['goles_equipo1']))?$octavos[6]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[6]['fecha']))?explode("-", $octavos[6]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-06-30") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 30"
          ?><br><?php
						echo (!empty($octavos[6]['hora']))?$octavos[0]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[6]['goles_equipo2']))?$octavos[6]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[6]['equipo2_imagen_path']))?base_url($octavos[6]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[6]['equipo2_nombre']))?$octavos[6]['equipo2_nombre']:"Equipo 2H";
					?></div>
        </div>
      </div>
    </div>
    <!-- Cuartos -->
    <div class="fl wm7 ov">
      <h4>Cuartos</h4>
      <div class="cuartosa caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[0]['equipo1_imagen_path']))?base_url($cuartos[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[0]['equipo1_nombre']))?$cuartos[0]['equipo1_nombre']:"Ganador 1A Vs. 2B";
					?></div>
        </div>
        <div class="text pv cuartos2">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[0]['goles_equipo1']))?$cuartos[0]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($cuartos[0]['fecha']))?explode("-", $cuartos[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-04") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 04"
          ?><br><?php
						echo (!empty($cuartos[0]['hora']))?$cuartos[0]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[0]['goles_equipo2']))?$cuartos[0]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[0]['equipo2_imagen_path']))?base_url($cuartos[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[0]['equipo2_nombre']))?$cuartos[0]['equipo2_nombre']:"Ganador 1C Vs. 2D";
					?></div>
        </div>
      </div>
      <div class="clear cuartosb caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[2]['equipo1_imagen_path']))?base_url($cuartos[2]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[2]['equipo1_nombre']))?$cuartos[2]['equipo1_nombre']:"Ganador 1E Vs. 2F";
					?></div>
        </div>
        <div class="text pv cuartos2">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[2]['goles_equipo1']))?$cuartos[2]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($cuartos[2]['fecha']))?explode("-", $cuartos[2]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-04") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 04"
          ?><br><?php
						echo (!empty($cuartos[2]['hora']))?$cuartos[2]['hora']:"11:00 AM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[2]['goles_equipo2']))?$cuartos[2]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[2]['equipo2_imagen_path']))?base_url($cuartos[2]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[2]['equipo2_nombre']))?$cuartos[2]['equipo2_nombre']:"Equipo 1G Vs. 2H";
					?></div>
        </div>
      </div>
    </div>
    <!-- Semifinal -->
    <div class="fl wm7 ov">
      <h4>Semifinal</h4>
      <div class="semis caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($semifinal[0]['equipo1_imagen_path']))?base_url($semifinal[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($semifinal[0]['equipo1_nombre']))?$semifinal[0]['equipo1_nombre']:"Ganador Cuartos 2";
					?></div>
        </div>
        <div class="text pv semis2">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($semifinal[0]['goles_equipo1']))?$semifinal[0]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($semifinal[0]['fecha']))?explode("-", $semifinal[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-08") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 08"
          ?><br><?php
						echo (!empty($semifinal[0]['hora']))?$semifinal[0]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($semifinal[0]['goles_equipo2']))?$semifinal[0]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($semifinal[0]['equipo2_imagen_path']))?base_url($semifinal[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($semifinal[0]['equipo2_nombre']))?$semifinal[0]['equipo2_nombre']:"Ganador Cuartos 1";
					?></div>
        </div>
      </div>
    </div>
    <!-- Final -->
    <div class="fl wm7 ov">
      <h4>Final</h4>
      <div class="caja final">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($final[0]['equipo1_imagen_path']))?base_url($final[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($final[0]['equipo1_nombre']))?$final[0]['equipo1_nombre']:"Ganador Semis 1";
					?></div>
        </div>
        <div class="text pv final2">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($final[0]['goles_equipo1']))?$final[0]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($final[0]['fecha']))?explode("-", $final[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-13") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 13"
          ?><br><?php
						echo (!empty($final[0]['hora']))?$final[0]['hora']:"02:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($final[0]['goles_equipo2']))?$final[0]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($final[0]['equipo2_imagen_path']))?base_url($final[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($final[0]['equipo2_nombre']))?$final[0]['equipo2_nombre']:"Ganador Semis 2";
					?></div>
        </div>
      </div>
      <div class="caja tercer cuartosa">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($final[0]['equipo1_imagen_path']))?base_url($final[0]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($final[0]['equipo1_nombre']))?$final[0]['equipo1_nombre']:"Perdedor Semis 1";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($final[0]['goles_equipo1']))?$final[0]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($final[0]['fecha']))?explode("-", $final[0]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-12") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 12"
          ?><br><?php
						echo (!empty($final[0]['hora']))?$final[0]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($final[0]['goles_equipo2']))?$final[0]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($final[0]['equipo2_imagen_path']))?base_url($final[0]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($final[0]['equipo2_nombre']))?$final[0]['equipo2_nombre']:"Perdedor Semis 2";
					?></div>
        </div>
      </div>
    </div>
    <!-- Semifinal -->
    <div class="fl wm7 ov">
      <h4>Semifinal</h4>
      <div class="semis caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($semifinal[1]['equipo1_imagen_path']))?base_url($semifinal[1]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($semifinal[1]['equipo1_nombre']))?$semifinal[1]['equipo1_nombre']:"Ganador Cuartos 4";
					?></div>
        </div>
        <div class="text pv semis2">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($semifinal[1]['goles_equipo1']))?$semifinal[1]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($semifinal[1]['fecha']))?explode("-", $semifinal[1]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-09") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 09"
          ?><br><?php
						echo (!empty($semifinal[1]['hora']))?$semifinal[1]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($semifinal[1]['goles_equipo2']))?$semifinal[1]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($semifinal[1]['equipo2_imagen_path']))?base_url($semifinal[1]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($semifinal[1]['equipo2_nombre']))?$semifinal[1]['equipo2_nombre']:"Ganador Cuartos 3";
					?></div>
        </div>
      </div>
    </div>
    <!-- Cuartos -->
    <div class="fl wm7 ov">
      <h4>Cuartos</h4>
      <div class="cuartosa caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[1]['equipo1_imagen_path']))?base_url($cuartos[1]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[1]['equipo1_nombre']))?$cuartos[1]['equipo1_nombre']:"Ganador 1B Vs. 2A";
					?></div>
        </div>
        <div class="text pv cuartos2">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[1]['goles_equipo1']))?$cuartos[1]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($cuartos[2]['fecha']))?explode("-", $cuartos[1]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-05") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 05"
          ?><br><?php
						echo (!empty($cuartos[1]['hora']))?$cuartos[1]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[1]['goles_equipo2']))?$cuartos[1]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[1]['equipo2_imagen_path']))?base_url($cuartos[1]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[1]['equipo2_nombre']))?$cuartos[1]['equipo2_nombre']:"Ganador 1D Vs. 2C";
					?></div>
        </div>
      </div>
      <div class="clear cuartosb caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[3]['equipo1_imagen_path']))?base_url($cuartos[3]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[3]['equipo1_nombre']))?$cuartos[3]['equipo1_nombre']:"Ganador 1F Vs. 2E";
					?></div>
        </div>
        <div class="text pv cuartos2">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[3]['goles_equipo1']))?$cuartos[3]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($cuartos[3]['fecha']))?explode("-", $cuartos[3]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-05") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 05"
          ?><br><?php
						echo (!empty($cuartos[3]['hora']))?$cuartos[3]['hora']:"11:00 AM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($cuartos[3]['goles_equipo2']))?$cuartos[3]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($cuartos[3]['equipo2_imagen_path']))?base_url($cuartos[3]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($cuartos[3]['equipo2_nombre']))?$cuartos[3]['equipo2_nombre']:"Equipo 1H Vs. 2G";
					?></div>
        </div>
      </div>
    </div>
    <!-- Octavos -->
    <div class="fl wm7 ov">
      <h4>Octavos</h4>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[1]['equipo1_imagen_path']))?base_url($octavos[1]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[1]['equipo1_nombre']))?$octavos[1]['equipo1_nombre']:"Equipo 1B";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[1]['goles_equipo1']))?$octavos[1]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[1]['fecha']))?explode("-", $octavos[1]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-06-29") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 29"
          ?><br><?php
						echo (!empty($octavos[1]['hora']))?$octavos[1]['hora']:"11:00 AM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[1]['goles_equipo2']))?$octavos[1]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[1]['equipo2_imagen_path']))?base_url($octavos[1]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[1]['equipo2_nombre']))?$octavos[1]['equipo2_nombre']:"Equipo 2A";
					?></div>
        </div>
      </div><br>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[3]['equipo1_imagen_path']))?base_url($octavos[3]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[3]['equipo1_nombre']))?$octavos[3]['equipo1_nombre']:"Equipo 1D";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[3]['goles_equipo1']))?$octavos[3]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[3]['fecha']))?explode("-", $octavos[3]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-06-29") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Junio 29"
          ?><br><?php
						echo (!empty($octavos[3]['hora']))?$octavos[3]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[3]['goles_equipo2']))?$octavos[3]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[3]['equipo2_imagen_path']))?base_url($octavos[3]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[3]['equipo2_nombre']))?$octavos[3]['equipo2_nombre']:"Equipo 2C";
					?></div>
        </div>
      </div><br>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[5]['equipo1_imagen_path']))?base_url($octavos[5]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[5]['equipo1_nombre']))?$octavos[5]['equipo1_nombre']:"Equipo 1F";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[5]['goles_equipo1']))?$octavos[5]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[5]['fecha']))?explode("-", $octavos[5]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-01") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 01"
          ?><br><?php
						echo (!empty($octavos[5]['hora']))?$octavos[5]['hora']:"11:00 AM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[5]['goles_equipo2']))?$octavos[5]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[5]['equipo2_imagen_path']))?base_url($octavos[5]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[5]['equipo2_nombre']))?$octavos[5]['equipo2_nombre']:"Equipo 2E";
					?></div>
        </div>
      </div><br>
      <div class="caja">
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[7]['equipo1_imagen_path']))?base_url($octavos[7]['equipo1_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[7]['equipo1_nombre']))?$octavos[7]['equipo1_nombre']:"Equipo 1H";
					?></div>
        </div>
        <div class="text pv">
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[7]['goles_equipo1']))?$octavos[7]['goles_equipo1']:"-";
          ?> </strong>
          </div>
          <div class="fl wm2 ov"><?php
						$fec = (isset($octavos[7]['fecha']))?explode("-", $octavos[7]['fecha']):NULL;
						echo "<span>" . Home::dia_semana1("2014-07-01") . "</span><br>";
						echo (!empty($fec))?ucfirst(Home::mes($fec[1])) . " " . $fec[2]:"Julio 01"
          ?><br><?php
						echo (!empty($octavos[7]['hora']))?$octavos[7]['hora']:"03:00 PM";
          ?></div>
          <div class="fl wmm ov">
          	<strong> <?php
						echo (!empty($octavos[7]['goles_equipo2']))?$octavos[7]['goles_equipo2']:"-";
          ?> </strong>
          </div>
        </div>
        <div class="resaltado ov">
          <div class="fl"><img src="<?php
          	echo (!empty($octavos[7]['equipo2_imagen_path']))?base_url($octavos[7]['equipo2_imagen_path']):base_url("assets/img/fifa.png")
					?>" width="46" height="46" /></div>
          <div class="fl mlm text2 pv"><?php
          	echo (!empty($octavos[7]['equipo2_nombre']))?$octavos[7]['equipo2_nombre']:"Equipo 2G";
					?></div>
        </div>
      </div>
    </div>
  </div>*/?><br>
  <div class="clear"><br>
  	<div class="fechas barra">
			<?php foreach($fechas as $fecha) : ?>
      <h4>
        <div class="fl ov mr"><i class="fa fa-calendar"></i></div>
        <?php echo Home::dia_semana($fecha['fecha']); ?>
      </h4>
        <?php foreach($calendario as $cal) : ?>
          <?php if($cal['fecha'] == $fecha['fecha']) : ?>
      <div class="ov">
        <div class="fl wm5 ml text pv">
          <div class="fl ov mr"><i class="fa fa-clock-o"></i></div>
          <?php echo $cal['hora'] ?>
          <br><span>Hora de Colombia</span>
        </div>
        <div class="fl wm5">
          <div class="fl"><img src="<?php echo base_url($cal['equipo1_imagen_path']) ?>" width="48" height="48" /></div>
          <div class="fl ml text pv"><?php echo $cal['equipo1_nombre'] ?></div>
        </div>
        <div class="fl wm5 ml text pv"><?php echo $cal['goles_equipo1'] . " - " . $cal['goles_equipo2'] ?></div>
        <div class="fl wm5">
          <div class="fl"><img src="<?php echo base_url($cal['equipo2_imagen_path']) ?>" width="48" height="48" /></div>
          <div class="fl ml text pv"><?php echo $cal['equipo2_nombre'] ?></div>
        </div>
        <div class="fl wm5 ml text pv"><?php echo $cal['fase'] ?></div>
      </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div id="posiciones">
	<h3>Tabla de posiciones fase de grupos</h3>
  <div class="barra">
		<?php foreach($grupos as $grupo) : ?>
    <div class="fl wm2">
      <table width="100%" class="mt">
        <caption class="pvm">Grupo <?php echo $grupo->nombre; ?></caption>
        <thead>
          <th>Equipo</th>
          <th>Pts.</th>
          <th>PJ</th>
          <th>PG</th>
          <th>PE</th>
          <th>PP</th>
          <th>GF</th>
          <th>GC</th>
          <th>DG</th>
        </thead>
        <tbody>
        <?php
          $i = 1;
        ?>
        <?php foreach($posiciones as $equipo) : ?>
          <?php if($equipo->equipo_grupo_id == $grupo->id) : ?>
          <tr<?php echo ($i == 1 || $i==2)?' class="clasificado"':""; ?>>
            <td>
              <div class="fl"><img src="<?php echo base_url($equipo->equipo_imagen_path) ?>" width="48" height="48" /></div>
              <div class="fl ml text pv"><?php echo $equipo->equipo_nombre ?></div>
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
    </div>
    <?php endforeach; ?>
	</div>
</div>

    