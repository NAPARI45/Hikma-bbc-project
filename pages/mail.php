<?php
// require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// if(isset($title && $title == null)) {
//     die('Title not found ');
// }

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


?>


<?php include 'config.php';
$errors = [];

// require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;




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


// if(isset($title && $title == null)) {
//     die('Title not found ');
// }

if (empty($errors)) {
    if (!empty($new_category)) {
        // Insert new category
        $stmt = $pdo->prepare("INSERT INTO category (name_cat) VALUES (?)");
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
    echo 'Post saved succesfully';
} else {
    $_SESSION['errors'] = $errors;

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;


}   


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



header("Location: viewpost.php");
exit;

} ?>