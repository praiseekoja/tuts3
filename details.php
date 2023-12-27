<?php
$conn = mysqli_connect('localhost','root','','ninja');
if(!$conn){
    echo 'connecion error:'. mysqli_connect_error();
}
if(isset($_POST['delete'])){
    $id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql="DELETE FROM pizza WHERE id=$id_to_delete";
    if(mysqli_query($conn,$sql)){
        header('location: index.php');
    }else{
        echo 'query error:'.mysqli_error($conn);
    }
}
if(isset($_GET['id'])){
$id=mysqli_real_escape_string($conn,$_GET['id']);  
}
$sql="SELECT * FROM pizza WHERE id=$id";
$result=mysqli_query($conn,$sql);
$pizza=mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
print_r($pizza)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>details</h3>
    <br>
    <p>
       <?php if($pizza):?>
        <?php echo htmlspecialchars($pizza['title']) ?> 
        <br>
        <?php echo htmlspecialchars($pizza['email']) ?> <br>
        <?php echo htmlspecialchars($pizza['created_at']) ?> <br>
        <?php echo htmlspecialchars($pizza['ingredients']) ?> <br>
         
       <?php else:?> 
        <h3>No such pizza found</h3>
       <?php endif;?> 
    </p>
    <form action="details.php" method="post">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']?>">
        <input type="submit" name="delete" value="delete">
    </form>



    
</body>
</html>