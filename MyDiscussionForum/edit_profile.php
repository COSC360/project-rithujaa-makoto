<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Discussion Forum/Edit Profile</title>
	<link rel="stylesheet" href="css/profilepage.css">
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
					$username = $_SESSION['username']; 
					$sql = "SELECT * FROM users WHERE username = '$username'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						$firstname = $row['firstName'];
						$lastname = $row['lastName'];
						$email = $row['email'];
					}
				}
				
				if(isset($_POST['submit'])){
				    $new_firstname = $_POST['firstname'];
				    $new_lastname = $_POST['lastname'];
				    $new_email = $_POST['email'];
				    $sql = "SELECT * FROM users WHERE email = '$new_email'";
                    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $message = "email already exists!";
            echo "<script type='text/javascript'>alert('$message'); </script>";
            header("refresh:0; url=edit_profile.php");
            exit();
        } else {
				    $update_query = "UPDATE users SET firstName='$new_firstname', lastName='$new_lastname', email='$new_email' WHERE username='$username'";
				    
				    if(mysqli_query($conn, $update_query)){
				        header("Location: profile.php");
				    }
				    else{
				        echo "Error updating record: " . mysqli_error($conn);
				    }
                }
				}
			}
		?>
		<h1>Edit Profile Page</h1>
	</header>
	<main>
		<section class="profile">
			<h2>Edit Profile for <?php echo $username; ?></h2>
			<form method="post">
				<label for="firstname">First Name:</label>
				<input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
				
				<label for="lastname">Last Name:</label>
				<input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
				
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
				
				<input type="submit" name="submit" value="Save Changes">
			</form>
			<a href="profile.php">Cancel</a>
		</section>
	</main>
	<footer>
		
	</footer>
</body>
</html>
