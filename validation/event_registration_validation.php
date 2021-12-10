<?php
require "../database_interactions/database_controller.php";

$eventFormErrors = [];

if (isset($_POST["eventSubmit"])) {
    // validation for first name
    if (isset($_POST["eventFirstName"])) {
        $firstName = $_POST["eventFirstName"];

        if (empty($firstName) || !preg_match("/^[a-zA-Z-']*$/", $firstName)) {
            $eventFormErrors["event-first-name"] = "First name is required or your entered first name invalid. <br />";
            echo "<strong>" . $eventFormErrors["event-first-name"] . "</strong>";
        } else {
            $firstName = htmlspecialchars($firstName);
        }
    }

    // Validation for last name
    if (isset($_POST["eventLastName"])) {
        $lastName = $_POST["eventLastName"];

        if (empty($lastName) || !preg_match("/^[a-zA-Z-']*$/", $lastName)) {
            $eventFormErrors["event-last-name"] = "Last name is required or your entered last name invalid. <br />";
            echo "<strong>" . $eventFormErrors["event-first-name"] . "</strong>";
        } else {
            $lastName = htmlspecialchars($lastName);
        }
    }

    // Validation for email
    if (isset($_POST["eventEmail"])) {
        $email = $_POST["eventEmail"];

        if (empty($email) || !filter_var($_POST["eventEmail"], FILTER_VALIDATE_EMAIL)) {
            $eventFormErrors["event-email"] = "Email is required or your entered email invalid. <br />";
            echo "<strong>" . $eventFormErrors["event-email"] . "</strong>";
        } else {
            $email = htmlspecialchars($email);
        }
    }
}



// Check if the event error table is empty, them update database
if (empty($eventFormErrors)) {
    $isTableUpdated = updateEventRegistrationTable($firstName, $lastName, $email);
    if ($isTableUpdated) {
        echo "Event Registration Successful!";
        return true;
    } else {
        echo "Event registration Unsuccessful";
        return false;
    }
}
