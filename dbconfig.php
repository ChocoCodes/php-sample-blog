<?php 
    $host = 'localhost';
    $db = 'blog_db';
    $user = 'root';
    $pass = ''; // XAMPP default: no password for 'root' user

    /**
     * Create a new MySQLi connection to the database
     * 
     * Syntax: new mysqli(host, username, password, database)
     * 
     * @param string $host     - Hostname where MySQL is running (usually 'localhost')
     * @param string $user     - MySQL username
     * @param string $pass     - MySQL password
     * @param string $db       - Name of the database to connect to (must already exist)
     */
    $conn = new mysqli($host, $user, $pass, $db);

    // Check if a connection is unsuccessful
    if ($conn->connect_error) { 
        die("Error connecting to DB: " . $conn->connect_error);
     }
?>