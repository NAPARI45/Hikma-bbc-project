<?php include 'config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die ("Incorrect id");
}


$postArr = $sql->select(
    "posts",
    ["title", "summary", "image_path", "article", "category_id"],
    "id = ?",
    [$id],
    ""
);

if (empty($postArr)) {
    die("Post not found");
}

$post = $postArr[0]; // single post as associative array



if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $title = $_POST['title'];
    $summary = $_POST['summary'];
    $body = $_POST['article'];
    $category_id = $_POST['category_id'];
    
    $image_path = "";



    if (!empty($_FILES['image_path']['name'])) {

        $target_dir = "uploads/";
       

        $target_file = $target_dir . basename($_FILES["image_path"]["name"]);
      

        // Create uploads directory if not exists
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        };
    }









    // update the post
    // $stmt = $pdo->prepare("UPDATE posts SET title=?,summary=?,article=?,category_id=?,image_path=? WHERE id = ?");
    $post = $sql->update("posts", ["title", "summary", "article", "category_id", "image_path"], [$title, $summary, $body, $category_id, $image_path], "id = ?", [$id]);
  

    header("Location: admin_users.php");
    exit;

    
    
}
 include 'admin_header.php';

?>



    <?php 
    $cats = $sql->select("category", ["*"], "", [], "");
    ?>
    <div  class="container m-3">
    <form action="update.php?id=<?= $id ?>"  method="POST" enctype="multipart/form-data">
       <div class="mb-3 mt-3">  
        <p>
            <label class="form-label">News Title</label><br>
            <input class="form-control" type="text" name = "title" value="<?= htmlspecialchars($post['title'])?>">
        </p>
       </div>
       <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label">Summary</label><br>
            <textarea class="form-control" name="summary"  rows="5" cols="50" ><?= htmlspecialchars($post['summary'])?></textarea>
        </p>
       </div>
       <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label">Article</label><br>
            <textarea class="form-control" name="body"  rows="16" cols="100" ><?= htmlspecialchars($post['article'])?></textarea>
        </p>
       </div>
       <div class="mb-3 mt-3"> 
        <p><!-- File upload learn and fix-->
            <label class="form-label">Select Image To Upload</label><br>
            <?php  if (!empty($post['image_path'])): ?>
                <img src="<?php echo htmlspecialchars($post['image_path']); ?>" alt="Current image" style="max-width:200px;"><br>
            <?php endif;?>
            <input type="hidden" name="existing image" value="<?= htmlspecialchars($post['image_path']);?>" >
            <input type="file" name="image_path" id="fileToUpload" >
        </p>
       </div>
       <div class="mb-3 mt-3"> 
        <p>
            <label class="form-label">Category id</label>
            <select class="form-control" name="category_id" required>
                <?php foreach($cats as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $post['category_id']? 'selected' : ''?>><?= $cat['name_cat'] ?></option>
                <?php endforeach; ?>


            </select>
        </p>
       </div>
         <p>
            <button type="submit" name= "submit" class = "btn btn-primary">Update Post</button>
        </p>
        

    </form>

    <p><a href="admin_users.php">Back to Home</a></p>
    </div>
<?php include 'admin_footer.php'; ?>