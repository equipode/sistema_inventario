let OBJtoken = localStorage.getItem('token');
let token = JSON.parse(OBJtoken);

if (!token) {
    rediret('../index.php');
}

const baseUrl = enviroments.baseUrl;
const btnguardar = document.getElementById('btn_guardar');
const user = document.getElementById('txtUser');
const rol = document.getElementById('rol');
const contraseña = document.getElementById('txtContraseña');
const foto = document.getElementById('txtFile');

btnguardar.addEventListener('click', (event) => {
    event.preventDefault();
    const usuario = user.value;
    const cargo = rol.value;
    const contr = contraseña.value;
    const photo = foto.files[0];

    const formData = new FormData();
    formData.append('user', usuario);
    formData.append('pass', contr);
    formData.append('rol', cargo);
    formData.append('photo', photo);
    fetch(`${baseUrl}/users/users_api_create.php`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            respuest('Usuario creado :)', 'success');
        })
        .catch(error => console.error('Error:', error));
})