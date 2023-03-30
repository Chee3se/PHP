<?php
function getAllPosts() {
    $data = @json_decode(file_get_contents("info.json"), true);
    return $data;
}
function saveNewPost($data) {
    $message["text"]=$_POST["text"];
    if (isset($_POST["author"])) {
        if (trim($_POST["author"])=="") {
            $message["author"]="anonymous";
        } else {
            $message["author"]=$_POST["author"];
        }
    } else {
        $message["author"]="anonymous";
    }
    $message["time"]=date("H:i:s");
    $data[] = $message;
    $data=json_encode($data);
    file_put_contents('info.json', $data);
}

date_default_timezone_set("Europe/Riga");
if (!empty($_POST)) {
    $data = getAllPosts();
    saveNewPost($data);
}
$data = getAllPosts();
$data=json_encode($data);
echo $data;
?>