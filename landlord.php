<?php
include "loggerHeader.php";
require "connection.php";
$landlordId = isset($_SESSION["u"]["landloaders_id"]) ? $_SESSION["u"]["landloaders_id"] : null;

if ($landlordId) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landlord</title>

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <div class="col-12 mt-lg-5 pt-lg-5">
                    <div class="row mt-lg-2">
                        <!-- hostels -->

                        <div class="col-12 mt-lg-5 p-4 bg-black">
                            <div class="row justify-content-center">
                                <div class="col-4 d-grid">
                                    <button class="text-white header-button1 ps-5 pe-5 pt-2 pb-2" href="#" onclick="addHostels();">Add New Hostel &nbsp;<i class="bi bi-plus-circle text-white"></i></button>
                                </div>
                                <div class="col-4 d-grid">
                                    <button class="text-white header-button1 ps-5 pe-5 pt-2 pb-2" href="#" onclick="viewBookings();">View Bookings &nbsp;<i class="bi bi-eye text-white"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3 mt-lg-4">
                            <div class="row border border-primary">

                                <div class="col-12">
                                    <div class="row justify-content-center gap-2 ">

                                        <?php
                                        $hostel_rs = Database::search("SELECT * FROM `uploadhostels` WHERE `landloaders_landloaders_id`='" . $landlordId . "' ORDER BY `dateTimeAdded` DESC");
                                        $hostel_num = $hostel_rs->num_rows;

                                        for ($z = 0; $z < $hostel_num; $z++) {
                                            $hostel_data = $hostel_rs->fetch_assoc();
                                            $hostelId = $hostel_data["uploadHostels_id"];
                                        ?>

                                            <div class="card col-6 col-lg-2 mt-2 mb-2 animation3" style="width: 18rem;" onclick="v(<?php echo ($hostelId); ?>);">
                                                <img src="<?php echo ($hostel_data["imgPath"]) ?>" class="card-img-top img-thumbnail mt-2" style="height: 180px;" />
                                                <div class="card-body ms-0 m-0 text-center">
                                                    <h5 class="card-title fs-6 fw-bold"><?php echo ($hostel_data["description"]) ?><br /> <span class="badge bg-info">New</span></h5>
                                                    <span class="card-text text-primary">Rs.<?php echo ($hostel_data["price"]) ?>.00</span> <br />

                                                    <?php
                                                    if ($hostel_data["bookingApprovel_bookingApprovel_id"] != '1') {
                                                    ?>
                                                        <span class="card-text text-success fw-bold">Available</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="card-text text-success fw-bold">Booked</span>
                                                    <?php
                                                    }
                                                    ?>
                                                    <a href='#' class="col-12 btn text-white" style="background-color: #009900;background-image: linear-gradient(100deg,#009900 0%,#00CC00);">Update</a>
                                                    <button class="col-12 btn text-white mt-2" style="background-color: #FF0000;background-image: linear-gradient(100deg,#FF0000 0%,#FF0033);">Delete</button>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- hostels -->
                    </div>
                </div>

                <!-- Model -->
                <div class="modal fade" id="viewMap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div id="map" style="height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vertically centered modal -->
            <!-- Modal -->
            <div class="modal fade" id="viewBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Location</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="overflow-y: auto;">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Place Name</label>
                                        <input type="email" class="form-control" id="e" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Latitude</label>
                                        <input type="text" class="form-control" id="f" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Longitude</label>
                                        <input type="text" class="form-control" id="l" />
                                    </div>
                                    <div class="col-12 d-none mt-lg-3" id="msgdiv">

                                        <div class="alert alert-danger" role="alert" id="alertdive">
                                            <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                            </i>

                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-12 d-grid p-4">
                                        <button type="button" class="btn btn-primary" onclick="signUp();">Add Location</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location -->

                <?php include "footer.php"; ?>
            </div>
        </div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz2fEM-wMeEvc-LIAEYLIhqo8IPqZOS8k&callback=initMap" async defer></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <script>

            function v(id) {
                var request = new XMLHttpRequest();

                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {
                        var response = JSON.parse(request.responseText);

                        if (response && response.lat1 && response.lng1) {
                            var lat1 = response.lat1;
                            var lng1 = response.lng1;
                            
                            var viewModel = document.getElementById("viewMap");
                            var landModel9 = new bootstrap.Modal(viewModel);
                            landModel9.show();
                            initMap(lat1, lng1);
                        }
                    }
                }

                request.open("GET", "viewLocationProcess.php?id=" + id, true);
                request.send();
            }

            function initMap(lat, lng) {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: parseFloat(lat),
                lng: parseFloat(lng)
                    },
                    zoom: 10
                });

                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(lat),
                lng: parseFloat(lng) 
                    },
                    map: map,
                    title: 'Location'
                });
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("Location:index.php");
}
?>