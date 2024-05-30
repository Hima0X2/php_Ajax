<?php
$conn=mysqli_connect('localhost:3307','root','','sign') or die("Connection failed");
$username=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["Upassword"];
if(!($username==""||$email==""||$pass=="")){
$sql="INSERT INTO `userinfo`(`username`, `email`, `Upassword`) VALUES ('{$username}','{$email}','{$pass}')";
}
if(mysqli_query($conn,$sql)){
echo 1;
}
else{
    echo 0;
}
?>