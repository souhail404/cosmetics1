<?php include('partials/header.php')  ?>
   <!-- main start -->
   <div class="main-container">
        <h1>Update Orders</h1>
        
            <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?> 
            <?php 
            $id=$_GET['id'];
            $sql="SELECT * FROM tb_orders WHERE id=$id ";
            $res=mysqli_query($conn ,$sql);
            
            if($res==true){
                $count=mysqli_num_rows($res);   
                
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);
                    $name =$row['name'];
                    $number=$row['number'];
                    $city=$row['city'];
                    $adress=$row['adress'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-orders-1.php');
                }
            }
            ?> 
        
        

        <form action="" method="POST">
            <table>
                <tr>
                    <td>Full Name : </td>
                    <td> <input type="text" name="name" value="<?php echo $name ?>" ></td>
                </tr>
                <tr>
                    <td>Number : </td>
                    <td> <input type="text" name="number" value="<?php echo $number ?>"  ></td>
                </tr>
                <tr>
                    <td>City : </td>
                    <td> <input type="text" name="city" value="<?php echo $city ?>"  ></td>
                </tr>
                <tr>
                    <td>Adress : </td>
                    <td> <input type="text" name="adress" value="<?php echo $adress ?>"  ></td>
                </tr>

                <tr> 
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>" class="add">
                        <input type="submit" name="submit" value="Update Order" class="add">
                        <a href="manage-orders-1.php" class="cancel">Cancel</a>
                    </td>
                </tr>
            </table>
        </form>
        
   </div>
   <!-- main end -->
   <?php
   
   if(isset($_POST['submit']))
   {
      $id=$_POST['id'];
      $name=$_POST['name'];
      $number=$_POST['number'];
      $city=$_POST['city'];
      $adress=$_POST['adress'];
      
      
      $sql="UPDATE tb_orders SET 
      name='$name',
      number='$number',
      city='$city',
      adress='$adress'
      WHERE id=$id
      ";

      

      $res = mysqli_query($conn, $sql) or die(mysqli_error());
      if($res ==true){
          $_SESSION['add']="<div class='scc-message'>Order updated seccessfully</div>";
          header("location:".SITEURL.'admin/manage-orders-1.php');
      }
      else{
          $_SESSION['add']="<div class='fail-message'>Failed to update order</div>";
          header("location:".SITEURL.'admin/update-orders.php');
      }
   }
 ?>
  
<?php include('partials/footer.php')  ?>