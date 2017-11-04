<?php
$active = "home";
include("partials/_header.php");
include("partials/_nav.php");

    //Main Loop: all categories
    //include database login info
    include("../_db.php");

    //connect to database
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
?>


<!--Index Page Content Here-->
<div class="content-wrapper">

    <!--top posts-->
    <?php if(!isset($_GET['page'])||$_GET['page']==1){ ?>
    <div class="row show-for-large top-posts-wrapper">
        <div class="large-9 columns top-posts-image">
        <div class="top-posts-image-background">
            <img id="top-post-img" class='post-img' src="" alt="Post Photo">
            </div>
        </div>
        <div class="large-3 columns top-posts-details-wrapper">
            <div class="top-posts-details">
                <h2>Top Posts</h2>
                <ul class='top-posts-list list-unstyle'>
                <?php
                
                if ($connect) {
                        //select posts
		        $selectTopPosts = "SELECT * FROM weirdeats_post ORDER BY RAND() LIMIT 3";
		        $resultTopPosts = mysqli_query($connect, $selectTopPosts);
		        while ($row = mysqli_fetch_assoc($resultTopPosts)) {
		        	$id = $row['post_id'];
		        	$imageSrc = $row['post_image'];
		        	$title = $row['post_title'];
		        	$content = strip_tags($row['post_content']);
        			$excerpt = substr($content, 0, 50);
        			
        			echo "<li>";
        			echo "<a href='post.php?post_id=".$id."'><h3>".$title."</h3></a>";
        			echo "<ul data-image='".$imageSrc."' class='top-post-excerpt'>".$excerpt."... <a href='post.php?post_id=".$id."'>read more</a></ul>";
        			echo "</li>";
		        }
                }
                
                ?>
                </ul>
            </div>
        </div>
    </div>
    <!--/top posts-->
    <?php } ?>

    <?php

    //if connection successful
    if ($connect) {
        //pagination
        $offset = 0;
        $lim = 12;
        //get number of posts
        $selectNumPosts = "SELECT * FROM weirdeats_post WHERE post_date < NOW()";
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

        //select posts
        $selectPosts = "SELECT * FROM weirdeats_post INNER JOIN weirdeats_category ON weirdeats_post.category_id=weirdeats_category.category_id WHERE post_date < NOW() ORDER BY post_date DESC LIMIT $lim OFFSET $offset;";
        $resultPosts = mysqli_query($connect, $selectPosts);

        include("partials/_loop.php");
    }    //if connection fails
    else {
        echo "<div class='row column'><h2>Something went wrong with the database.</h2></div>";
    }

    mysqli_close($connect);
    ?>

</div><!--content wrapper ends-->

<?php include("partials/_footer.php"); ?>
