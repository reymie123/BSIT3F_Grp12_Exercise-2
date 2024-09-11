<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
<nav>
        <ul>
            <li><a href="http://localhost/TEAM%2012/homepage.php">Home</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="">About Us</a></li>
        </ul>
        <img src="Moon.png" id="icon" alt="Toggle Dark Mode">
    </nav>
    
    <div style="text-align:center; padding:15%;">
      <p  style="font-size:50px; font-weight:bold;">
       Hello Welcome To Our Site  <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM users WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
       🙂
      </p>
      <a href="logout.php">Logout</a>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var icon = document.getElementById("icon");
            icon.addEventListener("click", function() {
                document.body.classList.toggle("dark-theme");
                icon.src = document.body.classList.contains("dark-theme") ? "sun.png" : "moon.png";
            });
        });
    </script>
</body>
</html>