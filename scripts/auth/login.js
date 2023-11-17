const baseUrl = enviroments.baseUrl;
const botonLogin = document.getElementById("btnverificar");
const Formdata = document.getElementById('loginform');
const loading = document.getElementById('loading');
loading.style.display = 'none';

botonLogin.addEventListener("click", (event) => {
    event.preventDefault();

    const email = document.getElementById('user').value;
    const password = document.getElementById('pass').value;

    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

    const esValido = emailPattern.test(email);
    if (!esValido) {
        respuest('Email no válido', 'info');
    } else if (esValido) {

        if (password.trim() === '') {
            respuest('Digite la contraseña', 'info');
        } else if (password.length <= 4) {
            respuest('Debe llevar 4 letras la contraseña', 'info');
        } else {
            loading.style.display = 'block';
            fetch(`${baseUrl}/auth/auth_api.php`, {
                    method: 'POST',
                    body: new FormData(Formdata)
                }).then(response => response.json())
                .then(resp => {
                    loading.style.display = 'none';
                    if (resp.error === '0') {
                        localStorage.removeItem('data');
                        localStorage.setItem('data', JSON.stringify(resp.data));
                        rediret('views_admin/usuarios_listados.php');
                    } else {
                        respuest(resp.msg, 'info');
                    }
                });
        }


    }


})