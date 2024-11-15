<?php

/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */


// $sql="UPDATE member SET acc={$_POST['acc']} , 
//                            pw={$_POST['pw']} ,
//                            email={$_POST['email']} ,
//                            tel={$_POST['tel']} 
//                            WHERE id={$_POST['id']}";

// /* echo $sql;
// exit */

// $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
// $pdo=new PDO($dsn,'root','');

// if($pdo->exec($sql)){


    include"function.php";   
    $setstr= "acc={$_POST['acc']} ,  pw={$_POST['pw']} ,  email={$_POST['email']} , tel={$_POST['tel']} ";
    $where="id={$_POST['id']}";
    $table="member";


    // if(update($table,$setstr,$where)) {   
    if(update("member","acc={$_POST['acc']} ,  pw={$_POST['pw']} ,  email={$_POST['email']} , tel={$_POST['tel']} ","id={$_POST['id']}")){

    header("location:success.php?status=1");

}else{

    header("location:success.php?status=0");

}


?>