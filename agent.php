<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
///code								
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--	Css Link
	========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--	Title
	=========================================================-->
    <title>Kathmandu Real Estate</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!--	Header One -->
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->
            <!--	Banner   --->
            <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Agent</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Agent</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
            <!--	Banner   --->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Agents</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
							$query=mysqli_query($con,"SELECT * FROM user WHERE utype='agent'");
								while($row=mysqli_fetch_array($query))
								{
                            ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="hover-zoomer bg-white shadow-one mb-4">
                                <div class="overflow-hidden"> <img src="admin/user/<?php echo $row['6'];?>" alt="aimage"
                                        class="img-thumbnail img-fluid "
                                        style="height:400px; width: 400px; object-fit:cover"> </div>
                                <div class="py-3 text-center">
                                    <h5 class="text-secondary hover-text-success"><a
                                            href="#"><?php echo $row['1'];?></a></h5>
                                    <div>
                                        <a href="tel:<?php echo $row['3'];?>"><?php echo $row['3'];?></a>
                                    </div>
                                    <span>Real Estate - Agent</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--	Footer   start-->
            <?php include("include/footer.php");?>
            <!--	Footer   start-->
        </div>
    </div>
    <!-- Wrapper End -->
    <!--	Js Link
============================================================-->
    <script src="js/jquery.min.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/greensock.js"></script>
    <script src="js/layerslider.transitions.js"></script>
    <script src="js/layerslider.kreaturamedia.jquery.js"></script>
    <!--jQuery Layer Slider -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/tmpl.js"></script>
    <script src="js/jquery.dependClass-0.1.js"></script>
    <script src="js/draggable-0.1.js"></script>
    <script src="js/jquery.slider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>