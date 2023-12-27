<?php

 
$conn = mysqli_connect('localhost','root','','ninja');
if(!$conn){
    echo 'connecion error:'. mysqli_connect_error();
}
$title=$email=$ingredients="";
$errors= array('email'=>'', 'title'=>'','ingredients'=>'');
if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $errors['email'] ='an email is required';

    }else{
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be a valid email adress';
        }
    
    }
    if(empty($_POST['title'])){
        $errors['title'] = 'an title is required';

    }else{
        $title=$_POST['title'];
        if(!preg_match('/ ^[a-zA-Z\s]+$/',$title)){
            $errors['title'] ="title must be letter and spaces only";
        }
    }
    if(empty($_POST['ingredients'])){
        $errors['ingredients'] ='an ingredients is required';

    }else{
        $ingredients=$_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
            $errors['ingredients'] =  "ingredients must be omma spaced";
        }

        
     
    }
    if(array_filter($errors)){

    }else{


        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $title=mysqli_real_escape_string($conn,$_POST['$title']);
        $ingredients=mysqli_real_escape_string($conn,$_POST['ingredients']);


        $sql="INSERT INTO pizza(title, ingredients,email) VALUES('$title','$ingredients','$email')";
        if(mysqli_query($conn,$sql)){
            header('location:index.php');

        }else{
        echo "error". mysqli_error($conn);
        }

        
        
         
    }
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
    <button><a href="index.php">add a pizza</a></button>
    <form action="addpizza.php" method="post">
        <label for="email">email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email)?>">
        <br>
        <br>
        <?php echo  $errors['email']?>
        <br>
        <br>
        <label for="title">title</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
        <br>
        <br>
        <?php echo $errors['title']?>
        <br>
        <br>
        <label for="ingredients">ingredients</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients)?>">
        <br>
        <br>
        <?php echo $errors['ingredients']?>
        <br>
        <br>
        <button name="submit">submit</button>

    </form>
    
</body>
</html>