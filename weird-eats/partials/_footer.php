<div class="scroll-to-top-container row column text-right">
<i class="fa fa-arrow-circle-up scroll-to-top-button"></i>
</div>

<footer>
    <div class="row">
        <div class="small-6 large-expand columns">
            <h6>Categories</h6>
            <ul class="list-unstyle two-col-list">
            <?php
            include("partials/_db_login_details.php");
            $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
            
            if ($connect) {
                $selectCategories = "SELECT * FROM category ORDER BY category_name";
                $resultCategories = mysqli_query($connect, $selectCategories);
                
                while ($row = mysqli_fetch_assoc($resultCategories)) {
                    $category = ucfirst($row['category_name']);
                    $categoryID = $row['category_id'];

                    echo "<li><a href='category.php?category=" . $categoryID . "'>" . $category . "</a></li>";
                }

                mysqli_close($connect);
            }
            ?>
            </ul>

        </div>
        <div class="small-6 large-expand columns">
            <h6>Sitemap</h6>
            <ul class="list-unstyle">
                <li><a href="index.php">Home</a></li>
                <li><a href="category.php">Categories</a></li>
                <li><a href="tag.php">Tags</a></li>
                <li><a href="suggest.php">Suggest</a></li>
                <li><a href="login.php">Log-In</a></li>
            </ul>
        </div><!--footer col3 ends-->
        <div class="small-6 large-expand columns">
            <h6>Follow Us!</h6>
            <ul class="list-unstyle list-horizontal">
                <li><a class='icon-link' href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class='icon-link' href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a class='icon-link' href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a class='icon-link' href="#"><i class="fa fa-yelp"></i></a></li>
                <li><a class='icon-link' href="#"><i class="fa fa-amazon"></i></a></li>
            </ul>
            <p class='shop-button'><a href='#'>Visit the Official Shop</a></p>
            <p class='copyright-text'>2016 &copy; <a href='http://www.matsuko.ca'>matsuko.ca</a></p>
        </div><!--footer col4 ends-->
    </div><!--row ends-->
</footer><!--footer ends-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script><!--jQuery-->
<script src = "js/script.js" ></script><!--custom script-->
</body><!--body ends-->    
</html><!--html ends-->