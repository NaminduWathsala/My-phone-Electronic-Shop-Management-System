<?php
require "connection.php";

$pid = $_GET["id"];

$product = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "' ");
$pn = $product->num_rows;

Database::iud("DELETE FROM `product` WHERE `id` = '" . $pid . "' ");
if ($pn = 1) {

    Database::iud("DELETE FROM `product` WHERE `id` = '" . $pid . "' ");

    Database::iud("DELETE FROM `images` WHERE `product_id` = '" . $pid . "' ");


    echo "success";
} else {
    echo "Product Does Not Exist.";
}
