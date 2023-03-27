<?php
    session_start();
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
    $story_id = $_GET['story_id'];

    $comments_sql = "SELECT * FROM comments WHERE story_id = $story_id";
    $comments_result = mysqli_query($conn, $comments_sql);

    echo "Comments:";
    while ($comment_row = mysqli_fetch_assoc($comments_result)) {
        echo "<p class='comment'>" . $comment_row['comment'] . " (user - ". $comment_row['username'] .") </p>";
    }

    $username = $_SESSION['username']; 
    if ($username == 'admin1'){
        $page = 'admin.php';
        echo '<a href="' . $page . '">Go to home page!</a>';
    }
    else {
        $page = 'main.php';
        echo '<a href="' . $page . '">Go to home page!</a>';
    }
}
?>
