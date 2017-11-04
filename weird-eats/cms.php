<?php
// Start the session
session_start();

//if log out is posted, or session username is not set, redirect to login page
if (isset($_GET['logout']) || !isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] === 0) {
    session_unset();
    session_destroy();
    header("location: login.php");
}

include("partials/_header.php");
include("partials/_nav.php");

include("partials/_db_login_details.php");

$connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
?>

<div class="content-wrapper">
    <div class='row column'>
        <h1>Add/Edit Blog Post</h1>
        <a href="newpost.php" class="float-right">Add New Post</a>
        <!--main content-->

        <?php
        //POSTS
        //include database login info
        include("partials/_db_login_details.php");

        //connect to database
        $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

        //delete function
        if (isset($_GET["action"]) && $_GET["action"] === "delete" && $connect) {
            //delete query
            $postid = $_GET["postid"];

            $selectTitle = "SELECT post_title FROM post WHERE post_id=" . $postid;
            $resultTitle = mysqli_query($connect, $selectTitle);
            $row = mysqli_fetch_assoc($resultTitle);
            $titleDeleted = $row['post_title'];

            $deletePost = "DELETE FROM post WHERE post_id=" . $postid;
            $resultDelete = mysqli_query($connect, $deletePost);
            $deleteTags = "DELETE FROM post_tag WHERE post_id=" . $postid;
            $resultDeleteTags = mysqli_query($connect, $deleteTags);

            echo $titleDeleted . " was deleted.";
        }

        //if connection successful
        if ($connect) {

            //pagination
            $offset = 0;
            $lim = 10;
            //get number of posts
            $selectNumPosts = "SELECT * FROM post";
            $resultNumPosts = mysqli_query($connect, $selectNumPosts);
            $numPosts = mysqli_num_rows($resultNumPosts);

            $numPages = ceil($numPosts / $lim);

            if (isset($_GET['page'])) {
                $page = (int) $_GET['page'];
            } else {
                $page = 1;
            }

            if (isset($page) && $page <= $numPages && $page > 0) {
                $offset = (mysqli_real_escape_string($connect, $page) - 1) * $lim;
            }

            //select upcoming events
            $selectPosts = "SELECT * FROM post ORDER BY post_id DESC LIMIT $lim OFFSET $offset;";
            $resultPosts = mysqli_query($connect, $selectPosts);

            echo "<table>";
            echo "<tr>";
            echo "<th>Post ID</th><!--table header column ends-->";
            echo "<th>Thumbnail</th><!--table header column ends-->";
            echo "<th>Title</th><!--table header column ends-->";
            echo "<th>Excerpt</th><!--table header column ends-->";
            echo "<th>Date</th><!--table header column ends-->";
            echo "<th>Actions</th><!--table header column ends-->";
            echo "</tr><!--table row ends-->";

            //loop through upcoming events
            while ($row = mysqli_fetch_assoc($resultPosts)) {
                $id = $row['post_id'];
                $title = $row['post_title'];
                $src = $row['post_image'];
                $text = strip_tags($row['post_content']);
                $date = $row['post_date'];

                $excerpt = substr($text, 0, 200);

                //list events
                echo "<tr>";
                echo "<td>" . $id . "</td><!--table column ends-->";
                echo "<td><img class='small-img' src='img/post/" . $src . "'></td><!--table column ends-->";
                echo "<td>" . $title . "</td><!--table column ends-->";
                echo "<td>" . $excerpt . "</td><!--table column ends-->";
                echo "<td>" . $date . "</td><!--table column ends-->";
                echo "<td class='cms-actions'><a href='newpost.php?postid=" . $id . "&action=edit'><i class='fa fa-pencil'></i></a> <a onclick='return confirmDelete(\"" . $title . "\")' href='?postid=" . $id . "&action=delete'><i class='fa fa-trash'></i></a></td><!--table column ends-->";
                echo "</tr><!--table row ends-->";
            }

            echo "</table><!--table ends-->";
        }
        //if connection fails
        else {
            echo "<h2>Something went wrong with the database.</h2>";
        }
        mysqli_close($connect);

        //pagination
        if ($numPages > 1) {
            echo "<div class='row'><div class='column pagination-links text-center'>";
            echo "<a href='?page=1'><< </a>/";

            for ($i = 1; $i < $numPages + 1; $i++) {
                echo "<a ";
                if ($i === $page) {
                    echo "class='current' ";
                }
                echo "href='?page=" . $i;
                echo "'> $i </a> ";
                if ($i < $numPages) {
                    echo " /";
                }
                echo "</a>";
            }

            echo "/<a href='?page=" . $numPages . "'> >></a>";
            echo "</div></div>";
        }
        ?>
    </div><!--row column ends-->
</div><!--content wrapper ends-->
<script>
    function confirmDelete(title) {
        if (!confirm("Are you sure you want to delete \"" + title + "\"?")) {
            return false;
        }
        ;
    }
</script>
<?php include("partials/_footer.php"); ?>
