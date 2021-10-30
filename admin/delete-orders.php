<?php
include('../config/constants.php');
$id=$_GET['id'];
$sql="DELETE FROM tb_orders WHERE id=$id";

$res=mysqli_query($conn , $sql);

if($res==true)
{
    $_SESSION['delete']="<div class='scc-message'>Orders deleted seccessfully</div>";
    header("location:".SITEURL.'admin\manage-orders-1.php');
}
else{
    $_SESSION['delete']="<div class='fail-message'>Failed to delete orders</div>";
    header("location:".SITEURL.'admin\manage-orders-1.php');
}
?>