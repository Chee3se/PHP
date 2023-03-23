<?php
$tempinfo = @json_decode(file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=57.31&longitude=25.36&hourly=temperature_2m"), true);
echo "Siltakais laiks bus: ";
$size=count($tempinfo["temperature_2m"]);
$big=$tempinfo["temperature_2m"][0];
$found=0;
for ($i=0;$i<$size;$i++) {
    if ($tempinfo["temperature_2m"]>$big) {
        $found=$i;
    }
}
echo $tempinfo["hourly"]["time"][$found]." ar ".$big." gradiem!";
?>