<?php
// Ensures that admin is recognized and signed in before loading page
// if (!isset($_SESSION["admin-id"])) {
//     header("Location: admin_login.php");
//     exit;
// }

$title = "Employees";
include "../templates/_admin_header.php";
include "../database_interactions/database_controller.php";

$employees = fetchEmployees();
// print_r($employees);
?>
<main class="mt-5 pt-5 container">
    <div class="container">
        <?php
        foreach ($employees as $key => $value) {
            echo '
        <div class="card mb-5">
            <div class="card-header">
                ' . $value["first_name"] . ' ' . $value["last_name"] . '
            </div>
            <div class="card-body">
                <h5 class="card-title text-muted">' . $value["employee_email"] . '</h5>
                <br>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#employee-choice-modal" data-bs-whatever="' . $value["employee_id"] . '">
                    Remove Employee from Database
                </button>
            </div>
        </div>
        ';
        }
        ?>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="employee-choice-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this employee from the database?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="deleteEmployee()">Yes</button>
                    <button type="button" class="btn btn-success">No</button>
                </div>
            </div>
        </div>
    </div>
</main>






<?php
include "../templates/_admin_footer.php";
