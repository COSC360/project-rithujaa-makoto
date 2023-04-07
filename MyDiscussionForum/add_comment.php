<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        header('Location: login.html');
        exit();
    }
    $host = "cosc360.ok.ubc.ca";
    $database = "db_36215556";
    $user = "36215556";
    $password = "36215556";

    $conn = mysqli_connect($host, $user, $password, $database);

    $error = mysqli_connect_error();
    if($error != null)
    {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    }
    else
    {
        $story_id = mysqli_real_escape_string($conn, $_POST["story_id"]);
        $username = mysqli_real_escape_string($conn, $_SESSION["username"]);
        $comment = mysqli_real_escape_string($conn, $_POST["comment"]);

        $sql = "INSERT INTO comments (story_id, username, comment) VALUES ($story_id, '$username', '$comment')";
        mysqli_query($conn, $sql);
        if ($username == 'admin1'){
        header("Location: admin.php");
        } else {
            header("Location: main.php");
        }
    }
?>
