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
; ?>

<div class="row page-wrapper">
    <?php
    //include database login info
    include("_db_login_details.php");
    //connect to database
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    //EDIT post
    if (isset($_GET["action"]) && $_GET["action"] === "edit" && $connect) {
        $editPost = true;

        $postid = $_GET["postid"];

        $selectPost = "SELECT * FROM events WHERE id=" . $postid;
        $resultPost = mysqli_query($connect, $selectPost);

        while ($row = mysqli_fetch_assoc($resultPost)) {
            $id = $row['id'];
            $title = $row['title'];
            $text = $row['text'];
            $datetime = $row['datetime'];
            $datetime = new DateTime($datetime);
            $date = date_format($datetime, "Y-m-d");
            $time = date_format($datetime, "H:m:s");
        }
    }

    //create post procedure
    //
    //if all fields set and submitted
    if (isset($_POST['date']) && isset($_POST['time']) && isset($_POST['title']) && isset($_POST['submit'])) {

        //&& isset($_FILES['src'])

        if ($_POST["submit"] === "edit") {
            $editPost = true;
        }

        //if connection successful
        if ($connect) {
            $id = mysqli_real_escape_string($connect, $_POST['id']);
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $src = mysqli_real_escape_string($connect, $_FILES['src']['name'][0]);
            $text = mysqli_real_escape_string($connect, $_POST['text']);
            $date = mysqli_real_escape_string($connect, $_POST['date']);
            $time = mysqli_real_escape_string($connect, $_POST['time']);
            $datetime = $date . " " . $time . ":00";


            if (!isset($editPost)) {
                //image stuff
                $target_dir = "img/events/";
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
            }

            /* insert */
            if (isset($editPost)) {
                $insertPost = "UPDATE events SET title='$title',text='$text',datetime='$datetime' WHERE id =" . $id;
                echo $title . " was updated.";
            } else {
                $insertPost = "INSERT into events (title,src,text,datetime) VALUES ('$title','$src','$text','$datetime')";
                echo $title . " was created.";
            }

            $resultPost = mysqli_query($connect, $insertPost);
        }
        //if connection fails
        else {
            echo "<p>Something went wrong with the database.</p>";
        }
        
        mysqli_close($connect);
    }
    ?>

    <div class="page-main small-12 columns">
        <h1 class="left">CMS: Event</h1><!--title ends-->
    </div><!--title div ends-->

    <div class="page-main small-12 medium-6 columns">
        <form enctype="multipart/form-data" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <ul class="list-unstyle">
                <li>
                    <input type="hidden" name="id" value="<?php
                    if (isset($editPost)) {
                        echo $id;
                    }
                    ?>" />
                </li>
                <li>
                    <input type="date" class="left half-width" name="date" value="<?php
                    if (isset($editPost)) {
                        echo $date;
                    }
                    ?>" required>
                    <input type="time" class="right half-width" name="time" value="<?php
                    if (isset($editPost)) {
                        echo $time;
                    }
                    ?>" required>
                </li>
                <li>
                    <input type="text" placeholder="Title" name="title" value="<?php
                    if (isset($editPost)) {
                        echo $title;
                    }
                    ?>" required>
                </li>
                <li>
                    <input type="file" name="src[]" <?php
                    if (!isset($editPost)) {
                        echo "required";
                    }
                    ?>>
                </li>
                <li>
                    <textarea name="text" required><?php
                        if (isset($editPost)) {
                            echo $text;
                        }
                        ?></textarea>
                </li>
                <li>
                    <input type="submit" value="<?php
                    if (isset($editPost)) {
                        echo "edit";
                    } else {
                        echo "post";
                    }
                    ?>" name="submit">
                </li>
            </ul>
        </form><!--contact form ends-->


        <!--main content-->
    </div><!--editor column ends-->

    <div class="page-main small-12 medium-6 columns">
        <h3>Preview</h3>
        <div id="preview">

        </div>
    </div><!--preview column ends-->

</div><!--pagewrapper row ends-->

<script src="//cdn.ckeditor.com/4.5.8/basic/ckeditor.js"></script><!--ckeditor CDN-->
<script>
var ckeditor;
                        //make textarea into a ckeditor textarea
                        ckeditor = CKEDITOR.replace('text');
</script><!--script ends-->
<script src="js/previewPost.js" type="text/javascript"></script><!--preview post-->
<?php include("_footer.php"); ?>
