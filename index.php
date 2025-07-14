<?php 
    include "dbconfig.php";
    $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample PHP Blog</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header class="header">
        <h1>Sample Blog</h1>
        <a href="new-post.php">Add Post</a>
    </header>
    <!-- HTML Comment
    This section displays all blog posts from the database.

    - If there are posts (i.e., $result->num_rows > 0), it loops through each post using fetch_assoc().
    - Each post is shown inside a styled <div class="post-container">.
    - The title and content are escaped using htmlspecialchars() to prevent XSS - Scripting attack wherein users can inject javascript code to manipulate the webpage
    - The created_at timestamp is shown as the post date.
    
    - If no posts exist, it shows a fallback message with a link to the "Add New Post" form.
    -->
    <div class="main-wrapper">
        <?php if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="post-container" data-id="<?php echo $row['id']; ?>">
                    <div class="post-header">
                        <h2>Title: <?php echo htmlspecialchars($row['title'])?> </h2>
                        <div class="post-actions">
                            <a href="edit-post.php?id=<?php echo $row['id']; ?>">✎</a>
                            <a href="delete-post.php?id=<?php echo $row['id']; ?>">&times;</a>
                        </div>
                    </div>
                    <p>Text: <?php echo htmlspecialchars($row['content'])?> </p>
                    <small> Posted on: <?php echo $row['created_at']?> </small>
                </div> 
            <?php endwhile; ?>
        <?php else: ?>
            <p>No posts yet. Be the first to <a href="new-post.php">add one</a>!</p>
        <?php endif; ?>
    </div>
</body>
</html>