<?php 
	require 'Recognize.php';
	$recognize = new Recognize();
	$tel = '100986';//$_SESSION['id'];
	$path = "img/$tel/";

	$reslt = $recognize->RecognizeEvaluation($path,"","tmp");
	if($reslt>0)
	{
		echo "<h4>Visage Reconnu: $reslt</h4>";
		///$_SESSION['count'] +=1;
	}else{echo "<h4>Visage Non Reconnu</h4>";}
	
	
/*
	$reslt = $recognize->RecognizeInscription($path,"nteme","armel");
	if($reslt>0)
	{
		echo "<h4>Visage Reconnu: $reslt</h4>";
		///$_SESSION['count'] +=1;
	}else{echo "<h4>Visage Non Reconnu</h4>";}*/





 ?>
 