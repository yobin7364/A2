<?php

// Function to validate TNo format
function validateTNo($tno)
{
    return preg_match("/^\d{4}-[a-zA-Z]{2}$/", $tno);
}

// Function to validate Australian phone number

function validateTelephone($phoneNumber)
{
    // Remove any non-digit characters from the phone number
    $cleanedNumber = preg_replace("/[^0-9+]/", "", $phoneNumber);

    return preg_match("/^(\+61|0)4\d{8}$/", $cleanedNumber);
}

// Function to validate email
function validateEmail($email)
{
    // Remove leading and trailing whitespace
    $email = trim($email);

    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Handle seller form submission
if (isset($_POST['seller_submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $tno = $_POST['tno'];
    $publisher = $_POST['publisher'];
    $publishing_year = $_POST['publishing_year'];
    $description = $_POST['description'];

    // Validate inputs
    if (validateTNo($tno) && validateTelephone($phone) && validateEmail($email)) {
        // Format data to be saved
        $book_info = "$name, $email, $phone, $title, $authors, $tno, $publisher, $publishing_year, $description\n";

        // Save book information , FILE_APPEND | LOCK_EX are flags that prevents from overwriting file
        file_put_contents("TextDirectory.txt", $book_info, FILE_APPEND | LOCK_EX);
        echo "Book information saved successfully.<br>";
        echo "<a href='sell_form.php'>Sell Book Again</a> <br>";
        echo "<a href='list_books.php'>Check Books</a>";
    } else {
        if(!validateTNo($tno)){
            echo "Invalid TNo format";
            return false;
        }

        if(!validateTelephone($phone)){
            echo "Invalid phone number";
            return false;
        }

        if(!validateEmail($email)){
            echo "Invalid email";
            return false;
        }

    }
}
