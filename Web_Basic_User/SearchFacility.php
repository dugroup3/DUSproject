
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>test</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link href="../public/css/style.css" rel="stylesheet">
    <!--JS-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</head>
<body>
<!-- Page Content  -->
<div class="wrapper">
    <?php
    require_once "header.php";
    ?>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Navigation Bar</span>
                </button>
                <div class="card-tools">

                    <div class="input-group input-group-sm">

                        <input type="text" class="form-control" id="searchInput" placeholder="Facility name">
                        <span class="input-group-append"><button type="button" id="get"
                                                                 class="btn btn-primary">Search</button>
                            <button type="button" id="getAll" class="btn btn-info">Search all Facilities</button>
                    </div>
                </div>

            </div>
        </nav>

        <div class="card-body">
            <table width="960" border="1">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col"> Facility name</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Time</th>
                        <th scope="col">Price</th>
                        <th>Operation</th>
                    </tr>
                    </thead>
                    <tbody id='body'>
                    </tbody>
                </table>
        </div>
        <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="detailModalLabel">Detail</h4>
                    </div>
                    <div class="modal-body">
                        <table>
                        <tbody id='facilityTable'>
                        </tbody>

                        </table>

                        <div>
                            <p><input type="button" class="btn btn-danger" data-dismiss="modal" value="Go back">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
<div class="footerpage"></div>
<script>
    $(function () {
        $(".footerpage").load("footer.html");
    });
</script>
<script>
    var web = {
        init: function () {
            this.getAll();
            this.eleBind();
        },
        data: {},
        eleBind: function () {
            // Search all members
            $('#getAll').click(function () {
                web.getAll();
            })
            // Search single member
            $('#get').click(function () {
                var name = $("#searchInput").val();
                var data = {
                    name: name
                }
                web.getData(data);
            })
            $('.card-body').click(function(e) {
                var FacilityID = e.target.attributes.data.nodeValue;
                var data = {
                    FacilityID: FacilityID
                }
                $('#facilityTable').html(`Loading`);
                web.detailData(data);
            })
        },
        getAll: function () {
            $.ajax({
                url: "facility.php",
                type: "post",
                data: {
                    type: 'get'
                },
                datatype: "json",
                success: function (data) {
                    web.setData(data);
                }
            })
        },
        getData: function (data) {
            $.ajax({
                url: "facility.php",
                type: "post",
                data: {
                    name: data.name,
                    type: 'get'
                },
                datatype: "json",
                success: function (data) {
                    web.setData(data);
                }
            })
        },
        detailData: function(data) {
            $.ajax({
                url: "facility.php",
                type: "post",
                data: {
                    FacilityID: data.FacilityID,
                    type: 'detail'
                },
                datatype: "json",
                success: function(data) {
                    web.data.detailID = data[0].FacilityID;
                    web.showData(data[0]);
                }
            })
        },
        //Get data and put them into table
        setData: function (data) {
            var html = "";
            data.forEach(function (data, index, array) {
                html += `
                        <tr>
                            <td data-label='Facility Name'> ${data.Name}</td>
                            <td data-label='Picture'><img src= "${data.Picture}" height="100vw" width="100vw" alt=""></td>
                            <td data-label='Working time'>${data.Opentime}&nbsp To &nbsp${data.Closetime}</td>
                            <td data-label='Prices'>${data.Prices}</td>
                            <td type="edit">
                                <button id="bookingModle" type="button" btntype="Booking" data="${data.FacilityID}" class="btn btn-success" data-toggle="modal" data-target="#bookingModal">More</button>
                                <a href="bookingcalendar.php?param=${data.FacilityID}"><button id="bookingModle" type="button" btntype="Booking" class="btn btn-primary" >Booking</button>
                            </td>
                        </tr>`
            })
            $('#body').html(html);
        },
        showData: function(data) {
            var html = "";
            html += `
                        <tr><td data-label='Facility Name'> ${data.Name}</td></tr>
                        <tr><td data-label='Picture'><img src= "${data.Picture}" height="150vw" width="150vw" alt=""></td></tr>
                         <tr><td data-label='Description'>${data.Description}</td></tr>
                         <tr><td data-label='Prices'>${data.Prices}</td>
                        </tr>`
            $('#facilityTable').html(html);
        },
    }

    $(document).ready(function () {
        web.init()
    })

</script>
</html>