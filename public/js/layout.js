$(document).ready(function () {
    const activePage = window.location.pathname;
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach((element) => {
        if (element.href.includes(activePage)) {
            element.classList.add("active");
            // element.style.backgroundColor = "black";
            // element.style.color = "white";
        }
    });
});

function logoutClick() {
    localStorage.setItem("tabID", "profileTab");
}
