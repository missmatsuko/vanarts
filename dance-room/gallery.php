<?php 
$active="gallery";
include("_header.php");
echo '<link href="fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/><!--fancybox--><!--fancybox-->';
include "_nav.php";?>

<div class="row page-wrapper">
    <div class="page-main small-12 columns">
        <h1>Photo Gallery</h1>
    </div><!--upcoming events column ends-->
    <!--upcoming events here-->
    <?php
    //include database login info
    include("../_db.php");

    //connect to database
    $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);

    //if connection successful
    if ($connect) {
        //select upcoming events
        $selectPhotos = "SELECT * FROM danceroom_gallery";
        $resultPhotos = mysqli_query($connect, $selectPhotos);

        //loop through upcoming events
        while ($row = mysqli_fetch_assoc($resultPhotos)) {
            $id = $row['id'];
            $alt = $row['alt'];
            $src = $row['src'];

            //list events
            echo "<div class='small-12 medium-4 large-3 columns end'>";
            echo "<a class='fancybox' href='img/gallery/" . $src . "' rel='group'><img src='img/gallery/" . $src . "' alt='" . $alt . "'></a>";
            echo "</div><!--event poster ends-->";
        }
        mysqli_close($connect);
    }
    //if connection fails
    else {
        echo "<h2>Something went wrong with the database.</h2>";
    }
    ?>


</div><!--pagewrapper row ends-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script><!--jquery-->
<script src="fancybox/jquery.fancybox.js" type="text/javascript"></script><!--fancybox-->
<script src="fancybox/jquery.fancybox.pack.js" type="text/javascript"></script><!--fancybox-->
<script type="text/javascript">
    $(document).ready(function () {
        $(".fancybox").fancybox();
    });
</script>
<?php include("_footer.php"); ?>
