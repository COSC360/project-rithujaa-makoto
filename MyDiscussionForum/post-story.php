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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $title = MySQLi_real_escape_string($conn, $_POST['story-title']);
    $story = MySQLi_real_escape_string($conn, $_POST['story-text']);

    $_SESSION['title'] = $title;

    $sql = "INSERT INTO stories (username, title, story) VALUES ('$username', '$title', '$story')";
    if (mysqli_query($conn, $sql)) {
        if ($username == 'admin1'){
            header('Location: admin.php');
            exit();
        } else {
            header('Location: main.php');
            exit();
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

}
?>
</html>

