<?php

    include "conn.php";

    session_start();

    if(isset($_POST['reg_btn'])){

        $fname=$_POST['fn'];
        $midI=$_POST['mi'];
        $lname=$_POST['ln'];
        $email=$_POST['email'];
        $address=$_POST['addre'];
        $dob=$_POST['dob'];
        $phone=$_POST['pn']; 
        $pass=$_POST['pass'];




        //validation
        $validate=mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

        $val_num=mysqli_num_rows($validate);

        if($val_num <= 0) {

            $insert=mysqli_query($conn, "INSERT INTO user 
            VALUES ('0','$fname','$midI','$lname','$email','$address','$dob','$phone','$pass')");

            if($insert==TRUE){
                ?>
                <script>
                    alert("You Have Successfully Registered!")
                    window.location.href="landingpage.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Error!")
                    window.location.href="landingpage.php";
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("The Email is Already Used!")
                window.location.href="landingpage.php";
            </script>
            <?php
        }

    }


    //This is for Login
    if(isset($_POST['login_btn'])){

        $email=$_POST['email'];
        $pass=$_POST['password'];

        $check_login=mysqli_query($conn,"SELECT * FROM user
        WHERE email='$email' AND password='$pass'");

        $n=mysqli_num_rows($check_login);

        if($n <= 0){
            ?>
            <script>
             alert("Email or Password not Found!");
             window.location.href="landingpage.php";
            </script>
            <?php
        }else{
            $_SESSION['email']=$email;
            ?>
            <script>
             alert("Account Accepted! Welcome Users!");
             window.location.href="shop.php"
            </script>
            <?php
        }

    }


    if(isset($_POST['admin_btn'])){

        $user=$_POST['user'];
        $pass=$_POST['password'];

        $check_login=mysqli_query($conn,"SELECT * FROM admin
        WHERE Username='$user' AND Password='$pass'");

        $n=mysqli_num_rows($check_login);

        if($n <= 0){
            ?>
            <script>
             alert("User or Password not Found!");
             window.location.href="landingpage.php";
            </script>
            <?php
        }else{
            $_SESSION['user']=$user;
            ?>
            <script>
             alert("Welcome to Dashboard Admin!");
             window.location.href="admin/adminindex.php";
            </script>
            <?php
        }

    }

    if(isset($_POST['add_to_cart'])){

        $picname = $_POST['pic'];

        $itemname = $_POST['itemName'];
        $price = $_POST['price'];
        $sizes = $_POST['sizes'];
        $quantity = $_POST['stock'];
        


        $insert = mysqli_query($conn, "INSERT INTO cart
            VALUES ('0','$picname','$itemname','$sizes','$quantity','$price')");


            if($insert==true){
                $fileDestination = 'assets/img/' .$picname;
                move_uploaded_file($fileTmpName, $fileDestination);
                ?>
                <script>
                    alert("Your Item has been Added in the Cart!")
                    window.location.href="cart.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Error!")
                    window.location.href="shop.php";
                </script>
                <?php
            }
    }



?>

