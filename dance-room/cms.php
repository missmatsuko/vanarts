<?php
// Start the session
session_start();
//LOG IN AND SIGN UP PROCEDURE
//if submit button is pressed on log in page
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
        //include database login info
        include("_db_login_details.php");

        //connect to database
        $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

        //if connection successful
        if ($connect) {
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);

            $selectLogin = "SELECT * FROM accounts WHERE password='$password' AND username='$username'";

            $resultLogin = mysqli_query($connect, $selectLogin);

            $rows = mysqli_num_rows($resultLogin);

            if ($rows == 1) {
                $_SESSION['username'] = $username;
                header("location: cms_backend.php");
            } else {
                echo "<p>Username or password is invalid.</p>";
            }
            
            mysqli_close($connect);
        }
        //if connection fails
        else {
            echo "<p>Something went wrong with the database.</p>";
        }
    }
} else {
    include "_header.php";
    include "_nav_cms.php";
    echo '<div class="row page-wrapper">
    <div class="page-main small-centered small-12 medium-8 large-4 columns">';
    include "_login_form.php";
    include "_footer.php";
}
?><!--log in and sign up procedure ends-->