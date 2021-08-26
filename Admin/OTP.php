
<?php 
require 'BD.php';
$bd = new BD('otp','root','');
class OTP
{
	//$decalage = 0;
	//$maintenant = time()+$decalage;

function getOtp($caract)
 	{
 		return $totp = new \OTPHP\TOTP($caract,array('interval'=>120));
 	}
 	
 	function checkOTP($otp,$decalage,$decalage)
 	{
 		$maintenant = time()+$decalage;
 		return getOtp()->verify($otp,$maintenant);
 	}

 	/*if(!empty($_POST['login']))
 	{
 		if((count($token)==1) && checkOTP($_POST['otp'],$decalage))
 			$ok = 'Login OK';
 		else
 			$ok = "Echec Login";
 	} */
}

	
$otp = new OTP();

var_dump(array_key_exists('connect', $_POST));
			var_dump(array_key_exists('Mot2Pass', $_POST));
			var_dump(array_key_exists('NomUtilisateur', $_POST));

var_dump($otp);
system('pause');
if(isset($_POST['connect']))
{
	if(isset($_POST['Mot2Pass'])&& isset($_POST['NomUtilisateur']))
	{
		$NomUtilisateur = htmlspecialchars($_POST['NomUtilisateur']);
		$Mot2Pass = htmlspecialchars($_POST['Mot2Pass']);
		if(isset($NomUtilisateur)&&isset($Mot2Pass))
		{
			if(sizeof($bd->SelectToConnect($NomUtilisateur,$Mot2Pass))==1)
			{
				$otp1 = $otp->getOtp($Mot2Pass);
				
			}
		}
		echo $NomUtilisateur;
		echo " voici ";
		echo $otp1;
	}
}



  ?>