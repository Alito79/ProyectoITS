function toggleForm() {

    //Esta funcion sea dos constantes para podes trabajar
    //los elementos comodamente, y modifica cual panel debe
    //ocultarse.
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    loginForm.classList.toggle('hidden');
    registerForm.classList.toggle('hidden');
}

