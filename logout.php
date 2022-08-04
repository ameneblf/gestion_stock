<?php
include_once('db/connexion.php');
session_start();
$query2="UPDATE `users` SET `status`=0 WHERE `id_user`='$_COOKIE[idu]'";
$conn->query($query2);
session_unset();
session_destroy();
setcookie("idu","", time());
setcookie("type_user","", time());
setcookie("username","", time());
header('location:index.php');

?>