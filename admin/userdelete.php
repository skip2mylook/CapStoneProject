<?php
     include "conn.php";
     $ref_id=$_GET['id'];

     
     $deleteuser = mysqli_query($conn, "DELETE FROM user WHERE id='$ref_id'");

     
     if($deleteuser == true){
        ?>
           <script>
            alert("1 Data is Deleted!");
            window.location.href="studentdata.php";
           </script>
           <?php
    
    }else{
        ?>
           <script>
            alert("Error!");
            window.location.href="studentdata.php";
           </script>
           <?php
    }


?>