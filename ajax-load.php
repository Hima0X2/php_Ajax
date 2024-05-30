<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'sign') or die("Connection failed");

$sql = "SELECT * FROM userinfo";
$result = mysqli_query($conn, $sql) or die("SQL Query failed");

if (mysqli_num_rows($result) > 0) {
    $output = '<table>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>
        <td>' . $row["username"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["Upassword"] . '</td>
        <td> <button class="update-btn" data-ename="' . $row["username"] . '"> Edit </button> </td>
        <td> <button class="delete-btn" data-username="' . $row["username"] . '"> Delete </button> </td>
        </tr>';
    }
    $output .= '</table>';
    mysqli_close($conn);
    echo $output;
} else {
    echo "<h2> No record found. </h2>";
}
?>
