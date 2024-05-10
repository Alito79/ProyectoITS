function openContainer() {
    var container = document.getElementById("container");
    container.style.display = "flex";
}

function closeContainer() {
    var container = document.getElementById("container");
    container.style.display = "none";
}

function openRegisterForm() {
    var container = document.getElementById("register-container");
    container.style.display = "flex";
    closeContainer();
}

function openLoginForm() {
    var container = document.getElementById("container");
    container.style.display = "flex";
    var registerForm = document.getElementById("register-container");
    registerForm.style.display = "none";
}
