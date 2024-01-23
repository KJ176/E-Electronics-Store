<?php
    $con = mysqli_connect("localhost","root","","signup");
    if(!$con)
    {
        die("can't connect to server");
    }
 
    $fname=(stripslashes(trim($_POST['f_name'])));
    $lname= (stripslashes(trim($_POST['l_name'])));
    $email= (stripslashes(trim($_POST['email'])));
    $mobile= (stripslashes(trim($_POST['mobile'])));
    $address= (stripslashes(trim($_POST['address'])));
    $pass= (stripslashes(trim($_POST['password'])));
    $repass= (stripslashes(trim($_POST['repassword'])));
    
    if($pass == $repass)
    {

      if($fname!= "" && $lname !="" && $email!= "" && $mobile!= "" && $address!= "" && $pass!= "" && $repass!= "")
      {
    $sql = "INSERT INTO usertable(f_name, l_name, username, password, mobile, address) VALUES 
    ('$fname','$lname','$email','$pass','$mobile','$address')";
    if(mysqli_query($con, $sql)){
        header('location:index.php');
    }
    else{
        header('location:signup.php');
    }
    }
    }
   else{
       header('location:signup.php');
   }
   
?>