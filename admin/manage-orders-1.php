<?php include('partials/header.php')  ?>

     <!-- main section start -->
        <div class="main-container">
            
               <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            ?>  
            
            

            <table class="table-admin">
            <tr >
                <th>N.S</th>
                <th>Name</th>
                <th>Number</th>
                <th>City</th>
                <th>Adress</th>
                <th>Action</th>
            </tr>

            <?php
               $sql="SELECT * FROM tb_orders ORDER BY id DESC";
               $res= mysqli_query($conn ,$sql);
               if($res==true){
                  $rows=mysqli_num_rows($res);
                  if($rows>0)
                  {   $i=1;
                      while($rows=mysqli_fetch_assoc($res))
                      {
                          $id=$rows['id'];
                          $name=$rows['name'];
                          $number=$rows['number'];
                          $city=$rows['city'];
                          $adress=$rows['adress'];
                          ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $number; ?></td>
                            <td><?php echo $city; ?></td>
                            <td><?php echo $adress; ?></td>
                            <td class="spcl-td">
                            <a href="<?php echo SITEURL; ?>admin/update-orders.php?id=<?php echo $id; ?>" class="upd" >UPDATE</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-orders.php?id=<?php echo $id; ?>" class="del" >DELETE</a>
                            </td>
                          </tr>
                          <?php
                      }

                  }
                  
               }
            ?>
            
            </table> 


        </div>
     <!-- main section end -->
     <?php include('partials/footer.php')  ?>
</body>
</html>