
<?php include 'config.php';

// require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;



//die(var_dump($_POST, $_FILES));
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $article = $_POST['article'];
    $category_id = $_POST['category_id'];
    $new_category = $_POST['new_category'];

    
    $image_path = "";


// if(isset($title && $title == null)) {
//     die('Title not found ');
// }
if (!empty($new_category)) {
    // Insert new category
    $stmt = $pdo->prepare("INSERT INTO category (name) VALUES (?)");
    $stmt->execute([$new_category]);

    // Get the new ID
    $category_id = $pdo->lastInsertId();
}
if (!empty($_FILES['image_path']['name'])) {

    // 1. Filesystem path (for PHP)
    $upload_dir = __DIR__ . "/../uploads/";

    // 2. URL path (for browser)
    $image_path = "uploads/" . basename($_FILES["image_path"]["name"]);

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (move_uploaded_file(
        $_FILES["image_path"]["tmp_name"],
        $upload_dir . basename($_FILES["image_path"]["name"])
    )) {
        // ✔ save $image_path into DB
    }
}





$stmt = $pdo->prepare("INSERT INTO posts(title,summary,image_path,category_id, article) VALUES (?,?,?,?,?)");
$stmt->execute([$title, $summary, $image_path, $category_id, $article]);

// $stmt = $pdo->query("SELECT email FROM users");
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
//    foreach ($users as $user) {

//     $mail = new PHPMailer(true);

//     try {
//         // Server settings
//         $mail->isSMTP();
//         $mail->Host       = 'smtp.gmail.com';
//         $mail->SMTPAuth   = true;
//         $mail->Username   = 'hickynaps@gmail.com';     // ✅ your Gmail
//         $mail->Password   = 'kmsl jmyi ucif bvhy';        // ✅ Gmail App Password
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port       = 587;

//         // Sender & Recipient
//         $mail->setFrom('hickynaps@gmail.com', 'Hikma Blog');
//         $mail->addAddress($user['email']);

//         // Email content
//         $mail->isHTML(true);
//         $mail->Subject = "New Post: " . $title;
//         $mail->Body    = "
//             <h2>New Post Published</h2>
//             <p><strong>Title:</strong> $title</p>
//             <p>$summary</p>
//             <p><a href='http://localhost/Hikma-bbc-project/index.php'>Read More</a></p>
//         ";

//         $mail->send();

//     } catch (Exception $e) {
//         echo "Email not sent to {$user['email']} - Error: {$mail->ErrorInfo}";
//     }
// }



header("Location: index.php");
exit;
}

include 'admin_header.php';

?>






                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Add Post</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Post</h6>
                        </div>
                        <div class="card-body">
                              <?php 
                                $cats = $pdo->query("SELECT * FROM category")->fetchAll();
                                ?>
                                
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
                                            <textarea class="form-control" name="summary"  rows="5" cols="50" required></textarea>
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
                                                    <option value="<?= $cat['id'] ?>"><?= $cat['name_cat'] ?></option>
                                                    <?php endforeach; ?>
                                                
                                            </select>
                                        </p>
                                        </div>
                                        <div class="mb-3 mt-3"> 
                                        <p>
                                            <label class="form-label mt-5">Input New Category</label>
                                            <input class="form-control" type="text" name = "new_category">
                                        </p>
                                        </div>
                                        <p>
                                            <button type="submit" class = "btn btn-primary" name= "submit">Add Post</button>
                                        </p>
                                        

                                    </form>
                                        <p><a href="index.php">Back to Home</a></p>
                                </div>
                                           
                          
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include 'admin_footer.php'; ?>
































  

    
</body>
</html>