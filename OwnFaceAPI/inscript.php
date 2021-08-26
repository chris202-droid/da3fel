<?php 
	require 'Recognize.php';
	$recognize = new Recognize();
	$tel = '100986';//$_SESSION['id'];
	$path = "img/$tel/";
	
	

	$reslt = $recognize->RecognizeInscription($path,"nteme","armel");
	if($reslt>0)
	{
		echo $reslt;
		///$_SESSION['count'] +=1;
	}else{echo 0;}





 ?>
 