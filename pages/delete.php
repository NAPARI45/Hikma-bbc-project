<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("UPDATE posts SET post_deleted = 1, deleted_at = NOW() WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
