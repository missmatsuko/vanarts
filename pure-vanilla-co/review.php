<?php 
	$thisPage = "cart";
	include("partials/header.php");
?>

	<div class="row column page-title">
		<h2>Checkout</h2>
	</div>

	<div class="row cart mobile-last-item">
		<div class="small-12 medium-6 medium-push-6 large-push-9 large-3 columns">
			<h4>Order Review</h4>
			<p>Your final order details are below. Go back to make changes, or submit your order.</p>
			<a class="button" href="finish.php">Submit Order</a><br>
			<a href="shop.php" class="small-link">Keep Shopping</a>
		</div>
		<div class="small-12 medium-6 medium-pull-6 large-pull-3 large-9 columns">
			<p>Shipping, Payment address and details here</p>
			<table class="cart-table">
				<tr>
					<th class="hide-for-small-only">Thumbnail</th>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th class="hide-for-small-only">Subtotal</th>
				</tr>
				<tr>
					<td class="hide-for-small-only"><img src="img/vanilla-bottle.jpg" class="thumbnail"></td>
					<td><a href="#">Madagascar Beans + Kelowna Vodka</a></td>
					<td>1</td>
					<td>$20.00</td>
					<th class="hide-for-small-only">$20.00</td>
				</tr>
				<tr>
					<td class="hide-for-small-only"><img src="img/vanilla-bottle.jpg" class="thumbnail"></td>
					<td><a href="#">Mexico Beans + Vancouver Bourbon</a></td>
					<td>3</td>
					<td>$20.00</td>
					<th class="hide-for-small-only">$60.00</td>
				</tr>

				<tr class="show-for-small-only">
					<td class="hide-for-small-only">&nbsp;</td>
					<th class="hide-for-small-only">&nbsp;</td>
					<td>&nbsp;</td>
					<td>Subtotal</td>
					<td>$35.00</td>
				</tr>
				<tr>
					<td class="hide-for-small-only">&nbsp;</td>
					<th class="hide-for-small-only">&nbsp;</td>
					<td>&nbsp;</td>
					<td>GST (5%)</td>
					<td>$5.00</td>
				</tr>
				<tr>
					<td class="hide-for-small-only">&nbsp;</td>
					<th class="hide-for-small-only">&nbsp;</td>
					<td>&nbsp;</td>
					<td>Shipping<br><a href="#">Calculate Shipping</a></td>
					<td>$5.00</td>
				</tr>
				<tr>
					<td class="hide-for-small-only">&nbsp;</td>
					<th class="hide-for-small-only">&nbsp;</td>
					<td>&nbsp;</td>
					<td>Total</td>
					<td>$70.00</td>
				</tr>
			</table>
			<a class="button" href="finish.php">Submit Order</a><br>
			<a href="shop.php" class="small-link">Keep Shopping</a>
		</div>
		
	</div>
	
<?php include("partials/footer.php");
