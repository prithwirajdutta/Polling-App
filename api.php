<?php

$con = mysqli_connect("localhost","root","","polldb");

    $query = "select * from fruittb where id=1";
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $apple=$row['apple'];
        $mango=$row['mango'];
        $banana=$row['banana'];
        $grape=$row['grape'];
        $r=array('apple'=>$apple,'mango'=>$mango,'banana'=>$banana,'grape'=>$grape);
        $record['record']=array();
    }
    
    array_push($record['record'],$r);
    echo json_encode($record);

?>