<?php
session_start();

$uploadDir = __DIR__ . "/uploads/";

$images = glob($uploadDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

sort($images);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ElectroBee</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .slider { max-width: 800px; margin: 20px auto; overflow: hidden; position: relative; }
        .slide { width: 100%; display: none; }
        .active { display: block; }
        .prev, .next { position: absolute; top: 50%; transform: translateY(-50%); 
                       background: rgba(0,0,0,0.5); color: white; border: none; padding: 10px; cursor: pointer; font-size: 20px; }
        .prev { left: 10px; } 
        .next { right: 10px; }
    </style>
</head>
<body>

<h1>ElectroBee - Gallery</h1>

<?php if(isset($_SESSION['user'])): ?>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="login.php">Login</a>
<?php endif; ?>

<div class="slider">
    <button class="prev">❮</button>
    <?php foreach($images as $index => $imgPath): 
        $imgUrl = "uploads/" . basename($imgPath);
    ?>
        <img src="<?= $imgUrl ?>" class="slide <?= $index === 0 ? 'active' : '' ?>" alt="Foto <?= $index+1 ?>">
    <?php endforeach; ?>
    <button class="next">❯</button>
</div>

<script>
    let slides = document.querySelectorAll('.slide');
    let current = 0;

    document.querySelector('.next').addEventListener('click', () => {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
    });

    document.querySelector('.prev').addEventListener('click', () => {
        slides[current].classList.remove('active');
        current = (current - 1 + slides.length) % slides.length;
        slides[current].classList.add('active');
    });

    setInterval(() => {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
    }, 3000);
</script>

</body>
</html>