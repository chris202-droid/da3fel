
<?php 

class OTP
{
	//$decalage = 0;
	//$maintenant = time()+$decalage;

function getOtp($caract)
 	{
 		return  new \OTPHP\TOTP($caract,array('interval'=>300));
 	}
 	
 	function checkOTP($otp,$decalage,$caract)
 	{
 		$maintenant = time()+$decalage;
 		return $this->getOtp($caract)->verify($otp,$maintenant);
 	}
}


class Recognize
{
	function RecognizeInscription($path,$python, $image1, $image2)
	{
		if(!is_dir($path))
		{
			mkdir($path,0777,true);
			$result = exec("python $python/Inscription.py $path $image2 $image1");
			return (int)$result;
		}else {return -1;}
		
	}

	function RecognizeEvaluation($path,$python,$image)
	{
		if(is_dir($path))
		{
			$result = exec("python $python/Evaluation.py $path $image");

			return (int)$result;
		}else{return -1;}
	}
}


/*$recognize = new Recognize();

$nom_final = $_POST['telephone'];
$nom_fichier2 = $_POST['email'];

$path = "img/$nom_final/";
//phase d'inscription
$inscript = $recognize->RecognizeInscription($path,$nom_fichier2,$nom_final);
//Phase d'evaluation
$eval = $recognize->RecongnizeEvaluation($path,"tmp");*/

