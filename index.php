<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Unlock Your Dream Home in Kathmandu</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->
            <!--	Banner Start   -->
            <div class="overlay-black w-100 slider-banner1 position-relative"
                style="background-image: url('images/banner/rshmpg.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-lg-12">
                            <div class="text-white">
                                <h1 class="mb-5 text-center">Find Your Perfect Property</h1>
                                <form method="post" action="propertygrid.php">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="type">
                                                    <option value="">Select Type</option>
                                                    <option value="house">House</option>
                                                    <option value="apartment">Apartment</option>
                                                    <option value="building">Building</option>


                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-2">
                                            <div class="form-group">
                                                <select class="form-control" name="stype">
                                                    <option value="">Select Status</option>
                                                    <option value="rent">Rent</option>
                                                    <option value="sale">Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="city"
                                                    placeholder="Enter City" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <button type="submit" name="filter"
                                                    class="btn btn-custom btn-primary w-100">Search Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Banner End  -->
            <!--Recent Properties  -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-secondary double-down-line text-center mb-4">Recent Property</h2>
                        </div>
                        <div class="col-md-12">
                            <div class="tab-content mt-4" id="pills-tabContent">
                                <div class="" id="pills-home" role="tabpanel" aria-labelledby="pills-home">
                                    <div class="row">
                                        <?php $query=mysqli_query($con,"SELECT property_list.*, user.uname,user.utype,user.uimage FROM `property_list`,`user` WHERE property_list.uid=user.uid AND approved=true ORDER BY date DESC LIMIT 9");
										while($row=mysqli_fetch_array($query))
										{
									?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="featured-thumb hover-zoomer mb-4 property-card card">
                                            <div class="overlay-black overflow-hidden position-relative"
                                                    id="myCard"> <img src="admin/property/<?php echo $row['image1'];?>"
                                                        alt="pimage" style="height:100%;">
                                                    <div class="featured bg-primary text-white">New</div>
                                                    <div class="sale bg-primary text-white text-capitalize">For
                                                        <?php echo $row['sale_rent'];?></div>
                                                    <div class="price text-primary"><b>रु. <?php echo $row['price'];?>
                                                        </b><span class="text-white"><?php echo $row['land_space'];?>
                                                        </span></div>
                                                </div>
                                                <div class=" shadow-one">
                                                    <div class="p-3">
                                                        <h5
                                                            class="text-secondary hover-text-success mb-2 text-capitalize">
                                                            <a
                                                                href="propertydetail.php?pid=<?php echo $row['id'];?>"><?php echo $row['ad_title'];?></a>
                                                        </h5>
                                                        <span class="location text-capitalize"><i
                                                                class="fas fa-map-marker-alt text-success"></i>
                                                            <?php echo $row['main_location'];?></span>
                                                    </div>

                                                    <div class="p-4 d-inline-block w-100">
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
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Recent Properties  -->
            <div class=" full-row bg-gray " style="margin:10px; border-radius:6px">
                <div class="container">
                    <div class="fact-counter">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i
                                        class="flaticon-house flat-large " aria-hidden="true"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(id) FROM property_list");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-primary my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class=" h5">Total Available Property</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i
                                        class="flaticon-house flat-large " aria-hidden="true"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(id) FROM property_list where sale_rent='Sale'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-primary my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class=" h5">Property For Sale</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i
                                        class="flaticon-house flat-large " aria-hidden="true"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(id) FROM property_list where sale_rent='Rent'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-primary my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class=" h5">Property For Rent</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i
                                        class="flaticon-man flat-large " aria-hidden="true"></i>
                                    <?php
										$query=mysqli_query($con,"SELECT count(uid) FROM user");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                    <div class="count-num text-primary my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
                                    <?php } ?>
                                    <div class=" h5">Total Users</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--	Popular Place -->
            <!-- <div class="full-row bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center mb-5">Popular Places</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div
                                    class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                    <img src="images/thumbnail4/1.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Pune'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                        <h4 class="hover-text-success text-capitalize"><a
                                                href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a>
                                        </h4>
                                        <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div
                                    class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                    <img src="images/thumbnail4/2.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Panaji'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                        <h4 class="hover-text-success text-capitalize"><a
                                                href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a>
                                        </h4>
                                        <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div
                                    class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                    <img src="images/thumbnail4/3.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Surat'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                        <h4 class="hover-text-success text-capitalize"><a
                                                href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a>
                                        </h4>
                                        <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 pb-1">
                                <div
                                    class="overflow-hidden position-relative overlay-secondary hover-zoomer mx-n13 z-index-9">
                                    <img src="images/thumbnail4/4.jpg" alt="">
                                    <div class="text-white xy-center z-index-9 position-absolute text-center w-100">
                                        <?php
										$query=mysqli_query($con,"SELECT count(state), property.* FROM property where city='Jaipur'");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                        <h4 class="hover-text-success text-capitalize"><a
                                                href="stateproperty.php?id=<?php echo $row['17']?>"><?php echo $row['state'];?></a>
                                        </h4>
                                        <span><?php 
												$total = $row[0];
												echo $total;?> Properties Listed</span>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--	Popular Places -->
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
    <script src="js/YouTubePopUp.jquery.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>