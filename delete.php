<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check if the connection was successful
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "DELETE FROM clients where id=$id";

    // Execute the SQL query
    if ($connection->query($sql) === TRUE) {
        // Deletion was successful
    } else {
        // Deletion failed, handle the error
        echo "Error deleting record: " . $connection->error;
    }

    // Close the database connection
    $connection->close();
}

header("location: /myshop/index.php");
exit;
?>
