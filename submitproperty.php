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
    // Retrieve form data
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
    $status = $_POST['status']; // Assuming 'Available' or 'Not Available'
    

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
	

    // Prepare and bind SQL statement
    $stmt = mysqli_prepare($con, "INSERT INTO property_list (ad_title, category, sale_rent, no_of_flat, bedroom, bathroom, living, kitchen, all_rooms, parking, built_year, built_area, road_size, land_space, direction, price, price_per_unit, description, state, district, municipality, main_location, ward_no, tole, image1, image2, image3, image4, google_map, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        $error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
        die('Error preparing statement: ' . mysqli_error($con));
    }
    
    mysqli_stmt_bind_param($stmt, "sssiiiiiisssssssssssssssssssss", $ad_title, $category, $sale_rent, $no_of_flat, $bedroom, $bathroom, $living, $kitchen, $all_rooms, $parking, $built_year, $built_area, $road_size, $land_space, $direction, $price, $price_per_unit, $description, $state, $district, $municipality, $main_location, $ward_no, $tole, $image1,$image2, $image3, $image4, $google_map, $status);
   
    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    // Redirect to a success page or show a success message
    $msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
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
                <h2 class="text-secondary double-down-line text-center">Submit Property</h2>
            </div>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <?php echo $error; ?>
            <?php echo $msg; ?>
            <div class="card mb-3">
                <div class="card-header">Basic Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ad_title">Ad Title:</label>
                                <input type="text" class="form-control" id="ad_title" name="ad_title" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="House">House</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Flat">Flat</option>
                                    <option value="Office">Office</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sale_rent">Sale/Rent:</label>
                                <select class="form-control" id="sale_rent" name="sale_rent" required>
                                    <option value="Sale">Sale</option>
                                    <option value="Rent">Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_of_flat">No of Flat:</label>
                                <input type="number" class="form-control" id="no_of_flat" name="no_of_flat">
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
                                <input type="number" class="form-control" id="bedroom" name="bedroom">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bathroom">Bathroom:</label>
                                <input type="number" class="form-control" id="bathroom" name="bathroom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="living">Living:</label>
                                <input type="number" class="form-control" id="living" name="living">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kitchen">Kitchen:</label>
                                <input type="number" class="form-control" id="kitchen" name="kitchen">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="all_rooms">All Rooms:</label>
                                <input type="number" class="form-control" id="all_rooms" name="all_rooms">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parking">Parking:</label>
                                <select class="form-control" id="parking" name="parking">
                                    <option value="Moterbike">Moterbike</option>
                                    <option value="Car-1">Car (1)</option>
                                    <option value="Car-2">Car (2)</option>
                                    <option value="Car-3">Car (3)</option>
                                    <option value="Car-4">Car (4)</option>
                                    <option value="Car-5">Car (5)</option>
                                    <option value="Car-6-10">Car (6-10)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="built_year">Built Year:</label>
                                <input type="text" class="form-control" id="built_year" name="built_year">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="built_area">Built Area:</label>
                                <input type="text" class="form-control" id="built_area" name="built_area">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="road_size">Road Size:</label>
                                <input type="text" class="form-control" id="road_size" name="road_size">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="land_space">Land/Space:</label>
                                <input type="text" class="form-control" id="land_space" name="land_space">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direction">Direction:</label>
                                <input type="text" class="form-control" id="direction" name="direction">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_per_unit">Price per unit:</label>
                                <select class="form-control" id="price_per_unit" name="price_per_unit">
                                    <option value="Month">Month</option>
                                    <option value="Year">Year</option>
                                    <option value="
                  Flat">Flat</option>
                                    <option value="House">House</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
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
                                <input type="text" class="form-control" id="state" name="state">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="district">District:</label>
                                <input type="text" class="form-control" id="district" name="district">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="municipality">Municipality:</label>
                                <input type="text" class="form-control" id="municipality" name="municipality">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="main_location">Main Location:</label>
                                <input type="text" class="form-control" id="main_location" name="main_location">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ward_no">Ward No:</label>
                                <input type="text" class="form-control" id="ward_no" name="ward_no">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tole">Tole:</label>
                                <input type="text" class="form-control" id="tole" name="tole">
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
                    </div>
                    <div class="form-group">
                        <label for="images">Image 2</label>
                        <input type="file" class="form-control-file" id="images" name="image2">
                    </div>
                    <div class="form-group">
                        <label for="images">Image 3</label>
                        <input type="file" class="form-control-file" id="images" name="image3">
                    </div>
                    <div class="form-group">
                        <label for="images">Image 4</label>
                        <input type="file" class="form-control-file" id="images" name="image4">
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="card mb-3">
                <div class="card-header">Google Map</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="google_map">Google Map:</label>
                        <input type="text" class="form-control" id="google_map" name="google_map">
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
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>