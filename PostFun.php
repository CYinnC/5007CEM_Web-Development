<?php

function inputFields($placeholder, $name, $value, $type){
	
$ele="
<div class=\"form\">
<input type='$type' name='$name' placeholder='$placeholder' class=\"form-control\" value='$value'>
</div>";

echo $ele;
}




?>