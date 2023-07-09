<?php
error_reporting(E_ALL);  //give warning if session cannot start
session_start();

include("Connect.php");

if ($_SERVER['REQUEST_METHOD']=="POST"){


$uname = $_POST['User'];
$pw = $_POST['pw'];

if(!empty($uname) && !empty($pw)){

$query = "SELECT * from data WHERE name = '$uname' limit 1 ";

$result = mysqli_query($con, $query);

if($result){

if ($result && mysqli_num_rows($result)>0){

	$user_data = mysqli_fetch_assoc($result);

	if(password_verify($pw,$user_data['pw'])){
		$_SESSION['id'] = $user_data['id']; //store user id in session
		$_SESSION['loggedin'] = true;	
	
		header("Location: Main.php");
		die;
	}
	} 
}
echo "Make sure to enter everything correctly, please try again.";

}else
{
echo "Please make sure to fill in everything.";
}
}
?>

<!DOCTYPE html>
<html lang="utf=8">


<html>
<head>
<title>Login</title>

<link rel="stylesheet" href="style.css">
</head>

<body>

<nav>
<label class="logo">Club United</label>
<ul>
<li><a href="Main.php"><img src ="images/home.png" width="130" height="40"></a></li>
<li><a href="Post.php"><img src ="images/post.png" width="130" height="40"></a></li>
<li><a href="Profile.php"><img src ="images/profile.png" width="130" height="40"></a></li>
<li><a href="Contact.html"><img src ="images/contact.png" width="130" height="40"></a></li>
<li><a href="AU.html"><img src ="images/AU.png" width="130" height="40"></a></li>
<li><a href="SU.php"><img src ="images/SU.png" width="115" height="55"></a></li>
</ul>
</nav>


<div class="layout">
<h1>Login</h1>
<form action="#" method="post">
<p>Username:</p>
<input type="text" name="User" placeholder="Username">
<p>Password:</p>
<input type="password" name="pw" placeholder="Password">
<br/><br/>
<a href="SU.php">Sign Up Here</a>
<br/>
<button type="submit">Login</button>
</form>
</div>

<br/><br/><br/><br/>
</body>
</html>