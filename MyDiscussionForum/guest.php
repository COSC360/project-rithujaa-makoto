<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Discussion Forum/main</title>
	<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>
    <body>
        <nav>
            <h1 class="title"> My Discussion Forum</h1></br>
            <ul>
                <li><a href="guest.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="signup.html">Sign up</a></li>
            </ul>
        </nav>
        <div class="container">
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
                $sql = "SELECT username, title, story FROM stories";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="container">';
                    echo '<div class="post">';
                    echo '<p class="username">' . $row["username"] . '</p>';
                    echo '<div class="header">';
                    echo '<h1><a href="#" class="storytitle">' . $row["title"] . '</a></h1>';
                    echo '</div>';
                    echo '<p class="story">' . $row["story"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }

                mysqli_close($conn);
            }
        ?>
        </div>
    </body>
    </html>
    


