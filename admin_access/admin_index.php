<?php
include "../templates/_admin_header.php";

// Ensures that admin is recognized and signed in before loading page
// if (!isset($_SESSION["admin-id"])) {
//     header("Location: admin_login.php");
//     exit;
// }
?>



<main class="mt-5 pt-5 container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 fw-bold fs-3"> Dashboard</div>
        </div>
    </div>
</main>





<?php
include "../templates/_admin_footer.php";
