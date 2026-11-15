fetch("portfolio.php")
    .then(function (response) {
        return response.text();
    })
    .then(function (data) {
        document.getElementById("content").innerHTML = data;
    });

function toggleTheme() {
    document.body.classList.toggle("dark");
}
