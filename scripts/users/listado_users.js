let OBJtoken = localStorage.getItem('token');
let token = JSON.parse(OBJtoken);

if (!token) {
    rediret('../index.php');
}

const baseUrl = enviroments.baseUrl;
const contenido = document.getElementById('contenido');



fetch(`${baseUrl}/users/users_api.php`)
    .then(response => response.json())
    .then(resp => {
        console.log(resp.data)
        let content = '';
        if (resp.data === null) {
            content = 'no hay usuarios registrados';
        } else {
            resp.data.forEach((usuario) => {
                // content += '<tr>';
                // content += `<td>${usuario.usu}</td>`
                // content += `<td><img src="${usuario.photo}" width="50"></td>`
                // content += '</tr>';

                content += `
                <div class="card bg-light">
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                <h2 class="lead"><b>${usuario.usu}</b></h2>
                                    <!--en esta parte va el nombre -->
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-user-lock"></i></span><b>Tipo De User:</b>
                                            administrador</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="${usuario.photo}" alt="" width="150px" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="usuarios_editar.php?id=${usuario.pk}"
                                   title="editar" class="bnt btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                <a href="usuarios_eliminar.php?id=${usuario.pk}"
                                   title="eliminar" class="bnt btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                `
            });


        }

        contenido.innerHTML = content;
    })