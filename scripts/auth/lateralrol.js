let OBJtoken = localStorage.getItem('token');
let token = JSON.parse(OBJtoken);
if (!token) {
    window.location.href = '../index.php';
}

const userLateral = document.getElementById('userRol'),
    userHeader = document.getElementById('userHeader'),
    menuUser = document.getElementById('menuUser'),
    btnLogaut = document.getElementById('btn_logaut');

document.getElementById('imgUser').src = token.foto;
document.getElementById('user_editar').href = `usuarios_editar.php?id=${token.id_user}`;
userLateral.innerHTML = token.user;
userHeader.innerHTML = token.user;

// menus del lateral laside
const menuUsuarios = /*html*/`
<li class="nav-item has-treeview">
    <a href="#" class="nav-link ">
        <i class="fas fa-user"></i>
        <p>
            Usuarios
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="usuarios_crear.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear usuario</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="usuarios_listados.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Listado</p>
            </a>
        </li>
    </ul>
</li>
`;

const menuProductos = /*html*/ `
<li class="nav-item has-treeview">
    <a href="#" class="nav-link ">
        <i class="fas fa-dice-d6"></i>
        <p>
            Productos
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Crear producto</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Listado</p>
            </a>
        </li>
    </ul>
</li>
`;

const menuInventario = /*html*/ `
<li class="nav-item has-treeview">
    <a href="#" class="nav-link ">
        <i class="fas fa-clipboard-list"></i>
        <p>
            Control de Inventario
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="reportar_salida.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportar salida</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="reportar_entrada.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reportar entrada</p>
            </a>
        </li>
    </ul>
</li>
`;

if (token.rolUser === 1) {
    const menuUserPrincipal = menuUsuarios + menuProductos + menuInventario;
    menuUser.innerHTML = menuUserPrincipal;
} else if (token.rolUser === 2) {
    menuUser.innerHTML = menuUsuarios;
} else if (token.rolUser === 3) {
    menuUser.innerHTML = menuProductos;
} else if (token.rolUser === 4) {
    menuUser.innerHTML = menuInventario;
}

btnLogaut.addEventListener('click', (event) => {
    event.preventDefault();
    localStorage.removeItem('token');
    rediret('../index.php');
});

