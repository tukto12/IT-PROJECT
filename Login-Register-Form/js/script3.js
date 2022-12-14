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
    });


    const buttons = document.querySelectorAll('.keyboardBtn');
    const passwordarea = document.querySelector('#safePassword');
    const backspace = document.querySelector('.keyboardBackspace');

    let chars = [];

    buttons.forEach(btn => {
       btn.addEventListener('click', () => {
            chars = passwordarea.value.split('');
            console.log(chars);
            if(chars.length < 6) {
            passwordarea.value = passwordarea.value + btn.innerText;
            chars = passwordarea.value.split('');
            }
        })
    });

    backspace.addEventListener('click', () => {
        chars.pop();
        passwordarea.value = chars.join('');
    });

    document.querySelector("#passwordC").addEventListener("keypress", function(evt) {
        if ((evt.which < 48 || evt.which > 57) && (evt.which < 65 || evt.which > 68)) {
            evt.preventDefault();
          }
    });

});

setTimeout(function () {
    var msg = document.getElementById("msg");
    msg.parentNode.removeChild(msg);
}, 2000);

// var modal = document.getElementById("modalBox");

// var btn = document.getElementById("modalBtn");

// var span = document.getElementsByClassName("close")[0];

// btn.onclick = function() {
//   modal.style.display = "block";
// }

// span.onclick = function() {
//   modal.style.display = "none";
// }

// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }