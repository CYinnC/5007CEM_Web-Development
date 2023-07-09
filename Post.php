<?php

require 'PostFun.php';

?>

<!DOCTYPE html>
<html lang="utf=8">


<html>
<head>
<title>Post</title>
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
<li><a href="Login.php"><img src ="images/Login.png" width="115" height="55"></a></li>
</ul>
</nav>


<div class="layout">
<h1>Post Your Club Here</h1>
<form action="arc.php" method="post" enctype="multipart/form-data">
<p>Club Name:</p>
<?php inputFields("Club Name","club","","text") ?>
<p>Club Details:</p>
<?php inputFields("Detail","detail","","text") ?>
<p>Upload Image:</p>
<?php inputFields("","image","","file") ?>
<input type="submit" class="form-control submit" value="Submit" name="submit" >
</form>
</div>

</body>
</html>