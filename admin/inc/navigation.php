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
    padding: 0.5rem 0.75rem !important;
  }
</style>

<aside class="main-sidebar sidebar-light-dark elevation-4 animate__animated animate__fadeInLeft">
  <a href="<?php echo base_url ?>admin" class="brand-link id=brand text-sm">
    <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 2.5rem;height: 2.5rem;max-height: unset">
    <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
  </a>

  <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition">
    <div class="os-resize-observer-handle"></div>
    <div class="os-data-observer-host"></div>
    <div class="os-size-observer" style="position: absolute; visibility: hidden; width: 100%; height: 100%;">
      <div class="os-size-observer-listener"></div>
    </div>
    <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 1066px;"></div>
    <div class="os-padding">
      <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
          
          <div class="clearfix"></div>
          
          <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin" class="nav-link nav-home">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Panel Principal</p>
                </a>
              </li>

              <li class="nav-header">Gestión Médica</li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=appointments" class="nav-link nav-appointments">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>Agenda de Turnos</p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=patients" class="nav-link nav-patients">
                  <i class="nav-icon fas fa-user-injured"></i>
                  <p>Pacientes</p>
                </a>
              </li>

              <li class="nav-header">Óptica y Laboratorio</li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=orders" class="nav-link nav-orders">
                  <i class="nav-icon fas fa-file-medical"></i>
                  <p>Órdenes de Trabajo</p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=products" class="nav-link nav-products">
                  <i class="nav-icon fas fa-glasses"></i>
                  <p>Catálogo / Armazones</p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=inventory" class="nav-link nav-inventory">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>Inventario e Insumos</p>
                </a>
              </li>

              <?php if($_settings->userdata('type') == 1): ?>
              <li class="nav-header">Mantenimiento y Reportes</li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=reports" class="nav-link nav-reports">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Reportes Diarios</p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Control de Usuarios</p>
                </a>
              </li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                  <i class="nav-icon fas fa-cogs"></i>
                  <p>Configuración General</p>
                </a>
              </li>
              <?php endif; ?>

            </ul>
          </nav>
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
    <div class="os-scrollbar os-scrollbar-corner"></div>
  </div>
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
      $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
      $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
    }
    if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
      $('.nav-link.nav-'+page).parent().addClass('menu-open')
    }
  }
})
</script>