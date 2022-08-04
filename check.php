<?php 
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
session_start();
include_once('db/connexion.php');
if($stmt=$conn->prepare('SELECT login_user,password_user,id_user,type_user FROM users WHERE  login_user=?')) {
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    //now let we store the result so we can check if the account exist 
    $stmt->store_result();
    if($stmt->num_rows > 0){
        $stmt->bind_result($login_user,$password,$id_user,$type_user);
        $stmt->fetch();
        //so now  we know the account exist let we now verify the password 
        if($_POST['password']===$password){
        //now the use should log in and we create a session so we know the user has loggedin
            $result = $stmt->get_result();
            setcookie("idu",$id_user);
            setcookie("username",$login_user);
            setcookie("type_user",$type_user);
            $_SESSION['loggedin'] = TRUE ;
            $_SESSION['username'] = $_POST['username'];
            $query2="UPDATE `users` SET `status`=1,`log`='".date('d-m-y h:i:s')."' WHERE `id_user`='$id_user'";
            $conn->query($query2);
            header('location:dashboard.php');

            
        }else{
            $_SESSION['errors']='password incorrect !';
            header('refresh:1;url=index.php');
            //header('location:index.php');
        }
    }else{
        $_SESSION['errors']='username incorrect !';
        #header('refresh:1;url=index.php');
    }
}
?>