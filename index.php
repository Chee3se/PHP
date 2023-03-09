<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
//api
$tempinfo = @json_decode(file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=57.31&longitude=25.36&hourly=temperature_2m,snowfall,snow_depth,cloudcover,windspeed_10m&start_date=2023-03-09&end_date=2023-03-24"), true);

//1. uzd
//values
echo "Siltakais laiks bus: ";
$size=24;
//24 jo 24 stundas sodien
$bigt[]=$tempinfo["hourly"]["temperature_2m"][0];
$bigt[]=$tempinfo["hourly"]["time"][0];
$smallt[]=$tempinfo["hourly"]["temperature_2m"][0];
$smallt[]=$tempinfo["hourly"]["time"][0];
$bigm[]=$tempinfo["hourly"]["cloudcover"][0];
$bigm[]=$tempinfo["hourly"]["time"][0];
$smallm[]=$tempinfo["hourly"]["cloudcover"][0];
$smallm[]=$tempinfo["hourly"]["time"][0];
$bigv[]=$tempinfo["hourly"]["windspeed_10m"][0];
$bigv[]=$tempinfo["hourly"]["time"][0];
$smallv[]=$tempinfo["hourly"]["windspeed_10m"][0];
$smallv[]=$tempinfo["hourly"]["time"][0];
$snigs[]=$tempinfo["hourly"]["snowfall"][0];
$snigs[]=$tempinfo["hourly"]["time"][0];
//check
for ($i=0;$i<$size;$i++) {
    if ($tempinfo["hourly"]["temperature_2m"][$i]>$bigt[0]) {
        $bigt[0]=$tempinfo["hourly"]["temperature_2m"][$i];
        $bigt[1]=$tempinfo["hourly"]["time"][$i];
    }
    if ($tempinfo["hourly"]["temperature_2m"][$i]<$smallt[0]) {
        $smallt[0]=$tempinfo["hourly"]["temperature_2m"][$i];
        $smallt[1]=$tempinfo["hourly"]["time"][$i];
    }
    if ($tempinfo["hourly"]["cloudcover"][$i]>$bigm[0]) {
        $bigm[0]=$tempinfo["hourly"]["cloudcover"][$i];
        $bigm[1]=$tempinfo["hourly"]["time"][$i];
    }
    if ($tempinfo["hourly"]["cloudcover"][$i]<$smallm[0]) {
        $smallm[0]=$tempinfo["hourly"]["cloudcover"][$i];
        $smallm[1]=$tempinfo["hourly"]["time"][$i];
    }
    if ($tempinfo["hourly"]["windspeed_10m"][$i]>$bigv[0]) {
        $bigv[0]=$tempinfo["hourly"]["windspeed_10m"][$i];
        $bigv[1]=$tempinfo["hourly"]["time"][$i];
    }
    if ($tempinfo["hourly"]["windspeed_10m"][$i]<$smallv[0]) {
        $smallv[0]=$tempinfo["hourly"]["windspeed_10m"][$i];
        $smallv[1]=$tempinfo["hourly"]["time"][$i];
    }
    if ($tempinfo["hourly"]["snowfall"][$i]>$snigs[0]) {
        $snigs[0]=$tempinfo["hourly"]["snowfall"][$i];
        $snigs[1]=$tempinfo["hourly"]["time"][$i];
    }
}
//out
echo "Siltakais laiks bus: ".substr($bigt[1], 11)." ar ".$bigt[0]." gradiem! <br>";
echo "Aukstakais laiks bus: ".substr($smallt[1], 11)." ar ".$smallt[0]." gradiem! <br>";
echo "Visvairak makoni bus: ".substr($bigm[1], 11).", ".$bigm[0]."%. <br>";
echo "Vismazak makoni bus: ".substr($smallm[1], 11).", ".$smallm[0]."%. <br>";
echo "Vislielakais vejs bus: ".substr($bigv[1], 11)." ar ".$bigv[0]."km/h. <br>";
echo "Vismazakais vejs bus: ".substr($smallv[1], 11)." ar ".$smallv[0]."km/h. <br>";
echo "Visvairak snigs bus: ".substr($snigs[1], 11)." ar ".$snigs[0]."cm kartu. <br>";

//2. uzd
$size=count($tempinfo["hourly"]["time"]);
$foundtime=$tempinfo["hourly"]["time"][0];
$valuef=0;
$valued=0;

for ($i=0;$i<$size;$i++) {
    if (
    $tempinfo["hourly"]["temperature_2m"][$i]<=0&&
    $tempinfo["hourly"]["snowfall"][$i]>$valuef&&
    $tempinfo["hourly"]["snow_depth"][$i]>$valued
    ) {
        $valuef=$tempinfo["hourly"]["snowfall"][$i];
        $valued=$tempinfo["hourly"]["snow_depth"][$i];
        $foundtime=$tempinfo["hourly"]["time"][$i];
    }
}
echo "<br><br>".substr($foundtime, 8, 2).". datuma bus visvairak sniegs u temperatura bus zem 0!";
//3. uzd

$foundtime=$tempinfo["hourly"]["time"][0];
$valuet=0;
$valued=100;
$valuev=100;
for ($i=0;$i<$size;$i++) {
    if (
    $tempinfo["hourly"]["temperature_2m"][$i]>$valuet&&
    $tempinfo["hourly"]["cloudcover"][$i]<$valued&&
    $tempinfo["hourly"]["windspeed_10m"][$i]<$valuev
    ) {
        $valuet=$tempinfo["hourly"]["temperature_2m"][$i];
        $valued=$tempinfo["hourly"]["cloudcover"][$i];
        $valuev=$tempinfo["hourly"]["windspeed_10m"][$i];
        $foundtime=$tempinfo["hourly"]["time"][$i];
    }
}
echo "<br><br>".substr($foundtime, 8, 2).". datuma bus vislabakais laiks.";
?>
























<?php
/*
//Temperaturas
//values
echo "Siltakais laiks bus: ";
$size=24;
//24 jo 24 stundas sodien
$foundb=0;
$founds=0;
$big[]=$tempinfo["hourly"]["temperature_2m"][$foundb];
$big[]=$tempinfo["hourly"]["time"][$foundb];
$small[]=$tempinfo["hourly"]["temperature_2m"][$founds];
$small[]=$tempinfo["hourly"]["time"][$founds];
//check
for ($i=0;$i<$size;$i++) {
    if ($tempinfo["hourly"]["temperature_2m"][$i]>$big[0]) {
        $foundb=$i;
        $big[0]=$tempinfo["hourly"]["temperature_2m"][$foundb];
        $big[1]=$tempinfo["hourly"]["time"][$foundb];
    }
    if ($tempinfo["hourly"]["temperature_2m"][$i]<$small[0]) {
        $founds=$i;
        $small[0]=$tempinfo["hourly"]["temperature_2m"][$founds];
        $small[1]=$tempinfo["hourly"]["time"][$founds];
    }
}
//out
echo "Siltakais laiks bus: ".$big[1]." ar ".$big[0]." gradiem!";
echo "Aukstakais laiks bus: ".$small[1]." ar ".$small[0]." gradiem!";
//Makoni
*/
?>