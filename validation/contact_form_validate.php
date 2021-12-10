<?php
include "../database_interactions/database_controller.php";

// if (!isset($_POST["contact-submit"])) {
//     header("Location: ../public/contact.php");
//     exit;
// }

$formErrors = []; // Array for storing form errors
$acceptedFileTypes = ["image/png", "image/jpeg", "image/jpg", ".pdf", ".doc", ".docx"];    // array of accected file types for file uploads

$firstName;
$lastName;
$email;
$industry;
$country;
$message;
$file;

function validateContactForm()
{
    global $firstName;
    global $lastName;
    global $email;
    global $industry;
    global $country;
    global $message;
    global $file;

    global $acceptedFileTypes;
    global $formErrors;


    // Form validation; using htmlspecialchars to prevent XSS or SQL Injection

    // Check if first name is empty or does not meet regex requirements
    if (empty($_POST["first_name"]) || !preg_match("/^[a-zA-Z-']*$/", $_POST["first_name"])) {
        $formErrors["contact-first-name"] = "First name is required or your entered first name invalid. <br />";
        echo "<strong>" . $formErrors["contact-first-name"] . "</strong>";
    } else {
        $firstName = htmlspecialchars($_POST["first_name"]);
    }

    // check if last name is empty or does not meet regex requirements
    if (empty($_POST["last_name"]) || !preg_match("/^[a-zA-Z-']*$/", $_POST["last_name"])) {
        $formErrors["contact-last-name"] = "Last name is required or your entered last name is invalid. <br />";
        echo "<strong>" . $formErrors["contact-last-name"] . "</strong>";
    } else {
        $lastName = htmlspecialchars($_POST["last_name"]);
    }

    // check if email emptyor is not well formed
    if (empty($_POST["contact-email"]) || !filter_var($_POST["contact-email"], FILTER_VALIDATE_EMAIL)) {
        $formErrors["contact-email"] = "Email is required or not well formed. <br />";
        echo "<strong>" . $formErrors["contact-email"] . "</strong>";
    } else {
        $email = htmlspecialchars($_POST["contact-email"]);
    }

    // check industry
    if (empty($_POST["contact-industry"])) {
        $formErrors["contact-industry"] = "Industry is required. <br />";
        echo "<strong>" . $formErrors["contact-industry"] . "</strong>";
    } else {
        $industry = htmlspecialchars($_POST["contact-industry"]);
    }

    // check country
    if (empty($_POST["contact-country"])) {
        $formErrors["contact-country"] = "Country is required. <br />";
        echo "<strong>" . $formErrors["contact-country"] . "</strong>";
    } else {
        $country = htmlspecialchars($_POST["contact-country"]);
    }

    // check message
    if (empty($_POST["contact-message"])) {
        $formErrors["contact-message"] = "Message is required. <br />";
        echo "<strong>" . $formErrors["contact-message"] . "</strong>";
    } else {
        $message = htmlspecialchars($_POST["contact-message"]);
    }


    // File upload validation using MIME type, rather than file extension,
    // Will only execute if file is not empty
    if (!empty($_POST["contact-file"])) {
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->file($_POST["contact-file"]);
        if (!$acceptedFileTypes[$mimeType]) {
            $formErrors["contact-file-upload"] = "Please upload a valid file";
            echo "<strong>" . $formErrors["contact-file-upload"] . "</strong>";
        } else {
            $file = $_POST["contact-file"];
        }
    }


    if (empty($formErrors)) {
        return true;
    } else {
        return false;
    }
}

// validateContactForm();
