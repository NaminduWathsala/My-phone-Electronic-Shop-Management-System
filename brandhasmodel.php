<?php
session_start();
require "connection.php";

if (isset($_SESSION["a"])) {

    $bt = $_POST["bt"];
    $mt = $_POST["mt"];


    $mtbt = Database::search("SELECT * FROM `model_has_brand` WHERE `model_id`='" . $mt . "' AND `brand_id` = '" . $bt . "' ");
    $mtbtn = $mtbt->num_rows;

    if ($mtbtn == 1) {
        echo "Brand already have model";
    } else {
        Database::iud("INSERT INTO `model_has_brand` (`model_id`,`brand_id`) VALUES ('" . $mt . "','" . $bt . "') ");
        echo "Success";
    }
}
