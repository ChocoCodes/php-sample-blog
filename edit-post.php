<?php 
    include "dbconfig.php";

    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $query = $conn->prepare("SELECT * FROM posts WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();
        $result = $query->get_result();
        $post = $result->fetch_assoc();

        if(!$post) {
            echo "Post not found";
            exit;
        }

        $query->close();
    } else {
        echo "No ID Provided";
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        $query = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        $query->bind_param("ssi", $title, $content, $id);

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
    <title>Edit Post</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="add-post">
    <h1>Edit Post</h1>
    <form method="post">
        <input type="text" name="title" id="title" placeholder="Post Title" value="<?php echo htmlspecialchars($post['title']);?>" required/>
        <textarea name="content" id="content" rows="10" placeholder="Add Content Here"><?php echo htmlspecialchars(trim($post['content']));?></textarea>
        <button type="submit">Edit</button>
    </form>
</div>
</body>
</html>