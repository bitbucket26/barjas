<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <img class="img-profile rounded-circle"
                                    src="../../img/logobuku.png" style="max-width:40px;">
                </div>
                <div class="sidebar-brand-text mx-2">BARJAS <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../dashboard.php">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span></a>
            </li>

           <!-- Divider -->
           <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Kontrak
            </div>
            <!-- Menu KOntrak -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <!-- <i class="fa fa-book"></i> -->
                    <i class="bi bi-journal-plus"></i>

                    <span>MANUAL</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kategori</h6>
                        <a class="collapse-item" href="../kontrak/spk/spk.php">SPK (Nilai <= 200)</a>

                        <a class="collapse-item" href="../kontrak/sp/sp.php">SP (Nilai > 200)</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne2"
                    aria-expanded="true" aria-controls="collapseOne1">
                    <!-- <i class="fa fa-book"></i> -->
                    <i class="bi bi-cart4"></i>

                    <span>E-KATALOG</span>
                </a>
                <div id="collapseOne2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Kategori</h6> -->
                        <a class="collapse-item" href="../kontrak/ekatalog/ekatalog.php">Dashboard E-Catalogue</a>
                        <!-- <a class="collapse-item" href="../kontrak/ekatalog2/ekatalog.php">Nilai > 200 Jt</a> -->
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../penyedia/penyedia.php">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <i class="bi bi-buildings"></i>

                    <span>PENYEDIA</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="pptk.php">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <i class="bi bi-person-circle"></i>

                    <span>PPTK</span></a>
            </li>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="../ppk/ppk.php">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <i class="bi bi-person-gear"></i>

                    <span>PPK</span></a>
            </li>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../direktur/direktur.php">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <i class="bi bi-person-bounding-box"></i>

                    <span>DIREKTUR</span></a>
            </li>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="../pejabat/pejabat.php">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <i class="bi bi-person-fill-add"></i>

                    <span>PEJABAT PENGADAAN</span></a>
            </li>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne1"
                    aria-expanded="true" aria-controls="collapseOne1">
                    <!-- <i class="fa fa-book"></i> -->
                    <i class="bi bi-ui-checks"></i>

                    <span>PEJABAT PEMERIKSA</span>
                </a>
                <div id="collapseOne1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Kategori</h6> -->
                        <a class="collapse-item" href="../pemeriksa/pemeriksa.php">Pemeriksa <= 300 Jt</a>
                        <a class="collapse-item" href="../pemeriksa/pemeriksa2.php">Pemeriksa > 300 Jt</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>