// Getting the nav bar button by the id
function nav_dropdownFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Registering the on click even for the button, then 'dropping' down all the
// available list items
window.onclick = function (e) {
    if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
        }
    }
}