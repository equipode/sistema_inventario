const baseUrl = enviroments.baseUrl;
const contenido = document.getElementById('contenido_tabla');

fetch(`${baseUrl}/products/products_api.php`)
.then(responsive => responsive.json())
.then(resp => {

    let content = '';
    resp.data.forEach(producto => {
       content +=  `
       <tr>
            <td>${producto.refer}</td>
            <td>${producto.nomProdu}</td>
            <td>${producto.descri}</td>
            <td><img src="${producto.photo}" alt="${producto.nomProdu}" width="50px" height="50px"></td>
            <td>${producto.ubicaciBodega}</td>
            <td>${producto.precio}</td>
            <td>${producto.stok}</td>
            <td>${producto.exist}</td>
            <td>${producto.esta}</td>
       </tr>
       `;
    });
    contenido.innerHTML = content;

})