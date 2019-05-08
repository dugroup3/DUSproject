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
                <button type="button" id="getAll" class="btn btn-success">Search all members</button>
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
                    <tr>
                        <th scope="row"> Facility name</th>
                        <th>Picture</th>
                        <th>Time</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
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
                            <td scope="row"> ${data.Name}</td>
                            <td><img src= "${data.Picture}" height="100vw" width="100vw" alt=""></td>
                            <td>${data.Opentime}&nbsp To &nbsp${data.Closetime}</td>
                            <td>${data.Description}</td>
                            <td>${data.Prices}</td>
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