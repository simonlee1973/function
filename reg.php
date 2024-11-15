<?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $sql="insert into member(acc,pw,email,tel) value('{$_POST['acc']}','{$_POST['pw']}','{$_POST['email']}','{$_POST['tel']}')";
    // echo $sql;
    // exit(); 
    $pdo=new PDO($dsn,'root','');
    $pdo->exec($sql);
    header("location:reg_form.php");

    if($pdo->exec($sql)){

        header("location:reg_form.php?status=1");
    
    }else{
    
        header("location:reg_form.php?status=0");
    
    }    
?>

