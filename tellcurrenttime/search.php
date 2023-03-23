<?php
date_default_timezone_set("Europe/Riga");
if (isset($_POST["text"])) {
    $info = explode(" ", $_POST["text"]);
    if (sizeof($info)==2) {
        $forecast = @json_decode(file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=".$info[0]."&longitude=".$info[1]."&hourly=temperature_2m,rain,cloudcover,windspeed_10m&forecast_days=1"), true);
        $date = date("H");
        $array["text"] = "Temperatura:".$forecast["hourly"]["temperature_2m"][$date]." gradi. ";
        $array["text"] = $array["text"]."Lietus:".$forecast["hourly"]["rain"][$date]." mm. ";
        $array["text"] = $array["text"]."Makoni:".$forecast["hourly"]["cloudcover"][$date]." %. ";
        $array["text"] = $array["text"]."Vejs:".round($forecast["hourly"]["windspeed_10m"][$date]/3.6, 2)." m/s.";


    } else {
        $array["text"] = "INCORRECT INFO!";
    }
} else {
    $array["text"] = "NO INPUT!";
}
echo json_encode($array);
?>