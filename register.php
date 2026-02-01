<?php
require_once __DIR__ . "/classes/User.php";
$user = new User();
$msg="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    if($user->register($_POST['name'],$_POST['email'],$_POST['password'])){
        $msg="Registered!";
    }
}
?>
<form method="POST">
<input type="text" name="name" placeholder="Name" required><br><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button>Register</button>
</form>
<p><?= $msg ?></p>
<a href="login.php">Login</a>