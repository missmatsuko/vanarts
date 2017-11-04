<!doctype html>
<html>

<head>
	<title>Pure Vanilla Co. | Ethically Produced Pure Vanilla Extract</title>
	<meta name="description" content="Pure Vanilla Co. produces 100% pure vanilla extract using a combination of fair-trade vanilla beans and locally-distilled spirits.">
	<link rel="icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css"><!--Foundation CSS Framework-->
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'><!--FontAwesome Icons-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:400' rel='stylesheet' type='text/css'><!--Google Fonts-->
	<link rel="stylesheet" type="text/css" href="css/style.css"><!--custom stylesheet-->
</head><!--head ends-->

<body>
	<header>
		<div>
			<a href="index.php" class="logo"><img src="img/logo.png" alt="Pure Vanilla Co. logo"></a>
			<nav class="site-nav">
				<ul>
					<li <?php if($thisPage === "home"){echo("class='current'");} ?>>
						<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
					</li>
					<li <?php if($thisPage === "shop"){echo("class='current'");} ?>>
						<a href="shop.php"><i class="fa fa-gift" aria-hidden="true"></i>Shop</a>
					</li>
					<li <?php if($thisPage === "events"){echo("class='current'");} ?>>
						<a href="events.php"><i class="fa fa-calendar" aria-hidden="true"></i>Events</a>
					</li>
					<li <?php if($thisPage === "cart"){echo("class='current'");} ?>>
						<a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</a><span class="item-count hide-for-large cartCount">0</span>
					</li>
					<li <?php if($thisPage === "about"){echo("class='current'");} ?>>		
						<a href="about.php"><i class="fa fa-info-circle" aria-hidden="true"></i>About</a>
					</li>

				</ul>
			</nav>
			<a href="cart.php" class="cart-preview">Your Cart<br>(<span class="cartCount">0</span> items)</a>
		</div>
	</header><!--header ends-->