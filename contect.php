<?php
  include 'session.php';
  $con =  mysqli_connect("localhost","root","","signup");
   
  if(! $con ) {
     die('Could not connect: ' . mysql_error());
  }
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        /* body{
            background-color:rgb(230, 232, 230);
        } */
        #search{ height:46px; width:453px;}
        #n{
        position:absolute;
        top:45px;
        left:100px;
        color:white;
    }
     .more0{
        position:absolute;
        top:200px;
        left:100px;
    }
    .more0 input{
        height:30px;
        width:900px;
        
    }
    .more0 button{
        height:30px;
        width:150px;  
        background-color:black;
        color:white;
        border-radius:4px;  
    }
    .more1,.more2{
        height:250px;
        width:450px;
        position:absolute;
        left:180px; top:300px;
    }
    .more2{
        left:780px;
    }
    h6{
        color:rgb(81, 83, 85);
    }
    </style>
</head>
<body>
    <div class="header">
        <image id="logo" src="photos/logo.png"></image>
        <a href="cart.php"><image id="cart" src="photos/cart.png"></image></a>
        <?php  if(isset($a)){ ?>
    <a href="logout.php"><image id="user" src="photo/logout.png"></image></a> 
    <p id="n"> <?php echo $a;  ?></p> 
    <?php } else { ?>
    <a href="index.php"><image id="user" src="photos/user.png"></image></a>
    <?php } ?>
        <a href="#"><image id="call" src="photo/help.png"></image></a>
    </div><br><br><br><br><br>
    <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hello. What can we help you with?</h1>
    <hr>
    <div class="more0">
    <h3> </h3>
    <form action="#" method="post">
    <input type="text" name="qry" placeholder="&nbsp;&nbsp;&nbsp;Where are you based?">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="qryb">GO</button>
    </form>
    </div>
    <?php
    if(isset($_POST['qryb']))
    {
        $q = $_POST['qry'];
        $qr = "insert into query (q_user, q_query)values('$a','$q')";
        if(!mysqli_query($con, $qr))
    {  
        ?>
        <script>alert("Not send"); </script>
        <?php
    }else{
        ?>
        <script>alert("Your Query was submitted"); </script>
        <?php
    }
    }
    ?>
    <div class="more1">
        <br>
      <h3>I want to track my order</h3>
      <h6>Could you give me your personal a=mail plz</h6>
      <h3>I want to manage my order</h3>
      <h6>Cancel, change delivery address</h6>
    </div>
    <div class="more2">
        <br>
      <h3>How do I leave a feedback?</h3>
      <h6>The Iphone was as expected</h6>
      <h3>I want help with other issues</h3>
      <h6>Can I work for you?</h6>
    </div> 
</body>
</html>