<!DOCTYPE html>

<head>
    <title>Health - Medical Website Template</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-style.css">

    <link rel="stylesheet" href="css/p_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>


<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <!-- HEADER -->


    <!-- MENU -->
    <section class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="index.html" class="navbar-brand"><i class="fa fa-h-square"></i>ealth Center</a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html" class="smoothScroll">Home</a></li>
                    <li><a href="show_all.php" class="smoothScroll">Show All</a></li>
                    <li class="appointment-btn"><a href="index.html">Registration a patient</a></li>
                </ul>
            </div>

        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="text-center">Profile Settings</h4>
            </div>
        </div>

    </div>



    <?php
    include 'connect.php';
    $id = $_POST['patient_id'];
    //$_GET['id'];

    $sql_info = "SELECT * FROM `patient` WHERE `ID` = " . $id . ";";
    $sql_payment = "SELECT `DEMAND`,`PAID`,(DEMAND-PAID) AS DUE FROM `payment` WHERE `P_ID` = " . $id . ";";
    $sql_medi = "SELECT `DATE`,`MEDI_NAMES`,`PROBLEMS` FROM `pre_medicine` WHERE `P_ID` = " . $id . ";";
    $sql_cmnd = "SELECT * FROM `common_diseases` WHERE `P_ID` = " . $id . ";";

    // echo $sql_info."  ";
    // echo $sql_medi."   ";
    // echo $sql_payment."  ";
    $result1 = mysqli_query($con_db, $sql_info);
    $result2 = mysqli_query($con_db, $sql_payment);
    $result3 = mysqli_query($con_db, $sql_medi);
    $result4 = mysqli_query($con_db, $sql_cmnd);

    if ($result1) {
        $row1 = mysqli_fetch_array($result1);
    } else {
        echo "NOO 1";
    }
    if ($result2) {
        $row2 = mysqli_fetch_array($result2);
    } else {
        echo "NOOOOOOOO 2";
    }
    if ($result3) {
        $row3 = mysqli_fetch_array($result3);
    } else {
        echo "NOOOOOOOO 3";
    }
    if ($result4) {
        $row4 = mysqli_fetch_array($result4);
    } else {
        echo "NOOOOOOOO 4";
    }

    ?>

    <!-- Profile -->
    <div class="container rounded bg-white mt-5 mb-5">
        <form action="update_p.php" method="post">
            <div class="row">

                <div class="col-sm-3 order-first">
                    <div class="p-3 py-5">

                        <div class="row mt-2">
                            <div class="col-md-4"><label class="labels">Id</label><input name="id" type="text" class="form-control" value="<?php echo $row1['ID']; ?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-7"><label class="labels">Name</label><input name="name" type="text" class="form-control" VALUE="<?php echo $row1['NAME']; ?>"></div>
                            <div class="col-md-7"><label class="labels">Blood Group</label><input name="bg" type="text" class="form-control" VALUE="<?php echo $row1['BLOOD GROUP']; ?>"></div>
                            <div class="col-md-7"><label class="labels">Mobile Number</label><input name="phn" type="text" class="form-control" VALUE="<?php echo $row1['PHONE NUMBER']; ?>"></div>
                            <div class="col-md-7"><label class="labels">Address</label><input name="addr" type="text" class="form-control" VALUE="<?php echo $row1['ADDRESS']; ?>"></div>
                            <div class="col-md-7"><label class="labels">Father's Name</label><input name="fname" type="text" class="form-control" VALUE="<?php echo $row1["FATHER'S NAME"]; ?>"></div>
                            <div class="col-md-7"><label class="labels">Mother's Name</label><input name="mname" type="text" class="form-control" VALUE="<?php echo $row1["MOTHER'S NAME"]; ?>"></div>

                            <div class="col-md-7"><label class="labels">Sex</label><input name="sex" type="text" class="form-control" VALUE="<?php echo $row1['SEX']; ?>"></div>
                            <div class="col-md-7"><label class="labels">Marital Status</label><input name="ms" type="text" class="form-control" VALUE="<?php echo $row1['MARITAL STATUS']; ?>"></div>
                            <div class="col-md-7"><label class="labels">Date Of Birth</label><input name="dob" type="text" class="form-control" VALUE="<?php echo $row1['DOB']; ?>"></div>
                        </div>

                    </div>

                </div>

                <div class="col-sm-6 ">
                    <div class="p-5 py-7">
                        <div class="col-md-13">
                            <p style="font-size:16px;color:black">Problems</p><textarea name="problems" type="text" class="form-control" style="padding-bottom:230px"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 order-last">
                    <div class="">
                        <div class="col-md-7">
                            <p style="font-size:16px;color:black">Payment</p>
                            <p>Demand: <span><?php echo $row2['DEMAND']; ?></span></p>
                            <p>Paid: <span><?php echo $row2['PAID']; ?></span></p>
                            <p>Due: <span><?php echo $row2['DUE']; ?></span></p>
                            <input type="text" class="form-control" placeholder="New payment" value="" name="payment">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    <div class="p-5 py-7">
                        <div class="col-md-13">
                            <p style="font-size:16px; color:black;margin-top:10px;margin-right:30px;">Medicine <a class="text-center btn btn-warning profile-button navbar-right" target="_blank" href="pre_medi.php?pid=<?php echo $id; ?>" style="font-size:16px; color:black;">Previous Medicine</a></p>
                            <textarea name="medicine" type="text" class="form-control" style="padding-bottom:250px"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 order-last">
                    <div class=" col-md-7">
                        <p style="font-size:16px;color:black;">Common Diseases</p>
                        <p style="color:black;">Diabetics&ensp;&ensp;&ensp;&ensp;&ensp;: <span><?php echo $row4['DIABETICS']; ?></span></p>
                        <p style="color:black;">High Pressure: <span><?php echo $row4['HIGH_PRESSURE']; ?></span></p>
                        <p style="color:black;">HIV&ensp; &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: <span><?php echo $row4['HIV']; ?></span></p>
                        <p style="color:black;">Asma&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: <span><?php echo $row4['ASMA']; ?></span></p>
                    </div>
                </div>

            </div>
            <div class="mt-5 text-center"><input class="mt-5 text-center btn btn-primary profile-button" type="submit" value="Submit">
            </div>
        </form>
    </div>


    <!-- FOOTER -->
    <footer data-stellar-background-ratio="5">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                        <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu
                            elit consequat ultricies.</p>

                        <div class="contact-info">
                            <p><i class="fa fa-phone"></i> 010-070-0170</p>
                            <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Author</h4>
                        <h5 class="wow fadeInUp" data-wow-delay="0.4s">Iftekhar Ahamed Siddiquee</h4>
                            <div class="latest-stories">
                                <div class="stories-image">
                                    <a href="#"><img src="images/iftekhar.jpg" class="img-responsive" alt=""></a>
                                </div>
                                <div class="stories-info">
                                    <span>Mobile : 01612158329</span>
                                    <p>Intake-44 Sec-12</p>

                                </div>
                            </div>
                            <h5 class="wow fadeInUp" data-wow-delay="0.4s">Rafikul Islam Redwan</h4>
                                <div class="latest-stories">
                                    <div class="stories-image">
                                        <a href="#"><img src="images/redwan.PNG" class="img-responsive" alt=""></a>
                                    </div>
                                    <div class="stories-info">
                                        <span>Mobile : 01799276760</span>
                                        <p>Intake-44 Sec-12</p>

                                    </div>
                                </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="footer-thumb">
                        <div class="opening-hours">
                            <h4 class="wow fadeInUp" data-wow-delay="0.4s">Opening Hours</h4>
                            <p>Monday - Friday <span>06:00 AM - 10:00 PM</span></p>
                            <p>Saturday <span>09:00 AM - 08:00 PM</span></p>
                            <p>Sunday <span>Closed</span></p>
                        </div>

                        <ul class="social-icon">
                            <li><a href="https://www.facebook.com/iftekharahamedsiddiquee" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                            <li><a href="https://www.instagram.com/iftekhar_ahamed_siddiquee/" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 border-top">
                    <div class="col-md-4 col-sm-6">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2021 Iftekhar & Redwan</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-link">
                            <p><b>Banglasesh University of Business and Technology</b></p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 text-align-center">
                        <div class="angle-up-btn">
                            <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>


</html>