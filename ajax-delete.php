<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'sign') or die("Connection failed");
$username = mysqli_real_escape_string($conn, $_POST["username"]); // Sanitize input
$sql = "DELETE FROM userinfo WHERE username = '$username'"; // Properly quote the string

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
mysqli_close($conn);
?>
