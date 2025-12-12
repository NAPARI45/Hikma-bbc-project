<?php include 'config.php'; ?>
<?php

$category_id = 2;

$stmt = $pdo->prepare('SELECT * FROM posts WHERE category_id = ? ORDER BY id ASC');
$stmt->execute([$category_id]);
$post = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($post[0]['title']);
?>

<?php include 'header.php'?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
</head>
<body>
    <h1 class="text-center mt-3 " style="color:darkred; font-weight: bold; ">NEWS</h1>

    <div class="container">
        <div class="row">
            <div class="col 9">
        
                <div class="row pb-4">
                    <div class="col-3 align-items-start">
                        <h3><a href="view.php?id=<?php echo $post[0]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[0]['title']; ?></a></h3>
                    </div>
                    <div class="col-9 align-items-start">
                        <img src="<?php echo $post[0]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    </div>
        
                </div>
               
                <div class="row align-items-start justify-content-center">
                    <?php

                    for ($i = 1; $i < 5; $i++) {

                        $current_post = $post[$i];
                        ?>
                        <div class="col-3">
                            <img src="<?php echo $current_post['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                            <h6><a href="view.php?id=<?php echo $current_post['id']; ?>" class="text-dark text-decoration-none"> <?php echo $current_post['title']; ?></a></h6><hr>
                        </div>
                    <?php
                    }
?>
                </div>
            </div>


            
            <div class="col-3">
                <img src="<?php echo $post[5]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                <h6><a href="view.php?id=<?php echo $post[5]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[4]['title']; ?></a></h6>
                <p style="font-size: 10px;"><?php echo $post[5]['summary']; ?></p><hr>
                <?php
                for ($i = 6; $i <= 7; $i++) {

                    $current_post = $post[$i];
                    ?>
                    <div class="row"><h6><a href="view.php?id=<?php echo $current_post['id']; ?>" class="text-dark text-decoration-none"><?php echo $current_post['title']; ?></a></h6><hr></div>
                    


                <?php

                }
?>
            </div>
        </div>
        <div class="row pt-5 pb-5">
            <?php
            for ($i = 8; $i < 12; $i++) {
                $current_post = $post[$i];
                ?>
                <div class="col-3 small pb-5"><strong><a href="view.php?id=<?php echo $current_post['id']; ?>" class="text-dark text-decoration-none"> <?php echo $current_post['title']; ?></a></strong></div>
           <?php
            }

?>
            <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
            <h6 style="font-weight: bold;"><b>MORE TO EXPLORE</b></h6>
        </div>





        <div class="row pt-4">
            <div class="col-9 ">
                <div class="row pb-4">
                    <div class="col-3 align-items-start">
                        <h3><a href="view.php?id=<?php echo $post[12]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[12]['title']; ?></a></h3>
                    </div>
                    <div class="col-9 align-items-start">
                        <img src="<?php echo $post[12]['image_path']; ?>" class="img-fluid d-block mx-auto">
                    </div>
                </div>
                <div class="row align-items-start justify-content-center">
                    <?php
        for ($i = 13; $i < 17; $i++) {
            $current_post = $post[$i];
            ?>
                        <div class="col-3 ">
                            <img src="<?php echo $current_post['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                            <h6><a href="view.php?id=<?php echo $current_post['id']; ?>" class="text-dark text-decoration-none"> <?php echo $current_post['title']; ?></a></h6>
                            <hr>
                        </div>
                    <?php
        }
?>
                
                </div>

            </div>


            <div class="col-3">
                <img src="<?php echo $post[17]['image_path']; ?>" class="img-fluid d-block mx-auto mb-3">
                <h6><a href="view.php?id=<?php echo $post[17]['id']; ?>" class="text-dark text-decoration-none"> <?php echo $post[17]['title']; ?></a></h6>
                <p style="font-size: 10px;"><?php echo $post[17]['summary']; ?></p><hr>
                <?php
for ($i = 18; $i <= 19; $i++) {

    $current_post = $post[$i];
    ?>
                        <div class="row"><h6><a href="view.php?id=<?php echo $current_post['id']; ?>" class="text-dark text-decoration-none"><?php echo $current_post['title']; ?></a></h6><hr></div>
                        


                    <?php

}
?>
                  
            </div>

           
        </div>



        <div class="row pt-5 pb-5">
            <?php
            for ($i = 20; $i < 24; $i++) {
                $current_post = $post[$i];
                ?>
                <div class="col-3 small pb-5"><strong><a href="view.php?id=<?php echo $current_post['id']; ?>" class="text-dark text-decoration-none"> <?php echo $current_post['title']; ?></a></strong></div>
           <?php
            }

?>
            <hr style="height: 3px; background-color: black; opacity: 1; border: none;">
            <h6 style="font-weight: bold;"><b>MOST WATCHED</b></h6>
        </div>











    </div>    




 </body>
</html>
<?php include 'footer.php'?>