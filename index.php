<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include './Pages/home.php';
include './vendor/autoload.php'; 
Imagesoptimizer\Images::Optimizer("app-hero-bg.jpg"); 
?>
 
<img width="600" src="app-hero-bg.jpg" alt=""/>