$(document).foundation();

/*Activate Alternate Theme for Form Results Pages********************************/
//Check if the URL is for the confirmation or form processing page, which will require different colours
if (window.location.href.indexOf("confirmation") > -1 || window.location.href.indexOf("form") > -1) {
    //make all nav links dark
    for (i = 1; i < 5; i++) {
        document.getElementById("nav-link-" + i).style.color = "#444";
    }
    //make logo dark
    document.getElementById("logo").src = "img/logo/logo-black.png";
}


/*Back to Top Button*************************************************************/

//Adapted from http://www.w3schools.com/jsref/prop_screen_height.asp
//Sets function to activate on page scroll
window.onscroll = function () {
    showBackToTop();
};

//Initially hides the button
document.getElementById("back-to-top-button").style.display = "none";

//If page scrolls down more than 1 screen height, show the button
//Not sure why I had to divide it by 0..maybe something I did in CSS
function showBackToTop() {
    //If the document is viewed more than 1 pagedown, show the back to top button
    if (document.body.scrollTop > window.innerHeight / 100) {
        document.getElementById("back-to-top-button").style.display = "block";
    }
    //otherwise, hide it
    else {
        document.getElementById("back-to-top-button").style.display = "none";
    }
}


/*Navigation********************************************************************/

//This function is activated when a navigation link is clicked
function highlightLink(linkNo) {
    //set all nav links to white
    for (i = 1; i < 5; i++) {
        document.getElementById("nav-link-" + i).style.color = "#fff";
    }
    //set the selected nav link to black
    document.getElementById("nav-link-" + linkNo).style.color = "#000";
}



/*Slideshow*********************************************************************/

var autoNext = setInterval(nextSlide, 4000);

document.getElementById("slide-1").style.display = "block";
var currentSlide = 1;

function nextSlide() {
    document.getElementById("slide-" + currentSlide).style.display = "none";
    currentSlide++;
    if (currentSlide > 9) {
        currentSlide = 1;
    }
    document.getElementById("slide-" + currentSlide).style.display = "block";
}

function prevSlide() {
    document.getElementById("slide-" + currentSlide).style.display = "none";
    currentSlide--;
    if (currentSlide < 1) {
        currentSlide = 9;
    }
    document.getElementById("slide-" + currentSlide).style.display = "block";
}


/*Testimonials******************************************************************/

//SIMILAR TO SLIDESHOW ABOVE
document.getElementById("testimonial-1").style.display = "block";
var currentText = 1;

function nextText() {
    document.getElementById("testimonial-" + currentText).style.display = "none";
    currentText++;
    if (currentText > 4) {
        currentText = 1;
    }
    document.getElementById("testimonial-" + currentText).style.display = "block";
}

function prevText() {
    document.getElementById("testimonial-" + currentText).style.display = "none";
    currentText--;
    if (currentText < 1) {
        currentText = 4;
    }
    document.getElementById("testimonial-" + currentText).style.display = "block";
}
