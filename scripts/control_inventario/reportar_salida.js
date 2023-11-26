const baseUrl = enviroments.baseUrl;
const contenido = document.getElementById('table_salida');

fetch(`${baseUrl}/controlinv/controlinv_api.php`)
.then(response => response.json())
.then(resp => {
    let content = "";

resp.data.forEach(element => {

content += `<tr>`;
content += `<td>${element.hora_egreso}`;
content += `<td>${element.fecha_egreso}`;
content += `<td>${element.cantidad_salida}`;
content += `<td>${element.productofk}`;
content += `<td>${element.pk_cont}`;
content += `<td>${element.pk_cont}`;
content += `<td>${element.pk_cont}`;
content += `</tr>`;
});
contenido.innerHTML = content;
})