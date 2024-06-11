<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$mysqli = require __DIR__ . "/database.php";

$sql = "UPDATE tb_user
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sss", $token_hash, $expiry, $email);

$stmt->execute();

if ($mysqli->affected_rows) {
    $name = 'Digitanzo';
    $emailFrom = 'eset@digitanzo.lk';
    $subject = 'Password Reset';
    $content = <<<END

    Click <"http://digitanzo.lk/jss/reset/reset-password.php?token=$token">here
    to reset your password.

    END;

    $mailHeaders = "From: " . $name . "<". $emailFrom .">\r\n";
    try {
        mail($email, $subject, $content, $mailHeaders);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer error: {$e->getMessage()}";
    }
}


		header('location: chemail.php');
?>