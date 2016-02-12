<div class="container">
  <div class="row-fluid">
    <div class="span12 wt-box-<?php echo $color_module; ?>">
      <h3>Administradores</h3>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span4">
      <div class="w-box-<?php echo $color_module; ?>">
        <div class="w-box-header">
          <h4>Agregar Administrador</h4>
        </div>
        <div class="w-box-content cnt_a">
          <?php echo form_open(cms_url('admin/administradores/add')) ?>
          <div class="section">
            <label>Email del usuario</label>
            <div><input type="email" name="email" id="emailuser" required ></div>
          </div>
          <div class="section">
            <label>Nombre del usuario</label>
            <div><input type="text" name="username" id="emailuser" required ></div>
          </div>
          <div class="section">
            <label>Rol del usuario?</label>
            <div>
              <select id="rol" name="rol" class="span12 s2_single">
                <?php if (!empty($grupos)) : ?>
                  <?php foreach ($grupos as $value) : ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></option>
                  <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
          </div>
          <br />
          <button type="submit" class="btn btn-success">Guardar</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
    <div class="span8">
      <div class="w-box w-box-<?php echo $color_module; ?>">
        <div class="w-box-header">
          <h4>Administradores</h4>
        </div>
        <div class="w-box-content">
          <table id="dt_basic" class="dataTables_full table table-striped">
            <thead>
              <tr>
                <th>Nombre de usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <?php if (!empty($datos)) : ?>
              <tbody>
                <?php foreach ($datos as $user) : ?>
                  <tr class="odd gradeX parent-delete">
                    <td><?php echo $user->username ?></td>
                    <td><?php echo $user->email ?></td>
                    <td>
                      <?php foreach ($user->grupos as $grupo) : ?>
                        <span><?php echo $grupo->description ?></span><br>
                      <?php endforeach; ?>
                    </td>
                    <td class="center" width="100px">
                      <?php if (count($datos) >= 1 && $user->email !== 'cms@cogroupsas.com') : ?>
                        <a href="<?php echo cms_url('admin/administradores/delete') ?>" class="btn btn-danger btn-small logic-delete" data-table="users" data-field="id" data-value="<?php echo $user->id ?>" related-value='groups' >Eliminar</a>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
