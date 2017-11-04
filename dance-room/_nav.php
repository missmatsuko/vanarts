</head><!--head ends-->   
<body>
    <header class="row">
        <div class="small-12 medium-4 large-3 columns">
            <a class='logo' href="index.php"><img src="img/theme/logo.png" alt="Danceroom Logo"/></a>
        </div><!--logo col ends-->
        <nav class="small-12 medium-8 large-9 columns end">
            <ul class="list-unstyle list-horizontal right">
                <li><a <?php if($active == 'home') {echo 'class="active"';} ?> href="index.php">Home</a></li>
                <li><a <?php if($active == 'events') {echo 'class="active"';} ?> href="events.php">Events</a></li>
                <li><a <?php if($active == 'gallery') {echo 'class="active"';} ?> href="gallery.php">Gallery</a></li>
                <li><a <?php if($active == 'contact') {echo 'class="active"';} ?> href="contact.php">Contact</a></li>
            </ul><!--nav links end-->
        </nav><!--nav col ends-->
    </header><!--header ends-->
