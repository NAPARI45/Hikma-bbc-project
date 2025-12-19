<?php
include 'config.php';

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = (int) $_GET['id'];

// Current timestamp
$deletedAt = date('Y-m-d H:i:s');

// Soft delete category
$sql->update(
    "category",
    ["category_deleted", "deleted_at"],
    [1, $deletedAt],
    "id = ?",
    [$id]
);

header("Location: category.php");
exit;
