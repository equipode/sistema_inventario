let OBJtoken = localStorage.getItem('token');
let token = JSON.parse(OBJtoken);

if (!token) {
    rediret('../index.php');
}

const baseUrl = enviroments.baseUrl;
const btnguardar = document.getElementById('btn_guardar');
const foto = document.getElementById('txtFile');

let url = new URL(window.location.href);
const id = url.searchParams.get('id');
console.log(id)

fetch(`${baseUrl}/users/users_api.php?id=${id}`)
    .then(response => response.json())
    .then(resp => {
        const user = resp.data[0];
        document.getElementById('txtUser').value = user.usu;
        document.getElementById('rol').value = user.rolUser;
        document.getElementById('image').src = user.photo;
    })

btnguardar.addEventListener('click', (event) => {
    event.preventDefault();
    const usuario = document.getElementById('txtUser').value;
    const cargo = document.getElementById('rol').value;
    const fotofr = document.getElementById('txtFile');
    const photo = fotofr.files[0];

    const formData = new FormData();
    formData.append('iduser', id);
    formData.append('user', usuario);
    formData.append('rol', cargo);
    formData.append('photo', photo);
    fetch(`${baseUrl}/users/users_api_update.php`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => console.error('Error:', error));
})