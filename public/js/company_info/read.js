function manageBannerContactDisplay() {

    // If the browser width is less than 770px,
    // remove the banner-contact.
    if ($('#my-company-mask').width() <= 770) {
        $('#banner-contact').css('display', 'none');
    }

    // .. if it's greater than 770px, show it back..
    if ($('#my-company-mask').width() > 770) {
        $('#banner-contact').css('display', 'block');
    }
}


function manageCompanyMaskDisplay() {

    // For the banner mask.
    $('#my-company-mask').width($('#company-banner').width());


    $('#my-company-mask').height($('#company-banner').height());


//            console.log("$('#company-banner').width()::: " + $('#company-banner').width());
//            console.log("$('#company-banner').height()::: " + $('#company-banner').height());


    // // TODO:DEBUG
    // console.log("$('#my-company-mask').width()::: " + $('#my-company-mask').width());
    // console.log("$('#my-company-mask').height()::: " + $('#my-company-mask').height());


//            header-descriptions
    var imgHeight = $('#company-banner').height();
    imgHeight /= 2;

    $('#header-descriptions').css('top', (imgHeight - 100) + 'px');

//            var companyNameFont = imgHeight / 12;
//            companyNameFont /= 2;
////            $('#company-name').css('fontSize', companyNameFont + 'px');
//            $('#header-descriptions').css('fontSize', companyNameFont + 'px');

}