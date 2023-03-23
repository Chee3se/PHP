<?php
$array["len"] = strlen($_POST["text"]);
$array["text"] = $_POST["text"];
echo json_encode($array);
?>