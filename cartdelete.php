<?php


    include "conn.php";
    $ref_id=$_GET['id'];

    $delete = mysqli_query($conn, "DELETE FROM cart WHERE id='$ref_id'");

     if($delete == true){
        ?>
           <script>
            alert("1 Data is Deleted!");
            window.location.href="cart.php";
           </script>
           <?php
    
    }else{
        ?>
           <script>
            alert("Error!");
            window.location.href="cart.php";
           </script>
           <?php
    }
?>