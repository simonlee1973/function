<?php 

if(!isset($_POST['acc'])){
    header("location:login3.php");
    exit();
}

$acc=$_POST['acc'];
$pw=$_POST['pw'];

if($acc=='admin' && $pw=='1234'){
    echo "帳密正確:登入成功";
    setcookie("login3","$acc",time()+180);
    echo $_COOKIE['login3'];
    echo "<br><a href='login3.php'>回首頁</a>";
}else{
    echo "帳密錯誤:登入失敗";

}


?>