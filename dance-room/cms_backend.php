<?php
// Start the session
session_start();

//if log out is posted, or session username is not set, redirect to login page
if (isset($_GET['logout']) OR ! isset($_SESSION['username'])) {
    session_unset();
    session_destroy();
    header("location: cms.php");
}
?>

<?php
include "_header.php";
include "_nav_cms.php";
;
?>

<div class="row page-wrapper">

    <div class="page-main small-12 columns">
        <h1 class="left">CMS: Events</h1>
        <a href="cms_newpost.php" class="right">Add New Event</a>
        <!--main content-->

        <?php
        //EVENTS
        //include database login info
        include("_db_login_details.php");

        //connect to database
        $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

        //delete function
        if (isset($_GET["action"]) && $_GET["action"] === "delete" && $connect) {
            //delete query
            $postid = $_GET["postid"];

            $selectTitle = "SELECT title FROM events WHERE id=" . $postid;
            $resultTitle = mysqli_query($connect, $selectTitle);
            $row = mysqli_fetch_assoc($resultTitle);
            $titleDeleted = $row['title'];

            $deleteEvents = "DELETE FROM events WHERE id=" . $postid;
            $resultDelete = mysqli_query($connect, $deleteEvents);

            echo $titleDeleted . " was deleted.";
        }

        //if connection successful
        if ($connect) {
            //select upcoming events
            $selectEvents = "SELECT * FROM events ORDER BY id DESC;";
            $resultEvents = mysqli_query($connect, $selectEvents);

            echo "<table>";
            echo "<tr>";
            echo "<th>Event ID</th><!--table header column ends-->";
            echo "<th>Thumbnail</th><!--table header column ends-->";
            echo "<th>Title</th><!--table header column ends-->";
            echo "<th>Excerpt</th><!--table header column ends-->";
            echo "<th>Datetime</th><!--table header column ends-->";
            echo "<th>Edit</th><!--table header column ends-->";
            echo "</tr><!--table row ends-->";

            //loop through upcoming events
            while ($row = mysqli_fetch_assoc($resultEvents)) {
                $id = $row['id'];
                $title = $row['title'];
                $src = $row['src'];
                $text = $row['text'];
                $datetime = $row['datetime'];

                $excerpt = substr($text, 0, 200);

                //list events
                echo "<tr>";
                echo "<td>" . $id . "</td><!--table column ends-->";
                echo "<td><img class='thumbnail' src='img/events/" . $src . "'></td><!--table column ends-->";
                echo "<td>" . $title . "</td><!--table column ends-->";
                echo "<td>" . $excerpt . "</td><!--table column ends-->";
                echo "<td>" . $datetime . "</td><!--table column ends-->";
                echo "<td class='cms-actions'><a href='cms_newpost.php?postid=" . $id . "&action=edit'><i class='fa fa-pencil'></i></a><a onclick='return confirmDelete(\"" . $title . "\")' href='?postid=" . $id . "&action=delete'><i class='fa fa-trash'></i></a></td><!--table column ends-->";
                echo "</tr><!--table row ends-->";
            }

            echo "</table><!--table ends-->";
        }
        //if connection fails
        else {
            echo "<h2>Something went wrong with the database.</h2>";
        }
        mysqli_close($connect);
        ?>
    </div><!--upcoming events column ends-->

</div><!--pagewrapper row ends-->
<script src="js/confirmDelete.js" type="text/javascript"></script><!--confirm delete js-->
<?php include("_footer.php"); ?>
