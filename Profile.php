<?php 

error_reporting(E_ALL);  //give warning if session cannot start
    session_start(); //starting the session

    //fetch user ID for display user data
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
		echo "<p>$id</p>";
    }



?>


<!DOCTYPE html>
<html lang="utf=8">


<html>
<head>
<title>Profile</title>
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
<br/><br/>
<h1>Profile</h1>

<?php

            //connect to db api for data fetching, pass the assigned data into link for api function
            $api_url = 'http://localhost/ClubsUnited/api/user/read_one.php?id='. urlencode($id) ;

            //fetched the data, make it into php array from json array
            $user_details = file_get_contents($api_url);
            $user_array = json_decode($user_details, true);

            //store the data in variables
            $user_email = $user_array['email'];
            $user_name = $user_array['name'];

            //display user data
            echo "<p><b>Email:&emsp;</b>".$user_email."</span></p>";
            echo "<p><b>Name:&emsp;</b>".$user_name."</p>";
        ?>

</div>


</body>
</html>