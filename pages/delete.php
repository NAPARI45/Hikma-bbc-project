<?php
include 'config.php';
include 'eg.php';

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare((new sqlcommands())->update("posts", ["post_deleted", "deleted_at"], ["1", "NOW()"], "id =?"));
$stmt->execute([$id]);

header("Location: index.php");
exit;
