
<?php include 'config.php';
include 'eg.php';
$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = trim($_POST['title'] ?? '');
    $summary = trim($_POST['summary'] ?? '') ;
    $article = trim($_POST['article'] ?? '');
    $category_id = trim($_POST['category_id'] ?? '');
    $new_category = trim($_POST['new_category'] ?? '');

    if(empty($title))                               $errors[] = "Title is required";
    if(empty($summary))                             $errors[] = "Summary is required";
    if(empty($article))                             $errors[] = "Article is required";
    if(empty($category_id) && empty($new_category)) $errors[] = "Category is required";

    
    $image_path = "";

if (empty($errors)) {
    if (!empty($new_category)) {
        // Insert new category
        // $stmt = $pdo->prepare("INSERT INTO category (name_cat) VALUES (?)");
        $stmt = $pdo->prepare($insertpost = (new sqlcommands())->insert("category", ["name_cat"], ["?"]));
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
    // $stmt = $pdo->prepare("INSERT INTO posts(title,summary,image_path,category_id, article) VALUES (?,?,?,?,?)");
    $stmt = $pdo->prepare((new sqlcommands())->insert("posts", ["title", "summary", "image_path", "category_id", "article"], ["?","?","?","?","?"]));
    $stmt->execute([$title, $summary, $image_path, $category_id, $article]);
    echo 'Post saved succesfully';
} else {
    $_SESSION['errors'] = $errors;

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}   

header("Location: viewpost.php");
exit;

}

?>

<?php include 'admin_header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    
    <?php if (!empty($_SESSION['errors']) && is_array($_SESSION['errors'])) { ?>
        <div class="alert alert-danger">

            <?php
                foreach ($_SESSION['errors'] as $error) {
                    echo "<p style='color:red;'>$error</p>";
                }
                unset($_SESSION['errors']);
            ?>
        </div>
    <?php } ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-5 text-gray-800">Add Post</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Post</h6>
        </div>
        <div class="card-body">
                <?php 
                // $cats = $pdo->query("SELECT * FROM category")->fetchAll();
                $cats = $pdo->query((new sqlcommands())->select("category", ["*"], "", ""))->fetchAll();
                ?>
                
                <div class="container mt-3">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-3"> 
                        <p>
                            <label class="form-label mt-5">Title</label><br>
                            <input class="form-control" type="text" name = "title">
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

</div>
<!-- End of Main Content -->

<?php include 'admin_footer.php'; ?>
































  

    
</body>
</html>