<?php
include "../templates/_admin_header.php";
?>

<!-- OffCanvas -->
<div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <!-- Offcanvas body -->
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <!-- Section 1: Core -->
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 py-3">
                        CORE
                    </div>
                </li>

                <li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-speedometer2"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Section 1 Divider -->

                <li class="my-4">
                    <hr class="dropdown-divider">
                </li>

                <!-- Section 2: Systems -->
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 py-3">
                        Systems
                    </div>
                </li>

                <li>
                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-activity"></i>
                        </span>
                        <span>Systems</span>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
</div>
</div>













<?php
include "../templates/_admin_footer.php";
