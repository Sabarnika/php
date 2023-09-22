<?php
function inputFields($placeholder,$username,$value,$type)
{
    $ele="<div class=\"form-group my-4\">
    <input type='$type' name='$username' placeholder='$placeholder' class=\"form-control\" value='$value'>
    </div>";
    echo $ele;
}
?>