// MOBILE VIEW ICONS
var show = document.getElementById("hi")
var hide = document.getElementById("bye")
var nav = document.getElementById("nav");

// anonymous function
show.onclick = function () {
    show.style.display = "none";
    hide.style.display = "block";
    nav.style.display = "flex";
}

// arrow function
hide.onclick = () => {
    show.style.display = "block";
    hide.style.display = "none";
    nav.style.display = "none";
}

function sizing() {
    if (window.innerWidth >= 900) { // desktop
        show.style.display = "none";
        hide.style.display = "none";
        nav.style.display = "block";
    } else if (window.innerWidth >= 600) {
        show.style.display = "block";
        hide.style.display = "none";
        nav.style.display = "none";
    } else {
        show.style.display = "block";
        hide.style.display = "none";
        nav.style.display = "none";
    }
}

window.onload = sizing;

// listener
window.addEventListener('resize', sizing);