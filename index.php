<?PHP echo "yes"; ?>
 <?php 
 session_start();
 $NomUtilisateur = "";
$Mot2Pass = "";
 $pied = "pied.php";
 $tete = "tete.php";
  $path = 'https://github.com/chris202-droid/da3fel/tree/main/pages/'
	$pages = scandir($path);

	if(isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'],$pages )){
		$page = $_GET['page'];
	}else{
		$page = 'garde.php';
	}
?> 
<?php 
	require 'Admin/BD.php';
	require 'OwnFaceAPI/Recognize.php';//reconnaissance faciale
	require dirname(__FILE__).'/otphp/lib/otphp.php';
	require  'vendor/autoload.php';
	include 'vendor/autoload.php';
	use Twilio\Rest\Client;

	$bd = new BD("otp","root","");
	$recognize = new Recognize();
  	$private = \phpseclib3\Crypt\RSA::createKey();
 	$public = $private->getPublicKey();

?>

<?php



function SendTwilioSMS($number,$sms)
{
	
	// Your Account SID and Auth Token from twilio.com/console
	// To set up environmental variables, see http://twil.io/secure
	$account_sid = 'AC156d1208c8c8901c3b5a5e974a99cf49' ;
	$auth_token = 'c206a98a148b08654ec5a1482aa4663d';
	// In production, these should be environment variables. E.g.:
	// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]
	// A Twilio number you own with SMS capabilities
		$twilio_number = "+16309312115";
		$tel = $number;

	$client = new Client($account_sid, $auth_token);
	$client->messages->create(
	    // Where to send a text message (your cell phone?)
	    $tel,
	    array(
	        'from' => $twilio_number,
	        'body' => $sms
	    )
	);
}

$Mot2Pass = "";
	
$otp = new OTP();
$decalage = 0;
$maintenant = time()+$decalage;

if(isset($_POST['connect']))
{
	if(isset($_POST['Mot2Pass'])&& isset($_POST['NomUtilisateur']))
	{
		$NomUtilisateur = htmlspecialchars($_POST['NomUtilisateur']);
		$Mot2Pass = htmlspecialchars($_POST['Mot2Pass']);
		if(isset($NomUtilisateur)&&isset($Mot2Pass))
		{
			//$Mot2Pass = $public->encrypt(password_hash($Mot2Pass, PASSWORD_DEFAULT));
			//$NomUtilisateur = $public->encrypt($NomUtilisateur);
			$user = $bd->SelectToConnect($NomUtilisateur,$Mot2Pass);
			
			if(sizeof($user)==1)
			{
				$otp1 = $otp->getOtp($Mot2Pass)->at($maintenant);
				$tel =$user[0]->tel;// $private->decrypt();
				SendTwilioSMS("+237$tel","Utilisez ce code $otp1 pour vous authentifier");
				$tel1 = $tel;
				$tete = $pied = "vide.php";
				$page = "otp.php";
			}else{error_log('Erreur de Connexion');}
		}else{error_log('Informations non correctes');}
		
	}
	else{
		

	}
}
//$tel1 = $tel;
//var_dump($tel1)
if(isset($_POST['valid']))
{
	if(isset($_POST['otp']))
	{
		$otpUser = htmlspecialchars($_POST['otp']);
		if($otp->checkOTP($otpUser,$decalage,$Mot2Pass)==True)
		{
			
    			$user2 =  $bd->SelectToConnect($NomUtilisateur,$Mot2Pass);
    			$tel2 = $user2[0]->tel;

    			
    			$_SESSION['user'] = "$NomUtilisateur";
    			$un = $tel2;
    			$_SESSION['count'] = $un;
    			header ("location: elearn/");
    			echo "<meta http-equiv='refresh' content='0; url = ../readline_info()' />";
    			$_SESSION['name'] = "656451234";

		}else{$page = "otp.php";}

	}
}

				?>

<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="fr">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">

		<!-- Use the .htaccess and remove these lines to avoid edge case issues.
		More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Accueil</title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile viewport optimized: j.mp/bplateviewport -->
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<!-----------------------Liens CSS --------------------------->
		<link rel="shortcut icon" href="interface/img/favicon.png"/>
		<link rel="stylesheet" href="interface/css/style.css">
		<link rel="stylesheet" href="interface/css/bootstrap.css">
		<link rel="stylesheet" href="interface/css/bootstrap.min.css">
		<link rel="stylesheet" href="interface/js/wizard/wizard.css">
		<link rel="stylesheet" href="interface/js/jquery-steps/jquery.steps.css">
		<!---------------  Script JS---------------->
		<script src="interface/js/libs/jquery-3.2.1.min.js"></script>
		<script src="interface/js/jquery.fileupload.js"></script>
		<script src="interface/js/bootstrap.min.js"></script>
		<script src="interface/js/jquery.validate.min.js"></script>
		<script src="interface/js/wizard/wizard.js"></script>
		<script src="interface/js/jquery-steps/jquery.steps.js"></script>
		<script src="interface/assets/js/form_wizard.js"></script>
		<script src="interface/js/form_wizard.js"></script>

	</head>

	<body>

		<div id="container" class="container-fluid">

			<!-- ----------------Entete_Debut------------------->
			
			<?php include "$path".$tete; ?>
			<!-- ----------------Entete_Fin------------------->

			<!-- ---------------Corps_Debut------------------->
			<div id="main" >
				<?php include "$path".$page; ?>

				<!--------------------------- debut formulaire----------------------->

				<!---------------------------------------------- FENÊTRE CONNEXION ----------------------------------------------->
				<?php include 'pages/connexion.php'; ?>
				<!------ fin Fenetre de connexion---------------------------->
				
				<?php //include "$path".otp.php; ?>
				<!---------------------------------------------- Fenetre d'inscription ------------------------------------------------------>
				<?php include "$path".inscription.php; ?>

				<!-------------------------------------------------------------------------- Fin fenêtre d'inscription-------------------------------------------------------------------------->
				
				<div id="result">
					<?php //echo $otp1;
					//$user2 =  $bd->SelectToConnect($NomUtilisateur,$Mot2Pass);
    				//$tel2 = $user2[0]->tel;
    				//echo $tel2.'<br>';
					//echo $tel1; ?>
				</div>
			</div>
			<!-- ---------------Corps_Fin------------------->

			<!-- ---------------Pieds de page DEBUT------------------->

			<?php include "$path".$pied; ?>
			<!-- ---------------Pieds de page DEBUT------------------->
		</div>


		


		<script>
			$(document).ready(function() {
				
				$("#btn-connexion").click(function() {
					$("#fenetre-connexion").modal();
				});
				$("#btn-preinscription").click(function() {
					$("#fenetre-preinscription").modal();
				});
				$("#btn-inscription").click(function() {
					$("#fenetre-inscription").modal();
				});
				$('#result').hide();

				$('#conect').click(function(){
					var NomUtilisateur = $('#NomUser').val();
					var Mot2Pass = $('#pass').val();
					if(NomUtilisateur!=null && Mot2Pass!=null)
					{

					}
				});	
				
			});

		</script>

		<script>
			$('form').on('focus', 'input[type=number]', function (e) {
			  $(this).on('mousewheel.disableScroll', function (e) {
			    e.preventDefault()
			  });
			});
			$('form').on('blur', 'input[type=number]', function (e) {
			  $(this).off('mousewheel.disableScroll')
			});
		</script>

	</body>

</html>
