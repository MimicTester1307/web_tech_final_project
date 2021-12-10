<?php
// Ensures that admin is recognized and signed in before loading page
// if (!isset($_SESSION["admin-id"])) {
//     header("Location: admin_login.php");
//     exit;
// }

$title = "Admin Dashboard";
include "../templates/_admin_header.php";
include "../database_interactions/database_controller.php";

$systems = fetchSystems();
// print_r($systems);

?>



<main class="mt-5 pt-5 container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 fw-bold fs-3 mb-3"> Systems </div>
        </div>
        <div class="row">
            <?php
            foreach ($systems as $key => $value) {
                if ($value["system_status"] == "online") {
                    echo '
                    <div class="col-sm-6">
                        <div class="card mb-5">
                            <div class="card-body">
                                <h5 class="card-title"> System ID: ' . $value["system_id"] . '</h5>
                                <p class="card-text">System Status: ' . $value["system_status"] . '</p>
                                <p class="card-text text-muted>Date of Last Check: ' . $value["date_of_last_check"] . '</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" value="online" name="online" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Online</label>

                                    <br><br>

                                    <button type="button" class="btn btn-primary bg-dark text-light"> Update Status </button>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
                } else if ($value["system_status"] == "offline") {
                    echo '
                    <div class="col-sm-6">
                        <div class="card mb-5">
                            <div class="card-body">
                                <h5 class="card-title"> System ID: ' . $value["system_id"] . '</h5>
                                <p class="card-text">System Status: ' . $value["system_status"] . '</p>
                                <p class="card-text text-muted>Date of Last Check: ' . $value["date_of_last_check"] . '</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="offline" name="offline" >
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Offline</label>

                                    <br><br>

                                    <button type="button" class="btn btn-primary bg-dark text-light"> Update Status </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                } else {
                    echo '
                    <div class="col-sm-6">
                        <div class="card mb-5">
                            <div class="card-body">
                                <h5 class="card-title"> System ID: ' . $value["system_id"] . '</h5>
                                <p class="card-text">System Status: ' . $value["system_status"] . '</p>
                                <p class="card-text text-muted>Date of Last Check: ' . $value["date_of_last_check"] . '</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled>
                                    <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </div>
</main>
<?php
include "../templates/_admin_footer.php";
