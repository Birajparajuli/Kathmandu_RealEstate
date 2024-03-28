<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}								
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--	Fonts
	========================================================-->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <!--	Css Link
	========================================================-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/layerslider.css">
    <link rel="stylesheet" type="text/css" href="css/color.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!--	Title
	=========================================================-->
    <title>Kathmandu Real Estate</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->
            <!--	Submit property   -->
            <div class="full-row ">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
                            <a class="btn btn-primary btn-custom" style="border-radius:30px;"
                                href="submitproperty.php">Add New
                                Property</a>
                            <?php 
								if(isset($_GET['msg']))	
								echo $_GET['msg'];	
							?>
                        </div>
                    </div>
                    <table class="items-list col-lg-12 table-hover" style="border-collapse:inherit;">
                        <thead>
                            <tr class="bg-dark">
                                <th class="text-white ">Properties</th>
                                <th class="text-white ">Category</th>
                                <th class="text-white ">Type</th>
                                <th class="text-white ">Added Date</th>
                                <th class="text-white "> Property Status</th>
                                <th class="text-white "> Approval Status</th>
                                <th class="text-white ">Update</th>
                                <th class="text-white ">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
							$uid=$_SESSION['uid'];
							$query=mysqli_query($con,"SELECT * FROM `property_list` WHERE uid='$uid'");
								while($row=mysqli_fetch_array($query))
								{
							?>
                            <tr>
                                <td>
                                    <img src="admin/property/<?php echo $row['image1'];?>" alt="pimage"
                                        class="img-thumbnail img-fluid "
                                        style="height:200px; width: 200px; object-fit:cover">
                                    <div class="property-info d-table">
                                        <h5 class="text-secondary text-capitalize"><a
                                                href="propertydetail.php?pid=<?php echo $row['id'];?>"><?php echo $row['ad_title'];?></a>
                                        </h5>
                                        <span class="font-14 text-capitalize"><i
                                                class="fas fa-map-marker-alt text-success font-13"></i>&nbsp;
                                            <?php echo $row['main_location'];?></span>
                                        <div class="price mt-3">
                                            <span class="text-success">रु. &nbsp;<?php echo $row['price'];?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $row['category'];?></td>
                                <td class="text-capitalize">For <?php echo $row['sale_rent'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td class="text-capitalize"><?php echo $row['status'];?></td>
                                <td class="text-capitalize">
                                    <?php if( $row['32']==1){
                                                echo "<span class='badge bg-success text-white'>Approved</span>";
                                            }else{
                                                echo "<span class='badge bg-danger text-white'>Pending</span>";
                                            } ?></td>
                                <td><a class="btn btn-info"
                                        href="submitpropertyupdate.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger"
                                        href="submitpropertydelete.php?id=<?php echo $row['id'];?>">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!--	Submit property   -->
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