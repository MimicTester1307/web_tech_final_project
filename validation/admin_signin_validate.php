<?php
session_start();
include "../database_interactions/database_controller.php";

// Array for storing form errors
$adminFormErrors = [];



$adminEmail;
$adminPassword;

// echo $adminEmail;
// echo $adminPassword;


if (isset($_POST["adminSignInButton"])) {
    $adminEmail = $_POST["adminLoginEmail"];
    $adminPassword = $_POST["adminLoginPassword"];



    // Checking if email is valid
    if (empty($adminEmail) || !filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
        $adminFormErrors["admin-email"] = "Email is required or not well formed. <br />";
        echo "<strong>" . $adminFormErrors["admin-email"] . "</strong>";
    } else {
        $adminEmail = htmlspecialchars($adminEmail);
    }


    // checking if password is valid
    if (empty($adminPassword) || strlen($adminPassword) < 8) {
        $adminFormErrors["admin-password"] = "Password does not meet requirements";
        echo "<strong>" . $adminFormErrors["admin-password"] . "</strong>";
    } else {
        $adminPassword = htmlspecialchars($adminPassword);
    }


    // checking if valid password matches corresponding database password
    $systemMaintainer = fetchSystemMaintainerDetails($adminEmail);

    if (!empty($systemMaintainer) && $systemMaintainer[0]["employee_password"] == base64_encode($adminPassword)) {
        echo "<strong> Login Successful.</strong>";

        $_SESSION["admin-id"] = $systemMaintainer[0]["employee_id"];
        header("Location: ../admin_access/index.php");
        exit;
    } else {
        $adminFormErrors["admin-email-password"] = "Invalid Email/Password Combination";
        echo "<strong>" . $adminFormErrors["admin-email-password"] . "</strong>";
    }
}
