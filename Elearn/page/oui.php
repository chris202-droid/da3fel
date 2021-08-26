<?php 

  require 'Recognize.php';
  require 'Admin/BD.php';
  $recognize = new Recognize();

  $bd = new BD("otp","root","");
  if(isset($_POST['tel'])&&(isset($_POST['nom']))&&(isset($_POST['username']))&&(isset($_POST['mail']))&&(isset($_POST['pwd']))&&(isset($_POST['cnfpwd'])))
  {
    $tel = $_POST['tel'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $cnfpwd = $_POST['cnfpwd'];
    $username = $_POST['username'];

    $path = "../img/$tel/";
    
   /* $reslt = $recognize->RecognizeEvaluation($path,"tmp");
    if($reslt>0)
    {
      echo "<h4>Visage Reconnu: $reslt</h4>";
      ///$_SESSION['count'] +=1;
    }else{echo "<h4>Visage Non Reconnu</h4>";}*/
    
      if(!is_dir($path))
      {
        mkdir($path,0777,true);
        $rslt = exec("python Inscription.py $path tmp tmp1");
        $result = $bd->InsertUser2($nom,$prenom,$username,$pwd,$tel,$mail);
        var_dump($result);
        echo "<h4 style='color:black;'>Yes: $result</h4>";
       
      }else{echo "Echec d'inscription";}
  }
  



    ?>