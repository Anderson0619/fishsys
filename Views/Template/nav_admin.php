    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][2]['r']) || !empty($_SESSION['permisos'][2]['d']) ){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/clientes">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Clientes</span>
            </a>
        </li>

        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-cube" aria-hidden="true"></i>
                <span class="app-menu__label">Tipos</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/especies"><i class="icon fa fa-circle-o"></i> Especies</a></li>
                <?php } ?> 
            </ul>
        </li>
        <?php } ?>

        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][4]['r']) || !empty($_SESSION['permisos'][6]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label">Módulos</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/comercial"><i class="icon fa fa-circle-o"></i> Comercial</a></li>
                <?php } ?>

                <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/compras"><i class="icon fa fa-circle-o"></i> Compras</a></li>
                <?php } ?>

                <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/gestion"><i class="icon fa fa-circle-o"></i> Gestión</a></li>
                <?php } ?>

                <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/produccion"><i class="icon fa fa-circle-o"></i> Producción</a></li>
                <?php } ?>

                <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/calidad"><i class="icon fa fa-circle-o"></i> Calidad</a></li>
                <?php } ?>
                
                <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/gerencia"><i class="icon fa fa-circle-o"></i> Gerencia</a></li>
                <?php } ?>

            </ul>
        </li>
        <?php } ?>

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>

    