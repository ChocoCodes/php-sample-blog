<?php 
    include "dbconfig.php";
    /**
     * Handles new blog post submissions.
     * 
     * - Includes the database configuration from dbconfig.php
     * - Checks if the request method is POST (form was submitted)
     * - Retrieves and trims the title and content from the form
     * - Uses a prepared statement to securely insert the post into the database
     *   (prevents SQL injection)
     * - If the insert is successful, redirects the user back to the homepage (index.php)
     * - Otherwise, displays the error message
     */
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        $query = $conn->prepare("INSERT INTO posts(title, content) VALUES(?,?)");
        $query->bind_param("ss", $title, $content);

        if($query->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error: ", $query->error;
        }
        
        $query->close();
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="add-post">
    <h1>Add New Post</h1>
    <form method="post">
        <input type="text" name="title" id="title" placeholder="Post Title" required/>
        <textarea name="content" id="content" rows="10" placeholder="Add Content Here"></textarea>
        <button type="submit">Add</button>
    </form>
</div>
</body>
</html>