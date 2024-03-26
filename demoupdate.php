<?php

ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

$error="";
$msg="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid=$_REQUEST['id'];
    $ad_title = $_POST['ad_title'];
    $category = $_POST['category'];
    $sale_rent = $_POST['sale_rent'];
    $no_of_flat = $_POST['no_of_flat'];
    $bedroom = $_POST['bedroom'];
    $bathroom = $_POST['bathroom'];
    $living = $_POST['living'];
    $kitchen = $_POST['kitchen'];
    $all_rooms = $_POST['all_rooms'];
    $parking = $_POST['parking'];
    $built_year = $_POST['built_year'];
    $built_area = $_POST['built_area'];
    $road_size = $_POST['road_size'];
    $land_space = $_POST['land_space'];
    $direction = $_POST['direction'];
    $price = $_POST['price'];
    $price_per_unit = $_POST['price_per_unit'];
    $description = $_POST['description'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $municipality = $_POST['municipality'];
    $main_location = $_POST['main_location'];
    $ward_no = $_POST['ward_no'];
    $tole = $_POST['tole'];
    $google_map = $_POST['google_map'];
    $status = $_POST['status']; 
    

    $image1=$_FILES['image1']['name'];
	$image2=$_FILES['image2']['name'];
	$image3=$_FILES['image3']['name'];
	$image4=$_FILES['image4']['name'];
	
	$temp_name1  =$_FILES['image1']['tmp_name'];
	$temp_name2 =$_FILES['image2']['tmp_name'];
	$temp_name3 =$_FILES['image3']['tmp_name'];
	$temp_name4 =$_FILES['image4']['tmp_name'];

	move_uploaded_file($temp_name1,"admin/property/$image1");
	move_uploaded_file($temp_name2,"admin/property/$image2");
	move_uploaded_file($temp_name3,"admin/property/$image3");
	move_uploaded_file($temp_name4,"admin/property/$image4");
	
    $sql = "UPDATE property_list 
                SET 
                    ad_title = '$ad_title',
                    category = '$category',
                    sale_rent = '$sale_rent',
                    no_of_flat = '$no_of_flat',
                    bedroom = '$bedroom',
                    bathroom = '$bathroom',
                    living = '$living',
                    kitchen = '$kitchen',
                    all_rooms = '$all_rooms',
                    parking = '$parking',
                    built_year = '$built_year',
                    built_area = '$built_area',
                    road_size = '$road_size',
                    land_space = '$land_space',
                    direction = '$direction',
                    price = '$price',
                    price_per_unit = '$price_per_unit',
                    description = '$description',
                    state = '$state',
                    district = '$district',
                    municipality = '$municipality',
                    main_location = '$main_location',
                    ward_no = '$ward_no',
                    tole = '$tole',
                    google_map = '$google_map',
                    status = '$status',
                    
                WHERE id = $pid";

    
    $result=mysqli_query($con,$sql);
	if($result == true)
	{
		$msg="<p class='alert alert-success'>Property Updated</p>";
		header("Location:feature.php?msg=$msg");
	}
	else{
		$msg="<p class='alert alert-warning'>Property Not Updated</p>";
		header("Location:feature.php?msg=$msg");
	}
} else {
   
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
    <!--	Header start  -->
    <?php include("include/header.php");?>
    <!--	Header end  -->


    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">Update Property</h2>
            </div>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <?php echo $error; ?>
            <?php echo $msg; ?>
            <?php
									$pid=$_REQUEST['id'];
									$query=mysqli_query($con,"select * from property_list where id='$pid'");
									while($row=mysqli_fetch_row($query))
									{
								?>
            <div class="card mb-3">
                <div class="card-header">Basic Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ad_title">Ad Title:</label>
                                <input type="text" class="form-control" name="ad_title" required
                                    value="<?php echo $row['2'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="House" <?php if ($row['3'] == 'House') echo 'selected'; ?>>
                                        House</option>
                                    <option value="Apartment" <?php if ($row['3'] == 'Apartment') echo 'selected'; ?>>
                                        Apartment
                                    </option>
                                    <option value="Flat" <?php if ($row['3'] == 'Flat') echo 'selected'; ?>>
                                        Flat</option>
                                    <option value="Office" <?php if ($row['3'] == 'Office') echo 'selected'; ?>>
                                        Office</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sale_rent">Sale/Rent:</label>
                                <select class="form-control" id="sale_rent" name="sale_rent" required>
                                    <option value="Sell" <?php if ($row['4'] == 'Sell') echo 'selected'; ?>>Sell
                                    </option>
                                    <option value="Rent" <?php if ($row['4'] == 'Rent') echo 'selected'; ?>>Rent
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_of_flat">No of Flat:</label>
                                <input type="number" class="form-control" id="no_of_flat" name="no_of_flat"
                                    value="<?php echo $row['5'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property Details -->
            <div class="card mb-3">
                <div class="card-header">Property Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bedroom">Bedroom:</label>
                                <input type="number" class="form-control" id="bedroom" name="bedroom"
                                    value="<?php echo $row['6'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bathroom">Bathroom:</label>
                                <input type="number" class="form-control" id="bathroom" name="bathroom"
                                    value="<?php echo $row['7'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="living">Living:</label>
                                <input type="number" class="form-control" id="living" name="living"
                                    value="<?php echo $row['8'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kitchen">Kitchen:</label>
                                <input type="number" class="form-control" id="kitchen" name="kitchen"
                                    value="<?php echo $row['9'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="all_rooms">All Rooms:</label>
                                <input type="number" class="form-control" id="all_rooms" name="all_rooms"
                                    value="<?php echo $row['10'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parking">Parking:</label>
                                <select class="form-control" id="parking" name="parking">
                                    <option value="Moterbike" <?php if ($row['10'] == 'Moterbike') echo 'selected'; ?>>
                                        Moterbike
                                    </option>
                                    <option value="Car-1" <?php if ($row['10'] == 'Car-1') echo 'selected'; ?>>Car
                                        (1)</option>
                                    <option value="Car-2" <?php if ($row['10'] == 'Car-2') echo 'selected'; ?>>Car
                                        (2)</option>
                                    <option value="Car-3" <?php if ($row['10'] == 'Car-3') echo 'selected'; ?>>Car
                                        (3)</option>
                                    <option value="Car-4" <?php if ($row['10'] == 'Car-4') echo 'selected'; ?>>Car
                                        (4)</option>
                                    <option value="Car-5" <?php if ($row['10'] == 'Car-5') echo 'selected'; ?>>Car
                                        (5)</option>
                                    <option value="Car-6-10" <?php if ($row['10'] == 'Car-6-10') echo 'selected'; ?>>Car
                                        (6-10)
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="built_year">Built Year:</label>
                                <input type="text" class="form-control" id="built_year" name="built_year"
                                    value="<?php echo $row['12'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="built_area">Built Area:</label>
                                <input type="text" class="form-control" id="built_area" name="built_area"
                                    value="<?php echo $row['13'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="road_size">Road Size:</label>
                                <input type="text" class="form-control" id="road_size" name="road_size"
                                    value="<?php echo $row['14'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="land_space">Land/Space:</label>
                                <input type="text" class="form-control" id="land_space" name="land_space"
                                    value="<?php echo $row['15'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direction">Direction:</label>
                                <input type="text" class="form-control" id="direction" name="direction"
                                    value="<?php echo $row['16'];?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="<?php echo $row['17'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_per_unit">Price per unit:</label>
                                <select class="form-control" id="price_per_unit" name="price_per_unit">
                                    <option value="Month" <?php if ($row['18'] == 'Month') echo 'selected'; ?>>Month
                                    </option>
                                    <option value="Year" <?php if ($row['18'] == 'Year') echo 'selected'; ?>>Year
                                    </option>
                                    <option value="Flat" <?php if ($row['18'] == 'Flat') echo 'selected'; ?>>Flat
                                    </option>
                                    <option value="House" <?php if ($row['18'] == 'House') echo 'selected'; ?>>House
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="4"><?php echo $row['19'];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location Details -->
            <div class="card mb-3">
                <div class="card-header">Location Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state">State:</label>
                                <input type="text" class="form-control" id="state" name="state"
                                    value="<?php echo $row['20'];?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district">District:</label>
                                <input type="text" class="form-control" id="district" name="district"
                                    value="<?php echo $row['21'];?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="municipality">Municipality:</label>
                                <input type="text" class="form-control" id="municipality" name="municipality"
                                    value="<?php echo $row['22'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="main_location">Main Location:</label>
                                <input type="text" class="form-control" id="main_location" name="main_location"
                                    value="<?php echo $row['23'];?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ward_no">Ward No:</label>
                                <input type="text" class="form-control" id="ward_no" name="ward_no"
                                    value="<?php echo $row['24'];?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tole">Tole:</label>
                                <input type="text" class="form-control" id="tole" name="tole"
                                    value="<?php echo $row['25'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upload Images -->
            <div class="card mb-3">
                <div class="card-header">Upload Images</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="images">Image 1</label>
                        <input type="file" class="form-control-file" id="images" name="image1">
                        <img class="mt-2" src="admin/property/<?php echo $row['26'];?>" alt="pimage"
                            style="width:300px;">
                    </div>
                    <div class="form-group">
                        <label for="images">Image 2</label>
                        <input type="file" class="form-control-file" id="images" name="image2">
                        <img class="mt-2" src="admin/property/<?php echo $row['27'];?>" alt="pimage"
                            style="width:300px; ">
                    </div>
                    <div class="form-group">
                        <label for="images">Image 3</label>
                        <input type="file" class="form-control-file" id="images" name="image3">
                        <img class="mt-2" src="admin/property/<?php echo $row['28'];?>" alt="pimage"
                            style="width:300px;">
                    </div>
                    <div class="form-group">
                        <label for="images">Image 4</label>
                        <input type="file" class="form-control-file" id="images" name="image4">
                        <img class="mt-2" src="admin/property/<?php echo $row['29'];?>" alt="pimage"
                            style="width:300px;">
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="card mb-3">
                <div class="card-header">Google Map</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="google_map">Google Map:</label>
                        <textarea class="form-control" id="google_map"
                            name="google_map"><?php echo strval($row['30']);?></textarea>
                    </div>
                </div>
            </div>
            <!-- Google Map -->
            <div class="card mb-3">
                <div class="card-header">Display Status</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" name="status">
                            <option value="Available" <?php if ($row['31'] == 'Available') echo 'selected'; ?>>
                                Available</option>
                            <option value="Not Available" <?php if ($row['31'] == 'Not Available') echo 'selected'; ?>>
                                Not Available</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php
								} 
							?>
        </form>
    </div>

</body>

</html>