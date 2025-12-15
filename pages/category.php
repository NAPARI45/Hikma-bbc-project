<?php 
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $slug = $_POST['slug'];
    $name_cat = $_POST['name_cat'];

    $stmt = $pdo->prepare("INSERT INTO category (id, slug, name_cat) VALUES (?, ?, ?)");
    $stmt->execute([$id, $slug, $name_cat]);

    header("Location: category.php");
    exit;
}

// FETCH CATEGORY LIST
$categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);

 include 'admin_header.php'; 
?>



        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-1 text-gray-800">Categories Tables</h1>
                    <p class="mb-4">The categories listed on the bbc replica website.</p>

                    <!-- Content Row -->
                    <div class="row">
                     <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">New Post</h6>
                        </div>
                        <div class="card-body ">
                           
                                <div class="container w-100">
                                    <table class="table table-striped">
                                        <tr class="table-dark">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Actions</th>
                                        </tr>
                                        <?php foreach($categories as $category): ?>
                                            <tr >
                                                <td><?=$category['id']; ?></td>
                                                <td><?=$category['name_cat']; ?></td>
                                                <td><?=$category['slug']; ?></td>
                                                
                                                
                                                <td>
                                
                                                    <a href="delete.php?id=<?= $category['id']; ?>" class = "btn btn-primary" onclick= "return confirm('Are you sure you want to delete this post?');">Delete</a><br>


                                                </td>
                                            </tr>
                                        <?php endforeach;?>


                                    </table>
                                </div>
                                           
                          
                        </div>
                    </div>
                        
                       

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include 'admin_footer.php'; ?>