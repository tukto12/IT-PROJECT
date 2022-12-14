document.addEventListener("DOMContentLoaded", () => {

    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle('sticky', window.scrollY > 0);
    });

    const navBar = document.querySelector("#navBar");
    const iconChange = document.querySelector("#iconBtn2")

    document.querySelector("#iconBtn2").addEventListener("click", e => {
        e.preventDefault();
        navBar.classList.toggle("show");
        iconChange.classList.toggle('fa-xmark');
        iconChange.classList.toggle('fa-bars');
    });

});