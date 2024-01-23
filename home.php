<?php
 include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Shopping
    </title>
    <link rel="stylesheet" href="style.css">
<style>
    #n{
        position:absolute;
        top:45px;
        left:100px;
        /* right:10px; */
        color:white;
    }
</style>
</head>
<body onload="myfun()">
  <!-- loding animation html code -->
<div class="wrap">
    <div class="loading">
        <div class="bounceball"></div>
        <div class="text">LOADING</div>
    </div>
</div>
    <!-- navigation bar elements-->
<div class="header">
    <image id="logo" src="photos/logo.png"></image>
    <a href="#"><image id="home" src="photos/home.png"></image></a>
    <a href="cart.php"><image id="cart" src="photos/cart.png"></image></a>
    <?php  if(isset($a)){ ?>
    <a href="logout.php"><image id="user" src="photo/logout.png"></image></a> 
    <p id="n"> <?php echo $a;  ?></p> 
    <?php } else { ?>
    <a href="index.php"><image id="user" src="photos/user.png"></image></a>
    <?php } ?>
    <a href="contect.php"><image id="call" src="photo/help.png"></image></a>
    
</div>
  <!-- animation  -->
<div class="maindiv"></div>

  <!-- circle for list -->
<div class="circle">
    <a href="mobile.php"><div class="one"><img src="photos/mobile.png"><h1>Mobile</h1></div></a>
    <a href="laptop.php"><div class="two"><img src="photos/laptop.png"><h1>Laptop</h1></div></a>
    <a href="toy.php"><div class="three"><img src="photos/toy.png"><h1>Toys</h1></div></a>
    <a href="beauty.php"><div class="four"><img src="photos/beauty.png"><h1>Beauty</h1></div></a>
    <a href="accessories.php"><div class="five"><img src="photos/powerbank.png"><h1>Accessories</h1></div></a>
<div class="six"></div>
</div>  

    <!-- slider animation for sale -->
<h1 class="sale">On Sale</h1>
<div id="slider">
    <div id="slide-container">
        <div class="slide"><img src="photo/apple1.jpeg"></div>
        <div class="slide"><img src="photo/mi1.jpeg"></div>
        <div class="slide"><img src="photo/honor1.jpeg"></div>
        <div class="slide"><img src="photo/samsung1.jpeg"></div>
        <div class="slide"><img src="photo/mi1.jpeg"></div>
        <div class="slide"><img src="photo/apple2.jpeg"></div>
        <div class="slide"><img src="photo/honor2.jpeg"></div>
        <div class="slide"><img src="photo/samsung2.jpeg"></div>
        <div class="slide"><img src="photo/apple3.jpeg"></div>
        <div class="slide"><img src="photo/mi3.jpeg"></div>
        <div class="slide"><img src="photo/honor3.jpeg"></div>
        <div class="slide"><img src="photo/samsung3.jpeg"></div>
    </div>
</div>
  
    <!-- slider animation for new arrivals  -->
<h1 class="sale1">New Arrivals</h1>
<div id="slider1">
    <div id="slide-container1">
        <div class="slide1"><img src="photo/hp1.jpeg"></div>
        <div class="slide1"><img src="photo/ipad1.jpeg"></div>
        <div class="slide1"><img src="photo/lenovo1.jpeg"></div>
        <div class="slide1"><img src="photo/dell1.jpeg"></div>
        <div class="slide1"><img src="photo/hp2.jpeg"></div>
        <div class="slide1"><img src="photo/ipad2.jpeg"></div>
        <div class="slide1"><img src="photo/lenovo2.jpeg"></div>
        <div class="slide1"><img src="photo/dell2.jpeg"></div>
        <div class="slide1"><img src="photo/hp3.jpeg"></div>
        <div class="slide1"><img src="photo/ipad3.jpeg"></div>
        <div class="slide1"><img src="photo/lenovo3.jpeg"></div>
        <div class="slide1"><img src="photo/dell3.jpeg"></div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    // slider animation for sale and new arrivals in js
   $(document).ready(function () {
    var show = 5;
    var w = $('#slider').width() / show;
    var l = $('.slide').length;
    //
    var ww = $('#slider1').width() / show;
    var ll = $('.slide1').length;

    $('.slide').width(w);
    $('#slide-container').width(w * l)
    //
    $('.slide1').width(w);
    $('#slide-container1').width(w * l)


    function slider() {
        $('.slide:first-child').animate({
            marginLeft: -w
        }, 'slow', function () {
            $(this).appendTo($(this).parent()).css({marginLeft: 0});
        });
        //
        $('.slide1:first-child').animate({
            marginLeft: -w
        }, 'slow', function () {
            $(this).appendTo($(this).parent()).css({marginLeft: 0});
        });

    }
    var timer = setInterval(slider, 1000);
    
    $('#slider').hover(function(){
        clearInterval(timer);
    },function(){
        timer = setInterval(slider, 1000);
    });
    //
    $('#slider1').hover(function(){
        clearInterval(timer);
    },function(){
        timer = setInterval(slider, 2000);
    });
});

 
</script>
</body>
</html>