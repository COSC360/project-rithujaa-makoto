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
                <li><a href="main.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="login.html">Log out</a></li>
            </ul>
            <p id="post"> <a href="poststory.php" class="post-story-link"> Post a story!</a> </p>
        </nav>

        <div class="container">
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
                $sql = "SELECT * FROM stories";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) { 
                    if ($_SESSION['username'] == $row["username"]) {
                        $is_author = true;
                    } else {
                        $is_author = false;
                    }
                    
                    if ($is_author){
                    ?>
                    <div class="container">
                    <div class="post">
                        <p class="username"><?php echo $row["username"]; ?></p>
                        <div class="header">
                            <h1><a href="#" class="storytitle"><?php echo $row["title"]; ?></a></h1>
                        </div>
                        <p class="story"><?php echo $row["story"]; ?></p>
                    </div>
                    <div class="likes-comments">
                        <div class="comments">
                                <a href="view_comments.php?story_id=<?php echo $row['story_id']; ?>">Comment</a>
                                <form method="post" action="add_comment.php">
                                    <input type="hidden" name="story_id" value="<?php echo $row["story_id"]; ?>">
                                    <input type="text" name="comment" placeholder="Add a comment...">
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        <div class="delete">
                            <form method="post" action="">
                                <input type="hidden" name="story_id" value="<?php echo $row["story_id"]; ?>">
                                <button type="submit" name="delete-btn">Delete</button>
                            </form>
                        </div>
                        <div class="edit">
                            <form action="edit_story.php" method="post">
                                <input type="hidden" name="story_id" value="<?php echo $row["story_id"]; ?>">
                                <button type="submit" name="edit-btn">Edit story</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php }
                else { ?>
                    <div class="container">
                        <div class="post">
                            <p class="username"><?php echo $row["username"]; ?></p>
                            <div class="header">
                                <h1><a href="#" class="storytitle"><?php echo $row["title"]; ?></a></h1>
                            </div>
                            <p class="story"><?php echo $row["story"]; ?></p>
                        </div>
                        <div class="likes-comments">
                            <div class="comments">
                                <a href="view_comments.php?story_id=<?php echo $row['story_id']; ?>">Comment</a>
                                <form method="post" action="add_comment.php">
                                    <input type="hidden" name="story_id" value="<?php echo $row["story_id"]; ?>">
                                    <input type="text" name="comment" placeholder="Add a comment...">
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
            } 
            if(isset($_POST['delete-btn'])) {
                $story_id = $_POST['story_id'];
                $delete_sql = "DELETE FROM stories WHERE story_id = '$story_id'";
                if (mysqli_query($conn, $delete_sql)){
                    echo '<script>window.location.reload()</script>';
                    exit();
                }
            }
                
            mysqli_close($conn);
                } ?>
        </div>
    </body>
    </html>
    

    


