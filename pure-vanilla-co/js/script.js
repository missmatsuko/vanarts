/*VARIABLES*/
var cartContents = [];
if (localStorage.getItem("cartContents") != null) {
  cartContents = JSON.parse(localStorage.getItem("cartContents"));
}
var cartCount = 0;
if (localStorage.getItem("cartContents") != null) {
  updateCartCount();
}

/*FUNCTIONS*/
function formatPrice(number){
	return "$"+number.toFixed(2);
}

function showPrice(price){
	var regularPrice = price.regular;
	var specialPrice = price.special;

	if(specialPrice){		
		return "<span class='old-price'>"+formatPrice(regularPrice)+"</span> <span class='new-price'>"+formatPrice(specialPrice)+"</span><p>(save "+Math.round((regularPrice-specialPrice)/regularPrice*100)+"%)</p>";
	}
	else {
		return formatPrice(regularPrice);
	}
	
}

function updateCartCount(){
	cartCount= cartContents.length;
	$(".cartCount").each(function(){
		$(this).text(cartCount);
	});
}

function addItem(itemID,quantity=1){
	cartContents.push(itemID);
	cartContents.sort(function(a, b){return a-b});
	localStorage.setItem("cartContents", JSON.stringify(cartContents));
	updateCartCount();
}

$(function() {

	$.getJSON( "data/products.json", function(products) {
		var productsArray = products.product;
		var productsArrayLength = productsArray.length;
		$(".products").text("");
		//loop through all items
		for (var i=0;i<productsArrayLength;i++){
			//fill products section
			$(".products").append(
				"<div class='small-12 medium-6 large-4 columns product-wrapper'>"+
				"<a href='item.php'>"+
				"<img class='product-photo' src='"+productsArray[i].image+"' alt='A bottle of"+productsArray[i].name+"'>"+
				"<h3>"+productsArray[i].name+"</h3>"+
				"<h4>"+showPrice(productsArray[i].price)+"</h4>"+
				"</a>"+
				"<a href='#' class='button' onClick='addItem("+i+");return false;'>Add to Cart</a><br>"+
				"</div>"
			);
		}
	});
	
	//add item

	//accordion
	if($(".list-accordion").length>0){
		$(".list-accordion .question").each(function(){
			$(this).on("click",function(){
				if ($(this).next(".answer").css('display') == 'list-item'){
					$(".answer").slideUp();
					return;
				}
				$(".answer").slideUp();
				$(this).next(".answer").slideDown();
			});
		});
	}
	
});