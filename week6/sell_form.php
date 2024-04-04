<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Your Textbook</title>
</head>
<body>
    <h1>Sell Your Textbook</h1>
    <form action="process_sell.php" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br><br>
        <lable for="phone">Phone</lable>
        <input type="tel" id="phone" name="phone" required><br><br>
        <lable for="email">Email</lable> 
        <input type="email" id="email" name="email" required><br><br>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="authors">Authors:</label>
        <input type="text" id="authors" name="authors" required><br><br>
        <label for="tno">TNo:</label>
        <input type="text" id="tno" name="tno" required><br><br>
        <label for="publisher">Publisher:</label>
        <input type="text" id="publisher" name="publisher" required><br><br>
        <label for="publishing_year">Publishing Year:</label>
        <input type="text" id="publishing_year" name="publishing_year" required><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" name="seller_submit" value="Submit">
    </form>
</body>
</html>
