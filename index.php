<?
include_once 'setting.php';
echo($_SERVER['REQUEST_URI']."<br>");

$CONNECT = mysqli_connect(HOST, USER, PASS, DB) or die("Error ".mysqli_error($CONNECT));
$workings = mysqli_fetch_row(mysqli_query($CONNECT, "SELECT * FROM `workings` WHERE `id`<10"));



if($CONNECT){echo "OK";} else {echo "NO";}
//$workings_json = json_encode($workings); 
//setcookie("workingsJson", "workings_json");

if ($_SERVER['REQUEST_URI'] == '/') {
$Page = 'index';
$Module = 'index';
} else {
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, ' /'));
$Page = array_shift($URL_Parts);
$Module = array_shift($URL_Parts);


if (!empty($Module)) {
$Param = array();
for ($i = 0; $i < count($URL_Parts); $i++) {
$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
}
} else $Module = 'main';


}
//echo (string)$_SERVER['REQUEST_URI']."<br>";
echo "<br>".$Page."  ".$Module."<br>";
echo "work";

if(isset($_POST['fname']) && isset($_POST['pro'])){
    echo "Is it POST";
}

if ($Page=="index"){include 'public/main.php';}
if ($Page=="seed"){include 'public/Seed.php';}
//include_once 'public/main.php';
//echo (string)$Row;




?>