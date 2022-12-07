<?php
include '../model/userModel.php';
$a = new userModel($_POST['username'], $_POST['password']);
$a->inssertUser();

?>
