<?php

session_start();

if (isset($_SESSION['username'])) {
    include "_header.php";
    include "_resources.php";
    include "_footer.php";
}

else {
    header("Location: login.php");
}