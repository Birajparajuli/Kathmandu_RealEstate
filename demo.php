<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Property Form</h2>
        <form action="submit_property.php" method="POST" enctype="multipart/form-data">
            <!-- Basic Information -->
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
                        <label for="images">Images:</label>
                        <input type="file" class="form-control-file" id="images" name="images[]" multiple>
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

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>