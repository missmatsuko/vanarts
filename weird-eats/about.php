<?php
$active = "about";
include("partials/_header.php");
include("partials/_nav.php");
?>


<!--Index Page Content Here-->
<div class="content-wrapper">
    <div class='row'>
        <div class='small-12 medium-8 column'>
            <h1>About This Blog</h1>
            <div class="post-text-wrapper page-content-wrapper">
                <p>This blog is all about weird foods, ranging from the quirky to the disgusting. We are passionate about exploring new and unusual foods. A trip to the grocery store is an adventure to us. We want to share our experiences with our readers who feel the same way, so that they can better decide which of those curious foods are worth trying.</p>
                <p>If our blog has been useful to you, please consider supporting us by purchasing the foods we review at our <a href="#">online store</a>. If there's something you'd like to see featured on our blog which hasn't yet been reviewed, you can <a href="#">suggest an item</a> online.</p>
                <p>Bon app&eacute;tit!</p>
                <!--content-->
            </div>
        </div>
        <div class="small-12 medium-4 column">
            <?php include("partials/_sidebar.php"); ?>
        </div>
    </div><!--row ends-->

</div><!--content wrapper ends-->

<?php include("partials/_footer.php"); ?>
