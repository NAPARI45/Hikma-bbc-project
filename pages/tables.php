<?php 
include 'config.php';

if (isset($_POST['update_role'])) {
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];

    // Update user role using your SQL class
    $updated = $sql->update(
        "users", 
        ["role", "updated_at"], 
        [$role, date('Y-m-d H:i:s')], 
        "id = ?", 
        [$user_id]
    );

    if ($updated) {
        // reload the page to show updated role
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<div class='alert alert-danger'>Failed to update role.</div>";
    }
}

$post = $sql->select("users", ["*"], "user_deleted = ?", [0], "id_asc");
$users = $post;

include 'admin_header.php'; 
?>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                           
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                  
                                        <?php foreach($users as $user): ?>
                                        <tr>
                                            <td><?= $user['id']; ?></td>
                                            <td><?= htmlspecialchars($user['username']); ?></td>
                                            <td><?= htmlspecialchars($user['email']); ?></td>
                                            <td><?= htmlspecialchars($user['password']); ?></td>
                                            <td>
                                                <form method="POST">
                                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                                    <select name="role">
                                                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                                                        <option value="superadmin" <?= $user['role'] === 'superadmin' ? 'selected' : ''; ?>>Superadmin</option>
                                                        <option value="editor" <?= $user['role'] === 'editor' ? 'selected' : ''; ?>>Editor</option>
                                                        <option value="guest" <?= $user['role'] === 'guest' ? 'selected' : ''; ?>>Guest</option>
                                                        <option value="author" <?= $user['role'] === 'author' ? 'selected' : ''; ?>>Author</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary mt-3" name="update_role">Update</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="deletetables.php?id=<?= $user['id']; ?>" class="btn btn-primary"  onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                            <?php endforeach ?>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         <?php include 'admin_footer.php'; ?>