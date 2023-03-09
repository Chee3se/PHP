
const holder = document.createElement("div");
holder.id = "holder";
document.body.appendChild(holder);


function form(event) {
  holder.innerHTML = "";
  event.preventDefault();
fetch("search.php", {
    method : "POST",
    body: new FormData(document.getElementById("inputform")),
}).then(
    response => response.text()
).then(
  html => parseData(html)
);
}
function parseData(input) {
  
}