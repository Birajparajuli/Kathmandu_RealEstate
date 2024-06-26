<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <title>Kathmandu Real Estate </title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->

            <!--	Property Grid
		===============================================================-->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-5">
                                <h2>Search Reasults</h2>
                            </div>
                            <div class="row">

                                <?php 
							if(isset($_REQUEST['filter']))
							{
								$type=$_REQUEST['type'];
								$stype=$_REQUEST['stype'];
								$city=$_REQUEST['city'];
								$sql = "SELECT property_list.*, user.uname 
        FROM `property_list`, `user` 
        WHERE property_list.uid = user.uid 
        AND (category = '{$type}' 
             AND sale_rent = '{$stype}' 
             AND (main_location = '{$city}' 
                  OR district = '{$city}' 
                  OR municipality = '{$city}'
                  OR ad_title LIKE '%{$city}%'
                  OR tole = '{$city}'
                 )
            )";

								$result=mysqli_query($con,$sql);
								if(mysqli_num_rows($result)>0)
								{
									if($result == true)
									{
										while($row=mysqli_fetch_array($result))
										{
							?>
                                <div class="col-md-6">
                                    <div class="featured-thumb hover-zoomer mb-4">
                                        <div class="overlay-black overflow-hidden position-relative"> <img
                                                src="admin/property/<?php echo $row['image1'];?>" alt="pimage"
                                                class=" img-fluid " style="height:300px; object-fit:cover">
                                            <div class="sale bg-primary text-white">For <?php echo $row['sale_rent'];?>
                                            </div>
                                            <div class="price text-primary text-capitalize">रु.
                                                <?php echo $row['price'];?>
                                                <span class="text-white"><?php echo $row['land_space'];?></span>
                                            </div>
                                        </div>
                                        <div class="featured-thumb-data shadow-one">
                                            <div class="p-4">
                                                <h5 class="text-secondary hover-text-success mb-2 text-capitalize"><a
                                                        href="propertydetail.php?pid=<?php echo $row['id'];?>"><?php echo $row['ad_title'];?></a>
                                                </h5>
                                                <span class="location text-capitalize"><i
                                                        class="fas fa-map-marker-alt text-success"></i>
                                                    <?php echo $row['main_location'];?></span>
                                            </div>
                                            <div class="px-4 pb-4 d-inline-block w-100">
                                                <div class="float-left text-capitalize"><i
                                                        class="fas fa-user text-success mr-1"></i>By :
                                                    <?php echo $row['uname'];?></div>
                                                <div class="float-right"><i
                                                        class="far fa-calendar-alt text-success mr-1"></i>
                                                    <?php echo date('d-m-Y', strtotime($row['date']));?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 		
										} 
									}
								}
								else {
									echo "<h1 class='mb-5'><center>No Property Available</center></h1>";
								}
							}
							?>
                                <!--    <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        <li class="page-item disabled"> <span class="page-link">Previous</span> </li>
                                        <li class="page-item active" aria-current="page"> <span class="page-link"> 1 <span class="sr-only">(current)</span> </span> </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
                                    </ul>
                                </nav>
                            </div>  -->
                            </div>
                        </div>
                        <div class="col-lg-4">

                            <div class="sidebar-widget mt-5">
                                <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently
                                    Added Property</h4>
                                <ul class="property_list_widget">
                                    <?php 
								$query=mysqli_query($con,"SELECT * FROM `property_list` WHERE approved=true ORDER BY date DESC LIMIT 2");
										while($row=mysqli_fetch_array($query))
										{
								?>
                                    <li> <img src="admin/property/<?php echo $row['image1'];?>" alt="pimage"
                                            class="img-thumbnail img-fluid "
                                            style="height:100px; width: 100px; object-fit:cover">
                                        <h6 class="text-secondary hover-text-success text-capitalize"><a
                                                href="propertydetail.php?pid=<?php echo $row['id'];?>"><?php echo $row['ad_title'];?></a>
                                        </h6>
                                        <span class="font-14"><i
                                                class="fas fa-map-marker-alt icon-success icon-small"></i>
                                            <?php echo $row['main_location'];?></span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
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