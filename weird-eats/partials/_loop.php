<?php

//display posts
if (mysqli_num_rows($resultPosts) > 0) {
    // output data of each row
    echo " <div class='small-up-1 medium-up-2 large-up-4 row'>";

    while ($row = mysqli_fetch_assoc($resultPosts)) {
        $id = $row['post_id'];
        $date = $row['post_date'];
        $imageSrc = $row['post_image'];
        $categoryID = $row['category_id'];
        $category = $row['category_name'];
        $categorySlug = $row['category_slug'];
        $color = $row['category_color'];
        $title = $row['post_title'];
        $content = strip_tags($row['post_content']);
        $excerpt = substr($content, 0, 150);

        echo "<div class='column' style='display:flex;'>";
        echo "<div class='post-wrapper'>";
        echo "<a href='post.php?post_id=" . $id . "'><img class='post-img' src='img/post/" . $imageSrc . "' alt='Photo of " . $title . ".'></a>";
        echo "<a href='category.php?category=" . $categoryID . "'><h4 class='category-label' style='background-color: #" . $color . ";'>" . $category . "</h4></a>";
        echo "<div class='post-content-wrapper'><a href='post.php?post_id=" . $id . "'><h3>" . $title . "</h3></a>";
        echo "<p>" . $excerpt . "...</p>";
        echo "<a href='post.php?post_id=" . $id . "' class='read-more-link'><span class='text'>Read It!</span><i class='fa fa-chevron-right'></i></a></div>";
        echo "</div></div><!--post ends-->";
    }

    echo "</div><!--row ends-->";

    //pagination
    if ($numPages > 1) {
        echo "<div class='row'><div class='column pagination-links text-center'>";
        if (isset($_GET['category'])) {
            echo "<a href='?category=" . $_GET['category'] . "&page=1'>&lt;&lt; </a>/";
        } else {
            echo "<a href='?page=1'>&lt;&lt; </a>/";
        }

        for ($i = 1; $i < $numPages + 1; $i++) {
            echo "<a ";
            if($i===$page){echo "class='current' ";}
            echo "href='";
            if (isset($_GET['category'])) {
                echo "?category=" . $_GET['category'];
                echo "&page=" . $i;
            } else {
                echo "?page=" . $i;
            }
            echo "'> $i </a> ";
            if ($i < $numPages) {
                echo " /";
            }
        }

        if (isset($_GET['category'])) {
            echo "/<a href='?category=" . $_GET['category'] . "&page=" . $numPages . "'> &gt;&gt;</a>";
        } else {
            echo "/<a href='?page=" . $numPages . "'> &gt;&gt;</a>";
        }
        echo "</div></div>";
    }
    
} else {
    echo "<div class='row column'><h2>There are no posts.</h2></div>";
}
