<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Discussion Forum/story</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/poststory.css">
</head>
<body>
    <div id="post-story" class="post-story">
        <h2>Post your story</h2>
        <form method="post" action="post-story.php">
            <label for="story-title">Title:</label>
            <input type="text" id="story-title" name="story-title">
            
            <label for="story-text">Story:</label>
            <textarea id="story-text" name="story-text"></textarea>
            <button type="submit">Submit</button>
        </form>

        <?php
        $referrer = $_SERVER['HTTP_REFERER'];
        echo " <a href=\"$referrer\">Go to home page!</a>";
        ?>
        
      </div>
</body>
</html>