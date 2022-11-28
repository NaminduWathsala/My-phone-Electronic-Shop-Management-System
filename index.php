<!DOCTYPE html>

<html>

<head>
    <title>MYphone</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="" style="background-color: #DFFF00;background-image: linear-gradient(60deg,#DFFF00 0%,#FFBF00 70%);">
    <div class="container-fluid vh-100 d-flex  justify-content-center">

        <div class="row align-content-center">

            <!-- Header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center title1">Hi, Welcome to MYphone</p>
                    </div>
                </div>
            </div>
            <!-- Header -->


            <!-- content -->
            <div class="col-12 px-5">
                <div class=" row">
                    <div class="col-6 d-none d-lg-block background">

                    </div>

                    <div class="col-12 col-lg-6 d-none" id="signUpBox">
                        <div class="row g-1">

                            <div class="col-12">
                                <p class="title2">Create New Account</p>
                                <p class="text-danger" id="msg"></p>
                            </div>
                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input class="form-control" type="text" id="fname">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" type="text" id="lname">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="text" id="email">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" id="password">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input class="form-control" type="text" id="mobile">
                            </div>

                            <div class="col-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select" id="gender">
                                    <?php

                                    require "connection.php";
                                    $r = Database::search("SELECT * FROM `gender`");
                                    $n = $r->num_rows;
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();

                                    ?>
                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button onclick="changeView();" class="btn btn-dark">Already have an account? Sign in</button>
                            </div>

                        </div>
                    </div>





                    <div class="col-12 col-lg-6" id="signInBox">

                        <div class="row g-3">

                            <div class="col-12">
                                <p class="title2">Sign In To Your Account </p>
                                <p class="text-danger" id="msg2"></p>

                            </div>

                            <?php

                            $e = "";
                            $p = "";

                            if (isset($_COOKIE["e"])) {
                                $e = $_COOKIE["e"];
                            }

                            if (isset($_COOKIE["p"])) {
                                $p = $_COOKIE["p"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="text" id="email2" value="<?php echo $e; ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" id="password2" value="<?php echo $p; ?>">
                            </div>

                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="#" onclick="frogotPassword();">Forgot Password?</a>
                            </div>


                            <div class="col-12 col-lg-6 d-grid ">
                                <button class="btn btn-primary" onclick="signIn();">Sign In</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid ">
                                <button onclick="changeView();" class="btn btn-danger">New to MYphone? Join Now</button>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <!-- content -->
            <div class="d-none d-lg-block">
                <p class="pwhi">.</p>
            </div>
            <!-- footer -->

            <div class="col-12 d-none d-lg-block fixed-bottom">

                <p class="text-center">&copy; 2021 MYphone.lk All Rights Reserved</p>
            </div>
            <div class="col-1 text-start fixed-bottom mb-3">
                <a class="fs-6 text-white fw-bold  btn-sm btn-warning text-decoration-none" href="adminsignin.php">Admin</a>
            </div>
            <!-- footer -->

            <!-- model -->
            <div class="modal fade" tabindex="-1" id="frogotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" s>Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" id="np">
                                        <button class="btn btn-outline-primary" type="button" id="npb" onclick="showPassword1();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="password" id="rnp">
                                        <button class="btn btn-outline-primary" type="button" id="rnpb" onclick="showPassword2();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input class="form-control" type="type" id="vc">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- model -->

        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.min.js"></script>

</body>

</html>