function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
// Give the parameter a variable name
let dynamicContent = getParameterByName('nav');

$(document).ready(function() {

    // Check if the URL parameter is apples
    if (dynamicContent === 'personal_details') {
        $('#personal_details').show();
    }
    // Check if the URL parameter is oranges
    else if (dynamicContent === 'address_details') {
        $('#address_details').show();
    }
    // Check if the URL parameter is bananas
    else if (dynamicContent === 'billing_details') {
        $('#billing_details').show();
    }
    // Check if the URL parameter is empty or not defined, display default content
    else {
        $('#default-content').show();
    }
});