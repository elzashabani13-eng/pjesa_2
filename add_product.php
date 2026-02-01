<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role']!="admin"){
    header("Location:index.php");
    exit;
}
require_once __DIR__ . "/classes/Product.php";
$product = new Product();
$msg="";

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_FILES['image'])){
    $title = $_POST['title'];
    $imgName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpName,__DIR__."/uploads/products/".$imgName);
    $product->add($title,$imgName);
    $msg="Product added!";
}
?>

<form method="POST" enctype="multipart/form-data">
<input type="text" name="title" placeholder="Product Title" required><br><br>
<input type="file" name="image" required><br><br>
<button>Upload Product</button>
</form>
<p><?= $msg ?></p>
<a href="dashboard.php">Back to Dashboard</a>

