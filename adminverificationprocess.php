<?php

require "connection.php";

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST["email"])) {

    $email = $_POST["email"];
    if (empty($email)) {
        echo "Please enter your Email address.";
    } else {

        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'");
        $an = $adminrs->num_rows;

        if ($an == 1) {
            $code = uniqid();

            Database::iud("UPDATE `admin` SET `verification` = '" . $code . "' WHERE `email` = '" . $email . "' ");


            // email code

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'namiduwathsala@gmail.com';
            $mail->Password = 'jnwf20011125';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('namiduwathsala@gmail.com', 'MYphone');
            $mail->addReplyTo('namiduwathsala@gmail.com', 'MYphone');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'MYphone Admin Verification Code';
            $bodyContent = '<h1 style="color:red;">Your Verification Code : ' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending fail';
            } else {
                echo 'Success';
            }

            // email

        } else {
            echo "Your are not a admin....";
        }
    }
}
