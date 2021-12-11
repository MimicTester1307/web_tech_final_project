<?php
include "../database_interactions/database_controller.php";

$formErrors = []; // Array for storing form errors
$acceptedFileTypes = ["image/png", "image/jpeg", "image/jpg", ".pdf", ".doc", ".docx"];    // array of accected file types for file uploads



// Form validation; using htmlspecialchars to prevent XSS or SQL Injection
if (isset($_POST["contact-submit"])) {
    // Getting the input data
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["contact-email"];
    $industry = $_POST["contact-industry"];
    $country = $_POST["contact-country"];
    $message = $_POST["contact-message"];
    $file = $_POST["contact-file"];

    // Check if first name is empty or does not meet regex requirements
    if (empty($firstName) || !preg_match("/^[a-zA-Z-']*$/", $firstName)) {
        $formErrors["contact-first-name"] = "First name is required or your entered first name invalid. <br />";
        echo "<strong>" . $formErrors["contact-first-name"] . "</strong>";
    } else {
        $firstName = htmlspecialchars(trim($firstName));
    }

    // check if last name is empty or does not meet regex requirements
    if (empty($lastName) || !preg_match("/^[a-zA-Z-']*$/", $lastName)) {
        $formErrors["contact-last-name"] = "Last name is required or your entered last name is invalid. <br />";
        echo "<strong>" . $formErrors["contact-last-name"] . "</strong>";
    } else {
        $lastName = htmlspecialchars(trim($lastName));
    }

    // check if email empty or is not well formed
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formErrors["contact-email"] = "Email is required or not well formed. <br />";
        echo "<strong>" . $formErrors["contact-email"] . "</strong>";
    } else {
        $email = htmlspecialchars(trim($email));
    }

    // check industry
    if (empty($industry)) {
        $formErrors["contact-industry"] = "Industry is required. <br />";
        echo "<strong>" . $formErrors["contact-industry"] . "</strong>";
    } else {
        $industry = htmlspecialchars(trim($industry));
    }

    // check country
    if (empty($country)) {
        $formErrors["contact-country"] = "Country is required. <br />";
        echo "<strong>" . $formErrors["contact-country"] . "</strong>";
    } else {
        $country = htmlspecialchars(trim($country));
    }

    // check message
    if (empty($message)) {
        $formErrors["contact-message"] = "Message is required. <br />";
        echo "<strong>" . $formErrors["contact-message"] . "</strong>";
    } else {
        $message = htmlspecialchars(trim($message));
    }


    // File upload validation using MIME type, rather than file extension,
    // Will only execute if file is not empty
    if (!empty($file)) {
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->file($file);
        if (!$acceptedFileTypes[$mimeType]) {
            $formErrors["contact-file-upload"] = "Please upload a valid file";
            echo "<strong>" . $formErrors["contact-file-upload"] . "</strong>";
        } else {
            $file = $file;
        }
    } else {
        $file = Null;
    }

    // echo $firstName;
    // echo $lastName;
    // echo $email;
    // echo $industry;
    // echo $country;
    // echo $message;
    // echo $file;
    // // echo $industry;
    // // print_r($formErrors);
    // // echo $country;

    if (empty($formErrors)) {
        $updateTable = updateContactTable($firstName, $lastName, $email, $industry, $country, $message, $file);
        if ($updateTable) {
            echo "Form submitted successfully. We will be in touch soon.";
        } else {
            echo "There was an error submitting the form. Please try again later.";
        }
    } else {
        echo "There are errors in the form!";
    }
}
