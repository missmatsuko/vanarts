<div class='sidebar-wrapper'>
    <h3>Random Posts</h3>
    <?php
    //include db login details
    include("../_db.php");

    //connect to database
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    if ($connect) {
        if(isset($_GET['post_id'])){
            $current_post = (int)$_GET['post_id'];
        }
        //this will never match a post
        else {
            $current_post = 0;
        }
        $selectRandPosts = "SELECT `post_id`,`post_image`,`post_title` FROM weirdeats_post WHERE `post_id` != $current_post ORDER BY RAND() LIMIT 3";
        $resultRandPosts = mysqli_query($connect, $selectRandPosts);
        while ($row = mysqli_fetch_assoc($resultRandPosts)) {
            $id = $row['post_id'];
            $imageSrc = $row['post_image'];
            $title = $row['post_title'];
            
            echo "<a href='post.php?post_id=".$id."'><div class='random-post-wrapper'><img src='img/post/".$imageSrc."' alt='Post photo for ".$title."'>";

            echo "<div class='random-post-title-wrapper'><h4 class='random-post-title'>".$title."</h4></div></div></a>";
        }
        mysqli_close($connect);
    }
    ?>
</div>