<?php

include_once '../model/userModel.php';
$a = new userModel($_POST['username'], $_POST['password']);
$data = $a->getData($_POST['username']);
session_start();
if ($data['tenTK'] == $_POST['username'] && $data['matKhau'] == $_POST['password']) {
    $_SESSION["admin"]=true;
    header("Location: ../view/index.php");
} else {
   // echo '<script>alert("Tài khoản hoặc mật khẩu không đúng")</script>';
    header("Location: ../view/login.php");
}
?>
