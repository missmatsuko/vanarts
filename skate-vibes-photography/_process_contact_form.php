<?php

include '_header.php';

//If form is not empty, process the form
//State log-in variables
if (!empty($_POST)) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "skate_vibes";

    // Conntact to database using above log-in details
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check to see if the connection has worked.
    //If it doesn't work, print error message
    if (!$conn) {
            echo'
    <div class="page-form-result">
        <div class="row">
            <div class="small-10 small-centered columns">
                <h1>Oopsy Daisy!</h1>
                <h2>Unfortunately the form did not send correctly :(</h2>
                <p><a href="index.php#contact">Click here</a> to return to the form.</p>
                <i class="fa fa-frown-o"></i>
            </div>
        </div>
    </div>';  
    }

    //If it does, then insert into form database
    else {
        $insert = "INSERT INTO contact_form (name,email,phone,message) VALUES ('" . mysqli_real_escape_string($conn, $_POST['name']) . "','" . mysqli_real_escape_string($conn, $_POST['email']) . "','" . mysqli_real_escape_string($conn, $_POST['phone']) . "','" . mysqli_real_escape_string($conn, $_POST['message']) . "')";
        $resultInsert = mysqli_query($conn, $insert);
    }

    // Close Connection
    mysqli_close($conn);

    // If everything worked correctly, go to confirmation page
    header('location:confirmation.php');
}

//If the form is empty, produce an error message
else {
    echo'
    <div class="page-form-result">
        <div class="row">
            <div class="small-10 small-centered columns">
                <h1>Oopsy Daisy!</h1>
                <h2>Unfortunately the form did not send correctly :(</h2>
                <p><a href="index.php#contact">Click here</a> to return to the form.</p>
                <i class="fa fa-frown-o"></i>
            </div>
        </div>
    </div>';    
}

include '_footer.php';