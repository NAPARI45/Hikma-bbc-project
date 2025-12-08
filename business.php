<?php include 'config.php';
include 'header.php';
  $category_id = 4;

  $stmt = $pdo->prepare("SELECT * FROM posts WHERE category_id = ? ORDER BY id ASC");
  $stmt->execute([$category_id]);
  $post = $stmt->fetchAll(PDO::FETCH_ASSOC);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business</title>
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
    <div class="container">
        <div class="row pt-3">
            <div class="col-9 ">
                <div class="row pb-4">
                <div class="col-3 align-items-start">
                    <h3><a href="view.php?id=<?php echo $post[0]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[0]['title']; ?></a></h3>
                </div>
                <div class="col-9 align-items-start">
                    <img src="<?php echo $post[0]['image_path']; ?>" class="img-fluid d-block mx-auto">
                </div>
                </div>
                <div class="row align-items-start justify-content-center">
                    <div class="col-3 ">
                        <img src="<?php echo $post[1]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                        <h6><a href="view.php?id=<?php echo $post[1]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[1]['title']; ?></a></h6>
                        <span>10 hours ago | Politics</span>
                        
                        <hr>
                    </div>
                    <div class="col-3 ">
                        <img src="<?php echo $post[2]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                        <h6><a href="view.php?id=<?php echo $post[2]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[2]['title']; ?></a></h6><hr>
                    </div>
                    <div class="col-3 ">
                        <img src="<?php echo $post[3]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                        <h6><a href="view.php?id=<?php echo $post[3]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[3]['title']; ?></a></h6><hr>
                    </div>
                    <div class="col-3">
                        <img src="<?php echo $post[4]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                        <h6><a href="view.php?id=<?php echo $post[4]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[4]['title']; ?></a></h6><hr>
                    </div>
                    <div class="row pt-5 pb-5">
                        <div class="col-6 small">
                            <strong><a href="view.php?id=<?php echo $post[8]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[8]['title']; ?></a></strong>
                            <h6><a href="view.php?id=<?php echo $post[8]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[8]['summary']; ?></a></h6><hr>
                        </div>
                        <div class="col-6 small">
                            <strong><a href="view.php?id=<?php echo $post[9]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[9]['title']; ?></a></strong>
                            <h6><a href="view.php?id=<?php echo $post[9]['id']; ?>" class="text-dark text-decoration-none fw-light font-size: small"> <?php echo $post[9]['summary']; ?></a></h6><hr>
                        </div>
                
                </div>
            </div>

                
        </div>
        <div class="col-3">
            <img src="<?php echo $post[5]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[5]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[5]['title']; ?></a></h6>
            <p style="font-size: 10px;"><?php echo $post[5]['summary'];?></p><hr>
            <div class="row"><h6><a href="view.php?id=<?php echo $post[6]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[6]['title']; ?></a></h6></div><hr>
            <div class="row"><h6><a href="view.php?id=<?php echo $post[7]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[7]['title']; ?></a></h6></div><hr>      
        </div>

        
       
        <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
        <h6 class="bold"><b>WORLD OF BUSINESS</b></h6>
        
        <div class="row pt-3">
            <div class="col-6">
            <img src="<?php echo $post[8]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[8]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[8]['title']; ?></a></h6>
            </div>
            <div class="col-6">
            <img src="<?php echo $post[9]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[9]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[9]['title']; ?></a></h6>
            </div>

            </div>
        </div>






    
    </div>
</body>
</html>