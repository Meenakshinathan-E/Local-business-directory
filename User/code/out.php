<?php
$id=$_GET['id'];
if($id=='t')
{
    header('location:log.php');
}
else
{
    session_start();
    session_destroy();
    header('location:index.php');
}
   
?>