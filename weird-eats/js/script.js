$(function () {

    //make all blog preview same height
    /*var equalizeHeights = function () {
        var $maxHeight = 0;

        $(".post-wrapper").each(function () {
            $maxHeight = Math.max($maxHeight, $(this).height());
        });

        $(".post-wrapper").height($maxHeight + 30);
    };
    equalizeHeights();*/

    //close big nav submenu 
    $(".fa-times").click(function () {
        $("nav ul li ul").addClass("submenu-hide");
        $("body").removeClass("no-scroll");
    });

    $("#submenu-open").click(function () {
        $("nav ul li ul").removeClass("submenu-hide");
        $("body").addClass("no-scroll");
        return false;
    });
    
    	//smooth scroll to top
	$(".scroll-to-top-button").on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, 500
		);
	});
	
	//top banner on homepage
	$(".top-post-excerpt").hide();
	$(".top-post-excerpt").eq(0).show();
	var current = 0;
	var newImage = $(".top-post-excerpt").eq(current).attr("data-image");
	$("#top-post-img").attr("src","img/post/"+newImage);
	
	function showNextExcerpt(){
		//hide old currently open post
		$(".top-post-excerpt").eq(current).slideUp(500);
		//add 1 to current post, unless current post is last one, then go back to 0
		if(current<$(".top-post-excerpt").length-1){
			current++;
		}else {
			current = 0
		}
		//hide old current image
		$("#top-post-img").hide();
		//show new current post
		$(".top-post-excerpt").eq(current).slideDown("slow");
		//change image src
		var newImage = $(".top-post-excerpt").eq(current).attr("data-image");
		$("#top-post-img").attr("src","img/post/"+newImage);
		//display new image
		$("#top-post-img").fadeIn("slow");
	}
	
	var alternateExcerpts = setInterval(showNextExcerpt, 4000);
	

});