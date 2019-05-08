<?php
session_start();
?>
<!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="../public/img/teamdurham.png">
        </div>
        <ul class="list-unstyled components">
            <p>Durham University Sport</p>
<!--            <li class="active">-->
<!--                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>-->
<!--                <ul class="collapse list-unstyled" id="homeSubmenu">-->
<!--                    <li>-->
<!--                        <a href="#">Home</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="SearchFacility.php">Facility</a>
            </li>
            <!--    Check whether the user login            -->
            <?php
            if (!empty($_SESSION['User'])) {
                echo "<li class='active'>" ."<a href='#Personalinfo' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>"."Welcome  ". $_SESSION['User']['Firstname'] ."</a>". "</li>";
                echo "<ul class='collapse list-unstyled' id='Personalinfo'>";
                echo "<li class='cative'><a href='Personalinfopage.php'>Personal information</a></li>";
                echo "<li class='cative'><a href='logout.php'>Logout</a></li>";
                echo "</ul>";
            } else {
                echo "<li class='cative'>
                    <a href='LoginPage.php'>Login</a>
                </li>
                <li class='cative'>
                    <a href='SignUpPage.php'>Sign Up</a>
                </li>";
            }
            ?>
            <!--   Check the role of the user             -->
            <?php
            if(!empty($_SESSION['User'])&&$_SESSION['User']['Role']=="Admin"){
                echo "<li class='cative'><a href='../Web_Admin/index.php'>Admin Page</a></li>";
            }
            ?>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
