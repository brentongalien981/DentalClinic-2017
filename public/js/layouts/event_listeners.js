// For smooth scrolling.
$(document).ready(function(){
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
})

// $(window").focus(function(){
//     window.alert("focused");
// });

window.onfocus = function () {
    //                window.alert("main content loaded");
    // console.log("this tab is now focused and active: " + document.getElementById("title").innerHTML);
    // set_session_currently_viewed_user_id();
    console.log("focused");
    refresh_session();

};