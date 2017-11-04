$(document).ready(function () {

    //function to change log in title depending on whether sign up fields is shown
    function changeLoginTitle() {
        if (!($('.sign-up-fields').hasClass('hide'))) {
            $(".page-login h3").text('Sign Up');
            $(".page-login p").text('Sign up to access our resources');
        }
    }

    //highlight current page in nav bar
    var currentPage = location.href.toLowerCase();
    console.log(currentPage);

    $("nav li a").each(function () {
        if (currentPage.indexOf(this.href.toLowerCase()) > -1) {
            $("nav-link-active").removeClass("nav-link-active");
            $(this).parent().addClass("nav-link-active");
        }
    });

    //sign up link to display additional fields
    $('#sign-up-link').click(function () {
        $('.sign-up-fields').removeClass('hide');
        changeLoginTitle();
    });

    //change login page title
    changeLoginTitle();

    //contact form validation-----------------------------------------------
    //name can only contain letters, spaces, and apostrophe
    $(".contact-form input[name='name']").keyup(function () {
        var namePattern = /^[a-zA-Z'\s]+$/;
        if (!namePattern.test($(this).val())) {
            alert("Invalid character entered. Only letters, spaces, and apostrophes allowed.");
            $(this).val($(this).val().substring(0, $(this).val().length-1));
        }
    });

    //email must be email
    $(".contact-form input[name='email']").blur(function () {
        var emailPattern = /[a-zA-Z0-9.\-_]{1,}@[a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,}.{0,}/;
        if (!emailPattern.test($(this).val())) {
            alert("E-mail address is invalid. Please try again.");
            $(this).focus();
        }
    });


    //message max 500 characters
    $(".contact-form [name='message']").keyup(function () {
        if (($(this).val().length) > 499) {
            alert("Max character length reached. Message must be no more tha 500 characters");
            $(this).val($(this).val().substring(0, 500));
        }
        ;
        ;
    });
});

