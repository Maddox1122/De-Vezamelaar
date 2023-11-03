<?php
require("../Requires/config.php");

if (isset($_POST['send-contact'])) {
    $name = $_POST['name'];
    $email = $_POST['mail'];
    $message = $_POST['message'];
    $insertcontact = $con->prepare('INSERT INTO contact_messages (`name`, `email`, `message`) VALUES (?, ?, ?)');

    $insertcontact->bind_param("sss", $name, $email, $message);

    if ($insertcontact->execute()) {
        header("Location: ../index.php");
        exit();
    }

    $insertcontact->close();
}
