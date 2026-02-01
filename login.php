<?php
session_start();
require_once __DIR__ . "/classes/User.php";
$user = new User();
$msg="";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $res = $user->login($_POST['email'],$_POST['password']);
    if($res){
        $_SESSION['user']=$res;
        header("Location:index.php");
        exit;
    } else {
        $msg="Wrong credentials";
    }
}
?>
<form method="POST">
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>
<button>Login</button>
</form>
<p><?= $msg ?></p>
<a href="register.php">Register</a>