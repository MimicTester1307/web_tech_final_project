<?php
include "../database_interactions/database_controller.php";

$employeeId = $_POST["employeeId"];

if (isset($_SESSION["admin-id"]) && isset($_POST["employeeId"])) {
    $deletedEmployeeData = fetchEmployee($employeeId);    // getting the employee data to be stored in a file for later reference

    // Convert the data to JSON
    $deletedEmployeeJsonData = json_encode($deletedEmployeeData, JSON_PRETTY_PRINT);

    // Save the employee data to a file
    $deletedEmployeeDataFile = "../.hidden/deletedEmployeeData.json";
    file_put_contents($deletedEmployeeDataFile, $deletedEmployeeJsonData);

    // 'Delete' the data from database
    $employeeIsDeleted = deleteEmployee($employeeId);
    if ($employeeId) {
        return "Employee deleted successfully";
    } else {
        return "Employee deletion not successful. Please try again later";
    }
}
