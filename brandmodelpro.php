<?php
session_start();
require "connection.php";

if (isset($_SESSION["a"])) {

    $bt = $_POST["bt"];
    $mt = $_POST["mt"];


    $mtbt = Database::search("SELECT * FROM `brand` WHERE `name`='" . $bt . "'  ");
    $mtbtn = $mtbt->num_rows;

    if ($mtbtn !== 1) {

        if (empty($bt) && empty($mt)) {
            echo "Please add a Brand or Model or Both";
        } else if (!empty($bt) && !empty($mt)) {
            Database::iud("INSERT INTO `brand` (`name`) VALUES ('" . $bt . "') ");
            Database::iud("INSERT INTO `model` (`name`) VALUES ('" . $mt . "') ");
            echo "Brand and Model Both updated";
        } else if (empty($mt) && !empty($bt)) {
            Database::iud("INSERT INTO `brand` (`name`) VALUES ('" . $bt . "') ");
            echo "Brand updated";
        } else if (empty($bt) && !empty($mt)) {
            Database::iud("INSERT INTO `model` (`name`) VALUES ('" . $mt . "') ");
            echo "Model updated";
        } else {
            echo "Please add a Brand or Model or Both";
        }
    } else {
        echo "Brand name already exists ";
    }
}
