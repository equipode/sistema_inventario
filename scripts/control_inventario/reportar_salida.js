const baseUrl = enviroments.baseUrl;
const contenido = document.getElementById('table_salida');

fetch(`${baseUrl}/controlinv/controlinv_api.php`)
    .then(response => response.json())
    .then(resp => {
        let content = "";

        resp.data.forEach(element => {

            content += /*html*/`
            <tr>
                <td>${element.hora_egreso}</td>
                <td>${element.fecha_egreso}</td>
                <td>${element.cantidad_salida}</td>
                <td>${element.nombre_product}</td>
                <td><img src="${element.photo_producto}" alt="${element.nombre_product}" width="50px" height="50px"></td>
                <td>${element.pk_cont}</td>
                <td>${element.pk_cont}</td>
             </tr>
            `;
        });
        contenido.innerHTML = content;
    });