<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Discussion Forum/profile</title>
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
			}
		?>
		<h1>Profile Page</h1>
	</header>
	<main>
		<?php
		if ($username == 'admin1'){
			$image = "images/admin.png";
			echo '<img src="' . $image . '" alt="Admin Image">';
		}
		?>
		<section class="profile">
			<h2>Welcome, <?php echo $username; ?></h2>
		
		<div class="profile-info">
			<h3>About Me</h3>
			<p>First name: <?php echo $firstname; ?></p>
			<p>Last name: <?php echo $lastname; ?></p>
			<p>Email: <?php echo $email; ?></p>
			<form action="edit_profile.php" method="post">
  				<button type="submit">Edit Profile</button>
  				<button name="delete" type="submit">Delete Profile</button>
			</form>

		</div>
		<?php
		if ($username == 'admin1'){
			$page = 'admin.php';
			echo '<a href="' . $page . '">Go to home page!</a>';
		}
		else {
			$page = 'main.php';
			echo '<a href="' . $page . '">Go to home page!</a>';
		}
		?>
		<?php mysqli_close($conn); ?>
		</section>
	</main>
	<footer>
		
	</footer>
</body>
</html>
