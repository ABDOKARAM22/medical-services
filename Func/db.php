<?php
$server_name="localhost";
$user="root";
$pass="";
$db_name= "medical";
$conect=mysqli_connect($server_name,$user,$pass,$db_name);
if(mysqli_connect_errno()){

    echo "Error In Connection : " . mysqli_connect_error();
    exit();
}
//function to insert into database
function insert($sql){
    global $conect;
    $result=mysqli_query($conect,$sql);
    if($result){
        return true;
    }else{
        
        return false;
    }
}

// function to compar betwen the vlue and the faild in database
function get_row($table,$faild,$value){
    $sql="SELECT * FROM `$table` WHERE `$faild` = '$value'";
    global $conect;
    $result = mysqli_query($conect, $sql);
    if($result){
        $row=[];
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            return $row;
        }
    }
}

// function to select all faild from database
function get_rwos($table){
$sql="SELECT * FROM $table";
global $conect;
$result=mysqli_query($conect,$sql);
if($result){
    $rows=[];
    $num_rows=mysqli_num_rows($result);
   if($num_rows>0){

      while ($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;


    }
    
    return $rows;
}
}
}

//function to update falid in database
function update($sql)
{
    global $conect;
    $result = mysqli_query($conect, $sql);
    if ($result) {
        return true;
    } else {

        return false;
    }
}


//function to delet falid in database
function delet($sql)
{
    global $conect;
    $result = mysqli_query($conect, $sql);
    if ($result) {
        return true;
    } else {

        return false;
    }
}


//function to count rows in the table
function count_row($table){
$sql="SELECT * FROM `$table`" ;
    global $conect;
$result=mysqli_query($conect,$sql);
if($result){

    if(mysqli_num_rows( $result)>0){
            
            $rows=[];
            while
                ($row = mysqli_fetch_assoc($result)){
                $rows[]=$row;
            }
        
    }
}
return count($rows);
}

