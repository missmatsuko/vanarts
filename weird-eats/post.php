<?php
session_start();
//post comment
if (isset($_POST['comment']) && !empty($_POST['comment']) && isset($_SESSION['userID'])) {

    include("../_db.php");
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    $postID = (int) $_POST['postID'];
    $author = (int) $_SESSION['userID'];
    $comment = mysqli_real_escape_string($connect, strip_tags($_POST['comment']));

    $insertComment = "INSERT INTO weirdeats_comment (`post_id`,`comment_author_id`,`comment_content`) VALUES ('$postID','$author','$comment');";
    $resultComment = mysqli_query($connect, $insertComment);

    header("location: post.php?post_id=" . $postID);
}

include("partials/_header.php");
include("partials/_nav.php");
?>

<!--Index Page Content Here-->
<div class="content-wrapper">
    <?php
    //Post: individual post page
    //include database login info
    include("../_db.php");

    //connect to database
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    //if connection successful
    if ($connect) {
        $postID = mysqli_real_escape_string($connect, $_GET['post_id']);
        $selectPost = "SELECT * FROM weirdeats_post INNER JOIN weirdeats_category ON weirdeats_post.category_id=weirdeats_category.category_id WHERE post_id ='$postID'";
        $resultPost = mysqli_query($connect, $selectPost);

        $selectTags = "SELECT * FROM weirdeats_tag INNER JOIN weirdeats_post_tag ON weirdeats_post_tag.tag_id = weirdeats_tag.tag_id WHERE post_id ='$postID'";
        $resultTags = mysqli_query($connect, $selectTags);

        //comment pagination
        $offset = 0;
        $lim = 5;
        //get number of posts
        $selectNumComments = "SELECT * FROM weirdeats_comment WHERE post_id ='$postID'";
        $resultNumComments = mysqli_query($connect, $selectNumComments);
        $numPosts = mysqli_num_rows($resultNumComments);

        $numPages = ceil($numPosts / $lim);

        if (isset($_GET['page'])) {
            $page = (int) $_GET['page'];
        } else {
            $page = 1;
        }

        if (isset($page) && $page <= $numPages && $page > 0) {
            $offset = (mysqli_real_escape_string($connect, $page) - 1) * $lim;
        }

        $selectComments = "SELECT * FROM weirdeats_comment INNER JOIN weirdeats_user ON weirdeats_user.user_id = weirdeats_comment.comment_author_id WHERE post_id ='$postID' ORDER BY comment_date DESC LIMIT $lim OFFSET $offset;";
        $resultComments = mysqli_query($connect, $selectComments);
        $commentRows = mysqli_num_rows($resultComments);

        $postRows = mysqli_num_rows($resultPost);
        if ($postRows != 1) {
            echo "<div class='row column'><h2>Post does not exist.</h2></div>";
        } else {

            while ($row = mysqli_fetch_assoc($resultPost)) {
                $id = $row['post_id'];
                $date = $row['post_date'];
                $formattedDate = date('M d, Y', strtotime($date));
                $imageSrc = $row['post_image'];
                $categoryID = $row['category_id'];
                $category = $row['category_name'];
                $color = $row['category_color'];
                $title = $row['post_title'];
                $content = $row['post_content'];

                //display post
                echo "<div class='row'>";
                echo "<div class='small-12 medium-8 column'>";
                echo "<div class='single-post-wrapper'><img class='post-img' src='img/post/" . $imageSrc . "' alt='Photo of " . $title . ".'>";
                echo "<a href='category.php?category=" . $categoryID . "'><h4 class='category-label' style='background-color: #" . $color . ";'>" . $category . "</h4></a>";

                echo "<div class='post-content-wrapper'><h2>" . $title . "</h2>";
                echo "<p class='post-date'>" . $formattedDate . "<p>";
                echo "<div class='post-text-wrapper'>" . $content . "</div>";
                echo "<p class='shop-button'><a href='#'>Get it!</a></p>";
                echo "<p class='tags-list'>Tags: ";

                $tagRows = mysqli_num_rows($resultTags);
                if ($tagRows < 1) {
                    echo "There are no tags.";
                } else {
                    while ($row = mysqli_fetch_assoc($resultTags)) {
                        echo "<a href='tag.php?tag_name=" . $row['tag_name'] . "'>" . $row['tag_name'] . "</a>";
                    }
                }
                echo "</p></div></div>";

                //display comments
                echo "<h3>Comments (" . $commentRows . ")</h3>";
                if (isset($_SESSION['displayName'])) {
                    echo "<form method='post' action='" . htmlentities($_SERVER['PHP_SELF']) . "' class='comment-form'>";
                    echo "<input name='postID' type='hidden' value='" . $_GET['post_id'] . "'>";
                    echo "<textarea class='comment-textarea' name='comment' maxlength='500'>Your Comment...</textarea>";
                    echo "<input class='button' type='submit' value='Post Comment'>";
                    echo "</form>";
                } else {
                    echo "<p>You must <a href='login.php'>log in</a> to post comments.</p><br>";
                }

                if ($commentRows < 1) {
                    echo "There are no comments.";
                } else {
                    while ($row = mysqli_fetch_assoc($resultComments)) {
                        $date = $row['comment_date'];
                        $formattedDate = date('M d, Y', strtotime($date));
                        $author = $row['display_name'];
                        $image = $row['display_image'];
                        $content = $row['comment_content'];

                        echo "<div class='comment-wrapper'><div class='row'>";
                        echo "<div class='small-2 column text-center'><img class='comment-author-photo' src='img/user/" . $image . "' alt='" . $author . "'s profile photo'>";
                        echo "<h4>" . $author . "</h4></div><!--column ends-->";
                        echo "<div class='small-10 column'><p class='comment-date'>" . $formattedDate . "</p>";
                        echo "<p>" . $content . "</p></div><!--column ends--></div><!--row ends--></div><!--comment wrapper ends-->";
                    }
                    //pagination
                    if ($numPages > 1) {
                        echo "<div class='row'><div class='column pagination-links text-center'>";
                        echo "<a href='?post_id=" . $postID . "&page=1'><< </a>/";

                        for ($i = 1; $i < $numPages + 1; $i++) {
                            echo "<a ";
                            if ($i === $page) {
                                echo "class='current' ";
                            }
                            echo "href='?post_id=" . $postID . "&page=" . $i;
                            echo "'> $i </a> ";
                            if ($i < $numPages) {
                                echo " /";
                            }
                            echo "</a>";
                        }

                        echo "/<a href='?post_id=" . $postID . "&page=" . $numPages . "'> >></a>";
                        echo "</div></div>";
                    }
                }
                echo "</div><!--column ends-->";

                echo "<div class='small-12 medium-4 columns'>";
                include("partials/_sidebar.php");
                echo "</div><!--column ends--></div><!--row ends-->";
            }
        }
    }    //if connection fails
    else {
        echo "<div class='row column'><h2>Something went wrong with the database.</h2></div>";
    }
    ?>

</div><!--content wrapper ends-->
<?php include("partials/_footer.php"); ?>