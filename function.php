<?php
function starts($shape,$line){
    switch ($shape) {
        case '三角形':
            echo "正角三角形<br>";
            for($i=1;$i<=$line;$i++)
            {
                $start=$line-($i-1);
                $end=$line+($i-1);
                for($j=1;$j<$line*2;$j++)
                {
        
                    if(($j<$start) || ($j>$end) )
                        echo "&nbsp";
                    else
                        echo '*';
                }
        
                echo "<br>";
        
            }
            break;
        case "菱形":

            for($i=1;$i<=$line;$i++)
            {
        
                $start=$line-($i-1);
                $end=$line+($i-1);
                for($j=1;$j<$line*2;$j++)
                {
                    if(($j<$start) || ($j>$end) )
                        echo "&nbsp";
                    else
                        echo '*';
                }
        
                echo "<br>";
            }
            for($i=1;$i<$line;$i++)
            {
                $start=$i;
                $end=($line*2-1)-$i-1;
                for($j=0;$j<$line*2;$j++)
                {
                    if(($j<$start) || ($j>$end) )
                        echo "&nbsp";
                    else
                        echo '*';
                }
        
                echo "<br>";
        
            } 
            break;        
        }   
    }

    function pdo($dbname){
        $dsn="mysql:host=localhost;charset=utf8;dbname=$dbname";
        $pdo=new PDO($dsn,'root','');
        return $pdo;
    }
    function all($table,...$arg)
    {
        $totalArgs = count($arg);
        if($totalArgs>=1)
            $dbname=$arg[0];  
        else 
            $dbname="crud";
        echo $totalArgs.",";
        echo $dbname;
        $dsn="mysql:host=localhost;chaset=utf8;dbname=$dbname";
        $pdo =new PDO($dsn,'root','');
        $all="select * from $table";
        $datas=$pdo->query($all)->fetchall(PDO::FETCH_ASSOC);
        return $datas;

        
    }
    function find($table,$id)
    {
        $pdo=pdo('crud');
        if(is_array($id)){
            $tmp=[];
            foreach($id as $key=>$value){
                $tmp[]="$key = $value";
            }
            $sql="select count(id) from $table where ".join(" && ",$tmp); 
            
        }
        else
        {
            $sql="select count(id) from $table where id='$id'";
            
        }
        echo $sql;
        $datas=$pdo->query($sql)->fetchcolumn();
        
        
        // $dsn="mysql:host=localhost;charset=utf8;dbname";
        // $pdo=new PDO($dsn,'root','');
        // $sql="select * from $table where is=$id";
        // $datas=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $datas;

    }
    function eh($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
    function del($table,$id)
    {
        $pdo=pdo('crud');
        if(is_array($id)){
                $tmp=[];
                foreach($id as $key=>$value){
                
                $sql="delete from $table where ".join(" && ",$tmp);
            }
        }
        else
        {
            $sql="delete from $table where id=$id";        
        }
        return $pdo->exec($sql);
    }


//     $sql="UPDATE member SET acc={$_POST['acc']} , 
//     pw={$_POST['pw']} ,
//     email={$_POST['email']} ,
//     tel={$_POST['tel']} 
//     WHERE id={$_POST['id']}";


// $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
// $pdo=new PDO($dsn,'root','');

// if($pdo->exec($sql)){


    
    function update($table,$set,$where)
    {
        $pdo=pdo('crud');
        $sql="Update $table set $set where $where ";
        echo $sql;
        $pdo->exec($sql);
        


    }
    
    // function del($table ,$id){
    //     $pdo=$pdo=pdo('crud');
    
    //     if(is_array($id)){
    //         $tmp=[];
    //         foreach($id as $key => $value){
    //             //sprintf("`%s`='%s'",$key,$value);
    //             $tmp[]="`$key`='$value'";
    //         }
    //         $sql="delete from $table where ".join(" && ",$tmp);
            
    //     }else{
    //         $sql="delete from $table where id='$id'";
    //     }
    
    //      return  $pdo->exec($sql);
        
        
    
    
    
    // }
?>

