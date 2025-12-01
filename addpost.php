<?php include 'config.php';


//die(var_dump($_POST, $_FILES));
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $article = $_POST['article'];
    $category_id = $_POST['category_id'];
    
    $image_path = "";



if (!empty($_FILES['image_path']['name'])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image_path"]["name"]);
      
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        };
    }




$stmt = $pdo->prepare("INSERT INTO posts(title,summary,image_path,category_id, article) VALUES (?,?,?,?,?)");
$stmt->execute([$title, $summary, $image_path, $category_id, $article]);

// $stmt = $pdo->query("SELECT email FROM users");
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
//     foreach ($users as $user) {
//         $to = $user['email'];
//         $subject = "New Post: " . $title;
//         $message = "Hello!\n\nA new post has been published:\n\nTitle: $title\n\nCheck it out on our website!";
//         $headers = "From: no-reply@Hikma-bbc-project.com";

//         mail($to, $subject, $message, $headers);
//     }

//     echo "Post created and guests notified!";


header("Location: index.php");
exit;
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"/>
    <script src="cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php 
    $cats = $pdo->query("SELECT * FROM category")->fetchAll();
    ?>
    <h2 class="ms-5">Add Post</h2>
    <div class="container mt-3">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
       <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label mt-5">Title</label><br>
            <input class="form-control" type="text" name = "title" required>
        </p>
       </div>
       <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label mt-5">Summary</label><br>
            <textarea class="form-control" name="summary"  rows="10" cols="50" required></textarea>
        </p>
        </div>
        <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label mt-5">Article</label><br>
            <textarea class="form-control" name="article"  rows="16" cols="100" required></textarea>
        </p>
        </div>
        <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label mt-5">Select Image To Upload</label><br>
            <input type="file" name="image_path" id="fileToUpload" >
        </p>
        </div>
        <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label mt-5">Category id</label>
            <select class="form-select" name="category_id" required>
                  
                    <?php foreach($cats as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                    <?php endforeach; ?>
                
            </select>
        </p>
        </div>
         <p>
            <button type="submit" class = "btn btn-primary" name= "submit">Add Post</button>
        </p>
        

    </form>
        <p><a href="index.php">Back to Home</a></p>
    </div>

    
</body>
</html>