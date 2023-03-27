<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h2>Search for Items/Posts</h2>
        <form action="#" method="post">
            <input type="text" placeholder="Search by keyword" name="search">
            <button type="submit">Search</button>
        </form>
        <ul class="search-results">
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
              if (isset($_POST['search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT title, story, username FROM stories WHERE title LIKE '%$search%' OR story LIKE '%$search%' OR username LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
              
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<li class="search-result">';
                  echo '<h3><a href="#">' . $row["title"] . '</a></h3>';
                  echo '<p>By: ' . $row["username"] . '</p>';
                  echo '<p>' . $row["story"] . '</p>';
                  echo '</li>';
                }
              }              
            }

            mysqli_close($conn);
            ?>
        </ul>
    </main>
    <footer>
    </footer>
</body>
</html>
