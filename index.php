<?php 
session_start();

if($_SERVER['QUERY_STRING']=='noname'){
    unset($_SESSION['name']);
}
$name=$_SESSION['name']?? 'guest';
$gender=$_COOKIE['gender'];
$conn = mysqli_connect('localhost','root','','ninja');
if(!$conn){
    echo 'connecion error:'. mysqli_connect_error();
}
$sql='SELECT  title, ingredients, id FROM  pizza ORDER BY created_at';
$result=mysqli_query($conn,$sql);
$pizza= mysqli_fetch_all($result, MYSQLI_ASSOC);
// print_r($pizza);
mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php echo $name;?>
(<?php echo $gender;?>)
    <h4>piza</h4>
    <?php  foreach($pizza as $pizzas):?>
        <br>
        <h6>
            
            <?php  echo htmlspecialchars($pizzas['title']) ;?>
        </h6>
        <ul>
            <?php foreach (explode(',', $pizzas['ingredients'] )as $ing):
                
            ?>
            <li> <?php echo htmlspecialchars($ing) ?></li>
            <?php endforeach; ?>
        </ul>
        <br>
        <br>
        <br>
        <a href="details.php?id=<?php echo $pizzas['id']?>">more info</a>

<?php endforeach; ?>
    
</body>
</html>