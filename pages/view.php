<?php include 'config.php';
$id = (int) $_GET['id'];

if (! is_int($id)) {
    exit('Invalid value passed');
}

if (! $id) {
    exit('Incorrect id');
}

$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $post['title'];
$summary = $post['summary'];
$image_path = $post['image_path'];
$article = $post['article'];

?>
<?php include 'header.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&display=swap');

        body {
          font-family: "Merriweather", sans-serif, Times;
        }
        .bold {
          font-weight: 800;
          font-size: 15px;
        }
    </style>   
</head>
<body>


    <div class="container mt-5">

        <div class="row justify-content-center ">
                <div class="col-12 col-lg-8">
                    <h1 class="text-start fw-bold mb-4"><?php echo htmlspecialchars($title)?></h1>
                </div>
                <img src="<?= htmlspecialchars($image_path); ?>" alt="Post Image" class="mt-3;"  class="img-fluid d-block w-100 mb-4">
                <div class="col-12 col-lg-8 mt-5">  
                    <div class="article-content text-start">
                        <p><?php echo nl2br(htmlspecialchars($article)) ?></p>
                    </div>
                </div>   
                <hr class="mt-5" style="height: 3px; background-color: black; opacity: 1; border: none;"></div>   

        </div>
       
    </div>

</body>
</html>

