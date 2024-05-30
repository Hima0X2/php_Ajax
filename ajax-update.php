<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'sign') or die("Connection failed");
$username = $_POST["username"];
$email=$_POST["email"];
$pass=$_POST["Upassword"];
$sql = "UPDATE userinfo SET email = '{$email}',Upassword = '{$pass}' WHERE username = '$username'";
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
mysqli_close($conn);
?>
