<?php
include 'config.php'; 

if (!isset($_GET['id'])) { 
    die("Invalid request"); 
} 

$id = (int) $_GET['id'];

$sql->update("users", ["user_deleted", "deleted_at"], ["1", "date('Y-m-d H:i:s')"], "id =?", [$id]);
 
header("Location: tables.php"); 
exit;