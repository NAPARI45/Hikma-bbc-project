<?php include 'config.php';



$errors = [];

$limit = 25;


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// $totalStmt = $pdo->query("SELECT COUNT(*) FROM posts WHERE post_deleted = 0");
$totalPostsArr = $sql->select("posts", ["COUNT(*) AS total"], "post_deleted = 0");
$totalPosts = $totalPostsArr[0]['total'] ?? 0;
$totalPages = ceil($totalPosts / $limit);


// $stmt = $pdo->prepare("SELECT * FROM posts WHERE post_deleted = 0 ORDER BY id ASC LIMIT :limit OFFSET :offset");
$posts = $sql->select("posts", ["*"], "post_deleted = 0", [], "id_asc", $limit, $offset);











    




include 'admin_header.php';


?>






                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Add Post</h1>

                    
                    <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create New Post</button></p>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create New Post</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <?php 
                                        $cats = $sql->select("category", ["*"], "");
                                        ?>
                                        
                                        <div class="container mt-3">
                                            <form action="addpost.php" method="POST" enctype="multipart/form-data">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Understood</button>
                            </div>
                            </div>
                        </div>
                    </div>
                

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Post</h6>
                        </div>
                        <div class="card-body">
                           
                                <div class="container">
                                    <table class="table table-striped">
                                        <tr class="table-dark">
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Summary</th>
                                        <th>Category_id</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                        </tr>
                                        <?php foreach($posts as $row):  ?>
                                            <tr >
                                                <td><?=$row['id']; ?></td>
                                                <td><?=$row['title']; ?></td>
                                                <td><?=$row['summary']; ?></td>
                                                <td><?=$row['category_id']; ?></td>
                                                <td>
                                                <?php
                                                    $image_path = $row['image_path'];
                                                    $image_src = $image_path;
                                                    if (!preg_match('/^https?:\/\//', $image_path)) {
                                                        $image_src = '../' . $image_path;
                                                    }
                                                ?>    
                                                <img src="<?= $image_src; ?>" alt="Post Image"  style = "width:100px; height:150px; object-fit: cover;" ></td>

                                                <td>
                                                    <a  target="_blank"  href="view.php?id=<?php echo($row['id']); ?>" class = "btn btn-primary">View</a><br><p></p>
                                                    <a href="updatepost.php?id=<?= $row['id']; ?>" class = "btn btn-primary">Update</a><p></p>
                                                    <a href="delete.php?id=<?= $row['id']; ?>" class = "btn btn-primary" onclick= "return confirm('Are you sure you want to delete this post?');">Delete</a><br>


                                                </td>
                                            </tr>
                                        <?php endforeach; ?>


                                    </table>
                                </div>
                                           
                          
                        </div>
                    </div>
                    <div class="mt-3">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                                </li>

                                <?php for ($i=1; $i <= $totalPages; $i++): ?>
                                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>

                                <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                                </li>
                            </ul>
                        </nav>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include 'admin_footer.php';?>