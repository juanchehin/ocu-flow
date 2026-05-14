<style>
  /* Estilos radicales pero sencillos */
  .sidebar-light-dark {
    background-color: #1a1a2e !important;
    color: #e6e6e6 !important;
  }
  
  .sidebar-light-dark .nav-link {
    color: #e6e6e6 !important;
  }
  
  .sidebar-light-dark .nav-link:hover {
    background-color: #16213e !important;
    color: #ffffff !important;
  }
  
  .sidebar-light-dark .nav-link.active {
    background-color: #0f3460 !important;
    color: #ffffff !important;
    font-weight: bold;
  }
  
  .sidebar-light-dark .nav-treeview .nav-link {
    padding-left: 20px !important;
  }
  
  .brand-link {
    background-color: #0f3460 !important;
    border-bottom: 2px solid #e94560 !important;
  }
  
  .brand-text {
    color: #ffffff !important;
    font-weight: bold !important;
  }
  
  .nav-header {
    color: #e94560 !important;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 0.8rem;
    margin-top: 1rem;
  }
  
  .nav-icon {
    color: #e94560 !important;
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-dark navbar-light elevation-4 sidebar-no-expand">
  <!-- Brand Logo -->
  <a href="<?php echo base_url ?>admin" class="brand-link bg-dark text-sm">
    <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Logo de la Tienda" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.5rem;height: 1.5rem;max-height: unset">
    <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
  </a>
  
  <!-- Sidebar -->
  <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
    <div class="os-resize-observer-host observed">
      <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
    </div>
    <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
      <div class="os-resize-observer"></div>
    </div>
    <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
    <div class="os-padding">
      <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
          <!-- Sidebar user panel (optional) -->
          <div class="clearfix"></div>
          <!-- Sidebar Menu -->
          <nav class="mt-0">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item dropdown">
                <a href="./" class="nav-link nav-home">
                  <i class="nav-icon fas fa-fire"></i> <!-- Icono cambiado -->
                  <p>
                    Panel Principal
                  </p>
                </a>
              </li> 
              <li class="nav-item dropdown">
                <a href="./?page=categories" class="nav-link nav-categories">
                  <i class="nav-icon fas fa-tags"></i> <!-- Icono cambiado -->
                  <p>
                    Lista de Categorías
                  </p>
                </a>
              </li> 
              <li class="nav-item dropdown">
                <a href="./?page=products" class="nav-link nav-products">
                  <i class="nav-icon fas fa-box-open"></i> <!-- Icono cambiado -->
                  <p>
                    Lista de Productos
                  </p>
                </a>
              </li> 
              <li class="nav-item dropdown">
                <a href="./?page=inventory" class="nav-link nav-inventory">
                  <i class="nav-icon fas fa-warehouse"></i> <!-- Icono cambiado -->
                  <p>
                    Inventario
                  </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i> <!-- Icono cambiado -->
                  <p>
                    Pedidos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="./?page=orders" class="nav-link tree-item nav-orders">
                      <i class="fas fa-list nav-icon"></i> <!-- Icono cambiado -->
                      <p>Todos los Pedidos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./?page=orders&status=0" class="nav-link tree-item nav-orders_0">
                      <i class="fas fa-hourglass-start nav-icon"></i> <!-- Icono cambiado -->
                      <p>Pendientes</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./?page=orders&status=1" class="nav-link tree-item nav-orders_1">
                      <i class="fas fa-box nav-icon"></i> <!-- Icono cambiado -->
                      <p>Empaquetados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./?page=orders&status=2" class="nav-link tree-item nav-orders_2">
                      <i class="fas fa-truck nav-icon"></i> <!-- Icono cambiado -->
                      <p>En Reparto</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./?page=orders&status=3" class="nav-link tree-item nav-orders_3">
                      <i class="fas fa-check-circle nav-icon"></i> <!-- Icono cambiado -->
                      <p>Completados</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="./?page=customers" class="nav-link nav-customers">
                  <i class="nav-icon fas fa-users"></i> <!-- Icono cambiado -->
                  <p>
                    Lista de Clientes
                  </p>
                </a>
              </li> 
              <?php if($_settings->userdata('type') == 1): ?>
              <li class="nav-header">Mantenimiento</li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=reports" class="nav-link nav-reports">
                  <i class="nav-icon fas fa-chart-bar"></i> <!-- Icono cambiado -->
                  <p>
                    Reporte Diario
                  </p>
                </a>
              </li>
              <li class="nav-header">Administración</li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                  <i class="nav-icon fas fa-user-shield"></i> <!-- Icono cambiado -->
                  <p>
                    Lista de Usuarios
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=system_info/contact_info" class="nav-link nav-system_info_contact_info">
                  <i class="nav-icon fas fa-address-card"></i> <!-- Icono cambiado -->
                  <p>
                    Información de Contacto
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                  <i class="nav-icon fas fa-cogs"></i> <!-- Icono cambiado -->
                  <p>
                    Configuración
                  </p>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar-corner"></div>
  </div>
  <!-- /.sidebar -->
</aside>

<script>
$(document).ready(function(){
  var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  var status = '<?php echo isset($_GET['status']) ? $_GET['status'] : '' ?>';
  page = page.replace(/\//g,'_');
  page = status != '' ? page + "_" + status : page;
  console.log($('.nav-link.nav-'+page)[0])
  if($('.nav-link.nav-'+page).length > 0){
    $('.nav-link.nav-'+page).addClass('active')
    if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
      $('.nav-link.nav-'+page).addClass('active')
      $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
    }
    if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
      $('.nav-link.nav-'+page).parent().addClass('menu-open')
    }
  }
  $('.nav-link.active').addClass('bg-dark')
})
</script>