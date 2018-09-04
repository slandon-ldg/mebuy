// Toggle between the hamburger menu and the normal nav bar
function myFunction() {
    var x =
        document.getElementById("nav");
    if (x.className === "nav") {
        x.className += " responsive";
    } else {
        x.className = "nav";
    }
}

function hamburgerToggle(x) {
    x.classList.toggle("change");
}
