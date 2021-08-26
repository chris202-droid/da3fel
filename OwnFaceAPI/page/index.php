<?php 

  $page = "cours.php";
  $pages = scandir(dirname(__FILE__));
  if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'],$pages )){
    $page = $_GET['page'];
  }
  
?> 
<!DOCTYPE html>
<html>
<head>
	<title>DA-3FEL</title>
	<link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../rquiz/src/css/quiz.css">
    <script type="text/javascript" src="../js/slider.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="../rquiz/rquiz/rquiz.js"></script>
</head>
	

<body>
	<?php include 'page/navbar.php'; ?>
	<?php include "page/$page"; ?>
</body>

</html>