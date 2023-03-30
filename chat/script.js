const holder = document.createElement("div");
holder.id = "holder";
document.getElementById("content").appendChild(holder);
function getData() {
    fetch("save.php", {
        method : "GET"
    }).then(
        response => response.json()
    ).then(
    html => {
        holder.innerHTML="";
        html.forEach(message => {
            let m = document.createElement("div");
            m.innerHTML = message["time"]+" "+message["author"]+": "+message["text"].split('\n').join('<br>');
            holder.prepend(m);
});})};
function form(event) {
    event.preventDefault();
    fetch("save.php", {
        method : "POST",
        body: new FormData(event.target),
    }).then(
        response => response.json()
    ).then(
      html => {
        holder.innerHTML="";
        html.forEach(message => {
            let m = document.createElement("div");
            m.innerHTML = message["time"]+" "+message["author"]+": "+message["text"].split('\n').join('<br>');
            holder.prepend(m);
});})};




let intervalID;
function repeatEverySecond() {
  intervalID = setInterval(sendMessage, 1000);
}
function sendMessage() {
    getData();
}
repeatEverySecond()