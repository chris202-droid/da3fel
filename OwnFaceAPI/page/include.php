<?php 
	require '../Admin/BD.php';
	require '../OwnFaceAPI/Recognize.php';
	require '../otphp/lib/otphp.php';
	require  '../vendor/autoload.php';
	include '../vendor/autoload.php';
	use Twilio\Rest\Client;

	$bd = new BD("otp","root","");
	$recognize = new Recognize();
  	$private = \phpseclib3\Crypt\RSA::createKey();
 	$public = $private->getPublicKey();

?>
