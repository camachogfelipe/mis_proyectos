<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <div class="desplegableu pull-right" style="margin-top: 7px;"> <a class="goog-text-highlight btn-seccion dropdown-toggle" data-toggle="dropdown" href="#" style=""> <i class="icon-user icon-large"></i> </a> <a class="btn-seccion dropdown-toggle" data-toggle="dropdown" href="#"  > <span class="icon-chevron-down icon-large"></span> </a>
        <ul class="dropdown-menu">
          <li> <a href="<?php echo cms_url('login/logout') ?>"> <i class="icon-remove"></i>Cerrar Sesión </a> </li>
        </ul>
      </div>
      <div id="fade-menu" class="pull-left">
        <?php
        //print_r($menus);
        ?>
        <ul class="clearfix" id="mobile-nav">
          <li> <a href="javascript:void(0)">Home</a>
            <ul>
              <li> <a href="javascript:void(0)">Contacto</a>
                <ul>
                  <li> <a href="<?php echo cms_url('contactos/redes') ?>">Redes Sociales</a> </li>
                  <li> <a href="<?php echo cms_url('contactos/contactos') ?>">Datos de Contacto</a> </li>
                </ul>
              </li>
            </ul>
          </li>
          
          <li> <a href="<?php echo cms_url('gruposs') ?>">Grupos</a></li>
          <li> <a href="<?php echo cms_url('equipos') ?>">Equipos</a></li>
          <li> <a href="<?php echo cms_url('calendarios') ?>">Calendario</a></li>

          <li> <a href="javascript:void(0)">Configuraciones</a>
            <ul>
              <li> <a id="change_pass" href="javascript:void(0);">Cambiar Contraseña</a> </li>
                <?php if (true === $is_superadmin) : ?>
                <li> <a href="<?php echo cms_url('admin/administradores') ?>">Administradores</a> </li>
                <?php if (has_perm('cms_admin_perms.view')) : ?>
                  <li> <a href="<?php echo cms_url('perms') ?>">Permisos</a> </li>
                <?php endif; ?>
                <?php if (has_perm('cms_admin_perms.view')) : ?>
                  <li> <a href="javascript:void(0)">Desarrollador</a>
                    <ul>
                      <li> <a href="<?php echo cms_url('generator_models') ?>">Generador de Modelos</a> </li>
                      <li> <a href="<?php echo cms_url('generator_modules') ?>">Generador de Modulos</a> </li>
                      <li> <a href="<?php echo cms_url('backup_db') ?>">Generador de Backup</a> </li>
                      <!--<li> <a href="<?php echo cms_url('generator_front_modules') ?>">Generador de Front END</a> </li>-->
                    </ul>
                  </li>
                <?php endif; ?>
                <?php if (has_perm('cms_config_oauth.view')) : ?>
                  <li> <a href="<?php echo cms_url('users/config_oauth') ?>">Config OAuth</a> </li>
                <?php endif; ?>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
