<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {

    $oid = $_POST["oid"];

    $email = $_POST["email"];
    $city =  $_POST["city"];

    $cityrs = Database::search("SELECT * FROM `city` WHERE `name`='" . $city . "';");
    $cr = $cityrs->fetch_assoc();
    $districtid = $cr["district_id"];

    $delivery = "0";

    $cartrs = Database::search("SELECT * FROM `cart` WHERE  `user_email`='" . $email . "' ");
    $cn = $cartrs->num_rows;
    $crid;
    $crd = " ";
    for ($c = 0; $c < $cn; $c++) {

        $cartrsdata = $cartrs->fetch_assoc();
        $qty = $cartrsdata["qty"];
        $orderID = uniqid();
        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartrsdata["product_id"] . "'; ");
        $pr = $productrs->fetch_assoc();

        if ($districtid == "1") {
            $delivery =$pr["delivery_fee_colombo"];
        } else {
            $delivery =$pr["delivery_fee_other"];
        }

        $total = $pr["price"] * $qty + $delivery;
        $total_qty = $pr["qty"];
        $newqty = $total_qty - $qty;
        Database::iud("UPDATE `product` SET `qty`='" . $newqty . "' WHERE `id`='" . $cartrsdata["product_id"] . "' ");

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `invoice`(`order_id`,`product_id`,`user_email`,`date`,`total`,`qty`) VALUES('" . $oid . "','" . $cartrsdata["product_id"] . "','" . $email . "','" . $date . "','" . $total . "','" . $qty . "') ");

        $crid[$c] = $cartrsdata["id"];
        $crd = $crd . " " . $crid[$c] . ",";
    }

    echo "1,";
    echo $crd;
}
