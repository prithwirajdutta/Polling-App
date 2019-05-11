<?php

$con = mysqli_connect("localhost","root","","polldb");
if(isset($_POST['pollsub'])){
    $fruit = $_POST['fruit'];
    $query = "select * from fruittb where id=1";
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
       $apple = $row['apple'];
       $banana = $row['banana'];
       $mango = $row['mango'];
       $grape = $row['grape'];
    }
    if($fruit=='grape')
    {
        $grape += 1;
    }
    if($fruit=='apple')
       {
        $apple += 1;
       }
    if($fruit=='banana')
       {
        $banana += 1;
       }
    if($fruit=='mango')
       {
        $mango += 1;
       }
    $query = "update fruittb set banana='$banana',mango='$mango',apple='$apple',grape='$grape' where id=1";
    $result=mysqli_query($con,$query);
    if($result)
        echo 'Thanks for Polling a Vote !';
}
/*
function disp()
{
    global $con;
    $query = "select * from fruittb where id=1";
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $apple=$row['apple'];
        $mango=$row['mango'];
        $banana=$row['banana'];
        $r=array('apple'=>$apple,'mango'=>$mango,'banana'=>$banana);
    }
    $record['record']=array();
    array_push($record['record'],$r);
    echo json_encode($record);
} */
?>