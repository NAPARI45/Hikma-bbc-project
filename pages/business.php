<?php include 'config.php';
include 'header.php';
include 'eg.php';

 // LOAD ALL POSTS FOR THE TOP SECTIONS (first 28 items)
    $category_id = 4;
    $main_stmt = $pdo->prepare((new sqlcommands())->select("posts", ["*"], "category_id = ?", "id_asc"));
    $main_stmt->execute([$category_id]);
    $post = $main_stmt->fetchAll(PDO::FETCH_ASSOC);


$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// COUNT POSTS for pagination"SELECT COUNT(*) FROM posts WHERE category_id = ?"
$total_stmt = $pdo->prepare((new sqlcommands())->count("posts", "category_id = ?"));
$total_stmt->execute([$category_id]);
$total_posts = $total_stmt->fetchColumn();
$total_pages = ceil($total_posts / $limit);

// LOAD PAGINATED POSTS (FOR "MORE CULTURE")
$stmt = $pdo->prepare( (new sqlcommands())->select("posts", ["*"], "category_id = ?", "id_asc") . " LIMIT $limit OFFSET $offset") ;

$stmt->execute([$category_id]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);




  


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
                        <img src="/Hikma-bbc-project/<?php echo $post[2]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                        <h6><a href="view.php?id=<?php echo $post[2]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[2]['title']; ?></a></h6><hr>
                    </div>
                    <div class="col-3 ">
                        <img src="/Hikma-bbc-project/<?php echo $post[3]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                        <h6><a href="view.php?id=<?php echo $post[3]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[3]['title']; ?></a></h6><hr>
                    </div>
                    <div class="col-3">
                        <img src="/Hikma-bbc-project/<?php echo $post[4]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
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
            <img src="/Hikma-bbc-project/<?php echo $post[5]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[5]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[5]['title']; ?></a></h6>
            <p style="font-size: 10px;"><?php echo $post[5]['summary'];?></p><hr>
            <div class="row"><h6><a href="view.php?id=<?php echo $post[6]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[6]['title']; ?></a></h6></div><hr>
            <div class="row"><h6><a href="view.php?id=<?php echo $post[7]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[7]['title']; ?></a></h6></div><hr>      
        </div>

        
       
        <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
        <h6 class="bold"><b>WORLD OF BUSINESS</b></h6>
        
        <div class="row pt-3 pb-5">
            <div class="col-6">
            <img src="/Hikma-bbc-project/<?php echo $post[8]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[8]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[8]['title']; ?></a></h6>
            </div>
            <div class="col-6">
            <img src="/Hikma-bbc-project/<?php echo $post[9]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
            <h6><a href="view.php?id=<?php echo $post[9]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[9]['title']; ?></a></h6>
            </div>

            </div>
        </div>

        <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
        <h6 class="bold"><b>TECHNOLOGY OF BUSINESS</b></h6>
        <div class="row pt-3">
            <div class="col-9">
            <img src="/Hikma-bbc-project/<?php echo $post[10]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
            
            </div>
            <div class="col-3 pt-5 mt-5">
            <h3 style="font-weight: bold;"><a href="view.php?id=<?php echo $post[10]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[10]['title']; ?></a></h3>
            <h6 style="font-weight: lighter;"><a href="view.php?id=<?php echo $post[10]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[10]['summary']; ?></a></h6>
            </div>

            </div>
        </div>
        <div class="container">
            <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
            <h6 class="bold"><b>MORE NEWS</b></h6>
            <div class="row pt-5">
                <div class="col-4">
                    <img src="/Hikma-bbc-project/<?php echo $post[11]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
                    <h6><a href="view.php?id=<?php echo $post[11]['id'] ?>" class="text-dark text-decoration-none"><?php echo $post[11]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="/Hikma-bbc-project/<?php echo $post[12]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
                    <h6><a href="view.php?id=<?php echo $post[12]['id'] ?>" class="text-dark text-decoration-none"><?php echo $post[12]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="/Hikma-bbc-project/<?php echo $post[13]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
                    <h6><a href="view.php?id=<?php echo $post[13]['id'] ?>" class="text-dark text-decoration-none"><?php echo $post[13]['title']; ?></a></h6>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-4">
                    <img src="/Hikma-bbc-project/<?php echo $post[14]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
                    <h6><a href="view.php?id=<?php echo $post[14]['id'] ?>" class="text-dark text-decoration-none"><?php echo $post[14]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="/Hikma-bbc-project/<?php echo $post[15]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
                    <h6><a href="view.php?id=<?php echo $post[15]['id'] ?>" class="text-dark text-decoration-none"><?php echo $post[15]['title']; ?></a></h6>
                </div>
                <div class="col-4">
                    <img src="/Hikma-bbc-project/<?php echo $post[16]['image_path'] ?>" class="img-fluid d-block mx-auto mb-3">
                    <h6><a href="view.php?id=<?php echo $post[16]['id'] ?>" class="text-dark text-decoration-none"><?php echo $post[16]['title']; ?></a></h6>
                </div>
            </div>



        </div>




    
    </div>
    <div class="container-fluid bg-black px-0" style="padding-bottom: 30px;">

                    <div class="row g-0">

                        <hr style="height: 3px; background-color: white; opacity: 1; border: none;" class="mt-3">
                        <h6 style="font-weight: bold; color:azure;" class="mb-1"><b>BBC MAESTRO</b></h6>
                
                            <div id="carouselExample" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="container-fluid" >
                                            <div class="row justify-content-center g-3">
                                                <div class="col-4">
                                                    <a href= "view.php?id=<?php echo $post[17]['id'] ?>"><img src="/Hikma-bbc-project/<?php echo $post[17]['image_path']; ?>" class="img-fluid w-100 d-block"></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href= "view.php?id=<?php echo $post[17]['id'] ?>"><img src="/Hikma-bbc-project/<?php echo $post[18]['image_path']; ?>" class="img-fluid w-100 d-block"></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href= "view.php?id=<?php echo $post[17]['id'] ?>"><img src="/Hikma-bbc-project/<?php echo $post[19]['image_path']; ?>" class="img-fluid w-100 d-block"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="container-fluid" >
                                            <div class="row justify-content-center g-3">
                                                <div class="col-4">
                                                    <a href= "view.php?id=<?php echo $post[17]['id'] ?>"><img src="/Hikma-bbc-project/<?php echo $post[20]['image_path']; ?>" class="img-fluid w-100 d-block"></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href= "view.php?id=<?php echo $post[17]['id'] ?>"><img src="/Hikma-bbc-project/<?php echo $post[21]['image_path']; ?>" class="img-fluid w-100 d-block"></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href= "view.php?id=<?php echo $post[17]['id'] ?>"><img src="/Hikma-bbc-project/<?php echo $post[22]['image_path']; ?>" class="img-fluid w-100 d-block"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                    </div>

