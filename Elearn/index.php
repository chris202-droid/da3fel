<?php 

  session_start();
 $_SESSION['count'] += 1;
 $id = $_SESSION['name'];

 ?>
<?php 
  require '../Admin/BD.php';
  $bd = new BD("otp","root","");
  //$user = $bd->SelectForSession($id);
  $page = "cours.php";
  $pages = scandir("page/");
  if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'],$pages )){
    $page = $_GET['page'];
  }
  
?> 
<?php 

  require '../OwnFaceAPI/Recognize.php';
  $recognize = new Recognize();
  $temps = 20;
  $cpt = 0;
  $cpt2 = 0;
  $user = $bd->SelectForSession($id);
  //do {
    $path = "../OwnFaceAPI/img/656451234/";
    $python = "../OwnFaceAPI";
    $result = $recognize->RecognizeEvaluation($path,$python,"tmp");
    if($result>=2)
    {
      $page = 'exam.php';
    }else{echo "Vous ne correspondez pas au profil recherché...";}
    //var_dump($result);
   /* $cpt2++; //compte le nombre de capture total
    if($result>=2)
    {
      $cpt++;//nombre de reconnaissance faite
    }
    if($cpt2==3)
    {
      if(($cpt/$cpt)<0.6)
      {
        $rslt = $bd->Bloque($id);//bloquage de l4utilisateur
        //break;
      }
      //break;
    }*/

    //$_SESSION['count'] += 1;
    //sleep($temps);
    //$temps  = random_int(10, 20);
  //} while ( $cpt2<3);
  

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>DA-3FEL</title>
	<link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="rquiz/src/css/quiz.css">
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="rquiz/rquiz/rquiz.js"></script>
</head>
	

<body>
	<?php include 'page/navbar.php' ?>
	<?php include "page/$page"; ?>
<div class="panel">
<?php var_dump($id); ?>
  <?php // echo "<h1 style='color:black;'>".$_SESSION['count']."</h1>"; ?>
</div>
  <script type="text/javascript">
    $(document).ready(function(){
     // alert();
      $('.exa').click(function(){
        $('.rec').load('page/call.php');
      });
      
      //alert('ok');
    });
  </script>

</body>
</html>
