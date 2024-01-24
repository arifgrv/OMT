  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('index.php/counter'); ?>">
          <i class="bi bi-grid"></i>
          <span>Counter Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Ticket Sell</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php/BookTicket'); ?>" target="_blank">
              <i class="bi bi-circle"></i><span>General Customer</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('index.php/Discount'); ?>" target="_blank">
              <i class="bi bi-circle"></i><span>Discount Customer</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Sales Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url('index.php/accountsreport'); ?>"  target="_blank">
              <i class="bi bi-circle"></i><span>General Sales</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('index.php/AccountsDReport'); ?>"  target="_blank">
              <i class="bi bi-circle"></i><span>Discount Sales</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <hr>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('index.php/logout'); ?>">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->