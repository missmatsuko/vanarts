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

    if (isset($_GET['category'])) {
        //if connection successful
        if ($connect) {
            $categoryID = mysqli_real_escape_string($connect, (int)$_GET['category']);

            //pagination
            $offset = 0;
            $lim = 12;
            //get number of posts
            $selectNumPosts = "SELECT * FROM weirdeats_post WHERE category_id = $categoryID AND post_date < NOW()";
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
            
            //get category name
            $selectCatName = "SELECT category_name FROM weirdeats_category WHERE category_id = $categoryID";
            $resultCatName = mysqli_query($connect, $selectCatName);
            $arrayCatName = mysqli_fetch_object($resultCatName);
            $catName = $arrayCatName->category_name;
            echo "<div class='row column text-center'><h1>Category: ".$catName."</h1></div>";
            
            
            //select posts, limit category
            $selectPosts = "SELECT * FROM weirdeats_post INNER JOIN weirdeats_category ON weirdeats_post.category_id=weirdeats_category.category_id WHERE weirdeats_post.category_id = $categoryID AND post_date < NOW() ORDER BY post_date DESC LIMIT $lim OFFSET $offset;";
            $resultPosts = mysqli_query($connect, $selectPosts);
            
            include("partials/_loop.php");
        }    //if connection fails
        else {
            echo "<div class='row column'><h2>Something went wrong with the database.</h2></div>";
        }

        mysqli_close($connect);
    } else {
        //list all categories
        if ($connect) {
            $selectCategories = "SELECT * FROM category ORDER BY category_name";
            $resultCategories = mysqli_query($connect, $selectCategories);
            echo "<div class='row'><ul class='list-unstyle category-list'>";
            while ($row = mysqli_fetch_assoc($resultCategories)) {
                $category = $row['category_name'];
                $categoryID = $row['category_id'];
                $color = $row['category_color'];

                echo "<li><h3><a href='category.php?category=" . $categoryID . "'  style='background-color: #" . $color . ";'>" . $category . "</a></h3></li>";
            }
            echo "</ul></div>";

            mysqli_close($connect);
        }
    }
    ?>

</div><!--content wrapper ends-->

<?php include("partials/_footer.php"); ?>
