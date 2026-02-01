<?php
session_start();
require_once "classes/Product.php";
if(!isset($_SESSION['user']) || $_SESSION['user']['role']!="admin"){
    header("Location: login.php");
    exit;
}

$productObj = new Product();
$products = $productObj->getAll();
?>
<h1>Admin Dashboard</h1>
<a href="logout.php">Logout</a>
<h2>All Products</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th></tr>
<?php while($row=$products->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['price'] ?></td>
<td><img src="uploads/<?= $row['image'] ?>" width="60"></td>
</tr>
<?php endwhile; ?>
</table>