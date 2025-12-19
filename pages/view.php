<?php include 'config.php'; 
$id = (int)$_GET['id'];


if (! is_int($id)) {
    die("Invalid value passed");
}

if (!$id) {
    die ("Incorrect id");
}

// "SELECT * FROM posts WHERE id = ?"
$postArr = $sql->select("posts", ["*"], "id = ?", [$id]);
if (empty($postArr)) {
    die("Post not found");
}

$post = $postArr[0]; // single post as associative array






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
    <title>View Article</title>
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
        .bbc-box {
        display: inline-block;
        background-color: black;
        color: white;
        width: 40px;
        height: 40px;
        padding: 5px 5px 5px 5px ;
        font-family: "Merriweather", sans-serif, Times;
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        justify-content: center;
        box-sizing: border-box;
      }
    </style>   
</head>
<body>


    <div class="container mt-5">

        <div class="row justify-content-center ">
                <div class="col-12 col-lg-8">
                    <h1 class="text-start fw-bold mb-4"><?php echo  htmlspecialchars($title)?></h1>
                </div>
                <?php
                
                $image_src = $image_path;

                if (!preg_match('/^https?:\/\//', $image_path)) {
                    $image_src = '../' . $image_path;
                }
                ?>

                <img src="<?= htmlspecialchars($image_src) ?>"
                    alt="Post Image"
                    class="mt-3 img-fluid d-block w-100 mb-4">

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

