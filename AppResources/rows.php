<?php

$link = mysqli_connect("localhost", "root", "", "mate");
$func = $_GET["func"];

$consulta = "SELECT * FROM users ORDER BY points DESC, id ASC";
$consulta1 = "DELETE FROM users";

if($func == 1){
$resultado = mysqli_query($link, $consulta);




while($rows=mysqli_fetch_array($resultado)){
echo "<h1 class='usrName'>".$rows[1]."</h1>";
echo "<h1 class='usrPoints bg-light'><span class='circleRest'>".$rows[2]."</span><span class='icon-crown'></span></h1></br>";
echo "<span class='time bg-warning text-light'>".$rows[3]."s</span>";
} 
}
else if($func == 2){
    mysqli_query($link, $consulta1);
}
else if($func == 3){
$start = $_GET["start"];
$sql1 = "DELETE FROM count";
$sql2 = "INSERT INTO count (seconds) VALUES ('$start')";
mysqli_query($link, $sql1); 
mysqli_query($link, $sql2);
}
else if($func == 4){
    $nombre = $_GET["name"];
$puntos = $_GET["pts"];
$time = $_GET["time"];
$milis = $_GET["milis"];
$sql3 = "INSERT INTO users (id, name, points, time) VALUES ('','$nombre', '$puntos', '$time')";
mysqli_query($link, $sql3);
}
else if($func == 5){
    $consulta = "SELECT * FROM count";
$resultado = mysqli_query($link, $consulta);

while($rows=mysqli_fetch_array($resultado)){
echo $rows[0];
} 
}else if($func == 6){
    $rm = "DELETE FROM count";
    $stop = "INSERT INTO count (seconds) VALUES ('0')";
    mysqli_query($link, $rm);
    mysqli_query($link, $stop);
}

mysqli_close($link);

?>