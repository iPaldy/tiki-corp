<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TIKI Tangerang</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query Menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
        FROM `user_menu` JOIN `user_access_menu`
          ON `user_menu`.`id` = `user_access_menu`.`menu_id`
       WHERE `user_access_menu`.`role_id` = $role_id
       ORDER BY `user_access_menu`.`menu_id` ASC";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php foreach ($menu as $m) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu<?= $m['id']; ?>" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span><?= $m['menu']; ?></span>
            </a>

            <!-- Query SubMenu -->
            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
            FROM `user_sub_menu`
           WHERE `user_sub_menu`.`menu_id` = $menuId";

            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <div id="menu<?= $m['id']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php foreach ($subMenu as $sm) : ?>
                        <a class="collapse-item" href="buttons.html"><?= $sm['title']; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->