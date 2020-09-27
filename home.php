<?php

session_start();
if(!isset($_SESSION['name'])){
    echo "you are logged out";
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atta Website</title>

   <?php include 'links.php' ?>
    <style>
        <?php include 'css/style.css' ?>
    </style>
</head>
<body>
<div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
<nav class="navbar">
        <div class="max-width">
            <div class="logo">
</div>
<ul class="menu">
<li><a href="#home" class="menu-btn">Home</a></li>
<li><a href="#about" class="menu-btn">About</a></li>
<li><a href="logout.php" class="menu-btn">Log out</a></li>

</ul>
<div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
</div>
</nav>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">
<h1 class="text-warning border border-danger">Hello, my name is : <?php  echo $_SESSION['name']; ?> </h1>

</div>
<div class="text-2">
                    </div>
<div class="text-3">
And I'm a <span class="typing"></span></div>
<a href="#">Hire me</a>
            </div>
</div>
</section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title text-primary">
About me</h2>
<div class="about-content">
                <div class="column left">
                    <img src="atta.jpg" alt="" class="shadow-lg p-2 mb-3 bg-danger rounded">
                </div>
<div class="column right">
                <h1 class="text-warning shadow-lg p-2 mb-3 bg-danger rounded"> I am Web Developer </h1>
<p>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut voluptatum eveniet doloremque autem excepturi eaque, sit laboriosam voluptatem nisi delectus. Facere explicabo hic minus accusamus alias fuga nihil dolorum quae. Explicabo illo unde, odio consequatur ipsam possimus veritatis, placeat, ab molestiae velit inventore exercitationem consequuntur blanditiis omnis beatae. Dolor iste excepturi ratione soluta quas culpa voluptatum repudiandae harum non.</p>
<a href="#">Download CV</a>
                </div>
</div>
</div>
</section>    


</body>
</html>