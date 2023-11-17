/**
 * 
 * @param {string} url
 * @returns {window.location.href} recarga o te reenvia a la pagina que le indiques 
 */
const rediret = (url) => {
    window.location.href = url;
}

/**
 * 
 * @param {string} title mensaje del icono 
 * @param {string} icon nombre del icono
 */
const respuest = (title, icon) => {

    swal({
        title: title,
        icon: icon,
        timer: 5000,
    });
}