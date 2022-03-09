<?php

$mysqli= new mysqli('localhost','root','','crud')or die(mysqli_error($mysqli));
$id=0;
session_start();
$update=false;
$name="";
$location="";


if (isset($_POST['save'])){

    $name=$_POST['name'];
    $location=$_POST['location'];

 

    $mysqli->query("INSERT INTO data(name,location) VALUES('$name',' $location')") or
    die($mysqli->error);
    $_SESSION['message']= "Category has Save ";
    $_SESSION['msg_type']= "Successfuly ";
    header("location:index.php");
}

if (isset($_GET['delete'])){

    $id =$_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

        
    $_SESSION['message']= "Category has Deleted ";
    $_SESSION['msg_type']= "danger ";

    header("location:index.php"); 

}

if(isset($_GET['edit'])){

    $id=$_GET['edit'];
    $update=true;


    $result=$mysqli->query("select * from data where id=$id") or die($mysqli->error());



 
    $row=$result->fetch_array();
    $name=$row['name'];
    $location=$row['location'];
}
 
if (isset($_POST['update'])){

    $id=$_POST['id'];
    $name=$_POST['name'];
    $location=$_POST['location'];

    $mysqli->query("update data set name='$name' , location='$location' where id=$id") or
       die($mysqli->error);
    $_SESSION['message']= "Category has Deleted ";
    $_SESSION['msg_type']= "danger ";

    header("location:index.php"); 

}

?>