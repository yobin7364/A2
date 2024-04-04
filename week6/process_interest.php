<?php

// Function to validate Australian phone number

function validateTelephone($phoneNumber)
{
    // Remove any non-digit characters from the phone number
    $cleanedNumber = preg_replace("/[^0-9+]/", "", $phoneNumber);

    return preg_match("/^(\+61|0)4\d{8}$/", $cleanedNumber);
}

// Handle form submission for expressing interest
if(isset($_POST['express_interest_submit'])) {
    $tno = $_POST['tno'];
    $proposed_price = $_POST['proposed_price'];
    $buyer_name = $_POST['buyer_name'];
    $buyer_telephone = $_POST['buyer_telephone'];

    // Validate telephone number
    if(validateTelephone($buyer_telephone)) {
        // Format data to be saved
        $interest_info = "$buyer_name, $buyer_telephone, $tno, $proposed_price\n";

        // Save buyer's expression of interest
        file_put_contents("BuyersEOI.txt", $interest_info, FILE_APPEND | LOCK_EX);
        echo "Your expression of interest has been recorded. The seller will contact you soon.";
    } else {
        echo "Invalid telephone format!";
    }
}

?>
