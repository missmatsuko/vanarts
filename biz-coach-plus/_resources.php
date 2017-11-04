<?php
if (isset($_SESSION['username'])) {
    $resourceUrl = "href='documents/sample-pdf.pdf' target='_blank'";
} else {
    $resourceUrl = "href='login.php'";
}
?>

<div class="product-list row">
    <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-1.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>Small Talk</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
    <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-2.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>Turning Passion Into Wealth</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
    <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-3.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>Life Coaching Now</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
    <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-4.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>Millionaire Mindset</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
        <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-5.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>You Are A Badass</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
    <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-6.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>How to Change Your Life in the Next 15 Minutes</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
    <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-7.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>Keep Calm and Ask On</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
    <div class="small-3 columns">
        <div class="product-item">
            <img src="documents/book-image-8.jpg" alt="Book cover."/>
            <div class="product-desc">
                <h3>The 7 Habits of Highly Effective People</h3>
                <p>This is a short description about some of the many things you can learn if you read this book!</p>
            </div>
        </div>
        <a <?php echo $resourceUrl ?> class="button">Read Now</a>
    </div><!--column ends-->
</div><!--row ends-->