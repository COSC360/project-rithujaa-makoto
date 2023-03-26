<!DOCTYPE html>
<html>

<?php

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

    if (!isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["username"]) || !isset($_POST["email"]) || !isset($_POST["password"])) {
        echo "All fields are required. Please fill out the form completely.";
    } else {
        $firstname = MySQLi_real_escape_string($conn, $_POST["firstname"]);
        $lastname = MySQLi_real_escape_string($conn, $_POST["lastname"]);
        $username = MySQLi_real_escape_string($conn, $_POST["username"]);
        $email = MySQLi_real_escape_string($conn, $_POST["email"]);
        $password = MySQLi_real_escape_string($conn, md5($_POST["password"])); 

        session_start();
        $_SESSION['username'] = $username;

        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $message = "Username/email already exists!";
            echo "<script type='text/javascript'>alert('$message'); </script>";
            header("refresh:0; url=signup.html");
            exit();
        } else {
            $sql = "INSERT INTO users (firstName, lastName, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                header("Location: main.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
} 

mysqli_free_result($result);
mysqli_close($conn);
}
?>
</html>