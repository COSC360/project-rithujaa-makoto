<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Discussion Forum/Edit Profile</title>
	<link rel="stylesheet" href="css/edit_story.css">
</head>
<body>

	<header>
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
				if (!isset($_SESSION['username'])) {
					header("Location: guest.php");
					exit();
				} else {
                    $title = $_SESSION['title']; 
					$sql = "SELECT * FROM stories WHERE title = '$title'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
                        $username = $row['username'];
						$story = $row['story'];
					}
                }
                    if(isset($_POST['submit'])){
                        $new_title = $_POST['title'];
                        $new_story = $_POST['story'];
                        $update_query = "UPDATE stories SET title='$new_title', story='$new_story'";
                        
                        if(mysqli_query($conn, $update_query)){
                            header("Location: admin.php");
                            exit();
                        }
                        else{
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    }
			}
		?>
		<h1>Edit Story</h1>
	</header>
	<main>
		<section class="story">
			<h2>Edit Story for <?php echo $username; ?></h2>
			<form method="post">
				<label for="title">Title:</label>
				<input type="text" id="title" name="title" value="<?php echo $title; ?>" required>
				
				<label for="story">Story:</label>
				<input type="text" id="story" name="story" value="<?php echo $story; ?>" required>
				
				<input type="submit" name="submit" value="Save Changes">
			</form>
			<a href="admin.php">Cancel</a>
		</section>
	</main>
	<footer>
		
	</footer>
</body>
</html>