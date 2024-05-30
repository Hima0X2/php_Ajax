<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'sign') or die("Connection failed");

if(isset($_POST["username"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $sql = "SELECT * FROM userinfo WHERE username = '$username'";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

    if(mysqli_num_rows($result) > 0 ) {
        $row = mysqli_fetch_assoc($result);
        echo "<tr>
            <td width='90px'>Email</td>
            <td><input type='text' id='edit-fname' value='{$row["email"]}'>
                <input type='hidden' id='edit-username' value='{$row["username"]}'>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='text' id='edit-lname' value='{$row["Upassword"]}'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' id='edit-submit' value='save'></td>
        </tr>";
    } else {
        echo "<h2>No Record Found.</h2>";
    }
}

mysqli_close($conn);
?>
