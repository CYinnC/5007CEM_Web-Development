<?php

include("Connect.php");

if ($_SERVER['REQUEST_METHOD']=="POST"){

$email = $_POST['email'];
$uname = $_POST['User'];
$pw = $_POST['pw'];
$hashed_pw = password_hash($pw, PASSWORD_DEFAULT);

if(!empty($email) && !empty($uname) && !empty($pw)){

$query = "INSERT INTO data(email, name, pw) VALUES ('$email','$uname','$hashed_pw')";

mysqli_query($con, $query);
header("Location: login.php");
die;
}else
{
echo "Please fill up all details";
}

}


?>

<!DOCTYPE html>
<html lang="utf=8">


<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<nav>
<label class="logo">Club United</label>
<ul>
<ul>
<li><a href="Main.php"><img src ="images/home.png" width="130" height="40"></a></li>
<li><a href="Post.php"><img src ="images/post.png" width="130" height="40"></a></li>
<li><a href="Profile.php"><img src ="images/profile.png" width="130" height="40"></a></li>
<li><a href="Contact.html"><img src ="images/contact.png" width="130" height="40"></a></li>
<li><a href="AU.html"><img src ="images/AU.png" width="130" height="40"></a></li>
<li><a href="Login.php"><img src ="images/Login.png" width="115" height="55"></a></li>
</ul>
</nav>

<div class="layout">
<br/><br/>
<h1>Sign Up</h1>
<form action="#" method="post">
<p>Email:</p>
<input type="text" name="email" placeholder="Email">
<p>Username:</p>
<input type="text" name="User" placeholder="Username">
<p>Password:</p>
<input type="password" name="pw" placeholder="Password">
<button type="submit">Create Account</button>
</form>
</div>


</body>
</html>