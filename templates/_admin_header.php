<?php
$title = $title ?? "Admin Page";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlspecialchars($title, ENT_QUOTES); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="../styling/admin_dashboard.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <!-- Side Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5 fixed-top">
        <div class="container-fluid">
            <!-- OffCanvas Trigger -->
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand me-auto" href="#">
                <img src="../assets/Logo+-+Star+Lab+Wind+River+Knockout.png" alt="Logo" width="240" height="53.91">
            </a>


            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                <!-- Search Input group -->
                <div class="d-flex ms-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>

                <!-- Profile Drop Down -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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

                    <!-- Dashboard -->

                    <li>
                        <a href="#" class="nav-link px-3">
                            <span class="me-2">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
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

                    <!-- Section 2 Divider -->

                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>


                    <!-- Section 3: Employees -->
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 py-3">
                            Employees
                        </div>
                    </li>

                    <li>
                        <a href="employee.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <span>Employees</span>
                        </a>
                    </li>

                    <!-- Section 3 Divider -->

                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a href="../admin_access/logout.php" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-box-arrow-right"></i>
                            </span>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>

            </nav>
        </div>
    </div>