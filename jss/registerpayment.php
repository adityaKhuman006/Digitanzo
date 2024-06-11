<?php
    session_start();

    if ( isset( $_SESSION['username'] ) ) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
    } else {
        // Redirect them to the login page
        header("Location: /earning");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="server.php" method="post">
    <p>
        <label for="firstName">Recomend Username:</label>
        <input type="text" name="recname" id="firstName">
    </p>
    <p>
        <label for="lastName">Recomend User Id:</label>
        <input type="text" name="recid" id="lastName">
    </p>
    <p>
        <label for="emailAddress">User Name:</label>
        <input type="text" name="username" id="emailAddress">
    </p>
    <input type="submit" value="Submit" name="edit_payments">
</form>
</body>
</html>