</div>   
<div class="container mt-4 pb-5">
            <hr style="height: 3px; background-color: black; opacity: 1; border: none;" class="mt-5">
            <h6 style="font-weight: bold;" class="mb-1"><b>MORE CULTURE</b></h6>

            <?php foreach ($posts as $p): ?>
                <div class="row pt-5">
                    <div class="col-1 ps-5" style="font-size: smaller;">
                        3 hours
                    </div>
                    <div class="col-7">
                        <h4>
                            <a href="view.php?id=<?= $p['id']; ?>" class="text-dark text-decoration-none">
                                <?= $p['title']; ?>
                            </a>
                        </h4>
                        <h6>
                            <a href="view.php?id=<?= $p['id']; ?>" class="text-dark text-decoration-none">
                                <?= $p['summary']; ?>
                            </a>
                        </h6>
                    </div>
                    <div class="col-4">
                        <img src="/Hikma-bbc-project/<?= $p['image_path']; ?>" class="img-fluid d-block mx-auto">
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>

                

            <div class="container d-flex justify-content-center">
                <div class="btn-group" role="group">

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a 
                            href="?page=<?= $i; ?>" 
                            class="btn btn-outline-dark <?= ($i == $page) ? 'active' : '' ?>"
                        >
                            <?= $i; ?>
                        </a>
                    <?php endfor; ?>

                </div>
            </div>


        </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include 'footer2.php' ?>

