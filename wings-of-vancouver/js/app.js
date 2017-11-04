/*GALLERY*/
//this function is called when mouseover on image
function hoverEffectOn(current) {
	//make all divs semi-transparent
	for (var i=1;i<9;i++){
		document.getElementById("img-"+i).style.opacity = "0.4";	
	};
	//make selected div fully opaque
	document.getElementById(current).style.opacity = "1";
}

//this function is called when mouseout on image
function hoverEffectOff() {
	//make all divs fully opaque
	for (var i=1;i<9;i++){
		document.getElementById("img-"+i).style.opacity = "1";	
	};
}
