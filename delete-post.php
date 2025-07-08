<?php 
    include "dbconfig.php";
    if(isset($_GET['id'])) {
        $id = intval($_GET['id']);

        $query = $conn->prepare("DELETE from posts WHERE id = ?");
        $query->bind_param("i", $id);

        if($query->execute()) {
            header("Location: index.php");
            exit();
        } else { echo "Error deleting post: " . $conn->error; }
        $query->close();
    }
    $conn->close();
?>