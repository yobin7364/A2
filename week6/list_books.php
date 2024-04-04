<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Textbooks</title>
</head>

<body>
    <h1>List of Textbooks</h1>

    <?php
    // Read book information from file, "FILE_IGNORE_NEW_LINES" flag is used to read the lines of the file into an array without newline characters  
    $books = file("TextDirectory.txt", FILE_IGNORE_NEW_LINES);

    // Display book information
    if (count($books) > 0) {
        echo "<ul>";
        foreach ($books as $book) {
            $book_info = explode(", ", $book);
            echo "<li>Title: $book_info[3], Authors: $book_info[4], TNo: $book_info[5]</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No textbooks available for sale.</p>";
    }
    ?>

    <h1>Find Textbook</h1>
    <form action="get_book_info.php" method="post">
        <label for="tno">Enter TNo of the Textbook:</label>
        <input type="text" id="tno" name="tno" required><br><br>
        <input type="submit" name="get_info_submit" value="Get Information">
    </form>



</body>

</html>