<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Discussion Forum/Edit Profile</title>
	<link rel="stylesheet" href="css/edit_story.css">
</head>
<body>
    <div class="container">
        <?php
        session_start();

        $host = "cosc360.ok.ubc.ca";
        $database = "db_36215556";
        $user = "36215556";
        $password = "36215556";

        $conn = mysqli_connect($host, $user, $password, $database);

        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
        } else {
            if (isset($_POST['edit-btn'])) {
                $story_id = $_POST['story_id'];
                $sql = "SELECT * FROM stories WHERE story_id='$story_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
				<main>
					<section class="story">
						<h2>Edit Story for <?php echo $_SESSION['username']; ?></h2>
						<form action="" method="post">
                    		<input type="hidden" name="story_id" value="<?php echo $story_id ?>">
                    		<label for="title">Title:</label>
                    		<input type="text" name="title" id="title" value="<?php echo $row['title'] ?>"><br>
                    		<label for="story">Story:</label>
                    		<textarea name="story" id="story"><?php echo $row['story'] ?></textarea><br>
                    		<input type="submit" value="Save">
                		</form>
						<?php if ($_SESSION['username'] == 'admin1'){?>
							<a href="admin.php">Cancel</a>
						<?php } else { ?>
							<a href="main.php">Cancel</a> <?php } ?>

		      		</section>
				</main>
            <?php
            }
			if (isset($_POST['title']) && isset($_POST['story']) && isset($_POST['story_id'])) {
				$title = $_POST['title'];
				$story = $_POST['story'];
				$story_id = $_POST['story_id'];
				$sql = "UPDATE stories SET title='$title', story='$story' WHERE story_id='$story_id'";
				mysqli_query($conn, $sql);
				if ($_SESSION['username'] == 'admin1'){
					header("Location: admin.php");
				} else {
					header("Location: main.php");
				}
			} 
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
