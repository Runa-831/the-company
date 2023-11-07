<?php

require "../classes/User.php";

// get data from form
$id =$_POST['user_id'];
$f_name =$_POST['first_name'];
$l_name =$_POST['last_name'];
$username =$_POST['username'];

$user = new User;

$edit_users = User->editUser($user_id, $first_name, $last_name, $username);

?>
