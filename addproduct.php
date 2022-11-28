<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>

<html>

<head>

    <title>MYphone Add Product</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

</head>

<body style="background-color: #e9f5fb;">

    <div class="container-fluid">

        <?php
        require "header.php";
        ?>

        <div class="row gy-3 ">

            <!-- heading -->

            <div id="addproductbox">
                <div class="row">

                    <div class="col-12 mb-2 mt-4">
                        <h3 class="h2 text-center text-primary"> <b>Product Listing</b> </h3>
                    </div>
                    <!-- heading -->

                    <!-- category,brand,model -->
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-12 col-lg-4">

                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Category</label>
                                </div>

                                <div class="col-12 mb-3 mt-1">
                                    <select class="form-select" id="ca">
                                        <option value="0">Select Category</option>
                                        <?php

                                        $rs = Database::search("SELECT * FROM `category`");
                                        $n = $rs->num_rows;

                                        for ($i = 1; $i <= $n; $i++) {
                                            $cat = $rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo $cat["id"]; ?>"><?php echo $cat["name"]; ?></option>
                                        <?php
                                        }

                                        ?>

                                    </select>
                                </div>

                            </div>

                            <div class="col-12 col-lg-4">

                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Brand</label>
                                </div>

                                <div class="col-12 mb-3 mt-1">
                                    <select class="form-select" id="br">
                                        <option value="0">Select Brand </option>
                                        <?php


                                        $rs = Database::search("SELECT * FROM `brand`");
                                        $n = $rs->num_rows;

                                        for ($i = 1; $i <= $n; $i++) {
                                            $cat = $rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo $cat["id"]; ?>"><?php echo $cat["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 col-lg-4">

                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Model</label>
                                </div>

                                <div class="col-12 mb-3 mt-1">
                                    <select class="form-select" id="mo">
                                        <option value="0">Select Model</option>
                                        <?php


                                        $rs = Database::search("SELECT * FROM `model`");
                                        $n = $rs->num_rows;

                                        for ($i = 1; $i <= $n; $i++) {
                                            $cat = $rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo $cat["id"]; ?>"><?php echo $cat["name"]; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- category,brand,model -->

                    <hr class="hrbreake1" />

                    <!-- title -->

                    <div class="col-12 mb-3 ">
                        <div class="row">

                            <div class="col-12">
                                <label class="form-label lbl1">Add a Title to your Product</label>
                            </div>
                            <div class="offset-lg-2 col-12 col-lg-8">
                                <input class="form-control" type="text" id="ti">
                            </div>

                        </div>
                    </div>

                    <!-- title -->

                    <hr class="hrbreake1" />

                    <!-- condition,color,qty -->

                    <div class="col-12 ">
                        <div class="row">

                            <div class="col-12 col-lg-4">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product condition</label>
                                    </div>

                                    <div class="offset-1 offset-lg-1 col-12 col-lg-3  form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked>
                                        <label class="form-check-label" for="bn">
                                            Brandnew
                                        </label>
                                    </div>

                                    <div class="offset-1 offset-lg-1 col-12 col-lg-3  form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="us">
                                        <label class="form-check-label" for="us">
                                            Used
                                        </label>
                                    </div>

                                </div>
                            </div>


                            <div class="col-12 col-lg-4 mb-3">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Select Product color</label>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">

                                            <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" value="" id="clr1" checked>
                                                <label class="form-check-label" for="clr1">
                                                    Gold
                                                </label>
                                            </div>

                                            <div class="offset-1 offset-lg-0 col-5  col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" value="" id="clr2">
                                                <label class="form-check-label" for="clr2">
                                                    Silver
                                                </label>
                                            </div>

                                            <div class="offset-1 offset-lg-0 col-5  col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" value="" id="clr3">
                                                <label class="form-check-label" for="clr3">
                                                    Graphite
                                                </label>
                                            </div>

                                            <div class="offset-1 offset-lg-0 col-5  col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" value="" id="clr4">
                                                <label class="form-check-label" for="clr4">
                                                    Pasific Blue
                                                </label>
                                            </div>

                                            <div class="offset-1 offset-lg-0 col-5  col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" value="" id="clr5">
                                                <label class="form-check-label" for="clr5">
                                                    Get Black
                                                </label>
                                            </div>

                                            <div class="offset-1 offset-lg-0 col-5  col-lg-4 form-check">
                                                <input class="form-check-input" type="radio" name="colorRadio" value="" id="clr6">
                                                <label class="form-check-label" for="clr6">
                                                    Rose Gold
                                                </label>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Add Product Quantity</label>
                                        <input class="form-control" type="number" value="0" min="0" id="qty" />

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- condition,color,qty -->

                    <hr class="hrbreake1" />

                    <!-- cost,payent,method -->

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-6">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Cost Per Item</label>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost">
                                        <span class="input-group-text">.00</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 offset-lg-1 col-lg-4">
                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label lbl1">Approved Payment Method</label>
                                    </div>

                                    <div class="col-12 offset-2 offset-lg-1 ">
                                        <div class="row">
                                            <div class="col-2 pm1"></div>
                                            <div class="col-2 pm2"></div>
                                            <div class="col-2 pm3"></div>
                                            <div class="col-2 pm4"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- cost,payent,method -->

                    <hr class="hrbreake1" />

                    <!-- dilivery cost -->

                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Delivery Cost</label>
                            </div>
                            <div class="offset-lg-1 col-12 col-lg-3">
                                <label class="form-label">Delivery Cost Within Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1"></label>
                            </div>
                            <div class="offset-lg-1 col-12 col-lg-3 mt-lg-3">
                                <label class="form-label">Delivery Cost Out Of Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7 mt-lg-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- dilivery cost -->

                    <hr class="hrbreake1" />

                    <!-- Description -->

                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Product Description</label>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" cols="100" rows="30" style="background-color: honeydew;" id="desc"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->

                    <hr class="hrbreake1" />

                    <!-- product img -->

                    <div class="col-12 ">
                        <div class="row">

                            <div class="col-12 p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label lbl1">Add Product Image 1</label>
                                    </div>
                                    <img class="col-5 col-lg-2 ms-2 productimg" src="resources/addproductimg.svg" id="prev">
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-12  mt-2">
                                                <div class="row">
                                                    <div class="col-5 col-lg-2 ">
                                                        <input class="d-none" type="file" accept="img/*" id="imguploder">
                                                        <label class="btn btn-primary col-12" for="imguploder" onclick="changeImg();">Upload</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    <!-- product img -->

                    <hr class="hrbreake1" />

                    <!-- notice -->

                    <div class="col-12">
                        <label class="form-label lbl1">Notice...</label>
                        <br />
                        <label class="form-label">We are taking 5% of the product price from every product as a service charge.</label>
                    </div>

                    <!-- notice -->

                    <!-- save btn -->
                    <div class="col-12">
                        <div class="row mb-4">
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid">
                                <button class="btn btn-success searchbtn" onclick="addProduct();">Add Product</button>
                            </div>
                            <!-- <div class="offset-0  col-12 col-lg-3 d-grid">
                                <button class="btn btn-dark searchbtn" onclick="changeProductView();">Update Product</button>
                            </div> -->
                        </div>
                    </div>


                    <!-- save btn -->

                    <!-- footer -->
                    <?php
                    require "footer.php";
                    ?>
                    <!-- footer -->
                </div>
            </div>




            <script src="script.js"></script>
            <script src="bootstrap.bundle.min.js"></script>


</body>

</html>