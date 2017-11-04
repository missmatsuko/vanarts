<?php 
$active="events";
include("_header.php"); 
include "_nav.php";?>

<div class="row page-wrapper">
    <div class="page-main small-12 medium-9 columns">
        <h1>Upcoming Events</h1>

        <!--upcoming events here-->
        <?php
        //include database login info
        include("../_db.php");

        //connect to database
        $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

        if ($connect && isset($_GET['action']) && $_GET['action'] === 'view') {
            $postid = $_GET["postid"];
            $selectView = "SELECT * FROM danceroom_events WHERE id =" . $postid;

            $resultView = mysqli_query($connect, $selectView);
            $row = mysqli_fetch_assoc($resultView);

            $id = $row['id'];
            $title = $row['title'];
            $src = $row['src'];
            $text = $row['text'];
            $datetime = $row['datetime'];
            $datetime = new DateTime($datetime);
            $date = date_format($datetime, "l M jS, Y");
            $time = date_format($datetime, "g:m A");

            echo "<div class='event-details row'>";
            echo "<div class='small-12 medium-4 columns'>";
            echo "<img src='img/events/" . $src . "' alt='poster for " . $title . " at Dance Room Nightclub'>";
            echo "</div><!--view col 2 ends-->";
            echo "<div class='small-12 medium-8 columns'>";
            echo "<h3>" . $title . "</h3>";
            echo "<h4>" . $date . " @ " . $time . "</h4><br>";
            echo $text . "<br>";
            echo "<a class='btn'>Buy Tix!</a>";
            echo "</div><!--view col 2 ends-->";
            echo "</div><!--view row ends-->";
        }

        //if connection successful
        if ($connect) {
            //select upcoming events
            $selectUpcoming = "SELECT * FROM danceroom_events WHERE datetime >= NOW() ORDER BY datetime ASC;";
            $resultUpcoming = mysqli_query($connect, $selectUpcoming);

            //loop through upcoming events
            while ($row = mysqli_fetch_assoc($resultUpcoming)) {
                $id = $row['id'];
                $title = $row['title'];
                $src = $row['src'];
                $text = $row['text'];
                $datetime = $row['datetime'];

                //list events
                echo "<div class='small-12 medium-4 large-3 columns end'>";
                echo "<div class='event-wrapper'>";
                echo "<img src='img/events/" . $src . "' alt='poster for " . $title . " at Dance Room Nightclub'>";
                echo "<div class='hover-div'><a class='btn view-details-btn' href='?postid=" . $id . "&action=view'>View Details</a></div><!--hover div ends-->";
                echo "</div><!--event poster ends-->";
                echo "</div><!--event wrapper ends-->";
            }
        }
        //if connection fails
        else {
            echo "<h2>Something went wrong with the database.</h2>";
        }
        ?>
    </div><!--upcoming events column ends-->
    <div class="page-sidebar hide-for-small-only medium-3 columns">
        <h4>Past Events</h4>
        <!--past events here-->
        <?php
//if connection successful
        if ($connect) {
            //select past events
            $selectPast = "SELECT title,datetime FROM danceroom_events WHERE datetime < NOW() ORDER BY datetime DESC;";
            $resultPast = mysqli_query($connect, $selectPast);

            echo "<ul class='past-events-list'>";

            //loop through past events
            while ($row = mysqli_fetch_assoc($resultPast)) {
                $title = $row['title'];
                $datetime = $row['datetime'];
                $date = new DateTime($datetime);
                $date = date_format($date, "m/d/Y");

                //list events
                echo "<li>" . $date . " - " . $title . "</li>";
            }

            echo "</ul><!--past events list ends-->";
        }
        
        mysqli_close($connect);
        ?>
    </div><!--sidebar column ends-->
</div><!--pagewrapper row ends-->

<?php include("_footer.php"); ?>
