<?php 
$active="home";
include("_header.php"); 
include "_nav.php";?>

<div class="page-wrapper home-featured row">

    <!--upcoming events here-->
    <?php
    //include database login info
    include("../_db.php");

    //connect to database
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    //if connection successful
    if ($connect) {
        //select first upcoming event
        $selectNextUpcoming = "SELECT * FROM danceroom_events WHERE datetime >= NOW() ORDER BY datetime ASC LIMIT 1;";
        $resultNextUpcoming = mysqli_query($connect, $selectNextUpcoming);

        while ($row = mysqli_fetch_assoc($resultNextUpcoming)) {
            $id = $row['id'];
            $title = $row['title'];
            $datetime = $row['datetime'];
            $datetime = new DateTime($datetime);
            $date = date_format($datetime, "l M jS, Y");
            $time = date_format($datetime, "g:m A");

            //list events
            echo "<div class='hero small-12 columns'>";
            echo "<h1>" . $title . "</h1>";
            echo "<h4>" . $date . " @ " . $time . "</h4>";
            echo "<a class='btn' href='events.php?postid=" . $id . "&action=view'>View Details</a>";
            echo "</div>";
        }

        //select upcoming events
        $selectUpcomingLim = "SELECT * FROM danceroom_events WHERE datetime >= NOW() ORDER BY datetime ASC LIMIT 1,4;";
        $resultUpcomingLim = mysqli_query($connect, $selectUpcomingLim);

        echo "<div class='small-12 medium-6 columns'><h4>Upcoming Events</h4><ul>";

        //loop through upcoming events
        while ($row = mysqli_fetch_assoc($resultUpcomingLim)) {
            $id = $row['id'];
            $title = $row['title'];
            $datetime = $row['datetime'];
            $datetime = new DateTime($datetime);
            $date = date_format($datetime, "m/d/Y");
            $time = date_format($datetime, "g:m A");

            //list events
            echo "<li>" . $date . " @ " . $time . " - <a href='events.php?postid=" . $id . "&action=view'>" . $title . "</a></li>";
        }

        echo "</ul><!--events list ends-->";
        mysqli_close($connect);
    }
    //if connection fails
    else {
        echo "<h2>Something went wrong with the database.</h2>";
    }
    ?>
</div><!--events col ends-->
<div class="small-12 medium-6 columns">
    <div class='btn btn-big'>
        <a href="events.php">See All Events</a>
    </div>
</div>
</div><!--featured ends-->

<?php include("_footer.php"); ?>
