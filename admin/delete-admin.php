<?php
include('../config/constants.php');
$id=$_GET['id'];
$sql="DELETE FROM tb_admin WHERE id=$id";

$res=mysqli_query($conn , $sql);

if($res==true)
{
    $_SESSION['delete']="<div class='scc-message'>Admin deleted seccessfully</div>";
    header("location:".SITEURL.'admin/manager-admin.php');
}
else{
    $_SESSION['delete']="<div class='fail-message'>Failed to delete admin</div>";
    header("location:".SITEURL.'admin/add-admin.php');
}
?>