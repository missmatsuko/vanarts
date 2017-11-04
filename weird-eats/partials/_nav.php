</head><!--head ends-->   
<body>
    <div class='top-row row align-justify expanded'>
        <?php
        if (isset($_SESSION['realName'])) {
            echo "<div class='column'><p class='welcome-message'>Hello, " . $_SESSION['realName'] . "!</p></div>";
            echo "<div class='column text-right'><a class='button' href='login.php?logout=true'>Log Out</a></div>";
        }else {
            echo "<div class='column text-right'><a class='button' href='login.php'>Log-In/Sign-up</a></div>";
        }
        ?>
    </div>
    <header class="row align-middle">
        <div class="small-12 large-3 columns logo">
            <a href="index.php"><h2>Weird Eats</h2></a>
            <p class="tagline">"We Try Before You Buy!"</p>
        </div><!--logo col ends-->
        <nav class="columns">
            <ul class="list-unstyle">
                <li><a <?php
                    if ($active == 'home') {
                        echo 'class="active"';
                    }
                    ?> href="index.php">Home</a></li>
                   <li><a <?php
                    if ($active == 'about') {
                        echo 'class="active"';
                    }
                    ?> href="about.php">About</a></li>
                <li>
                    <a <?php
                    if ($active == 'category') {
                        echo 'class="active"';
                    }
                    ?> href="category.php" id="submenu-open">Categories</a>
                    <ul class="submenu-hide category-list">
                        <i class="fa fa-times"></i>
                        <div class="submenu-li-wrapper">
                            <?php
                            include("../_db.php");
                            $connect = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
                            if ($connect) {
                                $selectCategories = "SELECT * FROM weirdeats_category ORDER BY category_name";
                                $resultCategories = mysqli_query($connect, $selectCategories);
                                while ($row = mysqli_fetch_assoc($resultCategories)) {
                                    $category = $row['category_name'];
                                    $categoryID = $row['category_id'];
                                    $color = $row['category_color'];

                                    echo "<li><a href='category.php?category=" . $categoryID . "'  style='background-color: #" . $color . ";'>" . $category . "</a></li>";
                                }
                                mysqli_close($connect);
                            }
                            ?>
                        </div>
                    </ul>
                </li>
                <li><a <?php
                    if ($active == 'shop') {
                        echo 'class="active"';
                    }
                    ?> href="#">Shop</a></li>
                <li><a <?php
                    if ($active == 'suggest') {
                        echo 'class="active"';
                    }
                    ?> href="suggest.php">Suggest</a></li>
            </ul><!--nav links end-->
        </nav><!--nav col ends-->
    </header><!--header ends-->
