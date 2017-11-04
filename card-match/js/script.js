//document ready
$(function() {
	//TO-DO:
	//-high scores/best times? (localstorage)
	//-reset option?
	//-prevent clicking same item?

	/***TIMER************************************************************/

	//function to start timer
	function startTimer(){
		//start at 0 seconds
		var time = 0;
		//every second, run changeTime function
		timeInterval = window.setInterval(changeTime,1000);
		//changeTime function: add 1 to time(secs), convert time(secs) to time(min:secs)
		function changeTime(){
			//add 1 to time
			time++;
			//change time shown
			$("#time").text(convertTime(time));
		}
	}

	//function to make single digit numbers into 2 digits
	function makeTwoDigits(num){
		//if number is less than 10, convert to number prefixed with 0
		if(num<10){
			return "0"+num;
		}
		//otherwise return the number
		else{
			return num;
		}
	}

	//function to stop timer
	function stopTimer(){
		//clear timeInterval
		clearInterval(timeInterval);
	}

	//function to convert time(secs) to time(min:secs)
	function convertTime(seconds){
		//if time is less than 60 seconds
		if(seconds<60){
			//return 00: minutes and seconds in 2 digits
			return "00:"+makeTwoDigits(seconds);
		}
		//if time is 60 seconds or greater, but under 1 hour (3600 seconds)
		else if(seconds<3600){
			//minutes is number of seconds divided by 60, rounded down
			var minutes = Math.floor(seconds/60);
			//seconds is number of seconds minus what was put into minutes
			seconds = seconds - minutes*60;
			//return time in mm:ss
			return makeTwoDigits(minutes)+":"+makeTwoDigits(seconds);
		}
		//if time is more than or equal to 3600 seconds, return "timeout" and run loseGame function
		else if(seconds>=3600){
			return "Timeout!";
			loseGame();
		}
	}

	//function to begin the game
	function startGame(){
		$(".messageScreen").fadeOut();
		startTimer();
	}

	$("#startGameBtn").on("click",startGame);

	//function to win the game
	function winGame(){
		stopTimer();
		//secret message!
		console.log("Yay, you won the game!");
		console.log("=^..^=");
		console.log("MeOw~!");
		//hide start message, show win message
		$(".startMessage").addClass("hide");
		$(".winMessage").removeClass("hide");
		$(".messageScreen").fadeIn();
	}

	//function to lose the game
	function loseGame(){
		stopTimer();
		//hide start message, show lose message
		$(".startMessage").addClass("hide");
		$(".loseMessage").removeClass("hide");
		$(".messageScreen").fadeIn();
	}

	/***CARDS**********************************************************/
	var flipped = 0;

	//load cards with images
	//card array
	var cardArray = ["photo-album/photo-1.jpg","photo-album/photo-2.jpg","photo-album/photo-3.jpg","photo-album/photo-4.jpg","photo-album/photo-5.jpg","photo-album/photo-6.jpg","photo-album/photo-1.jpg","photo-album/photo-2.jpg","photo-album/photo-3.jpg","photo-album/photo-4.jpg","photo-album/photo-5.jpg","photo-album/photo-6.jpg"];

	//randomize array....
	//shuffle function from http://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
	function shuffle(array) {
	  var currentIndex = array.length, temporaryValue, randomIndex;

	  // While there remain elements to shuffle...
	  while (0 !== currentIndex) {

	    // Pick a remaining element...
	    randomIndex = Math.floor(Math.random() * currentIndex);
	    currentIndex -= 1;

	    // And swap it with the current element.
	    temporaryValue = array[currentIndex];
	    array[currentIndex] = array[randomIndex];
	    array[randomIndex] = temporaryValue;
	  }

	  return array;
	}

	//shuffle array & replace images
	shuffle(cardArray);
	for(var i=0;i<cardArray.length;i++){
		$(".face").eq(i).css("background-image", "url("+cardArray[i]+")").attr("data-img", cardArray[i]);
	}

	//function to return flipped cards to original position
	function returnFlipped(){
		$(".show").delay(1000).queue(function(){
		    $(this).removeClass("flip").dequeue();
		});
		$(".show").removeClass("show");
	}

	//function to hide matched cards
	function hideMatched(time){
		$(".show").fadeTo(1500,0);
		$(".show").removeClass("show");
	}

	//loop through all cards
	$(".card").each(function(){
		var currentCard = $(this);

		//on touch
		currentCard.on("click",function(){

			//trying to fix problem when many cards are clicked quickly
			//if more than 2 cards are showing
			if($(".show").length>1){
				//run the resulting function immediately
				if(match===true){
					$(".show").fadeTo(0,0);
				}
				if(match===false){
					$(".show").removeClass("flip");
				}
				$(".show").removeClass("show");
				flipped = 0;
			}

			//if less than 2 cards flipped
			if(flipped<2){
				//flip card
				currentCard.addClass("flip show");
				flipped++;
			}

			//if 2 cards are flipped
			if(flipped===2){
				var compareCards = $(".show");
				//check if cards match
				if(compareCards.eq(0).find(".face").data("img")===compareCards.eq(1).find(".face").data("img")){
					//..and they DO match, hide them
					match = true;
					hideMatched();
					//if no more cards left, win game
					if($(".flip").length===12){
						winGame();
					}
				}else {
					//...and they DO NOT match, return them to original position
					match = false;
					returnFlipped();
				}
				flipped = 0;
			}
		});

	});

});