<?php 
    // import database config
    include "dbconfig.php";
    // Check if there is an 'id' field in the GET requests
    // Learn about superglobals at: https://www.php.net/manual/en/language.variables.superglobals.php
    if(isset($_GET['id'])) {
        // Typecast into type integer using intval()
        $id = intval($_GET['id']);
        /*
         * Prepare a SQL DELETE statement using a placeholder (?)
         * This prevents SQL injection — a type of attack where a malicious user tries to
         * manipulate your SQL query by injecting harmful SQL code through user input.
         *
         * Example of SQL Injection (if not using prepared statements):
         *   URL: delete.php?id=1 OR 1=1
         *   This could delete all rows if the query is not safely handled.
         *
         * Prepared statements avoid this by separating the query structure from the data.
         */
        $query = $conn->prepare("DELETE from posts WHERE id = ?");
        $query->bind_param("i", $id);
        // Execute the query and redirect to main page (index.php) if successful, else display an error
        if($query->execute()) {
            header("Location: index.php");
            exit();
        } else { echo "Error deleting post: " . $conn->error; }
        $query->close();
    }
    $conn->close();
?>