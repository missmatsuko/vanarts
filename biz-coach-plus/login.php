<?php
//LOG IN AND SIGN UP PROCEDURE
//if submit button is pressed on log in page
if (isset($_POST['submit'])) {
    $validated = '';

    //create new account
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['country']) && !empty($_POST['age']) && !empty($_POST['username']) && !empty($_POST['password'])) {

        //validate all POST contents----------------------------------------
        //email is string, @, ., string <100 char
        //if email is valid, email length, email is string
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false || strlen($_POST['email']) > 100 || gettype($_POST['email']) != 'string') {
            $validated = false;
        };

        //age is integer
        if (!is_numeric($_POST['age'])) {
            $validated = false;
        }

        //country is string containing letters, spaces, hyphen, apostrophe
        //name is string containing letters, spaces, hyphen, apostrophe
        if (!preg_match("/^[A-Za-z'\s-]+$/", $_POST['name'])) {
            $validated = false;
        };

        if (!preg_match("/^[A-Za-z'\s-]+$/", $_POST['country'])) {
            $validated = false;
        };

        //username is string <100 char
        if (strlen($_POST['username']) > 100 || gettype($_POST['username']) != 'string') {
            $validated = false;
        };

        //password is string
        if (gettype($_POST['password']) != 'string') {
            $validated = false;
        };

        //------------------------------------------------------------------
        //if validation is passed, continue to create account
        if ($validated==='') {
            

            //include login details
            include ("../_db.php");
            //connect to database
            $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

            //check if connection worked
            if ($conn) {
                //variables for sign up query
                $name = mysqli_escape_string($conn, $_POST['name']);
                $email = mysqli_escape_string($conn, $_POST['email']);
                $country = mysqli_escape_string($conn, $_POST['country']);
                $age = (int) $_POST['age'];
                $username = mysqli_escape_string($conn, $_POST['username']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                //check if username already exists
                $checkUserNameQuery = $logInQuery = "SELECT * FROM bizcoachplus_users WHERE username='$username'";
                $checkUserNameResult = mysqli_query($conn, $checkUserNameQuery);
                $checkUserNameResultRows = mysqli_num_rows($checkUserNameResult);
                if ($checkUserNameResultRows > 0) {
                    include "_header.php";
                    echo'
                <div class = "row column">
                    <div class = "callout warning">
                        <h3>Error Creating Account</h3>
                        <p>Username already exists. Please try again.</p>
                    </div>
                </div><!--row ends-->
            ';
                    include "_login_form.php";
        	    include "_footer.php";
                } else {
                    //sign up query and result
                    $signUpQuery = "INSERT INTO bizcoachplus_users (name,email,country,age,username,password)VALUES ('$name','$email','$country','$age','$username','$password')";
                    $signUpResult = mysqli_query($conn, $signUpQuery);

		    include "_header.php";
                    echo'
                <div class = "row column">
                    <div class = "callout success">
                        <h3>Sign Up Was Successful</h3>
                        <p>Please log in to access the Members\' Area.</p>
                    </div>
                </div><!--row ends-->
            ';
                    include "_login_form.php";
        	    include "_footer.php";
                }
            }
            //if connection failed, echo error message
            else {
            	include "_header.php";
                echo'
                <div class = "row column">
                    <div class = "callout warning">
                        <h3>Error Connecting to Database</h3>
                        <p>Please try again.</p>
                    </div>
                </div><!--row ends-->
            ';
                include "_login_form.php";
        	include "_footer.php";
            }

            //close connection
            mysqli_close($conn);
        }

        //if vailidation failed
        else {
            include "_header.php";
            echo'
                <div class = "row column">
                    <div class = "callout warning">
                        <h3>Error Creating Account</h3>
                        <p>Some fields may have been incorrect. Please try again.</p>
                    </div>
                </div><!--row ends-->
            ';
            include "_login_form.php";
            include "_footer.php";
        }
    }

    //attempt login
    else if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['country']) && empty($_POST['age']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        //validate username and password
        $validated = '';
        //username is string <100 char
        if (strlen($_POST['username']) > 100 || gettype($_POST['username']) != 'string') {
            $validated = false;
        };

        //password is string
        if (gettype($_POST['password']) != 'string') {
            $validated = false;
        };

        if ($validated==='') {
            //include login details
            include("../_db.php");
            //connect to database
            $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

            //check if connection worked
            if ($conn) {
                //variables for log in query
                $username = mysqli_escape_string($conn, $_POST['username']);
                $password = $_POST['password'];

                //log in query and result
                $logInQuery = "SELECT * FROM bizcoachplus_users WHERE username='$username'";
                $logInResult = mysqli_query($conn, $logInQuery);
                $logInResultRows = mysqli_num_rows($logInResult);

                //check password
                if ($logInResultRows == 1) {
                    while ($row = mysqli_fetch_assoc($logInResult)) {
                        $saved_password = $row['password'];
                        $match = password_verify($password, $saved_password);

                        //if password matches saved password
                       if ($match == 1) {
                            session_start();
                            $_SESSION['username'] = $_POST['username'];
                            header("Location: membersarea.php");
                        }
                        //if password does not match saved password
                        else {
                            include "_header.php";
                            echo'
                            <div class = "row column">
                                <div class = "callout warning">
                                    <h3>Error Logging In</h3>
                                    <p>Some fields may have been incorrect. Please try again.</p>
                                </div>
                            </div><!--row ends-->
                        ';
                            include "_login_form.php";
                            include "_footer.php";
                        }
                    }
                }
                //if no username match
                else {
                    include "_header.php";
                    echo'
                    <div class = "row column">
                        <div class = "callout warning">
                            <h3>Log In Failed: No Such User</h3>
                            <p>Username may have been incorrect. Please try again.</p>
                        </div>
                    </div><!--row ends-->
                ';
                    include "_login_form.php";
                    include "_footer.php";
                }
            }
            //if connection failed, echo error message
            else {
                include "_header.php";
                echo'
                <div class = "row column">
                    <div class = "callout warning">
                        <h3>Error Connecting to Database</h3>
                        <p>Please try again.</p>
                    </div>
                </div><!--row ends-->
            ';
                include "_login_form.php";
                include "_footer.php";
            }
            //close connection
            mysqli_close($conn);
        }
    }

    //if neither login or sign up successful
    else {
        include "_header.php";
        echo'
            <div class = "row column">
                <div class = "callout warning">
                    <h3>Error Logging In/Signing Up</h3>
                    <p>Some fields may have been missing. Please try again.</p>
                </div>
            </div><!--row ends-->
        ';
        include "_login_form.php";
        include "_footer.php";
    }
}
else {
    include "_header.php";
    include "_login_form.php";
    include "_footer.php";
}
?><!--log in and sign up procedure ends-->