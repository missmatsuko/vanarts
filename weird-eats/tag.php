<?php
$active = "category";
include("partials/_header.php");
include("partials/_nav.php");
?>

<!--Category Page Content Here-->
<div class="content-wrapper">
    <?php
    //if category is set, list all posts from that category
    //Main Loop: all categories
    //include database login info
    include("../_db.php");

    //connect to database
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    if (isset($_GET['tag_name'])) {
        //if connection successful
        if ($connect) {
            $tagName = mysqli_real_escape_string($connect, $_GET['tag_name']);

            //pagination
            $offset = 0;
            $lim = 12;
            //get number of posts
            $selectNumPosts = "SELECT * FROM weirdeats_post INNER JOIN weirdeats_post_tag on weirdeats_post.post_id = weirdeats_post_tag.post_id INNER JOIN weirdeats_tag on weirdeats_post_tag.tag_id = weirdeats_tag.tag_id WHERE weirdeats_tag.tag_name = '$tagName' AND post_date < NOW()";
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

            //get tag name
            //ensure we use correct case
            $titleTag = strtolower($tagName);
            echo "<div class='row column text-center'><h1>Tag: " . $titleTag . "</h1></div>";


            //select posts, limit category
            $selectPosts = "SELECT * FROM weirdeats_post INNER JOIN weirdeats_category on weirdeats_post.category_id = weirdeats_category.category_id INNER JOIN weirdeats_post_tag on weirdeats_post.post_id = weirdeats_post_tag.post_id INNER JOIN weirdeats_tag on weirdeats_post_tag.tag_id = weirdeats_tag.tag_id WHERE weirdeats_tag.tag_name = '$tagName' AND post_date < NOW() ORDER BY post_date DESC";
            $resultPosts = mysqli_query($connect, $selectPosts);

            include("partials/_loop.php");
        }    //if connection fails
        else {
            echo "<div class='row column'><h2>Something went wrong with the database.</h2></div>";
        }

        mysqli_close($connect);
    } else {
        echo "<div class='row column'><h2>No posts with that tag.</h2></div>";
        mysqli_close($connect);
    }
    ?>

</div><!--content wrapper ends-->

<?php include("partials/_footer.php"); ?>