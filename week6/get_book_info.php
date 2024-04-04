<?php

// Function to validate TNo format
function validateTNo($tno) {
    return preg_match("/^\d{4}-[a-zA-Z]{2}$/", $tno);
}


// Handle form submission for retrieving book details
if(isset($_POST['get_info_submit'])) {
    $tno = $_POST['tno'];

    // Validate TNo
    if(validateTNo($tno)) {
        // Read book information from file
        $books = file("TextDirectory.txt", FILE_IGNORE_NEW_LINES);

        // Search for book by TNo
        $found = false;
        foreach ($books as $book) {
            $book_info = explode(", ", $book);
            if ($book_info[5] == $tno) {
                $found = true;
                echo "<h1>Book Details</h1>";
                echo "<p>Name: $book_info[0]</p>";
                echo "<p>Email: $book_info[1]</p>";
                echo "<p>Phone Number: $book_info[2]</p>";

                echo "<p>Title: $book_info[3]</p>";
                echo "<p>Authors: $book_info[4]</p>";
                echo "<p>TNo: $book_info[5]</p>";
                echo "<p>Publisher: $book_info[6]</p>";
                echo "<p>Publishing Year: $book_info[7]</p>";
                echo "<p>Description: $book_info[8]</p>";

                // Form for expressing interest
                echo "<h2>Express Interest</h2>";
                echo "<form action='process_interest.php' method='post'>";
                echo "<input type='hidden' name='tno' value='$tno'>";
                echo "<label for='proposed_price'>Proposed Price:</label>";
                echo "<input type='text' id='proposed_price' name='proposed_price' required><br><br>";
                echo "<label for='buyer_name'>Name:</label>";
                echo "<input type='text' id='buyer_name' name='buyer_name' required><br><br>";
                echo "<label for='buyer_telephone'>Telephone:</label>";
                echo "<input type='tel' id='buyer_telephone' name='buyer_telephone' required><br><br>";
                echo "<input type='submit' name='express_interest_submit' value='Express Interest'>";
                echo "</form>";

                break;
            }
        }

        if (!$found) {
            echo "Book with TNo $tno not found.";
        }
    } else {
        echo "Invalid TNo format!";
    }
}

?>
