<?php 



$dsn="mysql:host=localhost;charset=utf8;dbname=crud";
$pdo=new PDO($dsn,'root','');
$acc=$_POST['acc'];
$pw=$_POST['pw'];

if(!isset($_POST['acc'])){
    header("location:login4.php");
    exit();
}
$sql="select * from 'member where acc='$acc' && pw='$pw'";
$sql1="select count(id) from member where acc='$acc' && pw='$pw'";
$acc=$_POST['acc'];
$pw=$_POST['pw'];

//$row=$pdo->query($sql)->fetch();
$row=$pdo->query($sql1)->fetchcolumn();
echo $row;
if ($row){
    // echo "帳密正確:登入成功";
    // setcookie("login3","$acc",time()+180);
    // echo $_COOKIE['login3'];
    // echo "<br><a href='login4.php'>回首頁</a>";
    header("location:success.php");
}else{
    echo "帳密錯誤:登入失敗";
    header("location:login4.php?err=1");

}


?>