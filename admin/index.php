<?php include('partials/header.php')  ?>
         

     <!-- main section start -->
        <div class="main-container">
            <h1>Dashbored</h1>
            
                  <?php 
                     if(isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                     }
                  ?> 


           <div class="cardss">
            <p> welcome to your managing system</p>
           </div>
        </div>
     <!-- main section end -->
     <?php include('partials/footer.php')  ?>
</body>
</html>