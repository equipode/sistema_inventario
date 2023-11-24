const baseUrl = enviroments.baseUrl;
const contenido = document.getElementById('table_salida');

fetch(`${baseUrl}/controlinv/controlinv_api.php`)
.then(response => response.json())
.then(resp => {
console.log(resp);    
})