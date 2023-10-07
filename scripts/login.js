const btn = document.getElementById("btnLogin");
const formData = document.getElementById("formLogin");

btn.addEventListener("click", (event) => {
    event.preventDefault()

    fetch("api/auth.php", {
            method: "POST",
            body: new FormData(formData)
        }).then(resp => resp.json())
        .then(data => {
            if (data.ok === 200) {
                location.href = data.url
            } else {
                console.log(data.error)
                alert(data.error)
            }
        })
})