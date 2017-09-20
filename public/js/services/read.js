// Instance vars.
var services = document.getElementsByClassName("services-card");
var subServicesContainers = document.getElementsByClassName("services-card-details");


// var theEnterTimeoutHandler = null;
// var theExitTimeoutHandler = null;

var restorationServiceHoverEnterHandler = null;
var restorationServiceHoverExitHandler = null;

var implantServiceHoverEnterHandler = null;
var implantServiceHoverExitHandler = null;

var cosmeticServiceHoverEnterHandler = null;
var cosmeticServiceHoverExitHandler = null;

var count = 0;


// Event listeners.
// Hover events.
for (var i = 0; i < services.length; i++) {

    // handleHoverEvents(services[i]);

}




// Functions
function handleHoverEvents(serviceContainer) {
    // window.alert("SERVICE ID: " + serviceContainer.id);
    // return;

    //
    var theSpecificService = null;

    //
    switch (serviceContainer.id) {
        case "restoration-service":

            theSpecificService = document.getElementById("restoration-specific-services");

            serviceContainer.addEventListener("mouseover", function () {
                //
                doClearIntervals(restorationServiceHoverEnterHandler, restorationServiceHoverExitHandler);

                //
                restorationServiceHoverEnterHandler = setTimeout(
                    function () {
                        $(theSpecificService).css("visibility", "visible");
                        $(theSpecificService).animate({opacity: "0.9"}, 150);

                        // $(serviceContainer).height($(theSpecificService).height());
                    }, 40
                );
            });


            serviceContainer.addEventListener("mouseout", function () {
                //
                doClearIntervals(restorationServiceHoverEnterHandler, restorationServiceHoverExitHandler);

//
                restorationServiceHoverExitHandler = setTimeout(
                    function () {
                        $(theSpecificService).animate({opacity: "0.1"}, 150, function () {
                            $(theSpecificService).css("visibility", "hidden");
                        });
                    }, 40
                );
            });


            break;
        case "implant-service":
            theSpecificService = document.getElementById("implant-specific-services");

            serviceContainer.addEventListener("mouseover", function () {
                //
                doClearIntervals(implantServiceHoverEnterHandler, implantServiceHoverExitHandler);

                //
                implantServiceHoverEnterHandler = setTimeout(
                    function () {
                        $(theSpecificService).css("visibility", "visible");
                        $(theSpecificService).animate({opacity: "0.9"}, 150);
                    }, 40
                );
            });


            serviceContainer.addEventListener("mouseout", function () {
                //
                doClearIntervals(implantServiceHoverEnterHandler, implantServiceHoverExitHandler);

//
                implantServiceHoverExitHandler = setTimeout(
                    function () {
                        $(theSpecificService).animate({opacity: "0.1"}, 150, function () {
                            $(theSpecificService).css("visibility", "hidden");
                        });
                    }, 40
                );
            });

            break;
        case "cosmetic-service":
            theSpecificService = document.getElementById("cosmetic-specific-services");

            //
            serviceContainer.addEventListener("mouseover", function () {
                //
                doClearIntervals(cosmeticServiceHoverEnterHandler, cosmeticServiceHoverExitHandler);

                //
                cosmeticServiceHoverEnterHandler = setTimeout(
                    function () {
                        $(theSpecificService).css("visibility", "visible");
                        $(theSpecificService).animate({opacity: "0.9"}, 150);
                    }, 40
                );
            });


            serviceContainer.addEventListener("mouseout", function () {
                //
                doClearIntervals(cosmeticServiceHoverEnterHandler, cosmeticServiceHoverExitHandler);

//
                cosmeticServiceHoverExitHandler = setTimeout(
                    function () {
                        $(theSpecificService).animate({opacity: "0.1"}, 150, function () {
                            $(theSpecificService).css("visibility", "hidden");
                        });
                    }, 40
                );
            });

            break;
    }


}




//
// function handleHoverEnter(serviceContainer, theEnterTimeoutHandler, theExitTimeoutHandler, theSpecificService) {
//     serviceContainer.addEventListener("mouseover", function () {
//         //
//         doClearIntervals(theEnterTimeoutHandler, theExitTimeoutHandler);
//
//         //
//         theEnterTimeoutHandler = setTimeout(
//             function () {
//                 $(theSpecificService).css("visibility", "visible");
//                 $(theSpecificService).animate({opacity: "0.9"}, 150);
//             }, 40
//         );
//     });
// }
//
//
//
//
//
// function handleHoverExit(serviceContainer, theEnterTimeoutHandler, theExitTimeoutHandler, theSpecificService) {
//     serviceContainer.addEventListener("mouseout", function () {
//         //
//         doClearIntervals(theEnterTimeoutHandler, theExitTimeoutHandler);
//
// //
//         theExitTimeoutHandler = setTimeout(
//             function () {
//                 $(theSpecificService).animate({opacity: "0.1"}, 150, function () {
//                     $(theSpecificService).css("visibility", "hidden");
//                 });
//             }, 40
//         );
//     });
// }
//



// function doClearIntervals(serviceContainer) {
//     //
//     switch (serviceContainer.id) {
//         case "restoration-service":
//             //
//             doClearIntervalsNow(restorationServiceHoverEnterHandler, restorationServiceHoverExitHandler);
//             break;
//         case "implant-service":
//             doClearIntervalsNow(implantServiceHoverEnterHandler, implantServiceHoverExitHandler);
//             break;
//         case "cosmetic-service":
//             doClearIntervalsNow(cosmeticServiceHoverEnterHandler, cosmeticServiceHoverExitHandler);
//             break;
//     }
// }


function doClearIntervals(theEnterTimeoutHandler, theExitTimeoutHandler) {
    //
    if (theExitTimeoutHandler != null) {
        clearTimeout(theExitTimeoutHandler);
    }
    //
    if (theEnterTimeoutHandler != null) {
        clearTimeout(theEnterTimeoutHandler);
    }

}


// @deprecatted
$('.services-card').hover(function () {
        return;
        //
        if (restorationServiceHoverExitHandler != null) {
            clearTimeout(restorationServiceHoverExitHandler);
        }


        // Hover enter function.
        restorationServiceHoverEnterHandler = setTimeout(
            function () {
                $('#puta1').css("visibility", "visible");
                $("#puta1").animate({opacity: "0.9"}, 500);
                console.log("restorationService Hovered");
            }, 100
        );


    },

    // Hover exit function.
    function () {

        //
        if (restorationServiceHoverEnterHandler != null) {
            clearTimeout(restorationServiceHoverEnterHandler);
        }


        // Hover enter function.
        restorationServiceHoverExitHandler = setTimeout(
            function () {
                $("#puta1").animate({opacity: "0.1"}, 400, function () {
                    $('#puta1').css("visibility", "hidden");
                });
            }, 100
        );


    });