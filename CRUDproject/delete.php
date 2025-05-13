<?php
require_once 'db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Prepare and bind
    $stmt = $connection->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        die("Error deleting record: " . $stmt->error);
    }
    
    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>
