<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width" >
    <title></title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

</head>
<body>
    <?php
include_once 'setting.php';

//$CONNECT = mysqli_connect(HOST, USER, PASS, DB) or die("Error ".mysqli_error($CONNECT));

if(isset($_POST['name']) && isset($_POST['company'])){
    
    $link = mysqli_connect(HOST, USER, PASS, DB) 
        or die("Ошибка " . mysqli_error($link)); 
    // экранирования символов для mysql
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $age = htmlentities(mysqli_real_escape_string($link, $_POST['age']));
     
    // создание строки запроса
    $query ="INSERT INTO `workings`(`word`, `transfer`) VALUES('$name','$age')";
      
   // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>
<h2>Добавить новую модель</h2>
<form method="POST">
<p>Имя:<br> 
<input type="text" name="name" /></p>
<p>Возраст: <br> 
<input type="text" name="age" /></p>
<input type="submit" value="Добавить">
</form>
</body>
</html>