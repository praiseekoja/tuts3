<?php 
class User{
    public $username="cheto";
    public $email="cheto@gmail.com";
    public function addfriend(){
        return "$this->email added a new friend";
    }


}
$UserOne = new User();
$UserTwo = new User();
echo $UserOne->username;
echo $UserOne->email;
echo $UserTwo->username;
echo $UserTwo->email;
echo $UserTwo->addfriend();


?>