<!DOCTYPE html>
<html>

<?php
session_start();
$host = "localhost";
$database = "cosc360-project";
$user = "webuser";
$password = "P@ssw0rd";

$conn = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["username"]) || !isset($_POST["password"])) {
        echo "Both username and password are required. Please fill out the form completely.";
    } else {
        $username = MySQLi_real_escape_string($conn, $_POST["username"]);
        $password = MySQLi_real_escape_string($conn, md5($_POST["password"])); 

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            if ($username == 'admin1') {
                header("Location: admin.php"); 
            } else {
                header("Location: main.php");
            }
            exit();
        } else {
            $message = "Invalid username/password";
            echo "<script type='text/javascript'>alert('$message'); </script>";
            header("refresh:0; url=login.html");
            exit();
        }
    }
} else {
    echo "Invalid request method.";
}
mysqli_free_result($results);
mysqli_close($conn);
}
?>
</html>