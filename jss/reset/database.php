<?php

$host = "localhost";
$dbname = "digitsar_digitanzo";
$username = "digitsar_theepanathan";
$password = "dt311221@@DT";

$mysqli = new mysqli("$host", 
                     "$username",
                     "$password",
                    "$dbname");
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
?>