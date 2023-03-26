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
              if (isset($_POST['search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT title, story FROM stories WHERE title LIKE '%$search%' OR story LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<li class="search-result">';
                  echo '<h3><a href="#">' . $row["title"] . '</a></h3>';
                  echo '<p>' . $row["story"] . '</p>';
                  echo '<p class="metadata">Likes: 10 | Comments: 5</p>';
                  echo '</li>';
                }
              }
            }

            mysqli_close($conn);
            ?>
        </ul>
        <?php
        $referrer = $_SERVER['HTTP_REFERER'];
        echo " <a href=\"$referrer\">Go to home page!</a>";
        ?>
        
    </main>
    <footer>
    </footer>
</body>
</html>
