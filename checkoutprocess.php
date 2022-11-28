<?php
$array;
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
    $total_amount = $_POST["ta"];

    $umail = $_SESSION["u"]["email"];

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $umail . "' ");
    $cn = $cartrs->num_rows;
    $item;
    $item1 = "";

    for ($c = 0; $c < $cn; $c++) {


        $cartrsdata = $cartrs->fetch_assoc();
        $qty = $cartrsdata["qty"];

        $orderID = uniqid();
        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cartrsdata["product_id"] . "';");
        $pr = $productrs->fetch_assoc();

        $item[$c] = $pr["title"];

        $item1 = $item1 . " " . $item[$c] . ",";
    }

    $adrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "';");
    $adn = $adrs->num_rows;
    $cityid;
    $add;
    if ($adn == 1) {
        $adr = $adrs->fetch_assoc();
        $cityid = $adr["city_id"];
        $add = $adr["line1"] . "," . $adr["line2"];
        $adr = $adrs->fetch_assoc();


        $cityrs = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "';");
        $cr = $cityrs->fetch_assoc();
        $districtid = $cr["district_id"];

        $delivery = "0";

        if ($districtid == "1") {
            $delivery = $pr["delivery_fee_colombo"];
        } else {
            $delivery = $pr["delivery_fee_other"];
        }



        // $item = $pr["title"];
        // $amount = $pr["price"] * $qty + $delivery;
        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];

        $city = $cr["name"];

        $array['id'] = $orderID;
        $array['item'] = $item1;
        $array['amount'] = $total_amount;
        $array['fname'] = $fname;
        $array['lname'] = $lname;
        $array['email'] = $umail;
        $array['mobile'] = $mobile;
        $array['address'] = $add;
        $array['city'] = $city;

        echo json_encode($array);
    } else {
        echo "2";
    }
} else {
    echo "1";
}
