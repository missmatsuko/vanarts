<?php
        //If POST if not empty, process form
        if (!empty($_POST)) {
            //Log-in details
            include("../_db.php");

            //connect to database
            $conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

            // Check to see if the connection has worked successfully
            // If it hasn't then print "Connection Failed:" and 
            // Display the MySQLi connection error
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            //if the connection is successful, insert post data into database
            else {
                //variables to make real escape easier
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $message = mysqli_real_escape_string($conn, $_POST['message']);
                //insert data into database
                $insert = "INSERT INTO wingsofvancouver_testimonials (name, email, message) VALUES ('$name','$email','$message')";
                $resultInsert = mysqli_query($conn, $insert);
            }
            // Close Connection
            mysqli_close($conn);

            // This automatically brings you back to testimonials page
            header('location:testimonials.php');
        }
	// POST has not been successful. Therefore we 
        else {
	        include '_header.php';
	        echo "<div class='row'><div class='page-wrapper'>";
	        echo "Unfortunately the form did not send correctly :( <br>Please <a href='testimonials.php'>click here</a> to return to the form.";
	        echo "</div><!--page wrapper ends--></div><!--row ends-->";
	        include '_footer.php';
        }