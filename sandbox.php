<?php
session_start();
if(isset($_POST['submit'])){
    session_start();
    $_SESSION['name']=$_POST['name'];
    echo $_SESSION['name'];
    header('location: index.php');
    setcookie('gender', $_POST['gender'], time()+ 84000);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="name">
    <select name="gender" id="">
        <option value="male">male</option>
        <option value="female">female</option>
    </select>
    <input type="submit" value="submit" name=submit>
</form>
    
</body>
</html>