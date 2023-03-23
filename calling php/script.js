const holder = document.createElement("div");
holder.id = "holder";
document.getElementById("content").appendChild(holder);


function form(event) {
  event.preventDefault();
  console.log(event);
fetch("search.php", {
    method : "POST",
    body: new FormData(event.target),
}).then(
    response => response.json()
).then(
  html => {
    if (html["text"].trim()!="") {
      holder.className = "outHolder";
      let p = document.createElement("p");
      p.textContent = html["text"];
      p.style.margin = "0";
      p.style.marginLeft = "5px";
      holder.prepend(p);
    }
})};