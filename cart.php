<?php
  include 'session.php';
  error_reporting(0);
  $con =  mysqli_connect("localhost","root","","signup");
   
if(! $con ) {
   die('Could not connect: ' . mysql_error());
}
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <style>
        #search{ height:46px; width:453px;}
        #n{
        position:absolute;
        top:45px;
        left:100px;
        color:white;
    }
    .cartimg{
        height:100px;
        width:60px;
        margin-left:30px;
    }
    .cartimg img{
        margin-top:5px;
        height:90px;
        width:auto;
    }
   table{
       position:absolute;
       top:200px;
   }
    footer{
        top:1000px;
    }
    .pay{
        position:relative;
        top:850px;
        margin-top:100px;
        height:200px;
        width:100%;
        /* background-color:red; */
    }
    .total{
        position:absolute;
        top:40px;
        right:200px;
    }
    .onlinepay{
        position:absolute;
        left:120px;
    }
    .onpay{
        height:200px;
        width:350px;
    }
    .btnpay{
        position:absolute;
        top:170px; right:155px;
        height:40px;
        width:300px;
        border-radius:20px;
        border-style: none;
        background-color: rgb(13, 224, 13);
        color:white;
        outline:none;
   }
   .btnpay:hover{
       opacity:0.6;
   }
   
    </style>
</head>
<body>
    <div class="header">
        <image id="logo" src="photos/logo.png"></image>
        <a href="home.php"><image id="home" src="photos/home.png"></image></a>
        <a href="#"><image id="cart" src="photos/cart.png"></image></a>
        <?php  if(isset($a)){ ?>
    <a href="logout.php"><image id="user" src="photo/logout.png"></image></a> 
    <p id="n"> <?php echo $a;  ?></p> 
    <?php } else { ?>
    <a href="index.php"><image id="user" src="photos/user.png"></image></a>
    <?php } ?>
        <a href="contect.php"><image id="call" src="photo/help.png"></image></a>
    </div>
    <br>
    <br>
    <br><br>
    <h1>&nbsp;&nbsp;&nbsp;Shopping Cart</h1>
  <hr>
  <table style="width:100%" >
<tr>
<th>Image</ths>
<th>Name</th>
<th>Price</th>
<th>Delete</th>
</tr>

  
 
    <?php
    function cartfun($id,$nm,$pz,$img){
       $rslt = "<tr>
       <th><div class=\"cartimg\"><img src=\"$img\"></div></th>
       <th>$nm</th> 
       <th>$pz</th>
       <form action=\"delcart.php\" method=\"post\">
       <input type=\"hidden\" name=\"iid\" value=\"$id\">
       <th><button type=\"submit\" name=\"del\"><i class=\"fa fa-trash-o\" style=\"font-size:30px;color:red\"></i></button></th>
       </form>
     </tr>";
     echo $rslt;
    }

    $sql1 = "SELECT c_id FROM cart WHERE c_user in ('$a')";
    $retval1 = mysqli_query( $con, $sql1);
    $items = array();
    while ($data = mysqli_fetch_array($retval1, MYSQLI_NUM)) {
        // print_r($data);
        $items[] = $data;
    }
    $sooo = array();
    $so = sizeof($items);
    for($i=0; $i<$so; $i++)
    {
        array_push($sooo,$items[$i][0]);
    }
    //  var_dump($sooo);

     $wherein = implode(',', $sooo);
    $sql = "SELECT * FROM mobile WHERE pro_id in ($wherein)";
    $retval = mysqli_query( $con, $sql);
    
    if(mysqli_num_rows($retval)>0){
    while($row = mysqli_fetch_array($retval)) {
            cartfun(
                    $row['pro_id'],
                    $row['pro_name'],
                    number_format($row['pro_rs']),
                    $row['pro_img']);
                $total += $row['pro_rs'];
    }}
    ?>
    </table>
    <div class="pay">
    <div class="total"><h1>Amount to be paid on Delivery : &#8377; <?php echo number_format($total); ?></h1>
    <form action="order.php" method="post">
    </form>
    </div>
</body>
</html>
