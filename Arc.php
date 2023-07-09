<?php

include ('./PostCon.php');


if (isset($_POST['submit'])){
	$club = $_POST['club'];
	$detail = $_POST['detail'];
	$image = $_FILES['image'];

	
	$imagefilename=$image['name'];


	$imagefileerror=['error'];


	$imagefiletemp=$image['tmp_name'];


	$filename_separate=explode('.',$imagefilename);


	$file_extension=strtolower(end($filename_separate));

	
	$extension=array('jpeg','jpg','png');
	if(in_array($file_extension, $extension)){
		$upload_image='images/'.$imagefilename;
		move_uploaded_file($imagefiletemp,$upload_image);
		$sql="insert into `post` (club, detail, image) values('$club','$detail','$upload_image')";
		$result=mysqli_query($con1,$sql);
if($result){
	echo "Data inserted";
}else{
	die(mysqli_error($con));
}

	
			
}	
}
 

?>


<!DOCTYPE html>
<html lang="utf=8">

<html>
<head>
<title>Clubs</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>


<nav>
<label class="logo">Club United</label>
<ul>
<li><a href="Post.php"><img src ="images/post.png" width="130" height="40"></a></li>
<li><a href="Main.php"><img src ="images/back.png" width="130" height="40"></a></li>
</ul>
</nav>


<br/><br/>
<?php

$sql="SELECT * FROM `post`";
$result=mysqli_query($con1,$sql);
  while($row=mysqli_fetch_assoc($result)){
    $club=$row['club'];
	$detail=$row['detail'];
    $image=$row['image'];

?>



<div class="posting">

<div class= "image">
<?php
echo " <img src=".$image.">
"; ?>
</div>

<div class="details">
<p class="rating">
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
</p>

<div class="title">
<?php 
echo " <p><b>".$club."</b></p> "; ?>
</div>
<?php echo "<p>".$detail."</p> "; ?>

<button type="submit">Comment</button>
</div>

</div>

<?php
}
?>



</body>
</html>