<?php
session_start();

$loginFormMessage = '';

if (isset($_GET['signup'])) {
    $signUp = true;
}

if (isset($_GET['logout'])) {
    session_destroy();
    $loginFormMessage = "You have been logged out.";
}

//LOG IN AND SIGN UP PROCEDURE
//if submit button is pressed on log in page
if (isset($_POST['submit'])) {

    //login procedure
    if ($_POST['submit'] === 'log in') {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            //include database login info
            include("../_db.php");

            //connect to database
            $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

            //if connection successful
            if ($connect) {
                $email = mysqli_real_escape_string($connect, $_POST['email']);
                $password = mysqli_real_escape_string($connect, $_POST['password']);

                $selectLogin = "SELECT * FROM weirdeats_user WHERE password='$password' AND email='$email'";
                $resultLogin = mysqli_query($connect, $selectLogin);
                $rows = mysqli_num_rows($resultLogin);

                if ($rows == 1) {
                    $arrayUser = mysqli_fetch_object($resultLogin);

                    $userId = $arrayUser->user_id;
                    $realName = $arrayUser->real_name;
                    $displayName = $arrayUser->display_name;
                    $displayImage = $arrayUser->display_image;
                    $isAdmin = $arrayUser->is_admin;

                    $_SESSION['userID'] = $userId;
                    $_SESSION['realName'] = $realName;
                    $_SESSION['displayName'] = $displayName;
                    $_SESSION['displayImage'] = $displayImage;
                    $_SESSION['isAdmin'] = $isAdmin;

                    if ($isAdmin) {
                        header("location: cms.php");
                    } else {
                        header("location: index.php");
                    }
                } else {
                        include "partials/_header.php";
	                include "partials/_nav.php";
	                $loginFormMessage = "Something went wrong. Try again!";
	                include "partials/_login_form.php";
	                include "partials/_footer.php";
                }

                mysqli_close($connect);
            }
            //if connection fails
            else {
                echo "<p>Something went wrong with the database.</p>";
            }
        }
    }

    //sign up procedure
    else if ($_POST['submit'] === 'sign up') {
        //check all fields complete
        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm']) && !empty($_POST['realName']) && !empty($_POST['displayName'])) {

            //check passwords match
            if ($_POST['password'] == $_POST['passwordConfirm']) {
                //include database login info
                include("../_db.php");

                //connect to database
                $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

                //if connection successful
                if ($connect) {
                    $realName = mysqli_real_escape_string($connect, $_POST['realName']);
                    $displayName = mysqli_real_escape_string($connect, $_POST['displayName']);
                    $email = mysqli_real_escape_string($connect, $_POST['email']);
                    $password = mysqli_real_escape_string($connect, $_POST['password']);
                }

                $insertUser = "INSERT INTO weirdeats_user (`real_name`,`display_name`,`email`,`password`) VALUES ('$realName','$displayName','$email','$password')";
                $resultUser = mysqli_query($connect, $insertUser);

                mysqli_close($connect);

                include "partials/_header.php";
                include "partials/_nav.php";
                $loginFormMessage = "Sign up successful. Please log in.";
                include "partials/_login_form.php";
                include "partials/_footer.php";
            }
        }
    } else {
        include "partials/_header.php";
        include "partials/_nav.php";
        $loginFormMessage = "Username or password is invalid.";
        include "partials/_login_form.php";
        include "partials/_footer.php";
    }
} else {
    include "partials/_header.php";
    include "partials/_nav.php";
    include "partials/_login_form.php";
    include "partials/_footer.php";
}
?><!--log in and sign up procedure ends-->