<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/bootstrap.css" rel="stylesheet"/>
    <link href="../public/css/style.css" rel="stylesheet"/>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <link rel="stylesheet" href="https://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="../public/js/bootstrap.js"></script>
    <script src="../public/js/script.js"></script>
    <title>Durham University Sport</title>
</head>
<body>
<div class="headerPage">
    <?php
    include 'Admin_header.php';
    ?>
</div>
<div class="Mycontainer" style="background: lightblue; margin-top: 100px" >
    <h1 class="MyAdminH1">Admin Page</h1>
</div>
<div class="Mycontainer" style="background: black">
    <p>Welcome black <?php echo $_SESSION['User']['userName'] ?></p>
</div>
<div id="MatchDiv" class="Mycontainer" style="background: black">
    <table id='MatchList'>
        <thead>
        <tr>
            <th scope="col">MatchID</th>
            <th scope="col">Match Date</th>
            <th scope="col">Game ID</th>
            <th scope="col">Winner ID</th>
            <th scope="col">Modify</th>
        </tr>
        </thead>
        <tbody>
        <!--  Get the Match List      -->
        <?php
        try {
        $rows = getMatchList();
        $data_count = count($rows);
        for ($i = 0;$i < $data_count;$i++) {

        $MatchID = $rows[$i]['MatchID'];
        $MatchDate = $rows[$i]['MatchDate'];
        $GameID = $rows[$i]['GameID'];
        $WinnerID = $rows[$i]['WinnerID'];
        ?>
        <tr>
            <td data-label='MatchID'><?php echo $MatchID?></td>
            <td data-label='Match Date'><?php echo $MatchDate ?></td>
            <td data-label="Game ID"><?php echo $GameID ?></td>
            <td data-label="Winner ID"><?php echo $WinnerID ?></td>
            <td data-label='Modify'>
                <?php echo "<a href='EditMatchRecord.php?MatchID=$MatchID'><input type='button' class='btn btn-default' value='Add/Remove People'></a>" ?>
            </td>
            <?php
            echo "</tr>";
            }
            } catch (PDOException $e) {
                die ("Error!: " . $e->getMessage() . "<br/>");
            }
            ?>

        </tbody>
    </table>
</div>
</body>
<div class="footerpage">

</div>
<script>
    $(function () {
        $(".footerpage").load("footer.html");
    });
</script>
</html>

