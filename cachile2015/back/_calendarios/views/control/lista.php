<form id="From-ajax" name="From-ajax" method="POST">
  <?php if (!empty($datos)) : ?>
  <div class="row-fluid">
    <div class="span12">
      <div class="w-box w-box-<?php echo $color_module ?>">
        <div class="w-box-header">
          <h4>Registros</h4>
        </div>
        <div class="w-box-content">
          <table id="dt_basic" class="dataTables_full table table-striped">
            <thead>
              <tr>
                <th class="span1 table_checkbox sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 5px;"></th>
                <th>Fecha y Hora</th>
                <th>Equipos</th>
                <th>Final del partido</th>
                <th>Fase</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id='table_contet'  >
              <?php foreach ($datos as $img) : ?>
              <tr class="odd gradeX parent-delete">
                <td class="nolink "><input type="radio"  value="<?php echo $img->id ?>" name="id" class="select_obj"></td>
                <td class="nolink"><?php echo $img->fecha . "<br>" . $img->hora ?></td>
                <td class="nolink">
                	<div class="span2">
                  	<img style="height:48px;width:48px" src="<?php
                    	echo (isset($img->equipo1_imagen_path) and !empty($img->equipo1_imagen_path)) ? 
														base_url() . $img->equipo1_imagen_path :
														base_url("assets/img/fifa.png");
										?>" /><br>
                    <?php
                    	echo (isset($img->equipo2_nombre) and !empty($img->equipo2_nombre)) ? 
														$img->equipo1_nombre :
														"Fifa por definir";
										?>
                  </div> 
                  <div class="span1"><br> Vs. </div>
                  <div class="span2">
                  	<img style="height:48px;width:48px" src="<?php
                    	echo (isset($img->equipo2_imagen_path) and !empty($img->equipo2_imagen_path)) ? 
														base_url() . $img->equipo2_imagen_path :
														base_url("assets/img/fifa.png");
										?>" /><br>
                    <?php
                    	echo (isset($img->equipo2_nombre) and !empty($img->equipo2_nombre)) ? 
														$img->equipo2_nombre :
														"Fifa por definir";
										?>
                  </div>
                </td>
                <td class="nolink"><?php echo $img->goles_equipo1 . " - " . $img->goles_equipo2 ?></td>
                <td class="nolink"><?php
                	echo $img->fase . "<br>";
									if($img->fase == "GRUPOS") :
										echo "<strong>Grupo " . $img->equipo1_grupo_nombre . "</pre>";
									endif;
								?></td>
                <td class="center" width="100px"><?php if($delete): ?>
                  <?php if($datos->result_count() > 0): ?>
                  <a href="<?php echo cms_url($direct_form) ?>" class="btn btn-danger btn-small logic-delete del_count" data-num="0" data-value="<?php echo $img->id ?>">Eliminar</a>
                  <?php endif; ?>
                  <?php endif; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</form>
<script>
    $('.select_obj').change(function() {
        $('.obj_sel').on('click', function() {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('rowChecked');
            } else {
                $(this).closest('tr').removeClass('rowChecked');
            }
        });
    });
</script>