<?php
include "../database_interactions/database_controller.php";

$employeeId = $_POST["employeeId"];

if (isset($_SESSION["admin-id"]) && isset($_POST["employeeId"])) {
    $deletedEmployeeData = fetchEmployee($employeeId);    // getting the employee data to be stored in a file for later reference

    // Convert the data to JSON
    $deletedEmployeeJsonData = json_encode($deletedEmployeeData, JSON_PRETTY_PRINT);

    $fileName = "../hidden_details/deletedEmployeeData.json";
    // Save the employee data to a file
    $isFileWritten = file_put_contents("$fileName", $deletedEmployeeJsonData, FILE_APPEND);

    // 'Delete' the data from database only if data has been written to file
    if ($isFileWritten) {
        $employeeIsDeleted = deleteEmployee($employeeId);

        if ($employeeIsDeleted) {
            echo "Employee deleted successfully";
            return true;
        } else {
            echo "Employee deletion not successful. Please try again later";
            return false;
        }
    } else {
        return false;
    }
}
