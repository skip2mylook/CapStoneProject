<?php

    include "../conn.php";

    session_start();

    if(isset($_POST['admin_btn'])){

        $user=$_POST['user'];
        $pass=$_POST['password'];

        $check_login=mysqli_query($conn,"SELECT * FROM admin
        WHERE Username='$user' AND Password='$pass'");

        $n=mysqli_num_rows($check_login);

        if($n <= 0){
            ?>
            <script>
             alert("Email or Password not Found!");
             window.location.href="adminlogin.php";
            </script>
            <?php
        }else{
            $_SESSION['user']=$user;
            ?>
            <script>
             alert("Welcome to Dashboard Admin!");
             window.location.href="adminindex.php";
            </script>
            <?php
        }

    }



    //ADD PRODUCTS
    if(isset($_POST['add_btn'])){

        $category=$_POST['category'];

        $picname = $_FILES['pic']['name'];
        $fileTmpName = $_FILES['pic']['tmp_name'];

        $itemname = $_POST['itemName'];
        $availability = $_POST['availability'];
        $desc = $_POST['description'];
        $sizes = $_POST['sizes'];
        $stock = $_POST['stock']; 
        $price = $_POST['price'];


            $insert = mysqli_query($conn, "INSERT INTO addproducts 
            VALUES ('0','$category','$picname','$itemname','$availability','$desc','$sizes','$stock','$price')");

            if($insert==true){

                $fileDestination = 'assets/img/' .$picname;
                move_uploaded_file($fileTmpName, $fileDestination);

                ?>
                <script>
                    alert("The Item has been Added!")
                    window.location.href="tableproducts.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Error!")
                    window.location.href="tableproducts.php";
                </script>
                <?php
            }
        }


    //UPDATE PRODUCTS
    if(isset($_POST['update_btn'])){
        $refer_id = $_POST['id'];

        $a = $_POST['category'];
        $picname = $_FILES['pic']['name'];
        $fileTmpName = $_FILES['pic']['tmp_name'];
        $b = $_POST['itemName'];
        $c = $_POST['availability'];
        $d = $_POST['description'];
        $e = $_POST['sizes'];
        $f = $_POST['stock'];
        $g = $_POST['price'];


        $query = "UPDATE addproducts 
        SET picture='$picname', category='$a', itemName='$b', availability='$c', description='$d', sizes='$e', stock='$f', price='$g' WHERE id='$refer_id'";
        $query_run = mysqli_query($conn, $query); 

        if($query_run) {

            $fileDestination = 'assets/img/' .$picname;
            move_uploaded_file($fileTmpName, $fileDestination);

            ?>
        <script>
            alert("Data is UPDATED!");
            window.location.href="tableproducts.php";
        </script>
        <?php
        }else{
            ?>
        <script>
            alert("Error!");
            window.location.href="tableproducts.php";
        </script>
        <?php
        }

    }

    //UPDATE ACCOUNT
    if(isset($_POST['update_acc'])){
        $ref_id = $_POST['user_id'];

        $a = $_POST['fname'];
        $b = $_POST['mname'];
        $c = $_POST['lname'];
        $d = $_POST['email'];
        $e = $_POST['address'];
        $f = $_POST['dob'];
        $g = $_POST['pn'];
        $h = $_POST['password'];

        $query = "UPDATE user 
        SET fname='$a', mname='$b', lname='$c', email='$d', 
        address='$e', dob='$f', pn='$g', password='$h' WHERE id='$ref_id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            ?>
        <script>
            alert("Update Successfully!");
            window.location.href="studentdata.php";
        </script>
        <?php
        }else{
            ?>
        <script>
            alert("Update Unsuccessfully");
            window.location.href="studentdata.php";
        </script>
        <?php
        }

    }

    
?>