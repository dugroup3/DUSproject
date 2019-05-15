<?php
require_once '../DataBase/database.php';
session_start();
checkAdmin();
?>
<nav class="navbar navbar-default  navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../Web_Basic_User/index.php" class="nav-a navbar-brand nav-title">Durham University Sport</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="cative">
                    <a class="nav-a" href="index.php">Admin Home Page</a>
                </li>
                <li class="cative">
                    <a class="nav-a" href="FacilityManagement.php">Facility Management</a>
                </li>
                <li class="cative">
                    <a class="nav-a" href="BookingManagement.php">Booking Management</a>
                </li>
                <li class="cative">
                    <a class="nav-a" href="BlockBooking.php">Block Booking</a>
                </li>
                <li class="cative">
                    <a class="nav-a" href="../Web_Basic_User/logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>