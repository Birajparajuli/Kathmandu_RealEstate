<?php
include("config.php");
$error="";
$msg="";

if (isset($_POST['add'])) {
    
    $seller_id = $_POST['seller_id'];
    $property_id = $_POST['property_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO inquiry (sellerId, propertyId, name, email, phone, message) VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iissss", $seller_id, $property_id, $name, $email, $phone, $message);

        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            $msg = "<p class='alert alert-success'>Message Sent Successfully</p> ";
        } else {
            $error = "<p class='alert alert-warning'>Error sending message!</p> ";
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = "<p class='alert alert-warning'>Error sending message!</p> ";
    }
}

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
    <title>Kathmandu Real Estate</title>
</head>

<body>
    <div id="page-wrapper">
        <div class="row">
            <!--	Header start  -->
            <?php include("include/header.php");?>
            <!--	Header end  -->
            <div class="full-row">
                <div class="container">
                    <div class="row">
                        <?php
						$id=$_REQUEST['pid']; 
						$query=mysqli_query($con,"SELECT property_list.*, user.* FROM `property_list`,`user` WHERE property_list.uid=user.uid and id='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="single-property"
                                        style="width:1200px; height:700px; margin:30px auto 50px; border-radius:6px">
                                        <!-- Slide 1-->
                                        <div class="ls-slide"
                                            data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;">
                                            <img width="1920" height="1080"
                                                src="admin/property/<?php echo $row['image1'];?>" class="ls-bg"
                                                alt="" />
                                        </div>
                                        <!-- Slide 2-->
                                        <div class="ls-slide"
                                            data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;">
                                            <img width="1920" height="1080"
                                                src="admin/property/<?php echo $row['image2'];?>" class="ls-bg"
                                                alt="" />
                                        </div>
                                        <!-- Slide 3-->
                                        <div class="ls-slide"
                                            data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;">
                                            <img width="1920" height="1080"
                                                src="admin/property/<?php echo $row['image3'];?>" class="ls-bg"
                                                alt="" />
                                        </div>
                                        <!-- Slide 4-->
                                        <div class="ls-slide"
                                            data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;">
                                            <img width="1920" height="1080"
                                                src="admin/property/<?php echo $row['image4'];?>" class="ls-bg"
                                                alt="" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="bg-secondary d-table p-2 rounded text-white">For
                                        <?php echo $row['sale_rent'];?></div>
                                    <h5 class="mt-2 text-secondary "><?php echo $row['ad_title'];?></h5>
                                    <span class="mb-sm-20 d-block "><i
                                            class="fas fa-map-marker-alt text-success font-12"></i>
                                        &nbsp;<?php echo $row['main_location'];?></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-secondary text-left h5 my-2 text-md-right">
                                        रु. <?php echo $row['price'];?></div>
                                    <div class="text-left text-md-right">Price</div>
                                </div>
                            </div>
                            <div class="property-details">
                                <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                    <ul>
                                        <li class="mr-4"><span
                                                class="text-secondary"><?php echo $row['land_space'];?></span> Area
                                        </li>
                                        <li class="mr-4"><span
                                                class="text-secondary"><?php echo $row['living'];?></span> Living</li>
                                        <li class="mr-4"><span
                                                class="text-secondary"><?php echo $row['bedroom'];?></span> Bedroom
                                        </li>
                                        <li class="mr-4"><span
                                                class="text-secondary"><?php echo $row['bathroom'];?></span> Bathroom
                                        </li>
                                        <li class="mr-4"><span
                                                class="text-secondary"><?php echo $row['kitchen'];?></span> Kitchen
                                        </li>
                                        <li class="mr-4"><span
                                                class="text-secondary"><?php echo $row['parking'];?></span> Parking
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="text-secondary my-4">Description</h4>
                                <p><?php echo $row['description'];?></p>
                                <h5 class="mt-5 mb-4 text-secondary">Property Details</h5>
                                <div class="table-striped font-14 pb-2 ">
                                    <table class="w-100">
                                        <tbody>
                                            <tr>
                                                <td>Price</td>
                                                <td class="text-capitalize text-danger">रु. <?php echo $row['price'];?>
                                                </td>
                                                <td>Land Area :</td>
                                                <td class="text-capitalize"><?php echo $row['land_space'];?></td>
                                            </tr>
                                            <tr>
                                                <td>No of Flat:</td>
                                                <td class="text-capitalize"><?php echo $row['no_of_flat'];?></td>
                                                <td>Road Size :</td>
                                                <td class="text-capitalize"><?php echo $row['road_size'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Built Year:</td>
                                                <td class="text-capitalize"><?php echo $row['built_year'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h5 class="mt-5 mb-4 text-secondary">Interior Features</h5>
                                <div class="table-striped font-14 pb-2 ">
                                    <table class="w-100">
                                        <tbody>
                                            <tr>
                                                <td>Direction:</td>
                                                <td class="text-capitalize"><?php echo $row['direction'];?></td>
                                                <td>Bedroom :</td>
                                                <td class="text-capitalize"><?php echo $row['bedroom'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Bathroom :</td>
                                                <td class="text-capitalize"><?php echo $row['bathroom'];?></td>
                                                <td>Living Room:</td>
                                                <td class="text-capitalize"><?php echo $row['living'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Kitchen :</td>
                                                <td class="text-capitalize"><?php echo $row['kitchen'];?></td>
                                                <td>Total Rooms:</td>
                                                <td class="text-capitalize"><?php echo $row['all_rooms'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Parking :</td>
                                                <td class="text-capitalize"><?php echo $row['parking'];?></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h5 class="mt-5 mb-4 text-secondary">Location Details</h5>
                                <div class="table-striped font-14 pb-2 ">
                                    <table class="w-100">
                                        <tbody>
                                            <tr>
                                                <td>State:</td>
                                                <td class="text-capitalize"><?php echo $row['state'];?></td>
                                                <td>District</td>
                                                <td class="text-capitalize"><?php echo $row['district'];?></td>
                                            </tr>
                                            <tr>
                                                <td>Municipality:</td>
                                                <td class="text-capitalize"><?php echo $row['municipality'];?></td>
                                                <td>Ward:</td>
                                                <td class="text-capitalize"><?php echo $row['ward_no'];?></td>
                                            </tr>
                                            <tr>

                                                <td>Tole :</td>
                                                <td class="text-capitalize"><?php echo $row['tole'];?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <h5 class="mt-5 mb-4 text-secondary">Map</h5>
                                <div>
                                    <?php echo $row['google_map'];?>
                                </div>
                                <!-- <?php
                                if(isset($_GET['pid'])&& isset($_GET['sts']))
                                    {
                                        $pid = $_GET['pid'];
                                        $up = mysqli_query($con,"UPDATE `property` set `status`='unavailable',`bookedby`='".$_SESSION['uname']."' where `pid`='".$pid."'");
                                        echo "<h1>Property Booked!. </h1>";
                                    }
                            ?>
                                <button class="btn" style="background-color:#04AA6D; border-radius: 5px; align: right; "
                                    onclick="location.href='propertydetail.php?pid=<?php echo $_GET['pid'] ?>&sts=<?php echo 'book';?>'">Book
                                    Property</button> -->


                            </div>
                        </div>

                        <div class="col-lg-4">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-md-50">
                                Contact Seller</h4>
                            <div class="agent-contact pt-60">

                                <div class="row">
                                    <div class="col-sm-4 col-lg-3">
                                        <img src="admin/user/<?php echo $row['uimage']; ?>" alt=""
                                            style="height:300; width:300; border-radius:6px">
                                    </div>
                                    <div class="col-sm-8 col-lg-9">
                                        <div class="agent-data text-ordinary mt-sm-20">
                                            <h6 class="text-primary text-capitalize"><?php echo $row['uname'];?>
                                            </h6>
                                            <ul class="mb-3">
                                                <li><?php echo $row['uphone'];?></li>
                                                <li><?php echo $row['uemail'];?></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo $error; ?><?php echo $msg; ?>
                            <form method="post">
                                <div class="row">
                                    <input type="hidden" name="seller_id" value="<?php echo $row['uid'];?>">
                                    <input type="hidden" name="property_id" value="<?php echo $row['id'];?>">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" required
                                                placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" required
                                                placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="phone" name="phone" class="form-control" required
                                                placeholder="Enter Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="4" required
                                                placeholder="Enter Message">Hi there! I'm really interested in this property and would love to learn more about it. Could you please provide additional details and possibly arrange a visit?</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-4">
                                            <input type="submit" class="btn btn-primary btn-custom w-100"
                                                value="Send Message" name="add" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4 mt-5">Featured
                                Property</h4>
                            <ul class="property_list_widget">
                                <?php 
                            $query=mysqli_query($con,"SELECT * FROM `property_list` WHERE is_featured = true and approved=true ORDER BY date DESC LIMIT 3");
                                    while($row=mysqli_fetch_array($query))
                                    {
                            ?>
                                <li> <img src="admin/property/<?php echo $row['image1'];?>" alt="pimage"
                                        class="img-thumbnail img-fluid "
                                        style="height:100px; width: 100px; object-fit:cover">
                                    <h6 class="text-secondary hover-text-success text-capitalize"><a
                                            href="propertydetail.php?pid=<?php echo $row['id'];?>"><?php echo $row['ad_title'];?></a>
                                    </h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i>
                                        <?php echo $row['main_location'];?></span>
                                </li>
                                <?php } ?>
                            </ul>
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