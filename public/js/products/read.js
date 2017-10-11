function shortenProductDescriptions() {
    var productDescriptions = $(".product-description");

    for (i = 0; i < productDescriptions.length; i++) {
        shortenProductDescription(productDescriptions[i]);
    }
}

function shortenProductDescription(description) {
    $(description).html($(description).html().substring(0, 200) + "...");
    // window.alert($(description).html().substring(0, 30));
    // $(description).html("tae");
}