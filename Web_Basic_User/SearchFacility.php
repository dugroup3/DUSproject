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
                <button type="button" id="getAll" class="btn btn-success">Search all Facilities</button>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="searchInput" placeholder="Facility name">
                            <span class="input-group-append"><button type="button" id="get" class="btn btn-primary">Search</button>
                        </div>
                    </div>

            </div>
        </nav>

        <div class="card-body">
            <table width="960"  border="1">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col"> Facility name</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Time</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody id='tbody'>
                    </tbody>
                </table>
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
        //Get data and put them into table
        setData: function (data) {
            var html = "";
            data.forEach(function (data, index, array) {
                html += `
                        <tr>
                            <td data-label='Facility Name'> ${data.Name}</td>
                            <td data-label='Picture'><img src= "${data.Picture}" height="150" width="150" alt=""></td>
                            <td data-label='Working time'>${data.Opentime}&nbsp To &nbsp${data.Closetime}</td>
                            <td data-label='Description'>${data.Description}</td>
                            <td data-label='Prices'>${data.Prices}</td>
                        </tr>`
            })
            $('#tbody').html(html);
        }
    }

    $(document).ready(function () {
        web.init()
    })

</script>
</html>