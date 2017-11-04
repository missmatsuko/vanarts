<?php
// Start the session
session_start();

//if log out is posted, or session username is not set, redirect to login page
if (isset($_GET['logout']) || ! isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']===0) {
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
    <div class='row align-center'>
        <div class='small-12 medium-10 large-6 column'>
            <h1>Add/Edit Blog Post</h1>
            <?php 

            if($_GET[action]=='edit'){
                $edit = true;

                if ($connect) {

                    $post_id = mysqli_real_escape_string($connect,$_GET[postid]);
                    $selectPostData = "SELECT * FROM post WHERE post_id = '$post_id'";
                    $resultPostData = mysqli_query($connect, $selectPostData);

                    while ($row = mysqli_fetch_assoc($resultPostData)) {
                        $id = $row['post_id'];
                        $title = $row['post_title'];
                        $content = $row['post_content'];
                    }
                }
            }

            if(isset($_POST['submit'])&&$_POST['submit']=='post'){
                if (!empty($_POST['date']) && !empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['text'])) {

                    $date = mysqli_real_escape_string($connect, $_POST['date']);
                    $category = (int) $_POST['category'];
                    $title = mysqli_real_escape_string($connect, $_POST['title']);
                    $text = mysqli_real_escape_string($connect, $_POST['text']);

                    $tags = trim($_POST['tags']);
                    $tagsArray = preg_split("/\s*,\s*/", $tags);
                    $tagIDArray = [];

                    foreach($tagsArray as $tag){
                        $tag = preg_replace('/\s+/', '', $tag);
                        $tag = mysqli_real_escape_string($connect,$tag);
                        $selectTagID = "SELECT * FROM tag WHERE tag_name = '$tag';";
                        $resultTagID = mysqli_query($connect, $selectTagID);

                        if(mysqli_num_rows($resultTagID)===1){
                            $row = mysqli_fetch_assoc($resultTagID);
                            $tagID = $row['tag_id'];

                        } else {
                            $insertTagID = "INSERT INTO tag (tag_name) VALUES ('$tag')";
                            $resultTagID = mysqli_query($connect, $insertTagID);
                            $tagID = mysqli_insert_id($connect);
                        }
                        $tagIDArray[] = $tagID;
                    }

                    $src = mysqli_real_escape_string($connect, $_FILES['src']['name'][0]);

                        //image stuff
                    $target_dir = "img/post/";
                    $target_file = $target_dir . basename($_FILES["src"]["name"][0]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                        // Check if image file is a actual image or fake image
                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["src"]["tmp_name"][0]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            echo "Sorry, file is not an image.<br>";
                            $uploadOk = 0;
                        }
                    }

                        // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.<br>";
                        $uploadOk = 0;
                    }

                        // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.<br>";
                            // if everything is ok, try to upload file
                    } else {
                        if (!move_uploaded_file($_FILES["src"]["tmp_name"][0], $target_file)) {
                            echo "Error: Post could not be completed.<br>";
                        }
                    }

                    $insertPost = "INSERT into post (post_title,post_content,post_date,category_id,post_image) VALUES ('$title','$text','$date','$category','$src');";
                    $insertResult = mysqli_query($connect, $insertPost);

                    $lastID = mysqli_insert_id($connect);

                    foreach($tagIDArray as $tagID){
                        $insertTag = "INSERT into post_tag (post_id,tag_id) VALUES ('$lastID',$tagID);";
                        $resultTag = mysqli_query($connect, $insertTag);
                    }

                    echo "<p>".$title." was posted. See the post <a href='index.php'>here</a>.</p>";

                } else {
                    echo "<div class='row column'><h3>Some fields incomplete.</h3></div>";
                }
            }
            else if(isset($_POST['submit'])&&$_POST['submit']=='edit'){
                if($connect){
                    $id = mysqli_real_escape_string($connect,$_POST['id']);
                    $title = mysqli_real_escape_string($connect,$_POST['title']);
                    $text = mysqli_real_escape_string($connect,$_POST['text']);
                    
                    $updatePost = "UPDATE post SET post_title ='$title', post_content='$text' WHERE post_id='$id'";
                        $resultUpdate = mysqli_query($connect, $updatePost);
                        
                        echo "Post has been updated. Go to <a href='cms.php'>CMS</a> or <a href='post.php?post_id=$id'>view post</a>.";
                }
            }

            ?>
            <form enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">


                <input name='id' type='hidden' value="<?php
                if ($edit) {
                    echo $id;
                }
                ?>">
                <input name='title' type='text' placeholder='Post Title' value="<?php
                if ($edit) {
                    echo $title;
                }
                ?>">
                <?php if(!$edit){ ?> <input name='date' type='date'><?php }?>
                <?php if(!$edit){ ?><input type="file" name="src[]" required><?php }?>
                <?php if(!$edit){ ?><select name='category' required>
                <option>category (required)</option>
                <?php
                if ($connect) {
                    $selectCategories = "SELECT category_name,category_id FROM category ORDER BY category_name";
                    $resultCategories = mysqli_query($connect, $selectCategories);
                    while ($row = mysqli_fetch_assoc($resultCategories)) {
                        $category = $row['category_name'];
                        $categoryID = $row['category_id'];

                        echo "<option value='" . $categoryID . "'>" . $category . "</option>";
                    }
                }
                ?>
            </select><?php }?>
            <?php if(!$edit){ ?><input name='tags' type='text' placeholder='tags (separated by commas)' optional><?php }?>
            <textarea name="text" required><?php if($edit){echo $content;} ?></textarea><br>
            <input name='submit' class='button' type='submit' value="<?php
                if ($edit) {
                    echo 'edit';
                }
                else {
                    echo 'post';
                }
                ?>">
        </form><!--form ends-->

    </div></div><!--row column ends-->
</div><!--content wrapper ends-->

<script src="//cdn.ckeditor.com/4.5.8/basic/ckeditor.js"></script><!--ckeditor CDN-->
<script>
var ckeditor;
    //make textarea into a ckeditor textarea
    ckeditor = CKEDITOR.replace('text');
</script><!--script ends-->
<?php include("partials/_footer.php"); ?>