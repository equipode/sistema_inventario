let OBJtoken = localStorage.getItem('token');
let token = JSON.parse(OBJtoken);

if (!token) {
    rediret('../index.php');
}

const baseUrl = enviroments.baseUrl;
const btneleminar = document.getElementById('btn_eliminar');
const foto = document.getElementById('txtFile');
const contenido = document.getElementById('contenido');

let url = new URL(window.location.href);
const id = url.searchParams.get('id');

fetch(`${baseUrl}/users/users_api.php?id=${id}`)
    .then(response => response.json())
    .then(resp => {
        const user = resp.data[0];
        contenido.innerHTML = `
        Usted va a eliminar el usuario<br>
        ${user.usu}<br>
        Presione<b>Aceptar</b> para eliminar. <br><br>

        <b>Importante</b>. Una vez eliminado no podra recuperarse.
        `;
    })

btneleminar.addEventListener('click', (event) => {
    event.preventDefault();
    fetch(`${baseUrl}/users/users_api_delete.php`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                iduser: id
            })
        }).then(response => response.json())
        .then(resp => {
            console.log(resp)
        })

})