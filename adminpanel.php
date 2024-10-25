<!DOCTYPE html>
<html lang="en">

<head>
    <title>NSBM | Home</title>
    <link rel="icon" href="resources/logo/lg2.jpg" />

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>



<body>
    <div class="container-fluid">
        <div class="row">

            <?php
             include "loggerHeader.php";
            require "connection.php";
            ?>


<div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-6 col-md-8">
                        <h1 class="text-center mb-4">ADMIN PANEL</h1>
                        <button type="button" class="btn btn-primary btn-lg btn-block mb-3" onclick="studentsignupmodel();">Student SignUp</button>
                        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="wardensignupmodel();">Warden SignUp</button>
                        <button type="button" class="btn btn-dark btn-lg btn-block" onclick="addadminpost();">Add Post</button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="lm4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Student Sign up</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="f" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="l" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="e" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="p" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="m" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" id="g">
                                            <?php

                                            $rs = Database::search("SELECT * FROM `gender`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo ($d["gender_id"]); ?>"><?php echo ($d["gender"]); ?></option>

                                            <?php

                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 d-none mt-lg-3" id="msgdiv">

                                        <div class="alert alert-danger" role="alert" id="alertdive">
                                            <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                            </i>

                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6 d-grid p-4">
                                        <button type="button" class="btn btn-primary" onclick="studentsignUp();">Sign Up</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- student Sign up -->

           

            

            <!-- warden Sign up -->
            <!-- Modal -->
            <div class="modal fade" id="lm5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"> warden Sign up</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="f1" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="l1" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="e1" />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="p1" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="m1" />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" id="g1">
                                            <?php

                                            $rs = Database::search("SELECT * FROM `gender`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo ($d["gender_id"]); ?>"><?php echo ($d["gender"]); ?></option>

                                            <?php

                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 d-none mt-lg-3" id="msgdiv2">

                                        <div class="alert alert-danger" role="alert" id="alertdive">
                                            <i class="bi bi-x-octagon-fill fs-5" id="msg2">

                                            </i>

                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-6 d-grid p-4">
                                        <button type="button" class="btn btn-primary" onclick="wardensignUp();">Sign Up</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- warden Sign up -->

           
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>